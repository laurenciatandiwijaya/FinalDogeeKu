<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePekerjaLayanan extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Pekerja');
		$this->load->model('M_ReportKlinik');
		$this->load->model('M_ReportSalon');
		$this->load->model('M_ReportPenitipan');
		$this->load->model('M_InvoiceOnline');
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
			$data['report'] = $this->M_ReportSalon->ambilReportUpcoming($id_pekerja)->result();
		}
		else{
			$data['report'] = $this->M_ReportPenitipan->ambilReportUpcoming($id_pekerja)->result();
		}
		$this->load->view('V_Report_Upcoming', $data);
	}

	public function tampilanReportFinished()
	{
		$id_pekerja = $_SESSION['id_pekerja'];
		$id_tipe_pengguna = $this->session->userdata("id_tipe_pengguna");

		if($id_tipe_pengguna == "4"){
			$data['report'] = $this->M_ReportKlinik->ambilReportFinished($id_pekerja)->result();
		}
		else if($id_tipe_pengguna == "5"){
			$data['report'] = $this->M_ReportSalon->ambilReportFinished($id_pekerja)->result();
		}
		else{
			$data['report'] = $this->M_ReportPenitipan->ambilReportFinished($id_pekerja)->result();
		}
		$this->load->view('V_Report_Finished', $data);
	}

	public function tampilanEditReport($id_report){
		$id_tipe_pengguna = $this->session->userdata("id_tipe_pengguna");
		
		if($id_tipe_pengguna == "4"){		
			$data['report']= $this->M_ReportKlinik->ambilDataSatuReport($id_report)->result();
			$data['detailLayanan'] = $this->M_ReportKlinik->ambilDetailLayananSatuReport($id_report)->result();

			$data['jumlahObat'] = $this->M_ReportKlinik->ambilObatSatuReport($id_report)->num_rows();

			$data['obatDalamReport'] = $this->M_ReportKlinik->ambilObatSatuReport($id_report)->result();
			$whereObat = array('id_kategori_barang' => "2");
			$data['listSemuaObat'] = $this->M_ReportKlinik->ambilDataLain('barang', $whereObat)->result();
		}
		else if($id_tipe_pengguna == "5"){
			$data['report']= $this->M_ReportSalon->ambilDataSatuReport($id)->result();
			$data['detailLayanan'] = $this->M_ReportSalon->ambilDetailLayananSatuReport($id)->result();
		}
		else{
			$data['report']= $this->M_ReportPenitipan->ambilDataSatuReport($id)->result();
			$data['detailLayanan'] = $this->M_ReportPenitipan->ambilDetailLayananSatuReport($id)->result();
		}
		$this->load->view('V_Edit_ReportPL', $data);
	}	

	public function editReport(){
		$id_pengguna = $this->session->userdata("id_pengguna");
		$id_tipe_pengguna = $this->session->userdata("id_tipe_pengguna");
		$id_report = $this->input->post('id_report');
		$keterangan = $this->input->post('keterangan');
		$status_report = $this->input->post('status_report');
		
		if($id_tipe_pengguna == "4"){	
			$jumlahObat = $this->M_ReportKlinik->ambilObatSatuReport($id_report)->num_rows();
			if($jumlahObat < 1 ){
				$i = 0;
				$id_barang[0] = 0;
				$jumlah_barang[0] = 0;
				$jumlah = $this->input->post('jumlah_barang');

				$dataInvoice = $this->M_ReportKlinik->ambilInvoice($id_report)->row_array();
				$id_invoice = $dataInvoice['id_invoice'];
				$total = $dataInvoice['total'];

				foreach($this->input->post('id_barang') as $id_barangArr){
					if($id_barangArr != ""){
						$id_barang[$i] = $id_barangArr; 
						$jumlah_barang[$i] = $jumlah[$i];
		
						$dataDetailObat = array(
							'id_report_klinik' => $id_report,
							'id_barang' => $id_barang[$i],
							'jumlah_barang' => $jumlah_barang[$i],
							'status_delete' => "Aktif",
							'user_add' => $id_pengguna,
							'waktu_add' => $waktu_add
						);	
						$this->M_ReportKlinik->tambahRecord('detail_obat_report_klinik',$dataDetailObat);
						
						$dataDetailInvoice = array(
							'id_invoice' => $id_invoice,
							'id_barang' => $id_barang[$i],
							'jumlah_barang' => $jumlah_barang[$i],
							'status_delete' => "Aktif",
							'user_add' => $id_pengguna,
							'waktu_add' => $waktu_add
						);	
						$this->M_InvoiceOnline->tambahRecord('detail_invoice_barang',$dataDetailInvoice);

						$where = array('id_barang' => $id_barang[$i]);
						$harga_obatArr['data'] = $this->M_ReportKlinik->tampilanEditrecord('barang', $where)->result();
						foreach($harga_obatArr['data'] as $listObat){
							$harga_obatInt = intval($listObat->harga);
							$harga_total = $harga_total + ($harga_obatInt * $jumlah_barang[$i]);
						}
						$i++;
					}
				}
				if($i > 0){
					$whereInvoice = array('id_invoice' => $id_invoice);
					date_default_timezone_set("Asia/Jakarta");
					$waktu_edit = date("Y-m-d H:i:s");
					$dataInvoice = array(
						'total' => $total+$harga_total,
						'user_edit' => $id_pengguna,
						'waktu_edit' => $waktu_edit
					);
					$this->M_InvoiceOnline->editRecord($whereInvoice,'invoice',$dataInvoice);
				}
			}

			$whereReport = array(
				'id_report_klinik' => $id_report
			);
			
			$dataReport = array(
				'keterangan' => $keterangan,
				'status_report' => $status_report,
				'user_edit' => $id_pengguna,
				'waktu_edit' => $waktu_edit
			);
			$this->M_ReportKlinik->editRecord($whereReport,'report_klinik',$dataReport);
		}

		else if($id_tipe_pengguna == "5"){
			$whereReport = array(
				'id_report_salon' => $id_report
			);
			
			$dataReport = array(
				'keterangan' => $keterangan,
				'status_report' => $status_report,
				'user_edit' => $id_pengguna,
				'waktu_edit' => $waktu_edit
			);
			$this->M_ReportSalon->editRecord($whereReport,'report_salon',$dataReport);
		}

		else{
			$whereReport = array(
				'id_report_penitipan' => $id_report
			);
			
			$dataReport = array(
				'keterangan' => $keterangan,
				'status_report' => $status_report,
				'user_edit' => $id_pengguna,
				'waktu_edit' => $waktu_edit
			);
			$this->M_ReportPenitipan->editRecord($whereReport,'report_penitipan',$dataReport);
		}

		if($status_report == "Menunggu"){
			redirect('HomePekerjaLayanan/tampilanReportUpcoming');
		}
		else{
			redirect('HomePekerjaLayanan/tampilanReportFinished');
		}
	}
}
