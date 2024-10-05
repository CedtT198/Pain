
<?php
class ChargeModel extends CI_Model {


    public function insert($data) {
        return $this->db->insert('charge', $data);
    }

    public function getById($id_charge) {
        $this->db->where('id_charge', $id_charge);
        return $this->db->get('charge')->row();
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
        return $this->db->get('charge')->result();
    }

    public function getAll() {
        return $this->db->get('charge')->result();
    }

    public function getTotalChargeFixe($id_repartition) {
        $this->db->select_sum('montant');
        $this->db->join('charge', 'charge.id_charge = charge_repartition.id_charge');
        $this->db->where('charge.id_nature', 2); // Nature fixe
        $this->db->where('id_repartition', $id_repartition);
        return $this->db->get('charge_repartition')->row()->montant;
    }

    public function getTotalChargeVariable($id_repartition) {
        $this->db->select_sum('montant');
        $this->db->join('charge', 'charge.id_charge = charge_repartition.id_charge');
        $this->db->where('charge.id_nature', 1); // Nature variable
        $this->db->where('id_repartition', $id_repartition);
        return $this->db->get('charge_repartition')->row()->montant;
    }

    public function getTotalCharges($id_repartition) {
        $this->db->select_sum('montant');
        $this->db->join('charge', 'charge.id_charge = charge_repartition.id_charge');
        $this->db->where('id_repartition', $id_repartition);
        return $this->db->get('charge_repartition')->row()->montant;
    }
}
?>
