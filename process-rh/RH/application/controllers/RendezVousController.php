<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RendezVousController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CandidatureModel');
        $this->load->model('RendezVousModel');
    }

    public function index() {
        $data['candidatures'] = $this->CandidatureModel->getAll();
        $data['contents'] = 'page/FormulaireRendezVous';
        $this->load->view('template/template', $data);
    }
    
    public function index2() {
        $data['all_rendez_vous'] = $this->RendezVousModel->getAllWithCandidature();
        $data['contents'] = 'page/ListeRendezVous';
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $data = array(
            'id_candidature' => $this->input->post('id_candidature'),
            'date_rendez_vous' => $this->input->post('date_rendez_vous')
        );
        $this->RendezVousModel->insert($data);
        
        $data['candidatures'] = $this->CandidatureModel->getAll();
        $data['success'] = 'Résultat de test Enregistré ! ';
        $data['contents'] = 'page/FormulaireRendezVous';
        $this->load->view('template/template', $data);
    }
}
?>