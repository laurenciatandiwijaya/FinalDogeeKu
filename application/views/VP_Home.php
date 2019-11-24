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
                    width:90%;
                    text-align:center;
                    background-color:#F77754;
                    border-radius:50px;
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
                <div class="welcome">Welcome to DogeeKu</div>
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
                            <tr>
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

            <div class="konten" id="barang_shop">
                    		<!-- Products -->
                        <div class="row products_row">
                            <!-- Product -->
                            <?php foreach($data_barang as $list){?>
                                <div class="col-xl-3 col-md-6">
                                    <div class="product">
                                        <div class="product_image"><img src="<?php echo base_url()?>assets/images/product_1.jpg" alt=""></div>
                                        <div class="product_content">
                                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                <div>
                                                    <div>
                                                        <div class="product_name"><a href="<?php echo base_url().'PShop/detail_barang/'.$list->id_barang;?> "><?php echo $list->nama_barang;?></a></div>
                                                        <div class="product_category">In <a href="category.php">Category</a></div>
                                                    </div>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <div class="product_price text-right"><span>Rp.<?php echo $list->harga;?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row load_more_row">
                            <div class="col">
                                <div class="button load_more ml-auto mr-auto"><a href="<?php echo base_url()?>PShop">load more</a></div>
                            </div>
                        </div>
                    </div>
		    </div>
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