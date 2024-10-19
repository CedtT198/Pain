<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DemandeBesoinController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DemandeBesoinModel');
        // $this->load->model('ProduitInFournisseurModel');
    }

    public function index() {
        $data['contents'] = 'page/FormulaireDemandeBesoin';
        $this->load->view('template/template', $data);
    }
    
    public function index2() {
        $data['contents'] = 'page/ListeDemandeBesoin';
        $data['demandes'] = $this->DemandeBesoinModel->getAll();
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $desc= $this->input->post('desc');
        $nom_produit= $this->input->post('nom_produit');
        $qt= $this->input->post('qt');
        $montant= $this->input->post('montant');

        if ($qt < 0) {
            $data['contents'] = 'page/FormulaireDemandeBesoin';
            $data['error'] = "Quantitédoit être supérieure à 0.";
            $this->load->view('template/template', $data);
        }
        else if ($montant < 0) {
            $data['contents'] = 'page/FormulaireDemandeBesoin';
            $data['error'] = "Montant doit être supérieure à 0.";
            $this->load->view('template/template', $data);
        }
        else {
            $data = array(
                'description' => $desc,
                'quantite' => $qt,
                'accepte' => false,
                'date_demande' => date('Y-m-d'),
                'id_centre' => $this->session->userdata('id_depa')
            );
    
            $this->DemandeBesoinModel->insert($data);      
            redirect('DemandeBesoinController/index');  
        }
    }
}
?>