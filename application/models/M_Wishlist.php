<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Wishlist extends CI_Model {

	function ambilData()
	{
		return $this->db->query('select a.id_wishlist, a.id_pelanggan, a.id_barang, a.jumlah_barang,
		c.nama_lengkap, d.nama_barang, d.warna, d.ukuran, d.satuan 
		FROM wishlist a JOIN pelanggan b ON a.id_pelanggan = b.id_pelanggan 
		JOIN pengguna c ON b.id_pengguna = c.id_pengguna 
		JOIN barang d ON a.id_barang = d.id_barang ');
	}

	function cekWishlist($table, $wishlist){
		return $this->db->get_where($table, $wishlist)->num_rows();
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
