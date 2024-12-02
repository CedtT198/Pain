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
        $this->load->model('SalaireModel');
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
        $pdf->Cell(130);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'Antananarivo, le '.$this->input->post('date_debut'));
        $pdf->Ln(10);

        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10, 'Boulangerie Mihary');
        $pdf->Ln(8);

        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'IIIG Ibiscus USA');
        $pdf->Ln(13);

        $pdf->SetFont('Arial','B',20);
        // $pdf->Cell(8);
        $pdf->SetTextColor(0,100,0);
        $pdf->Cell(30,10,'Objet : Contrat de travail - '.$this->input->post('nom_poste'));
        $pdf->Ln(13);

        $pdf->SetFont('Arial','B',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(30,10,'Monsieur/Madame '.$this->input->post('nom_prenom'));
        $pdf->Ln(15);
        
        $pdf->SetFont('Times','',12);
        // Sortie du texte justifié
        $pdf->MultiCell(0,5,'Il nous fait plaisir de vous souhaiter la bienvenue au sein de notre equipe. Vous occuperez le poste de '.$this->input->post('nom_poste').'. Voici les conditions qui s\'y rapportent pour vous permettre d\'un prendre connaissance et de nous faire part de vos questions ou commentaires.');
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
        $pdf->Cell(30,10,'Mihary, IIIG Ibiscus USA');
        $pdf->Cell(70);
        $pdf->Cell(30,10,$this->input->post('nom_prenom'));
        $pdf->Ln(10);

        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(0,100,0);
        $pdf->Cell(30,10,'Date d\'entree en fonction');
        $pdf->Ln(13);

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Times','',12);
        $pdf->MultiCell(0,5,'Si les conditions enoncees ci-dessous vous conviennet, nous souhaitons fixer la date de votre entree en fonction '.$this->input->post('date_embauche').'.');
    
        
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Times','',12);
        // Sortie du texte justifié
        if ($this->input->post('date_fin') != null) {
            $pdf->MultiCell(0,5,'Il s\'agit ici d\'un '.$this->input->post('nom_type_contrat').'. La fin de votre contrat s\'acheve donc le '.$this->input->post('date_fin').'. Avec possibilite de prolongation a la suite d\'une evaluation.');
        }
        $pdf->Ln(5);

        // $pdf->SetFont('Arial','B',15);
        // $pdf->SetTextColor(0,100,0);
        // $pdf->Cell(30,10,'Horaire de travail');
        // $pdf->Ln(13);

        // $pdf->SetTextColor(0,0,0);
        // $pdf->SetFont('Times','',12);
        // // Sortie du texte justifié
        // $pdf->MultiCell(0,5,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere facilis officiis consequatur ducimus eaque quam minus sunt culpa excepturi fugit.
        // ');

        $pdf->SetFont('Arial','B',15);
        $pdf->SetTextColor(0,100,0);
        $pdf->Cell(30,10,'Remuneration');
        $pdf->Ln(13);

        $salaire = $this->SalaireModel->getSalaireActuel($this->input->post('id_personnel'));

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Times','',12);
        $pdf->MultiCell(0,5,'Votre salaire mensuel sera fixe a '.$salaire.'. Avec possibilite de promotion');

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