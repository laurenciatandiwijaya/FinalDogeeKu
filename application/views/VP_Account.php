<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/style.css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
        ntegrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> 
    
        <style>
                ::placeholder{
                color: #FEFFE4;
                opacity: 100%;
            }

            body{
                background-color:#FEFFE4;
            }

            .logout_back{
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                width:10%;
                height:100%;
                padding: 0.5% 0.5% 0.5% 0.5%;
                left:0px;
            }

            .logout_back:hover{
                background-color:#5A3921;
                color: #FEFFE4;
                font-weight:bold;
            }

            .logout_kiri{
                display:inline-block;
                width:49%;
                background-color: #FEFFE4;
                text-align:center;
                
            }

            .logo_dogeeKu{
                width:50%;
                height:50%;
            
            }

            .logout_kanan{
                display:inline-block;
                width:50%;
                height:570px;
                background-color:#5A3921;
                margin-top:-40px;
                margin-right:-100px;
                text-align:center;
            }

            .logout_kanan a, .logout_kanan h3 {
                text-align:center;
            }

            .logout_kanan h3 {
                color: #FEFFE4;
            }

            .tulisan_logout{
                color:#F77754;
                text-align:center;
                margin-top: 10%;
                font-size:400%;
                margin-bottom:20%;
            }

            .logout_logout{
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                width:20%;
                padding: 1.5% 1.5% 1.5% 1.5%;
                margin-top:5%;
                margin-right:5%;
            }

            .logout_logout:hover{
                background-color:#FEFFE4;
                color: black;
                font-weight:bold;

            }

            .tulisan_dogeeKu{
                color:#5A3921;
                font-size:350%;
                font-weight:bold;
                margin-top:-5%;
            }

            .warna_clinic{
                margin-top:-9%;
                font-size:150%;
                color: #FFCB5A;
            }

            .warna_salon{
                color:#F77754;
            }

            .warna_penitipan{
                color:#95CEB3;
            }

            .warna_shop{
                color:#5A3921;
            }
       
        
        </style>
    
    </head>


    <body>
        <a href="<?php echo base_url()?>PHome"><button class="logout_back">BACK</button></a>

        <div class="main" id="main">
            <div class="logout_kiri">
                <img src="<?php echo base_url()?>assets/img/logo_DogeeKu.png" class="logo_dogeeKu">
                <p class="tulisan_dogeeKu">DogeeKu</p>
                <p class="warna_clinic">clinic.<span class="warna_salon">salon.</span><span class="warna_penitipan">dog care.</span><span class="warna_shop">shop.</span>
                </p>
            </div>

            <div class="logout_kanan">
                    <h1 class="tulisan_logout">Account</h1>
                    <h3>Hi, <?php echo $this->session->userdata("nama"); ?> !</h3>
                    <a href="<?php echo base_url()?>Login/edit_profile"><button class="logout_logout" type="submit">Edit Profile</button></a>
                    <a href="<?php echo base_url()?>Login/ganti_password"><button class="logout_logout" type="submit">Ganti Password</button></a>
                    <a href="<?php echo base_url()?>Login/logout"><button class="logout_logout" type="submit"> Logout</button></a>
            
            </div>
        </div>

    </body>
</html>
