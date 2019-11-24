<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pelanggan extends CI_Model {

	function ambilData()
	{
		return $this->db->query('select a.id_pengguna, a.email, a.password, a.nama_lengkap, a.tanggal_lahir,
		a.jenis_kelamin, a.no_hp, a.status_delete, b.id_pelanggan, b.tanggal_registrasi
		FROM pengguna a JOIN pelanggan b ON a.id_pengguna = b.id_pengguna');
	}

	function ambilDataNamaPelanggan(){
		return $this->db->query('select a.nama_lengkap, b.id_pelanggan 
		FROM pengguna a JOIN pelanggan b ON a.id_pengguna = b.id_pengguna');
	}

	function cekEmail($table, $email){
		return $this->db->get_where($table, $email)->num_rows();
	}

	function tambahRecordPengguna($table, $data)
	{
		$this->db->insert($table,$data);
	}

	function tambahRecordPelanggan($table,$data)
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
