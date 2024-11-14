<?php
class VenteModel extends CI_Model {
    public function getById($id) {
        $this->db->where('id_vente', $id);
        return $this->db->get('vente')->row_array();
    }

    public function getAll() {
        return $this->db->get('vente')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('vente', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_vente', $id);
        return $this->db->update('vente', $data);
    }

    public function delete($id) {
        $this->db->where('id_vente', $id);
        return $this->db->delete('vente');
    }
}
?>