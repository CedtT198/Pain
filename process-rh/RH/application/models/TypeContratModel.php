<?php
class TypeContratModel extends CI_Model {
    
    // Récupérer tous les canaux
    public function getAll() {
        $query = $this->db->get('type_contrat');
        return $query->result_array();
    }

    // Récupérer un type_contrat par son ID
    public function getById($id) {
        $this->db->where('id_type_contrat', $id);
        $query = $this->db->get('type_contrat');
        return $query->row_array(); // Utilise `row` pour un seul enregistrement
    }

    // Insérer un nouveau type_contrat
    public function insert($data) {
        return $this->db->insert('type_contrat', $data);
    }

    // Mettre à jour un type_contrat existant
    public function update($id, $data) {
        $this->db->where('id_type_contrat', $id);
        return $this->db->update('type_contrat', $data);
    }

    // Supprimer un type_contrat
    public function delete($id) {
        $this->db->where('id_type_contrat', $id);
        return $this->db->delete('type_contrat');
    }
}
?>
