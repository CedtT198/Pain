<?php
class AchatModel extends CI_Model {
    public function getStockRest() {
        $query = $this->db->query('select * from stock_restant');
        return $query->row_array();
    }

    public function getById($id) {
        $this->db->where('id_achat', $id);
        return $this->db->get('achat')->row_array();
    }

    public function getAll() {
        return $this->db->get('achat')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('achat', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_achat', $id);
        return $this->db->update('achat', $data);
    }

    public function delete($id) {
        $this->db->where('id_achat', $id);
        return $this->db->delete('achat');
    }
}
?>