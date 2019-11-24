<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Kegiatan');
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
		$id_anjing = $this->input->post('id_anjing');
		$nama_kegiatan = $this->input->post('nama_kegiatan');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');

		$where = array(
			'id_anjing' => $id_anjing,
			'nama_kegiatan' => $nama_kegiatan,
			'tanggal' => $tanggal,
			'jam' => $jam
		);
		
		$hasil = $this->M_Kegiatan->cekKegiatan('kegiatan', $where);

		if($hasil > 0){
			redirect('Kegiatan/tampilanTambahData');
		}
		else{
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$data = array(
				'id_anjing' => $id_anjing,
				'nama_kegiatan' => $nama_kegiatan,
				'tanggal' => $tanggal,
				'jam' => $jam,
				'status_kegiatan' => "Belum selesai",
				'status_delete' => "Aktif",
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
		$id_anjingAsli = $this->input->post('id_anjingAsli');
		$id_anjingUbah = $this->input->post('id_anjingUbah');
		$nama_kegiatanAsli = $this->input->post('nama_kegiatanAsli');
		$nama_kegiatanUbah = $this->input->post('nama_kegiatanUbah');
		$tanggalAsli = $this->input->post('tanggalAsli');
		$tanggalUbah = $this->input->post('tanggalUbah');
		$jamAsli = $this->input->post('jamAsli');
		$jamUbah = $this->input->post('jamUbah');

		$id_anjing = $id_anjingAsli;
		$nama_kegiatan = $nama_kegiatanAsli;
		$tanggal = $tanggalAsli;
		$jam = $jamAsli;

		if($id_anjingAsli != $id_anjingUbah || $nama_kegiatanAsli != $nama_kegiatanUbah || 
		$tanggalAsli != $tanggalUbah || $jamAsli != $jamUbah){
			$whereCek = array(
				'id_anjing' => $id_anjingUbah,
				'nama_kegiatan' => $nama_kegiatanUbah,
				'tanggal' => $tanggalUbah,
				'jam' => $jamUbah
			);
			
			$hasil = $this->M_Kegiatan->cekKegiatan('kegiatan', $whereCek);
			if($hasil > 0){
				redirect('Kegiatan');
			}
			$id_anjing = $id_anjingUbah;
			$nama_kegiatan = $nama_kegiatanUbah;
			$tanggal = $tanggalUbah;
			$jam = $jamUbah;
		}
		$id_kegiatan = $this->input->post('id_kegiatan');
		$status_kegiatan = $this->input->post('status_kegiatan');
		
		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_kegiatan' => $id_kegiatan
		);

		$data = array(
			'id_anjing' => $id_anjing,
			'nama_kegiatan' => $nama_kegiatan,
			'tanggal' => $tanggal,
			'jam' => $jam,
			'status_kegiatan' => $status_kegiatan,
			'waktu_edit' => $waktu_edit
		);

		$this->M_Kegiatan->editRecord($where,'kegiatan',$data);
		redirect('Kegiatan');
	}

	public function deleteData($id)
	{
		$where = array('id_kegiatan' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'waktu_delete' => $waktu_delete
		);
		$this->M_Kegiatan->deleteRecord($where, 'kegiatan', $data);
		redirect('Kegiatan');
	}
}
