<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatbotController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DomaineModel');
        $this->load->model('ConversationModel');
        $this->load->model('MotCleModel');
    }
    
    public function index() {
        $data['conversations'] = $this->ConversationModel->getAll();
        $data['domaines'] = $this->DomaineModel->getAllDomaine();
        $data['contents'] = 'page/Chatbot'; 
        $this->load->view('template/template', $data);
    }
    
    public function choixDomaine() {
        $id = $this->input->post('id');

        $this->session->set_userdata('session_convo', $this->MotCleModel->setDomaineSession($id));

        $data['message'] = "Que puis-je vous aider à propos de ".$this->session->userdata('session_convo')['nom_domaine'].".";
        $data['conversations'] = $this->ConversationModel->getAllByDomaine($this->session->userdata('session_convo')['id_domaine']);
        $data['domaines'] = $this->DomaineModel->getAllDomaine();
        $data['contents'] = 'page/Chatbot';
        $this->load->view('template/template', $data);
    }

    public function talk() {
        $question = $this->input->post('question');

        $dataInsert = array(
            'message' => $question,
            'isChat' => false,
            'id_domaine' => $this->session->userdata('session_convo')['id_domaine']
        );
        $this->ConversationModel->insert($dataInsert);

        // mamaly le chat
        $reponse = $this->MotCleModel->getReponseByPhrase($question, $this->session->userdata('session_convo'));
        
        $dataInsert = array(
            'message' => $reponse,
            'isChat' => true,
            'id_domaine' => $this->session->userdata('session_convo')['id_domaine']
        );
        $this->ConversationModel->insert($dataInsert);

        $data['conversations'] = $this->ConversationModel->getAllByDomaine($this->session->userdata('session_convo')['id_domaine']);
        $data['domaines'] = $this->DomaineModel->getAllDomaine();
        $data['contents'] = 'page/Chatbot'; 
        $this->load->view('template/template', $data);
    }
}
?>