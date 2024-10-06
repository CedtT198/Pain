<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
class RubriqueModel extends CI_Model {

    public function GetAll () {
        $query = $this->db->get('rubrique');
        return $query->result_array();
    }

    public function GetById ($id) {
        $this->db->where('id_rubrique', $id);
        $query = $this->db->get('rubrique');
        return $query->row_array();
    }

    public function Insert($data) {
        return $this->db->insert('rubrique', $data);
    }

    public function delete($id) {
        $this->db->where('id_rubrique', $id);
        return $this->db->delete('rubrique');
    }
    
    public function deleteAll() {
        $this->db->truncate('rubrique');
   }
}

?>