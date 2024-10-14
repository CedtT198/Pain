<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AchatController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AchatModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeAchat';
        $data['achats'] = $this->AchatModel->getAll();
        $data['rest_stock'] = $this->AchatModel->GetStockRest();
        $this->load->view('template/template', $data);
    }
    
    public function index2() {
        $data['contents'] = 'page/FormulaireAchat';
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $qt= $this->input->post('qt');
        $date= $this->input->post('date');

        if ($qt <= 0) {
            $data['contents'] = 'page/FormulaireAchat';
            $data['error'] = "Quantité doit être supérieure à 0.";
            $this->load->view('template/template', $data);
        }
        else {
            $dataInsert = array(
                'quantite' => $qt,
                'date_input' => $date
            );
            
            $this->AchatModel->insert($dataInsert);
            redirect("AchatController/index"); 
        }
    }
}
?>