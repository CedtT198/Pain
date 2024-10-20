<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReceptionController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['contents'] = 'page/ListeBonCommande';
        $this->load->view('template/template', $data);
    }
}
?>