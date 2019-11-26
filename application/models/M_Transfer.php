<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Transfer extends CI_Model {

	function ambilData()
	{
		return $this->db->query('select a.id_transfer, a.id_invoice, a.nama_bank, a.nomor_rekening,
		a.nama_pengirim, a.tanggal, a.total, a.status_transfer, d.nama_lengkap 
		FROM transfer a JOIN invoice b ON a.id_invoice = b.id_invoice 
		JOIN pelanggan c ON b.id_pelanggan = c.id_pelanggan 
		JOIN pengguna d ON c.id_pengguna = d.id_pengguna');
	}

	function ambilDataMenunggu()
	{
		return $this->db->query("select a.id_transfer, a.id_invoice, a.nama_bank, a.nomor_rekening,
<<<<<<< HEAD
		a.nama_pengirim, a.tanggal, a.total, a.waktu_add,a.status_transfer, d.nama_lengkap 
=======
		a.nama_pengirim, a.tanggal, a.total, a.status_transfer, a.waktu_add, d.nama_lengkap 
>>>>>>> 31d0331025df97b6ba8612236bb0897ba55e2557
		FROM transfer a JOIN invoice b ON a.id_invoice = b.id_invoice 
		JOIN pelanggan c ON b.id_pelanggan = c.id_pelanggan 
		JOIN pengguna d ON c.id_pengguna = d.id_pengguna
		WHERE a.status_transfer = 'Menunggu' AND b.status_delete = 'Aktif'");
	}

	function tampilanTambahRecord(){
		return $this->db->query("select a.id_invoice, c.nama_lengkap 
		FROM invoice a JOIN pelanggan b ON a.id_pelanggan = b.id_pelanggan 
		JOIN pengguna c ON b.id_pengguna = c.id_pengguna WHERE a.metode_pembayaran = 'Transfer' ");
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
