<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Anjing extends CI_Model {

	function ambilData()
	{
		return $this->db->query("select a.id_anjing, a.id_jenis_anjing, a.id_pelanggan, a.nama_anjing, 
		a.jenis_kelamin, a.berat_badan, a.tinggi, a.tanggal_lahir, b.nama_jenis_anjing, d.nama_lengkap 
		FROM anjing a JOIN jenis_anjing b ON a.id_jenis_anjing = b.id_jenis_anjing 
		JOIN pelanggan c ON a.id_pelanggan = c.id_pelanggan 
		JOIN pengguna d ON c.id_pengguna = d.id_pengguna
		WHERE a.status_delete = 'Aktif'");
	}

	function cekAnjing($table, $anjing){
		return $this->db->get_where($table, $anjing)->num_rows();
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
