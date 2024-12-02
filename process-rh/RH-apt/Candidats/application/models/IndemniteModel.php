<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IndemniteModel extends CI_Model {
    public function calculerIndemnite($idPersonnel) {
        // Récupérer les informations du personnel
        $personnel = $this->db->select('p.date_embauche, c.date_renvoie, s.montant')
                              ->from('personnel p')
                              ->join('contrat c', 'c.id_personnel = p.id_personnel')
                              ->join('personnel_salaire ps', 'ps.id_personnel = p.id_personnel')
                              ->join('salaire s', 's.id_salaire = ps.id_salaire')
                              ->where('p.id_personnel', $idPersonnel)
                              ->get()
                              ->row();

        if (!$personnel) return null;

        // Calcul de l'ancienneté en mois
        //fa eto izy rehefa renvoyer fa mieritreritra za oe aona raha atao argument juste le daterenvoie
        $anciennete = (strtotime($personnel->date_renvoie) - strtotime($personnel->date_embauche)) / (30 * 24 * 60 * 60);

        // Récupérer les règles applicables
        $regle = $this->db->select('pourcentage_salaire')
                          ->from('regles_indemnites')
                          ->where('anciennete_min <=', $anciennete)
                          ->group_start()
                          ->where('anciennete_max >=', $anciennete)
                          ->or_where('anciennete_max IS NULL')
                          ->group_end()
                          ->get()
                          ->row();

        if (!$regle) return 0;

        // Calcul de l'indemnité
        $indemnite = ($personnel->montant * $anciennete) * ($regle->pourcentage_salaire / 100);

        return $indemnite;
    }
}

//TY LE CONTROLLER

// class Indemnite extends CI_Controller {
//     public function calculer($id_personnel) {
//         $this->load->model('Indemnite_model');
//         $indemnite = $this->Indemnite_model->calculer_indemnite($id_personnel);

//         echo json_encode(['indemnite' => $indemnite]);
//     }
// }

// ROUTE
// $route['indemnite/calculer/(:num)'] = 'indemnite/calculer/$1';
//raha ilana
