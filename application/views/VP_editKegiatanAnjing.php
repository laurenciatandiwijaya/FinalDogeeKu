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
                color: #FEFFE4;
            }

            .register_back{
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                width:10%;
                height:100%;
                padding: 0.5% 0.5% 0.5% 0.5%;
                left:0px;
            }

            .register_back:hover{
                background-color:#5A3921;
                color: #FEFFE4;
                font-weight:bold;
            }

            .register_kiri{
                display:inline-block;
                width:49%;
                background-color: #FEFFE4;
                text-align:center;
                
            }

            .logo_dogeeKu{
                width:50%;
                height:50%;
            
            }

            .register_kanan{
                display:inline-block;
                width:50%;
                height:570px;
                background-color:#5A3921;
                margin-top:-40px;
                margin-right:-100px;
            }

            .register_kanan p {
                text-align:center;
            }

            .tulisan_register{
                color:#F77754;
                text-align:center;
                margin-top: 5%;
                font-size:350%;
            }

            .input_register , .password_register{
                background:transparent;
                color:#FEFFE4;
                border: 2px solid #F77754;
                width: 50%;
                height:30px;
                border-radius:50px;
                text-align:center;
            
            }

            .password_register{
                background:transparent;
                color:#FEFFE4;
                border: 2px solid #F77754;
                width: 50%;
                height:30px;
                border-radius:50px;
                text-align:center;
            }

            .register_register{
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                width:20%;
                height:100%;
                padding: 1.5% 1.5% 1.5% 1.5%;
                margin-top:2%;
            }

            .register_register:hover{
                background-color:#FEFFE4;
                color: black;
                font-weight:bold;

            }

            .button_cobaDelete{
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                width:20%;
                height:7%;
                padding: 1.5% 1.5% 1.5% 1.5%;
                margin-top:2%;
            }

            .button_cobaDelete:hover{
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

            input, select{
                width:50%;
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
        <a href="<?php echo base_url()?>PPlanner"><button class="register_back">BACK</button></a>

        <div class="main" id="main">
            <div class="register_kiri">
                <img src="<?php echo base_url()?>assets/img/logo_DogeeKu.png" class="logo_dogeeKu">
                <p class="tulisan_dogeeKu">DogeeKu</p>
                <p class="warna_clinic">clinic.<span class="warna_salon">salon.</span><span class="warna_penitipan">dog care.</span><span class="warna_shop">shop.</span>
                </p>
                <br><br><br><br><br>
            </div>

            <div class="register_kanan">
                <h1 class="tulisan_register">REGISTRATION</h1>
                
                <form method="POST" action="<?php echo base_url().'PPlanner/coba_editKegiatanAnjing'?>">
                    <p>Nama Anjing
                        <?php foreach($data_anjingPilihan as $dataKeg){?>
                            <input type="hidden" name="id_kegiatan" value="<?php echo $dataKeg->id_kegiatan;?>">
                            <select name="nama_anjing">
                                <?php foreach($data_anjing as $list){ ?>
                                    <option value="<?php echo $list->id_anjing;?>"
                                <?php
                                    if($list->nama_anjing == $dataKeg->nama_anjing)
                                        {echo "selected";}
                                ?>>

                                <?php echo $list->nama_anjing; ?>
                                </option>
                                <?php }?>
                            </select>
                    </p>
                    <p>Nama Kegiatan
                        <input type="text" name="nama_kegiatan" required value="<?php echo $dataKeg->nama_kegiatan;?>">
                    </p>

                    <p>Color
                        <select name="color" class="form-control">
                            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                            <option style="color:#008000;" value="#008000">&#9724; Green</option>                       
                            <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                            <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                            <option style="color:#000;" value="#000">&#9724; Black</option>
                        </select>
                    </p>

                    <p>Start Date
                        <input id="datepicker" name="start_date" type="date" required value="<?php echo $dataKeg->start_date;?>">
                    </p>

                    <p>End Date
                        <input id="datepicker" name="end_date" type="date" required value="<?php echo $dataKeg->end_date;?>">
                    </p>
                    <button type="submit" class="register_register">OK</button>
                </form>
                <a href=" <?php echo base_url().'PPlanner/coba_delete/'.$dataKeg->id_kegiatan;?>"><button class="button_cobaDelete">Delete</button></a>
                <?php } ?>
            </div>
        </div>

    </body>
</html>
