<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PReservasi extends CI_Controller {
    function __construct(){
		parent:: __construct();
    $this->load->model('M_PReservasi');
    $this->load->model('M_ReportSalon');
		$this->load->model('M_ReportKlinik');
    $this->load->model('M_ReportPenitipan');
    $this->load->model('M_InvoiceOnline');
    $this->load->model('M_PInvoice');
    

    if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		  }
    }  

    public function index(){
      $data['id_anjing'] = $this->input->post('id_anjing');
      $this->load->view('VP_Reservasi',$data);
    }

    public function reservasi_salon($id){
      $id_pengguna = $this->session->userdata('id_pengguna');
      $id_anjing = $id;

      $data['data_anjing'] = $this->M_PReservasi->cari_anjing($id_anjing)->result();

      $this->load->view('VP_TD_ReservasiSalon1', $data);
    }

    public function coba_reservasiSalon1(){
      $id_anjing = $this->input->post('id_anjing');
      $nama_anjing = $this->input->post('nama_anjing');
      $tanggal = $this->input->post('tanggal');
      $jam = $this->input->post('jam');
      $keterangan = $this->input->post('keterangan');

      $hasil1 = $this->M_ReportSalon->cekReport($id_anjing, $tanggal, $jam, "Menunggu");
      $hasil2 = $this->M_ReportKlinik->cekReport($id_anjing, $tanggal, $jam, "Menunggu");
		  $hasil3 = $this->M_ReportPenitipan->cekReport($id_anjing, $tanggal, $jam, "Menunggu");

      
      if($hasil1 > 0 || $hasil2 > 0 || $hasil3 > 0 ){
        $data['status_announce'] = "17";
        $this->load->view('VP_Announce',$data);
      }
      else{
          $nama_layanan ="Salon";
          $data_reservasi['cek_reservasi'] = $this->M_PReservasi->cari_reservasi($tanggal,$jam)->result();
          $data_reservasi['data_pekerja'] = $this->M_PReservasi->cari_pekerja($nama_layanan)->result();
          $counter_data_reservasi =  $this->M_PReservasi->cari_reservasi($tanggal,$jam)->num_rows();

          $cek_pekerja = 0;
          foreach($data_reservasi['data_pekerja'] as $list1){
            $counter=0;
            foreach($data_reservasi['cek_reservasi'] as $list2){
              if($list1->id_pekerja == $list2->id_pekerja){
                break;
              }
              else{
                $counter++;
              }
            }
            if($counter == $counter_data_reservasi){
              $id_pekerja_terpilih = $list1->id_pekerja;
              $nama_pekerja_terpilih = $list1->nama_lengkap;
              $cek_pekerja=1;
              break;
            }
          }
          if($cek_pekerja == 1){
              $data['id_layanan'] = $this->M_PReservasi->cari_idLayanan($nama_layanan)->result();
              foreach($data['id_layanan'] as $list){
                $id_layanan = intval($list->id_layanan);
              }
              $data['detail_layanan']=$this->M_PReservasi->ambil_detailLayanan($id_layanan)->result();
              $data['id_pekerja'] = $id_pekerja_terpilih;
              $data['nama_lengkap'] = $nama_pekerja_terpilih;
              $data['id_anjing'] = $id_anjing;
              $data['tanggal'] = $tanggal;
              $data['jam'] = $jam;
              $data['keterangan'] = $keterangan;
              $data['nama_anjing'] = $nama_anjing;
              $this->load->view('VP_TD_ReservasiSalon2',$data);
          }
          else{
              $data['status_announce'] = "18";
              $this->load->view('VP_Announce',$data);
          }
        }
    }

    public function coba_reservasiSalon2(){
          $nama_layanan ="Salon";
          $data['id_layanan'] = $this->M_PReservasi->cari_idLayanan($nama_layanan)->result();
            foreach($data['id_layanan'] as $list){
              $id_layanan = intval($list->id_layanan);
            }

          $data['det_lay'] = $this->M_PReservasi->ambil_detailLayanan($id_layanan)->result();
          $data_id_layanan = array();
          
          $hitung_layanan_terpilih = 0;
          $hitung_jumlah_layanan = $this->M_PReservasi->ambil_detailLayanan($id_layanan)->num_rows();
          foreach($data['det_lay'] as $list){
            $cek = $this->input->post('layanan'.$list->id_detail_layanan);
            if($cek != null){
              array_push($data_id_layanan, $cek);
              $hitung_layanan_terpilih++;
            } 
          }

          if($hitung_layanan_terpilih == 0){
              echo "PILIH LAYANAN OIII";
          }

          else{

              $data_tampung['id_pekerja'] = $this->input->post('id_pekerja');
              $data_tampung['nama_pekerja'] = $this->input->post('nama_pekerja');
              $data_tampung['id_anjing'] = $this->input->post('id_anjing');
              $data_tampung['nama_anjing'] = $this->input->post('nama_anjing');
              $data_tampung['tanggal'] = $this->input->post('tanggal');
              $data_tampung['jam'] = $this->input->post('jam');
              $data_tampung['keterangan'] = $this->input->post('keterangan');

              $data_tampung['arr_id_detail_layanan'] = $data_id_layanan;
              $data_tampung['data_detail_layanan'] = $this->M_PReservasi->ambil_detailLayanan($id_layanan)->result();

              $this->load->view('VP_TD_ReservasiSalon3',$data_tampung);
          }
    }

    public function coba_reservasiSalon3(){
        $id_pengguna = $this->session->userdata("id_pengguna");
        $id_pekerja = $this->input->post('id_pekerja');
        $nama_pekerja = $this->input->post('nama_pekerja');
        $id_anjing = $this->input->post('id_anjing');
        $nama_anjing = $this->input->post('nama_anjing');
        $tanggal = $this->input->post('tanggal');
        $jam = $this->input->post('jam');
        $keterangan = $this->input->post('keterangan');

        date_default_timezone_set("Asia/Jakarta");
        $waktu_add = date("Y-m-d H:i:s");

        $tanggalHariIni = date("Y-m-d");
        $tanggalTanpaStrip = date("Ymd", strtotime($tanggalHariIni));

        $jumlahReport = $this->M_ReportSalon->cekUrutan($tanggalTanpaStrip."SL");
        $urutanReport = $jumlahReport+1;
        $id_report_salon = $tanggalTanpaStrip ."SL". $urutanReport;
        
        $jumlahInvoice = $this->M_InvoiceOnline->cekUrutan($tanggalTanpaStrip."LY");
        $urutanInvoice = $jumlahInvoice+1;
        $id_invoice = $tanggalTanpaStrip ."LY". $urutanInvoice;

        
        $jumlah_layanan = $this->input->post('jumlah_layanan');
        $total_harga = 0;
        for($i=1;$i<=$jumlah_layanan;$i++){
          $nama = "id_detail_layanan".$i;
          $id_layanan = $this->input->post($nama);
          
              $data_detail_layanan = array(
                'id_report_salon' => $id_report_salon,
                'id_detail_layanan' => $id_layanan,
                'status_delete' => "Aktif",
                'user_add' =>$id_pengguna,
                'waktu_add' => $waktu_add
              );
              $this->M_ReportSalon->tambahRecord('detail_layanan_report_salon',$data_detail_layanan);
      
              $harga_detail_layanan = $this->M_PReservasi->ambil_hargaLayanan($id_layanan)->row_array();
              $total_harga = $total_harga + $harga_detail_layanan['harga'];
        }

        $data_report_salon = array (
          'id_report_salon' => $id_report_salon,
          'id_pekerja' => $id_pekerja,
          'tanggal' => $tanggal,
          'jam' => $jam,
          'keterangan' => $keterangan,
          'status_report' =>"Menunggu",
          'status_delete' => "Aktif",
          'user_add' => $id_pengguna,
          'waktu_add' => $waktu_add
        );

        $this->M_ReportSalon->tambahRecord('report_salon',$data_report_salon);

        $dataPelangganSalon = array(
          'id_anjing' => $id_anjing,
          'id_report_salon' => $id_report_salon,
          'status_delete' => "Aktif",
          'user_add' => $id_pengguna,
          'waktu_add' => $waktu_add
        );
        $this->M_ReportSalon->tambahRecord('pelanggan_salon',$dataPelangganSalon);

        $data_id_pelanggan = $this->M_PReservasi->ambil_id_pelanggan($id_pengguna)->row_array();
        $id_pelanggan = $data_id_pelanggan['id_pelanggan'];

        $data_invoice = array(
          'id_invoice' => $id_invoice,
          'id_pelanggan' => $id_pelanggan,
          'tanggal' => $tanggalHariIni,
          'jam' => $waktu_add,
          'metode_pembayaran' => "Transfer",
          'total' => $total_harga,
          'status_invoice' => "Belum Lunas",
          'status_delete' => "Aktif",
          'user_add' => $id_pengguna,
          'waktu_add' => $waktu_add
        );

        $this->M_InvoiceOnline->tambahRecord('invoice',$data_invoice);
        
        $data_detail_invoice_layanan = array(
          'id_invoice' => $id_invoice,
          'id_report' => $id_report_salon,
          'status_delete' => "Aktif",
          'user_add' => $id_pengguna,
          'waktu_add' => $waktu_add
        );
        $this->M_ReportSalon->tambahRecord('detail_invoice_layanan',$data_detail_invoice_layanan);

        $data['id_invoice'] = $id_invoice;
        $data['total_harga'] = $total_harga;
        $this->load->view('VP_KonfirmasiTransfer_Layanan',$data);
        
    }

    public function reservasi_penitipan($id){
      $id_pengguna = $this->session->userdata('id_pengguna');
      $id_anjing = $id;

      $data['data_anjing'] = $this->M_PReservasi->cari_anjing($id_anjing)->result();

      $this->load->view('VP_TD_ReservasiPenitipan1', $data);
    }

    public function coba_reservasiPenitipan1(){
      $id_anjing = $this->input->post('id_anjing');
      $nama_anjing = $this->input->post('nama_anjing');
      $tanggal = $this->input->post('tanggal');
      $jam = $this->input->post('jam');
      $keterangan = $this->input->post('keterangan');

      $hasil1 = $this->M_ReportSalon->cekReport($id_anjing, $tanggal, $jam, "Menunggu");
      $hasil2 = $this->M_ReportKlinik->cekReport($id_anjing, $tanggal, $jam, "Menunggu");
		  $hasil3 = $this->M_ReportPenitipan->cekReport($id_anjing, $tanggal, $jam, "Menunggu");

      
      if($hasil1 > 0 || $hasil2 > 0 || $hasil3 > 0 ){
        $data['status_announce'] = "17";
        $this->load->view('VP_Announce',$data);
      }
      else{
          $nama_layanan ="Penitipan";
          $data_reservasi['cek_reservasi'] = $this->M_PReservasi->cari_reservasi_penitipan($tanggal,$jam)->result();
          $data_reservasi['data_pekerja'] = $this->M_PReservasi->cari_pekerja($nama_layanan)->result();
          $counter_data_reservasi =  $this->M_PReservasi->cari_reservasi_penitipan($tanggal,$jam)->num_rows();

          $cek_pekerja = 0;
          foreach($data_reservasi['data_pekerja'] as $list1){
            $counter=0;
            foreach($data_reservasi['cek_reservasi'] as $list2){
              if($list1->id_pekerja == $list2->id_pekerja){
                break;
              }
              else{
                $counter++;
              }
            }
            if($counter == $counter_data_reservasi){
              $id_pekerja_terpilih = $list1->id_pekerja;
              $nama_pekerja_terpilih = $list1->nama_lengkap;
              $cek_pekerja=1;
              break;
            }
          }
          if($cek_pekerja == 1){
              $data['id_layanan'] = $this->M_PReservasi->cari_idLayanan($nama_layanan)->result();
              foreach($data['id_layanan'] as $list){
                $id_layanan = intval($list->id_layanan);
              }
              $data['detail_layanan']=$this->M_PReservasi->ambil_detailLayanan($id_layanan)->result();
              $data['id_pekerja'] = $id_pekerja_terpilih;
              $data['nama_lengkap'] = $nama_pekerja_terpilih;
              $data['id_anjing'] = $id_anjing;
              $data['tanggal'] = $tanggal;
              $data['jam'] = $jam;
              $data['keterangan'] = $keterangan;
              $data['nama_anjing'] = $nama_anjing;
              $this->load->view('VP_TD_ReservasiPenitipan2',$data);
          }
          else{
              $data['status_announce'] = "18";
              $this->load->view('VP_Announce',$data);
          }
        }
    }

    public function coba_reservasiPenitipan2(){
        $nama_layanan ="Penitipan";
        $data['id_layanan'] = $this->M_PReservasi->cari_idLayanan($nama_layanan)->result();
          foreach($data['id_layanan'] as $list){
            $id_layanan = intval($list->id_layanan);
          }

        $data['det_lay'] = $this->M_PReservasi->ambil_detailLayanan($id_layanan)->result();
        $data_id_layanan = array();
        
        $hitung_layanan_terpilih = 0;
        $hitung_jumlah_layanan = $this->M_PReservasi->ambil_detailLayanan($id_layanan)->num_rows();
        foreach($data['det_lay'] as $list){
          $cek = $this->input->post('layanan'.$list->id_detail_layanan);
          if($cek != null){
            array_push($data_id_layanan, $cek);
            $hitung_layanan_terpilih++;
          } 
        }

        if($hitung_layanan_terpilih == 0){
            echo "PILIH LAYANAN OIII";
        }

        else{

            $data_tampung['id_pekerja'] = $this->input->post('id_pekerja');
            $data_tampung['nama_pekerja'] = $this->input->post('nama_pekerja');
            $data_tampung['id_anjing'] = $this->input->post('id_anjing');
            $data_tampung['nama_anjing'] = $this->input->post('nama_anjing');
            $data_tampung['tanggal'] = $this->input->post('tanggal');
            $data_tampung['jam'] = $this->input->post('jam');
            $data_tampung['keterangan'] = $this->input->post('keterangan');

            $data_tampung['arr_id_detail_layanan'] = $data_id_layanan;
            $data_tampung['data_detail_layanan'] = $this->M_PReservasi->ambil_detailLayanan($id_layanan)->result();

            $this->load->view('VP_TD_ReservasiPenitipan3',$data_tampung);
        }
    }

    public function coba_reservasiPenitipan3(){
        $id_pengguna = $this->session->userdata("id_pengguna");
        $id_pekerja = $this->input->post('id_pekerja');
        $nama_pekerja = $this->input->post('nama_pekerja');
        $id_anjing = $this->input->post('id_anjing');
        $nama_anjing = $this->input->post('nama_anjing');
        $tanggal = $this->input->post('tanggal');
        $jam = $this->input->post('jam');
        $keterangan = $this->input->post('keterangan');

        date_default_timezone_set("Asia/Jakarta");
        $waktu_add = date("Y-m-d H:i:s");

        $tanggalHariIni = date("Y-m-d");
        $tanggalTanpaStrip = date("Ymd", strtotime($tanggalHariIni));

        $jumlahReport = $this->M_ReportPenitipan->cekUrutan($tanggalTanpaStrip."PA");
        $urutanReport = $jumlahReport+1;
        $id_report_penitipan = $tanggalTanpaStrip ."PA". $urutanReport;
        
        $jumlahInvoice = $this->M_InvoiceOnline->cekUrutan($tanggalTanpaStrip."LY");
        $urutanInvoice = $jumlahInvoice+1;
        $id_invoice = $tanggalTanpaStrip ."LY". $urutanInvoice;

        
        $jumlah_layanan = $this->input->post('jumlah_layanan');
        $total_harga = 0;
        for($i=1;$i<=$jumlah_layanan;$i++){
          $nama = "id_detail_layanan".$i;
          $id_layanan = $this->input->post($nama);
          
              $data_detail_layanan = array(
                'id_report_penitipan' => $id_report_penitipan,
                'id_detail_layanan' => $id_layanan,
                'status_delete' => "Aktif",
                'user_add' =>$id_pengguna,
                'waktu_add' => $waktu_add
              );
              $this->M_ReportPenitipan->tambahRecord('detail_layanan_report_penitipan',$data_detail_layanan);
      
              $harga_detail_layanan = $this->M_PReservasi->ambil_hargaLayanan($id_layanan)->row_array();
              $total_harga = $total_harga + $harga_detail_layanan['harga'];
        }

        $data_report_penitipan = array (
          'id_report_penitipan' => $id_report_penitipan,
          'id_pekerja' => $id_pekerja,
          'tanggal' => $tanggal,
          'jam' => $jam,
          'keterangan' => $keterangan,
          'status_report' =>"Menunggu",
          'status_delete' => "Aktif",
          'user_add' => $id_pengguna,
          'waktu_add' => $waktu_add
        );

        $this->M_ReportPenitipan->tambahRecord('report_penitipan',$data_report_penitipan);

        $dataPelangganPenitipan = array(
          'id_anjing' => $id_anjing,
          'id_report_penitipan' => $id_report_penitipan,
          'status_delete' => "Aktif",
          'user_add' => $id_pengguna,
          'waktu_add' => $waktu_add
        );
        $this->M_ReportPenitipan->tambahRecord('pelanggan_penitipan',$dataPelangganPenitipan);

        $data_id_pelanggan = $this->M_PReservasi->ambil_id_pelanggan($id_pengguna)->row_array();
        $id_pelanggan = $data_id_pelanggan['id_pelanggan'];

        $data_invoice = array(
          'id_invoice' => $id_invoice,
          'id_pelanggan' => $id_pelanggan,
          'tanggal' => $tanggalHariIni,
          'jam' => $waktu_add,
          'metode_pembayaran' => "Transfer",
          'total' => $total_harga,
          'status_invoice' => "Belum Lunas",
          'status_delete' => "Aktif",
          'user_add' => $id_pengguna,
          'waktu_add' => $waktu_add
        );

        $this->M_InvoiceOnline->tambahRecord('invoice',$data_invoice);
        
        $data_detail_invoice_layanan = array(
          'id_invoice' => $id_invoice,
          'id_report' => $id_report_penitipan,
          'status_delete' => "Aktif",
          'user_add' => $id_pengguna,
          'waktu_add' => $waktu_add
        );
        $this->M_ReportPenitipan->tambahRecord('detail_invoice_layanan',$data_detail_invoice_layanan);


        $data['id_invoice'] = $id_invoice;
        $data['total_harga'] = $total_harga;
        $this->load->view('VP_KonfirmasiTransfer_Layanan',$data);


    }

    public function reservasi_klinik($id){
      $id_pengguna = $this->session->userdata('id_pengguna');
      $id_anjing = $id;

      $data['data_anjing'] = $this->M_PReservasi->cari_anjing($id_anjing)->result();

      $this->load->view('VP_TD_ReservasiKlinik1', $data);
    }
    
    public function coba_reservasiKlinik1(){
      $id_anjing = $this->input->post('id_anjing');
      $nama_anjing = $this->input->post('nama_anjing');
      $tanggal = $this->input->post('tanggal');
      $jam = $this->input->post('jam');
      $keterangan = $this->input->post('keterangan');

      $hasil1 = $this->M_ReportSalon->cekReport($id_anjing, $tanggal, $jam, "Menunggu");
      $hasil2 = $this->M_ReportKlinik->cekReport($id_anjing, $tanggal, $jam, "Menunggu");
		  $hasil3 = $this->M_ReportPenitipan->cekReport($id_anjing, $tanggal, $jam, "Menunggu");

      
      if($hasil1 > 0 || $hasil2 > 0 || $hasil3 > 0 ){
        $data['status_announce'] = "17";
        $this->load->view('VP_Announce',$data);
      }
      else{
          $nama_layanan ="Klinik";
          $data_reservasi['cek_reservasi'] = $this->M_PReservasi->cari_reservasi_klinik($tanggal,$jam)->result();
          $data_reservasi['data_pekerja'] = $this->M_PReservasi->cari_pekerja($nama_layanan)->result();
          $counter_data_reservasi =  $this->M_PReservasi->cari_reservasi_klinik($tanggal,$jam)->num_rows();

          $cek_pekerja = 0;
          foreach($data_reservasi['data_pekerja'] as $list1){
            $counter=0;
            foreach($data_reservasi['cek_reservasi'] as $list2){
              if($list1->id_pekerja == $list2->id_pekerja){
                break;
              }
              else{
                $counter++;
              }
            }
            if($counter == $counter_data_reservasi){
              $id_pekerja_terpilih = $list1->id_pekerja;
              $nama_pekerja_terpilih = $list1->nama_lengkap;
              $cek_pekerja=1;
              break;
            }
          }
          if($cek_pekerja == 1){
              $data['id_layanan'] = $this->M_PReservasi->cari_idLayanan($nama_layanan)->result();
              foreach($data['id_layanan'] as $list){
                $id_layanan = intval($list->id_layanan);
              }
              $data['detail_layanan']=$this->M_PReservasi->ambil_detailLayanan($id_layanan)->result();
              $data['id_pekerja'] = $id_pekerja_terpilih;
              $data['nama_lengkap'] = $nama_pekerja_terpilih;
              $data['id_anjing'] = $id_anjing;
              $data['tanggal'] = $tanggal;
              $data['jam'] = $jam;
              $data['keterangan'] = $keterangan;
              $data['nama_anjing'] = $nama_anjing;
              $this->load->view('VP_TD_ReservasiKlinik2',$data);
          }
          else{
              $data['status_announce'] = "18";
              $this->load->view('VP_Announce',$data);
          }
        }
    }

    public function coba_reservasiKlinik2(){
      $nama_layanan ="Klinik";
      $data['id_layanan'] = $this->M_PReservasi->cari_idLayanan($nama_layanan)->result();
        foreach($data['id_layanan'] as $list){
          $id_layanan = intval($list->id_layanan);
        }

      $data['det_lay'] = $this->M_PReservasi->ambil_detailLayanan($id_layanan)->result();
      $data_id_layanan = array();
      
      $hitung_layanan_terpilih = 0;
      $hitung_jumlah_layanan = $this->M_PReservasi->ambil_detailLayanan($id_layanan)->num_rows();
      foreach($data['det_lay'] as $list){
        $cek = $this->input->post('layanan'.$list->id_detail_layanan);
        if($cek != null){
          array_push($data_id_layanan, $cek);
          $hitung_layanan_terpilih++;
        } 
      }

      if($hitung_layanan_terpilih == 0){
          echo "PILIH LAYANAN OIII";
      }

      else{

          $data_tampung['id_pekerja'] = $this->input->post('id_pekerja');
          $data_tampung['nama_pekerja'] = $this->input->post('nama_pekerja');
          $data_tampung['id_anjing'] = $this->input->post('id_anjing');
          $data_tampung['nama_anjing'] = $this->input->post('nama_anjing');
          $data_tampung['tanggal'] = $this->input->post('tanggal');
          $data_tampung['jam'] = $this->input->post('jam');
          $data_tampung['keterangan'] = $this->input->post('keterangan');

          $data_tampung['arr_id_detail_layanan'] = $data_id_layanan;
          $data_tampung['data_detail_layanan'] = $this->M_PReservasi->ambil_detailLayanan($id_layanan)->result();

          $this->load->view('VP_TD_ReservasiKlinik3',$data_tampung);
      }
    }

    public function coba_reservasiKlinik3(){
      $id_pengguna = $this->session->userdata("id_pengguna");
      $id_pekerja = $this->input->post('id_pekerja');
      $nama_pekerja = $this->input->post('nama_pekerja');
      $id_anjing = $this->input->post('id_anjing');
      $nama_anjing = $this->input->post('nama_anjing');
      $tanggal = $this->input->post('tanggal');
      $jam = $this->input->post('jam');
      $keterangan = $this->input->post('keterangan');

      date_default_timezone_set("Asia/Jakarta");
      $waktu_add = date("Y-m-d H:i:s");

      $tanggalHariIni = date("Y-m-d");
      $tanggalTanpaStrip = date("Ymd", strtotime($tanggalHariIni));

      $jumlahReport = $this->M_ReportKlinik->cekUrutan($tanggalTanpaStrip."KL");
      $urutanReport = $jumlahReport+1;
      $id_report_klinik = $tanggalTanpaStrip ."KL". $urutanReport;
      
      $jumlahInvoice = $this->M_InvoiceOnline->cekUrutan($tanggalTanpaStrip."LY");
      $urutanInvoice = $jumlahInvoice+1;
      $id_invoice = $tanggalTanpaStrip ."LY". $urutanInvoice;

      
      $jumlah_layanan = $this->input->post('jumlah_layanan');
      $total_harga = 0;
      for($i=1;$i<=$jumlah_layanan;$i++){
        $nama = "id_detail_layanan".$i;
        $id_layanan = $this->input->post($nama);
        
            $data_detail_layanan = array(
              'id_report_klinik' => $id_report_klinik,
              'id_detail_layanan' => $id_layanan,
              'status_delete' => "Aktif",
              'user_add' =>$id_pengguna,
              'waktu_add' => $waktu_add
            );
            
            $this->M_ReportKlinik->tambahRecord('detail_layanan_report_klinik',$data_detail_layanan);
    
            $harga_detail_layanan = $this->M_PReservasi->ambil_hargaLayanan($id_layanan)->row_array();
            $total_harga = $total_harga + $harga_detail_layanan['harga'];
      }

      $data_report_klinik = array (
        'id_report_klinik' => $id_report_klinik,
        'id_pekerja' => $id_pekerja,
        'tanggal' => $tanggal,
        'jam' => $jam,
        'keterangan' => $keterangan,
        'status_report' =>"Menunggu",
        'status_delete' => "Aktif",
        'user_add' => $id_pengguna,
        'waktu_add' => $waktu_add
      );

      $this->M_ReportKlinik->tambahRecord('report_klinik',$data_report_klinik);

      $dataPelangganKlinik = array(
        'id_anjing' => $id_anjing,
        'id_report_klinik' => $id_report_klinik,
        'status_delete' => "Aktif",
        'user_add' => $id_pengguna,
        'waktu_add' => $waktu_add
      );
      $this->M_ReportKlinik->tambahRecord('pelanggan_klinik',$dataPelangganKlinik);

      $data_id_pelanggan = $this->M_PReservasi->ambil_id_pelanggan($id_pengguna)->row_array();
      $id_pelanggan = $data_id_pelanggan['id_pelanggan'];
      

      $data_invoice = array(
        'id_invoice' => $id_invoice,
        'id_pelanggan' => $id_pelanggan,
        'tanggal' => $tanggalHariIni,
        'jam' => $waktu_add,
        'metode_pembayaran' => "Transfer",
        'total' => $total_harga,
        'status_invoice' => "Belum Lunas",
        'status_delete' => "Aktif",
        'user_add' => $id_pengguna,
        'waktu_add' => $waktu_add
      );

      $this->M_InvoiceOnline->tambahRecord('invoice',$data_invoice);
      
      $data_detail_invoice_layanan = array(
        'id_invoice' => $id_invoice,
        'id_report' => $id_report_klinik,
        'status_delete' => "Aktif",
        'user_add' => $id_pengguna,
        'waktu_add' => $waktu_add
      );
      $this->M_ReportKlinik->tambahRecord('detail_invoice_layanan',$data_detail_invoice_layanan);

      $data['id_invoice'] = $id_invoice;
      $data['total_harga'] = $total_harga;
      $this->load->view('VP_KonfirmasiTransfer_Layanan',$data);
    }

    public function data_reservasi(){
        $email = $this->session->userdata('email');
        $Data_Pelanggan = $this->M_PInvoice->cari_idPelanggan($email)->row_array();
        $id_pelanggan = $Data_Pelanggan['id_pelanggan'];
        date_default_timezone_set("Asia/Jakarta");
        $waktu_sekarang = date("Y-m-d H:i:s");

  
        $data_idPelanggan =array(
          'id_pelanggan' => $id_pelanggan
        );

        $data_invoice['invoice'] = $this->M_PInvoice->get_data_invoice_shop($id_pelanggan)->result();
        foreach($data_invoice['invoice'] as $list_invoice){
          if($list_invoice->metode_pembayaran == "transfer"){
            $idInvoice = $list_invoice->id_invoice;
            $this->M_PInvoice->update_invoice_status($idInvoice);
            $this->M_PInvoice->update_transfer_status($idInvoice);

          }
          if($list_invoice->waktu_add <= $waktu_sekarang){
            $idInvoice = $list_invoice->id_invoice;
            $this->M_PInvoice->update_invoice_status($idInvoice);
          }
        }
  
        $data_reservasi['reservasi_klinik'] = $this->M_PReservasi->data_reservasi_klinik($id_pelanggan)->result();
        $data_reservasi['detail_reservasi_klinik'] = $this->M_PReservasi->data_detail_reservasi_klinik($id_pelanggan)->result();
        
        $data_reservasi['reservasi_salon'] = $this->M_PReservasi->data_reservasi_salon($id_pelanggan)->result();
        $data_reservasi['detail_reservasi_salon'] = $this->M_PReservasi->data_detail_reservasi_salon($id_pelanggan)->result();
        
        $data_reservasi['reservasi_penitipan'] = $this->M_PReservasi->data_reservasi_penitipan($id_pelanggan)->result();
        $data_reservasi['detail_reservasi_penitipan'] = $this->M_PReservasi->data_detail_reservasi_penitipan($id_pelanggan)->result();
        
        
        $this->load->view('VP_DataReservasi',$data_reservasi);
    }

    public function history_reservasi(){
      $email = $this->session->userdata('email');
      $Data_Pelanggan = $this->M_PInvoice->cari_idPelanggan($email)->row_array();
      $id_pelanggan = $Data_Pelanggan['id_pelanggan'];

      $data_idPelanggan =array(
        'id_pelanggan' => $id_pelanggan
      );

      $data_reservasi['reservasi_klinik'] = $this->M_PReservasi->data_reservasi_klinik($id_pelanggan)->result();
      $data_reservasi['detail_reservasi_klinik'] = $this->M_PReservasi->data_detail_reservasi_klinik($id_pelanggan)->result();
      
      $data_reservasi['reservasi_salon'] = $this->M_PReservasi->data_reservasi_salon($id_pelanggan)->result();
      $data_reservasi['detail_reservasi_salon'] = $this->M_PReservasi->data_detail_reservasi_salon($id_pelanggan)->result();
      
      $data_reservasi['reservasi_penitipan'] = $this->M_PReservasi->data_reservasi_penitipan($id_pelanggan)->result();
      $data_reservasi['detail_reservasi_penitipan'] = $this->M_PReservasi->data_detail_reservasi_penitipan($id_pelanggan)->result();
      
      
      $this->load->view('VP_HistoryReservasi',$data_reservasi);
  }




    
  





   
}
?>