<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnnonceController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AnnonceModel');
        $this->load->model('NotificationModel');
        $this->load->model('CandidatureModel');
        $this->load->model('CandidatureInAnnonceModel');
        $this->load->model('CanalModel');
        $this->load->model('TravailModel');
        $this->load->model('TypeContratModel');
        $this->load->model('PosteModel');
    }

    public function index() {
        $data['canals'] = $this->CanalModel->getAll();
        $data['postes'] = $this->PosteModel->getAll();
        $data['travails'] = $this->TravailModel->getAll();
        $data['type_contrats'] = $this->TypeContratModel->getAll();
        $data['contents'] = 'page/FormulaireAnnonce'; 
        $this->load->view('template/template', $data);
    }
    
    public function index2() {
        $data['contents'] = 'page/ListeAnnonce';
        $data['annonces'] = $this->AnnonceModel->getAllJointure();
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $exp = $this->input->post('exp');

        if ($exp < 0) $data['error'] = 'Durée d\'expérience doit être supérieur ou égale à 0.';
        else if ($exp > 20) $data['error'] = 'Non mais quand '.$exp.' ans même cest trop hein.';
        else {   
            $data = array(
                'date_annonce' => $this->input->post('date'),
                'duree_exp_requise' => $exp,
                'id_travail' => $this->input->post('travail'),
                'id_canal' => $this->input->post('canal'),
                'id_poste' => $this->input->post('poste'),
                'id_type_contrat' => $this->input->post('type_contrat')
            );
            $this->AnnonceModel->insert($data);
            $data['success'] = 'Insertion effectué avec succès';
        }

        $data['canals'] = $this->CanalModel->getAll();
        $data['travails'] = $this->TravailModel->getAll();
        $data['postes'] = $this->PosteModel->getAll();
        $data['type_contrats'] = $this->TypeContratModel->getAll();
        $data['contents'] = 'page/FormulaireAnnonce';
        $this->load->view('template/template', $data);
    }
}
?>