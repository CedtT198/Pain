<?php
class VenteModel extends CI_Model {
    public function getById($id) {
        $this->db->where('id_output_stock', $id);
        return $this->db->get('output_stock')->row_array();
    }

    public function getAll() {
        return $this->db->get('output_stock')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('output_stock', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_output_stock', $id);
        return $this->db->update('output_stock', $data);
    }

    public function delete($id) {
        $this->db->where('id_output_stock', $id);
        return $this->db->delete('output_stock');
    }
}
?>