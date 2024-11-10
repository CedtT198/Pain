<?php
class AnnonceModel extends CI_Model {
    public function getAll() {
        $this->db->select('annonce.*, canal.nom AS canal_nom, poste.nom AS poste_nom');
        $this->db->from('annonce');
        $this->db->join('canal', 'canal.id_canal = annonce.id_canal');
        $this->db->join('poste', 'poste.id_poste = annonce.id_poste');
        $query = $this->db->get();
        return $query->result();
    }
    public function insert($data) {
        return $this->db->insert('annonce', $data);
    }
}
?>