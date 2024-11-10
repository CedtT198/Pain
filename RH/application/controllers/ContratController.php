<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContratController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['contents'] = 'page/mbolaTsyMisy';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireContrat';
        $this->load->view('template/template', $data);
    }
}
?>