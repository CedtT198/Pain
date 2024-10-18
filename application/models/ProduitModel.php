<?php
class ProduitModel extends CI_Model {
    
    public function getAll () {
        $query = $this->db->query('select * from produit');
        return $query->result_array();
    }
}
?>