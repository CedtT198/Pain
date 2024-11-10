<?php
class AnnonceModel extends CI_Model {
    
    // Récupérer toutes les annonces avec les noms des canaux et postes
    public function getAll() {
        $this->db->select('annonce.*, canal.nom AS canal_nom, poste.nom AS poste_nom');
        $this->db->from('annonce');
        $this->db->join('canal', 'canal.id_canal = annonce.id_canal');
        $this->db->join('poste', 'poste.id_poste = annonce.id_poste');
        $query = $this->db->get();
        return $query->result();
    }

    // Récupérer une annonce par son ID
    public function getById($id) {
        $this->db->select('annonce.*, canal.nom AS canal_nom, poste.nom AS poste_nom');
        $this->db->from('annonce');
        $this->db->join('canal', 'canal.id_canal = annonce.id_canal');
        $this->db->join('poste', 'poste.id_poste = annonce.id_poste');
        $this->db->where('annonce.id_annonce', $id);
        $query = $this->db->get();
        return $query->row(); // Utilise `row` pour un seul enregistrement
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
