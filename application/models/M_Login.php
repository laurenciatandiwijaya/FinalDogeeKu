<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {
    function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	
	function cek_email($table,$where){
		return $this->db->get_where($table,$where);
	}

	function cek_namaPengguna($table,$where){
		return $this->db->query("SELECT nama_lengkap FROM pengguna WHERE email='$where'");
	}

	function edit_dataPengguna($where,$table,$data)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function cek_password($where){
		return $this->db->get_where('pengguna',$where);
	}

	function edit_password($where,$table,$data)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function tambahRecordPengguna($table, $data)
	{
		$this->db->insert($table,$data);
	}

	function tambahRecordPelanggan($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function get_dataAnjing($where){
		return $this->db->query("SELECT anjing.nama_anjing FROM anjing,pengguna,pelanggan
		WHERE pengguna.id_pengguna='$where' AND pengguna.id_pengguna = pelanggan.id_pengguna AND 
		anjing.id_pelanggan = pelanggan.id_pelanggan");
	}


}
?>
