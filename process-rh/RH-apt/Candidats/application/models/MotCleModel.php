<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MotCleModel extends CI_Model {

    // Fonction pour obtenir tous les mots-clés pour un domaine donné
    public function getAllMotCleByDomaine($idDomaine) {
        $this->db->select('mc.*');
        $this->db->from('mot_cle_domaine mcd');
        $this->db->join('mot_cle mc', 'mcd.id_mot_cle = mc.id_mot_cle');
        $this->db->where('mcd.id_domaine', $idDomaine);
        return $this->db->get()->result();
    }

    public function getAll() {
        return $this->db->get('mot_cle')->result();
    }

    public function getMotCleByIdDomaine($idDomaine) {
        $query = $this->db->get_where('mot_cle', array('id_domaine' => $idDomaine));
        return $query->result();
    }

    public function getSynonymeByIdMotCle($idMotCle) {
        $query = $this->db->get_where('synonymes', array('id_mot_cle' => $idMotCle));
        return $query->result();
    }

    public function getReponseByIdMotCle($idMotCle) {
        $query = $this->db->get_where('reponse', array('id_mot_cle' => $idMotCle));
        return $query->row();
    }

    public function setDomaineSession($idDomaine) {

        $this->db->select('*');
        $this->db->from('domaine');
        $this->db->where('id', $idDomaine);
        $domaineQuery = $this->db->get();
        $domaine = $domaineQuery->row();

        if (!$domaine) {
            return null; 
        }

        $motCleList = $this->getMotCleByIdDomaine($idDomaine);
        
        $result = [
            "id_domaine" => $domaine->id,
            "nom_domaine" => $domaine->nom,
            "mot_cle_liste" => []
        ];

        foreach ($motCleList as $motCle) {
            // Fetch synonyms for each mot_cle
            $synonymes = $this->getSynonymeByIdMotCle($motCle->id);
            
            // Fetch response for each mot_cle
            $reponse = $this->getReponseByIdMotCle($motCle->id);

            $motCleData = [
                "id_mot_cle" => $motCle->id,
                "nom" => $motCle->nom,
                "synonymes" => $synonymes,
                "reponse" => $reponse ? $reponse->reponse_to_mot_cle : null
            ];

            $result["mot_cle_liste"][] = $motCleData;
        }

        return $result;
    }
    // mamerina otranzao io
    // [
    //     {
    //         "id_domaine" : 1,
    //         "nom_domaine" : "Entretien",
    //         "mot_cle_liste" :[
    //             {
    //                 "id_mot_cle":1,
    //                 "nom":"Entretien",
    //                 "synonymes":[
    //                     {
    //                         "id":1,
    //                         "nom":"Interview"
    //                     }
    //                 ]
    //                 "reponse":"Préparez-vous bien à l\'entretien en recherchant des informations sur l\'entreprise."
    //             }
    //         ]
    //     }
    // ]
    public function getReponseByPhrase($phrase, $domaineSession) {
        //$domaineSession io le ref nampidirinla session le avy mikitika domaine
        $phrase = strtolower($phrase);
        // Parcourir mot cle am seesion domaine
        foreach ($domaineSession['mot_cle_liste'] as $motCleData) {
            // Verifier si mot_cle ao am $phrase
            if (strpos($phrase, strtolower($motCleData['nom'])) !== false) {
                return $motCleData['reponse'];
            }
    
            // synonymes
            foreach ($motCleData['synonymes'] as $synonyme) {
                if (strpos($phrase, strtolower($synonyme->nom)) !== false) {
                    return $motCleData['reponse'];
                }
            }
        }
        return "Aucune réponse trouvée pour cette phrase.";
    }
    
}
