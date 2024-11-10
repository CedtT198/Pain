<?php
class CandidatureModel extends CI_Model {

    // Insérer une nouvelle candidature
    public function insert($data) {
        return $this->db->insert('candidature', $data);
    }

    // Récupérer toutes les candidatures pour une annonce spécifique
    public function getAllForAnnonce($id_annonce) {
        $this->db->select('candidature.*, diplome.nom AS diplome_nom');
        $this->db->from('candidature');
        $this->db->join('candidature_in_annonce', 'candidature_in_annonce.id_candidature = candidature.id_candidature');
        $this->db->join('diplome', 'diplome.id_diplome = candidature.id_diplome');
        $this->db->where('candidature_in_annonce.id_annonce', $id_annonce);
        $query = $this->db->get();
        return $query->result();
    }

    // Récupérer une candidature par son ID
    public function getById($id_candidature) {
        $this->db->select('candidature.*, diplome.nom AS diplome_nom');
        $this->db->from('candidature');
        $this->db->join('diplome', 'diplome.id_diplome = candidature.id_diplome');
        $this->db->where('candidature.id_candidature', $id_candidature);
        $query = $this->db->get();
        return $query->row();
    }

    // Récupérer toutes les candidatures avec expérience totale et niveau de diplôme pour une annonce spécifique
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