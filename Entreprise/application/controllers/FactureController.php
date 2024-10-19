<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FactureController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AttestationModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeProforma';
        $this->load->view('template/template', $data);
    }
}
?>