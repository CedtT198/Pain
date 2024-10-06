<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChargesController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ChargeModel');
        $this->load->model('NatureModel');
        $this->load->model('RubriqueModel');
        $this->load->model('TypeChargeModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeCharge';
        $data['charges'] = $this->ChargeModel->GetAll();
        $data['natures'] = $this->NatureModel->getAll();
        $data['rubriques'] = $this->RubriqueModel->GetAll();
        $data['types'] = $this->TypeChargeModel->GetAll();
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireCharge';
        $data['natures'] = $this->NatureModel->getAll();
        $data['rubriques'] = $this->RubriqueModel->GetAll();
        $data['types'] = $this->TypeChargeModel->GetAll();
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $data = array(
            'id_nature' => $this->input->post('nature'),
            'id_rubrique' => $this->input->post('rubrique'),
            'id_type' => $this->input->post('type'),
            'unite' => $this->input->post('unite'),
            'montant' => $this->input->post('montant'),
            'date_charge' => $this->input->post('date')
        );
        $this->ChargeModel->insert($data);
        
        redirect("ChargesController/index");
    }
}
?>