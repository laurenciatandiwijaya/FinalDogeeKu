<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PInvoice extends CI_Controller {
    function __construct(){
		parent:: __construct();
    $this->load->model('M_PInvoice');

    if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		  }
    }  

    public function buat_pesanan(){
      $total_harga = $this->input->post('ttl_hrg');
      $kota = $this->input->post('kota');
      $kecamatan = $this->input->post('kecamatan');
      $kode_pos = $this->input->post('kode_pos');
      $alamat = $this->input->post('alamat');
      $metode_pembayaran = $this->input->post('metode_pembayaran');

      $detail_alamat = $kota.','.$kecamatan.','.$kode_pos.','.$alamat;

      $email = $this->session->userdata('email');
      $Data_Pelanggan = $this->M_PInvoice->cari_idPelanggan($email)->row_array();
      $id_pelanggan = $Data_Pelanggan['id_pelanggan'];

      $Dataid_pengguna = $this->M_PInvoice->cari_idPengguna($email)->row_array();
      $id_pengguna = $Dataid_pengguna['id_pengguna'];

      date_default_timezone_set("Asia/Jakarta");
      $waktu_add = date("Y-m-d H:i:s");

      $tanggal = date("Y-m-d");
      $jam = date("H:i:s");

      $tanggalHariIni = date("Y-m-d");
      $tanggalTanpaStrip = date("Ymd", strtotime($tanggalHariIni));
      $jumlahInvoice = $this->M_PInvoice->cekUrutan($tanggalTanpaStrip."OL");
      $urutanInvoice = $jumlahInvoice+1;
      $id_invoice = $tanggalTanpaStrip ."OL". $urutanInvoice;

      $data = array (
        'id_invoice' => $id_invoice,
        'id_pelanggan' => $id_pelanggan,
        'tanggal' => $tanggal,
        'jam' => $jam,
        'metode_pembayaran' => $metode_pembayaran,
        'total' => $total_harga,
        'alamat' => $detail_alamat,
        'user_add' => $id_pengguna,
        'waktu_add' => $waktu_add,
        'status_invoice' => "Belum Lunas",
        'status_delete' => "Aktif"
      );

      $this->M_PInvoice->insert_data($data);

      $where_pelanggan = array (
        'id_pelanggan' => $id_pelanggan,
        'status_delete' => "Aktif"
      );

      $data_barang = $this->M_PInvoice->get_data('keranjang',$where_pelanggan)->result();

      foreach($data_barang as $listA){
        $id_barangA = $listA->id_barang;
        $jumlah_barangA = $listA->jumlah_barang;

        $dataBrg = array (
          'id_invoice' => $id_invoice,
          'id_barang' => $id_barangA,
          'jumlah_barang' => $jumlah_barangA, 
          'waktu_add' => $waktu_add,
          'user_add' => $id_pengguna,
          'status_delete' => "Aktif"
        );

        $this->M_PInvoice->tambah_data('detail_invoice_barang',$dataBrg);
      }

      $this->M_PInvoice->update_keranjang($id_pelanggan);

      if($metode_pembayaran == "Transfer"){
        $data['status_announce'] = "13";
        $data['id_invoice'] = $id_invoice;
        $data['total_harga'] = $total_harga;
        $this->load->view('VP_Announce',$data);
      }
      else{
        $data['status_announce'] = "14";
        $this->load->view('VP_Announce',$data);
      }

    }

    function konfirmasi_transfer(){
      $data['id_invoice'] = $this->input->post('id_invoice');
      $data['total_harga'] = $this->input->post('total_harga');
 
      $this->load->view('VP_KonfirmasiTransfer',$data);
    }

    function coba_konfirmasiTransfer(){
      $id_invoice = $this->input->post('id_invoice');
      $nama_bank = $this->input->post('nama_bank');
      $nomor_rekening = $this->input->post('nomor_rekening');
      $nama_pengirim = $this->input->post('nama_pengirim');
      $tanggal = $this->input->post('tanggal_dikirim');
      $total = $this->input->post('total');
      
      $email = $this->session->userdata('email');
      $Dataid_pengguna = $this->M_PInvoice->cari_idPengguna($email)->row_array();
      $id_pengguna = $Dataid_pengguna['id_pengguna'];

      date_default_timezone_set("Asia/Jakarta");
      $waktu_add = date("Y-m-d H:i:s");

      $data = array (
        'id_invoice' => $id_invoice,
        'nama_bank' => $nama_bank,
        'nomor_rekening' => $nomor_rekening,
        'nama_pengirim' => $nama_pengirim,
        'tanggal' => $tanggal,
        'total' => $total,
        'user_add' =>$id_pengguna,
        'waktu_add' => $waktu_add,
        'status_transfer' => "Menunggu",
        'status_delete' => "Aktif"
      );

      $this->M_PInvoice->tambah_data('transfer',$data);

      $data['status_announce'] = "15";
      $this->load->view('VP_Announce',$data);
    }

    function coba_konfirmasiTransfer_layanan(){
      $id_invoice = $this->input->post('id_invoice');
      $nama_bank = $this->input->post('nama_bank');
      $nomor_rekening = $this->input->post('nomor_rekening');
      $nama_pengirim = $this->input->post('nama_pengirim');
      $tanggal = $this->input->post('tanggal_dikirim');
      $total = $this->input->post('total');
      
      $email = $this->session->userdata('email');
      $Dataid_pengguna = $this->M_PInvoice->cari_idPengguna($email)->row_array();
      $id_pengguna = $Dataid_pengguna['id_pengguna'];

      date_default_timezone_set("Asia/Jakarta");
      $waktu_add = date("Y-m-d H:i:s");

      $data = array (
        'id_invoice' => $id_invoice,
        'nama_bank' => $nama_bank,
        'nomor_rekening' => $nomor_rekening,
        'nama_pengirim' => $nama_pengirim,
        'tanggal' => $tanggal,
        'total' => $total,
        'user_add' =>$id_pengguna,
        'waktu_add' => $waktu_add,
        'status_transfer' => "Menunggu",
        'status_delete' => "Aktif"
      );

      $this->M_PInvoice->tambah_data('transfer',$data);

      $data['status_announce'] = "20";
      $this->load->view('VP_Announce',$data);
    }

    public function pemesanan(){
      $email = $this->session->userdata('email');
      $Data_Pelanggan = $this->M_PInvoice->cari_idPelanggan($email)->row_array();
      $id_pelanggan = $Data_Pelanggan['id_pelanggan'];

      $data_idPelanggan =array(
        'id_pelanggan' => $id_pelanggan
      );

      $data_invoice['invoice'] = $this->M_PInvoice->get_data_invoice_shop($id_pelanggan)->result();
      $data_invoice['detail_barang'] = $this->M_PInvoice->get_detailInvoiceBarang('detail_invoice_barang',$id_pelanggan)->result();
      $this->load->view('VP_Pemesanan',$data_invoice);
    }

    public function tampilan_komfirmasiTransfer($id){
      $data_invoice = $this->M_PInvoice->ambil_totalHarga($id)->row_array();

      $data['total_harga'] = $data_invoice['total'];
      $data['id_invoice'] = $id;

      $this->load->view('VP_KonfirmasiTransfer',$data);

    }

    public function tampilan_konfirmasiTransfer_layanan($id){
      $data_invoice = $this->M_PInvoice->ambil_totalHarga($id)->row_array();

      $data['total_harga'] = $data_invoice['total'];
      $data['id_invoice'] = $id;

      $this->load->view('VP_KonfirmasiTransfer_Layanan',$data);

    }

    public function history(){
      $email = $this->session->userdata('email');
      $Data_Pelanggan = $this->M_PInvoice->cari_idPelanggan($email)->row_array();
      $id_pelanggan = $Data_Pelanggan['id_pelanggan'];

      $data_idPelanggan =array(
        'id_pelanggan' => $id_pelanggan
      );

      $data_invoice['invoice'] = $this->M_PInvoice->get_data('invoice',$data_idPelanggan)->result();
      $data_invoice['detail_barang'] = $this->M_PInvoice->get_detailInvoiceBarang('detail_invoice_barang',$id_pelanggan)->result();
      $this->load->view('VP_HistoryPemesanan',$data_invoice);
    }

}
?>