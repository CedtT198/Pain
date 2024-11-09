<?php
defined('BASEPATH') or exit('No direct script access allowed');
class PersonnelModel extends CI_Model {
    public function insert($nom, $prenom, $dateNaissance, $idPoste)
    {
        $data = array(
            'nom' => $nom,
            'prenom' => $prenom,
            'date_naissance' => $dateNaissance,
            'id_poste' => $idPoste
        );

        return $this->db->insert('personnel', $data);
    }
    public function getById($id){
        $this->db->where('id_personnel', $id);
        $query=$this->db->get('personnel');
        return $query->result();
    }
}
?>