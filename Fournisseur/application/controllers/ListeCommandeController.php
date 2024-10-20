<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListeCommandeController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->model('FournisseurModel');
    }

    public function index() {   
        $data['contents'] = 'page/ListeCommande';
        $this->load->view('template/template', $data);
    }
}
?>