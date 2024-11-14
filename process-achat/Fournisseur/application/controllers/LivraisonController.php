<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LivraisonController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BonDeLivraisonModel');
        $this->load->model('CentreModel');
        $this->load->model('ProduitInAttestationModel');
        $this->load->model('FournisseurModel');
        $this->load->model('BonDeCommandeModel');
        $this->load->model('ProduitModel');
        $this->load->model('AttestationModel');
    }

    public function index() {
        $this->load->view('page/ListeLivraison');
    }

    public function insert() {
        $date= $this->input->post('date');
        $libelle= $this->input->post('libelle');
        $id_centre= $this->input->post('id_centre');
        $id_produit= $this->input->post('id_prod');
        $quantite= $this->input->post('quantite');
        $montant= $this->input->post('montant');
        $id_commande= $this->input->post('id_commande');

        if ($quantite <= 0) {
            $data['contents'] = 'page/ListeCommande';
            $data['error'] = 'Quanitté doit être supérieur à 0, date : "'.$date.'"';
            $this->load->view('template/template', $data);
        }
        else if ($quantite <= 0) {
            if ($quantite <= 0) {
                $data['contents'] = 'page/ListeCommande';
                $data['error'] = 'Montant doit être supérieur à 0, date : "'.$date.'"';
                $this->load->view('template/template', $data);
            }
        }
        else {
            $dataLivraison = array(
                'date_attestation' => $date,
                'libelle' => $libelle,
                'accepte' => null,
                'id_correspondance' => $id_commande,
                'id_centre' => $id_centre,
                'id_type_attestation' => 3,
                'id_fournisseur' => $this->session->userdata('id_fou')
            );
            $id_attestation = $this->BonDeLivraisonModel->insert($dataLivraison);

            $dataProduitInAttestation = array(
                'id_attestation' => $id_attestation,
                'id_produit' => $id_produit,
                'id_type_attestation' => 3,
                'quantite' => $quantite,
                'montant' => $montant
            );
            $this->ProduitInAttestationModel->insertData($dataProduitInAttestation);

            $id_fournisseur = $this->session->userdata('id_fou');
            $data['commandes'] = $this->BonDeCommandeModel->getAllTrue($id_fournisseur);
            $data['centres'] = $this->CentreModel->getAll();
            $data['produits'] = $this->ProduitInAttestationModel->getProduitsByFournisseur($id_fournisseur);
            $data['contents'] = 'page/ListeCommande';
            $data['success'] = 'Bon de livraison pour la date : "'.$date.'" créé pour centre : '.$this->CentreModel->getById($id_centre)['nom_centre'];
            $this->load->view('template/template', $data);
        }
    }
}
?>