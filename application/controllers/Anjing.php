<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anjing extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Anjing');
		$this->load->model('M_Pelanggan');
		$this->load->model('M_JenisAnjing');

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		}
	}  
	
	public function index()
	{
		$data['anjing']=$this->M_Anjing->ambilData()->result();
		$this->load->view('V_Anjing',$data);
	}

	public function tampilanTambahData()
	{
		$data['pemilik']=$this->M_Pelanggan->ambilDataNamaPelanggan()->result();
		$data['jenis_anjing']=$this->M_JenisAnjing->ambilData()->result();
		$this->load->view('V_TD_Anjing', $data);
	}

	public function tambahData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$nama_anjing = $this->input->post('nama_anjing');
		$id_pelanggan = $this->input->post('id_pelanggan');
		$id_jenis_anjing = $this->input->post('id_jenis_anjing');
		$where = array(
			'nama_anjing' => $nama_anjing,
			'id_pelanggan' => $id_pelanggan,
			'id_jenis_anjing' => $id_jenis_anjing
		);
		
		$hasil = $this->M_Anjing->cekAnjing('anjing', $where);

		if($hasil > 0){
			redirect('Anjing/tampilanTambahData');
		}
		else{
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$berat_badan = $this->input->post('berat_badan');
			$tinggi = $this->input->post('tinggi');
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$data = array(
				'nama_anjing' => $nama_anjing,
				'id_jenis_anjing' => $id_jenis_anjing,
				'id_pelanggan' => $id_pelanggan,
				'jenis_kelamin' => $jenis_kelamin,
				'berat_badan' => $berat_badan,
				'tinggi' => $tinggi,
				'tanggal_lahir' => $tanggal_lahir,
				'status_delete' => "Aktif",
				'user_add' => $id_pengguna,
				'waktu_add' => $waktu_add
			);
	
			$this->M_Anjing->tambahRecord('anjing',$data);
			redirect('Anjing');
		}
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_anjing' => $id
		);

		$data['anjing']= $this->M_Anjing->tampilanEditRecord('anjing',$where)->result();
		$data['pemilik']=$this->M_Pelanggan->ambilDataNamaPelanggan()->result();
		$data['jenis']= $this->M_JenisAnjing->ambilData()->result();
		$this->load->view('V_Detail_Anjing',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_anjing' => $id
		);

		$data['anjing']= $this->M_Anjing->tampilanEditRecord('anjing',$where)->result();
		$data['pemilik']=$this->M_Pelanggan->ambilDataNamaPelanggan()->result();
		$data['jenis']= $this->M_JenisAnjing->ambilData()->result();
		$this->load->view('V_Edit_Anjing',$data);
	}

	public function editData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$nama_anjingAsli = $this->input->post('nama_anjingAsli');
		$nama_anjingUbah = $this->input->post('nama_anjingUbah');
		$id_pelangganAsli = $this->input->post('id_pelangganAsli');
		$id_pelangganUbah = $this->input->post('id_pelangganUbah');
		$id_jenis_anjingAsli = $this->input->post('id_jenis_anjingAsli');
		$id_jenis_anjingUbah = $this->input->post('id_jenis_anjingUbah');

		$nama_anjing = $nama_anjingAsli;
		$id_pelanggan = $id_pelangganAsli;
		$id_jenis_anjing = $id_jenis_anjingAsli;

		if($nama_anjingAsli != $nama_anjingUbah || $id_pelangganAsli != $id_pelangganUbah || 
		$id_jenis_anjingAsli != $id_jenis_anjingUbah){
			$whereCek = array(
				'nama_anjing' => $nama_anjingUbah,
				'id_pelanggan' => $id_pelangganUbah,
				'id_jenis_anjing' => $id_jenis_anjingUbah
			);
			
			$hasil = $this->M_Anjing->cekAnjing('anjing', $whereCek);
			if($hasil > 0){
				redirect('Anjing');
			}
			$nama_anjing = $nama_anjingUbah;
			$id_pelanggan = $id_pelangganUbah;
			$id_jenis_anjing = $id_jenis_anjingUbah;
		}
		$id_anjing = $this->input->post('id_anjing');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$berat_badan = $this->input->post('berat_badan');
		$tinggi = $this->input->post('tinggi');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
	
		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_anjing' => $id_anjing
		);

		$data = array(
			'nama_anjing' => $nama_anjing,
			'id_jenis_anjing' => $id_jenis_anjing,
			'id_pelanggan' => $id_pelanggan,
			'jenis_kelamin' => $jenis_kelamin,
			'berat_badan' => $berat_badan,
			'tinggi' => $tinggi,
			'tanggal_lahir' => $tanggal_lahir,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);

		$this->M_Anjing->editRecord($where,'anjing',$data);
		redirect('Anjing');
	}

	public function deleteData($id)
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$where = array('id_anjing' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'user_delete' => $id_pengguna,
			'waktu_delete' => $waktu_delete
		);
		$this->M_Anjing->deleteRecord($where, 'anjing', $data);
		redirect('Anjing');
	}
}
