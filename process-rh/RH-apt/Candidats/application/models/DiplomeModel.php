<?php
class DiplomeModel extends CI_Model {
    
    // Récupérer tous les canaux
    public function getAll() {
        $query = $this->db->get('diplome');
        return $query->result_array();
    }

    // Récupérer un diplome par son ID
    public function getById($id) {
        $this->db->where('id_diplome', $id);
        $query = $this->db->get('diplome');
        return $query->row_array(); // Utilise `row` pour un seul enregistrement
    }

    // Insérer un nouveau diplome
    public function insert($data) {
        return $this->db->insert('diplome', $data);
    }

    // Mettre à jour un diplome existant
    public function update($id, $data) {
        $this->db->where('id_diplome', $id);
        return $this->db->update('diplome', $data);
    }

    // Supprimer un diplome
    public function delete($id) {
        $this->db->where('id_diplome', $id);
        return $this->db->delete('diplome');
    }
}
?>
