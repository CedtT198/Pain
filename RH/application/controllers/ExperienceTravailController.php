<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExperienceTravailController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['contents'] = 'page/FormulaireExperienceTravail';
        // $data['receptions'] = $this->BonDeReceptionModel->getAll($id_fournisseur);
        $this->load->view('template/template', $data);
    }

}
?>