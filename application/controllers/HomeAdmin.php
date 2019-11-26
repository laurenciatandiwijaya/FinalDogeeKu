<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeAdmin extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_HomeAdmin');

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		}
	} 

	public function index()
	{
		$data['stokBarang'] = $this->M_HomeAdmin->ambilDataStokBarang()->num_rows();
		date_default_timezone_set("Asia/Jakarta");
		$tanggalHariIni = date("Y-m-d");
		$tanggalTanpaStrip = date("Ymd", strtotime($tanggalHariIni));
		$data['pembelianBarang'] = $this->M_HomeAdmin->ambilJumlahPembelianBarang($tanggalTanpaStrip)->result();
		$data['reservasi'] = $this->M_HomeAdmin->ambilDataJumlahReservasi($tanggalTanpaStrip)->num_rows();
		$data['pendapatan'] = $this->M_HomeAdmin->hitungPendapatan($tanggalTanpaStrip)->result();
		$this->load->view('V_Home_Admin', $data);
	}

}
