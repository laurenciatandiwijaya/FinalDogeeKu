<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_InvoiceToko extends CI_Model {

	function ambilData()
	{
		return $this->db->query("select id_invoice, tanggal, jam, metode_pembayaran, 
		total, status_invoice FROM invoice 
		WHERE id_invoice LIKE '%TK%' AND status_delete = 'Aktif'");	
	}

	function cekUrutan($tanggalKode){
		return $this->db->query("select id_invoice FROM invoice
		WHERE id_invoice LIKE '$tanggalKode%' ")->num_rows();	
	}

	function cekInvoice($table, $invoice){
		return $this->db->get_where($table, $invoice)->num_rows();
	}

	function tambahRecord($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function ambilDetailInvoiceBarang($id_invoice){
		return $this->db->query("select a.id_barang, a.jumlah_barang, b.nama_barang, b.warna, b.ukuran, b.satuan
		FROM detail_invoice_barang a JOIN barang b ON a.id_barang = b.id_barang
		WHERE a.id_invoice = '$id_invoice'");
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
