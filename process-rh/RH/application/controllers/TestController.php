<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CandidatureModel');
        $this->load->model('TestModel');
    }

    public function index() {
        $data['candidatures'] = $this->CandidatureModel->getAll();
        $data['contents'] = 'page/FormulaireTest';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['tests'] = $this->TestModel->getAll();
        $data['contents'] = 'page/ListeTest';
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $data = array(
            'id_candidature' => $this->input->post('id_candidature'),
            'date_test' => $this->input->post('date_test')
        );
        $this->TestModel->insert($data);
        
        $data['success'] = 'Date de test enregistré ! ';
        $data['tests'] = $this->CandidatureModel->getAll();
        $data['contents'] = 'page/FormulaireTest';
        $this->load->view('template/template', $data);
    }
}
?>