<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('M_Keranjang');
		$this->load->model('M_Pelanggan');
		$this->load->model('M_Barang');
	}  
	
	public function index()
	{
		$data['keranjang']=$this->M_Keranjang->ambilData()->result();
		$this->load->view('V_Keranjang',$data);
	}

	public function tampilanTambahData()
	{
		$data['pelanggan']=$this->M_Pelanggan->ambilData()->result();
		$data['barang']=$this->M_Barang->ambilData()->result();
		$this->load->view('V_TD_Keranjang',$data);
	}

	public function tambahData()
	{
		$id_pelanggan = $this->input->post('id_pelanggan');
		$id_barang = $this->input->post('id_barang');
		$where = array(
			'id_pelanggan' => $id_pelanggan,
			'id_barang' => $id_barang,
			'status_delete' => "Aktif"
		);

		$hasil = $this->M_Keranjang->cekKeranjang('keranjang', $where);
		if($hasil > 0){
			redirect('Keranjang/tampilanTambahData');
		}
		else{
			date_default_timezone_set("Asia/Jakarta");
			$waktu_add = date("Y-m-d H:i:s");

			$data = array(
				'id_pelanggan' => $id_pelanggan,
				'id_barang' => $id_barang,
				'status_delete' => "Aktif",
				'waktu_add' => $waktu_add
			);

			$this->M_Keranjang->tambahRecord('keranjang',$data);
			redirect('Keranjang');
		}
	}

	public function tampilanDetailData($id)
	{
		$where = array(
			'id_keranjang' => $id
		);
		
		$data['keranjang']= $this->M_Keranjang->tampilanEditRecord('keranjang',$where)->result();
		$data['pelanggan']=$this->M_Pelanggan->ambilData()->result();
		$data['barang']=$this->M_Barang->ambilData()->result();
		$this->load->view('V_Detail_Keranjang',$data);
	}

	public function tampilanEditData($id)
	{
		$where = array(
			'id_keranjang' => $id
		);
		
		$data['keranjang']= $this->M_Keranjang->tampilanEditRecord('keranjang',$where)->result();
		$data['pelanggan']=$this->M_Pelanggan->ambilData()->result();
		$data['barang']=$this->M_Barang->ambilData()->result();
		$this->load->view('V_Edit_Keranjang',$data);
	}

	public function editData()
	{
		$id_pelangganAsli = $this->input->post('id_pelangganAsli');
		$id_pelangganUbah = $this->input->post('id_pelangganUbah');
		$id_barangAsli = $this->input->post('id_barangAsli');
		$id_barangUbah = $this->input->post('id_barangUbah');

		$id_pelanggan = $this->input->post('id_pelangganAsli');
		$id_barang = $this->input->post('id_barangAsli');

		if($id_pelangganAsli != $id_pelangganUbah || $id_barangAsli != $id_barangUbah){
			$whereCek = array(
				'id_pelanggan' => $id_pelangganUbah,
				'id_barang' => $id_barangUbah,
				'status_delete' => "Aktif"
			);
			
			$hasil = $this->M_Keranjang->cekKeranjang('keranjang', $whereCek);
			if($hasil > 0){
				redirect('Keranjang');
			}
			$id_pelanggan = $id_pelangganUbah;
			$id_barang = $id_barangUbah;
		}

		$id_keranjang = $this->input->post('id_keranjang');
		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$where = array(
			'id_keranjang' => $id_keranjang
		);

		$data = array(
			'id_pelanggan' => $id_pelanggan,
			'id_barang' => $id_barang,
			'waktu_edit' => $waktu_edit
		);

		$this->M_Keranjang->editRecord($where,'keranjang',$data);
		redirect('Keranjang');
	}
	
	public function deleteData($id)
	{
		$where = array('id_keranjang' => $id);

		date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

		$data = array(
			'status_delete' => "Tidak Aktif",
			'waktu_delete' => $waktu_delete
		);
		$this->M_Keranjang->deleteRecord($where, 'keranjang', $data);
		redirect('Keranjang');
	}

}
