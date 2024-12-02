<?php
class RuptureContratModel extends CI_Model {
    public function insert($data) {
        return $this->db->insert('rupture_contrat', $data); // Insère une rupture de contrat
    }

    public function getById($id) {
        $this->db->where('id_rupture_contrat', $id);
        $query = $this->db->get('rupture_contrat'); 
        return $query->row_array();
    }

    public function getAll() {
        $query = $this->db->get('rupture_contrat'); 
        return $query->result_array();
    }

    public function update($id, $data) {
        $this->db->where('id_rupture_contrat', $id);
        return $this->db->update('rupture_contrat', $data);
    }

    public function delete($id) {
        $this->db->where('id_rupture_contrat', $id);
        return $this->db->delete('rupture_contrat'); 
    }
}
