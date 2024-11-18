<?php
class TestModel extends CI_Model {
    
    // Récupérer tous les canaux
    // public function getAll() {
    //     $query = $this->db->get('test');
    //     return $query->result_array();
    // }

    public function getAll() {
        $sql = "
            select *
            FROM test
            JOIN candidature ON test.id_candidature = candidature.id_candidature
            ORDER BY date_test DESC;
        ";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // Récupérer un test par son ID
    public function getById($id) {
        $this->db->where('id_test', $id);
        $query = $this->db->get('test');
        return $query->row_array(); // Utilise `row` pour un seul enregistrement
    }

    // Insérer un nouveau test
    public function insert($data) {
        $this->db->insert('test', $data);
        return $this->db->insert_id();
    }

    // Mettre à jour un test existant
    public function update($id, $data) {
        $this->db->where('id_test', $id);
        return $this->db->update('test', $data);
    }

    // Supprimer un test
    public function delete($id) {
        $this->db->where('id_test', $id);
        return $this->db->delete('test');
    }
}
?>
