<?php
class RendezVousModel extends CI_Model {

    // Récupérer tous les rendez-vous
    public function getAll() {
        $query = $this->db->get('rendez_vous');
        return $query->result();
    }

    // Récupérer un rendez-vous par ID
    public function getById($id_rendez_vous) {
        $this->db->where('id_rendez_vous', $id_rendez_vous);
        $query = $this->db->get('rendez_vous');
        return $query->row();
    }

    // Insérer un nouveau rendez-vous
    public function insert($data) {
        return $this->db->insert('rendez_vous', $data);
    }

    // Mettre à jour un rendez-vous existant par ID
    public function update($id_rendez_vous, $data) {
        $this->db->where('id_rendez_vous', $id_rendez_vous);
        return $this->db->update('rendez_vous', $data);
    }

    // Supprimer un rendez-vous par ID
    public function delete($id_rendez_vous) {
        $this->db->where('id_rendez_vous', $id_rendez_vous);
        return $this->db->delete('rendez_vous');
    }
}
?>
