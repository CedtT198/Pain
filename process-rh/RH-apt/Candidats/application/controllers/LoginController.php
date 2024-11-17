<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->model('CandidatureModel');
        $this->load->model('DiplomeModel');
    }

    public function index() {
        $this->load->view('page/Login');
    } 

    public function index2() {
        $data['diplomes'] = $this->DiplomeModel->getAll();
        $this->load->view('page/Inscription', $data);
    }

    public function checkLogin() {
        $nom= $this->input->post('nom');
        $mdp= $this->input->post('mdp');
        
        $return = $this->LoginModel->checkLogin($nom, $mdp);
        
        if ($return > 0) {
            $this->session->set_userdata('id_can', $return);
            $this->session->set_userdata('nom_can', $this->CandidatureModel->getById($return)['nom']);
            redirect('AnnonceController/index');
        }
        else {
            if ($return == -1) $data['error'] = "Mot de passe incorrect.";
            else if ($return == -2)$data['error'] = "Nom du candidat incorrect.";

            $this->load->view('page/Login', $data);
        }
    }

    public function insert() {
        $mdp= $this->input->post('mdp');
        $cmdp= $this->input->post('cmdp');

        if ($mdp !== $cmdp) {
            $data['error'] = "Mot de passe et mot de passe de confirmation doivent être similaires.";
            $this->load->view('page/Inscription', $data);
        }
        else {
            $data = array(
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'id_diplome' => $this->input->post('id_diplome'),
                'mdp' => $mdp,
                'date_naissance' => $this->input->post('date_naissance')
            );
            
            $this->CandidatureModel->insert($data);
            redirect('LoginController/index');
        }
    }
}
