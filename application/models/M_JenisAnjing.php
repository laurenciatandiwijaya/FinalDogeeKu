<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_JenisAnjing extends CI_Model {

	function ambilData()
	{
		return $query=$this->db->query("select * FROM jenis_anjing WHERE status_delete = 'Aktif'");
	}

	function cekJenisAnjing($table, $nama_jenis_anjing){
		return $this->db->get_where($table, $nama_jenis_anjing)->num_rows();
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
