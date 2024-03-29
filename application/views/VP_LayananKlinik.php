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
            /* Layanan Klinik */
        #S4Klnik, #S5Klnik, #S6Klnik{
            margin-top:15.5%;
        }

        #S2Klnik,  #S3Klnik{
            margin-top:18.5%;
        }

    .Klinik_Isi{
        padding-top: 3%;
    }        

    .gambar_LayananKlinik{
        width: 40%;
        height:7%;
    }

    .data_dokter{
        width:40%;
        background-color: #F77754;
        border-radius: 50px;
    }

    .gambar_dokter{
        width: 25%;
        height: 20%;
        float:right;
        margin:-10% 10% 0% 0%;
    }

    .nama_dokter{
        width:40%;
        font-size:120%;
        font-weight: bold;
    }

    .paketan{
        background-color: #FFCB5A;
        display:inline-block;
        padding: 3% 5% 3% 5%;
        margin: 2% 6% 0% 0%;
        border-radius: 50px;
    }

    .paketan1{
        margin-left:50px;
    }

    .paling_kiri{
        margin-left:-20%;
    }

    .backToTop{
        right:0px;
        margin-top:8%;
</head>
<body>

<!-- Menu -->

<?php include('Pside-bar.php')?>

<div class="super_container">

	<!-- Header -->
		<?php include('Ptop-bar.php')?>

	<div class="super_container_inner">
        <div class="super_overlay"></div>
        <div id="S1Klinik">
                 <div class="welcome">
                    <h1 >Layanan Klinik</h1>
                </div>
        
                <div class="desc">
                    <p>Layanan klinik adalah layanan yang menjadi fokus DogeeKu. Layanan ini berfokus pada
                        kesehatan anjing. Kami memiliki dokter hewan yang profesional dan sangat mengerti perawatan
                        anjing. Kami juga menyadiakan obat-obatan yang dibutuhkan bagi para pelanggan kami.
                    </p>
                </div>

                <a href="#S1Klinik" class="backToTop">
                     <button  class="button_toTop">To top</button>
                </a>
            </div>

            <div id="S2Klnik">
                    <div class="judul">
                        <p>Layanan Klinik </p>
                    </div>
                    <div class="konten">
                        <table class="layanan">
                            <tr>
                                <td>
                                    <img src="<?php echo base_url()?>assets/img/layananklinik.png" class="gambar_LayananKlinik">
                                </td>
                                <td>
                                    <img src="<?php echo base_url()?>assets/img/layananklinik.png"  class="gambar_LayananKlinik">
                                </td>
                                <td>
                                    <img src="<?php echo base_url()?>assets/img/layananklinik.png"  class="gambar_LayananKlinik">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a  href="#S4Klnik">
                                        <button class="button_layanan">Konsultasi</button>
                                    </a>
                                </td>
                                <td>
                                    <a  href="#S5Klnik">
                                        <button class="button_layanan">Perawatan Khusus</button>
                                    </a>
                                </td>
                                <td>
                                    <a  href="#S6Klnik">
                                        <button class="button_layanan">Vaksinasi</button>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
            </div>

            <div id="S3Klnik">
            <div class="judul">
                        <p>Dokter Kami</p>
                    </div>
                    <div class="konten">
                        <table class="layanan">
                            <tr>
                                <td class="data_dokter">
                                    <table>
                                        <tr>
                                            <td class="nama_dokter">
                                                <p>Arini Arina Anastasya</p>
                                            </td>
                                            <td rowspan="2">
                                                <img src="<?php echo base_url()?>assets/img/avatar.png" 
                                                class="gambar_dokter">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Pendidikan: S1.................</p>
                                                <p>Pengalaman bekerja: 25 tahun</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="data_dokter">
                                    <table>
                                        <tr>
                                            <td class="nama_dokter">
                                                <p>Arini Arina Anastasya</p>
                                            </td>
                                            <td rowspan="2">
                                                <img src="<?php echo base_url()?>assets/img/avatar.png" 
                                                class="gambar_dokter">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>Pendidikan: S1.................</p>
                                                <p>Pengalaman bekerja: 25 tahun</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                
                            </tr>
                        </table>
                    </div>
            </div>

            <div id="S4Klnik">
                <div class="Klinik_Isi">
                    <div class="judul">
                        <p>Klinik Konsultasi</p>
                    </div>

                    <div class="konten">
                    <p>Pada konsultasi kami memiliki beberapa paketan konsultasi.</p>
                    <div class="paketan paketan1">
                            <h1>Paket 1</h1>
                            <h3>Detail Layanan</h3>
                            <ul>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                            </ul>
                            <h4>Rp....</h4>
                    </div>

                    <div class="paketan">
                            <h1>Paket 2</h1>
                            <h3>Detail Layanan</h3>
                            <ul>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                            </ul>
                            <h4>Rp....</h4>
                    </div>

                    <div class="paketan">
                            <h1>Paket 3</h1>
                            <h3>Detail Layanan</h3>
                            <ul>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                            </ul>
                            <h4>Rp....</h4>
                    </div>
                    </div>
                </div>    
            </div>

            <div id="S5Klnik">
                <div class="Klinik_Isi">
                    <div class="judul">
                            <p>Klinik Perawatan Khusus</p>
                        </div>

                        <div class="konten">
                        <p>Pada konsultasi kami memiliki beberapa paketan konsultasi.</p>
                        <div class="paketan paketan1">
                                <h1>Paket 1</h1>
                                <h3>Detail Layanan</h3>
                                <ul>
                                    <li>Pengecekkan .....</li>
                                    <li>Pengecekkan .....</li>
                                    <li>Pengecekkan .....</li>
                                    <li>Pengecekkan .....</li>
                                    <li>Pengecekkan .....</li>
                                </ul>
                                <h4>Rp....</h4>
                        </div>

                        <div class="paketan">
                                <h1>Paket 2</h1>
                                <h3>Detail Layanan</h3>
                                <ul>
                                    <li>Pengecekkan .....</li>
                                    <li>Pengecekkan .....</li>
                                    <li>Pengecekkan .....</li>
                                    <li>Pengecekkan .....</li>
                                    <li>Pengecekkan .....</li>
                                </ul>
                                <h4>Rp....</h4>
                        </div>

                        <div class="paketan">
                                <h1>Paket 3</h1>
                                <h3>Detail Layanan</h3>
                                <ul>
                                    <li>Pengecekkan .....</li>
                                    <li>Pengecekkan .....</li>
                                    <li>Pengecekkan .....</li>
                                    <li>Pengecekkan .....</li>
                                    <li>Pengecekkan .....</li>
                                </ul>
                                <h4>Rp....</h4>
                        </div>
                    </div>
                </div>

                <div id="S6Klnik">
                <div class="judul">
                        <p>Klinik Vaksinasi</p>
                    </div>

                    <div class="konten">
                    <p>Pada konsultasi kami memiliki beberapa paketan konsultasi.</p>
                    <div class="paketan paketan1">
                            <h1>Paket 1</h1>
                            <h3>Detail Layanan</h3>
                            <ul>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                            </ul>
                            <h4>Rp....</h4>
                    </div>

                    <div class="paketan">
                            <h1>Paket 2</h1>
                            <h3>Detail Layanan</h3>
                            <ul>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                            </ul>
                            <h4>Rp....</h4>
                    </div>

                    <div class="paketan">
                            <h1>Paket 3</h1>
                            <h3>Detail Layanan</h3>
                            <ul>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                                <li>Pengecekkan .....</li>
                            </ul>
                            <h4>Rp....</h4>
                    </div>   
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