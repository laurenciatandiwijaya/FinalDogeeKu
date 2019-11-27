<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Barang');
		$this->load->model('M_KategoriBarang');

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		}
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
		$target_dir = "../FinalDogeeKu/assets/img/barang/";
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

		$id_pengguna = $this->session->userdata("id_pengguna");
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

		if($hasil > 0 || $uploadOk == 0){
			redirect('Barang/tampilanTambahData');
		}
		else{
			$id_barang = $this->input->post('id_barang');
			$jumlah_barang = $this->input->post('jumlah_barang');
			$harga = $this->input->post('harga');
			$keterangan = $this->input->post('keterangan');
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

			$data = array(
				'id_kategori_barang' => $id_kategori_barang,
				'nama_barang' => $nama_barang,
				'jumlah_barang' => $jumlah_barang,
				'harga' => $harga,
				'warna' => $warna,
				'ukuran' => $ukuran,
				'satuan' => $satuan,
				'keterangan' => $keterangan,
				'foto' => "/assets/img/barang/".basename($_FILES["fileToUpload"]["name"]),
				'status_delete' => "Aktif",
				'user_add' => $id_pengguna,
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
		$id_pengguna = $this->session->userdata("id_pengguna");
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
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit
		);

		$this->M_Barang->editRecord($where,'barang',$data);
		redirect('Barang');
	}

	public function deleteData($id)
	{
		$id_pengguna = $this->session->userdata("id_pengguna");
		$where = array('id_barang' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'user_delete' => $id_pengguna,
			'waktu_delete' => $waktu_delete
		);
		$this->M_Barang->deleteRecord($where, 'barang', $data);
		redirect('Barang');
	}

}
