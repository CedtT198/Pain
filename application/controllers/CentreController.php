<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CentreController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CentreModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeCentre';
        $this->load->view('template/template', $data);
    }
}
?>