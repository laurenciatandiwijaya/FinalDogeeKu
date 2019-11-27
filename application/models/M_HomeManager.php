<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_HomeManager extends CI_Model {

	function ambilData()
	{
		return $query=$this->db->get('pengguna');	
	}

	function ambilDataStokBarang(){
		return $this->db->query("select id_barang FROM barang WHERE jumlah_barang < 10 ");
	}

	function ambilJumlahPembelianBarang($tanggal){
		return $this->db->query("select SUM(jumlah_barang) as jumlah FROM detail_invoice_barang 
		WHERE id_invoice LIKE '$tanggal%' ");
	}

	function ambilDataJumlahReservasi($tanggal){
		return $this->db->query("select a.id_report 
		FROM detail_invoice_layanan a JOIN report_salon b ON a.id_report = b.id_report_salon
		JOIN report_klinik c ON a.id_report = c.id_report_klinik
		JOIN report_penitipan d ON a.id_report = d.id_report_penitipan 
		WHERE b.tanggal = '$tanggal%' AND c.tanggal = '$tanggal%' AND d.tanggal = '$tanggal%'");
	}

	function hitungPendapatan($tanggal){
		return $this->db->query("select SUM(total) as total_pendapatan FROM invoice
		WHERE id_invoice LIKE '$tanggal%' ");
	}
}
