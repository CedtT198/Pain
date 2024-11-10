<?php
class ExperienceTravailModel extends CI_Model {
    public function getAll($id_annonce) {
        $this->db->select('experience_travail.duree, travail.nom AS travail_nom');
        $this->db->from('experience_travail');
        $this->db->join('travail', 'travail.id_travail = experience_travail.id_travail');
        $this->db->join('candidature_in_annonce', 'candidature_in_annonce.id_candidature = experience_travail.id_candidature');
        $this->db->where('candidature_in_annonce.id_annonce', $id_annonce);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data) {
        return $this->db->insert('experience_travail', $data);
    }
}
?>