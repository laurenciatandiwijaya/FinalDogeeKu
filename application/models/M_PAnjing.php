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
}
?>
