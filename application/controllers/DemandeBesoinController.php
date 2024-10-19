<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DemandeBesoinController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DemandeBesoinModel');
        $this->load->model('ProduitInFournisseurModel');
    }

    public function index() {
        $data['contents'] = 'page/FormulaireDemandeBesoin';
        $data['produits'] = $this->ProduitInFournisseurModel->getAll();
        $this->load->view('template/template', $data);
    }
}
?>