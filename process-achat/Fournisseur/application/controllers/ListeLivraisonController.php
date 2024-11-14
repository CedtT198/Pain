<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListeLivraisonController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->model('FournisseurModel');
        $this->load->model('BonDeCommandeModel');
        $this->load->model('BonDeLivraisonModel');
        $this->load->model('CentreModel');
        $this->load->model('ProduitModel');
        $this->load->model('AttestationModel');
        $this->load->model('ProduitInAttestationModel');
    }

    public function index() {   
        $data['contents'] = 'page/ListeLivraison';
        $id_fournisseur = $this->session->userdata('id_fou');
        $data['livraisons'] = $this->BonDeLivraisonModel->getAll($id_fournisseur);
        // $data['centres'] = $this->CentreModel->getAll();
        // $data['produits'] = $this->ProduitInAttestationModel->getProduitsByFournisseur($id_fournisseur);
        $this->load->view('template/template', $data);
    }
}
?>