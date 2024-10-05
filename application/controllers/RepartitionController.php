<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RepartitionController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RepartitionModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeRepartition';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireRepartition';
        $this->load->view('template/template', $data);
    }
}
?>