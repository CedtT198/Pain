<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimulationController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SimulationModel');
    }

    public function index() {
        $data['contents'] = 'page/SimulationValider'; 
        $this->load->view('template/template', $data);
    }
    
    public function begin() {
        $difficulte= $this->input->post('difficulte');
        $data['questions'] = $this->SimulationModel->getRandomQuestion($difficulte);
        $data['repp'] = $this->SimulationModel->getReponsesQuest(1);

        $data['contents'] = 'page/Simulation'; 
        $this->load->view('template/template', $data);
    }

    public function getResultat() {
        // questions
        $questions = $this->input->post("data");

        if ($questions) $questions = json_decode($questions, true); 
        // echo var_dump($questions).'<br/><br/>';

        foreach ($questions as $key => $value) {
            $questions[$key] = $value;
            // echo $key . ' - '.$value["id_reponse_simulation"] . '<br/>';
        }

        // réponses
        $post_data = $this->input->post();

        $data = array();

        foreach ($post_data as $key => $value) {
            $reponses[$key] = $value;
            // echo $key . ' - '.$value[0] . '<br/>';
        }

        // foreach ($reponses as $rep) {
        //     echo $rep[0].'<br/>';
        // }
        // echo '<br/><br/>';
        // echo var_dump($reponses).'<br/><br/>';

        $score = $this->SimulationModel->verifierReponsesCandidat($questions, $reponses);
        echo $score;
        $data['contents'] = 'page/ResultatSimulation'; 
        $data['score'] = $score; 
        $data['nb_question'] = Count($questions); 
        $this->load->view('template/template', $data);
    }
}
?>