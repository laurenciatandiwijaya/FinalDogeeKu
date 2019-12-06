<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_KategoriBarang extends CI_Model {

	function ambilData()
	{
		return $query=$this->db->query("select * FROM kategori_barang WHERE status_delete = 'Aktif'");
	}

	function cekKategori($table, $nama_jabatan){
		return $this->db->get_where($table, $nama_jabatan)->num_rows();
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
