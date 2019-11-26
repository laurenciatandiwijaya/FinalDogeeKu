<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Pelanggan');
		$this->load->model('M_Pengguna');
		$this->load->model('M_TipePengguna');

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		}
	}  
	
	public function index()
	{
		$data['pelanggan']=$this->M_Pelanggan->ambilData()->result();
		$this->load->view('V_Pelanggan',$data);
	}

	public function tampilanTambahData()
	{
		$this->load->view('V_TD_Pelanggan');
	}

	public function tambahData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$email = $this->input->post('email');
		$where = array(
			'email' => $email
		);
		
		$hasilEmail = $this->M_Pelanggan->cekEmail('pengguna', $where);

		if($hasilEmail > 0){
			redirect('Pelanggan/tampilanTambahData');
		}
		else{
			$nama_lengkap = $this->input->post('nama_lengkap');
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$no_hp = $this->input->post('no_hp');
			$tanggal_registrasi = $this->input->post('tanggal_registrasi');
			$password = $this->input->post('password');
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");
			

			$passwordEnkrip = md5($password);

			$dataPengguna = array(
				'nama_lengkap' => $nama_lengkap,
				'tanggal_lahir' => $tanggal_lahir,
				'jenis_kelamin' => $jenis_kelamin,
				'no_hp' => $no_hp,
				'email' => $email,
				'password' => $passwordEnkrip,
				'id_tipe_pengguna' => "7",
				'status_delete' => "Aktif",
				'user_delete' => $id_pengguna,
				'waktu_add' => $waktu_add
			);

			$this->M_Pelanggan->tambahRecordPengguna('pengguna', $dataPengguna);
			$id_penggunaArr['data'] = $this->M_Pelanggan->tampilanEditRecord('pengguna', $where)->result();

			foreach($id_penggunaArr['data'] as $list){
				$id_penggunaInt = intval($list->id_pengguna);
			}

			$dataPelanggan = array (
				'id_pengguna' => $id_penggunaInt,
				'tanggal_registrasi' => $tanggal_registrasi,
				'status_delete' => "Aktif",
				'user_add' => $id_pengguna,
				'waktu_add' => $waktu_add
			);

			$this->M_Pelanggan->tambahRecordPelanggan('pelanggan', $dataPelanggan);
			redirect('Pelanggan');
		}
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_pengguna' => $id
		);

		$data['pengguna']= $this->M_Pengguna->tampilanEditRecord('pengguna', $where)->result();
		$data['pelanggan']= $this->M_Pelanggan->tampilanEditRecord('pelanggan', $where)->result();
		$this->load->view('V_Detail_Pelanggan',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_pengguna' => $id
		);

		$data['pengguna']= $this->M_Pengguna->tampilanEditRecord('pengguna', $where)->result();
		$data['pelanggan']= $this->M_Pelanggan->tampilanEditRecord('pelanggan', $where)->result();
		$this->load->view('V_Edit_Pelanggan',$data);
	}

	public function editData()
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$emailAsli = $this->input->post('emailAsli');
		$emailUbah = $this->input->post('emailUbah');

		$email = $emailAsli;
		if($emailAsli != $emailUbah){
			$whereCek = array(
				'email' => $emailUbah
			);
			
			$hasilEmail = $this->M_Pelanggan->cekEmail('pengguna', $whereCek);
			if($hasilEmail > 0){
				redirect('Pelanggan');
			}
			$email = $emailUbah;
		}
		$id_pengguna = $this->input->post('id_pengguna');
		$id_pelanggan = $this->input->post('id_pelanggan');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$no_hp = $this->input->post('no_hp');
		$tanggal_registrasi = $this->input->post('tanggal_registrasi');
		$passwordAsli = $this->input->post('passwordAsli');
		$passwordUbah = $this->input->post('passwordUbah');
		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");
		
		if($passwordUbah == $passwordAsli){
			$password = $passwordAsli;
		}
		else{
			$password = md5($passwordUbah);
		}

		$wherePengguna = array('id_pengguna' => $id_pengguna);
		$dataPengguna = array(
			'nama_lengkap' => $nama_lengkap,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'no_hp' => $no_hp,
			'email' => $email,
			'password' => $password,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);
		$this->M_Pengguna->editRecord($wherePengguna,'pengguna',$dataPengguna);
		
		$wherePelanggan = array('id_pelanggan' => $id_pelanggan);
		$dataPelanggan = array (
			'tanggal_registrasi' => $tanggal_registrasi,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);

		$this->M_Pelanggan->editRecord($wherePelanggan,'pelanggan',$dataPelanggan);			
		redirect('Pelanggan');
	}

	public function deleteData($id)
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$wherePelanggan = array('id_pelanggan' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'user_delete' => $id_pengguna,
			'waktu_delete' => $waktu_delete
		);
		$this->M_Pelanggan->deleteRecord($wherePelanggan, 'pelanggan', $data);

		$id_penggunaArr['data'] = $this->M_Pelanggan->tampilanEditRecord('pelanggan', $wherePelanggan)->result();
		foreach($id_penggunaArr['data'] as $list){
			$id_penggunaInt = intval($list->id_pengguna);
		}

		$wherePengguna = array('id_pengguna' => $id_penggunaInt);
		$this->M_Pengguna->deleteRecord($wherePengguna, 'pengguna', $data);

		redirect('Pelanggan');
	}

}
