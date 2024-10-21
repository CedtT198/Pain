<?php
class FactureModel extends CI_Model {

    // Fonction pour créer une nouvelle facture
    public function insert($data) {
        return $this->db->insert('attestation', $data);
    }

    public function getAll() {
        $this->db->select('*');
        $this->db->from('attestation');
        $this->db->where('id_type_attestation', 4);
        // $this->db->where('accepte IS NULL');  // Accepte NULL
        $query = $this->db->get();
        
        return $query->result_array();  // Retourne toutes les lignes sous forme d'objets
    }

    // Fonction pour récupérer une facture par ID
    public function getById($id) {
        $this->db->select('attestation.*, fournisseur.nom_fournisseur');
        $this->db->from('attestation');
        $this->db->join('fournisseur', 'attestation.id_fournisseur = fournisseur.id_fournisseur');
        $this->db->where('attestation.id_attestation', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Fonction pour mettre à jour une facture
    public function update($id, $data) {
        $this->db->where('id_attestation', $id);
        return $this->db->update('attestation', $data);
    }

    // Fonction pour supprimer une facture
    public function delete($id) {
        $this->db->where('id_attestation', $id);
        return $this->db->delete('attestation');
    }

        // Fonction pour obtenir toutes les attestations de type "facture" avec le fournisseur et les produits
        public function getAllAttestation() {
            $this->db->select('a.*, f.nom_fournisseur, p.nom_produit');
            $this->db->from('attestation a');
            $this->db->join('fournisseur f', 'a.id_fournisseur = f.id_fournisseur', 'left');
            $this->db->join('produitsInAttestation pai', 'a.id_attestation = pai.id_attestation', 'left');
            $this->db->join('produit p', 'pai.id_produit = p.id_produit', 'left');
            $this->db->where('a.id_type_attestation', 4); // 4 est l'ID pour 'facture'
            $query = $this->db->get();
    
            return $query->result_array();
        }
}
?>
