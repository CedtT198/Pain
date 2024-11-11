<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ResultatTestModel extends CI_Model {
    //get all resultat note test par ordre decroissant
    public function getAll(){
        $query = $this->db->order_by('note', 'DESC')->get('resultat_test');
        return $query->result_array();
    }

    public function getAllWithCandidature() {
        $this->db->select('resultat_test.*, candidature.*');
        $this->db->from('resultat_test');
        $this->db->join('candidature', 'resultat_test.id_candidature = candidature.id_candidature');
        $this->db->order_by('note', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data) {
        return $this->db->insert('resultat_test', $data);
    }
}
?>