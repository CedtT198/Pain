<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RuptureContratController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RuptureContratModel');
        // $this->load->model('MotifRutpureContratModel');
    }

    public function licencie() {
        $id_motif_rupture = $this->input->post('id_motif_rupture');
        $id_personnel = $this->input->post('id_personnel');

        $data = array(
            'date_rupture_contrat' => date('Y-m-d'),
            'id_motif_rupture_contrat' => $id,
            'id_type_rupture_contrat' => 3,
            'id_personnel' => $id_personnel
        );
        $this->RuptureContratModel->insert();
        redirect("PersonnelController/index2");
    }

    public function demission() {
        $id_motif_rupture = $this->input->post('id_motif_rupture');
        $id_personnel = $this->input->post('id_personnel');

        $data = array(
            'date_rupture_contrat' => date('Y-m-d'),
            'id_motif_rupture_contrat' => $id,
            'id_type_rupture_contrat' => 2,
            'id_personnel' => $id_personnel
        );
        $this->RuptureContratModel->insert();
        redirect("PersonnelController/index2");
    }
    
    public function commun_accord() {
        $id_motif_rupture = $this->input->post('id_motif_rupture');
        $id_personnel = $this->input->post('id_personnel');
        
        $data = array(
            'date_rupture_contrat' => date('Y-m-d'),
            'id_motif_rupture_contrat' => $id,
            'id_type_rupture_contrat' => 1,
            'id_personnel' => $id_personnel
        );
        $this->RuptureContratModel->insert();
        redirect("PersonnelController/index2");
    }
}
?>