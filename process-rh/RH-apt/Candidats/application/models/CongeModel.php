<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CongeModel extends CI_Model {
    // Récupérer les droits de congés
    public function getDroitCongeCumule($idPersonnel) {
        return $this->db->get_where('droit_conge_cumule', ['id_personnel' => $idPersonnel])->row();
        // nisala2 za oe ato ve no atao le oe max cumule en 3 ans sa controller fa teneno eo ftsn za
    }

    // Mettre à jour les droits cumulés
    public function updateConge($idPersonnel, $new_days, $date) {
        // new days io le nb jours total vao2 conge afaka alainy
        // ohatra oe juste nanao update par mois anle jour de conge disponible ve sa nisy naka conge dia lasa le jour dispo-nbJnalaina
        $this->db->where('id_personnel', $idPersonnel);
        return $this->db->update('droit_conge_cumule', [
            'droit_de_conge' => $new_days,
            'last_update' => $date
        ]);
    }
}