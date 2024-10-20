<?php
class ProduitModel extends CI_Model {
    
    public function getAll () {
        $query = $this->db->query('select * from produit');
        return $query->result_array();
    }
    
    public function getById($id_produit) {
        $this->db->where('id_produit', $id_produit);
        return $this->db->get('produit')->row_array();
    }
}
?>