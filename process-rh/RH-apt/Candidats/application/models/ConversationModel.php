<?php
class ConversationModel extends CI_Model {
    
    // Récupérer tous les canaux
    public function getAll() {
        $query = $this->db->get('conversation');
        return $query->result_array();
    }
    
    public function getAllByDomaine($id_domaine) {
        $this->db->where('id_domaine', $id_domaine);
        $query = $this->db->get('conversation');
        return $query->result_array();
    }

    // Récupérer un conversation par son ID
    public function getById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('conversation');
        return $query->row_array(); // Utilise `row` pour un seul enregistrement
    }

    // Insérer un nouveau conversation
    public function insert($data) {
        return $this->db->insert('conversation', $data);
    }

    // Mettre à jour un conversation existant
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('conversation', $data);
    }

    // Supprimer un conversation
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('conversation');
    }
}
?>
