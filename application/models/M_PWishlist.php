<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PWishlist extends CI_Model {
    function get_dataWishlist($id_pelanggan){
        return $this->db->query("SELECT barang.nama_barang, barang.harga, barang.warna, 
        barang.ukuran, wishlist.jumlah_barang, wishlist.id_wishlist FROM barang,wishlist WHERE 
        wishlist.id_pelanggan='$id_pelanggan' AND wishlist.status_delete='Aktif' AND 
        wishlist.id_barang = barang.id_barang");
    }

    function get_detailWishlist($id){
        return $this->db->query("SELECT * FROM wishlist WHERE id_wishlist='$id'");
    }

    function cari_idPelanggan($email){
        return $this->db->query("SELECT pelanggan.id_pelanggan FROM pelanggan,pengguna WHERE pengguna.email='$email'
        AND pengguna.id_pengguna=pelanggan.id_pengguna");
    }

    function cari_idPengguna($email){
        return $this->db->query("SELECT id_pengguna FROM pengguna WHERE email='$email'");
    }

    function cek_row($where){
        return $this->db->get_where('wishlist',$where);
    }

    function tambah_wishlist($data){
        $this->db->insert('wishlist',$data);
    }

    function tambah_jumlahWishlist($id,$jumlah,$user_edit,$waktu_edit){
        $this->db->query("UPDATE wishlist SET jumlah_barang=jumlah_barang+'$jumlah', user_edit='$user_edit',
        waktu_edit='$waktu_edit' WHERE id_wishlist='$id'");
    }

    function coba_delete($where,$data){
        $this->db->where($where);
        $this->db->update('wishlist',$data);
    }

    function coba_edit($where,$data){
        $this->db->where($where);
        $this->db->update('wishlist',$data);
    }

    function cari_wishlist($id){
        return $this->db->query("SELECT id_pelanggan,id_barang,jumlah_barang FROM wishlist WHERE id_wishlist='$id'");
    }

    function coba_pindah($where,$data){
        $this->db->where($where);
        $this->db->update('wishlist',$data);
    }

}
?>
