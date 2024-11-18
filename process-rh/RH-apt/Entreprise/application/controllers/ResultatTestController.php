<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultatTestController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CandidatureModel');
        $this->load->model('ResultatTestModel'); 
        $this->load->model('NotificationModel'); 
        $this->load->model('TestModel');
    }

    public function index() {
        $data['tests'] = $this->TestModel->getAll();
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
                'id_test' => $this->input->post('id_test'),
                'date_resultat_test' => $this->input->post('date_resultat_test'),
                'note' => $note
            );
            $id_resultat_test = $this->ResultatTestModel->insert($data);
            
            $dataNotif = array(
                'date_notification' => date('Y-m-d'),
                'vu' => false,
                'id_candidature' => $this->TestModel->getById($this->input->post('id_test'))['id_candidature'],
                'id_test' => null,
                'id_annonce' => null,
                'id_resultat_test' => $id_resultat_test,
                'id_rendez_vous' => null
            );
            $this->NotificationModel->insert($dataNotif);
            
            $data['success'] = 'Résultat de test Enregistré ! ';
        }
        $data['tests'] = $this->TestModel->getAll();
        $data['candidatures'] = $this->CandidatureModel->getAll();
        $data['contents'] = 'page/FormulaireResultatTest';
        $this->load->view('template/template', $data);
    }
}
?>