<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RepartitionController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RepartitionModel');
        $this->load->model('RubriqueModel');
        $this->load->model('ChargeModel');
        $this->load->model('CentreModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeRepartition';
        $data['repartitions'] = $this->RepartitionModel->getAll();
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireRepartition';
        $data['charges'] = $this->ChargeModel->getAll();
        $data['centres'] = $this->CentreModel->getAll();
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $id_charge = $this->input->post('charge');
        $id_centre = $this->input->post('centre');
        $taux = $this->input->post('taux');

        $data = array(
            'id_charge' => $id_charge,
            'id_centre' => $id_centre,
            'taux' => $taux
        );
    
        if ($this->RepartitionModel->canBeReparted($id_charge, $taux)) {
            $this->RepartitionModel->insert($data);
            redirect("RepartitionController/index");
        }
        else {
            $data['charges'] = $this->ChargeModel->getAll();
            $data['centres'] = $this->CentreModel->getAll();
            $data['error'] = 'Cette charge est déjà réparti dans un ou plusieurs centres qui est égale à 100%.';
            $data['contents'] = 'page/FormulaireRepartition';
            $data['repartitions'] = $this->RepartitionModel->getAll();
            $this->load->view('template/template', $data);
        }
    }
}
?>