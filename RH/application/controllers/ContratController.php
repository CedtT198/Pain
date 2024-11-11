<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContratController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PersonnelModel');
        $this->load->model('ContratModel');
        $this->load->model('PosteModel');
        $this->load->model('TypeContratModel');
    }

    public function index() {
        $data['personnels'] = $this->PersonnelModel->getAll();
        $data['postes'] = $this->PosteModel->getAll();
        $data['type_contrats'] = $this->TypeContratModel->getAll();
        $data['contents'] = 'page/FormulaireContrat';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireContrat';
        $this->load->view('template/template', $data);
    }
    
    public function insert() {
        // $data = array(
        //     'date_debut' => $this->input->post('date_debut'),
        //     'date_fin' => $this->input->post('date_fin'),
        //     'date_renvoie' => null,
        //     'id_personnel' => $this->input->post('personnel'),
        //     'id_type_contrat' => $this->input->post('type_contrat'),
        //     'id_poste' => $this->input->post('poste')
        // );
        
        $date_debut = $this->input->post('date_debut');
        $date_fin = $this->input->post('date_fin');
        $date_renvoie = null;
        $id_personnel = $this->input->post('personnel');
        $id_type_contrat = $this->input->post('type_contrat');
        $id_poste = $this->input->post('poste');

        $response = $this->ContratModel->insertContrat($date_debut, $date_fin, $id_personnel, $id_type_contrat, $id_poste);
        
        if (is_int($response)) $data['success'] = 'Insertion effectué avec succès';
        else $data['error'] = $response;

        $data['personnels'] = $this->PersonnelModel->getAll();
        $data['postes'] = $this->PosteModel->getAll();
        $data['type_contrats'] = $this->TypeContratModel->getAll();
        $data['contents'] = 'page/FormulaireContrat';
        $this->load->view('template/template', $data);
    }
}
?>