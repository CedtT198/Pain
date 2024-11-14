<?php
class StockModel extends CI_Model {

    public function getAllInputStock() {
        $query = $this->db->get('input_stock');
        $this->db->order_by('date_input DESC');
        return $query->result_array();
    }

    public function insertInputStock($data) {
        return $this->db->insert('input_stock', $data);
    }

    // Fonction pour vérifier si un produit existe dans le stock
    // public function checkRestStock($id_input_stock) {
    //     $this->db->select('*');
    //     $this->db->from('input_stock');
    //     $this->db->where('id_input_stock', $id_input_stock);
    //     $query = $this->db->get();

    //     // Vérifie si le produit a été trouvé
    //     return $query->num_rows() > 0; // Retourne true si le produit existe, sinon false
    // }
    public function checkRestStock($id_produit) {
        // Charger la bibliothèque de base de données
        $this->load->database();
    
        // Étape 1 : Récupérer la somme des quantités dans input_stock
        $this->db->select_sum('quantite');
        $this->db->where('id_produit', $id_produit);
        $query_input = $this->db->get('input_stock');
    
        // Si aucun enregistrement trouvé dans input_stock, la quantité est 0
        $total_input = ($query_input->num_rows() > 0) ? $query_input->row()->quantite : 0;
    
        // Étape 2 : Récupérer la somme des quantités dans output_stock
        $this->db->select_sum('quantite');
        $this->db->where('id_produit', $id_produit);
        $query_output = $this->db->get('output_stock');
    
        // Si aucun enregistrement trouvé dans output_stock, la quantité est 0
        $total_output = ($query_output->num_rows() > 0) ? $query_output->row()->quantite : 0;
    
        // Étape 3 : Calculer le stock restant
        $stock_restant = $total_input - $total_output;
    
        // Retourner la quantité de stock restante
        return $stock_restant;
    }

    // Autres fonctions CRUD pour gérer le stock (facultatif)

    // Fonction pour ajouter un produit au stock
    public function insert($data) {
        return $this->db->insert('input_stock', $data);
    }

    public function insertOutput($data) {
        return $this->db->insert('output_stock', $data);
    }

    // Fonction pour récupérer tous les produits en stock
    public function getAll() {
        $query = $this->db->get('input_stock');
        return $query->result_array();
    }

    // Fonction pour mettre à jour un produit
    public function update($id, $data) {
        $this->db->where('id_input_stock', $id);
        return $this->db->update('input_stock', $data);
    }

    // Fonction pour supprimer un produit
    public function delete($id) {
        $this->db->where('id_input_stock', $id);
        return $this->db->delete('input_stock');
    }
}
?>
