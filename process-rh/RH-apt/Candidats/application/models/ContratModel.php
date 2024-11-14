<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContratModel extends CI_Model {
    
    // Mettre à jour un canal existant
    public function update($id, $data) {
        $this->db->where('id_contrat', $id);
        return $this->db->update('contrat', $data);
    }


    //insertion sans contrainte(any ambany le misy)
    // public function insert($dateDebut, $dateFin, $dateRenvoie, $idPersonnel, $idTypeContrat, $idPoste){
    //     $data=array(
    //         'date_Debut'=>$dateDebut,
    //         'date_Fin'=>$dateFin,
    //         'date_Renvoie'=>$dateRenvoie,
    //         'id_personnel'=>$idPersonnel,
    //         'id_type_contrat'=>$idTypeContrat,
    //         'id_poste'=>$idPoste
    //     );
    //     return $this->db->insert('contrat',$data);
    // }   
    
    // Insérer un nouveau poste
    public function insert($data) {
        return $this->db->insert('contrat', $data);
    }

    public function getAll(){
        $query=$this->db->get('contrat');
        return $query->result_array();
    }

    public function getAllByType($idType){
        $query=$this->db->where('id_type_contrat', $idType)->get('contrat');
        return $query->result_array();
    }

    public function getAllWithPersonAndContrat()
    {
        $this->db->select('contrat.*, personnel.*, poste.nom as poste_nom, personnel.nom as personnel_nom, type_contrat.nom as nom_type_contrat');
        $this->db->from('contrat');
        $this->db->join('personnel', 'contrat.id_personnel = personnel.id_personnel');
        $this->db->join('poste', 'poste.id_poste = contrat.id_poste');
        $this->db->join('type_contrat', 'type_contrat.id_type_contrat = contrat.id_type_contrat');
        $this->db->order_by('contrat.date_debut', 'DESC');
        $this->db->order_by('contrat.id_personnel', 'DESC');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getAllWithPersonAndContratNonRenvoye()
    {
        $this->db->select('contrat.*, personnel.*, poste.nom as poste_nom, personnel.nom as personnel_nom, type_contrat.nom as nom_type_contrat');
        $this->db->from('contrat');
        $this->db->join('personnel', 'contrat.id_personnel = personnel.id_personnel');
        $this->db->join('poste', 'poste.id_poste = contrat.id_poste');
        $this->db->join('type_contrat', 'type_contrat.id_type_contrat = contrat.id_type_contrat');
        $this->db->where('date_renvoie', 'NOT NULL');
        $this->db->order_by('contrat.date_debut', 'DESC');
        $this->db->order_by('contrat.id_personnel', 'DESC');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllByPersonnel($idPersonnel)
    {
        $this->db->select('*');
        $this->db->from('contrat');
        $this->db->where('id_personnel', $idPersonnel);
        $this->db->order_by('date_debut', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getContratsBetween($date_debut, $date_fin){
        $this->db->select('*');
        $this->db->from('contrat');
        if ($date_debut !== NULL) {
            $this->db->where('date_debut >=', $date_debut);
        }
        if ($date_fin !== NULL) {
            $this->db->where('date_fin <=', $date_fin);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    //sode ilaina oe maka id type contrat par rapport anle anarana ex:'CDI, cdd'
    private function getIdTypeContratByName($nom)
    {
        $this->db->select('id_type_contrat');
        $this->db->from('type_contrat');
        $this->db->where('nom', $nom); 

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->id_type_contrat;
        } else {
            return NULL;
        }
    }

    public function validDateDuration($date_debut, $date_fin, $idTypeContrat)
    {
        if (strtotime($date_fin) <= strtotime($date_debut)) {
            return 'La date de fin doit être supérieure à la date de début.';
        }
        $date_debut = new DateTime($date_debut);
        $date_fin = new DateTime($date_fin);
        $interval = $date_debut->diff($date_fin);
        $dureeMois = ($interval->y * 12) + $interval->m;
        if ($idTypeContrat == $this->getIdTypeContratByName('Periode essaie')) {
            if ($dureeMois < 3) {
                return 'La durée d\' une Période d\'essaie doit être supérieure à 3 mois.';
            } elseif ($dureeMois > 6) { 
                return 'La durée d\' une Période d\'essaie doit être inférieure à 6 mois.';
            }
        }
        //mi test raha ohatra ka cdd ilay id contrat nampidirina
        if ($idTypeContrat == $this->getIdTypeContratByName('CDD')) {
            if ($dureeMois < 6) {
                return 'La durée d\' un CDD doit être supérieure à 6 mois.';
            } elseif ($dureeMois > 24) { 
                return 'La durée d\' un CDD doit être inférieure à 2 ans.';
            }
        }
        if ($idTypeContrat == $this->getIdTypeContratByName('CDI')) {
            if ($dureeMois < 6) {
                return 'La durée d\' un CDI doit être supérieure à 6 mois.';
            } 
        }
        return TRUE;
    }

    //mijery raha misy contrat en cours
    public function isContratEnCours($idPersonnel, $date)
    {
        $date = date('Y-m-d', strtotime($date));
        $this->db->select('id_contrat');
        $this->db->from('contrat');
        $this->db->where('id_personnel', $idPersonnel);
        $this->db->where('date_debut <=', $date);
        $this->db->group_start();
        $this->db->where('date_fin >=', $date); 
        $this->db->or_where('date_fin IS NULL');
        $this->db->group_end();
        // SELECT id_contrat
        // FROM contrat
        // WHERE id_personnel = ? 
        // AND date_debut <= ? 
        // AND (date_fin >= ? OR date_fin IS NULL);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return TRUE; // contrat en cours
        } else {
            return FALSE;
        }
    }

    // inserer contrat avec contrainte
    public function insertContrat($dateDebut, $dateFin, $idPersonnel, $idTypeContrat, $id_poste)
    {
        $validation = $this->validDateDuration($dateDebut, $dateFin, $idTypeContrat);
        
        if ($validation !== TRUE) {
            //message d'erreur
            return $validation;
        }
        if ($this->isContratEnCours($idPersonnel, $dateDebut)) {
            //na tsy aiko ze date tinla
            return "Encore un contrat en cours";
        }
        $data = array(
            'date_debut' => $dateDebut,
            'date_fin' => $dateFin,
            'date_renvoie' => null,
            'id_personnel' => $idPersonnel,
            'id_type_contrat' => $idTypeContrat,
            'id_poste' => $id_poste
        );

        $this->db->insert('contrat', $data);

        // id anle contrat inserer
        return $this->db->insert_id();
    }
}
?>