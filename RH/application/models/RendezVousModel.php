<?php
class RendezVousModel extends CI_Model {

    public function getAll() {
        $query = $this->db->get('rendez_vous');
        return $query->result();
    }
}
?>