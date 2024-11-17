<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnnoncePostuleController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AnnonceModel');
        $this->load->model('CandidatureInAnnonceModel');
    }
    
    public function index() {
        $id = $this->session->userdata('id_can');
        $data['annonces'] = $this->CandidatureInAnnonceModel->getAllCandidatureOf($id);
        $data['contents'] = 'page/AnnoncePostule'; 
        $this->load->view('template/template', $data);
    }
}
?>