<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonnelController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PersonnelModel');
        $this->load->model('PosteModel');
        $this->load->model('ContratModel');
        $this->load->model('FichePaieModel');
        $this->load->model('CategoriePersonnelModel');
    }
    
    public function index() {
        $data['postes'] = $this->PosteModel->getAll();
        $data['contents'] = 'page/FormulairePersonnel';
        $this->load->view('template/template', $data);
    }

    public function index2() {
        $data['contents'] = 'page/ListePersonnel';
        $data['personnels'] = $this->ContratModel->getAllWithPersonAndContrat();
        $data['categorie_personnel'] = $this->CategoriePersonnelModel->getAll();
        $this->load->view('template/template', $data);
    }
    
    public function index3() {
        $data['contents'] = 'page/FormulaireRenvoiePersonnel';
        $data['personnels'] = $this->ContratModel->getAllWithPersonAndContratNonRenvoye();
        $this->load->view('template/template', $data); 
    }

    // public function renvoyer() {
    //     $id = $this->input->post('id_contrat');
    //     $data = array(
    //         'date_renvoie' => date('Y-m-d')
    //     );

    //     $this->ContratModel->update($id, $data);

    //     $data['contents'] = 'page/FormulaireRenvoiePersonnel';
    //     $data['success'] = 'Personnel renvoyé.';
    //     $data['personnels'] = $this->ContratModel->getAllWithPersonAndContratNonRenvoye();
    //     $this->load->view('template/template', $data);
    // }

    public function filterByCategoriePersonnel() {
        $data['contents'] = 'page/ListePersonnel';
        $data['personnels'] = $this->PersonnelModel->getAllWithPersonAndContratByIdcatPers($this->input->post('id_cat_pers'));
        $data['categorie_personnel'] = $this->CategoriePersonnelModel->getAll();
        $this->load->view('template/template', $data);
    }
    
    public function insert() {
        $data = array(
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'date_naissance' => $this->input->post('date_naissance'),
            'id_poste' => $this->input->post('poste')
        );
        $this->PersonnelModel->insert($data);

        $data['postes'] = $this->PosteModel->getAll();
        $data['contents'] = 'page/FormulairePersonnel';
        $data['success'] = 'Insertion effectué avec succès.';
        $this->load->view('template/template', $data);
    }

    public function licencie() {
        $data['contents'] = 'page/RuptureContrat';
        $this->load->view('template/template', $data);
    }
}
?>