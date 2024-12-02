<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CongeController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TypeCongeModel');
        $this->load->model('CongeModel');
        $this->load->model('PersonnelModel');
    }

    public function index() {
        $data['type_conges'] = $this->TypeCongeModel->getAll();
        $data['conges'] = $this->CongeModel->getAllByIdPersonnel($this->input->post('id_personnel'));
        $data['personnel'] = $this->PersonnelModel->getPersonAllDetail($this->input->post('id_personnel'));
        $data['contents'] = 'page/ListeConge';
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $id_personnel = $this->input->post('id_personnel');
        
        // echo $this->CongeModel->verifier_conge($id_personnel);

        if (!$this->CongeModel->verifier_conge($id_personnel)) {
            $data['error'] = "Ne peut plus prendre de congés";
        }
        else {
            $dataInsert = array(
                'date_debut' => $this->input->post('dateDebut'),
                'date_fin' => $this->input->post('dateFin'),
                'id_type_conge' => $this->input->post('type_conge'),
                'id_personnel' => $this->input->post('id_personnel')
            );

            $this->CongeModel->insert($dataInsert);
            // var_dump($dataInsert);
            $data['success'] = "Insertion effectuée avec succès";
        }

        $data['type_conges'] = $this->TypeCongeModel->getAll();
        $data['conges'] = $this->CongeModel->getAllByIdPersonnel($this->input->post('id_personnel'));
        $data['personnel'] = $this->PersonnelModel->getPersonAllDetail($this->input->post('id_personnel'));
        $data['contents'] = 'page/ListeConge';
        $this->load->view('template/template', $data);
    }
}
?>