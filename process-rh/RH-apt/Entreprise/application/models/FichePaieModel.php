<?php
class FichePaieModel extends CI_Model {

    public function calcul_heures_supplementaires($salaireHoraire, $heuresSupp, $tauxMajoration) {
        $majoration = $salaireHoraire * ($tauxMajoration / 100);
        $paiement = $heuresSupp * ($salaireHoraire + $majoration);
        return $paiement;
    }
        

    public function getDateDeTravail($idPersonnel) { 
        $personnel = $this->db->get_where('personnel', ['id_personnel' => $idPersonnel])->row();

        if (!$personnel) {
            return 'Personnel non trouvé.';
        }
    
        $dateEmbauche = new DateTime($personnel->date_embauche);
    
        $ruptureContrat = $this->db->get_where('rupture_contrat', ['id_personnel' => $idPersonnel])->row();
    
        if (!$ruptureContrat) {
            $dateRuptureContrat = new DateTime();  //contrat  en cours
        } else {
            $dateRuptureContrat = new DateTime($ruptureContrat->date_rupture_contrat);
        }
    
        $date = []; 
    
        while ($dateEmbauche <= $dateRuptureContrat) {
            $date[] = $dateEmbauche->format('M') . $dateEmbauche->format('Y');
            
            $dateEmbauche->modify('+1 month');
        }
    
        return $date;
    }

    public function getAllCongeByIdPersonnel($id_personnel) {
        $this->db->select('date_debut, date_fin, id_type_conge');
        $this->db->from('conge');
        $this->db->where('id_personnel', $id_personnel);
        $this->db->group_by(['date_debut', 'date_fin', 'id_type_conge']);
        $this->db->order_by('date_debut', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTauxJournalier($salaireBase, $joursParMois) {
        $tauxJournalier = $salaireBase / $joursParMois;
        return $tauxJournalier;
    }
    
    public function getTauxHoraire( $tauxJournalier, $heuresParJour) {
        $tauxHoraire = $tauxJournalier / $heuresParJour;
        return $tauxHoraire; 
    }
}