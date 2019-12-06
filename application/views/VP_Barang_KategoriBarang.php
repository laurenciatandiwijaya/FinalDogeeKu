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
                #S1{
                    width:100%;
                    height:100vh;
                }

                .button_kategoriLainnya{
                    background-color:#5A3921;
                    color: #FEFFE4;
                    font-weight:bold;
                    padding: 1% 1% 1% 1%;
                    border-radius:50px;
                    float:right;
                    margin-right:10%;
                    font-size:50%;
                }

                .button_kategoriLainnya:hover{
                    background-color:#F77754;
                    color: #5A3921;
                }

                .flip-card {
            background-color: transparent;
            width: 20%;
            height: 50%;
            perspective: 1000px;
            display: inline-block;
            margin: 2% 2% 2% 2%;
            }

            .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            }

            .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
            }

            .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            }

            .flip-card-front {
            background-color: #bbb;
            color: black;
            }

            .flip-card-back {
            background-color:#5A3921;
            color:#FEFFE4;
            transform: rotateY(180deg);
            padding-top:20%;
            }

            .shop{
                margin-top:10%;
            }
            .nama_produk{
                color:#FEFFE4;
                font-size:200%; 
                width: 100%;
                height:30%;
            }

            .nama_kategori{
                color:#FEFFE4;
                font-size:150%; 
                width: 100%;
                height:20%;
                padding-top:5%;
            }

            .harga_produk{
                color:#FEFFE4;
                font-size:150%; 
                width: 100%;
                height:30%;
            }

            .judul{
                        font-size:200%;
                        margin-left:5%;
                        color:  #5A3921;
                        font-weight:bold;
                    }
            
            #announce{
                width:60%;
                background-color:#5A3921;
                color: #FEFFE4;
                margin:auto;
                font-size:150%;
                border-radius:50px;
                text-align: center;
                padding: 5% 5% 5% 5%;
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
                <div class="shop" id="S1">
                        <div class="judul">
                            Kategori Barang
                        </div>
                <?php 
                     if($kategori_barang == null ){
                        echo "<p id='announce'>Maaf Barang Untuk Kategori 
                        ini telah terjual semuanya.</p>";
                    }
                    foreach($kategori_barang as $list){?>

                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                            <img src="<?php echo base_url().$list->foto;?>" alt="" class="gambar_barang">
                            </div>
                            <div class="flip-card-back">
                                <div class="nama_produk"><a href="<?php echo base_url().'PShop/detail_barang/'.$list->id_barang;?> "><?php echo $list->nama_barang;?></a></div>
                                <div class="nama_kategori"><?php echo $list->nama_kategori_barang;?></a></div>
                                <div class="harga_produk"><span>Rp.<?php echo $list->harga;?></span></div>
                            </div>
                        </div>
                    </div>
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

<script>
    jQuery(function(){
        jQuery('.cobadeh').click(function(){
            jQuery('#pilih_kategori').val($(this).attr('value'));
        });
    });

</script>
</body>
</html>