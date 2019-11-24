<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DetailLayanan extends CI_Model {

	function ambilData()
	{
		return $this->db->query('select a.id_detail_layanan, a.id_layanan, a.nama_detail_layanan,
		a.deskripsi_layanan, a.harga, a.status_delete, b.nama_layanan FROM detail_layanan a JOIN layanan b ON
		a.id_layanan = b.id_layanan');
	}

	function cekDetailLayanan($table, $detail_layanan){
		return $this->db->get_where($table, $detail_layanan)->num_rows();
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
