<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RubriqueController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RubriqueModel');
        $this->load->model('UniteOeuvreModel');
        $this->load->model('CentreModel');
        $this->load->model('RepartitionModel');
        $this->load->model('NatureModel');
        $this->load->model('ChargeModel');
        $this->load->model('AchatModel');
    }

    public function index() {
        $data['contents'] = 'page/TableauRubrique';
        // $data['stock'] = 5;
        $data['stock'] = $this->AchatModel->getStockRest();
        $data['allUniteOeuvre'] = $this->UniteOeuvreModel->getAll();
        $data['rubriques'] = $this->RubriqueModel->getAll();
        $data['centres'] = $this->CentreModel->getAll();
        $data['repartitions'] = $this->RepartitionModel->getAll();
        $data['allCharge'] = $this->RubriqueModel->getAllCharge();
        $data['totalJoin'] = $this->RubriqueModel->getTotalJoin();
        $data['totalNature'] = $this->RubriqueModel->getTotalNature();
        $data['totalRepartition'] = $this->RubriqueModel->getTotalRepartition();
        $data['totalMontant'] = $this->RubriqueModel->getTotalMontant();
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireRubrique';
        $data['unites'] = $this->UniteOeuvreModel->getAll();
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $nom = $this->input->post('nom');
        $unite = $this->input->post('unite');
 
        $data = array(
            'nom_rubrique' => $nom,
            'id_unite_oeuvre' => $unite
        );
        $this->RubriqueModel->insert($data);
        
        redirect("RubriqueController/index");
    }
}
?>