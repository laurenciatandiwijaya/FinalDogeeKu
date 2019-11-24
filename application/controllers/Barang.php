<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Barang');
		$this->load->model('M_KategoriBarang');
	}  
	
	public function index()
	{
		$data['barang']=$this->M_Barang->ambilData()->result();
		$this->load->view('V_Barang',$data);
	}

	public function tampilanTambahData()
	{
		$data['kategori_barang']=$this->M_KategoriBarang->ambilData()->result();
		$this->load->view('V_TD_Barang',$data);
	}

	public function tambahData()
	{
		$id_kategori_barang = $this->input->post('id_kategori_barang');
		$nama_barang = $this->input->post('nama_barang');
		$warna = $this->input->post('warna');
		$ukuran = $this->input->post('ukuran');
		$satuan = $this->input->post('satuan');

		$where = array(
			'id_kategori_barang' => $id_kategori_barang,
			'nama_barang' => $nama_barang,
			'warna' => $warna,
			'ukuran' => $ukuran,
			'satuan' => $satuan
		);
		
		$hasil = $this->M_Barang->cekBarang('barang', $where);

		if($hasil > 0){
			redirect('Barang/tampilanTambahData');
		}
		else{
			$id_barang = $this->input->post('id_barang');
			$jumlah_barang = $this->input->post('jumlah_barang');
			$harga = $this->input->post('harga');
			$keterangan = $this->input->post('keterangan');
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$data = array(
				'id_kategori_barang' => $id_kategori_barang,
				'nama_barang' => $nama_barang,
				'jumlah_barang' => $jumlah_barang,
				'harga' => $harga,
				'warna' => $warna,
				'ukuran' => $ukuran,
				'satuan' => $satuan,
				'keterangan' => $keterangan,
				'status_delete' => "Aktif",
				'waktu_add' => $waktu_add
			);
	
			$this->M_Barang->tambahRecord('barang',$data);
			redirect('Barang');
		}
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_barang' => $id
		);
		
		$data['barang']= $this->M_Barang->tampilanEditRecord('barang',$where)->result();
		$data['kategori_barang']=$this->M_KategoriBarang->ambilData()->result();
		$this->load->view('V_Detail_Barang',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_barang' => $id
		);
		
		$data['barang']= $this->M_Barang->tampilanEditRecord('barang',$where)->result();
		$data['kategori_barang']=$this->M_KategoriBarang->ambilData()->result();
		$this->load->view('V_Edit_Barang',$data);
	}

	public function editData()
	{
		$id_kategori_barangAsli = $this->input->post('id_kategori_barangAsli');
		$id_kategori_barangUbah = $this->input->post('id_kategori_barangUbah');
		$nama_barangAsli = $this->input->post('nama_barangAsli');
		$nama_barangUbah = $this->input->post('nama_barangUbah');
		$warnaAsli = $this->input->post('warnaAsli');
		$warnaUbah = $this->input->post('warnaUbah');
		$ukuranAsli = $this->input->post('ukuranAsli');
		$ukuranUbah = $this->input->post('ukuranUbah');
		$satuanAsli = $this->input->post('satuanAsli');
		$satuanUbah = $this->input->post('satuanUbah');

		$id_kategori_barang = $id_kategori_barangAsli;
		$nama_barang = $nama_barangAsli;
		$warna = $warnaAsli;
		$ukuran = $ukuranAsli;
		$satuan = $satuanAsli;

		if($id_kategori_barangAsli != $id_kategori_barangUbah || $nama_barangAsli != $nama_barangUbah || 
			$warnaAsli != $warnaUbah || $ukuranAsli != $ukuranUbah || $satuanAsli != $satuanUbah){
			$whereCek = array(
				'id_kategori_barang' => $id_kategori_barangUbah,
				'nama_barang' => $nama_barangUbah,
				'warna' => $warnaUbah,
				'ukuran' => $ukuranUbah,
				'satuan' => $satuanUbah
			);
			
			$hasil = $this->M_Barang->cekBarang('barang', $whereCek);
			if($hasil > 0){
				redirect('Barang');
			}
			$id_kategori_barang = $id_kategori_barangUbah;
			$nama_barang = $nama_barangUbah;
			$warna = $warnaUbah;
			$ukuran = $ukuranUbah;
			$satuan = $satuanUbah;
		}
		$id_barang = $this->input->post('id_barang');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$harga = $this->input->post('harga');
		$keterangan = $this->input->post('keterangan');

		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_barang' => $id_barang
		);

		$data = array(
			'id_kategori_barang' => $id_kategori_barang,
			'nama_barang' => $nama_barang,
			'jumlah_barang' => $jumlah_barang,
			'harga' => $harga,
			'warna' => $warna,
			'ukuran' => $ukuran,
			'satuan' => $satuan,
			'keterangan' => $keterangan,
			'waktu_edit' => $waktu_edit
		);

		$this->M_Barang->editRecord($where,'barang',$data);
		redirect('Barang');
	}

	public function deleteData($id)
	{
		$where = array('id_barang' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'waktu_delete' => $waktu_delete
		);
		$this->M_Barang->deleteRecord($where, 'barang', $data);
		redirect('Barang');
	}

}
