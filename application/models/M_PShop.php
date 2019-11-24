<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PShop extends CI_Model {
    
    function get_detailDataBarang($where,$table){
        return $this->db->get_where($table,$where);
    }

    function cari_kategoriBarang($id_barang){
        return $this->db->query("SELECT id_kategori_barang FROM barang WHERE id_barang='$id_barang'");
    }

    function get_detailDataBarangSejenis($a,$b){
        return $this->db->query("SELECT * FROM barang WHERE id_kategori_barang='$a' AND id_barang !='$b'");
    }
}
?>
