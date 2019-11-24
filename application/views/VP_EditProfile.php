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
            }

            .logout_kanan p, .logout_kanan h3 {
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
                height:100%;
                padding: 1.5% 1.5% 1.5% 1.5%;
                margin-top:5%;
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

            .edit_dataPelanggan{
                width:100%;
                margin-left:10%;
            }

            .dataPelanggan_right{
                width:80%;
            }
            
            .dataPelanggan_left{
                width:30%;
                color:#FEFFE4;
            }

            input, select{
                width:70%;
                background:transparent;
                border: 2px solid #F77754;
                border-radius: 50px;
                padding: 1% 1% 1% 1%;
                color:#FEFFE4;
            }

           option{
                color: #5A3921;
                background-color: #F77754;
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
                <form method="POST" action="<?php echo base_url().'Login/coba_editProfile'?>">
                    <?php foreach($pengguna as $list){?>
                    <h1 class="tulisan_logout">EDIT PROFILE</h1>
                                <table class="edit_dataPelanggan">
                                    <tr>
                                        <td class="dataPelanggan_left">Email</td>
                                        <td class="dataPelanggan_right">
                                            <input type="hidden" name="email_asli"
                                            value="<?php echo $list->email; ?>"
                                            > 
                                            <input type="text" name="email_ubah"
                                            value="<?php echo $list->email; ?>"
                                            > 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="dataPelanggan_left">Tanggal Lahir</td>
                                        <td class="dataPelanggan_right">
                                            <input id="datepicker" name="tanggal_lahir" type="date" 
											value="<?php echo $list->tanggal_lahir; ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="dataPelanggan_left">Jenis Kelamin</td>
                                        <td class="dataPelanggan_right">
                                            <select name="jenis_kelamin">
											    <option value="L" <?php if($list->jenis_kelamin == "L"){
													echo "selected"; } ?>>Laki-Laki</option>
												<option value="P" <?php if($list->jenis_kelamin == "P"){
													echo "selected"; } ?>>Perempuan</option>
											</select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="dataPelanggan_left">No Hp</td>
                                        <td class="dataPelanggan_right">
                                            <input type="text" name="no_hp"
                                            value="<?php echo $list->no_hp; ?>"
                                            > 
                                        </td>
                                    </tr>
                                </table>
                        <p><button class="logout_logout" type="submit">SAVE</button></p>
                        <?php } ?>
                </form>
            </div>
        </div>

    </body>
</html>
