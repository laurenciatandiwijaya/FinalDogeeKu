<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_HomeAdmin extends CI_Model {

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
}
