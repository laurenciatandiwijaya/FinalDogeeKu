<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Layanan extends CI_Model {

	function ambilData()
	{
		return $this->db->query('select a.id_layanan, a.nama_layanan, a.id_jabatan, a.status_delete, b.nama_jabatan 
		FROM layanan a JOIN jabatan b ON
		a.id_jabatan = b.id_jabatan');
	}

	function cekLayanan($table, $nama_layanan){
		return $this->db->get_where($table, $nama_layanan)->num_rows();
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
