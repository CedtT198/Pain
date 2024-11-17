<?php

class MotCleModel extends CI_Model {

    // Fonction pour obtenir tous les mots-clés pour un domaine donné
    public function getAllMotCleByDomaine($idDomaine) {
        $this->db->select('mc.*');
        $this->db->from('mot_cle_domaine mcd');
        $this->db->join('mot_cle mc', 'mcd.id_mot_cle = mc.id_mot_cle');
        $this->db->where('mcd.id_domaine', $idDomaine);
        return $this->db->get()->result();
    }
}
