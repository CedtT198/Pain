<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReceptionController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BonDeReceptionModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeBonReception';
        $data['receptions'] = $this->BonDeReceptionModel->getAll();
        $this->load->view('template/template', $data);
    }
}
?>