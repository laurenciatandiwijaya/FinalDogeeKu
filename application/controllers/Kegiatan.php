<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Kegiatan');

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		}
	}  
	
	public function index()
	{
		$data['kegiatan']=$this->M_Kegiatan->ambilData()->result();
		$this->load->view('V_Kegiatan',$data);
	}

	public function tampilanTambahData()
	{
		$data['anjing'] =  $this->M_Kegiatan->ambilNamaPemilikAnjing()->result();
		$this->load->view('V_TD_Kegiatan', $data);
	}

	public function tambahData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$id_anjing = $this->input->post('id_anjing');
		$nama_kegiatan = $this->input->post('nama_kegiatan');
		$start_date = $this->input->post('tanggal_mulai');
		$end_date = $this->input->post('tanggal_selesai');

		$where = array(
			'id_anjing' => $id_anjing,
			'nama_kegiatan' => $nama_kegiatan,
			'start_date' => $start_date,
			'end_date' => $end_date,
			'status_delete' => "Aktif"
		);
		
		$hasil = $this->M_Kegiatan->cekKegiatan('kegiatan', $where);

		if($hasil > 0){
			redirect('Kegiatan/tampilanTambahData');
		}
		else{
			$color = $this->input->post('color');
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$data = array(
				'id_anjing' => $id_anjing,
				'nama_kegiatan' => $nama_kegiatan,
				'start_date' => $start_date,
				'end_date' => $end_date,
				'color' => $color,
				'status_delete' => "Aktif",
				'user_add' => $id_pengguna,
				'waktu_add' => $waktu_add
			);
	
			$this->M_Kegiatan->tambahRecord('kegiatan',$data);
			redirect('Kegiatan');
		}
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_kegiatan' => $id
		);
		
		$data['kegiatan']= $this->M_Kegiatan->tampilanEditRecord('kegiatan', $where)->result();
		$data['anjingPemilik'] =  $this->M_Kegiatan->ambilNamaPemilikAnjing()->result();
		$this->load->view('V_Detail_Kegiatan',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_kegiatan' => $id
		);
		
		$data['kegiatan']= $this->M_Kegiatan->tampilanEditRecord('kegiatan', $where)->result();
		$data['anjingPemilik'] =  $this->M_Kegiatan->ambilNamaPemilikAnjing()->result();
		$this->load->view('V_Edit_Kegiatan',$data);
	}

	public function editData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$id_anjingAsli = $this->input->post('id_anjingAsli');
		$id_anjingUbah = $this->input->post('id_anjingUbah');
		$nama_kegiatanAsli = $this->input->post('nama_kegiatanAsli');
		$nama_kegiatanUbah = $this->input->post('nama_kegiatanUbah');
		$tanggalMulaiAsli = $this->input->post('tanggalMulaiAsli');
		$tanggalMulaiUbah = $this->input->post('tanggalMulaiUbah');
		$tanggalSelesaiAsli = $this->input->post('tanggalSelesaiAsli');
		$tanggalSelesaiUbah = $this->input->post('tanggalSelesaiUbah');

		$id_anjing = $id_anjingAsli;
		$nama_kegiatan = $nama_kegiatanAsli;
		$tanggalMulai = $tanggalMulaiAsli;
		$tanggalSelesai = $tanggalSelesaiAsli;

		if($id_anjingAsli != $id_anjingUbah || $nama_kegiatanAsli != $nama_kegiatanUbah || 
		$tanggalMulaiAsli != $tanggalMulailUbah || $tanggalSelesaiAsli != $tanggalSelesaiUbah){
			$whereCek = array(
				'id_anjing' => $id_anjingUbah,
				'nama_kegiatan' => $nama_kegiatanUbah,
				'start_date' => $tanggalMulaiUbah,
				'end_date' => $tanggalSelesaiUbah,
				'status_delete' => "Aktif"
			);
			
			$hasil = $this->M_Kegiatan->cekKegiatan('kegiatan', $whereCek);
			if($hasil > 0){
				redirect('Kegiatan');
			}
			$id_anjing = $id_anjingUbah;
			$nama_kegiatan = $nama_kegiatanUbah;
			$tanggalMulai = $tanggalMulaiUbah;
			$tanggalSelesai = $tanggalSelesaiUbah;
		}
		$id_kegiatan = $this->input->post('id_kegiatan');
		$color = $this->input->post('color');
		
		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_kegiatan' => $id_kegiatan
		);

		$data = array(
			'id_anjing' => $id_anjing,
			'nama_kegiatan' => $nama_kegiatan,
			'start_date' => $tanggalMulai,
			'end_date' => $tanggalSelesai,
			'color' => $color,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);

		$this->M_Kegiatan->editRecord($where,'kegiatan',$data);
		redirect('Kegiatan');
	}

	public function deleteData($id)
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$where = array('id_kegiatan' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'user_delete' => $id_pengguna,
			'waktu_delete' => $waktu_delete
		);
		$this->M_Kegiatan->deleteRecord($where, 'kegiatan', $data);
		redirect('Kegiatan');
	}
}
