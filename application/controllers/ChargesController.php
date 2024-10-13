<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChargesController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ChargeModel');
        $this->load->model('NatureModel');
        $this->load->model('RubriqueModel');
        $this->load->model('TypeChargeModel');
        $this->load->model('RepartitionModel');
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
        $total = $this->input->post('rep_courses') + $this->input->post('rep_usine') +
                        $this->input->post('rep_admin') + $this->input->post('rep_livraison');
                        
        if ($total > 100 || $total <= 0) {
            $data['contents'] = 'page/FormulaireCharge';
            $data['natures'] = $this->NatureModel->getAll();
            $data['rubriques'] = $this->RubriqueModel->GetAll();
            $data['types'] = $this->TypeChargeModel->GetAll();
            $data['error'] = "Erreur : Total des répartitions doit être > 0 et <= 100.";
            $this->load->view('template/template', $data);   
        }
        else {
            $dataCharges = array(
                'id_nature' => $this->input->post('nature'),
                'id_rubrique' => $this->input->post('rubrique'),
                'id_type' => $this->input->post('type'),
                'unite' => $this->input->post('unite'),
                'montant' => $this->input->post('montant'),
                'date_charge' => $this->input->post('date')
            );
            $id_charge = $this->ChargeModel->insert($dataCharges);
            
            $dataRepartition = array(
                'id_charge' => $id_charge,
                'id_centre' => 1,
                'taux' => $this->input->post('rep_courses')
            );
            $this->RepartitionModel->insert($dataRepartition);     
            
            $dataRepartition = array(
                'id_charge' => $id_charge,
                'id_centre' => 2,
                'taux' => $this->input->post('rep_usine')
            );
            $this->RepartitionModel->insert($dataRepartition);     
            
            $dataRepartition = array(
                'id_charge' => $id_charge,
                'id_centre' => 3,
                'taux' => $this->input->post('rep_admin')
            );
            $this->RepartitionModel->insert($dataRepartition);     
            
            $dataRepartition = array(
                'id_charge' => $id_charge,
                'id_centre' => 4,
                'taux' => $this->input->post('rep_livraison')
            );
            $this->RepartitionModel->insert($dataRepartition);     

            redirect("ChargesController/index");
        }
    }
}
?>