<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RubriqueController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RubriqueModel');
        $this->load->model('UniteOeuvreModel');
        $this->load->model('CentreModel');
    }

    public function index() {
        $data['contents'] = 'page/TableauRubrique';
        $data['rubriques'] = $this->RubriqueModel->GetAll();
        $data['centres'] = $this->CentreModel->GetAll();
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireRubrique';
        $data['unites'] = $this->UniteOeuvreModel->GetAll();
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $nom = $this->input->post('nom');
        $unite = $this->input->post('unite');
 
        $data = array(
            'nom_rubrique' => $nom,
            'id_unite_oeuvre' => $unite
        );
        $this->RubriqueModel->Insert($data);
        
        redirect("RubriqueController/index");
    }
}
?>