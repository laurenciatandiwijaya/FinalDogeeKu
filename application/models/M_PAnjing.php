<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PAnjing extends CI_Model {
    function cari_jenisAnjing($table){
        return $this->db->get('jenis_anjing');	
    }

    function cari_idPelanggan($where){
        return $this->db->query("SELECT a.id_pelanggan FROM pelanggan a  JOIN  pengguna b WHERE 
        b.email='$where' AND a.id_pengguna=b.id_pengguna");
    }

    function cek_dataAnjing($where){
        return $this->db->get_where('anjing',$where);
    }

    function tambah_anjing($data){
        $this->db->insert('anjing',$data);
    }

    function data_anjingku($pengguna){
        return $this->db->query("SELECT anjing.id_anjing, jenis_anjing.nama_jenis_anjing,
        anjing.nama_anjing, anjing.jenis_kelamin, anjing.berat_badan, anjing.tinggi,
        anjing.tanggal_lahir FROM anjing,jenis_anjing,pengguna,pelanggan WHERE anjing.id_pelanggan = pelanggan.id_pelanggan
        AND pelanggan.id_pengguna = pengguna.id_pengguna AND anjing.id_jenis_anjing = jenis_anjing.id_jenis_anjing
        AND pengguna.id_pengguna='$pengguna' AND anjing.status_delete='Aktif' ");
    }

    function ambilAnjing_id($id_anjing){
        return $this->db->query("SELECT anjing.id_anjing, jenis_anjing.nama_jenis_anjing,
        anjing.nama_anjing, anjing.jenis_kelamin, anjing.berat_badan, anjing.tinggi,
        anjing.tanggal_lahir FROM anjing,jenis_anjing,pengguna,pelanggan WHERE anjing.id_pelanggan = pelanggan.id_pelanggan
        AND pelanggan.id_pengguna = pengguna.id_pengguna AND anjing.id_jenis_anjing = jenis_anjing.id_jenis_anjing
        AND anjing.id_anjing='$id_anjing'");
    }

    function ambilJenis_anjing(){
        return $this->db->get('jenis_anjing');
    }

    function update_data($data,$where){
        $this->db->where($where);
        $this->db->update('anjing',$data);
    }

}
?>
