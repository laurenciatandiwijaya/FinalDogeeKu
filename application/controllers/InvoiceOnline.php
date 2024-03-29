<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceOnline extends CI_Controller {
	
	function __construct(){
		parent:: __construct();
		$this->load->model('M_InvoiceOnline');
		$this->load->model('M_Pelanggan');
		$this->load->model('M_Barang');

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		}
	}  
	
	public function index()
	{
		$data['invoice']=$this->M_InvoiceOnline->ambilData()->result();
		$data['pelanggan'] = $this->M_Pelanggan->ambilDataNamaPelanggan()->result();
		$this->load->view('V_InvoiceOnline',$data);
	}

	public function tampilanTambahData()
	{
		$data['pelanggan']=$this->M_Pelanggan->ambilDataNamaPelanggan()->result();
		$data['barang']=$this->M_Barang->ambilData()->result();
		$this->load->view('V_TD_InvoiceOnline',$data);
	}

	public function tambahData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$id_pelanggan = $this->input->post('id_pelanggan');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		$metode_pembayaran = $this->input->post('metode_pembayaran');
		$alamat = $this->input->post('alamat');
		date_default_timezone_set("Asia/Jakarta");
		$waktu_add = date("Y-m-d H:i:s");

		$tanggalHariIni = date("Y-m-d");
		$tanggalTanpaStrip = date("Ymd", strtotime($tanggalHariIni));
		
		$jumlahInvoice = $this->M_InvoiceOnline->cekUrutan($tanggalTanpaStrip."OL");
		$urutanInvoice = $jumlahInvoice+1;
		$id_invoice = $tanggalTanpaStrip ."OL". $urutanInvoice;

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
					'user_add' => $id_pengguna,
					'waktu_add' => $waktu_add
				);	
				$this->M_InvoiceOnline->tambahRecord('detail_invoice_barang',$dataDetailInvoice);

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
			'id_pelanggan' => $id_pelanggan,
			'tanggal' => $tanggal,
			'jam' => $jam,
			'metode_pembayaran' => $metode_pembayaran,
			'alamat' => $alamat,
			'total' => $harga_total,
			'status_invoice' => "Belum Lunas",
			'status_pengiriman' => "Belum Dikirim",
			'status_delete' => "Aktif",
			'user_add' => $id_pengguna,
			'waktu_add' => $waktu_add
		);

		$this->M_InvoiceOnline->tambahRecord('invoice',$dataInvoice);
		redirect('InvoiceOnline');		
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_invoice' => $id
		);
		
		$data['invoice']= $this->M_InvoiceOnline->tampilanEditRecord('invoice',$where)->result();
		$data['pelanggan']= $this->M_Pelanggan->ambilDataNamaPelanggan()->result();
		$data['detailInvoiceBarang'] = $this->M_InvoiceOnline->ambilDetailInvoiceBarang($id)->result();
		$this->load->view('V_Detail_InvoiceOnline',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_invoice' => $id
		);
		
		$data['invoice']= $this->M_InvoiceOnline->tampilanEditRecord('invoice',$where)->result();
		$data['pelanggan']= $this->M_Pelanggan->ambilDataNamaPelanggan()->result();
		$this->load->view('V_Edit_InvoiceOnline',$data);
	}

	public function editData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$id_invoice = $this->input->post('id_invoice');
		$id_pelanggan = $this->input->post('id_pelanggan');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		$metode_pembayaran = $this->input->post('metode_pembayaran');
		$alamat = $this->input->post('alamat');
		$status_invoice = $this->input->post('status_invoice');
		$status_pengiriman = $this->input->post('status_pengiriman');

		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_invoice' => $id_invoice
		);

		$data = array(
			'id_pelanggan' => $id_pelanggan,
			'tanggal' => $tanggal,
			'jam' => $jam,
			'metode_pembayaran' => $metode_pembayaran,
			'alamat' => $alamat,
			'status_invoice' => $status_invoice,
			'status_pengiriman' => $status_pengiriman,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);

		$this->M_InvoiceOnline->editRecord($where,'invoice',$data);

		if($metode_pembayaran == "Transfer" && $status_invoice == "Batal"){
			$dataStatusDelete = array(
				'status_delete' => "Tidak Aktif",
				'user_delete' => $id_pengguna,
				'waktu_delete' => $waktu_delete
			);
			$this->M_InvoiceOnline->editRecord($where,'detail_invoice_barang',$dataStatusDelete);

			$dataTransfer = array(
				'status_transfer' => "Batal",
				'user_edit' => $id_pengguna,
				'waktu_edit' => $waktu_delete
			);
			$this->M_Transfer->editRecord($where,'transfer',$dataTransfer);
		}
		else if($status_invoice == "Lunas"){
			$dataTransfer = array(
				'status_transfer' => "Berhasil"
			);
			$this->M_Transfer->editRecord($where,'transfer',$dataTransfer);

			$invoiceBarang_Arr['dataBarang'] = $this->M_Barang->tampilanEditrecord('detail_invoice_barang', $where)->result();
			foreach($invoiceBarang_Arr['dataBarang'] as $list){
				$id_barang = $list->id_barang;
				$jumlah_barang = $list->jumlah_barang;

				$whereBarang = array(
					'id_barang' => $id_barang,
				);
				$barang_Arr = $this->M_Barang->tampilanEditrecord('barang', $whereBarang)->row_array();
				$stok_barang = $barang_Arr['jumlah_barang'];

				$sisa_barang = intval($stok_barang) - intval($jumlah_barang);

				$dataUpdateBarang = array(
					'jumlah_barang' => $sisa_barang,
					'user_edit' => $id_pengguna,
					'waktu_edit' => $waktu_edit
				);
				$this->M_Barang->editRecord($whereBarang,'barang',$dataUpdateBarang);
			}
		}
		redirect('InvoiceOnline');
	}

	public function deleteData($id)
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$where = array('id_invoice' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'user_delete' => $id_pengguna,
			'waktu_delete' => $waktu_delete
		);
		$this->M_InvoiceOnline->deleteRecord($where, 'invoice', $data);
		$this->M_InvoiceOnline->deleteRecord($where, 'detail_invoice_barang', $data);
		redirect('Invoice');
	}
}
