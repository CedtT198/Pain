<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require('fpdf185/fpdf.php');

class Fpdf_lib extends FPDF {
	function __construct() {
		parent::__construct();
	}
}