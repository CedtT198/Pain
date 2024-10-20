<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FactureController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AttestationModel');
        $this->load->model('FactureModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeFacture';
        $data['factures'] = $this->FactureModel->getAll();
        $this->load->view('template/template', $data);
    }
}
?>