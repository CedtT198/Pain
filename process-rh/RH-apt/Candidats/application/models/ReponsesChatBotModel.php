<?php

class ReponsesChatBotModel extends CI_Model {

    // Fonction pour obtenir toutes les réponses pour un mot-clé donné
    public function getAllReponsesByMotCle($idMotCle) {
        $this->db->select('rc.*');
        $this->db->from('mot_cle_reponse mcr');
        $this->db->join('reponses_chatbot rc', 'mcr.id_reponses_chatbot = rc.id_reponses_chatbot');
        $this->db->where('mcr.id_mot_cle', $idMotCle);
        return $this->db->get()->result();
    }
}
