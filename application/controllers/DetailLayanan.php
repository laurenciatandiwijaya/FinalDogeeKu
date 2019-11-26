<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailLayanan extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_DetailLayanan');
		$this->load->model('M_Layanan');

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		}
	}  
	
	public function index()
	{
		$data['detailLayanan']=$this->M_DetailLayanan->ambilData()->result();
		$this->load->view('V_DetailLayanan',$data);
	}

	public function tampilanTambahData()
	{
		$data['layanan']=$this->M_Layanan->ambilData()->result();
		$this->load->view('V_TD_DetailLayanan',$data);
	}

	public function tambahData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$id_layanan = $this->input->post('id_layanan');
		$nama_detail_layanan = $this->input->post('nama_detail_layanan');
		$where = array(
			'id_layanan' => $id_layanan,
			'nama_detail_layanan' => $nama_detail_layanan
		);
		
		$hasil = $this->M_DetailLayanan->cekDetailLayanan('detail_layanan', $where);

		if($hasil > 0){
			redirect('DetailLayanan/tampilanTambahData');
		}
		else{
			$deskripsi_layanan = $this->input->post('deskripsi_layanan');
			$harga = $this->input->post('harga');
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$data = array(
				'id_layanan' => $id_layanan,
				'nama_detail_layanan' => $nama_detail_layanan,
				'deskripsi_layanan' => $deskripsi_layanan,
				'harga' => $harga,
				'status_delete' => "Aktif",
				'user_add' => $id_pengguna,
				'waktu_add' => $waktu_add
			);
	
			$this->M_DetailLayanan->tambahRecord('detail_layanan',$data);
			redirect('DetailLayanan');
		}
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_detail_layanan'=> $id
		);
		
		$data['detailLayanan']= $this->M_DetailLayanan->tampilanEditRecord('detail_layanan',$where)->result();
		$data['layanan']= $this->M_Layanan->ambilData()->result();
		$this->load->view('V_Detail_DetailLayanan',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_detail_layanan'=> $id
		);
		
		$data['detailLayanan']= $this->M_DetailLayanan->tampilanEditRecord('detail_layanan',$where)->result();
		$data['layanan']= $this->M_Layanan->ambilData()->result();
		$this->load->view('V_Edit_DetailLayanan',$data);
	}

	public function editData()
	{	
		$id_pengguna = $this->session->userdata("id_pengguna");
		$id_layananAsli = $this->input->post('id_layananAsli');
		$id_layananUbah = $this->input->post('id_layananUbah');
		$nama_detail_layananAsli = $this->input->post('nama_detail_layananAsli');
		$nama_detail_layananUbah = $this->input->post('nama_detail_layananUbah');

		$id_layanan = $id_layananAsli;
		$nama_detail_layanan = $nama_detail_layananAsli;
		if($id_layananAsli != $id_layananUbah || $nama_detail_layananAsli != $nama_detail_layananUbah){
			$whereCek = array(
				'id_layanan' => $id_layananUbah,
				'nama_detail_layanan' => $nama_detail_layananUbah
			);
			
			$hasil = $this->M_DetailLayanan->cekDetailLayanan('detail_layanan', $whereCek);
			if($hasil > 0){
				redirect('DetailLayanan');
			}
			$id_layanan = $id_layananUbah;
			$nama_detail_layanan = $nama_detail_layananUbah;
		}
		$id_detail_layanan = $this->input->post('id_detail_layanan');
		$deskripsi_layanan = $this->input->post('deskripsi_layanan');
		$harga = $this->input->post('harga');

		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_detail_layanan' => $id_detail_layanan
		);

		$data = array(
			'id_layanan' => $id_layanan,
			'nama_detail_layanan' => $nama_detail_layanan,
			'deskripsi_layanan' => $deskripsi_layanan,
			'harga' => $harga,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);

		$this->M_DetailLayanan->editRecord($where,'detail_layanan',$data);
		redirect('DetailLayanan');
	}

	public function deleteData($id)
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$where = array('id_detail_layanan' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'user_delete' => $id_pengguna,
			'waktu_delete' => $waktu_delete
		);
		$this->M_DetailLayanan->deleteRecord($where, 'detail_Layanan', $data);
		redirect('DetailLayanan');
	}

}
