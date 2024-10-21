<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FactureModel extends CI_Model {
    // Constructeur
    public function __construct() {
        parent::__construct();
    }

    // Fonction pour créer un bon de commande
    public function insert($data) {
        $this->db->insert('attestation', $data);
        return $this->db->insert_id();
    }

    // Fonction pour lire tous les bons de commande
    // public function getAll() {
    //     $this->db->where('id_type_attestation', 1); // 1 est l'ID pour 'Bon de commande'
    //     $query = $this->db->get('attestation');
    //     return $query->result_array();
    // }

    public function getAll($id_fournisseur) {
        $this->db->select('*');
        $this->db->from('attestation');
        $this->db->where('id_type_attestation', 4);
        // $this->db->where('accepte IS NULL'); 
        $this->db->where('id_fournisseur', $id_fournisseur);  
        $this->db->order_by('date_attestation DESC');
        $query = $this->db->get();
        
        return $query->result_array();  // Retourne toutes les lignes sous forme d'objets
    }

    public function getDetailLivraison($id_bonCommande) {
        $query = "SELECT 
                        pbc.id_produit,
                        pbc.quantite AS quantite_commandee,
                        IFNULL(SUM(pbl.quantite), 0) AS quantite_livree,
                        (pbc.quantite - IFNULL(SUM(pbl.quantite), 0)) AS quantite_restante,
                        a2.id_attestation 
                    FROM 
                        produitsInAttestation pbc
                    JOIN 
                        attestation a1 ON pbc.id_attestation = a1.id_attestation
                    LEFT JOIN 
                        attestation a2 ON a1.id_attestation = a2.id_correspondance
                    LEFT JOIN 
                        produitsInAttestation pbl ON a2.id_attestation = pbl.id_attestation AND pbl.id_type_attestation = 4
                    WHERE 
                        pbc.id_attestation = ".$id_bonCommande."
                        AND pbc.id_type_attestation = 1
                    GROUP BY 
                        pbc.id_produit, pbc.quantite";
        $answer = $this->db->query($query);
        return $answer->row_array();
    }

    // public function getAllTrue() {
    //     $this->db->select('*');
    //     $this->db->from('attestation');
    //     $this->db->where('id_type_attestation', 1);
    //     $this->db->where('accepte', TRUE);  // Accepte TRUE
    //     $query = $this->db->get();
        
    //     return $query->result_array();  // Retourne toutes les lignes sous forme d'objets
    // }
    
    public function getAllTrue($id_fournisseur) {
        $this->db->select('*');
        $this->db->from('attestation');
        $this->db->where('id_type_attestation', 4);
        $this->db->where('accepte', TRUE);
        $this->db->where('id_fournisseur', $id_fournisseur);
        $query = $this->db->get();
        
        return $query->result_array();  // Retourne toutes les lignes sous forme d'objets
    }

    // Fonction pour lire un bon de commande par ID
    public function getById($id) {
        $this->db->where('id_attestation', $id);
        $this->db->where('id_type_attestation', 4); // Assurer que c'est un bon de commande
        $query = $this->db->get('attestation');
        return $query->row_array();
    }

    // Fonction pour mettre à jour un bon de commande
    public function update($id, $data) {
        $this->db->where('id_attestation', $id);
        $this->db->where('id_type_attestation', 4); // Assurer que c'est un bon de commande
        return $this->db->update('attestation', $data);
    }

    // Fonction pour supprimer un bon de commande
    public function delete($id) {
        $this->db->where('id_attestation', $id);
        $this->db->where('id_type_attestation', 4); // Assurer que c'est un bon de commande
        return $this->db->delete('attestation');
    }

    // Fonction pour obtenir toutes les attestations de type "Bon de commande" avec le fournisseur et les produits
    public function getAllAttestation() {
        $this->db->select('a.*, f.nom_fournisseur, p.nom_produit');
        $this->db->from('attestation a');
        $this->db->join('fournisseur f', 'a.id_fournisseur = f.id_fournisseur', 'left');
        $this->db->join('produitsInAttestation pai', 'a.id_attestation = pai.id_attestation', 'left');
        $this->db->join('produit p', 'pai.id_produit = p.id_produit', 'left');
        $this->db->where('a.id_type_attestation', 4); // 1 est l'ID pour 'Bon de commande'
        $query = $this->db->get();

        return $query->result_array();
    }
}
?>
