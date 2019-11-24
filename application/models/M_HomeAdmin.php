<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_HomeAdmin extends CI_Model {

	function ambilData()
	{
		return $query=$this->db->get('pengguna');	
	}
}
