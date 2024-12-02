<?php
class AvenantModel extends CI_Model {
    public function insert($data) {
        return $this->db->insert('avenant', $data);
    }

    public function getById($id) {
        $this->db->where('id_avenant', $id);
        $query = $this->db->get('avenant'); 
        return $query->row_array();
    }

    public function getAll() {
        $query = $this->db->get('avenant'); 
        return $query->result_array();
    }

    public function update($id, $data) {
        $this->db->where('id_avenant', $id);
        return $this->db->update('avenant', $data);
    }

    public function delete($id) {
        $this->db->where('id_avenant', $id);
        return $this->db->delete('avenant'); 
    }
}
