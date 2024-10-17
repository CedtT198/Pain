<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UniteOeuvreModel extends CI_Model {

    public function getAll () {
        $query = $this->db->get('unite_oeuvre');
        return $query->result_array();
    }

    public function getById ($id) {
        $this->db->where('id_unite_oeuvre', $id);
        $query = $this->db->get('unite_oeuvre');
        return $query->row_array();
    }

    public function Insert($data) {
        return $this->db->insert('unite_oeuvre', $data);
    }

    public function delete($id) {
        $this->db->where('id_unite_oeuvre', $id);
        return $this->db->delete('unite_oeuvre');
    }
    
    public function deleteAll() {
        $this->db->truncate('unite_oeuvre');
   }
}

?>