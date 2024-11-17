<?php

class SimulationModel extends CI_Model {

    public function insert($data) {
        return $this->db->insert('simulation', $data);
    }

    
    public function insertQuetion($data) {
        return $this->db->insert('simulation_questions', $data);
    }

    public function getRandomQuestion($nbQuest) {
        $this->db->select('q.*, r.reponse');
        $this->db->from('question_simulation q');
        $this->db->join('reponse_simulation r', 'q.id_reponse_simulation = r.id_reponse_simulation');
        $this->db->order_by('RAND()');
        $this->db->limit($nbQuest);
        return $this->db->get()->result();
    }

    public function verifierReponsesCandidat($idCandidat, $reponses) {
        $score = 0;
        foreach ($reponses as $idQuestion => $idReponse) {
            $this->db->where('id_question_simulation', $idQuestion);
            $this->db->where('id_reponse_simulation', $idReponse);
            if ($this->db->count_all_results('reponses_question') > 0) {
                $score++;
            }
        }
        return $score;
    }
}