<?php
class AttestationModel extends CI_Model {
    public function compareAttestation() {
        // getBonDeCommande
        // getBonDeLivraison
        // getBonDeReception
        // getFacture
        // return true ou false
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
}
?>