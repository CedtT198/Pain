<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AchatController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model('StockModel');
    }

    public function index() {
        $data['contents'] = 'page/ListAchat';
        $this->load->view('template/template', $data);
    }
    
    public function index2() {
        $data['contents'] = 'page/FormulaireAchat';
        $this->load->view('template/template', $data);
    }
}
?>