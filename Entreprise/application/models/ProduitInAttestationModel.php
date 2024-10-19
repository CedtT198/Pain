<?php
class ProduitInAttestationModel extends CI_Model {
    public function getAll() {
        $query = $this->db->get('produitInAttestation');
        return $query->result_array();
    }

    public function insert($id_attestation, $id_produit) {
        $data = array(
            'id_attestation' => $id_attestation,
            'id_produit' => $id_produit
        );

        return $this->db->insert('produitsInAttestation', $data);
    }
}
?>