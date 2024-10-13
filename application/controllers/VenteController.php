<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VenteController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model('StockModel');
    }

    public function index() {
        $data['contents'] = 'page/ListVente';
        $this->load->view('template/template', $data);
    }
    
    public function index2() {
        $data['contents'] = 'page/FormulaireVente';
        $this->load->view('template/template', $data);
    }
}
?>