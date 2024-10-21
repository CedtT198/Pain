<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CaisseController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CaisseModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeCaisse';
        $data['caisses'] = $this->CaisseModel->getAll();
        $this->load->view('template/template', $data);
    }
}
?>