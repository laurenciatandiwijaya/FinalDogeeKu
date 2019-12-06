<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeManager extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_HomeManager');

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		}
	} 

	public function index()
	{
		$data['stokBarang'] = $this->M_HomeManager->ambilDataStokBarang()->num_rows();
		date_default_timezone_set("Asia/Jakarta");
		$tanggalHariIni = date("Y-m-d");
		$tanggalTanpaStrip = date("Ymd", strtotime($tanggalHariIni));
		$tahunBulan = date("Ym", strtotime($tanggalHariIni));
		$data['pembelianBarang'] = $this->M_HomeManager->ambilJumlahPembelianBarang($tanggalTanpaStrip)->result();
		$data['reservasi'] = $this->M_HomeManager->ambilDataJumlahReservasi($tanggalTanpaStrip)->num_rows();
		$data['pendapatanHarian'] = $this->M_HomeManager->hitungPendapatanHarian($tanggalTanpaStrip)->result();
		$data['pendapatanBulanan'] = $this->M_HomeManager->hitungPendapatanBulanan($tahunBulan)->result();

		$this->load->view('V_Home_Manager', $data);
	}

}
