<?php
class RepartitionModel extends CI_Model {

    public function getById($id_repartition_centre) {
        $this->db->where('id_repartition_centre', $id_repartition_centre);
        return $this->db->get('repartition_centre')->row();
    }

    public function getAll() {
        return $this->db->get('repartition_centre')->result();
    }

    public function insert($data) {
        return $this->db->insert('repartition_centre', $data);
    }

    public function update($id_repartition_centre, $data) {
        $this->db->where('id_repartition_centre', $id_repartition_centre);
        return $this->db->update('repartition_centre', $data);
    }

    public function delete($id_repartition_centre) {
        $this->db->where('id_repartition_centre', $id_repartition_centre);
        return $this->db->delete('repartition_centre');
    }
    public function getRepartitionCentre($id_charge) {
        $this->db->where('id_charge', $id_charge);
        return $this->db->get('repartition_centre')->result();
    }
}
?>