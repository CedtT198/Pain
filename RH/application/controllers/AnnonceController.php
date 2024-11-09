<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnnonceController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['contents'] = 'page/FormulaireAnnonce';
        // $data['receptions'] = $this->BonDeReceptionModel->getAll($id_fournisseur);
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/ListeAnnonce';
        // $data['receptions'] = $this->BonDeReceptionModel->getAll($id_fournisseur);
        $this->load->view('template/template', $data);
    }

}
?>