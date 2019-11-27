<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PPlanner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->table 		= 'kegiatan';
		$this->load->model('M_PPlanner'); 

		if($this->session->userdata('status') != "login"){
			redirect('Login/login');
		  }
	}

	public function index() 
	{
		$data_calendar = $this->M_PPlanner->ambil_data($this->table);
		$calendar = array();
		foreach ($data_calendar as $key => $val) 
		{
			$calendar[] = array(
				'id' 	=> intval($val->id_kegiatan), 
				'title' => $val->nama_anjing, 
				'id_anjing' =>  intval($val->id_anjing),
				'nama_anjing' => $val->nama_kegiatan, 
				'start' => date_format( date_create($val->start_date) ,"Y-m-d H:i:s"),
				'end' 	=> date_format( date_create($val->end_date) ,"Y-m-d H:i:s"),
				'color' => $val->color,
			);
		}

		$data = array();
		$data['get_data']			= json_encode($calendar);
		$this->load->view('VP_Planner', $data);
		
	}

	public function tambah_kegiatan(){
    $email = $this->session->userdata('email');

		$Data_Pelanggan = $this->M_PPlanner->cari_idPelanggan($email)->row_array();
		$id_pelanggan = $Data_Pelanggan['id_pelanggan'];

		$data['data_anjing'] = $this->M_PPlanner->cari_namaAnjing($id_pelanggan)->result();

		$this->load->view('VP_tambahKegiatanAnjing',$data);
	}

	public function coba_tambahKegiatanAnjing(){
		$email = $this->session->userdata('email');

		$tangkap_idAnjing = $this->input->post('nama_anjing');
		$tangkap_namaKegiatan = $this->input->post('nama_kegiatan');
		$tangkap_color = $this->input->post('color');
		$tangkap_startDate = $this->input->post('start_date');
		$tangkap_endDate = $this->input->post('end_date');

    $Dataid_pengguna = $this->M_PPlanner->cari_idPengguna($email)->row_array();
    $id_pengguna = $Dataid_pengguna['id_pengguna'];

	date_default_timezone_set("Asia/Jakarta");
	$waktu_add = date("Y-m-d H:i:s");
	
	if($tangkap_endDate <= $tangkap_startDate){
		$data['status_announce'] = "19";
        $this->load->view('VP_Announce',$data);
	}
	else{
		$where_data = array (
			'id_anjing' => $tangkap_idAnjing,
			'start_date' => $tangkap_startDate,
			'end_date' => $tangkap_endDate,
			'nama_kegiatan' => $tangkap_namaKegiatan
		  );
		  //ini belum bisa...
		  if($tangkap_startDate == $tangkap_endDate){
			$data['status_announce'] = "12";
			$this->load->view('VP_Announce',$data);
		  }
	  
		  else{
			$cek_kegiatan = $this->M_PPlanner->cek_kegiatan($where_data)->num_rows();
			if($cek_kegiatan < 1){
			  $data_kegiatan = array(
				'nama_kegiatan' => $tangkap_namaKegiatan,
				'id_anjing' => $tangkap_idAnjing,
				'color' => $tangkap_color,
				'start_date' => $tangkap_startDate,
				'end_date' => $tangkap_endDate,
				'user_add' => $id_pengguna,
				'waktu_add' => $waktu_add,
				'status_delete' => "Aktif"
			  );
		  
			  $insert = $this->M_PPlanner->insert($this->table, $data_kegiatan);
			  redirect('PPlanner');  
			}
		
			else{
			  $data['status_announce'] = "11";
			  $this->load->view('VP_Announce',$data);
			}    
		  }
	  
	}
    
	}

	public function edit_kegiatan(){
    $email = $this->session->userdata('email');

    $tangkap_namaAnjing = $this->input->post('title');
    $tangkap_namaKegiatan = $this->input->post('nama_anjing');
    $tangkap_startDate = $this->input->post('start_date');
    $tangkap_endDate = $this->input->post('end_date');

	$Data_Pelanggan = $this->M_PPlanner->cari_idPelanggan($email)->row_array();
	$id_pelanggan = $Data_Pelanggan['id_pelanggan'];


		$data['data_anjingPilihan'] = $this->M_PPlanner->cari_AnjingPilihan($tangkap_namaAnjing,$tangkap_namaKegiatan,$tangkap_startDate,$tangkap_endDate)->result();
		$data['data_anjing'] = $this->M_PPlanner->cari_namaAnjing($id_pelanggan)->result();
		
		$this->load->view('VP_editKegiatanAnjing',$data);
		
	}

	public function coba_editKegiatanAnjing(){
    $email = $this->session->userdata('email');

		$tangkap_idKegiatan = $this->input->post('id_kegiatan');
		$tangkap_idAnjing = $this->input->post('nama_anjing');
		$tangkap_namaKegiatan = $this->input->post('nama_kegiatan');
		$tangkap_color = $this->input->post('color');
		$tangkap_startDate = $this->input->post('start_date');
		$tangkap_endDate = $this->input->post('end_date');


    $Dataid_pengguna = $this->M_PPlanner->cari_idPengguna($email)->row_array();
    $id_pengguna = $Dataid_pengguna['id_pengguna'];

		date_default_timezone_set("Asia/Jakarta");
		$waktu_edit = date("Y-m-d H:i:s");

		$data_kegiatan = array(
			'nama_kegiatan' => $tangkap_namaKegiatan,
			'id_anjing' => $tangkap_idAnjing,
			'color' => $tangkap_color,
			'start_date' => $tangkap_startDate,
			'end_date' => $tangkap_endDate,
			'user_edit' => $id_pengguna,
			'waktu_edit' => $waktu_edit,
		);

		$where_idKegiatan = array (
			'id_kegiatan' => $tangkap_idKegiatan
		);

		$this->M_PPlanner->edit_dataAnjing($data_kegiatan,$where_idKegiatan);
		redirect('PPlanner');
	}


	public function save()
	{
		$response = array();
		$this->form_validation->set_rules('title', 'Title cant be empty ', 'required');
		if ($this->form_validation->run() == TRUE)
		{
			$param = $this->input->post();
			$calendar_id = $param['calendar_id'];
			unset($param['calendar_id']);

			if($calendar_id == 0)
			{
				$param['create_at']   	= date('Y-m-d H:i:s');

				$tangkap_title = $param['nama_anjing'];
				$tangkap_idAnjing = $param['title'];
				$tangkap_color = $param['color'];
				$tangkap_startDate = $param['start_date'];
				$tangkap_endDate = $param['end_date'];
				$tangkap_createAt = $param['create_at'];
				
				$data_kegiatan = array(
					'nama_kegiatan' => $tangkap_title,
					'id_anjing' => $tangkap_idAnjing,
					'color' => $tangkap_color,
					'start_date' => $tangkap_startDate,
					'end_date' => $tangkap_endDate,
					'create_at' => $tangkap_createAt
				);

				$insert = $this->M_PPlanner->insert($this->table, $data_kegiatan);
			}
		}

		echo json_encode($response);
	}

  public function coba_delete($id){
    $email = $this->session->userdata('email');
    $Dataid_pengguna = $this->M_PPlanner->cari_idPengguna($email)->row_array();
    $id_pengguna = $Dataid_pengguna['id_pengguna'];

    $tangkap_idKegiatan = $id;

    date_default_timezone_set("Asia/Jakarta");
		$waktu_delete = date("Y-m-d H:i:s");

    $data = array (
      'status_delete' => "Tidak Aktif",
      'waktu_delete' => $waktu_delete,
      'user_delete' => $id_pengguna
    );

    $where = array (
      'id_kegiatan' => $tangkap_idKegiatan
    );

    $this->M_PPlanner->delete_data($where,$data);

    redirect('PPlanner');
  }

}
