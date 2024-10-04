<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nature extends CI_Model {

    public function GetAll () {
        $query = $this->db->get('nature');
        return $query->result_array();
    }

    public function GetById ($id) {
        $this->db->where('id_nature', $id);
        $query = $this->db->get('nature');
        return $query->row_array();
    }

    public function Insert($data) {
        return $this->db->insert('nature', $data);
    }

    public function delete($id) {
        $this->db->where('id_nature', $id);
        return $this->db->delete('nature');
    }
    
    public function deleteAll() {
        $this->db->truncate('nature');
   }
}

?>