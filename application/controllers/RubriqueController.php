<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RubriqueController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RubriqueModel');
    }

    public function index() {
        $data['contents'] = 'page/TableauRubrique';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireRubrique';
        $this->load->view('template/template', $data);
    }

}
?>