<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttestationController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BonDeLivraisonModel');
        $this->load->model('BonDeReceptionModel');
        $this->load->model('ProduitInAttestationModel');
        $this->load->model('ProduitModel');
        $this->load->model('FournisseurModel');
        $this->load->model('CentreModel');
        $this->load->model('AttestationModel');
        $this->load->model('CaisseModel');
    }

    public function index() {
        $error = "";
        $id_attestation= $this->input->post('id_attestation');
        $correspondances = $this->AttestationModel->getIdCorrespondances($id_attestation);
        foreach ($correspondances as $cor) {
            $id_correspondance = $cor['id_correspondance'];
            $attestation = $this->AttestationModel->getById($id_correspondance);
            
            $produits = $this->ProduitInAttestationModel->getProduitByAttestation($id_correspondance);
            foreach ($produits as $prod) {
                
            }

            if (true) $error .= "";
        }

        if ($error != "") {
            $data['contents'] = 'page/ListeBonReception';
            $data['error'] = $error;
            $data['livraisons'] = $this->BonDeLivraisonModel->getAll();
            $this->load->view('template/template', $data);
        }
        else {
            $data['contents'] = 'page/ListeBonReception';
            $data['success'] = "Aucune anomalie aperçu au niveau de chaque attestation.";
            $data['livraisons'] = $this->BonDeLivraisonModel->getAll();
            $this->load->view('template/template', $data);
        }
    }
}
?>