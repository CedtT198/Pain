<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonnelController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data['contents'] = 'page/FormulairePersonnel';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/ListePersonnel';
        $this->load->view('template/template', $data);
    }

}
?>