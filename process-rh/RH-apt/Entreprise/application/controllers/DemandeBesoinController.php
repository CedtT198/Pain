<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DemandeBesoinController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PosteModel');
        $this->load->model('DepartementModel');
        $this->load->model('DemandeBesoinModel');
    }

    public function index() {
        $data['departements'] = $this->DepartementModel->getAll();
        $data['postes'] = $this->PosteModel->getAll();
        $data['contents'] = 'page/FormulaireDemandeBesoin';
        $this->load->view('template/template', $data);
    }
    
    public function index2() {
        $data['demandes'] = $this->DemandeBesoinModel->getAll();
        $data['contents'] = 'page/ListeDemandeBesoin';
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $id_poste = $this->input->post('id_poste');
        $response = $this->PosteModel->alreadyExistencePoste($id_poste);

        // echo $id_poste;
        // echo var_dump($response);

        if (Count($response) == 0) {
            // echo "succes";
            $data = array(
                'date_demande' => date('Y-m-d'),
                'id_poste' => $id_poste,
                'id_departement' => $this->input->post('id_departement')
            );
    
            $this->DemandeBesoinModel->insert($data);
            
            $data['success'] = 'Demande envoyée ! ';
        }
        else {
            // echo "Il y a déjà ce post.";
            $data['error'] = 'Il y a déjà ce poste occupé par ce personnel. ';
        }

        $data['departements'] = $this->DepartementModel->getAll();
        $data['postes'] = $this->PosteModel->getAll();
        $data['contents'] = 'page/FormulaireDemandeBesoin';
        $this->load->view('template/template', $data);
    }
}
?>