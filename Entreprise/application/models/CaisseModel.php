<?php
class CaisseModel extends CI_Model {
    public function getAll() {
        $query = $this->db->query("SELECT montant FROM caisse ORDER BY date_caisse DESC, Id_caisse DESC LIMIT 1");
        return $query->row_array();
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