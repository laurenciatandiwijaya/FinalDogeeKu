<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model(array('M_Layanan','M_Jabatan'));
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
		$nama_layanan = $this->input->post('nama_layanan');
		$where = array(
			'nama_layanan' => $nama_layanan
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
				'waktu_add' => $waktu_add
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
		$nama_layananAsli = $this->input->post('nama_layananAsli');
		$nama_layananUbah = $this->input->post('nama_layananUbah');

		$nama_layanan = $nama_layananAsli;
		if($nama_layananAsli != $nama_layananUbah){
			$whereCek = array(
				'nama_layanan' => $nama_layananUbah
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
			'waktu_edit' => $waktu_edit
		);

		$this->M_Layanan->editRecord($where,'layanan',$data);
		redirect('Layanan');
	}

	public function deleteData($id)
	{
		$where = array('id_layanan' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'waktu_delete' => $waktu_delete
		);
		$this->M_Layanan->deleteRecord($where, 'Layanan', $data);
		redirect('Layanan');
	}
}
