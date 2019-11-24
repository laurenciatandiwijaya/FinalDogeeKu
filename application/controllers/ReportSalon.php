<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportSalon extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_ReportSalon');
		$this->load->model('M_ReportKlinik');
		$this->load->model('M_ReportPenitipan');
		$this->load->model('M_Pekerja');
		$this->load->model('M_InvoiceOnline');
	}  
	
	public function index()
	{
		$data['report']=$this->M_ReportSalon->ambilData()->result();
		$this->load->view('V_ReportSalon',$data);
	}

	public function tampilanTambahData()
	{
		$data['anjing'] =  $this->M_ReportSalon->ambilNamaPemilikAnjing()->result();
		$data['pekerja'] = $this->M_Pekerja->ambilDataNamaPekerja()->result();
		$whereDetLay = array('id_layanan' => "2");
		$data['detailLayanan'] = $this->M_ReportSalon->ambilDetailLayanan('detail_layanan', $whereDetLay)->result();
		$this->load->view('V_TD_ReportSalon', $data);
	}

	public function tambahData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$id_anjing = $this->input->post('id_anjing');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		$id_pekerja = $this->input->post('id_pekerja');
		
		$hasil1 = $this->M_ReportSalon->cekReport($id_anjing, $tanggal, $jam, "Menunggu");
		$hasil2 = $this->M_ReportKlinik->cekReport($id_anjing, $tanggal, $jam, "Menunggu");
		$hasil3 = $this->M_ReportPenitipan->cekReport($id_anjing, $tanggal, $jam, "Menunggu");
		$hasil4 = $this->M_ReportSalon->cekPekerja($id_pekerja, $tanggal, $jam, "Menunggu");

		if($hasil1 > 0 || $hasil2 > 0 || $hasil3 > 0 || $hasil4 > 0){
			redirect('ReportSalon/tampilanTambahData');
		}
		else{
			$keterangan = $this->input->post('keterangan');
			$status_report = $this->input->post('status_report');
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$tanggalHariIni = date("Y-m-d");
			$tanggalTanpaStrip = date("Ymd", strtotime($tanggalHariIni));

			$jumlahReport = $this->M_ReportSalon->cekUrutan($tanggalTanpaStrip."SL");
			$urutanReport = $jumlahReport+1;
			$id_report_salon = $tanggalTanpaStrip ."SL". $urutanReport;
			
			$jumlahInvoice = $this->M_InvoiceOnline->cekUrutan($tanggalTanpaStrip."LY");
			$urutanInvoice = $jumlahInvoice+1;
			$id_invoice = $tanggalTanpaStrip ."LY". $urutanInvoice;

			$i = 0;
			$id_detail_layanan[0] = 0;
			$harga_total = 0;
	
			foreach($this->input->post('id_detail_layanan') as $id_detail_layananArr){
				if($id_detail_layananArr != ""){
					$id_detail_layanan[$i] = $id_detail_layananArr; 
	
					$dataDetailLayanan = array(
						'id_report_salon' => $id_report_salon,
						'id_detail_layanan' => $id_detail_layanan[$i],
						'status_delete' => "Aktif",
						'user_add' => $id_pengguna,
						'waktu_add' => $waktu_add
					);	
					$this->M_ReportSalon->tambahRecord('detail_layanan_report_salon',$dataDetailLayanan);
	
					$where = array('id_detail_layanan' => $id_detail_layanan[$i]);
					$harga_detLayArr['data'] = $this->M_ReportSalon->tampilanEditrecord('detail_layanan', $where)->result();
					foreach($harga_detLayArr['data'] as $list){
						$harga_detLayInt = intval($list->harga);
						$harga_total = $harga_total + $harga_detLayInt;
					}
					$i++;
				}
			}

			$dataReport = array(
				'id_report_salon' => $id_report_salon,
				'id_pekerja' => $id_pekerja,
				'tanggal' => $tanggal,
				'jam' => $jam,
				'keterangan' => $keterangan,
				'status_report' => $status_report,
				'status_delete' => "Aktif",
				'user_add' => $id_pengguna,
				'waktu_add' => $waktu_add
			);
			$this->M_ReportSalon->tambahRecord('report_salon',$dataReport);

			$dataPelangganSalon = array(
				'id_anjing' => $id_anjing,
				'id_report_salon' => $id_report_salon,
				'status_delete' => "Aktif",
				'user_add' => $id_pengguna,
				'waktu_add' => $waktu_add
			);
			$this->M_ReportSalon->tambahRecord('pelanggan_salon',$dataPelangganSalon);

			$id_pelanggan = 0;
			$whereIdPelanggan = array('id_anjing' => $id_anjing);
			$id_pelangganArr['data'] = $this->M_ReportSalon->tampilanEditRecord('anjing', $whereIdPelanggan)->result();
			foreach($id_pelangganArr['data'] as $list){
				$id_pelanggan = intval($list->id_pelanggan);
			}
			$dataInvoice = array(
				'id_invoice' => $id_invoice,
				'id_pelanggan' => $id_pelanggan,
				'tanggal' => $tanggalHariIni,
				'jam' => $waktu_add,
				'metode_pembayaran' => "Transfer",
				'total' => $harga_total,
				'status_invoice' => "Belum Lunas",
				'status_delete' => "Aktif",
				'user_add' => $id_pengguna,
				'waktu_add' => $waktu_add
			);
			$this->M_InvoiceOnline->tambahRecord('invoice',$dataInvoice);

			$dataDetailInvoiceLayanan = array(
				'id_invoice' => $id_invoice,
				'id_report' => $id_report_salon,
				'status_delete' => "Aktif",
				'user_add' => $id_pengguna,
				'waktu_add' => $waktu_add
			);
			$this->M_ReportSalon->tambahRecord('detail_invoice_layanan',$dataDetailInvoiceLayanan);

			redirect('ReportSalon');
		}
	}

	public function tampilanDetailData($id)
	{
		$data['report']= $this->M_ReportSalon->ambilDataSatuReport($id)->result();
		$data['detailLayanan'] = $this->M_ReportSalon->ambilDetailLayananSatuReport($id)->result();
		$this->load->view('V_Detail_ReportSalon',$data);
	}

	public function tampilanEditData($id)
	{
		$data['report']= $this->M_ReportSalon->ambilDataSatuReport($id)->result();
		$data['anjing'] =  $this->M_ReportSalon->ambilNamaPemilikAnjing()->result();
		$data['pekerja'] = $this->M_Pekerja->ambilDataNamaPekerja()->result();
		$this->load->view('V_Edit_ReportSalon',$data);
	}

	public function editData()
	{	
		$id_pengguna = $this->session->userdata("id_pengguna");
		$id_anjingAsli = $this->input->post('id_anjingAsli');
		$id_anjingUbah = $this->input->post('id_anjingUbah');
		$tanggalAsli = $this->input->post('tanggalAsli');
		$tanggalUbah = $this->input->post('tanggalUbah');
		$jamAsli = $this->input->post('jamAsli');
		$jamUbah = $this->input->post('jamUbah');
		$id_pekerjaAsli = $this->input->post('id_pekerjaAsli');
		$id_pekerjaUbah = $this->input->post('id_pekerjaUbah');

		$id_anjing = $id_anjingAsli;
		$tanggal = $tanggalAsli;
		$jam = $jamAsli;
		$id_pekerja = $id_pekerjaAsli;

		if($id_anjingAsli != $id_anjingUbah || $tanggalAsli != $tanggalUbah || $jamAsli != $jamUbah || 
		$id_pekerjaAsli != $id_pekerjaUbah){

			$hasil1 = $this->M_ReportSalon->cekReport($id_anjingUbah, $tanggalUbah, $jamUbah, "Menunggu");
			$hasil2 = $this->M_ReportKlinik->cekReport($id_anjingUbah, $tanggalUbah, $jamUbah, "Menunggu");
			$hasil3 = $this->M_ReportPenitipan->cekReport($id_anjingUbah, $tanggalUbah, $jamUbah, "Menunggu");
			$hasil4 = $this->M_ReportSalon->cekPekerja($id_pekerjaUbah, $tanggalUbah, $jamUbah, "Menunggu");

			if($hasil1 > 0 || $hasil2 > 0 || $hasil3 > 0 || $hasil4 > 0){
				redirect('ReportSalon');
			}
			$id_anjing = $id_anjingUbah;
			$tanggal = $tanggalUbah;
			$jam = $jamUbah;
			$id_pekerja = $id_pekerjaUbah;
		}
		$id_report_salon = $this->input->post('id_report_salon');
		$keterangan = $this->input->post('keterangan');
		$status_report = $this->input->post('status_report');
		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_report_salon' => $id_report_salon
		);
		
		$dataReport = array(
			'id_pekerja' => $id_pekerja,
			'tanggal' => $tanggal,
			'jam' => $jam,
			'keterangan' => $keterangan,
			'status_report' => $status_report,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);
		$this->M_ReportSalon->editRecord($where,'report_salon',$dataReport);

		$dataPelangganSalon = array(
			'id_anjing' => $id_anjing,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);
		$this->M_ReportSalon->editRecord($where,'pelanggan_salon',$dataPelangganSalon);

		redirect('ReportSalon');
	}
	
	public function deleteData($id)
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$where = array('id_report_salon' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'user_edit' => $id_pengguna,
			'waktu_delete' => $waktu_delete
		);
		$this->M_ReportSalon->deleteRecord($where, 'report_salon', $data);
		$this->M_ReportSalon->deleteRecord($where, 'pelanggan_salon', $data);
		$this->M_ReportSalon->deleteRecord($where, 'detail_layanan_report_salon', $data);
		redirect('ReportSalon');
	}

}
