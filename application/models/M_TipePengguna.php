<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TipePengguna extends CI_Model {

	function ambilData()
	{
		return $query=$this->db->get('tipe_pengguna');	
	}

	function cekTipePengguna($table, $nama_tipe_pengguna){
		return $this->db->get_where($table, $nama_tipe_pengguna)->num_rows();
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
