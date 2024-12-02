<?php
class PersonnelSalaireModel extends CI_Model {
    public function insert($data) {
        return $this->db->insert('personnel_salaire', $data); // Insère une rupture de contrat
    }

    public function getAll() {
        $query = $this->db->get('personnel_salaire'); 
        return $query->result_array();
    }

}
