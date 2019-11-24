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

            #table_keranjang{
                width:95%;
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



            .button_delete, .button_edit{
                background-color:#F77754;
                color: #5A3921;
                border-radius:50px;
                text-align:center;
                padding: 5% 5% 5% 5%;
                margin-top:2%;
                font-weight:bold;
            }

            .button_delete:hover , .button_edit:hover{
                background-color:#5A3921;
                color:#FEFFE4;
                font-weight:bold;
            }

            .modal{
                font-size:50%;
                margin-top:13%;
               
            }

            .modal-header{
                background-color:#5A3921;
                color: #FEFFE4;
            }

            .modal-body, .modal-body2{
                background-color:#FEFFE4;
            }

            .close{
                color: #FEFFE4;
            }

            .button_modal{
                background-color:#5A3921;
                color:#FEFFE4;
                border-radius:50px;
                text-align:center;
                padding: 1% 3% 1% 3%;
                margin-top:2%;
                font-weight:bold;
            }

            .button_modal:hover{
                background-color:#F77754;
                color: #5A3921;
                font-weight:bold;
            }

            .checkout{
                width:90%;
                height: 100px;
                border: 5px solid #5A3921;
                margin:auto;
                margin-top:50px;
                margin-bottom: 50px;
            }

            .checkout a button{
                margin-top:1%;
                background-color:#5A3921;
                color:#FEFFE4;
                border-radius:50px;
                text-align:center;
                padding: 1% 3% 1% 3%;
                font-weight:bold;
            }

            .checkout a button:hover{
                background-color:#F77754;
                color: #5A3921;
                font-weight:bold;
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
                            <div id="judul">My keranjang</div>
                                <table id="table_keranjang">
                                    <tr>
                                        <th width="10%">Gambar</th>
                                        <th width="10%">Nama Barang</th>
                                        <th width="10%">Jumlah Barang</th>
                                        <th width="10%">Warna</th>
                                        <th width="10%">Ukuran</th>
                                        <th width="10%">Harga</th>
                                        <th width="10%">Total Harga</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                <?php foreach($keranjang as $list){?>
                                    <tr>
                                        <td width="10%">Gambar</td>
                                        <td width="10%"><?php echo $list->nama_barang;?></td>
                                        <td width="10%"><?php echo $list->jumlah_barang;?></td>
                                        <td width="10%"><?php echo $list->warna;?></td>
                                        <td width="10%"><?php echo $list->ukuran;?></td>
                                        <td width="10%"><?php echo $list->harga;?></td>
                                        <td width="10%"><?php echo $total_harga=($list->harga * $list->jumlah_barang);?></td>
                                        <td width="15%">
                                            <button class="button_edit"  data-jumlah-barang="<?php echo $list->jumlah_barang?>" data-id="<?php echo $list->id_keranjang;?>" data-toggle="modal" data-target="#myModal">Edit</button>
                                            <button class="button_delete"  data-nama="<?php echo $list->nama_barang;?>" data-jumlah-barang="<?php echo $list->jumlah_barang?>" data-id="<?php echo $list->id_keranjang;?>" data-toggle="modal" data-target="#myModal2">Delete</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                                        <div class="checkout">
                                            <a href="<?php echo base_url().'PKeranjang/checkout' ;?>">
                                                <button >Checkout</button>
                                            </a>
                                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Data</h4>
                                </div>
                                <div class="modal-body">
                                <p>Jumlah Barang</p>
                                <form method="POST" action="<?php echo base_url().'Pkeranjang/edit_keranjang';?>">
                                        <input type="hidden" name="id" id="id" value=""/>
                                        <input type="text" name="jmlh_brg" id="jmlh_brg" value=""/>
                                <button class="button_modal">OK</button>
                                </form>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                        <!-- end modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="myModal2" role="dialog">
                            <div class="modal-dialog">
                            
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Delete Data</h4>
                                </div>
                                <div class="modal-body2">
                                <form method="POST" action="<?php echo base_url().'Pkeranjang/delete_keranjang';?>">
                                        <input type="hidden" name="id" id="id" value=""/>
                                        <h3>Apakah anda yakin akan menghapus barang ini dari keranjang anda?</h3>
                                        <p>Nama Barang <input type="text" readonly name="nama" id="nama" value=""/></p>
                                        <p>Jumlah Barang <input type="text" readonly name="jmlh_brg" id="jmlh_brg" value=""/></p>
                                        
                                <button class="button_modal">Delete</button>
                                </form>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                        <!-- end modal -->
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