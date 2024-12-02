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

        $pdf->Ln(5);
        $pdf->SetFont('Arial','B',13);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(60);
        $pdf->Cell(30,10,'Avenant au contrat de travail');
        $pdf->Ln(20);

        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'Avenant au contrat de travail de Monsieur/Madame');
        $pdf->SetTextColor(0,100,0);
        $pdf->Cell(70);
        $pdf->Cell(30,10,'nom et prenom du salarie');
        $pdf->Ln(10);

        $pdf->SetTextColor(0,0,0);
        $pdf->SetTextColor(0,100,0);
        $pdf->MultiCell(0,5,'Indiquer ici les deux parties concernees par l"avenant, a savoir l"employeur d"une part, et le salaire');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'Il est prealablement rappele ce qui suit :');
        $pdf->Ln(10);

        $pdf->SetTextColor(0,0,0);
        $pdf->MultiCell(0,5,'Madame/Monsieur nom et prenom du salarie exerce la fonction de | indiquer son intitule de poste | au sein de l"entreprise |nom de l"entreprise| ou il/elle travaille a temps plein/partiel. Le contrat de travail precise que la convention collective applicable est |indiquer le nom de la convention collective| .');
        $pdf->Ln(3);

        $pdf->MultiCell(0,5,'D"un commun accord entre les parties, il est convenu ce qui suit : |indiquer ici ce sur quoi porte l"avenant au contrat de travail : il peut s"agir d"un changement du lieu de travail, d"un changement d"horaire, d"un changement de convention collective…|');
        $pdf->Ln(10);

        $pdf->MultiCell(0,5,'L"article |indiquer le numero de l"article concerne| du travail conlu le |JJ MM AAAA| entre la societe (indiquer le nom de la societe) et Madame/Monsieur |nom et prenom du salaire| est modifier en consequence comme suit :');
        $pdf->Ln(3);

        $pdf->SetTextColor(0,100,0);
        $pdf->Cell(30,10,'Indiquer ici les consequences induites par l" avenant au contrat de travail.');
        $pdf->Ln(10);

        $pdf->SetTextColor(0,0,0);
        $pdf->MultiCell(0,5,'L"ensemble des dispositions contractuelles regies par le contrat de travail, a l"exception de cellesprecedemment evoquees, continuent a s"appliquer dans leur integralite.');
        $pdf->Ln(10);

        $pdf->Cell(135);
        $pdf->Cell(30,10,'Fait a |lieu| et JJ MM AAAA');
        $pdf->Ln(15);

        $pdf->SetFont('Arial','B',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'La societe');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'Monsieur/Madame');
        $pdf->SetTextColor(0,100,0);
        $pdf->Cell(8);
        $pdf->Cell(30,10,'nom et prenom du gerant');
        $pdf->Ln(6);

        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'Signature precedee de la mention "Lu et Approuve"');

        $pdf->Line(10, 210, 130, 210);
        $pdf->Ln(15);

        $pdf->SetFont('Arial','B',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'Le salarie');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'Monsieur/Madame');
        $pdf->SetTextColor(0,100,0);
        $pdf->Cell(8);
        $pdf->Cell(30,10,'nom et prenom du salarie');
        $pdf->Ln(6);

        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'Signature precedee de la mention "Lu et Approuve"');

        $pdf->Line(10, 242, 130, 242);

        // ===================================================================================
        // ===================================================================================
        // ===================================================================================
        // ===================================================================================

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