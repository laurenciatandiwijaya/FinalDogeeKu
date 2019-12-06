<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PShop extends CI_Controller {
    function __construct(){
		parent:: __construct();
    $this->load->model('M_PShop');

    }  

    public function index(){
		$this->load->view('VP_Shop');
    }

  public function detail_barang($id){
    $id_barang = $id;

    if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		  }

    $data_kategori_barang = $this->M_PShop->cari_kategoriBarang($id_barang)->row_array();
    $id_kategori_barang = $data_kategori_barang['id_kategori_barang'];

    $where = array (
      'id_barang' => $id_barang
    );


    $data['detailData_barang'] = $this->M_PShop->get_detailDataBarang($where,'barang')->result();
    $data['detailData_barangSejenis'] = $this->M_PShop->get_detailDataBarangSejenis($id_kategori_barang,$id_barang)->result();

    $this->load->view('VP_DetailBarang',$data);
  }

  public function detail_barang_check(){
    $id_barang = $this->input->post('id_barang');

    $data_kategori_barang = $this->M_PShop->cari_kategoriBarang($id_barang)->row_array();
    $id_kategori_barang = $data_kategori_barang['id_kategori_barang'];

    $where = array (
      'id_barang' => $id_barang
    );


    $data['detailData_barang'] = $this->M_PShop->get_detailDataBarang($where,'barang')->result();
    $data['detailData_barangSejenis'] = $this->M_PShop->get_detailDataBarangSejenis($id_kategori_barang,$id_barang)->result();

    $this->load->view('VP_DetailBarang',$data);
  }

  function lihat_kategoriBarang(){
    $kategori = $this->input->post('pilih_kategori');
    
    $data['kategori_barang'] =$this->M_PShop->ambil_basedOn_kategoriBarang($kategori)->result();

    $this->load->view('VP_Barang_KategoriBarang', $data);
  }

  function lihat_kategoriBarang_Home($id){
    $id_kategori = $id;
    
    $data['kategori_barang'] =$this->M_PShop->ambil_basedOn_kategoriBarang_Home($id_kategori)->result();

    $this->load->view('VP_Barang_KategoriBarang', $data);
  }


}
?>