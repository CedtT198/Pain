<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RendezVousController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['contents'] = 'page/ListeRendezVous';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireRendezVous';
        $this->load->view('template/template', $data);
    }


}
?>