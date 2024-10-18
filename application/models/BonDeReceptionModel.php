<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BonDeReceptionModel extends CI_Model {
    // Constructeur
    public function __construct() {
        parent::__construct();
    }

    // Fonction pour créer un bon de réception
    public function insert($data) {
        return $this->db->insert('attestation', $data);
    }

    // Fonction pour lire tous les bons de réception
    public function getAll() {
        $this->db->where('id_type_attestation', 2); // 2 est l'ID pour 'Bon de réception'
        $query = $this->db->get('attestation');
        return $query->result();
    }

    // Fonction pour lire un bon de réception par ID
    public function getById($id) {
        $this->db->where('id_attestation', $id);
        $this->db->where('id_type_attestation', 2); // Assurer que c'est un bon de réception
        $query = $this->db->get('attestation');
        return $query->row();
    }

    // Fonction pour mettre à jour un bon de réception
    public function update($id, $data) {
        $this->db->where('id_attestation', $id);
        $this->db->where('id_type_attestation', 2); // Assurer que c'est un bon de réception
        return $this->db->update('attestation', $data);
    }

    // Fonction pour supprimer un bon de réception
    public function delete($id) {
        $this->db->where('id_attestation', $id);
        $this->db->where('id_type_attestation', 2); // Assurer que c'est un bon de réception
        return $this->db->delete('attestation');
    }


        // Fonction pour obtenir toutes les attestations de type "Bon de reception" avec le fournisseur et les produits
        public function getAllAttestation() {
            $this->db->select('a.*, f.nom_fournisseur, p.nom_produit');
            $this->db->from('attestation a');
            $this->db->join('fournisseur f', 'a.id_fournisseur = f.id_fournisseur', 'left');
            $this->db->join('produitsInAttestation pai', 'a.id_attestation = pai.id_attestation', 'left');
            $this->db->join('produit p', 'pai.id_produit = p.id_produit', 'left');
            $this->db->where('a.id_type_attestation', 2); // 2 est l'ID pour 'Bon de reception'
            $query = $this->db->get();
    
            return $query->result();
        }
}
?>