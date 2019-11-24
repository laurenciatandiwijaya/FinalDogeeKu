<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisAnjing extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_JenisAnjing');
	}  
	
	public function index()
	{
		$data['jenisAnjing']=$this->M_JenisAnjing ->ambilData()->result();
		$this->load->view('V_JenisAnjing',$data);
	}

	public function tampilanTambahData()
	{
		$this->load->view('V_TD_JenisAnjing');
	}

	public function tambahData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$nama_jenis_anjing = $this->input->post('nama_jenis_anjing');
		$where = array(
			'nama_jenis_anjing' => $nama_jenis_anjing
		);
		
		$hasil = $this->M_JenisAnjing->cekJenisAnjing('jenis_anjing', $where);

		if($hasil > 0){
			redirect('JenisAnjing/tampilanTambahData');
		}
		else{
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$data = array(
				'nama_jenis_anjing' => $nama_jenis_anjing,
				'status_delete' => "Aktif",
				'user_add' => $id_pengguna,
				'waktu_add' => $waktu_add
			);
	
			$this->M_JenisAnjing->tambahRecord('jenis_anjing',$data);
			redirect('JenisAnjing');
		}
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_jenis_anjing' => $id
		);
		
		$data['jenisAnjing']= $this->M_JenisAnjing->tampilanEditRecord('jenis_anjing',$where)->result();
		$this->load->view('V_Detail_JenisAnjing',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_jenis_anjing' => $id
		);
		
		$data['jenisAnjing']= $this->M_JenisAnjing->tampilanEditRecord('jenis_anjing',$where)->result();
		$this->load->view('V_Edit_JenisAnjing',$data);
	}

	public function editData()
	{	
		$id_pengguna = $this->session->userdata("id_pengguna");
		$nama_jenis_anjingAsli = $this->input->post('nama_jenis_anjingAsli');
		$nama_jenis_anjingUbah = $this->input->post('nama_jenis_anjingUbah');

		$nama_jenis_anjing = $nama_jenis_anjingAsli;
		if($nama_jenis_anjingAsli != $nama_jenis_anjingUbah){
			$whereCek = array(
				'nama_jenis_anjing' => $nama_jenis_anjingUbah
			);
			
			$hasil = $this->M_JenisAnjing->cekJenisAnjing('jenis_anjing', $whereCek);
			if($hasil > 0){
				redirect('JenisAnjing');
			}
			$nama_jenis_anjing = $nama_jenis_anjingUbah;
		}
		
		$id_jenis_anjing = $this->input->post('id_jenis_anjing');
		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_jenis_anjing' => $id_jenis_anjing
		);

		$data = array(
			'nama_jenis_anjing' => $nama_jenis_anjing,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);

		$this->M_JenisAnjing->editRecord($where,'jenis_anjing',$data);
		redirect('JenisAnjing');
	}

	public function deleteData($id)
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$where = array('id_jenis_anjing' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'user_delete' => $id_pengguna,
			'waktu_delete' => $waktu_delete
		);
		$this->M_JenisAnjing->deleteRecord($where, 'jenis_anjing', $data);
		redirect('JenisAnjing');
	}

}
