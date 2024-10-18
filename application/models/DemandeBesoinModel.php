<?php
class DemandeBesoinModel extends CI_Model {

    // Ajouter une demande de besoin
    public function insert($description, $quantite, $accepte, $id_centre) {
        $data = array(
            'description' => $description,
            'quantite' => $quantite,
            'accepte' => $accepte,
            'id_centre' => $id_centre
        );

        return $this->db->insert('demande_besoin', $data);
    }

    // Obtenir toutes les demandes de besoin
    public function getAll() {
        $query = $this->db->get('demande_besoin');
        return $query->result();
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
}
?>
