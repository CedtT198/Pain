<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    public function index() {               //  ito ny index tena izy
        $this->load->view('page/Login');
    }
    
    // public function index() {                   // index ahafana miteste page fotsiny ho an'ny front
    //     $data['contents'] = 'page/ListeDemandeBesoin';
    //     $this->load->view('template/template', $data);
    // }
    
    public function checkLogin() {
        $name= $this->input->post('name');
        $password= $this->input->post('password');
        
        $return = $this->LoginModel->login($name, $password);

        if ($return > 0) {
            $this->session->set_userdata('id_depa', $return);
            redirect('RubriqueController/index');
        }
        else {
            if ($return == -1)
                $data['error'] = "Mot de passe incorrect.";
            else if ($return == -2)
                $data['error'] = "Nom du département incorrect.";

            $this->load->view('page/Login', $data);
        }
    }

    // public function index() {                   // index ahafana miteste page fotsiny ho an'ny front
    //     $data['contents'] = 'page/FormulaireDemandeBesoin';
    //     $this->load->view('template/template', $data);
    // }

}
?>