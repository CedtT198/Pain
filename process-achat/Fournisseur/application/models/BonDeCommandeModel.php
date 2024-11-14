<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BonDeCommandeModel extends CI_Model {
    // Constructeur
    public function __construct() {
        parent::__construct();
    }

    // Fonction pour créer un bon de commande
    public function insert($data) {
        return $this->db->insert('attestation', $data);
    }

    // Fonction pour lire tous les bons de commande
    // public function getAll() {
    //     $this->db->where('id_type_attestation', 1); // 1 est l'ID pour 'Bon de commande'
    //     $query = $this->db->get('attestation');
    //     return $query->result_array();
    // }

    public function getAll() {
        $this->db->select('*');
        $this->db->from('attestation');
        $this->db->where('id_type_attestation', 1);
        $this->db->where('accepte IS NULL');  // Accepte NULL
        $query = $this->db->get();
        
        return $query->result_array();  // Retourne toutes les lignes sous forme d'objets
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
        $this->db->where('id_type_attestation', 1);
        $this->db->where('accepte', TRUE);
        $this->db->where('id_fournisseur', $id_fournisseur);
        $query = $this->db->get();
        
        return $query->result_array();  // Retourne toutes les lignes sous forme d'objets
    }

    // public function getAllTrue($id_fournisseur) {
    //     $this->db->select('a1.*');
    //     $this->db->from('attestation a1');
    //     $this->db->join('attestation a2', 'a1.id_attestation = a2.id_correspondance', 'left');
    //     $this->db->where('a1.id_type_attestation', 1);  
    //     $this->db->where('a1.accepte', TRUE);
    //     $this->db->where('a1.id_fournisseur', $id_fournisseur);  
    //     $this->db->where('a2.id_attestation IS NULL');  
        
    //     $query = $this->db->get();
    //     return $query->result_array();  // Retourne toutes les lignes sous forme de tableau associatif
    // }
    

    // Fonction pour lire un bon de commande par ID
    public function getById($id) {
        $this->db->where('id_attestation', $id);
        $this->db->where('id_type_attestation', 1); // Assurer que c'est un bon de commande
        $query = $this->db->get('attestation');
        return $query->row_array();
    }

    // Fonction pour mettre à jour un bon de commande
    public function update($id, $data) {
        $this->db->where('id_attestation', $id);
        $this->db->where('id_type_attestation', 1); // Assurer que c'est un bon de commande
        return $this->db->update('attestation', $data);
    }

    // Fonction pour supprimer un bon de commande
    public function delete($id) {
        $this->db->where('id_attestation', $id);
        $this->db->where('id_type_attestation', 1); // Assurer que c'est un bon de commande
        return $this->db->delete('attestation');
    }

    // Fonction pour obtenir toutes les attestations de type "Bon de commande" avec le fournisseur et les produits
    public function getAllAttestation() {
        $this->db->select('a.*, f.nom_fournisseur, p.nom_produit');
        $this->db->from('attestation a');
        $this->db->join('fournisseur f', 'a.id_fournisseur = f.id_fournisseur', 'left');
        $this->db->join('produitsInAttestation pai', 'a.id_attestation = pai.id_attestation', 'left');
        $this->db->join('produit p', 'pai.id_produit = p.id_produit', 'left');
        $this->db->where('a.id_type_attestation', 1); // 1 est l'ID pour 'Bon de commande'
        $query = $this->db->get();

        return $query->result_array();
    }
}
?>
