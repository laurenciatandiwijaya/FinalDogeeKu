<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceToko extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
		$this->load->model('M_InvoiceToko');
		$this->load->model('M_Pelanggan');
		$this->load->model('M_Barang');
	}  
	
	public function index()
	{
		$data['invoice']=$this->M_InvoiceToko->ambilData()->result();
		$this->load->view('V_InvoiceToko',$data);
	}

	public function tampilanTambahData()
	{
		$data['barang']=$this->M_Barang->ambilData()->result();
		$this->load->view('V_TD_InvoiceToko',$data);
	}

	public function tambahData()
	{
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
				$this->M_InvoiceToko->tambahRecord('detail_invoice_barang',$dataDetailInvoice);

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
			'waktu_add' => $waktu_add
		);

		$this->M_InvoiceToko->tambahRecord('invoice',$dataInvoice);
		redirect('InvoiceToko');
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_invoice' => $id
		);
		
		$data['invoice']= $this->M_InvoiceToko->tampilanEditRecord('invoice',$where)->result();
		$data['detailInvoiceBarang'] = $this->M_InvoiceToko->ambilDetailInvoiceBarang($id)->result();
		$this->load->view('V_Detail_InvoiceToko',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_invoice' => $id
		);
		
		$data['invoice']= $this->M_InvoiceToko->tampilanEditRecord('invoice',$where)->result();
		$this->load->view('V_Edit_InvoiceToko',$data);
	}

	public function editData()
	{
		$id_invoice = $this->input->post('id_invoice');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		$status_invoice = $this->input->post('status_invoice');

		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_invoice' => $id_invoice
		);

		$data = array(
			'tanggal' => $tanggal,
			'jam' => $jam,
			'status_invoice' => $status_invoice,
			'waktu_edit' => $waktu_edit
		);

		$this->M_InvoiceToko->editRecord($where,'invoice',$data);
		redirect('InvoiceToko');
	}

	public function deleteData($id)
	{
		$where = array('id_invoice' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'waktu_delete' => $waktu_delete
		);
		$this->M_InvoiceToko->deleteRecord($where, 'invoice', $data);
		$this->M_InvoiceToko->deleteRecord($where, 'detail_invoice_barang', $data);
		redirect('InvoiceToko');
	}

}
