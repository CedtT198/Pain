<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
    
class RubriqueModel extends CI_Model {

    public function getAll () {
        $query = $this->db->get('rubrique');
        return $query->result_array();
    }
    
    public function getAllCharge () {
        $query = $this->db->query('select * from v_all_charge');
        return $query->result_array();
    }
    
    public function getTotalJoin() {
        $query = $this->db->query('select * from v_total_join');
        return $query->result_array();
    }
    
    public function getTotalMontant () {
        $query = $this->db->query('select * from total_montant');
        return $query->result_array();
    }

    public function getTotalNature () {
        $query = $this->db->query('select * from total_nature');
        return $query->result_array();
    }
    
    public function getTotalRepartition () {
        $query = $this->db->query('select * from total_repart');
        return $query->result_array();
    }

    public function getById ($id) {
        $this->db->where('id_rubrique', $id);
        $query = $this->db->get('rubrique');
        return $query->row_array();
    }

    public function insert($data) {
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