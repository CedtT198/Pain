<?php
class ProduitInAttestationModel extends CI_Model {
    public function getAll() {
        $query = $this->db->get('produitInAttestation');
        return $query->result_array();
    }

    public function insertData($data) {
        return $this->db->insert('produitsInAttestation', $data);
    }

    public function insert($id_attestation, $id_produit, $qt) {
        $data = array(
            'id_attestation' => $id_attestation,
            'id_produit' => $id_produit,
            'quantite' => $qt
        );

        return $this->db->insert('produitsInAttestation', $data);
    }

    public function getProduitByAttestation($id_attestation) {
        $query = "SELECT 
                                p.nom_produit, 
                                pf.montant, 
                                pa.quantite
                            FROM 
                                produitsInAttestation pa
                            JOIN 
                                produit p ON pa.id_produit = p.id_produit
                            JOIN 
                                attestation a ON pa.id_attestation = a.id_attestation
                            JOIN 
                                produitInFournisseur pf ON pf.id_produit = p.id_produit AND pf.id_fournisseur = a.id_fournisseur
                            WHERE 
                                pa.id_attestation = ".$id_attestation;
        return $this->db->query($query)->result_array();
    }

    public function getProduitsByFournisseur($id_fournisseur) {
        $this->db->select('produit.id_produit, produit.nom_produit, produitInFournisseur.quantite, produitInFournisseur.montant');
        $this->db->from('produitInFournisseur');
        $this->db->join('produit', 'produitInFournisseur.id_produit = produit.id_produit');
        $this->db->where('produitInFournisseur.id_fournisseur', $id_fournisseur);
        $query = $this->db->get();
        
        return $query->result_array();  // Retourne toutes les lignes sous forme d'objets
    }
    
}
?>