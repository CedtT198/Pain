<?php
class DepartementModel extends CI_Model {

    // Ajouter un département
    public function insert($nom, $mdp) {
        $data = array(
            'nom_departement' => $nom,
            'mdp_departement' => password_hash($mdp, PASSWORD_BCRYPT) // Hasher le mot de passe avec bcrypt
        );

        return $this->db->insert('departement', $data);
    }

    // Obtenir tous les départements
    public function getAll() {
        $query = $this->db->get('departement');
        return $query->result();
    }

    // Obtenir un département par ID
    public function getById($id) {
        $this->db->where('id_departement', $id);
        $query = $this->db->get('departement');
        return $query->row();
    }

    // Mettre à jour un département
    public function update($id, $nom, $mdp = null) {
        $data = array(
            'nom_departement' => $nom
        );

        // Si un nouveau mot de passe est fourni, on le met à jour également
        if (!empty($mdp)) {
            $data['mdp_departement'] = password_hash($mdp, PASSWORD_BCRYPT);
        }

        $this->db->where('id_departement', $id);
        return $this->db->update('departement', $data);
    }

    // Supprimer un département
    public function delete($id) {
        $this->db->where('id_departement', $id);
        return $this->db->delete('departement');
    }
}
?>
