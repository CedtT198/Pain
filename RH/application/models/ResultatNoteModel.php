<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ResultatNoteModel extends CI_Model {
    //get all resultat note test par ordre decroissant
    public function getAll(){
        $query = $this->db->order_by('note', 'DESC')->get('resultat_test');
        return $query->result();
    }
}
?>