<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pekerja extends CI_Model {

	function ambilData()
	{
		return $this->db->query("select a.id_pengguna, a.email, a.nama_lengkap, a.tanggal_lahir,
		a.jenis_kelamin, a.no_hp, a.status_delete, b.id_pekerja, b.id_jabatan, b.tanggal_masuk, 
		b.alamat, c.nama_jabatan
		FROM pengguna a JOIN pekerja b ON a.id_pengguna = b.id_pengguna 
		JOIN jabatan c ON b.id_jabatan = c.id_jabatan
		WHERE a.status_delete = 'Aktif'");	
	}

	function ambilDataNamaPekerja(){
		return $this->db->query("select a.nama_lengkap, b.id_pekerja, b.id_jabatan
		FROM pengguna a JOIN pekerja b ON a.id_pengguna = b.id_pengguna
		WHERE a.status_delete = 'Aktif'");
	}

	function cekEmail($table, $email){
		return $this->db->get_where($table, $email)->num_rows();
	}

	function tambahRecordPengguna($table, $data)
	{
		$this->db->insert($table,$data);
	}

	function tambahRecordPekerja($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function tampilanEditRecord($table, $where)
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
