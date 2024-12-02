<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AvenantController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('fpdf_lib');
        // $this->load->model('PersonnelModel');
        // $this->load->model('ContratModel');
        // $this->load->model('PosteModel');
        // $this->load->model('TypeContratModel');
    }

    public function generatePdf() {
        $pdf = new Fpdf_lib();
        $pdf->AddPage();

        

        $pdf->Output();
    }
}
?>