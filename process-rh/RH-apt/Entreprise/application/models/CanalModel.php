<?php
class CanalModel extends CI_Model {
    
    // Récupérer tous les canaux
    public function getAll() {
        $query = $this->db->get('canal');
        return $query->result_array();
    }

    // Récupérer un canal par son ID
    public function getById($id) {
        $this->db->where('id_canal', $id);
        $query = $this->db->get('canal');
        return $query->row_array(); // Utilise `row` pour un seul enregistrement
    }

    // Insérer un nouveau canal
    public function insert($data) {
        return $this->db->insert('canal', $data);
    }

    // Mettre à jour un canal existant
    public function update($id, $data) {
        $this->db->where('id_canal', $id);
        return $this->db->update('canal', $data);
    }

    // Supprimer un canal
    public function delete($id) {
        $this->db->where('id_canal', $id);
        return $this->db->delete('canal');
    }
}
?>
