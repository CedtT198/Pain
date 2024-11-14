<?php
class DepartementModel extends CI_Model {
    
    // Récupérer tous les canaux
    public function getAll() {
        $query = $this->db->get('departement');
        return $query->result_array();
    }

    // Récupérer un departement par son ID
    public function getById($id) {
        $this->db->where('id_departement', $id);
        $query = $this->db->get('departement');
        return $query->row_array(); // Utilise `row` pour un seul enregistrement
    }

    // Insérer un nouveau departement
    public function insert($data) {
        return $this->db->insert('departement', $data);
    }

    // Mettre à jour un departement existant
    public function update($id, $data) {
        $this->db->where('id_departement', $id);
        return $this->db->update('departement', $data);
    }

    // Supprimer un departement
    public function delete($id) {
        $this->db->where('id_departement', $id);
        return $this->db->delete('departement');
    }
}
?>
