<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kegiatan extends CI_Model {

	function ambilData()
	{
		return $this->db->query("select a.id_kegiatan, a.id_anjing, a.nama_kegiatan, a.start_date, 
		a.end_date, a.color, b.nama_anjing, d.nama_lengkap 
		FROM kegiatan a JOIN anjing b ON a.id_anjing = b.id_anjing 
		JOIN pelanggan c ON b.id_pelanggan = c.id_pelanggan 
		JOIN pengguna d ON c.id_pengguna = d.id_pengguna
		WHERE a.status_delete = 'Aktif'");
	}

	function ambilNamaPemilikAnjing(){
		return $this->db->query("select a.id_anjing, a.nama_anjing, c.nama_lengkap 
		FROM anjing a JOIN pelanggan b ON a.id_pelanggan = b.id_pelanggan 
		JOIN pengguna c ON b.id_pengguna = c.id_pengguna
		WHERE a.status_delete = 'Aktif'");
	}

	function cekKegiatan($table, $kegiatan){
		return $this->db->get_where($table, $kegiatan)->num_rows();
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
