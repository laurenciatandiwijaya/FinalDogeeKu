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

                body{
                    background-color: #FEFFE4; 
                }

                .shop{
                    margin-top:10%;
                }

                .judul{
                        font-size:200%;
                        margin-left:5%;
                        color:  #5A3921;
                        font-weight:bold;
                    }

                .kategori{
                    width:8%;
                    height:8%;
                    display: inline-block;
                    margin-right:6%;
                    margin-top:5%;
                }
                
                .kategori a button{
                    background-color: #FEFFE4; 
                    border: 5px solid #5A3921;
                    padding:10%;
                    border-radius:50px;
                }

                .kategori a button:hover{
                    background-color:  #F77754; 
                    cursor:pointer;
                }
 

                #kategori1, #kategori3, #kategori5, #kategori7{
                    margin-left:10%;
                }

                #kategori2, #kategori4, #kategori6{
                    margin-left:15%;
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
                            <form method="POST" action="<?php echo base_url().'PShop/lihat_kategoriBarang'?>">
                                <input type="hidden" name="pilih_kategori" id="pilih_kategori"  style="margin-left:100px;">
                           
                                <div class="kategori_barang">
                                    <div class="kategori" id="kategori1">
                                        <a class="cobadeh" value="fashion"><button> <img src="<?php echo base_url()?>assets/img/dog_fashion.png"></img></button></a>
                                        Fashion
                                    </div>

                                    <div  class="kategori" id="kategori3">
                                        <a class="cobadeh"  value="kecantikan"><button><img src="<?php echo base_url()?>assets/img/dog_kecantikan.png"></img></button></a>
                                        Kecantikan
                                    </div>
                                
                                    <div  class="kategori" id="kategori5">
                                        <a  class="cobadeh" value="kesehatan"><button><img src="<?php echo base_url()?>assets/img/dog_kesehatan.png"></img></button></a>
                                        Kesehatan
                                    </div>
                                
                                    <div  class="kategori" id="kategori7">
                                        <a class="cobadeh" value="obat"><button ><img src="<?php echo base_url()?>assets/img/dog_obat.png"></img></button></a>
                                        Obat
                                    </div>
                                </div>
                                <div class="kategori_barang">
                                    <div  class="kategori" id="kategori2">
                                        <a class="cobadeh" value="makanan"><button><img src="<?php echo base_url()?>assets/img/dog_food.png"></img></button></a>
                                        Food
                                    </div>
                                    <div  class="kategori" id="kategori4">
                                        <a class="cobadeh" value="mainan"><button><img src="<?php echo base_url()?>assets/img/dog_mainan.png"></img></button></a>
                                        Mainan
                                    </div>
                                    <div  class="kategori" id="kategori6">
                                        <a class="cobadeh" value="aksesoris"><button><img src="<?php echo base_url()?>assets/img/dog_aksesoris.png"></img></button></a>
                                        Aksesoris
                                    </div>
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
    jQuery(function(){
        jQuery('.cobadeh').click(function(){
            jQuery('#pilih_kategori').val($(this).attr('value'));
        });
    });

</script>
</body>
</html>