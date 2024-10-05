<?php
class TypeChargeModel extends CI_Model {

    public function getById($id_type_charge) {
        $this->db->where('id_type_charge', $id_type_charge);
        return $this->db->get('type_charge')->row();
    }

    public function insert($data) {
        return $this->db->insert('type_charge', $data);
    }

    public function update($id_type_charge, $data) {
        $this->db->where('id_type_charge', $id_type_charge);
        return $this->db->update('type_charge', $data);
    }

    public function delete($id_type_charge) {
        $this->db->where('id_type_charge', $id_type_charge);
        return $this->db->delete('type_charge');
    }
}
?>
