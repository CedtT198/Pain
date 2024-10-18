<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    // public function index() {               //  ito ny index tena izy
    //     $this->load->view('page/Login');
    // }
    
    public function index() {                   // index ahafana miteste page fotsiny ho an'ny front
        $data['contents'] = 'page/FormulaireDemandeBesoin';
        $this->load->view('template/template', $data);
    }

}
?>