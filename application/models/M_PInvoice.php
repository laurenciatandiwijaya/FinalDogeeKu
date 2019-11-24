<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PInvoice extends CI_Model {
    function cekUrutan($tanggalKode){
		return $this->db->query("select id_invoice FROM invoice
		WHERE id_invoice LIKE '$tanggalKode%' ")->num_rows();	
    }
    
    function insert_data($data){
        $this->db->insert('invoice',$data);
    }

    function cari_idPelanggan($email){
        return $this->db->query("SELECT pelanggan.id_pelanggan FROM pelanggan,pengguna WHERE pengguna.email='$email'
        AND pengguna.id_pengguna=pelanggan.id_pengguna");
    }

    function cari_idPengguna($email){
        return $this->db->query("SELECT id_pengguna FROM pengguna WHERE email='$email'");
    }

    function get_data($table,$where){
        return $this->db->get_where($table,$where);
    }

    function tambah_data($table,$data){
        $this->db->insert($table,$data);
    }

    function update_keranjang($id_pelanggan){
        $this->db->query("UPDATE keranjang SET status_delete='Tidak Aktif' WHERE id_pelanggan='$id_pelanggan'");
    }

    function get_idInvoice($table,$id_pelanggan){
        return $this->db->query("SELECT id_invoice FROM invoice WHERE id_pelanggan='$id_pelanggan'");
    }

    function get_detailInvoiceBarang($table,$id_pelanggan){
        return $this->db->query("SELECT invoice.id_invoice,detail_invoice_barang.id_barang, detail_invoice_barang.jumlah_barang, 
        barang.nama_barang, barang.harga, barang.warna, barang.ukuran FROM detail_invoice_barang,invoice,barang
        WHERE invoice.id_pelanggan='$id_pelanggan' AND barang.id_barang = detail_invoice_barang.id_barang
        AND detail_invoice_barang.id_invoice = invoice.id_invoice ORDER BY invoice.status_invoice ASC ");
    }

}
?>
