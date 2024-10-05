<?php
class CentreModel extends CI_Model {

    public function getById($id_repartition) {
        $this->db->where('id_repartition', $id_repartition);
        return $this->db->get('repartition')->row();
    }

    public function getAll() {
        return $this->db->get('repartition')->result();
    }

    public function insert($data) {
        return $this->db->insert('repartition', $data);
    }

    public function update($id_repartition, $data) {
        $this->db->where('id_repartition', $id_repartition);
        return $this->db->update('repartition', $data);
    }

    public function delete($id_repartition) {
        $this->db->where('id_repartition', $id_repartition);
        return $this->db->delete('repartition');
    }
}
?>