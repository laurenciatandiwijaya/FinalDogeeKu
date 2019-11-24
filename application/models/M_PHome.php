<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PHome extends CI_Model {

    function get_dataBarang(){
        return $this->db->query("SELECT * FROM barang ORDER BY jumlah_barang DESC LIMIT 4;");
    }



    
}
?>
