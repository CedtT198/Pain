<?php
class ContratAvenantModel extends CI_Model {
    public function insert($data) {
        return $this->db->insert('contrat_avenant', $data);
    }

    public function getById($id) {
        $this->db->where('id_contrat', $id);
        $query = $this->db->get('contrat_avenant'); 
        return $query->row_array();
    }

    public function getAll() {
        $query = $this->db->get('contrat_avenant'); 
        return $query->result_array();
    }

    public function update($id, $data) {
        $this->db->where('id_contrat', $id);
        return $this->db->update('contrat_avenant', $data);
    }

    public function delete($id) {
        $this->db->where('id_contrat', $id);
        return $this->db->delete('contrat_avenant'); 
    }
}
