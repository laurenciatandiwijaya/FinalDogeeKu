<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeAdmin extends CI_Controller {
	function __construct(){
		parent:: __construct();

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		}
	} 

	public function index()
	{
		$this->load->model('M_HomeAdmin');
		$this->load->view('V_Home_Admin');
	}

}
