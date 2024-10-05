<?php
class CentreModel extends CI_Model {

    public function getById($id_centre) {
        $this->db->where('id_centre', $id_centre);
        return $this->db->get('centre')->row();
    }

    public function getAll() {
        return $this->db->get('centre')->result();
    }

    public function insert($data) {
        return $this->db->insert('centre', $data);
    }

    public function update($id_centre, $data) {
        $this->db->where('id_centre', $id_centre);
        return $this->db->update('centre', $data);
    }

    public function delete($id_centre) {
        $this->db->where('id_centre', $id_centre);
        return $this->db->delete('centre');
    }
}
?>