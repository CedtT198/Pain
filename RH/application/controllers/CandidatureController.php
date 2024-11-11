<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CandidatureController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AnnonceModel');
        $this->load->model('DiplomeModel');
        $this->load->model('CandidatureInAnnonceModel');
        $this->load->model('CandidatureModel');
    }

    public function index() {
        $data['diplomes'] = $this->DiplomeModel->getAll();
        $data['annonces'] = $this->AnnonceModel->getAllWithTravail();
        $data['contents'] = 'page/FormulaireCandidature';
        $this->load->view('template/template', $data);
    }

    public function insert() {
        $data = array(
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'date_naissance' => $this->input->post('date_naissance'),
            'date_candidature' => $this->input->post('date_candidature'),
            'id_diplome' => $this->input->post('diplome')
        );
        $id_candidature = $this->CandidatureModel->insert($data);
        
        $data = array(
            'id_annonce' => $this->input->post('id_annonce'),
            'id_candidature' => $id_candidature
        );
        $this->CandidatureInAnnonceModel->insert($data);
        
        $data['diplomes'] = $this->DiplomeModel->getAll();
        $data['annonces'] = $this->AnnonceModel->getAllWithTravail();
        $data['success'] = 'Candidature envoyé avec succès. Aller ajouter vos experiences professionnelles.';
        $data['contents'] = 'page/FormulaireCandidature';
        $this->load->view('template/template', $data);
    }
}
?>