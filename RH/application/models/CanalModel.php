<?php
class CanalModel extends CI_Model {
    public function getAll() {
        $query = $this->db->get('canal');
        return $query->result();
    }
}

?>