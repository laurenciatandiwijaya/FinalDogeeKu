<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerja extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Pekerja');
		$this->load->model('M_Pengguna');
		$this->load->model('M_Jabatan');
		$this->load->model('M_TipePengguna');
	}  
	
	public function index()
	{
		$data['pekerja']=$this->M_Pekerja->ambilData()->result();
		$this->load->view('V_Pekerja',$data);
	}

	public function tampilanTambahData()
	{
		$data['jabatan']=$this->M_Jabatan->ambilData()->result();
		$data['tipePengguna']=$this->M_TipePengguna->ambilData()->result();
		$this->load->view('V_TD_Pekerja', $data);
	}

	public function tambahData()
	{
		$email = $this->input->post('email');
		$where = array(
			'email' => $email
		);
		
		$hasilEmail = $this->M_Pekerja->cekEmail('pengguna', $where);

		if($hasilEmail > 0){
			redirect('Pekerja/tampilanTambahData');
		}
		else{
			$nama_lengkap = $this->input->post('nama_lengkap');
			$id_jabatan = $this->input->post('id_jabatan');
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$no_hp = $this->input->post('no_hp');
			$alamat = $this->input->post('alamat');
			$tanggal_masuk = $this->input->post('tanggal_masuk');
			$password = $this->input->post('password');
			$id_tipe_pengguna = $this->input->post('id_tipe_pengguna');
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
				'id_tipe_pengguna' => $id_tipe_pengguna,
				'status_delete' => "Aktif",
				'waktu_add' => $waktu_add
			);

			$this->M_Pekerja->tambahRecordPengguna('pengguna', $dataPengguna);
			$id_penggunaArr['data'] = $this->M_Pekerja->tampilanEditrecord('pengguna', $where)->result();

			foreach($id_penggunaArr['data'] as $list){
				$id_penggunaInt = intval($list->id_pengguna);
			}

			$dataPekerja = array (
				'id_pengguna' => $id_penggunaInt,
				'id_jabatan' => $id_jabatan,
				'alamat' => $alamat,
				'tanggal_masuk' => $tanggal_masuk,
				'status_delete' => "Aktif",
				'waktu_add' => $waktu_add
			);

			$this->M_Pekerja->tambahRecordPekerja('pekerja', $dataPekerja);
			redirect('Pekerja');
		}
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_pengguna' => $id
		);

		$data['pengguna']= $this->M_Pengguna->tampilanEditRecord('pengguna', $where)->result();
		$data['pekerja']= $this->M_Pekerja->tampilanEditRecord('pekerja', $where)->result();
		$data['jabatan']= $this->M_Jabatan->ambilData()->result();
		$data['tipePengguna']= $this->M_TipePengguna->ambilData()->result();
		$this->load->view('V_Detail_Pekerja',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_pengguna' => $id
		);

		$data['pengguna']= $this->M_Pengguna->tampilanEditRecord('pengguna', $where)->result();
		$data['pekerja']= $this->M_Pekerja->tampilanEditRecord('pekerja', $where)->result();
		$data['jabatan']= $this->M_Jabatan->ambilData()->result();
		$data['tipePengguna']= $this->M_TipePengguna->ambilData()->result();
		$this->load->view('V_Edit_Pekerja',$data);
	}

	public function editData()
	{
		$emailAsli = $this->input->post('emailAsli');
		$emailUbah = $this->input->post('emailUbah');

		$email = $emailAsli;
		if($emailAsli != $emailUbah){
			$whereCek = array(
				'email' => $emailUbah
			);
			
			$hasilEmail = $this->M_Pekerja->cekEmail('pengguna', $whereCek);
			if($hasilEmail > 0){
				redirect('Pekerja');
			}
			$email = $emailUbah;
		}
		$id_pengguna = $this->input->post('id_pengguna');
		$id_pekerja = $this->input->post('id_pekerja');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$id_jabatan = $this->input->post('id_jabatan');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$tanggal_masuk = $this->input->post('tanggal_masuk');
		$id_tipe_pengguna = $this->input->post('id_tipe_pengguna');
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
			'id_tipe_pengguna' => $id_tipe_pengguna,
			'waktu_edit' => $waktu_edit
		);
		$this->M_Pengguna->editRecord($wherePengguna,'pengguna',$dataPengguna);
		
		$wherePekerja = array('id_pekerja' => $id_pekerja);
		$dataPekerja = array (
			'id_jabatan' => $id_jabatan,
			'alamat' => $alamat,
			'tanggal_masuk' => $tanggal_masuk,
			'waktu_edit' => $waktu_edit
		);

		$this->M_Pekerja->editRecord($wherePekerja,'pekerja',$dataPekerja);			
		redirect('Pekerja');
	}

	public function deleteData($id)
	{
		$wherePekerja = array('id_pekerja' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'waktu_delete' => $waktu_delete
		);
		$this->M_Pekerja->deleteRecord($wherePekerja, 'pekerja', $data);

		$id_penggunaArr['data'] = $this->M_Pekerja->tampilanEditRecord('pekerja', $wherePekerja)->result();
		foreach($id_penggunaArr['data'] as $list){
			$id_penggunaInt = intval($list->id_pengguna);
		}

		$wherePengguna = array('id_pengguna' => $id_penggunaInt);
		$this->M_Pengguna->deleteRecord($wherePengguna, 'pengguna', $data);

		redirect('Pekerja');
	}
}
