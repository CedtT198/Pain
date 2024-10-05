<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RubriqueController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RubriqueModel');
    }
}
?>