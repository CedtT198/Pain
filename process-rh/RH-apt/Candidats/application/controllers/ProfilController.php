<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TravailModel');
        $this->load->model('CandidatureModel');
        $this->load->model('ExperienceTravailModel');
    }

    public function index() {
        $id = $this->session->userdata('id_can');
        $data['candidat'] = $this->CandidatureModel->getById($id);
        $data['experiences'] = $this->ExperienceTravailModel->getById($id);
        $data['travails'] = $this->TravailModel->getAll();
        $data['contents'] = 'page/Profil';
        $this->load->view('template/template', $data);
    }
    
    public function addExperiences() {
        $id = $this->session->userdata('id_can');
        $exp = $this->input->post('exp');

        if ($exp < 0) $data['error'] = 'Durée d\'expérience doit être supérieur ou égale à 0.';
        else if ($exp > 50) $data['error'] = 'Soyez réaliste quand même je vous pris.';
        else {   
            $data = array(
                'id_travail' => $this->input->post('travail'),
                'id_candidature' => $id,
                'duree' => $exp
            );
            $this->ExperienceTravailModel->insert($data);
            
            $data['success'] = 'Vos expériences professionnelles ont été ajouté à votre candidature. ! ';
        }

        $data['candidat'] = $this->CandidatureModel->getById($id);
        $data['experiences'] = $this->ExperienceTravailModel->getById($id);
        $data['travails'] = $this->TravailModel->getAll();
        $data['contents'] = 'page/Profil';
        $this->load->view('template/template', $data);
    }

}
?>