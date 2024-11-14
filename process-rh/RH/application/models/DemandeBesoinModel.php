<?php
class DemandeBesoinModel extends CI_Model {
    
    // Récupérer tous les canaux
    // public function getAll() {
    //     $query = $this->db->get('demande_besoin_rh');
    //     return $query->result_array();
    // }
    
    public function getAll() {
        $sql = "
            select * from demande_besoin_rh join departement on departement.id_departement = demande_besoin_rh.id_demande_besoin
            join poste on poste.id_poste = demande_besoin_rh.id_poste
        ";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // Récupérer un demande_besoin_rh par son ID
    public function getById($id) {
        $this->db->where('id_demande_besoin', $id);
        $query = $this->db->get('demande_besoin_rh');
        return $query->row_array(); // Utilise `row` pour un seul enregistrement
    }

    // Insérer un nouveau demande_besoin_rh
    public function insert($data) {
        return $this->db->insert('demande_besoin_rh', $data);
    }

    // Mettre à jour un demande_besoin_rh existant
    public function update($id, $data) {
        $this->db->where('id_demande_besoin', $id);
        return $this->db->update('demande_besoin_rh', $data);
    }

    // Supprimer un demande_besoin_rh
    public function delete($id) {
        $this->db->where('id_demande_besoin', $id);
        return $this->db->delete('demande_besoin_rh');
    }
}
?>
