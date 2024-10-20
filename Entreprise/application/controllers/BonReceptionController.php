<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BonReceptionController extends CI_Controller {

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
        $data['contents'] = 'page/ListeBonLivraison';
        $data['livraisons'] = $this->BonDeLivraisonModel->getAll();
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $id_attestation= $this->input->post('id_attestation');
        
        $data = array(
            "accepte" => true
        );
        $this->BonDeLivraisonModel->update($id_attestation, $data);

        $attestation = $this->BonDeLivraisonModel->getById($id_attestation);
        $dataLivraison = array(
            'date_attestation' => $attestation['date_attestation'],
            'libelle' => $attestation['libelle'],
            'accepte' => null,
            'id_correspondance' => $id_attestation,
            'id_centre' => $attestation['id_centre'],
            'id_type_attestation' => 2,
            'id_fournisseur' => $attestation['id_fournisseur']
        );
        $id_new_attestation = $this->BonDeReceptionModel->insert($dataLivraison);

        $produits = $this->ProduitInAttestationModel->getProduitByAttestation($id_attestation);
        foreach ($produits as $prod) {
            $dataProduitInAttestation = array(
                'id_attestation' => $id_new_attestation,
                'id_produit' => $prod['id_produit'],
                'id_type_attestation' => 2,
                'quantite' => $prod['quantite'],
                'montant' => $prod['montant']
            );
            $this->ProduitInAttestationModel->insertData($dataProduitInAttestation);
        }

        // echo $id_new_attestation;
        // echo var_dump($produits);

        $data['contents'] = 'page/ListeBonLivraison';
        $data['livraisons'] = $this->BonDeLivraisonModel->getAll();
        $data['success'] = 'Bon de reception pour la date : "'.$attestation['date_attestation'].'" créé pour centre : '.$this->CentreModel->getById($attestation['id_centre'])['nom_centre'];
        $this->load->view('template/template', $data);
    }
}
?>