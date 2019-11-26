<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PReservasi extends CI_Model {
    function cari_anjing($id){
        return $this->db->query("SELECT * FROM anjing WHERE id_anjing='$id' ");
    }

    function cari_idLayanan($nama_layanan){
        return $this->db->query("SELECT id_layanan FROM layanan WHERE nama_layanan='$nama_layanan' ");
    }

    function ambil_detailLayanan($id){
        return $this->db->query("SELECT * FROM detail_layanan WHERE id_layanan='$id' ");
    }

    function cari_reservasi($tanggal,$jam){
        return $this->db->query("SELECT * FROM report_salon WHERE tanggal='$tanggal' AND jam='$jam'");
    }

    function cari_pekerja($nama_layanan){
        return $this->db->query("SELECT pekerja.id_pekerja,pengguna.nama_lengkap FROM pengguna,pekerja,jabatan,
        layanan WHERE pengguna.id_pengguna=pekerja.id_pengguna AND pekerja.id_jabatan=jabatan.id_jabatan
        AND layanan.id_jabatan=jabatan.id_jabatan AND layanan.nama_layanan='$nama_layanan'");
    }

    function ambil_hargaLayanan($id_layanan){
        return $this->db->query("SELECT harga FROM detail_layanan WHERE id_detail_layanan='$id_layanan'");
    }

    function ambil_id_pelanggan($id_pengguna){
        return $this->db->query("SELECT pelanggan.id_pelanggan FROM pengguna,pelanggan WHERE pengguna.id_pengguna
        ='$id_pengguna' ");
    }



    
}
?>
