<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UniteOeuvreController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UniteOeuvreModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeUniteOeuvre';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireUniteOeuvre';
        $this->load->view('template/template', $data);
    }
}
?>