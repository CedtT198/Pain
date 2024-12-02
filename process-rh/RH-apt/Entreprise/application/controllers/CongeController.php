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

    
}
?>