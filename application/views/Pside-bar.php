<head>
    <style>
      .menu{
        color:   #FEFFE4;
        background-color: #5A3921; 
      }

      .gambar_user{
        width:50%;
        height:20%;
      }

      .nama_user{
        width: 50%;
        font-size:200%;
        color: #FEFFE4;
      }

      .button_register, .button_login{
        background-color:#F77754;
        border-radius:50px;
        color:black;
        padding: 5% 5% 5% 5%;
        width:100%;
      }

      .button_register:hover, .button_login:hover{
        background-color:#FEFFE4;
        font-weight:bold;
      }

      .sideBar_button{
        color:#FEFFE4;
        background-color: #5A3921;
        width:100%;
        height:50px;
        border: 1px solid #F77754;
      }

      .sideBar_button:hover{
          background-color: #FEFFE4;
          color:black;
          border: 0px;
      }

      .sideBar_judul{
        color: #FEFFE4;
      }
    </style>
</head>

<div class="menu">
	<!-- Navigation -->
	<div class="menu_nav">
  <div>
                <table>
                  <tr>
                    <td><img src="<?php echo base_url()?>assets/img/avatar.png" class="gambar_user"></td>
                    <td class="nama_user">
                      Hi,
                      <?php if($this->session->userdata('status') != "login"){ ?>
                          Admin DogeeKu
                      <?php }  else{ echo $this->session->userdata('nama'); }?>
                    </td>
                  </tr>
                  <tr>
                    <td> <a href="<?php echo base_url()?>Login/registrasi"><button class="button_register">Register</button></a></td>
                    <td> <a href="<?php echo base_url()?>Login/login"><button  class="button_login">Login</button></a></td>
                  </tr>
                </table>
            </div>
          
            <div>
              <div>
                  <p class="sideBar_judul">DogeeKu Shop</p>
                <div>
                  <a  href="<?php echo base_url()?>PInvoice/pemesanan"> 
                    <button class="sideBar_button">Pemesanan</button>
                  </a>
                </div>
              </div >
              <div>
                  <p class="sideBar_judul">DogeeKu Planner</p>
                  <div>
                    <a href="<?php echo base_url()?>PPlanner">
                        <button class="sideBar_button">Planner</button>
                    </a>
                  </div>
              </div>

              <div>
                  <p class="sideBar_judul">Anjing</p>
                <div>
                  <a  href="<?php echo base_url()?>PAnjing/data_anjing">
                      <button class="sideBar_button">AnjingKu</button>
                  </a>
                </div>
                <div>
                <a  href="<?php echo base_url()?>PReservasi/data_reservasi">
                  <button class="sideBar_button">History Reservasi</button>
                </a>
                </div>
              </div>

            </div>
	</div>
</div>