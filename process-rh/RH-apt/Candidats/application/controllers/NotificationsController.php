<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificationsController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('NotificationModel');
    }

    public function index() {
        $id = $this->session->userdata('id_can');
        $data['notifications'] = $this->NotificationModel->getAll($id);
        $data['contents'] = 'page/Notifications';
        $this->load->view('template/template', $data);
    }
}
?>