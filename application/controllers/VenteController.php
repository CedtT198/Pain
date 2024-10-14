<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VenteController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AchatModel');
        $this->load->model('VenteModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeVente';
        $data['ventes'] = $this->VenteModel->getAll();
        $data['rest_stock'] = $this->AchatModel->GetStockRest();
        $this->load->view('template/template', $data);
    }
    
    public function index2() {
        $data['contents'] = 'page/FormulaireVente';
        $data['rest_stock'] = $this->AchatModel->GetStockRest();
        $this->load->view('template/template', $data);
    }
    
    public function insert() {
        $qt= $this->input->post('qt');
        $date= $this->input->post('date');

        if ($qt <= 0) {
            $data['contents'] = 'page/FormulaireVente';
            $data['rest_stock'] = $this->AchatModel->GetStockRest();
            $data['error'] = "Quantité doit être supérieure à 0.";
            $this->load->view('template/template', $data);
        }
        else if ($qt > $this->AchatModel->GetStockRest()['stock_restant']) {
            $data['contents'] = 'page/FormulaireVente';
            $data['rest_stock'] = $this->AchatModel->GetStockRest();
            $data['error'] = "Quantité choisie supérieure au nombre de stock restant.";
            $this->load->view('template/template', $data);
        }
        else {
            $dataInsert = array(
                'quantite' => $qt,
                'date_output' => $date
            );
            
            $this->VenteModel->insert($dataInsert);
            redirect("VenteController/index"); 
        }
    }
}
?>