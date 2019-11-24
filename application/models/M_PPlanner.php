<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_PPlanner extends CI_Model 
{
	public function ambil_data($table){
		return $this->db->query("SELECT anjing.id_anjing, anjing.nama_anjing,kegiatan.nama_kegiatan, kegiatan.id_kegiatan,
        kegiatan.color,kegiatan.start_date,kegiatan.end_date FROM anjing,kegiatan WHERE anjing.id_anjing=kegiatan.id_anjing
        AND kegiatan.status_delete='Aktif' ")->result();
	}

	public function cari_namaAnjing($id){
		return $this->db->query("SELECT anjing.nama_anjing, anjing.id_anjing FROM anjing WHERE anjing.id_pelanggan='$id'");
	}

	public function cari_AnjingPilihan($nama_anjing,$nama_kegiatan,$start,$end){
		return $this->db->query("SELECT kegiatan.id_kegiatan,kegiatan.nama_kegiatan,kegiatan.color,kegiatan.start_date,
		kegiatan.end_date,anjing.nama_anjing FROM kegiatan,anjing WHERE anjing.id_anjing=kegiatan.id_anjing
		AND anjing.nama_anjing='$nama_anjing' AND kegiatan.nama_kegiatan='$nama_kegiatan' AND kegiatan.start_date='$start'
        AND kegiatan.end_date='$end'");
	}

	public function edit_dataAnjing($data,$where){
		$this->db->where($where);
		$this->db->update('kegiatan',$data);
	}

	public function get_list($table, $where = FALSE )
	{
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get($table)->result();
	}	

	public function insert($table, $param)
	{
		$this->db->insert($table, $param);
		return $this->db->insert_id();
	}

	public function update($table, $set, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $set);
		return $this->db->affected_rows();
	}

	public function delete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}

	public function ambil_idAnjing($table,$where){
		return $this->db->get_where($table,$where)->row_array();
    }
    
    public function cari_idPelanggan($email){
        return $this->db->query("SELECT pelanggan.id_pelanggan FROM pelanggan,pengguna WHERE pengguna.email='$email'
        AND pengguna.id_pengguna=pelanggan.id_pengguna");
    }

    public function cari_idPengguna($email){
        return $this->db->query("SELECT id_pengguna FROM pengguna WHERE email='$email'");
    }

    public function cek_kegiatan($where){
        return $this->db->get_where('kegiatan',$where);
    }

    public function delete_data($where,$data){
        $this->db->where($where);
		$this->db->update('kegiatan',$data);
    }
}