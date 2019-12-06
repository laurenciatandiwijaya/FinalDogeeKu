<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Jabatan');

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		}
	}  
	
	public function index()
	{
		$data['jabatan']=$this->M_Jabatan->ambilData()->result();
		$this->load->view('V_Jabatan',$data);
	}

	public function tampilanTambahData()
	{
		$this->load->view('V_TD_Jabatan');
	}

	public function tambahData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$nama_jabatan = $this->input->post('nama_jabatan');
		$where = array(
			'nama_jabatan' => $nama_jabatan,
			'status_delete' => "Aktif"
		);
		
		$hasilJabatan = $this->M_Jabatan->cekJabatan('jabatan', $where);

		if($hasilJabatan > 0){
			redirect('Jabatan/tampilanTambahData');
		}
		else{
			$gaji = $this->input->post('gaji');
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$data = array(
				'nama_jabatan' => $nama_jabatan,
				'gaji' => $gaji,
				'status_delete' => "Aktif",
				'user_add' => $id_pengguna,
				'waktu_add' => $waktu_add
			);
	
			$this->M_Jabatan->tambahRecord('jabatan',$data);
			redirect('Jabatan');
		}
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_jabatan' => $id
		);
		
		$data['jabatan']= $this->M_Jabatan->tampilanEditRecord('jabatan',$where)->result();
		$this->load->view('V_Detail_Jabatan',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_jabatan' => $id
		);
		
		$data['jabatan']= $this->M_Jabatan->tampilanEditRecord('jabatan',$where)->result();
		$this->load->view('V_Edit_Jabatan',$data);
	}

	public function editData()
	{	
		$id_pengguna = $this->session->userdata("id_pengguna");
		$nama_jabatanAsli = $this->input->post('nama_jabatanAsli');
		$nama_jabatanUbah = $this->input->post('nama_jabatanUbah');

		$nama_jabatan = $nama_jabatanAsli;
		if($nama_jabatanAsli != $nama_jabatanUbah){
			$whereCek = array(
				'nama_jabatan' => $nama_jabatanUbah,
				'status_delete' => "Aktif"
			);
			
			$hasilJabatan = $this->M_Jabatan->cekJabatan('jabatan', $whereCek);
			if($hasilJabatan > 0){
				redirect('Jabatan');
			}
			$nama_jabatan = $nama_jabatanUbah;
		}
		$id_jabatan = $this->input->post('id_jabatan');
		$gaji = $this->input->post('gaji');

		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_jabatan' => $id_jabatan
		);

		$data = array(
			'nama_jabatan' => $nama_jabatan,
			'gaji ' => $gaji,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);

		$this->M_Jabatan->editRecord($where,'jabatan',$data);
		redirect('Jabatan');
	}
	
	public function deleteData($id)
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$where = array('id_jabatan' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'user_delete' => $id_pengguna,
			'waktu_delete' => $waktu_delete
		);
		$this->M_Jabatan->deleteRecord($where, 'jabatan', $data);
		redirect('Jabatan');
	}

}
