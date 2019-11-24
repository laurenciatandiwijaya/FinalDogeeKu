<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipePengguna extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_TipePengguna');
	}  
	
	public function index()
	{
		$data['tipePengguna']=$this->M_TipePengguna->ambilData()->result();
		$this->load->view('V_TipePengguna',$data);
	}

	public function tampilanTambahData()
	{
		$this->load->view('V_TD_TipePengguna');
	}

	public function tambahData()
	{
		$nama_tipe_pengguna = $this->input->post('nama_tipe_pengguna');
		$where = array(
			'nama_tipe_pengguna' => $nama_tipe_pengguna
		);
		
		$hasil = $this->M_TipePengguna->cekTipePengguna('tipe_pengguna', $where);

		if($hasil > 0){
			redirect('TipePengguna/tampilanTambahData');
		}
		else{
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$data = array(
				'nama_tipe_pengguna' => $nama_tipe_pengguna,
				'status_delete' => "Aktif",
				'waktu_add' => $waktu_add
			);
	
			$this->M_TipePengguna->tambahRecord('tipe_pengguna',$data);
			redirect('TipePengguna');
		}
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_tipe_pengguna' => $id
		);
		
		$data['tipePengguna']= $this->M_TipePengguna->tampilanEditRecord('tipe_pengguna',$where)->result();
		$this->load->view('V_Detail_TipePengguna',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_tipe_pengguna' => $id
		);
		
		$data['tipePengguna']= $this->M_TipePengguna->tampilanEditRecord('tipe_pengguna',$where)->result();
		$this->load->view('V_Detail_TipePengguna',$data);
	}

	public function editData()
	{	
		$nama_tipe_penggunaAsli = $this->input->post('nama_tipe_penggunaAsli');
		$nama_tipe_penggunaUbah = $this->input->post('nama_tipe_penggunaUbah');

		$nama_tipe_pengguna = $nama_tipe_penggunaAsli;
		if($nama_tipe_penggunaAsli != $nama_tipe_penggunaUbah){
			$whereCek = array(
				'nama_tipe_pengguna' => $nama_tipe_penggunaUbah
			);
			
			$hasil = $this->M_TipePengguna->cekTipePengguna('tipe_pengguna', $whereCek);
			if($hasil > 0){
				redirect('TipePengguna');
			}
			$nama_tipe_pengguna = $nama_tipe_penggunaUbah;
		}
		$id_tipe_pengguna = $this->input->post('id_tipe_pengguna');
		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_tipe_pengguna' => $id_tipe_pengguna
		);

		$data = array(
			'nama_tipe_pengguna' => $nama_tipe_pengguna,
			'waktu_edit' => $waktu_edit
		);

		$this->M_TipePengguna->editRecord($where,'tipe_pengguna',$data);
		redirect('TipePengguna');
	}
	
	public function deleteData($id)
	{
		$where = array('id_tipe_pengguna' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'waktu_delete' => $waktu_delete
		);
		$this->M_TipePengguna->deleteRecord($where, 'tipe_pengguna', $data);
		redirect('TipePengguna');
	}

}
