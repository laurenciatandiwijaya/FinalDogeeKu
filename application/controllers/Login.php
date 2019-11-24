<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
      parent:: __construct();
        $this->load->model('M_Login');
    }  

    public function login(){
      if($this->session->userdata('status') != "login"){
          $this->load->view('V_Login');
      }
      else{
          $this->load->view('VP_KonfirmasiLogin');
      }
     
    }

    public function coba_login(){
      $tangkap_email = $this->input->post('email');
      $tangkap_password = $this->input->post('password');

      $where = array(
        'email' => $tangkap_email,
        'password' => md5($tangkap_password)
      );

      $cari_login = $this->M_Login->cek_login('pengguna',$where)->num_rows();

      if($cari_login>0){
        $dataPengguna = $this->M_Login->cek_login('pengguna',$where)->row_array();
        $id_pengguna = $dataPengguna['id_pengguna'];
        $nama_lengkap = $dataPengguna['nama_lengkap'];
        $id_tipe_pengguna = $dataPengguna['id_tipe_pengguna'];

         $data_session = array(
            'email' => $tangkap_email,
            'id_pengguna' => $id_pengguna,
            'id_tipe_pengguna' => $id_tipe_pengguna,
            'nama' => $nama_lengkap,
            'status' => "login"
          );


        $this->session->set_userdata($data_session);

        if($id_tipe_pengguna == "1"){
          redirect('HomeAdmin');
        }
        else if($id_tipe_pengguna == "2"){
          redirect('HomeAdmin');
        }
        else if($id_tipe_pengguna == "3"){
          redirect('HomeKasir');
        }
        else if($id_tipe_pengguna == "4" || $id_tipe_pengguna == "5" || $id_tipe_pengguna == "6"){
          redirect('HomePekerjaLayanan');
        }
        else if($id_tipe_pengguna == "7"){
          $anjing_pengguna=$this->M_Login->get_dataAnjing($id_pengguna)->result();

        /*
          $data_session['anjing1'] = array(
            'anjing1' => "lauren"
          );
  
          $_SESSION['anjing'] = "lauren";
          $this->session->set_userdata($data_session['anjing1']);
        */

          $data['status_announce'] = "1";
          $this->load->view('VP_Announce',$data);
        }

      }

      else{
        $data['status_announce'] = "2";
        $this->load->view('VP_Announce',$data);
      }
    }

    public function account(){
      if($this->session->userdata('status') != "login"){
        $this->load->view('VP_KonfirmasiAccount');
      }

      else{
        $this->load->view('VP_Account');
      }
     
    }

    public function ganti_password(){
      $email = $this->session->userdata('email');

      $where = array(
        'email' => $email
      );

      $data['pengguna']=$this->M_Login->cek_login('pengguna', $where)->result();
      $this->load->view('VP_GantiPassword',$data);
    }

    public function coba_gantiPassword(){
      $tangkap_email = $this->session->userdata('email');
      $tangkap_idPengguna = $this->input->post('id_pengguna');
      $password_lama = $this->input->post('password_lama');
      $password_baru = $this->input->post('password_baru');
      $konfirmasi_password = $this->input->post('konfirmasi_password');
      date_default_timezone_set("Asia/Jakarta");
      $waktu_edit = date("Y-m-d H:i:s");

      $where = array(
        'email' => $tangkap_email
      );

      $dataPass['pass']=$this->M_Login->cek_password($where)->result();

      foreach($dataPass['pass'] as $list){
        if($list->password != $password_lama){
          $data['status_announce'] = "3";
          $this->load->view('VP_Announce',$data);
        }
  
        else{

          if($password_baru == $konfirmasi_password){
            $edit_data = array(
              'password' => $password_baru,
              'user_edit' => $tangkap_idPengguna,
              'waktu_edit' => $waktu_edit
            );
            
            $this->M_Login->edit_password($where,'pengguna',$edit_data);

            $data['status_announce'] = "4";
            $this->load->view('VP_Announce',$data);
          }

          else{
            $data['status_announce'] = "5";
            $this->load->view('VP_Announce',$data);
          }
        }

      }
    }

    public function logout(){
      $this->load->view('V_Logout');
    }

    public function coba_logout(){
      $this->session->sess_destroy();
	    redirect('PHome');
    }

    public function edit_profile(){
      $tangkap_email = $this->session->userdata('email');

      $where = array (
        'email' => $tangkap_email
      );

      $dataEditProfile['pengguna'] = $this->M_Login->cek_login('pengguna',$where)->result();
      $this->load->view('VP_EditProfile', $dataEditProfile);
    }

    public function coba_editProfile(){
      
      $email_asli = $this->input->post('email_asli');
      $email_ubah = $this->input->post('email_ubah');

      if($email_asli != $email_ubah){
        $where_email = array(
          'email' => $email_ubah
        );

        $cek_email = $this->M_Login->cek_email('pengguna', $where_email)->num_rows();
        if($cek_email > 0){
          $data['status_announce'] = "9";
          $this->load->view('VP_Announce',$data);
        }
        else{
          $email= $email_ubah;
        }
      }

      else{
        $email = $email_asli;
      }

      $id_pengguna = $this->input->post('id_pengguna');
      $nama_lengkap = $this->input->post('nama_lengkap');
      $tanggal_lahir = $this->input->post('tanggal_lahir');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $no_hp = $this->input->post('no_hp');
      date_default_timezone_set("Asia/Jakarta");
      $waktu_edit = date("Y-m-d H:i:s");
      $user_edit = $id_pengguna;
    

      $where = array (
        'id_pengguna' => $id_pengguna
      );

      $data = array (
        'email' => $email,
        'nama_lengkap' => $nama_lengkap,
        'tanggal_lahir' => $tanggal_lahir,
        'jenis_kelamin' => $jenis_kelamin,
        'no_hp' => $no_hp,
        'waktu_edit' => $waktu_edit,
        'user_edit' => $user_edit
      );

      $this->M_Login->edit_dataPengguna($where,'pengguna',$data);
      redirect('PShop');
    }

    public function registrasi(){
      $this->load->view('V_Registrasi');
    }

    public function coba_registrasi(){
      $tangkap_email = $this->input->post('email');
      $tangkap_namaLengkap = $this->input->post('nama_lengkap');
      $tangkap_tanggalLahir = $this->input->post('tanggal_lahir');
      $tangkap_noHp = $this->input->post('no_hp');
      $tangkap_jenisKelamin = $this->input->post('jenis_kelamin');
      $tangkap_password = $this->input->post('password');
      $tangkap_konfirmasiPassword = $this->input->post('konfirmasi_password');

      date_default_timezone_set("Asia/Jakarta");
      $waktu_add = date("Y-m-d H:i:s");
      $tanggal_registrasi = date("Y-m-d");

      $where_email = array (
        'email' => $tangkap_email
      );

      $cari_emailPengguna = $this->M_Login->cek_email('pengguna',$where_email)->num_rows();
      if($cari_emailPengguna > 0){
              $data['status_announce'] = "7";
              $this->load->view('VP_Announce',$data);
      }

      else{
            if($tangkap_password != $tangkap_konfirmasiPassword){
                  $data['status_announce'] = "6";
                  $this->load->view('VP_Announce',$data);
            }

            else{
                  $passwordEn = md5($tangkap_password);

                  $data_registrasiPengguna = array(
                    'email' => $tangkap_email,
                    'nama_lengkap' => $tangkap_namaLengkap,
                    'tanggal_lahir' => $tangkap_tanggalLahir,
                    'no_hp' => $tangkap_noHp,
                    'jenis_kelamin' =>$tangkap_jenisKelamin,
                    'password' =>$passwordEn,
                    'waktu_add' => $waktu_add,
                    'id_tipe_pengguna' => '7',
                    'status_delete' => "Aktif"
                  );

                  $this->M_Login->tambahRecordPengguna('pengguna',$data_registrasiPengguna);

                  $id_pengguna['idPengguna'] = $this->M_Login->cek_email('pengguna',$where_email)->result();

                  foreach($id_pengguna['idPengguna'] as $list){
                    $id_pengguna = intval($list->id_pengguna);
                  }

                  $data_registrasiPelanggan = array(
                    'id_pengguna' => $id_pengguna,
                    'tanggal_registrasi' => $tanggal_registrasi,
                    'user_add' => $id_pengguna,
                    'waktu_add' => $waktu_add,
                    'status_delete' => "Aktif"
                  );

                  $this->M_Login->tambahRecordPelanggan('pelanggan',$data_registrasiPelanggan);

                  $data['status_announce'] = "8";
                  $this->load->view('VP_Announce',$data);
            }

      }

  
      
      



    }

}
?>