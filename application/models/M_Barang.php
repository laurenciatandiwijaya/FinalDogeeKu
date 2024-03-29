<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Barang extends CI_Model {

	function ambilData()
	{
		return $this->db->query("select a.id_barang, a.id_kategori_barang, a.nama_barang, a.jumlah_barang, 
		a.harga, a.warna, a.ukuran, a.satuan, a.keterangan, a.waktu_add, b.nama_kategori_barang 
		FROM barang a JOIN kategori_barang b ON
		a.id_kategori_barang = b.id_kategori_barang
		WHERE a.status_delete = 'Aktif'");
	}

	function cekBarang($table, $barang){
		return $this->db->get_where($table, $barang)->num_rows();
	}

	function tambahRecord($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function tampilanEditRecord($table,$where)
	{
		$query=$this->db->get_where($table,$where);
		return $query;
	}

	function editRecord($where,$table,$data)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function deleteRecord($where,$table,$data)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
