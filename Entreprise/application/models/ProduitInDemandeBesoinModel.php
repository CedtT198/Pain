<?php
class ProduitInDemandeBesoinModel extends CI_Model {

    public function insert($id_produit, $id_demande_besoin) {
        $data = array(
            'id_produit' => $id_produit,
            'id_demande_besoin' => $id_demande_besoin
        );

        return $this->db->insert('produitInDemandeBesoin', $data);
    }

    public function getByIdDemande($id_demande_besoin) {
        $this->db->where('id_demande_besoin', $id_demande_besoin);
        $query = $this->db->get('produitInDemandeBesoin');
        return $query->result_array();
    }

    public function getByIdProduit($id_produit) {
        $this->db->where('id_produit', $id_produit);
        $query = $this->db->get('produitInDemandeBesoin');
        return $query->result_array();
    }

    
    public function getAll() {
        $query = $this->db->get('produitInDemandeBesoin');
        return $query->result_array();
    }

    public function delete($id_produit, $id_demande_besoin) {
        $this->db->where('id_produit', $id_produit);
        $this->db->where('id_demande_besoin', $id_demande_besoin);
        return $this->db->delete('produitInDemandeBesoin');
    }
}
?>