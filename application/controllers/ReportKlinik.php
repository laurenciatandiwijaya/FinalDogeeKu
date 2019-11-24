<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportKlinik extends CI_Controller {
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
		$data['report']=$this->M_ReportKlinik->ambilData()->result();
		$this->load->view('V_ReportKlinik',$data);
	}

	public function tampilanTambahData()
	{
		$data['anjing'] =  $this->M_ReportKlinik->ambilNamaPemilikAnjing()->result();
		$data['pekerja'] = $this->M_Pekerja->ambilDataNamaPekerja()->result();
		$whereDetLay = array('id_layanan' => "1");
		$data['detailLayanan'] = $this->M_ReportKlinik->ambilDataLain('detail_layanan', $whereDetLay)->result();
		$whereObat = array('id_kategori_barang' => "2");
		$data['obat'] = $this->M_ReportKlinik->ambilDataLain('barang', $whereObat)->result();
		$this->load->view('V_TD_ReportKlinik', $data);
	}

	public function tambahData()
	{
		$id_anjing = $this->input->post('id_anjing');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		$id_pekerja = $this->input->post('id_pekerja');
		
		$hasil1 = $this->M_ReportKlinik->cekReport($id_anjing, $tanggal, $jam, "Menunggu");
		$hasil2 = $this->M_ReportSalon->cekReport($id_anjing, $tanggal, $jam, "Menunggu");
		$hasil3 = $this->M_ReportPenitipan->cekReport($id_anjing, $tanggal, $jam, "Menunggu");
		$hasil4 = $this->M_ReportKlinik->cekPekerja($id_pekerja, $tanggal, $jam, "Menunggu");

		if($hasil1 > 0 || $hasil2 > 0 || $hasil3 > 0 || $hasil4 > 0){
			redirect('ReportKlinik/tampilanTambahData');
		}
		else{
			$keterangan = $this->input->post('keterangan');
			$status_report = $this->input->post('status_report');
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$tanggalHariIni = date("Y-m-d");
			$tanggalTanpaStrip = date("Ymd", strtotime($tanggalHariIni));

			$jumlahReport = $this->M_ReportKlinik->cekUrutan($tanggalTanpaStrip."KL");
			$urutanReport = $jumlahReport+1;
			$id_report_klinik = $tanggalTanpaStrip ."KL". $urutanReport;
			
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
						'id_report_klinik' => $id_report_klinik,
						'id_detail_layanan' => $id_detail_layanan[$i],
						'status_delete' => "Aktif",
						'waktu_add' => $waktu_add
					);	
					$this->M_ReportKlinik->tambahRecord('detail_layanan_report_klinik',$dataDetailLayanan);
	
					$where = array('id_detail_layanan' => $id_detail_layanan[$i]);
					$harga_detLayArr['data'] = $this->M_ReportKlinik->tampilanEditrecord('detail_layanan', $where)->result();
					foreach($harga_detLayArr['data'] as $listDL){
						$harga_detLayInt = intval($listDL->harga);
						$harga_total = $harga_total + $harga_detLayInt;
					}
					$i++;
				}
			}
			$i = 0;
			$id_barang[0] = 0;
			$jumlah_barang[0] = 0;
			$jumlah = $this->input->post('jumlah_barang');
			foreach($this->input->post('id_barang') as $id_barangArr){
				if($id_barangArr != ""){
					$id_barang[$i] = $id_barangArr; 
					$jumlah_barang[$i] = $jumlah[$i];
	
					$dataDetailObat = array(
						'id_report_klinik' => $id_report_klinik,
						'id_barang' => $id_barang[$i],
						'jumlah_barang' => $jumlah_barang[$i],
						'status_delete' => "Aktif",
						'waktu_add' => $waktu_add
					);	
					$this->M_ReportKlinik->tambahRecord('detail_obat_report_klinik',$dataDetailObat);
					
					$dataDetailInvoice = array(
						'id_invoice' => $id_invoice,
						'id_barang' => $id_barang[$i],
						'jumlah_barang' => $jumlah_barang[$i],
						'status_delete' => "Aktif",
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

			$dataReport = array(
				'id_report_klinik' => $id_report_klinik,
				'id_pekerja' => $id_pekerja,
				'tanggal' => $tanggal,
				'jam' => $jam,
				'keterangan' => $keterangan,
				'status_report' => $status_report,
				'status_delete' => "Aktif",
				'waktu_add' => $waktu_add
			);
			$this->M_ReportKlinik->tambahRecord('report_klinik',$dataReport);

			$dataPelangganKlinik = array(
				'id_anjing' => $id_anjing,
				'id_report_klinik' => $id_report_klinik,
				'status_delete' => "Aktif",
				'waktu_add' => $waktu_add
			);
			$this->M_ReportKlinik->tambahRecord('pelanggan_klinik',$dataPelangganSalon);

			$id_pelanggan = 0;
			$whereIdPelanggan = array('id_anjing' => $id_anjing);
			$id_pelangganArr['data'] = $this->M_ReportKlinik->tampilanEditRecord('anjing', $whereIdPelanggan)->result();
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
				'waktu_add' => $waktu_add
			);
			$this->M_InvoiceOnline->tambahRecord('invoice',$dataInvoice);

			$dataDetailInvoiceLayanan = array(
				'id_invoice' => $id_invoice,
				'id_report' => $id_report_klinik,
				'status_delete' => "Aktif",
				'waktu_add' => $waktu_add
			);
			$this->M_ReportKlinik->tambahRecord('detail_invoice_layanan',$dataDetailInvoiceLayanan);

			redirect('ReportKlinik');
		}
	}

	public function tampilanDetailData($id)
	{
		$data['report']= $this->M_ReportKlinik->ambilDataSatuReport($id)->result();
		$data['detailLayanan'] = $this->M_ReportKlinik->ambilDetailLayananSatuReport($id)->result();
		$data['obat'] = $this->M_ReportKlinik->ambilObatSatuReport($id)->result();
		$this->load->view('V_Detail_ReportKlinik',$data);
	}

	public function tampilanEditData($id)
	{
		$data['report']= $this->M_ReportKlinik->ambilDataSatuReport($id)->result();
		$data['anjing'] =  $this->M_ReportKlinik->ambilNamaPemilikAnjing()->result();
		$data['pekerja'] = $this->M_Pekerja->ambilDataNamaPekerja()->result();
		$this->load->view('V_Edit_ReportKlinik',$data);
	}

	public function editData()
	{	$id_anjingAsli = $this->input->post('id_anjingAsli');
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

			$hasil1 = $this->M_ReportKlinik->cekReport($id_anjingUbah, $tanggalUbah, $jamUbah, "Menunggu");
			$hasil2 = $this->M_ReportSalon->cekReport($id_anjingUbah, $tanggalUbah, $jamUbah, "Menunggu");
			$hasil3 = $this->M_ReportPenitipan->cekReport($id_anjingUbah, $tanggalUbah, $jamUbah, "Menunggu");
			$hasil4 = $this->M_ReportKlinik->cekPekerja($id_pekerjaUbah, $tanggalUbah, $jamUbah, "Menunggu");

			if($hasil1 > 0 || $hasil2 > 0 || $hasil3 > 0 || $hasil4 > 0){
				redirect('ReportKlinik');
			}
			$id_anjing = $id_anjingUbah;
			$tanggal = $tanggalUbah;
			$jam = $jamUbah;
			$id_pekerja = $id_pekerjaUbah;
		}
		$id_report_klinik = $this->input->post('id_report_klinik');
		$keterangan = $this->input->post('keterangan');
		$status_report = $this->input->post('status_report');
		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_report_klinik' => $id_report_klinik
		);
		
		$dataReport = array(
			'id_pekerja' => $id_pekerja,
			'tanggal' => $tanggal,
			'jam' => $jam,
			'keterangan' => $keterangan,
			'status_report' => $status_report,
			'waktu_edit' => $waktu_edit
		);
		$this->M_ReportKlinik->editRecord($where,'report_klinik',$dataReport);

		$dataPelangganKlinik = array(
			'id_anjing' => $id_anjing,
			'waktu_edit' => $waktu_edit
		);
		$this->M_ReportKlinik->editRecord($where,'pelanggan_klinik',$dataPelangganKlinik);

		redirect('ReportKlinik');
	}
	
	public function deleteData($id)
	{
		$where = array('id_report_klinik' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'waktu_delete' => $waktu_delete
		);
		$this->M_ReportKlinik->deleteRecord($where, 'report_klinik', $data);
		$this->M_ReportKlinik->deleteRecord($where, 'pelanggan_klinik', $data);
		$this->M_ReportKlinik->deleteRecord($where, 'detail_layanan_report_klinik', $data);
		$this->M_ReportKlinik->deleteRecord($where, 'detail_obat_report_klinik', $data);
		redirect('ReportKlinik');
	}

}
