<?php
class AttestationModel extends CI_Model {

    public function getById($id) {
        $this->db->where('id_attestation', $id);
        return $this->db->get('attestation')->row_array();
    }

    public function getIdCorrespondances($id_depart) {
        $query = $this->db->query('WITH RECURSIVE AttestationChain AS (
                            SELECT 
                                a.id_attestation,
                                a.id_correspondance
                            FROM 
                                attestation a
                            WHERE 
                                a.id_attestation = '.$id_depart.'
                            
                            UNION ALL
                            
                            SELECT 
                                a.id_attestation,
                                a.id_correspondance
                            FROM 
                                attestation a
                            INNER JOIN 
                                AttestationChain ac ON a.id_attestation = ac.id_correspondance
                        )
                        SELECT * FROM AttestationChain');
        return $query->row_array();
    }

    private function getAttestationByType($type) {
        $this->db->select('attestation.id_fournisseur, produitsInAttestation.id_produit');
        $this->db->from('attestation');
        $this->db->join('produitsInAttestation', 'attestation.id_attestation = produitsInAttestation.id_attestation');
        $this->db->join('type_attestation', 'attestation.id_type_attestation = type_attestation.id_type_attestation');
        $this->db->where('type_attestation.nom_attestation', $type);
        $query = $this->db->get();
        
        return $query->result_array(); // Retourne un tableau des produits et du fournisseur
    }

    // Fonction pour comparer les attestations
    public function compareAttestation() {
        // Obtenir les informations de chaque type d'attestation
        $bonDeCommande = $this->getAttestationByType("Bon de commande");
        $bonDeLivraison = $this->getAttestationByType("Bon de livraison");
        $bonDeReception = $this->getAttestationByType("Bon de réception");
        $facture = $this->getAttestationByType("Facture");

        // Comparer les attestations en vérifiant si elles sont identiques
        if ($this->compareDetails($bonDeCommande, $bonDeLivraison) &&
            $this->compareDetails($bonDeCommande, $bonDeReception) &&
            $this->compareDetails($bonDeCommande, $facture)) {
            return true; // Toutes les attestations sont identiques
        }

        return false; // Les attestations sont différentes
    }

    // Fonction pour comparer les détails des attestations
    private function compareDetails($attestation1, $attestation2) {
        return $attestation1 == $attestation2; // Comparaison des tableaux
    }

    // Fonction pour mettre à jour la colonne 'accepte' d'une attestation
     public function updateAccepte($id_attestation, $accepte) {
        // Préparer les données à mettre à jour
        $data = array(
            'accepte' => $accepte
        );

        // Spécifier la condition pour l'update
        $this->db->where('id_attestation', $id_attestation);

        // Exécuter la mise à jour
        return $this->db->update('attestation', $data);
    }

    public function insert($data) {
        $this->db->insert('attestation', $data);
        return $this->db->insert_id();
    }
}
?>