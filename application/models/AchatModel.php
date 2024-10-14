<?php
class AchatModel extends CI_Model {
    public function GetStockRest() {
        $query = $this->db->query('select * from stock_restant');
        return $query->row_array();
    }

    public function getById($id) {
        $this->db->where('id_input_stock', $id);
        return $this->db->get('input_stock')->row_array();
    }

    public function getAll() {
        return $this->db->get('input_stock')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('input_stock', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_input_stock', $id);
        return $this->db->update('input_stock', $data);
    }

    public function delete($id) {
        $this->db->where('id_input_stock', $id);
        return $this->db->delete('input_stock');
    }
}
?>