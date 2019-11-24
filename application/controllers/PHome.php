<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PHome extends CI_Controller {
  function __construct(){
    parent:: __construct();
      $this->load->model('M_PHome');
  }  

    public function index(){
      if($this->session->userdata('status') == "login"){
        if($this->session->userdata('id_tipe_pengguna') == "1"){
          redirect('HomeAdmin');
        }
        else if($this->session->userdata('id_tipe_pengguna') == "2"){
          redirect('HomeAdmin');
        }
        else if($this->session->userdata('id_tipe_pengguna') == "3"){
          redirect('HomeKasir');
        }
        else if($this->session->userdata('id_tipe_pengguna') == "4" || $this->session->userdata('id_tipe_pengguna') == "5" ||$this->session->userdata('id_tipe_pengguna') == "6"){
          redirect('HomePekerjaLayanan');
        }
        else if($this->session->userdata('id_tipe_pengguna') == "7"){
          $data['data_barang'] = $this->M_PHome->get_dataBarang()->result();
          $this->load->view('VP_Home',$data);
        }
      }
      else{
        $data['data_barang'] = $this->M_PHome->get_dataBarang()->result();
        $this->load->view('VP_Home',$data);
      }
    }

    public function klinik(){
      $this->load->view('VP_LayananKlinik');
    }

    public function salon(){
      $this->load->view('VP_LayananSalon');
    }

    public function penitipan(){
      $this->load->view('VP_LayananPenitipan');
    }

    

}
?>