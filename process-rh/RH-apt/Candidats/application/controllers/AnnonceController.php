<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnnonceController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AnnonceModel');
        $this->load->model('CanalModel');
        $this->load->model('CandidatureInAnnonceModel');
    }

    public function index() {
        $data['canals'] = $this->CanalModel->getAll();
        $data['annonces'] = $this->AnnonceModel->getAllJointure();

        $data['contents'] = 'page/AnnonceOffre'; 
        $this->load->view('template/template', $data);
    }
    
    public function filter() {
        $id_canal= $this->input->post('id_canal');
        
        // requete à changer
        $data['canals'] = $this->CanalModel->getAll();
        $data['annonces'] = $this->AnnonceModel->getAllJointureBy($id_canal);

        $data['contents'] = 'page/AnnonceOffre'; 
        $this->load->view('template/template', $data);
    }

    public function postule() {
        $data = array(
            'id_annonce' => $this->input->post('id_annonce'),
            'id_candidature' => $this->session->userdata('id_can'),
            'date_candidature' => date('Y-m-d')
        );
        $this->CandidatureInAnnonceModel->insert($data);
        
        
        $data['canals'] = $this->CanalModel->getAll();
        $data['annonces'] = $this->AnnonceModel->getAllJointure();
        $data['success'] = 'Candidature envoyé avec succès.';
        $data['contents'] = 'page/AnnonceOffre';
        $this->load->view('template/template', $data);
    }
}
?>