<!DOCTYPE html>
<html lang="en">
<head>
<title>DogeeKu</title>
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/animate.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
        ntegrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> 
        <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
    <style>
            body{
                background-color:#FEFFE4; 
                height:100%;
            }

            p, td{
                color:#5A3921;
            }

            section{
                width: 100%;
                height:100vh;
            }

            .konten{
                        margin:auto;
                        text-align:center;
                    }

            .welcome{
                        color:  #5A3921;
                        text-align: center;
                        font-size:500%;
                        padding-top:10%;
                        margin:auto;
                    }

                    .desc{
                        color:  #5A3921;
                        width:80%;
                        text-align:center;
                        margin:auto;
                        font-size:200%;
                    }

            .judul{
                        font-size:200%;
                        margin-left:5%;
                        color:  #5A3921;
                        font-weight:bold;
                    }


                    .about{
                        width:60%;
                        background-color:#F77754;
                        border-radius:50px;
                        margin-left:20%;
                    }


                    .S1kiri{
                        width:60%;
                        color: #5A3921;
                    }

                    .S1kanan{
                        width:40%;
                    }

                    .foto_DogeeKu{
                        width: 100%;
                        height: 70%;
                    }

            /* S2 */

                .gambarLayanan{
                    width:55%;
                    height:40%;
                }

                .layanan, .shop{
                    width:100%;
                    text-align:center;
                }

                .button_layanan{
                    background-color:#5A3921;
                    color: #FEFFE4;
                    width: 50%;
                    height: 50%;
                    font-size:110%;
                    border:none;
                    border-radius: 50px;
                    padding: 2.5% 2.5% 2.5% 2.5%;
                    cursor:pointer;
                }

                    .button_layanan:hover{
                        background-color:#F77754;
                        color:black;
                    }

        /* S3 */

        
        /* S4 */
        #barang_shop{
            width:90%;
        }

        .gambar_barang{
            width:100%;
            height:100%;
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

            .button_keShop{
                    background-color:#5A3921;
                    color: #FEFFE4;
                    width: 15%;
                    height: 7%;
                    font-size:110%;
                    border:none;
                    border-radius: 50px;
                    padding: 0.5% 0.5% 0.5% 0.5%;
                    cursor:pointer;
                    text-align:center;
                    margin-left:40%;
                }


                .button_keShop:hover{
                    background-color:#F77754;
                    color:#5A3921;
                 }

                 .button_keShop:link,  .button_keShop:visited,  .button_keShop:hover,  .button_keShop:active{
                     color: #FEFFE4;
                 }

        /* S5 */
        .table_operatingHour{
                    font-size:120%;
                    width:80%;
                    text-align:center;
                    background-color:#95CEB3;
                    padding: 2% 2% 2% 2%;
                    margin:auto;
                    border-radius:50px;
                } 

                .table_operatingHour_left{
                    width:50%;
                    padding: 2% 2% 0% 0%;
                }

                .table_operatingHour_right{
                    width:50%;
                    padding: 2% 2% 0% 0%;
                }   

                .button_contactUs{
                    margin-top:2%;
                    width:30%;
                    height:10%;
                    background-color:#FEFFE4;
                    padding: 1%;
                    border-radius:50px;
                    
                }

                .button_contactUs:hover{
                    background-color: #F77754;
                }

                .div_contactUs{
                    display: inline-block;
                    width:30%;
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

		<!-- Home -->

		<section class="home" id="S1">
            <div class="kontenS1">
                <div class="welcome wow zoomIn">Welcome to DogeeKu</div>
                <div class="desc">Since 1999.</div>
            </div>
		</section>

		<!-- Tentang DogeeKu -->

		<section id="S2">
            <div class="kontenS2">
                <div class="judul">
                    Tentang DogeeKu
                </div>
                 <div class="konten">
                        <table class="about">
                            <tr class="aboutTr">
                                <td class="S1kiri">
                                       DogeeKu berdiri sejak tahun 1999. DogeeKu awalnya didirikan karena
                                       melihat kebutuhan pemilik akan penyedia layanan untuk perawatan anjing yang lengkap.
                                       Berdasarkan atas kebutuhan yang dimiliki oleh pemilik, DogeeKu dibangun untuk
                                       memberikan layanan yang lengkap dan memuaskan untuk para pelanggan. Kedepannya DogeeKu
                                       akan terus berusaha untuk memberikan pelayanan terbaik untuk para pelanggan setia DogeeKu.
                                </td>
                                <td class="S1kanan">
                                    <img src="<?php echo base_url()?>assets/img/avatar.png" class="foto_DogeeKu">
                                </td>
                            </tr>
                        </table>
                 </div>
		</section>

		<!-- Layanan -->
        <section id="S3"> 
            <div class="judul">
                Layanan Kami
            </div>
            <div class="konten">
                <table class="layanan">
                        <tr>
                            <td ><img src="<?php base_url()?>assets/img/gamklinik.png" class="gambarLayanan"></td>
                            <td><img src="<?php base_url()?>assets/img/gamsalon.png"  class="gambarLayanan"></td>
                            <td><img src="<?php base_url()?>assets/img/gampen.png"  class="gambarLayanan"></td>
                        </tr>
                        <tr>
                            <td>
                                <a  href="<?php echo base_url()?>PHome/klinik">
                                    <button class="button_layanan">Layanan Klinik</button>
                                </a>
                            </td>
                            <td>
                                <a  href="<?php echo base_url()?>PHome/salon">
                                    <button class="button_layanan">Layanan Salon</button>
                                </a>
                            </td>
                            <td>
                                <a  href="<?php echo base_url()?>PHome/penitipan">
                                    <button class="button_layanan">Layanan Penitipan</button>
                                </a>
                            </td>
                        </tr>
                    </table>
            </div>
        </section>


        <!-- Shop -->
        <section id="S4">
            <div class="judul">
                DogeeKu Shop
            </div>
            <?php foreach($data_barang as $list){?>
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                            <img src="<?php echo base_url().$list->foto;?>" alt="" class="gambar_barang">
                            </div>
                            <div class="flip-card-back">
                                <div class="nama_produk"><a href="<?php echo base_url().'PShop/detail_barang/'.$list->id_barang;?> "><?php echo $list->nama_barang;?></a></div>
                                <div class="nama_kategori">In <a href="<?php echo base_url().'PShop/lihat_kategoriBarang_Home/'.$list->id_kategori_barang;?>"><?php echo $list->nama_kategori_barang;?></a></div>
                                <div class="harga_produk"><span>Rp.<?php echo $list->harga;?></span></div>
                            </div>
                        </div>
                    </div>
            <?php } ?>

            <a href="<?php echo base_url()?>PShop"><button class="button_keShop">LOAD MORE</button></a>

        </section>

        <!-- Operating Hour -->
        <section id="S5">
            <div class="judul">
                DogeeKu Operating Hours
            </div>
                <div class="konten" >
                        <table class="table_operatingHour">
                            <tr>
                                <td class="table_operatingHour_left">Senin</td> 
                                <td class="table_operatingHour_right">10:00 - 20:00</td>   
                            </tr>
                            <tr>
                                <td  class="table_operatingHour_left">Selasa</td>
                                <td  class="table_operatingHour_right">10:00 - 20:00</td> 
                            </tr>
                            <tr>
                                <td  class="table_operatingHour_left">Rabu</td>
                                <td  class="table_operatingHour_right">10:00 - 20:00</td> 
                            </tr>
                            <tr>
                                <td  class="table_operatingHour_left">Kamis</td>
                                <td  class="table_operatingHour_right">10:00 - 20:00</td> 
                            </tr>
                            <tr>
                                <td  class="table_operatingHour_left">Jumat</td>
                                <td  class="table_operatingHour_right">10:00 - 20:00</td> 
                            </tr>
                            <tr>
                                <td  class="table_operatingHour_left">Sabtu</td>
                                <td  class="table_operatingHour_right">10:00 - 17:00</td> 
                            </tr>
                            <tr>
                                <td  class="table_operatingHour_left">Minggu</td>
                                <td  class="table_operatingHour_right">13:00 - 20:00</td> 
                            </tr>
                        </table>
                </div>
        </section>

        <!-- Location -->
        <section id="S6">
            <div class="judul">
                DogeeKu Location
            </div>
            <div class="konten">
                    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.263851080111!2d106.60763101420945!3d-6.228903795491045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fc1ec652a1d3%3A0x79c34e4f78fbbf2!2sUniversitas%20Pelita%20Harapan!5e0!3m2!1sen!2sid!4v1572935836612!5m2!1sen!2sid" 
                    width="70%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe></p>
            </div>

        </section>

        <!-- Contact Us -->
        <section id="S7">
            <div class="judul">
                DogeeKu Contact Us
            </div>
            <div class="konten">
                <div style="width:80%;margin:auto;background-color:#FEFFE4;border:10px solid #5A3921;border-radius:50px;padding:2%; ">
                        <div >
                            <table>
                                <tr>
                                    <td rowspan="3">
                                        <img src="<?php echo base_url().'assets/img/petshop.jpg'?>">
                                    </td>
                                    <td style="font-size:200%;text-align:center;">DogeeKu</td>
                                </tr>
                                <tr>
                                    <td>
                                        Location: Jl. M. H. Thamrin Boulevard 1100 Lippo Village Tangerang 15811 - Indonesia
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Number: 085212345678
                                    </td>
                                </tr>

                            </table>
                        </div>
                        <div class="div_contactUs">
                            <a>
                                <button class="button_contactUs">
                                <img src="<?php echo base_url().'assets/img/facebook.png'?>">
                                </button>
                            </a>
                        </div>
                        <div class="div_contactUs">
                            <a>
                                <button class="button_contactUs">
                                <img src="<?php echo base_url().'assets/img/instagram.png'?>">
                                </button>
                            </a>
                        </div>
                        <div class="div_contactUs">
                            <a>
                                <button class="button_contactUs">
                                <img src="<?php echo base_url().'assets/img/whatsapp.png'?>">
                                </button>
                            </a>
                        </div>
                
                </div>

            </div>
        </section>
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