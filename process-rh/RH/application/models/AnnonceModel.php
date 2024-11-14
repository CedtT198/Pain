<?php
class AnnonceModel extends CI_Model {
    
    // Récupérer toutes les annonces avec les noms des canaux et postes
    public function getAll() {
        $this->db->select('annonce.*, canal.nom AS canal_nom, poste.nom AS poste_nom');
        $this->db->from('annonce');
        $this->db->join('canal', 'canal.id_canal = annonce.id_canal');
        $this->db->join('poste', 'poste.id_poste = annonce.id_poste');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getAllWithTravail() {
        $this->db->select('annonce.*, canal.nom AS canal_nom, poste.nom AS poste_nom, travail.nom AS travail_nom');
        $this->db->from('annonce');
        $this->db->join('canal', 'canal.id_canal = annonce.id_canal');
        $this->db->join('poste', 'poste.id_poste = annonce.id_poste');
        $this->db->join('travail', 'travail.id_travail = annonce.id_travail');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllJointure() {
        $this->db->select('annonce.*, canal.nom AS canal_nom, poste.nom AS poste_nom, travail.nom AS travail_nom, type_contrat.nom AS nom_type_contrat');
        $this->db->from('annonce');
        $this->db->join('canal', 'canal.id_canal = annonce.id_canal');
        $this->db->join('poste', 'poste.id_poste = annonce.id_poste');
        $this->db->join('travail', 'travail.id_travail = annonce.id_travail');
        $this->db->join('type_contrat', 'type_contrat.id_type_contrat = annonce.id_type_contrat');
        $query = $this->db->get();
        return $query->result_array();
    }
    

    // Récupérer une annonce par son ID
    public function getById($id) {
        $this->db->select('annonce.*, canal.nom AS canal_nom, poste.nom AS poste_nom');
        $this->db->from('annonce');
        $this->db->join('canal', 'canal.id_canal = annonce.id_canal');
        $this->db->join('poste', 'poste.id_poste = annonce.id_poste');
        $this->db->where('annonce.id_annonce', $id);
        $query = $this->db->get();
        return $query->row_array(); // Utilise `row` pour un seul enregistrement
    }

    // Insérer une nouvelle annonce
    public function insert($data) {
        return $this->db->insert('annonce', $data);
    }

    // Mettre à jour une annonce existante
    public function update($id, $data) {
        $this->db->where('id_annonce', $id);
        return $this->db->update('annonce', $data);
    }

    // Supprimer une annonce
    public function delete($id) {
        $this->db->where('id_annonce', $id);
        return $this->db->delete('annonce');
    }
}
?>
