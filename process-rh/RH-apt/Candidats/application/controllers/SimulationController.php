<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimulationController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SimulationModel');
    }

    public function index() {
        $data['contents'] = 'page/SimulationValider'; 
        $this->load->view('template/template', $data);
    }
    
    public function begin() {
        $difficulte= $this->input->post('difficulte');
        // $data['questions'] = $this->SimulationModel->getAllQuestions($difficulte);

        $data['contents'] = 'page/Simulation'; 
        $this->load->view('template/template', $data);
    }

    public function getResultat() {
        // alain daoly ny reponse
        // comparena amin'ny valiny tena izy base

        $data['contents'] = 'page/ResultatSimulation'; 
        $this->load->view('template/template', $data);
    }
}
?>