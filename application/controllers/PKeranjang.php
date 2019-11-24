<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PKeranjang extends CI_Controller {
    function __construct(){
		parent:: __construct();
    $this->load->model('M_PKeranjang');

    if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		  }
    }  

    public function index(){
          $email = $this->session->userdata('email');
          $Data_Pelanggan = $this->M_PKeranjang->cari_idPelanggan($email)->row_array();
          $id_pelanggan = $Data_Pelanggan['id_pelanggan'];

          $data_keranjang['keranjang'] = $this->M_PKeranjang->get_dataKeranjang($id_pelanggan)->result();
          $this->load->view('VP_Keranjang',$data_keranjang);
      }

      public function tambah_keranjang(){
          $email = $this->session->userdata('email');
          $Data_Pelanggan = $this->M_PKeranjang->cari_idPelanggan($email)->row_array();
          $id_pelanggan = $Data_Pelanggan['id_pelanggan'];

          $Dataid_pengguna = $this->M_PKeranjang->cari_idPengguna($email)->row_array();
          $id_pengguna = $Dataid_pengguna['id_pengguna'];

          date_default_timezone_set("Asia/Jakarta");
          $waktu_add = date("Y-m-d H:i:s");

          $id_barang = $this->input->post('id_barang');
          $jumlah_barang = $this->input->post('jumlah_barang');
          $nama_barang = $this->input->post('nama_barang');
          $harga = $this->input->post('harga');
          $warna = $this->input->post('warna');
          $ukuran = $this->input->post('ukuran');


          $where = array (
            'id_barang' => $id_barang,
            'id_pelanggan' => $id_pelanggan,
            'status_delete' =>"Aktif"
          );

          $cek_data = $this->M_PKeranjang->cek_row($where)->row_array();

          if($cek_data > 0){
            $id_keranjang = $cek_data['keranjang'];
            $user_edit =  $id_pengguna;
            date_default_timezone_set("Asia/Jakarta");
            $waktu_edit = date("Y-m-d H:i:s");

            $this->M_PKeranjang->tambah_jumlahKeranjang($id_keranjang,$jumlah_barang,$user_edit,$waktu_edit);
          }
          else{
            $data = array(
              'id_pelanggan' => $id_pelanggan,
              'id_barang' => $id_barang,
              'jumlah_barang' => $jumlah_barang,
              'user_add' => $id_pengguna,
              'waktu_add' => $waktu_add,
              'status_delete' => "Aktif"
            );
  
            $this->M_PKeranjang->tambah_keranjang($data);
          }

          redirect('PKeranjang');
    }

    public function delete_keranjang(){
        $id = $this->input->post('id');

        $email = $this->session->userdata('email');
        $Dataid_pengguna = $this->M_PKeranjang->cari_idPengguna($email)->row_array();
        $id_pengguna = $Dataid_pengguna['id_pengguna'];

        date_default_timezone_set("Asia/Jakarta");
        $waktu_delete = date("Y-m-d H:i:s");

        $where = array (
          'id_keranjang' => $id
        );

        $data = array (
          'user_delete' => $id_pengguna,
          'waktu_delete' => $waktu_delete,
          'status_delete' => "Tidak Aktif",
        );

        $this->M_PKeranjang->coba_delete($where,$data);
        redirect('PKeranjang');
        
    }

    public function edit_keranjang(){
          $email = $this->session->userdata('email');
          $Dataid_pengguna = $this->M_PKeranjang->cari_idPengguna($email)->row_array();
          $id_pengguna = $Dataid_pengguna['id_pengguna'];

          date_default_timezone_set("Asia/Jakarta");
          $waktu_edit = date("Y-m-d H:i:s");

          $jumlah_barang = $this->input->post('jmlh_brg');
          $id_keranjang = $this->input->post('id');

          $where = array (
            'id_keranjang' => $id_keranjang
          );

          $data = array (
            'jumlah_barang' => $jumlah_barang,
            'user_edit' => $id_pengguna,
            'waktu_edit' => $waktu_edit,
          );

          $this->M_PKeranjang->coba_edit($where,$data);
          redirect('PKeranjang');
    }

    public function checkout(){
      $email = $this->session->userdata('email');
      $Data_Pelanggan = $this->M_PKeranjang->cari_idPelanggan($email)->row_array();
      $id_pelanggan = $Data_Pelanggan['id_pelanggan'];

      $data_keranjang['keranjang'] = $this->M_PKeranjang->get_dataKeranjang($id_pelanggan)->result();
      $this->load->view('VP_CheckoutKeranjang',$data_keranjang);
    }

    

}
?>