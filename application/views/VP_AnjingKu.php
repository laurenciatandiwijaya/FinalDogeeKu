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
    .anjingKu{
        padding-top:10%;
    }

    .div_anjing{
        background-color:  #F77754;
        color: #5A3921;
        width: 45%;
        margin-bottom:5%;
        margin-left:2.5%;
        border-radius:50px;
        padding: 2% 2% 2% 2%;
        float:left;
    }

    .nama{
        font-size:180%;
    }

    .button_edit_reservasi{
        background-color:#5A3921;
        color:#FEFFE4 ;
        border-radius:50px;
        text-align:center;
        width:25%;
        height:80%;
        padding: 0.5% 0.5% 0.5% 0.5%;
        margin-top:2%;
        font-weight:bold;
    }

    .button_edit_reservasi:hover{
        background-color:#F77754;
        color:#5A3921;
        font-weight:bold;
    }

    .button_tambahAnjing{
        background-color:#5A3921;
        color:#FEFFE4 ;
        border-radius:50px;
        text-align:center;
        margin:2% 0% 2% 85%;
        height:80%;
        padding: 1% 1% 1% 1%;
        font-weight:bold;
    }

    .button_tambahAnjing:hover{
        background-color:#F77754;
        color:#5A3921;
        font-weight:bold;
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
            <div class="anjingKu">
                <a href="<?php echo base_url().'PAnjing/tambah_anjing'?>">
                    <button class="button_tambahAnjing">+AnjingKu</button>
                </a>
                <?php foreach($anjingku as $a){?>
                    <form method="POST">
                        <div class="div_anjing">
                            <p class="nama"><?php echo $a->nama_anjing;?></p>
                            <input type="hidden" name="id_anjing" value="<?php echo $a->id_anjing;?>">
                            <table>
                                <tr>
                                    <td width="60%" rowspan="5">Gambar ini</td>
                                    <td width="40%"><?php echo $a->nama_jenis_anjing;?></td>
                                </tr>
                                <tr>
                                    <td width="40%">
                                        <?php 
                                            if($a->jenis_kelamin == "p"){
                                                echo "Perempuan";
                                            }
                                            else{
                                                echo "Laki-laki";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">Berat: <?php echo $a->berat_badan;?></td>
                                </tr>
                                <tr>
                                    <td width="40%">Tinggi: <?php echo $a->tinggi;?></td>
                                </tr>
                                <tr>
                                    <td width="40%">Tanggal Lahir: <?php echo $a->tanggal_lahir;?></td>
                                </tr>
                            </table>

                            <button type="submit" class="button_edit_reservasi" onclick="javascript:form.action='<?php echo base_url().'PAnjing/edit_delete'?>'">
                                Edit/Delete
                            </button>
                            <button type="submit" class="button_edit_reservasi" onclick="javascript:form.action='<?php echo base_url().'PReservasi'?>'">
                                Buat Reservasi
                            </button>
                        </div>
                    </form>
                <?php } ?>
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
</body>
</html>