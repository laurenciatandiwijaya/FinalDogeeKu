<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePekerjaLayanan extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Pekerja');
		$this->load->model('M_ReportKlinik');
		$this->load->model('M_ReportSalon');
		$this->load->model('M_ReportPenitipan');
	} 

	public function index()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$where = array(
			'id_pengguna' => $id_pengguna
		);

		$dataPekerja = $this->M_Pekerja->tampilanEditRecord('pekerja',$where)->row_array();
		$id_pekerja = $dataPekerja['id_pekerja'];
		$_SESSION['id_pekerja'] = $id_pekerja;

		$id_tipe_pengguna = $this->session->userdata("id_tipe_pengguna");
		date_default_timezone_set("Asia/Jakarta");
		$tanggalHariIni = date("Y-m-d");

		if($id_tipe_pengguna == "4"){
			$data['report'] = $this->M_ReportKlinik->ambilReportSatuPekerja($id_pekerja, $tanggalHariIni)->result();
			$data['jumlahPengunjung'] = $this->M_ReportKlinik->ambilReportSatuPekerja($id_pekerja, $tanggalHariIni)->num_rows();
		}
		else if($id_tipe_pengguna == "5"){
			$data['report'] = $this->M_ReportSalon->ambilReportSatuPekerja($id_pekerja, $tanggalHariIni)->result();
			$data['jumlahPengunjung'] = $this->M_ReportKlinik->ambilReportSatuPekerja($id_pekerja, $tanggalHariIni)->num_rows();
		}
		else{
			$data['report'] = $this->M_ReportPenitipan->ambilReportSatuPekerja($id_pekerja, $tanggalHariIni)->result();
			$data['jumlahPengunjung'] = $this->M_ReportKlinik->ambilReportSatuPekerja($id_pekerja, $tanggalHariIni)->num_rows();
		}
		$this->load->view('V_Home_PekerjaLayanan', $data);
	}

	public function tampilanReportUpcoming()
	{
		$id_pekerja = $_SESSION['id_pekerja'];
		$id_tipe_pengguna = $this->session->userdata("id_tipe_pengguna");

		if($id_tipe_pengguna == "4"){
			$data['report'] = $this->M_ReportKlinik->ambilReportUpcoming($id_pekerja)->result();
		}
		else if($id_tipe_pengguna == "5"){
			$data['report'] = $this->M_ReportSalon->ambilReportSatuUpcoming($id_pekerja)->result();
		}
		else{
			$data['report'] = $this->M_ReportPenitipan->ambilReportSatuUpcoming($id_pekerja)->result();
		}
		$this->load->view('V_Report_Upcoming', $data);
	}

	public function tampilanEditReport($id_report){

	}	

	/*public function tampilanInvoiceToko(){
		$data['invoice']=$this->M_InvoiceToko->ambilData()->result();
		$this->load->view('VK_InvoiceToko',$data);
	}

	public function tampilanTambahInvoice(){
		$data['barang']=$this->M_Barang->ambilData()->result();
		$this->load->view('VK_TD_InvoiceToko', $data);
	}

	public function tambahInvoiceToko(){
		date_default_timezone_set("Asia/Jakarta");
		$waktu_add = date("Y-m-d H:i:s");

		$tanggalHariIni = date("Y-m-d");
		$tanggalTanpaStrip = date("Ymd", strtotime($tanggalHariIni));
		
		$jumlahInvoice = $this->M_InvoiceToko->cekUrutan($tanggalTanpaStrip."TK");
		$urutanInvoice = $jumlahInvoice+1;
		$id_invoice = $tanggalTanpaStrip ."TK". $urutanInvoice;

		$i = 0;
		$id_barang[0] = 0;
		$jumlah_barang[0] = 0;
		$harga_total = 0;
		$jumlah = $this->input->post('jumlah_barang');

		foreach($this->input->post('id_barang') as $id_barangArr){
			if($id_barangArr != ""){
				$id_barang[$i] = $id_barangArr; 
				$jumlah_barang[$i] = $jumlah[$i];

				$dataDetailInvoice = array(
					'id_invoice' => $id_invoice,
					'id_barang' => $id_barang[$i],
					'jumlah_barang' => $jumlah_barang[$i],
					'status_delete' => "Aktif",
					'waktu_add' => $waktu_add
				);	
				$this->M_Invoice->tambahRecord('detail_invoice_barang',$dataDetailInvoice);

				$where = array('id_barang' => $id_barang[$i]);
				$harga_barangArr['data'] = $this->M_Barang->tampilanEditrecord('barang', $where)->result();
				foreach($harga_barangArr['data'] as $list){
					$harga_barangInt = intval($list->harga);
					$harga_total = $harga_total + ($harga_barangInt * $jumlah_barang[$i]);
				}
				$i++;
			}
		}

		$dataInvoice = array(
			'id_invoice' => $id_invoice,
			'id_pelanggan' => "0",
			'tanggal' => $tanggalHariIni,
			'jam' => $waktu_add,
			'metode_pembayaran' => "Cash",
			'total' => $harga_total,
			'status_invoice' => "Lunas",
			'status_delete' => "Aktif",
			'user_add' => $this->session->userdata("id_pengguna"),
			'waktu_add' => $waktu_add
		);

		$this->M_InvoiceToko->tambahRecord('invoice',$dataInvoice);
		redirect('HomeKasir');
	}

	public function tampilanTransfer(){
		$data['transfer']=$this->M_Transfer->ambilDataMenunggu()->result();
		$this->load->view('VK_VerifikasiTransfer',$data);
	}

	public function tampilanEditTransfer($id){
		$where = array(
			'id_transfer' => $id
		);

		$data['invoicePelanggan']=$this->M_Transfer->tampilanTambahRecord()->result();
		$data['transfer']= $this->M_Transfer->tampilanEditRecord('transfer',$where)->result();
		$this->load->view('VK_Edit_Transfer',$data);
	}

	public function editDataTransfer(){
		$id_transfer = $this->input->post('id_transfer');
		$tanggal = $this->input->post('tanggal');
		$total = $this->input->post('total');
		$status_transfer = $this->input->post('status_transfer');

		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_transfer' => $id_transfer
		);

		$data = array(
			'tanggal' => $tanggal,
			'total' => $total,
			'status_transfer' => $status_transfer,
			'user_edit' => $this->session->userdata("id_pengguna"),
			'waktu_edit' => $waktu_edit
		);

		$this->M_Transfer->editRecord($where,'transfer',$data);
		redirect('HomeKasir/tampilanTransfer');
	}*/
}
