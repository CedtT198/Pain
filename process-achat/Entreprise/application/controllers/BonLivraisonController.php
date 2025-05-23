<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BonLivraisonController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BonDeLivraisonModel');
        $this->load->model('ProduitInAttestationModel');
        $this->load->model('ProduitModel');
        $this->load->model('FournisseurModel');
        $this->load->model('CentreModel');
        $this->load->model('AttestationModel');
        $this->load->model('CaisseModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeBonLivraison';
        $data['livraisons'] = $this->BonDeLivraisonModel->getAll();
        $this->load->view('template/template', $data);
    }

    // public function accept() {
    //     $compMoney = $this->CaisseModel->getAll();
    //     $total_montant = $this->input->post('total_montant');
    //     $id = $this->input->post('id');

    //     if ($total_montant < $compMoney['montant']) {
    //         $this->AttestationModel->updateAccepte($id, true);
    //         redirect('BonCommandeController/index');
    //     }
    //     else {
    //         $data['contents'] = 'page/ListeBonLivraison';
    //         $data['commandes'] = $this->BonDeLivraisonModel->getAll();
    //         $data['error'] = "Budget insuffisant.";
    //         $this->load->view('template/template', $data);
    //     }
    // }

    // public function refuse() {
    //     $id = $this->input->post('id');
    //     $this->AttestationModel->updateAccepte($id, false);
    //     redirect('BonCommandeController/index');
    // }
}
?>