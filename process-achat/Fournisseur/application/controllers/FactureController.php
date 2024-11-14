<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FactureController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BonDeLivraisonModel');
        $this->load->model('CentreModel');
        $this->load->model('ProduitInAttestationModel');
        $this->load->model('FournisseurModel');
        $this->load->model('BonDeCommandeModel');
        $this->load->model('ProduitModel');
        $this->load->model('AttestationModel');
        $this->load->model('FactureModel');
    }

    public function index() {
        // $data['contents'] = 'page/';
        $id_fournisseur = $this->session->userdata('id_fou');
        $data['factures'] = $this->FactureModel->getAll($id_fournisseur);
        $data['centres'] = $this->CentreModel->getAll();
        $data['produits'] = $this->ProduitInAttestationModel->getProduitsByFournisseur($id_fournisseur);
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $id_attestation= $this->input->post('id_attestation');
        $attestation = $this->AttestationModel->getById($id_attestation);
        
        $dataFacture = array(
            'date_attestation' => $attestation['date_attestation'],
            'libelle' => $attestation['libelle'],
            'accepte' => null,
            'id_correspondance' => $id_attestation,
            'id_centre' => $attestation['id_centre'],
            'id_type_attestation' => 4,
            'id_fournisseur' => $attestation['id_fournisseur']
        );
        $id_new_attestation = $this->FactureModel->insert($dataFacture);


        $qt_total = 0;
        $montant_total = 0;
        $id_produit = 0;
        // echo $id_attestation;
        $correspondances = $this->AttestationModel->getIdCorrespondances($id_attestation);
        foreach ($correspondances as $cor) {
            $id_correspondance = (int) $cor['bon_livraison'];
            echo $id_correspondance . "\n";
            // $attestation = $this->AttestationModel->getById($id_correspondance);
            
            if ($id_correspondance != null) {
                $produits = $this->ProduitInAttestationModel->getProduitByAttestation($id_correspondance);
                foreach ($produits as $prod) {
                    $qt_total += $prod['quantite'];
                    $montant_total += $prod['montant'];
                    $id_produit = $prod['id_produit'];
                }
            }
        }

        $dataProduitInAttestation = array(
            'id_attestation' => $id_new_attestation,
            'id_produit' => $id_produit,
            'id_type_attestation' => 4,
            'quantite' => $qt_total,
            'montant' => $montant_total
        );
        $this->ProduitInAttestationModel->insertData($dataProduitInAttestation);

        redirect('ListeCommandeController/index');
    }
}
?>