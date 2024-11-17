<?php

class ResultatSimulation extends CI_Model {

    // Fonction pour insérer un résultat de simulation
    public function insert($data) {
        return $this->db->insert('resultat_simulation', $data);
    }
}
