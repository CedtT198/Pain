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
    
    public function getAllCandidatureOf($id_candidature) {
        $this->db->select('*, canal.nom AS canal_nom, poste.nom AS poste_nom, travail.nom AS travail_nom, type_contrat.nom AS nom_type_contrat');
        $this->db->from('candidature_in_annonce');
        $this->db->join('annonce', 'candidature_in_annonce.id_annonce = annonce.id_annonce');
        $this->db->join('candidature', 'candidature_in_annonce.id_candidature = candidature.id_candidature');
        $this->db->join('canal', 'canal.id_canal = annonce.id_canal');
        $this->db->join('poste', 'poste.id_poste = annonce.id_poste');
        $this->db->join('travail', 'travail.id_travail = annonce.id_travail');
        $this->db->join('type_contrat', 'type_contrat.id_type_contrat = annonce.id_type_contrat');
        $this->db->where('candidature.id_candidature', $id_candidature);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function insert($data) {
        $this->db->insert('candidature_in_annonce', $data);
        return $this->db->insert_id();
    }
}
?>