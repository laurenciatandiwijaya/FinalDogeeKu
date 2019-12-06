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
            .pemesanan{
               margin-top:10%;
               color:#5A3921;
               text-align:center;
            }

            body{
                background-color:#FEFFE4;
               
            }

            p, td{
            color:#5A3921;
            font-size:120%;
            }

            #table_wishlist{
                width:95%;
                font-size:200%;
                margin:auto;
                border: 7px solid  #5A3921;
                padding: 3% 3% 3% 3%;  
                border-radius:50px;
                
            }

            th{
                padding: 30px 0px 30px 0px;
                text-decoration: underline;
                text-align: center;
            }

            td{
                height:100px;
            }

            .div_belumLunas{
                background-color:rgba(136,136,136,0.5);
                border: 6px solid #5A3921;
                width: 90%;
                margin:auto;
                border-radius: 50px;
                margin-bottom:5%;
            }

            .baris{
                width:100%;
            }

            .info_pembayaran{
                width:30%;
            }

            .table_infoInvoice{
                width:100%;
            }

            #div_buttonTampilkanDetailBarang{
                width:100%;
                background-color:#5A3921;
                border-radius:50px;
            }

            #button_tampilkanDetailBarang{
                margin-left:83%;
                margin-top:0.5%;
                margin-bottom: 0.5%;
                background-color:#F77754;
                color: #5A3921;
                border-radius:50px;
                text-align:center;
                font-weight:bold;
            }

            #button_tampilkanDetailBarang:hover{
                background-color:#FEFFE4;
                color:#5A3921;
                font-weight:bold;
            }

            .table_detailBarang{
                width:100%;
                display:none;
            }

            .button_konfirmasi{
                background-color:#F77754;
                color: #5A3921;
                border-radius:50px;
                text-align:center;
                font-weight:bold;
            }

            .button_konfirmasi:hover{
                background-color:#5A3921;
                color:#FEFFE4;
                font-weight:bold;
            }

            #button_history{
                background-color:#F77754;
                color: #5A3921;
                border-radius:50px;
                margin-left:80%;
                font-weight:bold;
                padding:0.5% 0.5% 0.5% 0.5%; 
                font-size:120%;

            }

            #button_history:hover{
                background-color:#5A3921;
                color:#FEFFE4;
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
        <div class="pemesanan">
                  <?php 
                  $counter=0;
                  foreach($reservasi_klinik as $a){ ?>
                    <?php if($a->status_invoice == "Lunas" || $a->status_invoice == "Batal"){
                      
                    ?>
                        <div class="div_belumLunas">
                            <table class="table_infoInvoice">
                                <tr class="id_invoice">
                                    <td>Nomor Pemesanan:<b><?php echo $a->id_invoice;?></b></td>
                                </tr>
                                <tr class="baris">
                                    <td class="info_pembayaran">
                                        Status Pembayaran: <b><?php echo $a->status_invoice;?></b>
                                    </td>
                                    <td class="info_pembayaran">Total Pembayaran:<b><?php echo $a->total;?></b></td>
                                </tr>
                                <tr class="id_invoice">
                                    <td class="info_pembayaran">Tanggal:<b><?php echo $a->tanggal;?></b></td>
                                    <td class="info_pembayaran">Jam:<b><?php echo $a->jam;?></b></td>
                                </tr>
                                <tr class="id_invoice">
                                    <td>Nama Anjing:<b><?php echo $a->nama_anjing;?></b></td>
                                </tr>
                            </table>
                            <div id="div_buttonTampilkanDetailBarang">
                                <a class="cobadeh" target="<?php echo $counter;?>">
                                    <button id="button_tampilkanDetailBarang" >Detail Reservasi v</button>
                                </a>
                            </div>
                           
                            <table class="table_detailBarang" id="table_detailBarang<?php echo $counter;?>">
                                <tr>
                                    <th>Nama Layanan</th>
                                    <th>Deskripsi Layanan</th>
                                    <th>Harga</th>
                                </tr>
                                <?php
                                    foreach($detail_reservasi_klinik as $b){
                                    if($a->id_invoice == $b->id_invoice){    
                                ?>
                                <tr class="warna_div">
                                    <td><?php echo $b->nama_detail_layanan; ?></td>
                                    <td><?php echo $b->deskripsi_layanan; ?></td>
                                    <td><?php echo $b->harga; ?></td>
                                </tr>
                                <?php
                                    }
                                } 
                                $counter++;
                                ?>
                            </table>
                        </div>   
                <?php } }?>

                <?php 
                  foreach($reservasi_salon as $salonA){ ?>
                    <?php if($salonA->status_invoice == "Lunas" || $salonA->status_invoice == "Batal"){
                      
                    ?>
                        <div class="div_belumLunas">
                            <table class="table_infoInvoice">
                                <tr class="id_invoice">
                                    <td>Nomor Pemesanan:<b><?php echo $salonA->id_invoice;?></b></td>
                                </tr>
                                <tr class="baris">
                                    <td class="info_pembayaran">
                                        Status Pembayaran: <b><?php echo $salonA->status_invoice;?></b>
                                    </td>
                                    <td  class="info_pembayaran">Total Pembayaran:<b><?php echo $salonA->total;?></b></td>
                                </tr>
                                <tr class="baris">
                                    <td  class="info_pembayaran">Tanggal:<b><?php echo $salonA->tanggal;?></b></td>
                                    <td  class="info_pembayaran">Jam:<b><?php echo $salonA->jam;?></b></td>
                                </tr>
                                <trclass="baris">
                                    <td  class="info_pembayaran">Nama Anjing:<b><?php echo $salonA->nama_anjing;?></b></td>
                                </tr>
                            </table>
                            <div id="div_buttonTampilkanDetailBarang">
                                <a class="cobadeh" target="<?php echo $counter;?>">
                                    <button id="button_tampilkanDetailBarang" >Detail Reservasi v</button>
                                </a>
                            </div>
                           
                            <table class="table_detailBarang" id="table_detailBarang<?php echo $counter;?>">
                                <tr>
                                    <th>Nama Layanan</th>
                                    <th>Deskripsi Layanan</th>
                                    <th>Harga</th>
                                </tr>
                                <?php
                                    foreach($detail_reservasi_salon as $salonB){
                                    if($salonA->id_invoice == $salonB->id_invoice){    
                                ?>
                                <tr class="warna_div">
                                    <td><?php echo $salonB->nama_detail_layanan; ?></td>
                                    <td><?php echo $salonB->deskripsi_layanan; ?></td>
                                    <td><?php echo $salonB->harga; ?></td>
                                </tr>
                                <?php
                                    }
                                } 
                                $counter++;
                                ?>
                            </table>
                        </div>   
                <?php } }?>

                <?php 
                  
                  foreach($reservasi_penitipan as $penitipanA){ ?>
                    <?php if($penitipanA->status_invoice == "Lunas" || $penitipanA->status_invoice == "Batal"){
                      
                    ?>
                        <div class="div_belumLunas">
                            <table class="table_infoInvoice">
                                <tr class="id_invoice">
                                    <td>Nomor Pemesanan:<b><?php echo $penitipanA->id_invoice;?></b></td>
                                </tr>
                                <tr class="baris">
                                    <td class="info_pembayaran">
                                        Status Pembayaran: <b><?php echo $penitipanA->status_invoice;?></b>
                                    </td>
                                    <td class="info_pembayaran">Total Pembayaran:<b><?php echo $penitipanA->total;?></b></td>
                                </tr>
                                <tr  class="baris">
                                    <td class="info_pembayaran">Tanggal:<b><?php echo $penitipanA->tanggal;?></b></td>
                                    <td class="info_pembayaran">Jam:<b><?php echo $penitipanA->jam;?></b></td>
                                </tr>
                                <tr c class="baris">
                                    <td class="info_pembayaran">Nama Anjing:<b><?php echo $penitipanA->nama_anjing;?></b></td>
                                </tr>
                            </table>
                            <div id="div_buttonTampilkanDetailBarang">
                                <a class="cobadeh" target="<?php echo $counter;?>">
                                    <button id="button_tampilkanDetailBarang" >Detail Reservasi v</button>
                                </a>
                            </div>
                           
                            <table class="table_detailBarang" id="table_detailBarang<?php echo $counter;?>">
                                <tr>
                                    <th>Nama Layanan</th>
                                    <th>Deskripsi Layanan</th>
                                    <th>Harga</th>
                                </tr>
                                <?php
                                    foreach($detail_reservasi_penitipan as $penitipanB){
                                    if($penitipanA->id_invoice == $penitipanB->id_invoice){    
                                ?>
                                <tr class="warna_div">
                                    <td><?php echo $penitipanB->nama_detail_layanan; ?></td>
                                    <td><?php echo $penitipanB->deskripsi_layanan; ?></td>
                                    <td><?php echo $penitipanB->harga; ?></td>
                                </tr>
                                <?php
                                    }
                                } 
                                $counter++;
                                ?>
                            </table>
                        </div>   
                <?php } }?>
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
                        jQuery('#table_detailBarang'+$(this).attr('target')).toggle(700);
                    });
                });
</script>

</body>
</html>