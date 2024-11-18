<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CandidatureModel');
        $this->load->model('NotificationModel');
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
        $id_candidature = $this->input->post('id_candidature');
        $date_test = $this->input->post('date_test');

        $data = array(
            'id_candidature' => $id_candidature,
            'date_test' => $date_test
        );
        $id_test = $this->TestModel->insert($data);

        $dataNotif = array(
            'date_notification' => date('Y-m-d'),
            'vu' => false,
            'id_candidature' => $id_candidature,
            'id_test' => $id_test,
            'id_annonce' => null,
            'id_resultat_test' => null,
            'id_rendez_vous' => null
        );
        $this->NotificationModel->insert($dataNotif);
        
        $data['candidatures'] = $this->CandidatureModel->getAll();
        $data['success'] = 'Date de test enregistré ! ';
        $data['tests'] = $this->CandidatureModel->getAll();
        $data['contents'] = 'page/FormulaireTest';
        $this->load->view('template/template', $data);
    }
}
?>