<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RendezVousController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CandidatureModel');
        $this->load->model('RendezVousModel'); 
        $this->load->model('NotificationModel'); 
    }

    public function index() {
        $data['candidatures'] = $this->CandidatureModel->getAllAvecMoyenne();
        $data['contents'] = 'page/FormulaireRendezVous';
        $this->load->view('template/template', $data);
    }
    
    public function index2() {
        $data['all_rendez_vous'] = $this->RendezVousModel->getAllWithCandidature();
        $data['contents'] = 'page/ListeRendezVous';
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $id_candidature = $this->input->post('id_candidature');
        $data = array(
            'id_candidature' => $id_candidature,
            'date_rendez_vous' => $this->input->post('date_rendez_vous')
        );
        $id_rendez_vous = $this->RendezVousModel->insert($data);
        // echo $id_rendez_vous;
        $dataNotif = array(
            'date_notification' => date('Y-m-d'),
            'vu' => false,
            'id_candidature' => $id_candidature,
            'id_test' => null,
            'id_annonce' => null,
            'id_resultat_test' => null,
            'id_rendez_vous' => $id_rendez_vous
        );
        $this->NotificationModel->insert($dataNotif);
        
        $data['candidatures'] = $this->CandidatureModel->getAll();
        $data['success'] = 'Résultat de test Enregistré ! ';
        $data['contents'] = 'page/FormulaireRendezVous';
        $this->load->view('template/template', $data);
    }
}
?>