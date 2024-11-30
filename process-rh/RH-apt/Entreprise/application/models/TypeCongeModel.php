<?php 
class TypeCongeModel extends CI_Model {
    public function insert($data) {
        return $this->db->insert('type_conge', $data); // Crée un type de congé
    }

    public function getById($id) {
        $this->db->where('id_type_conge', $id);
        $query = $this->db->get('type_conge');
        return $query->row_array();
    }
    public function getAll() {
        $query = $this->db->get('type_conge');
        return $query->result_array();
    }

    public function update($id, $data) {
        $this->db->where('id_type_conge', $id);
        return $this->db->update('type_conge', $data); // Met à jour un type de congé
    }

    public function delete($id) {
        $this->db->where('id_type_conge', $id);
        return $this->db->delete('type_conge'); // Supprime un type de congé
    }
}
