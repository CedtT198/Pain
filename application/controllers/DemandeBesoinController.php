<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DemandeBesoinController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DemandeBesoinModel');
        $this->load->model('ProduitInFournisseurModel');
    }

    public function index() {
        $data['contents'] = 'page/FormulaireDemandeBesoin';
        $data['produits'] = $this->ProduitInFournisseurModel->getAll();
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $desc= $this->input->post('desc');
        $nom_produit= $this->input->post('nom_produit');
        $qt= $this->input->post('qt');
        $montant= $this->input->post('montant');

        $data = array(
            'description' => $desc,
            'quantite' => $qt,
            'accepte' => false,
            'date_demande' => date('Y-m-d'),
            'id_centre' => $this->session->userdata('id_depa')
        );

        $this->DemandeBesoinModel->insert();        
    }
}
?>