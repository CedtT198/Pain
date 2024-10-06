<?php
class RepartitionModel extends CI_Model {
    public function canBeReparted($id_charge, $taux_input) {
        $reparted = $this->getRepartitionCentre($id_charge);

        $total = 0;
        foreach ($reparted as $rep) {
            $total += $rep['taux'];
        }

        if ($total+$taux_input < 100)
            return true;
        return false;
    }

    public function getAll() {
        return $this->db->get('repartition_centre')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('repartition_centre', $data);
    }

    public function getRepartitionCentre($id_charge) {
        $this->db->where('id_charge', $id_charge);
        return $this->db->get('repartition_centre')->result_array();
    }
}
?>