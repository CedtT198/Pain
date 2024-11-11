<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultatTestController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CandidatureModel');
        $this->load->model('ResultatTestModel');
    }

    public function index() {
        $data['candidatures'] = $this->CandidatureModel->getAll();
        $data['contents'] = 'page/FormulaireResultatTest';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['results'] = $this->ResultatTestModel->getAllWithCandidature();
        $data['contents'] = 'page/ListeResultatTest';
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $note = $this->input->post('note');

        if ($note < 0) $data['error'] = 'Note doit être supérieur ou égale à 0.';
        else if ($note > 20) $data['error'] = 'Note doit être inférieur ou égale à 20.';
        else {   
            $data = array(
                'id_candidature' => $this->input->post('id_candidature'),
                'date_resultat_test' => $this->input->post('date_resultat_test'),
                'note' => $note
            );
            $this->ResultatTestModel->insert($data);
            
            $data['success'] = 'Résultat de test Enregistré ! ';
        }
        $data['candidatures'] = $this->CandidatureModel->getAll();
        $data['contents'] = 'page/FormulaireResultatTest';
        $this->load->view('template/template', $data);
    }
}
?>