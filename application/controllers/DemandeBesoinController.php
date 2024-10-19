<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DemandeBesoinController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DemandeBesoinModel');
        $this->load->model('CentreModel');
        $this->load->model('ProduitModel');
        $this->load->model('StockModel');
        $this->load->model('AttestationModel');
        $this->load->model('FournisseurModel');
        // $this->load->model('ProduitInFournisseurModel');
    }

    public function index() {
        $data['contents'] = 'page/FormulaireDemandeBesoin';
        $data['produits'] = $this->ProduitModel->getAll();
        $this->load->view('template/template', $data);
    }
    
    public function index2() {
        $data['contents'] = 'page/ListeDemandeBesoin';
        $data['demandes'] = $this->DemandeBesoinModel->getAll();
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $desc= $this->input->post('desc');
        $produit= $this->input->post('produit');
        $qt= $this->input->post('qt');
        // $montant= $this->input->post('montant');

        if ($qt < 0) {
            $data['contents'] = 'page/FormulaireDemandeBesoin';
            $data['error'] = "Quantitédoit être supérieure à 0.";
            $data['produits'] = $this->ProduitModel->getAll();
            $this->load->view('template/template', $data);
        }
        // else if ($montant < 0) {
        //     $data['contents'] = 'page/FormulaireDemandeBesoin';
        //     $data['error'] = "Montant doit être supérieure à 0.";
        //     $data['produits'] = $this->ProduitModel->getAll();
        //     $this->load->view('template/template', $data);
        // }
        else {
            $data = array(
                'description' => $desc,
                'quantite' => $qt,
                'accepte' => null,
                'date_demande' => date('Y-m-d'),
                'id_centre' => $this->session->userdata('id_depa'),
                'id_produit' => $produit
            );
    
            $this->DemandeBesoinModel->insert($data);      
            $data['contents'] = 'page/FormulaireDemandeBesoin';
            $data['success'] = "Demande envoyé avec succès.";
            $data['produits'] = $this->ProduitModel->getAll();
            $this->load->view('template/template', $data);
        }
    }

    public function accept() {
        $id_centre = $this->input->post('id_centre');
        $id_produit = $this->input->post('id_produit');
        $qt = $this->input->post('quantite');
        $qtstock = $this->StockModel->checkRestStock($id_produit);
        $resteStock = $qtstock - $qt;

        // Si le produit existe dans le stock
        if ($qtstock >= 0) {
            // Si le produit est présent mais pas assez 
            if ($resteStock < 0) {
                $data = array(
                    'date_output' => date('Y-m-d'),
                    'quantite' => $qtstock,
                    'id_centre' => $id_centre,
                    'id_produit' => $id_produit
                );
                $this->StockModel->insertOutput($data);
    
                $resteARechercher = $resteStock * -1;
    
                $id = $this->input->post('id');
                $this->DemandeBesoinModel->updateAcceptation($id, $resteARechercher, true);
                
                // Création de proformat et bon de commande
                $dataProformat = array(
                    'date_attestation' => date('Y-m-d'),
                    'libelle' => '',
                    'accepte' => null,
                    'id_centre' => $id_centre,
                    'id_type_attestation' => 5,
                    'id_fournisseur' =>   $this->FournisseurModel->getBonfournisseur($id_produit)
                );
                
                $dataBonCommande = array(
                    'date_attestation' => date('Y-m-d'),
                    'libelle' => '',
                    'accepte' => null,
                    'id_centre' => $id_centre,
                    'id_type_attestation' => 1,
                    'id_fournisseur' =>  $this->FournisseurModel->getBonfournisseur($id_produit)
                );

                $id_proformat = $this->AttestationModel->insert($dataProformat);
                $id_bonCom = $this->AttestationModel->insert($dataBonCommande);

                $this->ProduitInAttestationModel->insert($id_proformat, $id_produit);
                $this->ProduitInAttestationModel->insert($id_bonCom, $id_produit);
                // ====================================
        
                $data['contents'] = 'page/ListeDemandeBesoin';
                $data['success'] = 'Quanité du produit insuffisante en stock. Un proformat a été généré.';
                $data['demandes'] = $this->DemandeBesoinModel->getAll();
                $this->load->view('template/template', $data);
            }
            else {
                $data = array(
                    'date_output' => date('Y-m-d'),
                    'quantite' => $qt,
                    'id_centre' => $id_centre,
                    'id_produit' => $id_produit
                );
                $this->StockModel->insertOutput($data);
    
                $data['contents'] = 'page/ListeDemandeBesoin';
                $data['success'] = 'Accepté. Le(s) produit(s) demandé(s) ont été prélevé du stock.<br>Nombre de '.$this->ProduitModel->getById($id_produit)['nom_produit'].' restant : '.$resteStock;
                $data['demandes'] = $this->DemandeBesoinModel->getAll();
                $this->load->view('template/template', $data);
            }
        }
        // Si le produit n'est pas du tout présent dans le stock
        else {
            $id= $this->input->post('id');
            $this->DemandeBesoinModel->updateAcceptation($id, $qt, true);

            // Création de proformat et bon de commande
            $dataProformat = array(
                'date_attestation' => date('Y-m-d'),
                'libelle' => '',
                'accepte' => null,
                'id_centre' => $id_centre,
                'id_type_attestation' => 5,
                'id_fournisseur' =>   $this->FournisseurModel->getBonfournisseur($id_produit)
            );
            
            $dataBonCommande = array(
                'date_attestation' => date('Y-m-d'),
                'libelle' => '',
                'accepte' => null,
                'id_centre' => $id_centre,
                'id_type_attestation' => 1,
                'id_fournisseur' =>  $this->FournisseurModel->getBonfournisseur($id_produit)
            );

            $id_proformat = $this->AttestationModel->insert($dataProformat);
            $id_bonCom = $this->AttestationModel->insert($dataBonCommande);

            $this->ProduitInAttestationModel->insert($id_proformat, $id_produit);
            $this->ProduitInAttestationModel->insert($id_bonCom, $id_produit);
            // ====================================
    
            $data['contents'] = 'page/ListeDemandeBesoin';
            $data['success'] = 'Produit non présent dans stock. Un proformat a été généré.';
            $data['demandes'] = $this->DemandeBesoinModel->getAll();
            $this->load->view('template/template', $data);
        }   
    }
    
    public function refuse() {
        $id= $this->input->post('id');
        $qt = $this->input->post('quantite');
        $this->DemandeBesoinModel->updateAcceptation($id, $qt, false);
        redirect('DemandeBesoinController/index2');
    }
}
?>