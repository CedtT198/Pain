<?php
class SalaireModel extends CI_Model {


    public function getSalaireActuel($idPersonnel){
        $this->db->select('salaire.montant');
        $this->db->from('personnel_salaire');
        $this->db->join('salaire', 'personnel_salaire.id_salaire = salaire.id_salaire');
        $this->db->where('personnel_salaire.id_personnel', $idPersonnel);
        $this->db->order_by('personnel_salaire.date_salaire', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return $query->row_array();
        }

        return null;
    }

    public function insert($data) {
        return $this->db->insert('salaire', $data); // Insère une rupture de contrat
    }

    public function getById($id) {
        $this->db->where('id_salaire', $id);
        $query = $this->db->get('salaire'); 
        return $query->row_array();
    }

    public function getAll() {
        $query = $this->db->get('salaire'); 
        return $query->result_array();
    }

    public function update($id, $data) {
        $this->db->where('id_salaire', $id);
        return $this->db->update('salaire', $data);
    }

    public function delete($id) {
        $this->db->where('id_salaire', $id);
        return $this->db->delete('salaire'); 
    }
}
