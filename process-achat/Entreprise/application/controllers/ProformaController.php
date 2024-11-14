<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProformaController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProformaModel');
        $this->load->model('AttestationModel');
        $this->load->model('CentreModel');
        $this->load->model('ProduitInAttestationModel');
        $this->load->model('ProduitModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeProforma';
        $data['proformas'] = $this->ProformaModel->getAll();
        $this->load->view('template/template', $data);
    }
}
?>