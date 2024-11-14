<?php
class CaisseModel extends CI_Model {
    public function getAll() {
        $query = $this->db->query("SELECT * FROM caisse ORDER BY date_caisse DESC");
        return $query->result_array();
    }
    
    public function getSum() {
        $query = $this->db->query("SELECT sum(montant) as somme FROM caisse");
        return $query->row_array();
    }
    
    public function insert($data) {
        return $this->db->insert('caisse', $data);
    }
}
?>