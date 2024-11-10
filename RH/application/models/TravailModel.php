<?php
class TravailModel extends CI_Model {

    // Récupérer un travail par ID
    public function getById($id_travail) {
        $this->db->where('id_travail', $id_travail);
        $query = $this->db->get('travail');
        return $query->row();
    }

    // Récupérer tous les travaux
    public function getAll() {
        $query = $this->db->get('travail');
        return $query->result();
    }

    // Insérer un nouveau travail
    public function insert($data) {
        return $this->db->insert('travail', $data);
    }

    // Mettre à jour un travail existant par ID
    public function update($id_travail, $data) {
        $this->db->where('id_travail', $id_travail);
        return $this->db->update('travail', $data);
    }

    // Supprimer un travail par ID
    public function delete($id_travail) {
        $this->db->where('id_travail', $id_travail);
        return $this->db->delete('travail');
    }
}
?>
