<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ReportSalon extends CI_Model {

	function ambilData()
	{
		return $this->db->query("select a.id_report_salon, a.id_pekerja, a.tanggal, a.jam, a.keterangan,
		a.status_report, c.nama_lengkap as nama_pekerja, e.nama_anjing, g.nama_lengkap as nama_pelanggan
		FROM report_salon a JOIN pekerja b ON a.id_pekerja = b.id_pekerja
		JOIN pengguna c ON b.id_pengguna = c.id_pengguna
		JOIN pelanggan_salon d ON a.id_report_salon = d.id_report_salon
		JOIN anjing e ON d.id_anjing = e.id_anjing 
		JOIN pelanggan f ON e.id_pelanggan = f.id_pelanggan 
		JOIN pengguna g ON f.id_pengguna = g.id_pengguna
		WHERE a.status_delete = 'Aktif'");
	}

	function ambilNamaPemilikAnjing(){
		return $this->db->query("select a.id_anjing, a.nama_anjing, b.id_pelanggan, c.nama_lengkap 
		FROM anjing a JOIN pelanggan b ON a.id_pelanggan = b.id_pelanggan 
		JOIN pengguna c ON b.id_pengguna = c.id_pengguna
		WHERE a.status_delete = 'Aktif'");
	}

	function ambilDetailLayanan($table,$where){
		return $this->db->get_where($table,$where);
	}

	function cekReport($id_anjing, $tanggal, $jam, $status_report){
		return $this->db->query("select a.id_report_salon 
		FROM report_salon a JOIN pelanggan_salon b ON a.id_report_salon = b.id_report_salon 
		WHERE a.tanggal = '$tanggal' AND a.jam = '$jam' AND a.status_report = '$status_report' 
		AND b.id_anjing = '$id_anjing' AND status_delete = 'Aktif'")->num_rows();
	}

	function cekPekerja($id_pekerja, $tanggal, $jam, $status_report){
		return $this->db->query("select id_report_salon FROM report_salon 
		WHERE id_pekerja = '$id_pekerja' AND tanggal = '$tanggal' AND jam = '$jam' 
		AND status_report = '$status_report' AND status_delete = 'Aktif'")->num_rows();
	}

	function cekUrutan($tanggal){
		return $this->db->query("select id_report_salon FROM report_salon
		WHERE id_report_salon LIKE '$tanggal%' ")->num_rows();	
	}

	function tambahRecord($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function ambilDataSatuReport($id_report_salon){
		return $this->db->query("select a.id_report_salon as id_report, a.id_pekerja, a.tanggal, a.jam, a.keterangan,
		a.status_report, a.user_add, a.waktu_add, a.user_edit, a.waktu_edit, a.user_delete, a.waktu_delete, 
		a.status_delete, c.nama_lengkap as nama_pekerja, e.id_anjing, e.nama_anjing, g.nama_lengkap as nama_pelanggan
		FROM report_salon a JOIN pekerja b ON a.id_pekerja = b.id_pekerja
		JOIN pengguna c ON b.id_pengguna = c.id_pengguna
		JOIN pelanggan_salon d ON a.id_report_salon = d.id_report_salon
		JOIN anjing e ON d.id_anjing = e.id_anjing 
		JOIN pelanggan f ON e.id_pelanggan = f.id_pelanggan 
		JOIN pengguna g ON f.id_pengguna = g.id_pengguna 
		JOIN detail_invoice_layanan g ON a.id_report_salon = g.id_report
		JOIN invoice h ON g.id_invoice = h.id_invoice
		WHERE a.id_report_salon = '$id_report_salon' AND h.status_invoice = 'Lunas'");
	}

	function ambilDetailLayananSatuReport($id_report_salon){
		return $this->db->query("select c.id_detail_layanan, c.nama_detail_layanan 
		FROM report_salon a JOIN detail_layanan_report_salon b ON a.id_report_salon = b.id_report_salon 
		JOIN detail_layanan c ON b.id_detail_layanan = c.id_detail_layanan 
		WHERE a.id_report_salon = '$id_report_salon'");
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

	function ambilReportSatuPekerja($id_pekerja, $tanggal){
		return $this->db->query("select a.jam, a.status_report, c.id_anjing, d.nama_anjing, f.nama_lengkap 
		FROM report_salon a JOIN pekerja b ON a.id_pekerja = b.id_pekerja
		JOIN pelanggan_salon c ON a.id_report_salon = c.id_report_salon
		JOIN anjing d ON c.id_anjing = d.id_anjing 
		JOIN pelanggan e ON d.id_pelanggan = e.id_pelanggan 
		JOIN pengguna f ON e.id_pengguna = f.id_pengguna 
		JOIN detail_invoice_layanan g ON a.id_report_salon = g.id_report
		JOIN invoice h ON g.id_invoice = h.id_invoice
		WHERE a.tanggal = '$tanggal' AND b.id_pekerja = '$id_pekerja' 
		AND h.status_invoice = 'Lunas' AND a.status_delete = 'Aktif'");
	}

	function ambilReportUpcoming($id_pekerja){
		return $this->db->query("select a.id_report_salon as id_report, a.tanggal, a.jam, a.status_report, c.id_anjing, d.nama_anjing, f.nama_lengkap 
		FROM report_salon a JOIN pekerja b ON a.id_pekerja = b.id_pekerja
		JOIN pelanggan_salon c ON a.id_report_salon = c.id_report_salon
		JOIN anjing d ON c.id_anjing = d.id_anjing 
		JOIN pelanggan e ON d.id_pelanggan = e.id_pelanggan 
		JOIN pengguna f ON e.id_pengguna = f.id_pengguna 
		WHERE a.id_pekerja = '$id_pekerja' AND a.status_report = 'Menunggu' AND a.status_delete = 'Aktif'
		ORDER BY a.tanggal ASC, a.jam ASC");
	}

	function ambilReportFinished($id_pekerja){
		return $this->db->query("select a.id_report_salon as id_report, a.tanggal, a.jam, a.status_report, c.id_anjing, d.nama_anjing, f.nama_lengkap 
		FROM report_salon a JOIN pekerja b ON a.id_pekerja = b.id_pekerja
		JOIN pelanggan_salon c ON a.id_report_salon = c.id_report_salon
		JOIN anjing d ON c.id_anjing = d.id_anjing 
		JOIN pelanggan e ON d.id_pelanggan = e.id_pelanggan 
		JOIN pengguna f ON e.id_pengguna = f.id_pengguna 
		WHERE a.id_pekerja = '$id_pekerja' AND NOT a.status_report = 'Menunggu' AND a.status_delete = 'Aktif'
		ORDER BY a.tanggal ASC, a.jam ASC");
	}
}
