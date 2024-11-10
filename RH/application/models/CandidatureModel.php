<?php
class CandidatureModel extends CI_Model {
    public function insert($data) {
        return $this->db->insert('candidature', $data);
    }

    public function getAllForAnnonce($id_annonce) {
        $this->db->select('candidature.*, diplome.nom AS diplome_nom');
        $this->db->from('candidature');
        $this->db->join('candidature_in_annonce', 'candidature_in_annonce.id_candidature = candidature.id_candidature');
        $this->db->join('diplome', 'diplome.id_diplome = candidature.id_diplome');
        $this->db->where('candidature_in_annonce.id_annonce', $id_annonce);
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id_candidature) {
        $this->db->select('candidature.*, diplome.nom AS diplome_nom');
        $this->db->from('candidature');
        $this->db->join('diplome', 'diplome.id_diplome = candidature.id_diplome');
        $this->db->where('candidature.id_candidature', $id_candidature);
        $query = $this->db->get();
        return $query->row();
    }

    public function getAllWithExperience($id_annonce) {
        $this->db->select('candidature.*, SUM(experience_travail.duree) AS total_experience, diplome.valeur AS diplome_valeur');
        $this->db->from('candidature');
        $this->db->join('candidature_in_annonce', 'candidature_in_annonce.id_candidature = candidature.id_candidature');
        $this->db->join('experience_travail', 'experience_travail.id_candidature = candidature.id_candidature');
        $this->db->join('travail', 'travail.id_travail = experience_travail.id_travail');
        $this->db->join('annonce', 'annonce.id_annonce = candidature_in_annonce.id_annonce');
        $this->db->join('diplome', 'diplome.id_diplome = candidature.id_diplome');
        $this->db->where('annonce.id_annonce', $id_annonce);
        $this->db->group_by('candidature.id_candidature');
        $this->db->order_by('total_experience DESC, diplome_valeur DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
?>