<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UniteOeuvreController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UniteOeuvreModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeUniteOeuvre';
        $data['unites'] = $this->UniteOeuvreModel->getAll();
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireUniteOeuvre';
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $nom = $this->input->post('nom');
        $abreviation = $this->input->post('abreviation');
 
        $data = array(
            'nom_unite_oeuvre' => $nom,
            'abreviation' => $abreviation
        );
        $this->UniteOeuvreModel->Insert($data);
        
        redirect("UniteOeuvreController/index2");
    }
    
    public function delete() {
        $id = $this->input->post('id');
        $this->UniteOeuvreModel->delete($id);
        
        redirect("UniteOeuvreController");
    }
}
?>