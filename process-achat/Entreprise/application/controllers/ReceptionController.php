<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReceptionController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BonDeReceptionModel');
        $this->load->model('CentreModel');
        $this->load->model('ProduitInAttestationModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeBonReception';
        $data['receptions'] = $this->BonDeReceptionModel->getAll();
        $this->load->view('template/template', $data);
    }
}
?>