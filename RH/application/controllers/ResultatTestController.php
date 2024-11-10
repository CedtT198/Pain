<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultatTestController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['contents'] = 'page/ListeResultatTest';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireResultatTest';
        $this->load->view('template/template', $data);
    }


}
?>