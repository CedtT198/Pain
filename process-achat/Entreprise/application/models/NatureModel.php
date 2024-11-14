<?php
class NatureModel extends CI_Model {

    public function getById($id_nature) {
        $this->db->where('id_nature', $id_nature);
        return $this->db->get('nature')->row_array();
    }

    public function getAll() {
        return $this->db->get('nature')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('nature', $data);
    }

    public function update($id_nature, $data) {
        $this->db->where('id_nature', $id_nature);
        return $this->db->update('nature', $data);
    }

    public function delete($id_nature) {
        $this->db->where('id_nature', $id_nature);
        return $this->db->delete('nature');
    }
}
?>
