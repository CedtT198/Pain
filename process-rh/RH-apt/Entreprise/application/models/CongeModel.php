
<?php
class CongeModel extends CI_Model {



    public function verifier_conge($idPersonnel) {
        // Récupérer l'ancienneté en mois
        $nbMoisTravail = $this->get_anciennete($idPersonnel);

        if ($nbMoisTravail < 12) {
            return false;
        }
        $conge = $this->getNbCongePris($idPersonnel);
        if ( $conge['jours_restant'] < 0 ) {
            return false;
        }
        return true;
    }

    public function getNbCongePris($idPersonnel) {
        $this->db->select('SUM(DATEDIFF(date_fin, date_debut)) as jours_pris');
        $this->db->from('conge');
        $this->db->where('id_personnel', $idPersonnel);
        $query = $this->db->get();
        $result = $query->row();
    
        $moisAnciennete = $this->get_anciennete($idPersonnel);
    
        // limite des jous de conges cumulable à 36 mois 
        $moisAncienneteLimite = min($moisAnciennete, 36);
    
        $joursMax = $moisAncienneteLimite * 2.5;
    
        return [
            'jours_pris' => $result ? $result->jours_pris : 0,
            'jours_restant' => max(0, $joursMax - ($result ? $result->jours_pris : 0))
        ];
    }
    
    // Récupérer l'ancienneté en mois
    private function get_anciennete($idPersonnel) {
        $this->db->select('TIMESTAMPDIFF(MONTH, date_embauche, CURDATE()) as anciennete');
        $this->db->from('personnel');
        $this->db->where('id_personnel', $idPersonnel);
        $query = $this->db->get();
        $result = $query->row();

        return $result ? $result->anciennete : 0;
    }

    public function insert($data) {
        return $this->db->insert('conge', $data);
    }

    public function getAll() {
        $query = $this->db->get('conge');
        return $query->result_array();
    }

    public function getById($id) {
        $this->db->where('id_conge', $id);
        $query = $this->db->get('conge');
        return $query->row_array();
    }

    public function update($id, $data) {
        $this->db->where('id_conge', $id);
        return $this->db->update('conge', $data);
    }

    public function delete($id) {
        $this->db->where('id_conge', $id);
        return $this->db->delete('conge');
    }
}
