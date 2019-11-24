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
        $data_tambahAnjing = array(
          'id_jenis_anjing' => $id_jenis_anjing,
          'id_pelanggan' => $id_pelanggan,
          'nama_anjing' => $nama_anjing,
          'jenis_kelamin' => $jenis_kelamin,
          'berat_badan' => $berat_badan,
          'tinggi' => $tinggi_badan,
          'tanggal_lahir' => $tanggal_lahir,
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


}
?>