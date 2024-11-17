<?php

class DomaineModel extends CI_Model {

    // Fonction pour obtenir tous les domaines
    public function getAllDomaine() {
        return $this->db->get('domaine')->result();
    }
}
