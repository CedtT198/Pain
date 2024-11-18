<?php

class NotificationModel extends CI_Model {

    // public function getAll() {
    //     $this->db->order_by('date_notification', 'DESC');
    //     return $this->db->get('notification')->result_array();
    // }
    
    public function insert($data) {
        return $this->db->insert('notification', $data);
    }
    
    public function getAll($id) {  
        $this->db->select('*');
        $this->db->from('notification n');
        $this->db->join('test t', 'n.id_test = t.id_test', 'left');
        $this->db->join('resultat_test rt', 'rt.id_test = t.id_test', 'left');
        $this->db->join('rendez_vous rd', 'rd.id_rendez_vous = n.id_rendez_vous', 'left');
        $this->db->where('t.id_candidature', $id);
        $this->db->or_where('rd.id_candidature', $id);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // public function getAll($id) {  
    //     $sql = "select * from notification n 
    //         left join test t on n.id_test=t.id_test 
    //         left join resultat_test rt on rt.id_test=t.id_test 
    //         left join rendez_vous rd on rd.id_rendez_vous=n.id_rendez_vous 
    //         WHERE t.id_candidature=".$id." or rd.id_candidature=".$id;
        
    //     $query = $this->db->query($sql);
    //     return $query->result_array();
    // } 
    
    public function getAllNomLu($id) {  
        $sql = "
            select * from notification n
            left join test t on n.id_test=t.id_test
            left join resultat_test rt on rt.id_test=t.id_test
            left join rendez_vous rd on rd.id_rendez_vous=n.id_rendez_vous
            WHERE n.vu=false and (t.id_candidature=".$id." or rd.id_candidature=".$id.")";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    } 

    // public function getAll($id) {
    //     $this->db->where('id_candidature', $id);
    //     $this->db->order_by('date_notification', 'DESC');
    //     return $this->db->get('notification')->result_array();
    // }

    // public function getAllNomLu($id) {
    //     $this->db->where('id_candidature', $id);
    //     $this->db->where('vu', false);
    //     return $this->db->get('notification')->result_array();
    // }

    public function updateVu($id) {
        $this->db->set('vu', true);
        $this->db->where('id_notification', $id);
        $this->db->update('notification');
    }
}
