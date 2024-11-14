<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExperienceTravailController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TravailModel');
        $this->load->model('CandidatureModel');
        $this->load->model('ExperienceTravailModel');
    }

    public function index() {
        $data['travails'] = $this->TravailModel->getAll();
        $data['candidatures'] = $this->CandidatureModel->getAll();
        $data['contents'] = 'page/FormulaireExperienceTravail';
        $this->load->view('template/template', $data);
    }
    
    public function insert() {
        $exp = $this->input->post('exp');

        if ($exp < 0) $data['error'] = 'Durée d\'expérience doit être supérieur ou égale à 0.';
        else if ($exp > 50) $data['error'] = 'Soyez réaliste quand même je vous pris.';
        else {   
            $data = array(
                'id_travail' => $this->input->post('travail'),
                'id_candidature' => $this->input->post('id_candidature'),
                'duree' => $exp
            );
            $this->ExperienceTravailModel->insert($data);
            
            $data['success'] = 'Vos expériences professionnelles ont été ajouté à votre candidature. ! ';
        }
        $data['travails'] = $this->TravailModel->getAll();
        $data['candidatures'] = $this->CandidatureModel->getAll();
        $data['contents'] = 'page/FormulaireExperienceTravail';
        $this->load->view('template/template', $data);
    }

}
?>