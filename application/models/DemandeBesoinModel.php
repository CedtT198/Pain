<?php
class DemandeBesoinModel extends CI_Model {

    public function insert($data) {
        return $this->db->insert('demande_besoin', $data);
    }

    // Obtenir toutes les demandes de besoin
    public function getAll() {
        $query = $this->db->get('demande_besoin');
        return $query->result_array();
    }

    // Obtenir une demande de besoin par ID
    public function getById($id) {
        $this->db->where('id_demande_besoin', $id);
        $query = $this->db->get('demande_besoin');
        return $query->row();
    }

    // Mettre à jour une demande de besoin
    public function update($id, $description, $quantite, $accepte, $id_centre) {
        $data = array(
            'description' => $description,
            'quantite' => $quantite,
            'accepte' => $accepte,
            'id_centre' => $id_centre
        );

        $this->db->where('id_demande_besoin', $id);
        return $this->db->update('demande_besoin', $data);
    }

    // Supprimer une demande de besoin
    public function delete($id) {
        $this->db->where('id_demande_besoin', $id);
        return $this->db->delete('demande_besoin');
    }

    // Mettre à jour uniquement la colonne 'accepte'
    public function accepte($id, $accepte) {
        $data = array(
            'accepte' => $accepte
        );

        $this->db->where('id_demande_besoin', $id);
        return $this->db->update('demande_besoin', $data);
    }
}
?>
