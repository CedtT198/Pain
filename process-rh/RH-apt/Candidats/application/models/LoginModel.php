<?php
class LoginModel extends CI_Model
{
    public function checkLogin($nom, $mdp) {
        $existe =0;
        $this->db->where('nom', $nom);
        $query = $this->db->get('candidature');
    
        // Si le département existe
        if($query->num_rows() == 1) {
            $candidature = $query->row();
            
            if($mdp == $candidature->mdp) {
                // Mot de passe correct, renvoyer l'ID du département
                $existe = $candidature->id_candidature;
                return $existe;
            }
            else {
                $existe = -1;
                // Le mot de passe est incorrect
                return $existe;
            }
        } else {
            // Le nom du département est incorrect
            $existe = -2;
            return $existe;
        }
    }
}
?>