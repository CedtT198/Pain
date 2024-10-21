<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FactureController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AttestationModel');
        $this->load->model('FactureModel');
        $this->load->model('FournisseurModel');
        $this->load->model('CentreModel');
        $this->load->model('CaisseModel');
        $this->load->model('ProduitInAttestationModel');
    }

    public function index() {
        $data['contents'] = 'page/ListeFacture';
        $data['factures'] = $this->FactureModel->getAll();
        $this->load->view('template/template', $data);
    }

    public function accept() {
        $id_attestation = $this->input->post('id_attestation');       
        $produit = $this->ProduitInAttestationModel->getProduitByAttestation($id_attestation);

        $total_achat = 0;
        if ($produit != null) {
            $total_achat = $produit[0]['montant'] * $produit[0]['quantite'];
        }
        $montant = $this->CaisseModel->getSum()['somme'];
        
        if ($montant < $total_achat) {
            $data['error'] = "Argent de l'entreprise insuffisant.";
        }
        else {
            $data = array(
                'accepte' => true
            );
            $this->FactureModel->update($id_attestation, $data);
            
            $data = array(
                'date_caisse' => date('Y-m-d'),
                'montant' => -$total_achat
            );
            $this->CaisseModel->insert($data);

            $data['success'] = "Facture N° ".$id_attestation." payé avec succès.";
        }
        
        $data['contents'] = 'page/ListeFacture';
        $data['factures'] = $this->FactureModel->getAll();
        $this->load->view('template/template', $data);
    }


    public function refuse() {
        $id_attestation = $this->input->post('id_attestation');
        $data = array(
            'accepte' => false
        );
        $this->FactureModel->update($id_attestation, $data);

        $data['contents'] = 'page/ListeFacture';
        $data['success'] = "Facture N° ".$id_attestation." refusé avec succès.";
        $data['factures'] = $this->FactureModel->getAll();
        $this->load->view('template/template', $data);
    }
}
?>