<?php
class LoginModel extends CI_Model {

    public function login($nom_departement, $mdp_departement) {
        $existe =0;
        // Vérifier si le nom du département existe
        $this->db->where('nom_departement', $nom_departement);
        $query = $this->db->get('departement');
    
        // Si le département existe
        if($query->num_rows() == 1) {
            $departement = $query->row();
            
            if($mdp_departement == $departement->mdp_departement) {
                // Mot de passe correct, renvoyer l'ID du département
                $existe=$departement->id_departement;
                return $existe;
            } else {
                $existe = -1;
                // Le mot de passe est incorrect
                return $existe;
            }
        } else {
            $existe = -1;
            // Le nom du département est incorrect
            return $existe;
        }
    }
}
?>