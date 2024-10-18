<?php
class ProduitInDemandeBesoinModel extends CI_Model {

    // Ajouter un produit à une demande de besoin
    public function insert($id_produit, $id_demande_besoin) {
        $data = array(
            'id_produit' => $id_produit,
            'id_demande_besoin' => $id_demande_besoin
        );

        return $this->db->insert('produitInDemandeBesoin', $data);
    }

    // Obtenir tous les produits liés à une demande de besoin
    public function getByIdDemande($id_demande_besoin) {
        $this->db->where('id_demande_besoin', $id_demande_besoin);
        $query = $this->db->get('produitInDemandeBesoin');
        return $query->result();
    }

    // Obtenir toutes les demandes de besoin associées à un produit
    public function getByIdProduit($id_produit) {
        $this->db->where('id_produit', $id_produit);
        $query = $this->db->get('produitInDemandeBesoin');
        return $query->result();
    }

    // Supprimer un produit d'une demande de besoin
    public function delete($id_produit, $id_demande_besoin) {
        $this->db->where('id_produit', $id_produit);
        $this->db->where('id_demande_besoin', $id_demande_besoin);
        return $this->db->delete('produitInDemandeBesoin');
    }
}
?>