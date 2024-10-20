<?php
class CaisseModel extends CI_Model {
    public function getAll() {
        return $this->db->get('caisse')->row_array();
    }
}
?>