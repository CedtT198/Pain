<?php
class CandidatureModel extends CI_Model {
    
    public function getAll(){
        $query=$this->db->get('candidature');
        return $query->result_array();
    }
    
    // Insérer une nouvelle candidature
    public function insert($data) {
        $this->db->insert('candidature', $data);
        return $this->db->insert_id();
    }

    // Récupérer toutes les candidatures pour une annonce spécifique
    public function getAllForAnnonce($id_annonce) {
        $this->db->select('candidature.*, diplome.nom AS diplome_nom');
        $this->db->from('candidature');
        $this->db->join('candidature_in_annonce', 'candidature_in_annonce.id_candidature = candidature.id_candidature');
        $this->db->join('diplome', 'diplome.id_diplome = candidature.id_diplome');
        $this->db->where('candidature_in_annonce.id_annonce', $id_annonce);

        $query = $this->db->get();
        return $query->result_array();
    }

    // Récupérer une candidature par son ID
    public function getById($id_candidature) {
        $this->db->select('candidature.*, diplome.nom AS diplome_nom');
        $this->db->from('candidature');
        $this->db->join('diplome', 'diplome.id_diplome = candidature.id_diplome');
        $this->db->where('candidature.id_candidature', $id_candidature);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Récupérer toutes les candidatures avec expérience totale et niveau de diplôme pour une annonce spécifique
    // public function getAllWithExperience($id_annonce) {
    //     $this->db->select('candidature.*, SUM(experience_travail.duree) AS total_experience, diplome.valeur AS diplome_valeur, diplome.nom AS diplome_nom');
    //     $this->db->from('candidature');
    //     $this->db->join('candidature_in_annonce', 'candidature_in_annonce.id_candidature = candidature.id_candidature');
    //     $this->db->join('experience_travail', 'experience_travail.id_candidature = candidature.id_candidature');
    //     $this->db->join('travail', 'travail.id_travail = experience_travail.id_travail');
    //     $this->db->join('annonce', 'annonce.id_annonce = candidature_in_annonce.id_annonce');
    //     $this->db->join('diplome', 'diplome.id_diplome = candidature.id_diplome');
    //     $this->db->where('annonce.id_annonce', $id_annonce);
    //     $this->db->group_by('candidature.id_candidature');
    //     $this->db->order_by('total_experience DESC, diplome_valeur DESC');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    
    public function getAllWithExperience($id_annonce) {
        $this->db->select('candidature.*, SUM(experience_travail.duree) AS total_experience, diplome.nom AS diplome_nom, diplome.valeur AS diplome_valeur');
        $this->db->from('candidature');
        $this->db->join('candidature_in_annonce', 'candidature_in_annonce.id_candidature = candidature.id_candidature');
        $this->db->join('annonce', 'annonce.id_annonce = candidature_in_annonce.id_annonce');
        $this->db->join('experience_travail', 'experience_travail.id_candidature = candidature.id_candidature');
        $this->db->join('diplome', 'diplome.id_diplome = candidature.id_diplome');
        $this->db->where('annonce.id_annonce', $id_annonce);
        $this->db->where('experience_travail.id_travail = annonce.id_travail');  // Condition de même type de travail
        $this->db->group_by('candidature.id_candidature');
        $this->db->having('SUM(experience_travail.duree) >= annonce.duree_exp_requise');
        $this->db->order_by('total_experience', 'DESC');
        $this->db->order_by('diplome.valeur', 'DESC');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    

    // Mettre à jour une candidature existante
    public function update($id_candidature, $data) {
        $this->db->where('id_candidature', $id_candidature);
        return $this->db->update('candidature', $data);
    }

    // Supprimer une candidature par ID
    public function delete($id_candidature) {
        $this->db->where('id_candidature', $id_candidature);
        return $this->db->delete('candidature');
    }
}
?>