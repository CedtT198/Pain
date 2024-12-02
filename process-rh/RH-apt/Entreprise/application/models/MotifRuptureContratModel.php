<?php
class MotifRuptureContratModel extends CI_Model {
    public function insert($data) {
        return $this->db->insert('motif_rupture_contrat', $data); 
    }

    public function getById($id) {
        $this->db->where('id_rupture_contrat', $id);
        $query = $this->db->get('motif_rupture_contrat'); 
        return $query->row_array();
    }

    public function getAll() {
        $query = $this->db->get('motif_rupture_contrat'); 
        return $query->result_array();
    }

    public function update($id, $data) {
        $this->db->where('id_rupture_contrat', $id);
        return $this->db->update('motif_rupture_contrat', $data);
    }

    public function delete($id) {
        $this->db->where('id_rupture_contrat', $id);
        return $this->db->delete('motif_rupture_contrat'); 
    }
}
