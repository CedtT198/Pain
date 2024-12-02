<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PreavisModel extends CI_Model {
    public function calculerDroitsPreavis($idPersonnel, $date_rupture) {
        // Récupérer les infos de l'employé
        $personnel = $this->db->get_where('personnel', ['id_personnel' => $idPersonnel])->row();
        $contratPersonnel = $this->db->get_where('contrat', ['id_personnel' => $idPersonnel])->row();
        //ty zao raha ohatra oe contrat ray iany ny ao am base fa afaka soloitsika oe izay contrat farany ko izay mety amla
        if (!$personnel) {
            return ['error' => 'Personnel non trouvé.'];
        }

        // Calculer l'ancienneté en mois
        $date_embauche = new DateTime($personnel->date_embauche);
        // $date_rupture = new DateTime();
        $anciennete = $date_embauche->diff($date_rupture)->m + ($date_embauche->diff($date_rupture)->y * 12);

        // Récupérer les règles de préavis applicables
        $this->db->where('id_type_contrat', $contratPersonnel->id_type_contrat);
        $this->db->where('anciennete_min <=', $anciennete);
        $this->db->where('(anciennete_max IS NULL OR anciennete_max >=' . $anciennete . ')');
        $regle = $this->db->get('regles_preavis')->row();

        if (!$regle) {
            return ['error' => 'Aucune règle de préavis applicable trouvée.'];
        }

        // Calcul des droits de préavis
        return [
            'anciennete' => $anciennete,
            'preavis_duree' => $regle->preavis_duree
        ];
    }
}
//ITO NY CONTROLLER MIASA AMINY

// <?php
// class Preavis extends CI_Controller {
//     public function calculer($idPersonnel) {
//         $this->load->model('PreavisModel');
//         $result = $this->Preavis_model->calculerDroitsPreavis($idPersonnel);

//         if (isset($result['error'])) {
//             echo $result['error'];
//         } else {
//             echo 'Ancienneté : ' . $result['anciennete'] . ' mois<br>';
//             echo 'Durée de préavis : ' . $result['preavis_duree'] . ' jours';
//         }
//     }
// }
