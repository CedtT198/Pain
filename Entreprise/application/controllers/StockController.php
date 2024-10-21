<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProduitModel');
        $this->load->model('StockModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeEntreeStock';
        $data['listeStock'] = $this->StockModel->getAll();
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireEntreeStock';
        $data['produits'] = $this->ProduitModel->getAll();
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $date = $this->input->post('date');
        $quantite = $this->input->post('quantite');
        $id_produit = $this->input->post('id_produit');

        if ($quantite > 0) {
            $data_insertion = array (
                'date_input' => $date,
                'quantite' => $quantite,
                'id_produit' => $id_produit,
            );
            $this->StockModel->insertInputStock($data_insertion);
            $data['success'] = "Insertion effectué avec succès.";
        } else {
            $data['error'] = 'Quantité doit être supérieur à zéro.' ;
            $data['contents'] = 'page/FormulaireEntreeStock';
        }

        $data['produits'] = $this->ProduitModel->getAll();
        $data['contents'] = 'page/FormulaireEntreeStock';
        $this->load->view('template/template', $data);
    }

}
?>