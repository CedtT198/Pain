<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FournisseurModel extends CI_Model {
    
    public function getById($id_fournisseur) {
        $this->db->where('id_fournisseur', $id_fournisseur);
        return $this->db->get('fournisseur')->row_array();
    }

    public function getAll() {
        return $this->db->get('fournisseur')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('fournisseur', $data);
    }

    public function update($id_fournisseur, $data) {
        $this->db->where('id_fournisseur', $id_fournisseur);
        return $this->db->update('fournisseur', $data);
    }

    public function delete($id_fournisseur) {
        $this->db->where('id_fournisseur', $id_fournisseur);
        return $this->db->delete('fournisseur');
    }
}
