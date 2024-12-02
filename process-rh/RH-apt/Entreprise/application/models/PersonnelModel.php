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
    
    public function getAllWithPersonAndContratByIdcatPers($id_categorie)
    {
        $this->db->select('contrat.*, personnel.*, personnel.id_personnel, poste.nom as poste_nom, personnel.nom as personnel_nom, type_contrat.nom as nom_type_contrat');
        $this->db->from('contrat');
        $this->db->join('personnel', 'contrat.id_personnel = personnel.id_personnel');
        $this->db->join('poste', 'poste.id_poste = contrat.id_poste');
        $this->db->join('categorie_personnel', 'categorie_personnel.id_categorie_pesonnel = personnel.id_categorie_pesonnel');
        $this->db->join('type_contrat', 'type_contrat.id_type_contrat = contrat.id_type_contrat');
        $this->db->where('personnel.id_categorie_pesonnel', $id_categorie);
        $this->db->order_by('contrat.date_debut', 'DESC');
        $this->db->order_by('contrat.id_personnel', 'DESC');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getPersonAllDetail($id_personnel)
    {
        $this->db->select('personnel.*, personnel.id_personnel, poste.nom as poste_nom, personnel.nom as personnel_nom, centre.nom_centre');
        $this->db->from('personnel');
        $this->db->join('poste', 'poste.id_poste = personnel.id_poste');
        $this->db->join('categorie_personnel', 'categorie_personnel.id_categorie_pesonnel = personnel.id_categorie_pesonnel');
        $this->db->join('centre', 'poste.id_centre = centre.id_centre');
        $this->db->where('personnel.id_personnel', $id_personnel);
        
        $query = $this->db->get();
        return $query->row_array();
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

