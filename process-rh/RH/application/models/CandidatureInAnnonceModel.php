<?php
class CandidatureInAnnonceModel extends CI_Model {
    
    public function getAll() {
        $this->db->select('*');
        $this->db->from('candidature_in_annonce');
        $this->db->join('annonce', 'candidature_in_annonce.id_annonce = annonce.id_annonce');
        $this->db->join('candidature', 'candidature_in_annonce.id_candidature = candidature.id_candidature');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getAllCandidature() {
        $this->db->select('*');
        $this->db->from('candidature_in_annonce');
        $this->db->join('annonce', 'candidature_in_annonce.id_annonce = annonce.id_annonce');
        $this->db->join('candidature', 'candidature_in_annonce.id_candidature = candidature.id_candidature');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function insert($data) {
        $this->db->insert('candidature_in_annonce', $data);
        return $this->db->insert_id();
    }
}
?>