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
        .button_kategoriLainnya{
            background-color:#5A3921;
            color: #FEFFE4;
            font-weight:bold;
            padding: 1% 1% 1% 1%;
            border-radius:50px;
            float:right;
            margin-right:10%;
        }

        .button_kategoriLainnya:hover{
            background-color:#F77754;
            color: #5A3921;
        }

        .table_kategoriBarang{
            width:90%;
            height:200px;
            border: 5px solid #5A3921;
            border-radius: 50px;
            margin:auto;

        }

        .tr_kategoriBarang{
            width:30%;
            height:100%;
            
        }

        .S_KategoriBarangButton{
            width:30%;
            height:30%;
            text-align:center;            

        }

        .S_KategoriBarangGambar{
            width:30%;
            height:30%;
            text-align:center;    
        }

        .gambar_kategoriGambar{
            width:60%;
        }

        .S_ButtonKategoriBarang{
            background-color:#5A3921;
            color: #FEFFE4;
            font-weight:bold;
            padding: 2% 2% 2% 2%;
            border-radius:50px;
        }

        .S_ButtonKategoriBarang:hover{
         
         background-color:#F77754;
         color: #5A3921;
        }

        .shop{
            margin-top:10%;
            color:#5A3921;
            font-size:200%;
        }

        body{
            background-color: #FEFFE4; 
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
                <div class="shop">
                    Kategori Barang
                    <a><button class="button_kategoriLainnya">Kategori Lainnya ></button></a>
                </div>
                <div>
                    <table class="table_kategoriBarang">
                            <tr class="tr_kategoriBarang">
                                <td  class="S_KategoriBarangGambar"><img class="gambar_kategoriGambar" src="<?php echo base_url()?>assets/img/avatar.png"></td>
                                <td  class="S_KategoriBarangGambar"><img class="gambar_kategoriGambar" src="<?php echo base_url()?>assets/img/avatar.png"></td>
                                <td  class="S_KategoriBarangGambar"><img class="gambar_kategoriGambar" src="<?php echo base_url()?>assets/img/avatar.png"></td>
                            </tr>
                            <tr class="tr_kategoriBarang">
                                <td  class="S_KategoriBarangButton">
                                    <a><button class="S_ButtonKategoriBarang">Kesehatan</button></a>
                                </td>
                                <td  class="S_KategoriBarangButton">
                                    <a><button class="S_ButtonKategoriBarang">Peralatan Mandi</button></a>
                                </td>
                                <td  class="S_KategoriBarangButton">
                                    <a><button class="S_ButtonKategoriBarang">Makanan</button></a>
                                </td>
                            </tr>
                    </table>
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