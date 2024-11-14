<?php
class ChargeModel extends CI_Model {

    public function insert($data) {
        $this->db->insert('charge', $data);
        return $this->db->insert_id();
    }

    public function getById($id_charge) {
        $this->db->where('id_charge', $id_charge);
        return $this->db->get('charge')->row_array();
    }

    public function update($id_charge, $data) {
        $this->db->where('id_charge', $id_charge);
        return $this->db->update('charge', $data);
    }

    public function delete($id_charge) {
        $this->db->where('id_charge', $id_charge);
        return $this->db->delete('charge');
    }

    public function getAllByDate($id_rubrique, $date_charge) {
        $this->db->where('id_rubrique', $id_rubrique);
        $this->db->where('date_charge', $date_charge);
        return $this->db->get('charge')->result_array();
    }

    public function getAll() {
        return $this->db->get('charge')->result_array();
    }

    public function getByChargeRubrique($id_charge, $id_rubrique) {
        $sql = "SELECT * FROM charge WHERE id_charge = ? AND id_rubrique = ?";
        $query = $this->db->query($sql, array($id_charge, $id_rubrique));
        return $query->row_array();
    }

    public function getTotalChargeFixeC($id_centre) {
        $this->db->select_sum('montant');
        $this->db->join('charge', 'charge.id_charge = repartition_centre.id_charge');
        $this->db->where('charge.id_nature', 2); // Nature fixe
        $this->db->where('repartition_centre.id_centre', $id_centre);
        return $this->db->get('repartition_centre')->row()->montant;
    }
    
    public function getTotalChargeFixe() {
        $this->db->select_sum('montant');
        $this->db->join('charge', 'charge.id_charge = repartition_centre.id_charge');
        $this->db->where('charge.id_nature', 2); // Nature fixe
        return $this->db->get('repartition_centre')->row()->montant;
    }

    public function getTotalChargeVariableC($id_centre) {
        $this->db->select_sum('montant');
        $this->db->join('charge', 'charge.id_charge = repartition_centre.id_charge');
        $this->db->where('charge.id_nature', 1); // Nature variable
        $this->db->where('repartition_centre.id_centre', $id_centre);
        return $this->db->get('repartition_centre')->row()->montant;
    }
    
    public function getTotalChargeVariable() {
        $this->db->select_sum('montant');
        $this->db->join('charge', 'charge.id_charge = repartition_centre.id_charge');
        $this->db->where('charge.id_nature', 1);
        return $this->db->get('repartition_centre')->row()->montant;
    }

    public function getTotalChargesByCentre($id_centre) {
        $this->db->select_sum('montant');
        $this->db->join('charge', 'charge.id_charge = repartition_centre.id_charge');
        $this->db->where('repartition_centre.id_centre', $id_centre);
        return $this->db->get('repartition_centre')->row()->montant;
    }

    public function getTotalCharges() {
        $this->db->select_sum('montant');
        return $this->db->get('charge')->row()->montant;
    }
}
?>
