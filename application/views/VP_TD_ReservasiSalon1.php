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
                
            }

            #form_tambahReservasi{
               padding-top:20%; 
               text-align:center;
               height:100vh;
            }

            #title{
                visibility:hidden;
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

            input, select{
                width: 70%;
                height:40px;
                margin-top:10px;
                background:transparent;
                border: 1px solid  #F77754;
                color:#FEFFE4;
                border-radius: 50px;
            }

            option{
                color: #5A3921;
            }

            
            #button_ok{
                
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                margin:auto;
                padding: 1.5% 1.5% 1.5% 1.5%;
                margin-top:5%;
            }

            #button_ok:hover{
                background-color:#FEFFE4;
                color: black;
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
        <div id="form_tambahReservasi">
                    <h3 id="title">Buat Reservasi</h3>
                    <form method="POST" action="<?php echo base_url().'PReservasi/coba_reservasiSalon1'?>">
                        <table id="table_tambahReservasi">
                            <?php foreach($data_anjing as $list) {?>
                            <tr>
                                <td>Nama Anjing</td>
                                <td>
                                    <input type="hidden" name="id_anjing" value="<?php echo $list->id_anjing;?>" readonly>
                                    <input type="text" name="nama_anjing" value="<?php echo $list->nama_anjing;?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>
                                    <input  id="datepicker" name="tanggal" type="date" value="<?php date("Y-m-d"); ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Jam</td>
                                <td>
                                    <input id="timepicker" name="jam" type="time" value="08:00" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>
                                <textarea rows="4" cols="50" name="keterangan" required>
                                </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"> <button id="button_ok" type="submit">Buat Reservasi</button></td>
                            </tr>
                            <?php } ?>
                        </table>
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
</body>
</html>