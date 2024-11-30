<?php
defined('BASEPATH') or exit('No direct script access allowed');
class PersonnelModel extends CI_Model {
    
    public function getAll() {
        $query = $this->db->get('personnel');
        return $query->result_array();
    }
    
    public function getAllNonRenvoye() {
        $query = $this->db->get('personnel');
        $query = $this->db->get('personnel');
        return $query->result_array();
    }
    
    public function insert($data) {
        return $this->db->insert('personnel', $data);
    }

    public function getByIdCategorie($idCategoriePersonnel) {
        $this->db->where('id_categorie_pesonnel', $idCategoriePersonnel);
        $query = $this->db->get('personnel');
        return $query->result_array();
    }
    
    public function getById($id){
        $this->db->where('id_personnel', $id);
        $query=$this->db->get('personnel');
        return $query->result_array();
    }


    function calculerAnciennete($dateEmbauche) {
        if (empty($dateEmbauche)) {
            return "Date d'embauche non valide.";
        }
    
        $dateEmbauche = new DateTime($dateEmbauche);
        $dateActuelle = new DateTime();
    
        if ($dateEmbauche > $dateActuelle) {
            return "La date d'embauche est dans le futur.";
        }
    
        $interval = $dateEmbauche->diff($dateActuelle);
    
        return sprintf(
            "%d ans, %d mois, et %d jours",
            $interval->y,
            $interval->m,
            $interval->d
        );
    }



    public function getAnciennete($idPersonnel) {
        $this->db->select('date_embauche');
        $this->db->where('id_personnel', $idPersonnel);
        $query = $this->db->get('personnel');

        if ($query->num_rows() > 0) {
            $dateEmbauche = $query->row()->date_embauche;
            return $this->calculerAnciennete($dateEmbauche);
        }

        return "Aucun employé trouvé.";
    }
}
?>

