<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CnapsIrsaModel extends CI_Model {
    public function getMontantSmig($date) {
        $query = $this->db->select('montant')
                          ->from('smig')
                          ->where('date_update <=', $date)
                          ->order_by('date_update', 'DESC')
                          ->limit(1)
                          ->get();

        $result = $query->row();

        return $result ? (float)$result->montant : null;
    }
//     <?php
// class Smig extends CI_Controller {
//     /**
//      * Retourne le montant du SMIG à une date donnée.
//      *
//      * @param string $date Date au format 'YYYY-MM-DD'
//      */
//     public function getMontant($date) {
//         $this->load->model('Smig_model');

//         $montant = $this->Smig_model->getMontantSmig($date);

//         if ($montant === null) {
//             echo json_encode(['status' => 'error', 'message' => 'Aucun SMIG trouvé pour cette date.']);
//         } else {
//             echo json_encode(['status' => 'success', 'montant' => $montant]);
//         }
//     }
// }
    public function getRetenueCnaps($date) {
        $montant = $this->getMontantSmig($date);

        if ($montant === null) {
            return 0;
        }
        // Calcul : 1% de (SMIG * 8)
        return ($montant * 8) * 0.01;
    }
    public function getRetenueSanitaire($date, $idPersonnel) {
        $personnel = $this->db->select('p.date_embauche, c.date_renvoie, s.montant')
                              ->from('personnel p')
                              ->join('contrat c', 'c.id_personnel = p.id_personnel')
                              ->join('personnel_salaire ps', 'ps.id_personnel = p.id_personnel')
                              ->join('salaire s', 's.id_salaire = ps.id_salaire')
                              ->where('p.id_personnel', $idPersonnel)
                              ->get()
                              ->row();

        if (!$personnel) return null;
        $retenueSanitaire=$personnel->salaire*0.01;//1%
        $retenueCnaps=$this->getRetenueCnaps($date);
        if($retenueSanitaire>$retenueCnaps) return $retenueCnaps;
        return $retenueSanitaire;

    }
    public function calculer_irsa($salaire) {
        $irsa = 0;
        $tranches = $this->db->select('*')
                             ->from('tranche_irsa')
                             ->order_by('seuil_min', 'ASC')
                             ->get()
                             ->result();

        foreach ($tranches as $tranche) {
            // Cas où le salaire dépasse la tranche
            if ($salaire > $tranche->seuil_min) {
                // Calcul de la part imposable dans cette tranche
                $imposable = min($salaire, $tranche->seuil_max ?? $salaire) - $tranche->seuil_min;

                // Ajout de l'IRSA pour cette tranche
                $irsa += ($imposable * $tranche->taux / 100) + $tranche->montant_fixe;
            }
        }
        return $irsa;
    }
}
