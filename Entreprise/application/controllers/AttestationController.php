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
        $this->load->model('FactureModel');
    }

    public function compare() {
        $error = "";
        $id_attestation= $this->input->post('id_attestation');
        $attFacture = $this->AttestationModel->getById($id_attestation);
        $prodFact = $this->ProduitInAttestationModel->getProduitByAttestation($id_attestation);
        // echo var_dump($prodFact);
        
        $id_correspondance = $attFacture['id_correspondance'];
        // $attComm = $this->AttestationModel->getById($id_correspondance);
        $prodCom = $this->ProduitInAttestationModel->getProduitByAttestation($id_correspondance);
        echo var_dump($prodCom);

        echo $id_attestation . "\n";
        echo $id_correspondance . "\n";

        if ($prodFact[0]['quantite'] != $prodCom[0]['quantite']) {
            $error .= "Quantité de la commande et de la facture différente.<br>
                Quantité demandée : ".$prodCom[0]['quantite']."<br>
                Quantité facturée : ".$prodFact[0]['quantite']."<br><br>";
        }
        if ($prodFact[0]['montant'] != $prodCom[0]['montant']) {
            $error .= "Montant de la commande et de la facture différente.<br>
                Montant demandé : ".$prodCom[0]['montant']."<br>
                Montant facturé : ".$prodFact[0]['montant']."<br><br>";
        }

        if ($error != "") {
            // Réduire l'attribution du fournisseur
            $fournisseur = $this->FournisseurModel->getById($attFacture['id_fournisseur']);
            $data = array(
                'attribution' => $fournisseur['attribution'] - 1
            );
            $this->FournisseurModel->update($attFacture['id_fournisseur'], $data);
            
            $data['error'] = "Anomalie aperçu sur la facturé N°".$id_attestation.".<br><br>". $error;
        }
        else {
            $data['success'] = "Aucune anomalie aperçu au niveau de chaque attestation.";
        }
        $data['contents'] = 'page/ListeFacture';
        $data['factures'] = $this->FactureModel->getAll();
        $this->load->view('template/template', $data);
    }
}
?>