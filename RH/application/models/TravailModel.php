<?php
class TravailModel extends CI_Model {

    public function getById($id_travail) {
        $this->db->where('id_travail', $id_travail);
        $query = $this->db->get('travail');
        return $query->row();
    }
}
?>