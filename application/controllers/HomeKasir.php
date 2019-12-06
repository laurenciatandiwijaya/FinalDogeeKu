<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeKasir extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Barang');
		$this->load->model('M_InvoiceToko');
		$this->load->model('M_InvoiceOnline');
		$this->load->model('M_Transfer');
		$this->load->model('M_Pelanggan');

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		}
	} 

	public function index()
	{
		$data['barang'] = $this->M_Barang->ambilData()->result();
		$this->load->view('V_Home_Kasir', $data);
	}

	public function tampilanInvoiceToko(){
		$data['invoice']=$this->M_InvoiceToko->ambilData()->result();
		$this->load->view('VK_InvoiceToko',$data);
	}

	public function tampilanTambahInvoice(){
		$data['barang']=$this->M_Barang->ambilData()->result();
		$this->load->view('VK_TD_InvoiceToko', $data);
	}

	public function tambahInvoiceToko(){
		$id_pengguna = $this->session->userdata("id_pengguna");
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
					'user_add' => $id_pengguna,
					'waktu_add' => $waktu_add
				);	
				$this->M_InvoiceToko->tambahRecord('detail_invoice_barang',$dataDetailInvoice);

				$where = array('id_barang' => $id_barang[$i]);
				$barangArr['data'] = $this->M_Barang->tampilanEditrecord('barang', $where)->result();
				foreach($barangArr['data'] as $list){//untuk cari harga total sama update stok barang
					$harga_barangInt = intval($list->harga);
					$harga_total = $harga_total + ($harga_barangInt * $jumlah_barang[$i]);

					$stok_barangAwal = intval($list->jumlah_barang);
					$sisa_barang = $stok_barangAwal - $jumlah_barang[$i];
					$dataUpdateBarang = array(
						'jumlah_barang' => $sisa_barang,
						'user_edit' => $id_pengguna,
						'waktu_edit' => $waktu_edit
					);
					$this->M_Barang->editRecord($where,'barang',$dataUpdateBarang);
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
			'user_add' => $id_pengguna,
			'waktu_add' => $waktu_add
		);

		$this->M_InvoiceToko->tambahRecord('invoice',$dataInvoice);
		redirect('HomeKasir/tampilanInvoiceToko');
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
		$id_pengguna = $this->session->userdata("id_pengguna");
		$id_transfer = $this->input->post('id_transfer');
		$id_invoice = $this->input->post('id_invoice');
		$status_transfer = $this->input->post('status_transfer');

		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array('id_transfer' => $id_transfer);

		$data = array(
			'status_transfer' => $status_transfer,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);
		$this->M_Transfer->editRecord($where,'transfer',$data);

		$whereInvoice = array('id_invoice' => $id_invoice);

		if($status_transfer == "Berhasil"){
			$dataInvoice = array(
				'status_invoice' => "Lunas",
				'user_edit' => $id_pengguna,
				'waktu_edit' => $waktu_edit
			);
			$this->M_InvoiceOnline->editRecord($whereInvoice,'invoice',$dataInvoice);

			$invoiceBarang_Arr['dataBarang'] = $this->M_Barang->tampilanEditrecord('detail_invoice_barang', $whereInvoice)->result();
			foreach($invoiceBarang_Arr['dataBarang'] as $list){ //buat update stok barang yg kebeli
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
		else if($status_transfer == "Batal"){
			$dataInvoice = array(
				'status_invoice' => "Batal",
				'user_edit' => $id_pengguna,
				'waktu_edit' => $waktu_edit
			);
		}
		$this->M_InvoiceOnline->editRecord($whereInvoice,'invoice',$dataInvoice);
		redirect('HomeKasir/tampilanTransfer');
	}

	public function tampilanPengiriman(){
		$data['invoice']=$this->M_InvoiceOnline->ambilDataLunas()->result();
		$this->load->view('VK_KonfirmasiPengiriman',$data);
	}

	public function tampilanEditPengiriman($id_invoice){
		$where = array(
			'id_invoice' => $id_invoice
		);

		$data['invoice']= $this->M_InvoiceOnline->tampilanEditRecord('invoice',$where)->result();
		$data['pelanggan']= $this->M_Pelanggan->ambilDataNamaPelanggan()->result();
		$data['detailInvoiceBarang'] = $this->M_InvoiceOnline->ambilDetailInvoiceBarang($id_invoice)->result();
		$this->load->view('VK_Edit_KonfirmasiPengiriman',$data);
	}

	public function editPengiriman(){
		$id_invoice = $this->input->post('id_invoice');
		$status_pengiriman = $this->input->post('status_pengiriman');

		$where = array('id_invoice'=> $id_invoice);

		if($status_pengiriman == "Terkirim"){
			$data = array(
				'status_pengiriman' => $status_pengiriman,
				'status_invoice' => "Lunas",
				'user_edit' => $id_pengguna,
				'waktu_edit' => $waktu_edit
			);
		}
		else{		
			$data = array(
				'status_pengiriman' => $status_pengiriman,
				'user_edit' => $id_pengguna,
				'waktu_edit' => $waktu_edit
			);
		}

		$this->M_InvoiceOnline->editRecord($where,'invoice',$data);
		redirect('HomeKasir/tampilanPengiriman');
	}
}
