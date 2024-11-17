<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DomainModel extends CI_Model {
    public function getAll(){
        $this->db->get('domain');
    }
}