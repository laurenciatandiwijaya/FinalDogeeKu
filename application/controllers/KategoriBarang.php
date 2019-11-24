<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriBarang extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_KategoriBarang');
	}  
	
	public function index()
	{
		$data['kategoriBarang']=$this->M_KategoriBarang->ambilData()->result();
		$this->load->view('V_KategoriBarang',$data);
	}

	public function tampilanTambahData()
	{
		$this->load->view('V_TD_KategoriBarang');
	}

	public function tambahData()
	{
		$nama_kategori_barang = $this->input->post('nama_kategori_barang');
		$where = array(
			'nama_kategori_barang' => $nama_kategori_barang
		);
		
		$hasil = $this->M_KategoriBarang->cekKategori('kategori_barang', $where);

		if($hasil > 0){
			redirect('KategoriBarang/tampilanTambahData');
		}
		else{
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$data = array(
				'nama_kategori_barang' => $nama_kategori_barang,
				'status_delete' => "Aktif",
				'waktu_add' => $waktu_add
			);
	
			$this->M_KategoriBarang->tambahRecord('kategori_barang',$data);
			redirect('KategoriBarang');
		}
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_kategori_barang' => $id
		);
		
		$data['kategoriBarang']= $this->M_KategoriBarang->tampilanEditRecord('kategori_barang',$where)->result();
		$this->load->view('V_Detail_KategoriBarang',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_kategori_barang' => $id
		);
		
		$data['kategoriBarang']= $this->M_KategoriBarang->tampilanEditRecord('kategori_barang',$where)->result();
		$this->load->view('V_Edit_KategoriBarang',$data);
	}

	public function editData()
	{	
		$nama_kategori_barangAsli = $this->input->post('nama_kategori_barangAsli');
		$nama_kategori_barangUbah = $this->input->post('nama_kategori_barangUbah');

		$nama_kategori_barang = $nama_kategori_barangAsli;
		if($nama_kategori_barangAsli != $nama_kategori_barangUbah){
			$whereCek = array(
				'nama_kategori_barang' => $nama_kategori_barangUbah
			);
			
			$hasil = $this->M_KategoriBarang->cekKategori('kategori_barang', $whereCek);
			if($hasil > 0){
				redirect('KategoriBarang');
			}
			$nama_kategori_barang = $nama_kategori_barangUbah;
		}
		$id_kategori_barang = $this->input->post('id_kategori_barang');

		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_kategori_barang' => $id_kategori_barang
		);

		$data = array(
			'nama_kategori_barang' => $nama_kategori_barang,
			'waktu_edit' => $waktu_edit
		);

		$this->M_KategoriBarang->editRecord($where,'kategori_barang',$data);
		redirect('KategoriBarang');
	}

	public function deleteData($id)
	{
		$where = array('id_kategori_barang' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'waktu_delete' => $waktu_delete
		);
		$this->M_KategoriBarang->deleteRecord($where, 'kategori_barang', $data);
		redirect('KategoriBarang');
	}

}
