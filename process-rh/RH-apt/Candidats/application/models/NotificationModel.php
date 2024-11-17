<?php

class NotificationModel extends CI_Model {

    public function getAll() {
        $this->db->order_by('date_notification', 'DESC');
        return $this->db->get('notification')->result();
    }

    public function getAllNomLu() {
        $this->db->where('vu', false);
        return $this->db->get('notification')->result();
    }

    public function updateVu($id) {
        $this->db->set('vu', true);
        $this->db->where('id_notification', $id);
        $this->db->update('notification');
    }
}
