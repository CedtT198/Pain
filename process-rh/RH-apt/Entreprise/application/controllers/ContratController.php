<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContratController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('fpdf_lib');
        $this->load->model('PersonnelModel');
        $this->load->model('ContratModel');
        $this->load->model('PosteModel');
        $this->load->model('TypeContratModel');
    }

    public function index() {
        $data['personnels'] = $this->PersonnelModel->getAll();
        $data['postes'] = $this->PosteModel->getAll();
        $data['type_contrats'] = $this->TypeContratModel->getAll();
        $data['contents'] = 'page/FormulaireContrat';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/FormulaireContrat';
        $this->load->view('template/template', $data);
    }
    
    public function index3() {
        $data['contents'] = 'page/FormulaireContrat';
        $this->load->view('template/template', $data);
    }

    public function insert() {
        // $data = array(
        //     'date_debut' => $this->input->post('date_debut'),
        //     'date_fin' => $this->input->post('date_fin'),
        //     'date_renvoie' => null,
        //     'id_personnel' => $this->input->post('personnel'),
        //     'id_type_contrat' => $this->input->post('type_contrat'),
        //     'id_poste' => $this->input->post('poste')
        // );
        
        $date_debut = $this->input->post('date_debut');
        $date_fin = $this->input->post('date_fin');
        $date_renvoie = null;
        $id_personnel = $this->input->post('personnel');
        $id_type_contrat = $this->input->post('type_contrat');
        $id_poste = $this->input->post('poste');

        $response = $this->ContratModel->insertContrat($date_debut, $date_fin, $id_personnel, $id_type_contrat, $id_poste);
        
        if (is_int($response)) $data['success'] = 'Insertion effectué avec succès';
        else $data['error'] = $response;

        $data['personnels'] = $this->PersonnelModel->getAll();
        $data['postes'] = $this->PosteModel->getAll();
        $data['type_contrats'] = $this->TypeContratModel->getAll();
        $data['contents'] = 'page/FormulaireContrat';
        $this->load->view('template/template', $data);
    }

    public function generatePdf() {
        $pdf = new Fpdf_lib();
        $pdf->AddPage();

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(150);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'[Ville], le [Date]');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'[Votre nom]');
        $pdf->Ln(8);

        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'[Adresse de votre entreprise]');
        $pdf->Ln(13);

        $pdf->SetFont('Arial','B',20);
        // $pdf->Cell(8);
        $pdf->SetTextColor(0,100,0);
        $pdf->Cell(30,10,'Objet : Contrat de travail - [Poste]');
        $pdf->Ln(13);

        $pdf->SetFont('Arial','B',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'Monsieur/Madame [nom de l"employe]');
        $pdf->Ln(15);
        
        $pdf->SetFont('Times','',12);
        // Sortie du texte justifié
        $pdf->MultiCell(0,5,'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium doloribus nesciunt voluptatem repudiandae perferendis laborum sit iure laboriosam. Voluptate suscipit impedit incidunt laudantium, hic non voluptatibus repudiandae accusantium et officia ipsam, sed quasi atque, iste dolorum. Facere illo hic autem iure. Error soluta iste officia reiciendis ipsum modi minima eum.
        ');
        // Saut de ligne
        // $pdf->Ln();
        // // Mention en italique
        // $pdf->SetFont('','I');
        // $pdf->Cell(0,5,"(fin de l'extrait)");

        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'Contrat de travail entre :');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'Employeur :');
        $pdf->Cell(70);
        $pdf->Cell(30,10, 'Employe :');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'[Nom,adress,coordonnees]');
        $pdf->Cell(70);
        $pdf->Cell(30,10,'[Nom,adress,coordonnees]');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(0,100,0);
        $pdf->Cell(30,10,'Date d"entree en fonction');
        $pdf->Ln(13);

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Times','',12);
        // Sortie du texte justifié
        $pdf->MultiCell(0,5,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere facilis officiis consequatur ducimus eaque quam minus sunt culpa excepturi fugit.
        ');

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Times','',12);
        // Sortie du texte justifié
        $pdf->MultiCell(0,5,'[Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus similique autem quam. Earum blanditiis ea architecto ipsum accusantium adipisci dolore non maxime sapiente eligendi. Hic at distinctio natus beatae explicabo id animi sequi, aperiam eligendi?]');
        $pdf->Ln(5);

        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(0,100,0);
        $pdf->Cell(30,10,'Horaire de travail');
        $pdf->Ln(13);

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Times','',12);
        // Sortie du texte justifié
        $pdf->MultiCell(0,5,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere facilis officiis consequatur ducimus eaque quam minus sunt culpa excepturi fugit.
        ');

        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(0,100,0);
        $pdf->Cell(30,10,'Remuneration');
        $pdf->Ln(13);

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Times','',12);
        // Sortie du texte justifié
        $pdf->MultiCell(0,5,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere facilis officiis consequatur ducimus eaque quam minus sunt culpa excepturi fugit.
        ');

// =======================================================================
// =======================================================================
// =======================================================================
// =======================================================================
// =======================================================================

        

        // $pdf->SetFont('Arial','',12);
        // $pdf->Cell(32);
        // $pdf->SetTextColor(0,0,0);
        // $pdf->Cell(30,10,'Date debut : 20/05/2024  -  Date fin : 20/04/2025');
        // $pdf->Ln(30);
        
        // $pdf->SetFont('Arial','',12);
        // $pdf->Cell(8);
        // $pdf->SetTextColor(0,0,0);
        // $pdf->Cell(30,10,'Description : ');
        // $pdf->Cell(30,10, 'exemple');
        // $pdf->Ln(10);

        // $pdf->SetFont('Arial','',12);
        // $pdf->Cell(8);
        // $pdf->SetTextColor(0,0,0);
        // $pdf->Cell(30,10,'Numero : ');
        // $pdf->Cell(30,10, 'exemple');
        // $pdf->Ln(10);
        
        // $pdf->SetFont('Arial','',12);
        // $pdf->Cell(8);
        // $pdf->SetTextColor(0,0,0);
        // $pdf->Cell(30,10,'Slot : ');
        // $pdf->Cell(30,10, 'exemple');
        // $pdf->Ln(10);
        
        // $pdf->SetFont('Arial','',12);
        // $pdf->Cell(8);
        // $pdf->SetTextColor(0,0,0);
        // $pdf->Cell(30,10,'Duree service : ');
        // $pdf->Cell(30,10, 'exemple');
        // $pdf->Ln(20);

        // $pdf->Line(10, 40, 200, 40);
        // $pdf->Line(10, 100, 200, 100);
        
        // $pdf->SetFont('Arial', 'B', 14);
        // $pdf->Cell(8);
        // $pdf->SetTextColor(0,0,0);
        // $pdf->Cell(30,30,' Cout total du service: ');
        // $pdf->Cell(90);
        // $pdf->Cell(30,30, 'exemple');
        // $pdf->Ln(10);

        // $filename = 'devis_exemple.pdf';
        // $pdf->Output('D', $filename);

        $pdf->Output();
    }
}
?>