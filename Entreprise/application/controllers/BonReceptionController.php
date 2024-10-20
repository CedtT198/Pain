<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BonReceptionController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BonReceptionController');
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

    public function insert() {
        $id_attestation= $this->input->post('id_attestation');

        // $dataLivraison = array(
        //     'date_attestation' => $date,
        //     'libelle' => $libelle,
        //     'accepte' => null,
        //     'id_correspondance' => $id_commande,
        //     'id_centre' => $id_centre,
        //     'id_type_attestation' => 3,
        //     'id_fournisseur' => $this->session->userdata('id_fou')
        // );
        // $id_attestation = $this->BonDeReceptionModel->insert($dataLivraison);

        // $dataProduitInAttestation = array(
        //     'id_attestation' => $id_attestation,
        //     'id_produit' => $id_produit,
        //     'quantite' => $quantite,
        //     'montant' => $montant
        // );
        // $this->ProduitInAttestationModel->insertData($dataProduitInAttestation);

        $data['contents'] = 'page/ListeBonLivraison';
        $data['livraisons'] = $this->BonDeLivraisonModel->getAll();
        $data['success'] = 'Bon de reception pour la date : "'.$date.'" créé pour centre : '.$this->CentreModel->getById($id_centre)['nom_centre'];
        $this->load->view('template/template', $data);
    }
}
?>