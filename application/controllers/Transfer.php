<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Transfer');	
	}  
	
	public function index()
	{
		$data['transfer']=$this->M_Transfer->ambilData()->result();
		$this->load->view('V_Transfer',$data);
	}

	public function tampilanTambahData()
	{
		$data['invoicePelanggan']=$this->M_Transfer->tampilanTambahRecord()->result();
		$this->load->view('V_TD_Transfer',$data);
	}

	public function tambahData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$id_invoice = $this->input->post('id_invoice');
		$nama_bank = $this->input->post('nama_bank');
		$nomor_rekening = $this->input->post('nomor_rekening');
		$nama_pengirim = $this->input->post('nama_pengirim');
		$tanggal = $this->input->post('tanggal');
		$total = $this->input->post('total');
		$status_transfer = $this->input->post('status_transfer');

		date_default_timezone_set("Asia/Jakarta");
		$waktu_add = date("Y-m-d H:i:s");

		$data = array(
			'id_invoice' => $id_invoice,
			'nama_bank' => $nama_bank,
			'nomor_rekening' => $nomor_rekening,
			'nama_pengirim' => $nama_pengirim,
			'tanggal' => $tanggal,
			'total' => $total,
			'status_transfer' => $status_transfer,
			'status_delete' => "Aktif",
			'user_add' =>$id_pengguna,
			'waktu_add' => $waktu_add
		);

		$this->M_Transfer->tambahRecord('Transfer',$data);
		redirect('Transfer');
	
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_transfer' => $id
		);
		
		$data['invoicePelanggan']=$this->M_Transfer->tampilanTambahRecord()->result();
		$data['transfer']= $this->M_Transfer->tampilanEditRecord('transfer',$where)->result();
		$this->load->view('V_Detail_Transfer',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_transfer' => $id
		);

		$data['invoicePelanggan']=$this->M_Transfer->tampilanTambahRecord()->result();
		$data['transfer']= $this->M_Transfer->tampilanEditRecord('transfer',$where)->result();
		$this->load->view('V_Edit_Transfer',$data);
	}

	public function editData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$id_transfer = $this->input->post('id_transfer');
		$id_invoice = $this->input->post('id_invoice');
		$nama_bank = $this->input->post('nama_bank');
		$nomor_rekening = $this->input->post('nomor_rekening');
		$nama_pengirim = $this->input->post('nama_pengirim');
		$tanggal = $this->input->post('tanggal');
		$total = $this->input->post('total');
		$status_transfer = $this->input->post('status_transfer');

		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_transfer' => $id_transfer
		);

		$data = array(
			'id_invoice' => $id_invoice,
			'nama_bank' => $nama_bank,
			'nomor_rekening' => $nomor_rekening,
			'nama_pengirim' => $nama_pengirim,
			'tanggal' => $tanggal,
			'total' => $total,
			'status_transfer' => $status_transfer,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);

		$this->M_Transfer->editRecord($where,'transfer',$data);
		redirect('Transfer');
	}
	
	public function deleteData($id)
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$where = array('id_transfer' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'user_delete' => $id_pengguna,
			'waktu_delete' => $waktu_delete
		);
		$this->M_Transfer->deleteRecord($where, 'transfer', $data);
		redirect('Transfer');
	}

}
