<?php

class DomaineModel extends CI_Model {

    // Fonction pour obtenir tous les domaines
    public function getAllDomaine() {
        return $this->db->get('domaine')->result();
    }
}

defined('BASEPATH') or exit('No direct script access allowed');

class DomainModel extends CI_Model {
    public function getAll(){
        $this->db->get('domain');
    }
}