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
            }
            #S3{
                margin-top:5%;
            }

                .konten{
                    margin-left:5%;
                    margin-right:5%;
                }

                .konten_shop{
                    width:10%;
                    text-align:center;
    
                }

                .detail_barang{
                    width:80%;
                    height:90%;
                    border: 10px solid #5A3921;
                    margin:auto;
                    border-radius: 50px;
                }

                #detail_gambarBarang{
                    width:60%;
                }

                #detail_namaBarang{
                    font-size:150%;
                    width:40%;
                    font-weight:bold;
                }

                #detail_hargaBarang{
                    font-size:60%;
                    width:20%;
                    background-color:#F77754;
                    opacity: 0.8;
                    border-radius: 50px;
                    font-weight:bold;
                }

                #detail_warna{
                    font-size:70%;
                    width:40%;
                }
                
                #detail_ukuran{
                    font-size:70%;
                    width:40%;
                }

                #detail_keteranganBarang{
                    width:100%;
                    font-size:150%;
                }

                .button_wishlist{
                background-color:#F77754;
                color: #5A3921;
                border-radius:50px;
                text-align:center;
                width:25%;
                height:80%;
                padding: 0.5% 0.5% 0.5% 0.5%;
                margin-top:2%;
                font-weight:bold;
                }

                .button_wishlist:hover{
                background-color:#5A3921;
                color:#FEFFE4;
                font-weight:bold;
                }

                .button_buy{
                background-color:#F77754;
                color: #5A3921;
                border-radius:50px;
                text-align:center;
                width:25%;
                height:80%;
                padding: 0.5% 0.5% 0.5% 0.5%;
                margin-top:2%;
                font-weight:bold;
                }

                .button_buy:hover{
                background-color:#5A3921;
                color:#FEFFE4;
                font-weight:bold;
                }

                input{
                    border: 3px solid  #5A3921;
                    border-radius: 50px;
                    font-size: 60%;
                    width:50%;
                }

                    .keranjang{
                    margin-top:10%;
                    color:#5A3921;
                    text-align:center;
                    }

                    #judul{
                        color:#5A3921;
                        font-size:300%;
                        
                    }

                    p, td{
                        color:#5A3921;
                        font-size:160%;
                    }

                    #jumlah_barang{
                        font-size:50%;
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

                    #S3{
                        height:100vh;
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

                        .img_barang{
                            width:50%;
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
        <div class="keranjang">
            <div class="detail_barang">
                    <?php foreach($detailData_barang as $list){?>
                        <form method="POST">
                            <table>
                                <tr>
                                    <td rowspan="5"  id="detail_gambarBarang">
                                        <img class="img_barang" src="<?php echo base_url().$list->foto;?>">
                                        <input type="hidden"  id="detail_keteranganBarang" name="id_barang" value="<?php echo $list->id_barang;?>">
                                        <p  id="detail_keteranganBarang" name="keterangan" value="<?php echo $list->keterangan;?>"><?php echo $list->keterangan;?></p>
                                    </td>
                                    <td colspan="2" id="detail_namaBarang">
                                        <p  name="nama_barang" value="<?php echo $list->nama_barang;?>"><?php echo $list->nama_barang;?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" id="detail_hargaBarang">
                                        <p  name="harga_barang" value="<?php echo $list->harga;?>">Rp. <?php echo $list->harga;?></p>
                                    </td>
                                </tr>
                                <tr id="detail_warna">
                                    <td>Warna:</td>
                                    <td>
                                        <p  name="warna" value="<?php echo $list->warna;?>"><?php echo $list->warna;?></p>
                                    </td>
                                </tr>
                                <tr  id="detail_ukuran">
                                    <td>Ukuran:</td>
                                    <td>
                                        <p  name="ukuran" value="<?php echo $list->ukuran;?>"><?php echo $list->ukuran?><?php echo $list->satuan;?></p>
                                    </td>
                                </tr>
                                <tr  id="detail_ukuran">
                                    <td>Jumlah</td>
                                    <td>
                                        <p>
                                            <input type="number" name="jumlah_barang" required>
                                            <span id="jumlah_barang">Tersisa:<?php echo $list->jumlah_barang;?></span>
                                            <input type="hidden" name="jumlah_maks" value="<?php echo $list->jumlah_barang;?>" required>
                                        </p>
                                    </td>
                                </tr>
                                
                            </table>
                            <button type="submit" class="button_buy" onclick="javascript:form.action='<?php echo base_url().'PKeranjang/tambah_keranjang'?>'">
                                Beli Sekarang
                            </button>
                            <button type="submit" class="button_wishlist" onclick="javascript:form.action='<?php echo base_url().'PWishlist/tambah_wishlist'?>'">
                                Tambahkan ke Wishlist
                            </button>
                        </form>
                        <?php } ?>
                    </div>
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