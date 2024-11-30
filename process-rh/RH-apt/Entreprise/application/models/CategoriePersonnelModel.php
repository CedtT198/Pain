<?php
class CategoriePersonnelModel extends CI_Model {

    public function getAll() {
        $query = $this->db->get('categorie_personnel');
        return $query->result_array();
    }
}