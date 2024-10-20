<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProduitModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeEntreeStock';
        $data['repartitions'] = $this->RepartitionModel->getAll();
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireEntreeStock';
        $data['produits'] = $this->ProduitModel->getAll();
        $this->load->view('template/template', $data);
    }
}
?>