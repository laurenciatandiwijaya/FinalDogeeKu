<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Invoice extends CI_Model {

	function ambilData()
	{
		return $this->db->get('invoice');
	}

	function cekInvoice($table, $invoice){
		return $this->db->get_where($table, $invoice)->num_rows();
	}

	function cekUrutan($tanggal){
		return $this->db->query("select id_invoice FROM invoice
		WHERE id_invoice LIKE '$tanggal%' ")->num_rows();	
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
