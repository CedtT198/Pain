<?php
class LoginModel extends CI_Model {

    public function login($nom, $mdp) {
        $existe =0;
        $this->db->where('nom_fournisseur', $nom);
        $query = $this->db->get('fournisseur');
    
        // Si le candidature existe
        if($query->num_rows() == 1) {
            $fournisseur = $query->row();
            
            if($mdp == $fournisseur->nom_fournisseur) {
                // Mot de passe correct, renvoyer l'ID du candidature
                $existe = $fournisseur->id_fournisseur;
                return $existe;
            }
            else {
                $existe = -1;
                // Le mot de passe est incorrect
                return $existe;
            }
        } else {
            // Le nom du candidature est incorrect
            $existe = -2;
            return $existe;
        }
    }
}
