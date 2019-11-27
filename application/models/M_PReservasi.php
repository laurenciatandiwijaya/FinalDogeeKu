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

    function cari_reservasi_penitipan($tanggal,$jam){
        return $this->db->query("SELECT * FROM report_penitipan WHERE tanggal='$tanggal' AND jam='$jam'");
    }

    function cari_reservasi_klinik($tanggal,$jam){
        return $this->db->query("SELECT * FROM report_klinik WHERE tanggal='$tanggal' AND jam='$jam'");
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
        ='$id_pengguna' AND pelanggan.id_pengguna = pengguna.id_pengguna ");
    }

    function data_reservasi_klinik($id_pelanggan){
        return $this->db->query("SELECT * FROM invoice,detail_invoice_layanan,report_klinik,pelanggan_klinik,anjing WHERE
        invoice.id_invoice = detail_invoice_layanan.id_invoice AND 
        detail_invoice_layanan.id_report = report_klinik.id_report_klinik 
        AND report_klinik.id_report_klinik = pelanggan_klinik.id_report_klinik AND anjing.id_anjing = pelanggan_klinik.id_anjing
        AND invoice.id_pelanggan='$id_pelanggan'");
    }

    function data_detail_reservasi_klinik($id_pelanggan){
        return $this->db->query("SELECT detail_layanan.nama_detail_layanan, detail_layanan.harga, 
        detail_layanan.deskripsi_layanan, detail_layanan.id_detail_layanan, invoice.id_invoice FROM detail_layanan, 
        detail_layanan_report_klinik, report_klinik, detail_invoice_layanan, invoice WHERE invoice.id_invoice =
        detail_invoice_layanan.id_invoice AND detail_invoice_layanan.id_report = report_klinik.id_report_klinik
        AND report_klinik.id_report_klinik = detail_layanan_report_klinik.id_report_klinik AND 
        detail_layanan_report_klinik.id_detail_layanan = detail_layanan.id_detail_layanan AND 
        invoice.id_pelanggan = '$id_pelanggan'");
    }

    function data_reservasi_salon($id_pelanggan){
        return $this->db->query("SELECT * FROM invoice,detail_invoice_layanan,report_salon,pelanggan_salon,anjing WHERE
        invoice.id_invoice = detail_invoice_layanan.id_invoice AND 
        detail_invoice_layanan.id_report = report_salon.id_report_salon 
        AND report_salon.id_report_salon = pelanggan_salon.id_report_salon AND anjing.id_anjing = pelanggan_salon.id_anjing
        AND invoice.id_pelanggan='$id_pelanggan'");
    }

    function data_detail_reservasi_salon($id_pelanggan){
        return $this->db->query("SELECT detail_layanan.nama_detail_layanan, detail_layanan.harga, 
        detail_layanan.deskripsi_layanan, detail_layanan.id_detail_layanan, invoice.id_invoice FROM detail_layanan, 
        detail_layanan_report_salon, report_salon, detail_invoice_layanan, invoice WHERE invoice.id_invoice =
        detail_invoice_layanan.id_invoice AND detail_invoice_layanan.id_report = report_salon.id_report_salon
        AND report_salon.id_report_salon = detail_layanan_report_salon.id_report_salon AND 
        detail_layanan_report_salon.id_detail_layanan = detail_layanan.id_detail_layanan AND 
        invoice.id_pelanggan = '$id_pelanggan'");
    }

    function data_reservasi_penitipan($id_pelanggan){
        return $this->db->query("SELECT * FROM invoice,detail_invoice_layanan,report_penitipan,pelanggan_penitipan,anjing WHERE
        invoice.id_invoice = detail_invoice_layanan.id_invoice AND 
        detail_invoice_layanan.id_report = report_penitipan.id_report_penitipan 
        AND report_penitipan.id_report_penitipan = pelanggan_penitipan.id_report_penitipan AND anjing.id_anjing = pelanggan_penitipan.id_anjing
        AND invoice.id_pelanggan='$id_pelanggan'");
    }

    function data_detail_reservasi_penitipan($id_pelanggan){
        return $this->db->query("SELECT detail_layanan.nama_detail_layanan, detail_layanan.harga, 
        detail_layanan.deskripsi_layanan, detail_layanan.id_detail_layanan, invoice.id_invoice FROM detail_layanan, 
        detail_layanan_report_penitipan, report_penitipan, detail_invoice_layanan, invoice WHERE invoice.id_invoice =
        detail_invoice_layanan.id_invoice AND detail_invoice_layanan.id_report = report_penitipan.id_report_penitipan
        AND report_penitipan.id_report_penitipan = detail_layanan_report_penitipan.id_report_penitipan AND 
        detail_layanan_report_penitipan.id_detail_layanan = detail_layanan.id_detail_layanan AND 
        invoice.id_pelanggan = '$id_pelanggan'");
    }



    
}
?>
