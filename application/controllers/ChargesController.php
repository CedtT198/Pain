<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChargesController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ChargeModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeCharge';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireCharge';
        $this->load->view('template/template', $data);
    }
}
?>