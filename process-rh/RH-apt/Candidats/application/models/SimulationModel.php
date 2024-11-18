<?php

class SimulationModel extends CI_Model {

    public function insert($data) {
        return $this->db->insert('simulation', $data);
    }
    
    public function getAll() {
        $query = $this->db->get('question_simulation');
        return $query->result_array();
    }
    
    public function insertQuetion($data) {
        return $this->db->insert('simulation_questions', $data);
    }

    public function getReponsesQuest($id_quest) {
        $this->db->select('r.id_reponse_simulation, r.reponse');
        $this->db->from('reponses_question rq');
        $this->db->join('reponse_simulation r', 'rq.id_reponse_simulation = r.id_reponse_simulation');
        $this->db->where('rq.id_question_simulation', $id_quest);

        $query = $this->db->get();
        return $query->result_array(); 
    }

    public function getRandomQuestion($nbQuest) {
        $this->db->select('q.*, r.reponse');
        $this->db->from('question_simulation q');
        $this->db->join('reponse_simulation r', 'q.id_reponse_simulation = r.id_reponse_simulation');
        $this->db->order_by('RAND()');
        $this->db->limit($nbQuest);
        return $this->db->get()->result_array();
    }

    public function verifierReponsesCandidat($questions, $reponses) {
        $score = 0;
        // echo var_dump($reponses);
        foreach ($reponses as $rep => $value1) {
            foreach ($questions as $q => $value2) {
                if ($rep == $q && $value1[0] == $value2['id_reponse_simulation']) $score++;
            }
        }

        return $score;
    }

    // public function verifierReponsesCandidat($idCandidat, $reponses) {
    //     $score = 0;
    //     foreach ($reponses as $idQuestion => $idReponse) {
    //         $this->db->where('id_question_simulation', $idQuestion);
    //         $this->db->where('id_reponse_simulation', $idReponse);
    //         if ($this->db->count_all_results('reponses_question') > 0) {
    //             $score++;
    //         }
    //     }
    //     return $score;
    // }
}