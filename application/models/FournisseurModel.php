<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FournisseurModel extends CI_Model {

    // Fonction pour choisir le meilleur fournisseur pour un produit donné
    public function getBonfournisseur($id_produit) {
        // Récupération des fournisseurs et des prix pour le produit donné
        $this->db->select('fournisseur.id_fournisseur, fournisseur.nom_fournisseur, fournisseur.attribution, produitInFournisseur.montant');
        $this->db->from('fournisseur');
        $this->db->join('produitInFournisseur', 'fournisseur.id_fournisseur = produitInFournisseur.id_fournisseur');
        $this->db->where('produitInFournisseur.id_produit', $id_produit);
        $query = $this->db->get();

        $fournisseurs = $query->result_array();

        if (empty($fournisseurs)) {
            return null;  // Si aucun fournisseur n'est trouvé pour ce produit
        }

        // Initialiser la variable pour stocker le meilleur fournisseur
        $meilleur_fournisseur = null;

        foreach ($fournisseurs as $fournisseur) {
            // Si c'est le premier fournisseur ou s'il est meilleur (priorité à l'attribution)
            if ($meilleur_fournisseur === null ||
                ($fournisseur->attribution > $meilleur_fournisseur->attribution) ||
                ($fournisseur->attribution == $meilleur_fournisseur->attribution &&
                 $fournisseur->montant < $meilleur_fournisseur->montant)) {
                $meilleur_fournisseur = $fournisseur;
            }
        }

        return $meilleur_fournisseur;
    }
}
