<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model(array('M_Layanan','M_Jabatan'));

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		}
	}  
	
	public function index()
	{
		$data['layanan']=$this->M_Layanan->ambilData()->result();
		$this->load->view('V_Layanan',$data);
	}

	public function tampilanTambahData()
	{
		$data['jabatan']=$this->M_Jabatan->ambilData()->result();
		$this->load->view('V_TD_Layanan',$data);
	}

	public function tambahData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$nama_layanan = $this->input->post('nama_layanan');
		$where = array(
			'nama_layanan' => $nama_layanan,
			'status_delete' => "Aktif"
		);
		
		$hasil = $this->M_Layanan->cekLayanan('layanan', $where);

		if($hasil > 0){
			redirect('Layanan/tampilanTambahData');
		}
		else{
			$id_jabatan = $this->input->post('id_jabatan');
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$data = array(
				'nama_layanan' => $nama_layanan,
				'id_jabatan' => $id_jabatan,
				'status_delete' => "Aktif",
				'user_add' => $id_pengguna,
				'waktu_add' => $waktu_add,
			);
	
			$this->M_Layanan->tambahRecord('layanan',$data);
			redirect('Layanan');
		}
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_layanan'=> $id
		);
		
		$data['layanan']= $this->M_Layanan->tampilanEditRecord('layanan',$where)->result();
		$data['jabatan']= $this->M_Jabatan->ambilData()->result();
		$this->load->view('V_Detail_Layanan',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_layanan'=> $id
		);
		
		$data['layanan']= $this->M_Layanan->tampilanEditRecord('layanan',$where)->result();
		$data['jabatan']= $this->M_Jabatan->ambilData()->result();
		$this->load->view('V_Edit_Layanan',$data);
	}

	public function editData()
	{	
		$id_pengguna = $this->session->userdata("id_pengguna");
		$nama_layananAsli = $this->input->post('nama_layananAsli');
		$nama_layananUbah = $this->input->post('nama_layananUbah');

		$nama_layanan = $nama_layananAsli;
		if($nama_layananAsli != $nama_layananUbah){
			$whereCek = array(
				'nama_layanan' => $nama_layananUbah,
				'status_delete' => "Aktif"
			);
			
			$hasil = $this->M_Layanan->cekLayanan('layanan', $whereCek);
			if($hasil > 0){
				redirect('Layanan');
			}
			$nama_layanan = $nama_layananUbah;
		}
		$id_layanan = $this->input->post('id_layanan');
		$id_jabatan = $this->input->post('id_jabatan');

		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_layanan' => $id_layanan
		);

		$data = array(
			'nama_layanan' => $nama_layanan,
			'id_jabatan' => $id_jabatan,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);

		$this->M_Layanan->editRecord($where,'layanan',$data);
		redirect('Layanan');
	}

	public function deleteData($id)
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$where = array('id_layanan' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'user_delete' => $id_pengguna,
			'waktu_delete' => $waktu_delete
		);
		$this->M_Layanan->deleteRecord($where, 'Layanan', $data);
		redirect('Layanan');
	}
}
