<?php
class ProduitInFournisseurModel extends CI_Model {
    public function getAll() {
        $query = $this->db->get('produitInFournisseur');
        return $query->result_array();
    }
}
?>