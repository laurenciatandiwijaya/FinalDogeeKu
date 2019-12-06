<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PKeranjang extends CI_Model {
    function get_datakeranjang($id_pelanggan){
        return $this->db->query("SELECT keranjang.id_barang, barang.nama_barang, barang.harga, barang.warna, 
        barang.ukuran, keranjang.jumlah_barang, keranjang.id_keranjang FROM barang,keranjang WHERE 
        keranjang.id_pelanggan='$id_pelanggan' AND keranjang.status_delete='Aktif' AND 
        keranjang.id_barang = barang.id_barang");
    }

    function get_detailkeranjang($id){
        return $this->db->query("SELECT * FROM keranjang WHERE id_keranjang='$id'");
    }

    function cari_idPelanggan($email){
        return $this->db->query("SELECT pelanggan.id_pelanggan FROM pelanggan,pengguna WHERE pengguna.email='$email'
        AND pengguna.id_pengguna=pelanggan.id_pengguna");
    }

    function cari_idPengguna($email){
        return $this->db->query("SELECT id_pengguna FROM pengguna WHERE email='$email'");
    }

    function cek_row($where){
        return $this->db->get_where('keranjang',$where);
    }

    function tambah_keranjang($data){

        $this->db->insert('keranjang',$data);
    }

    function tambah_jumlahkeranjang($id,$jumlah,$user_edit,$waktu_edit){
        $this->db->query("UPDATE keranjang SET jumlah_barang=jumlah_barang+'$jumlah', user_edit='$user_edit',
        waktu_edit='$waktu_edit' WHERE id_keranjang='$id'");
    }

    function coba_delete($where,$data){
        $this->db->where($where);
        $this->db->update('keranjang',$data);
    }

    function coba_edit($where,$data){
        $this->db->where($where);
        $this->db->update('keranjang',$data);
    }

    function cari_keranjang($id){
        return $this->db->query("SELECT id_pelanggan,id_barang,jumlah_barang FROM keranjang WHERE id_keranjang='$id'");
    }

    function coba_pindah($where,$data){
        $this->db->where($where);
        $this->db->update('keranjang',$data);
    }
}
?>
