<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnnonceController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AnnonceModel');
        $this->load->model('CanalModel');
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
}
?>