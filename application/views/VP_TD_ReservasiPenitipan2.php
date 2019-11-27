<!DOCTYPE html>
<html lang="en">
<head>
<title>Coba DogeeKu</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Little Closet template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="<?php echo base_url()?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/styles/responsive.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
        ntegrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> 
        <style>
            body{
                background-color: #FEFFE4;
                color: #5A3921;
            }

            #form_tambahReservasi{
               padding-top:10%; 
               text-align:center;
            }


            #table_tambahReservasi{
                width:80%;
                background-color:#5A3921;
                color:#FEFFE4;
                border-radius:50px;
                padding: 10% 10% 10% 10%;
                margin-left:10%;
                margin-top:-150px;
            }

            .button_ok{
                
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                margin:auto;
                padding: 1.5% 1.5% 1.5% 1.5%;
                margin-top:5%;
                border: 2px solid black;
            }

            .button_ok:hover{
                background-color:#FEFFE4;
                color: black;
                font-weight:bold;

            }

            #button_submit{
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                margin:auto;
                padding: 1.5% 1.5% 1.5% 1.5%;
                margin-top:5%;

            }

            #button_submit:hover{
                background-color:#FEFFE4;
                color: black;
                font-weight:bold;

            }



            .div_paket{
                background-color:  #F77754;
                color: #5A3921;
                border-radius:50px;
                width:45%;
                float:left;
                margin: 2% 2% 2% 2%; 
                padding: 1% 1% 1% 1%; 
            }

    
    </style>
</head>
<body>

<!-- Menu -->

<?php include('Pside-bar.php')?>

<div class="super_container">

	<!-- Header -->
		<?php include('Ptop-bar.php')?>

	<div class="super_container_inner">
        <div class="super_overlay"></div>
        <div id="form_tambahReservasi">
                    <h3 id="title">Pilih Layanan untuk  <?php echo $nama_anjing;?></h3>
                        <?php 
                            $counter = 1;
                            foreach($detail_layanan as $list) {
                        ?>
                            <div class="div_paket" id="div_paket<?php echo $list->id_detail_layanan;?>">
                                <p>Nama Layanan:<?php echo $list->nama_detail_layanan?></p>
                                <p>Deskripsi Layanan:<?php echo $list->deskripsi_layanan?></p>
                                <p>Harga Layanan:<?php echo $list->harga?></p>
                                <button  type="button" class="cobadeh button_ok" value="<?php echo $list->id_detail_layanan;?>">+/-</button>
                                <input type="hidden" id="cek<?php echo $list->id_detail_layanan;?>" value="1">
                            </div>  
                            <form method="POST">
                                <input type="hidden" id="layanan<?php echo $list->id_detail_layanan;?>" name="layanan<?php echo $list->id_detail_layanan;?>">
                        <?php 
                        $counter++;
                        } ?>        
                        <button type="submit" id="button_submit" onclick="javascript:form.action='<?php echo base_url().'PReservasi/coba_reservasiPenitipan2'?>'">submit</button>
                        <div>
                            <input type="hidden" name="id_pekerja" value="<?php echo $id_pekerja;?>">
                            <input type="hidden" name="nama_pekerja" value="<?php echo $nama_lengkap;?>">
                            <input type="hidden" name="id_anjing" value="<?php echo $id_anjing;?>">
                            <input type="hidden" name="nama_anjing" value="<?php echo $nama_anjing;?>">
                            <input type="hidden" name="tanggal" value="<?php echo $tanggal;?>">
                            <input type="hidden" name="jam" value="<?php echo $jam;?>">
                            <input type="hidden" name="keterangan" value="<?php echo $keterangan;?>">
                        </div>
                    </form>
            </div>
    </div>
</div>

<script src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/styles/bootstrap-4.1.2/popper.js"></script>
<script src="<?php echo base_url()?>assets/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url()?>assets/plugins/easing/easing.js"></script>
<script src="<?php echo base_url()?>assets/plugins/progressbar/progressbar.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?php echo base_url()?>assets/js/custom.js"></script>

<script>
    $('.cobadeh').click(function(){
        if($(('#layanan')+$(this).attr('value')).val() == $(this).attr('value')){
            $(('#layanan')+$(this).attr('value')).val(" ");
        }
        else{
            $(('#layanan')+$(this).attr('value')).val($(this).attr('value'));
        }
   });
</script>
<script>
        $('.cobadeh').click(function(){
            if($(('#cek')+$(this).attr('value')).val().length %2 == 0){
                $('#div_paket'+$(this).attr('value')).css('background-color', '#F77754');
                $('#div_paket'+$(this).attr('value')).css('color', ' #5A3921');
                $num = $(('#cek')+$(this).attr('value')).val();
                $(('#cek')+$(this).attr('value')).val($num+1);
            }
            else{
                $('#div_paket'+$(this).attr('value')).css('background-color', '#5A3921');
                $('#div_paket'+$(this).attr('value')).css('color', '#FEFFE4');
                $num = $(('#cek')+$(this).attr('value')).val();
                $(('#cek')+$(this).attr('value')).val($num+1);
            }     
        });
</script>

</body>
</html>