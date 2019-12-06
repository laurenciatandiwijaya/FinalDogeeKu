<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PHome extends CI_Model {

    function get_dataBarang(){
        return $this->db->query("SELECT * FROM barang,kategori_barang WHERE barang.id_kategori_barang
        = kategori_barang.id_kategori_barang ORDER BY jumlah_barang DESC LIMIT 4;");
    }
    
}
?>
