<?php
class ExperienceTravailModel extends CI_Model {

    // Récupérer toutes les expériences de travail pour une annonce spécifique
    public function getAll($id_annonce) {
        $this->db->select('experience_travail.duree, travail.nom AS travail_nom');
        $this->db->from('experience_travail');
        $this->db->join('travail', 'travail.id_travail = experience_travail.id_travail');
        $this->db->join('candidature_in_annonce', 'candidature_in_annonce.id_candidature = experience_travail.id_candidature');
        $this->db->where('candidature_in_annonce.id_annonce', $id_annonce);
        $query = $this->db->get();
        return $query->result();
    }

    // Insérer une nouvelle expérience de travail
    public function insert($data) {
        return $this->db->insert('experience_travail', $data);
    }

    // Mettre à jour une expérience de travail existante
    public function update($id_experience_travail, $data) {
        $this->db->where('id_experience_travail', $id_experience_travail);
        return $this->db->update('experience_travail', $data);
    }

    // Supprimer une expérience de travail par ID
    public function delete($id_experience_travail) {
        $this->db->where('id_experience_travail', $id_experience_travail);
        return $this->db->delete('experience_travail');
    }
}
?>
