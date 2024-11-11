<?php
class PosteModel extends CI_Model {
        
    // Récupérer tous les canaux
    public function getAll() {
        $query = $this->db->get('poste');
        return $query->result_array();
    }

    // Récupérer un poste par son ID
    public function getById($id) {
        $this->db->where('id_poste', $id);
        $query = $this->db->get('poste');
        return $query->row_array(); // Utilise `row` pour un seul enregistrement
    }

    // Insérer un nouveau poste
    public function insert($data) {
        return $this->db->insert('poste', $data);
    }

    // Mettre à jour un poste existant
    public function update($id, $data) {
        $this->db->where('id_poste', $id);
        return $this->db->update('poste', $data);
    }

    // Supprimer un poste
    public function delete($id) {
        $this->db->where('id_poste', $id);
        return $this->db->delete('poste');
    }
}
?>
