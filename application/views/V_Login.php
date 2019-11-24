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

            .login_back{
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                width:10%;
                height:100%;
                padding: 0.5% 0.5% 0.5% 0.5%;
                left:0px;
            }

            .login_back:hover{
                background-color:#5A3921;
                color: #FEFFE4;
                font-weight:bold;
            }

            .login_kiri{
                display:inline-block;
                width:49%;
                background-color: #FEFFE4;
                text-align:center;
                
            }

            .logo_dogeeKu{
                width:50%;
                height:50%;
            
            }

            .login_kanan{
                display:inline-block;
                width:50%;
                height:570px;
                background-color:#5A3921;
                margin-top:-40px;
                margin-right:-100px;
            }

            .login_kanan p {
                text-align:center;
            }

            .tulisan_login{
                color:#F77754;
                text-align:center;
                margin-top: 10%;
                font-size:400%;
            }

            .email_login , .password_login{
                background:transparent;
                color:#FEFFE4;
                border: 2px solid #F77754;
                width: 50%;
                height:45px;
                border-radius:50px;
                text-align:center;
                margin-top:5%;
            }

            .password_login{
                background:transparent;
                color:#FEFFE4;
                border: 2px solid #F77754;
                width: 50%;
                height:45px;
                border-radius:50px;
                text-align:center;
            }

            .login_login{
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                width:20%;
                height:100%;
                padding: 1.5% 1.5% 1.5% 1.5%;
                margin-top:5%;
            }

            .login_login:hover{
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
        <a href="<?php echo base_url()?>PHome"><button class="login_back">BACK</button></a>

        <div class="main" id="main">
            <div class="login_kiri">
                <img src="<?php echo base_url()?>assets/img/logo_DogeeKu.png" class="logo_dogeeKu">
                <p class="tulisan_dogeeKu">DogeeKu</p>
                <p class="warna_clinic">clinic.<span class="warna_salon">salon.</span><span class="warna_penitipan">dog care.</span><span class="warna_shop">shop.</span>
                </p>
            </div>

            <div class="login_kanan">
                <form method="POST" action="<?php echo base_url().'Login/coba_login'?>">
                    <h1 class="tulisan_login">LOGIN</h1>
                    <p><input type="text" placeholder="Email" class="email_login" name="email"></p>
                    <p><input type="password" placeholder="Password" class="password_login" name="password"></p>
                    <p><button class="login_login" type="submit">LOGIN  NOW</button></p>
                </form>
            </div>
        </div>

    </body>
</html>
