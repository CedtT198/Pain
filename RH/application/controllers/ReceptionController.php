<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReceptionController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->model('FournisseurModel');
        $this->load->model('BonDeCommandeModel');
        $this->load->model('BonDeReceptionModel');
        $this->load->model('CentreModel');
        $this->load->model('ProduitModel');
        $this->load->model('AttestationModel');
        $this->load->model('ProduitInAttestationModel');
    }

    public function index() {   
        $data['contents'] = 'page/ListeBonReception';
        $id_fournisseur = $this->session->userdata('id_fou');
        $data['receptions'] = $this->BonDeReceptionModel->getAll($id_fournisseur);
        $this->load->view('template/template', $data);
    }
}
?>