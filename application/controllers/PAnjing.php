<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PAnjing extends CI_Controller {
    function __construct(){
    parent:: __construct();
    
      $this->load->model('M_PAnjing');

      if($this->session->userdata('status') != "login"){
        redirect('Login/login');
      }
    }  

    public function tambah_anjing(){
      $data['jenis_anjing'] = $this->M_PAnjing->cari_jenisAnjing('jenis_anjing')->result();
      $this->load->view('VP_VT_tambahAnjing',$data);
    }

    public function coba_tambahAnjing(){
      $target_dir = "../FinalDogeeKu/assets/img/anjing/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 900000) {
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
			$uploadOk = 0;
		}

      $nama_anjing = $this->input->post('nama_anjing');
      $id_jenis_anjing = $this->input->post('id_jenis_anjing');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $berat_badan = $this->input->post('berat_badan');
      $tinggi_badan = $this->input->post('tinggi_badan');
      $tanggal_lahir = $this->input->post('tanggal_lahir');
      
      date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

      $email_pengguna=$this->session->userdata('email');
      $whereEmail = array(
        'email' => $email_pengguna
      );

      $data['id_pelanggan'] = $this->M_PAnjing->cari_idPelanggan($email_pengguna)->result();

      foreach($data['id_pelanggan'] as $list){
        $id_pelanggan = intval($list->id_pelanggan);
      }

      $where_dataAnjing = array(
        'nama_anjing' => $nama_anjing,
        'id_pelanggan' => $id_pelanggan,
      );

      $data_cekAnjing = $this->M_PAnjing->cek_dataAnjing($where_dataAnjing)->num_rows();
      if($data_cekAnjing > 0){
        $data['status_announce'] = "9";
        $data['nama_anjing'] = $nama_anjing;

        $this->load->view('VP_Announce',$data);
      }

      else{
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

        $data_tambahAnjing = array(
          'id_jenis_anjing' => $id_jenis_anjing,
          'id_pelanggan' => $id_pelanggan,
          'nama_anjing' => $nama_anjing,
          'jenis_kelamin' => $jenis_kelamin,
          'berat_badan' => $berat_badan,
          'tinggi' => $tinggi_badan,
          'tanggal_lahir' => $tanggal_lahir,
          'foto' => "/assets/img/anjing/".basename($_FILES["fileToUpload"]["name"]),
          'user_add' => $id_pelanggan,
          'waktu_add' => $waktu_add,
          'status_delete' => "Aktif"
        );

        $this->M_PAnjing->tambah_anjing($data_tambahAnjing);

        $data['status_announce'] = "10";
        $data['nama_anjing'] = $nama_anjing;

        $this->load->view('VP_Announce',$data);
      }
    }

      public function data_anjing(){
        $pengguna = $this->session->userdata('id_pengguna');
        $data['anjingku'] = $this->M_PAnjing->data_anjingku($pengguna)->result();

        $this->load->view('VP_AnjingKu',$data);
      }

      public function edit_delete(){
        $id_anjing = $this->input->post('id_anjing');


        $data['jenis_anjing'] = $this->M_PAnjing->ambilJenis_anjing()->result();
        $data['anjing'] = $this->M_PAnjing->ambilAnjing_id($id_anjing)->result();
        $this->load->view('VP_EditDeleteAnjing', $data);
      }

      public function coba_edit(){
        $id_anjing = $this->input->post('id_anjing');
        $nama_anjing = $this->input->post('nama_anjing');
        $id_jenis_anjing = $this->input->post('id_jenis_anjing');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $berat_badan = $this->input->post('berat_badan');
        $tinggi = $this->input->post('tinggi');
        $tanggal_lahir = $this->input->post('tanggal_lahir');

        date_default_timezone_set("Asia/Jakarta");
        $waktu_edit = date("Y-m-d H:i:s");

        $email_pengguna=$this->session->userdata('email');
        $id_pengguna=$this->session->userdata('id_pengguna');
        $whereEmail = array(
          'email' => $email_pengguna
        );
  
        $data['id_pelanggan'] = $this->M_PAnjing->cari_idPelanggan($email_pengguna)->result();
        foreach($data['id_pelanggan'] as $list){
          $id_pelanggan = intval($list->id_pelanggan);
        }

        $where_edit = array (
          'id_anjing' => $id_anjing
        );


        $data_edit = array (
          'id_anjing' => $id_anjing,
          'id_jenis_anjing' => $id_jenis_anjing,
          'id_pelanggan' => $id_pelanggan,
          'nama_anjing' => $nama_anjing,
          'jenis_kelamin' => $jenis_kelamin,
          'berat_badan' => $berat_badan,
          'tinggi' => $tinggi,
          'tanggal_lahir' => $tanggal_lahir,
          'user_edit' => $id_pengguna,
          'waktu_edit' => $waktu_edit
        );

        $this->M_PAnjing->update_data($data_edit,$where_edit);
        redirect('PAnjing/data_anjing');
      }

      public function coba_delete(){
        $id_anjing = $this->input->post('id_anjing');
        $id_pengguna=$this->session->userdata('id_pengguna');

        date_default_timezone_set("Asia/Jakarta");
        $waktu_delete = date("Y-m-d H:i:s");

        $where_delete = array(
          'id_anjing' => $id_anjing
        );

        $data_delete = array(
          'user_delete' => $id_pengguna,
          'waktu_delete' => $waktu_delete,
          'status_delete' => "Tidak Aktif"
        );

        $this->M_PAnjing->update_data($data_delete,$where_delete);
        redirect('PAnjing/data_anjing');


      }


}
?>