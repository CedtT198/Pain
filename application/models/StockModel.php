<?php
class StockModel extends CI_Model {

    // Fonction pour vérifier si un produit existe dans le stock
    public function checkRestStock($id_produit_stock) {
        $this->db->select('*');
        $this->db->from('produit_stock');
        $this->db->where('id_produit_stock', $id_produit_stock);
        $query = $this->db->get();

        // Vérifie si le produit a été trouvé
        return $query->num_rows() > 0; // Retourne true si le produit existe, sinon false
    }

    // Autres fonctions CRUD pour gérer le stock (facultatif)

    // Fonction pour ajouter un produit au stock
    public function insert($data) {
        return $this->db->insert('produit_stock', $data);
    }

    // Fonction pour récupérer tous les produits en stock
    public function getAll() {
        $query = $this->db->get('produit_stock');
        return $query->result();
    }

    // Fonction pour mettre à jour un produit
    public function update($id, $data) {
        $this->db->where('id_produit_stock', $id);
        return $this->db->update('produit_stock', $data);
    }

    // Fonction pour supprimer un produit
    public function delete($id) {
        $this->db->where('id_produit_stock', $id);
        return $this->db->delete('produit_stock');
    }
}
?>
