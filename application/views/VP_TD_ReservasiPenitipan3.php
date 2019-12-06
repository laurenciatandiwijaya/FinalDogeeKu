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
                color: #5A3921;
            }

            #form_konfirmasiReservasi{
               padding-top:10%; 
               text-align:center;
            }


            #table_konfirmasiReservasi{
                width:80%;
                background-color:#5A3921;
                color:#FEFFE4;
                border-radius:50px;
                padding: 10% 10% 10% 10%;
                margin-left:10%;
            }

            #button_ok{
                
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                margin:auto;
                padding: 1.5% 1.5% 1.5% 1.5%;
            }

            #button_ok:hover{
                background-color:#FEFFE4;
                color: black;
                font-weight:bold;

            }

            td input{
                background-color: #FEFFE4;
                border: 4px solid #5A3921;
                padding: 1% 1% 1% 1%;
                border-radius:50px;
                width:70%;
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
        <div id="form_konfirmasiReservasi">
            <h3 id="title">Konfirmasi Reservasi Penitipan</h3>
            <form method="POST" action="<?php echo base_url().'PReservasi/coba_reservasiPenitipan3'?>">
                <input type="hidden" name="id_anjing" value="<?php echo $id_anjing;?>" readonly>
                <input type="hidden" name="id_pekerja" value="<?php echo $id_pekerja;?>" readonly>
                <table id="table_konfirmasiReservasi">
                    <tr>
                        <td>Nama Anjing</td>
                        <td><input type="text" name="nama_anjing" value="<?php echo $nama_anjing;?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Nama Dokter Salon</td>
                        <td><input type="text" name="nama_pekerja" value="<?php echo $nama_pekerja;?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Tanggal Reservasi</td>
                        <td><input type="text" name="tanggal" value="<?php echo $tanggal;?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Jam Reservasi</td>
                        <td><input type="text" name="jam" value="<?php echo $jam;?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td><input type="text" name="keterangan" value="<?php echo $keterangan;?>"></td>
                    </tr>
                    <?php 
                        $no=1;
                        $data_id_layanan = array();
                        foreach($data_detail_layanan as $list1){
                       
                         
                    ?>
                        
                        <?php
                            $jmlh_lynan = count($arr_id_detail_layanan);
                            for($i=0;$i<$jmlh_lynan;$i++){
                            if($list1->id_detail_layanan == $arr_id_detail_layanan[$i]){
                               // array_push($data_id_layanan, $list1->id_detail_layanan);
                        ?>
                             <tr>
                                <td>Layanan <?php echo $no;?></td>
                                <td><input type="text" name="nama_detail_layanan<?php echo $no;?>"
                                 value="<?php echo $list1->nama_detail_layanan;?>"></td>
                                 <td>
                                 <input type="hidden" name="id_detail_layanan<?php echo $no;?>"
                                 value="<?php echo $list1->id_detail_layanan;?>">
                                 </td>
                            </tr>
                        <?php
                            $no++; }    
                        ?>
                        <?php } ?>
                    <?php } ?>
                    <tr>
                        <input type="hidden" name="jumlah_layanan" value="<?php echo $jmlh_lynan;?>">
                        <td colspan="2"><button  id="button_ok" type="submit">Konfirmasi</button></td>
                    </tr>
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