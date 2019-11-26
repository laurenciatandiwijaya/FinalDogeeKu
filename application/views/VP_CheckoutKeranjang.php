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

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
        ntegrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
        <style>
            body{
                background-color:#FEFFE4;
            }

            #table_keranjang{
                width:95%;
                font-size:120%;
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
                font-size:100%;
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
                font-size:80%;
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

            .container {
            display: block;
            position: relative;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            
            }


            .metode_pembayaran{
                background-color:  #5A3921;
                color:  #FEFFE4;
                font-size:50%;
                margin: 5%;
                padding: 2% 2% 2% 2%;
                border-radius: 50px;
            }

            .metode_pembayaran p{
                font-size:400%;
            }

            /* Hide the browser's default radio button */
            .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            }

            /* Create a custom radio button */
            .checkmark {
            position: absolute;
            left: 35%;
            height: 25px;
            width: 25px;
            background-color: #FEFFE4;
            border-radius: 50%;

            }

            /* On mouse-over, add a grey background color */
            .container:hover input ~ .checkmark {
            background-color: #ccc;
            }

            /* When the radio button is checked, add a blue background */
            .container input:checked ~ .checkmark {
            background-color:#F77754;
            }

            /* Create the indicator (the dot/circle - hidden when not checked) */
            .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            }

            /* Show the indicator (dot/circle) when checked */
            .container input:checked ~ .checkmark:after {
            display: block;
            }

            /* Style the indicator (dot/circle) */
            .container .checkmark:after {
                top: 9px;
                left: 9px;
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: #FEFFE4;
            }

            textarea{
                width: 35%;
                height: 100px;
            }

            .button_buatPesanan{
                font-size:150%;
                background-color:#5A3921;
                color:#FEFFE4;
                border-radius:50px;
                text-align:center;
                padding: 1% 3% 1% 3%;
                margin-top:2%;
                font-weight:bold;
            }

            .button_buatPesanan:hover{
                background-color:#F77754;
                color: #5A3921;
                font-weight:bold;
            }

            .total{
                font-size:120%;
                font-weight:bold;
                background-color:#5A3921;
                color: #FEFFE4;
            }

            .div_checkout{
                margin-top:10%;
               color:#5A3921;
               text-align:center;
            }

            #judul{
                color:#5A3921;
                font-size:300%; 
            }

            select, option, input, textarea{
                font-size:200%;
                margin-bottom: 2%;
                color: #5A3921;
            }

            label{
                font-size:200%;
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
        <div class="div_checkout">
                  <div id="judul">Checkout</div>
                    <table id="table_keranjang">
                        <tr>
                            <th width="10%">Gambar</th>
                            <th width="10%">Nama Barang</th>
                            <th width="10%">Jumlah Barang</th>
                            <th width="10%">Warna</th>
                            <th width="10%">Ukuran</th>
                            <th width="10%">Harga</th>
                            <th width="10%">Total Harga</th>
                        </tr>
                    <?php 
                        $jmlh_brg = 0;
                        $ttl_hrg = 0;
                        foreach($keranjang as $list){?>
                        <tr>
                            <td width="30%">Gambar</td>
                            <td width="10%"><?php echo $list->nama_barang;?></td>
                            <td width="10%"><?php echo $list->jumlah_barang;?></td>
                            <td width="10%"><?php echo $list->warna;?></td>
                            <td width="10%"><?php echo $list->ukuran;?></td>
                            <td width="10%"><?php echo $list->harga;?></td>
                            <td width="10%"><?php echo $total_harga=($list->harga * $list->jumlah_barang);?></td>
                        </tr>
                    <form method="POST" action="<?php echo base_url().'PInvoice/buat_pesanan';?>">
                        <?php 
                            $jmlh_brg = $jmlh_brg + $list->jumlah_barang;
                            $ttl_hrg = $ttl_hrg + $total_harga; 
                        } ?>
                        <tr>
                            <td colspan="3" width="50%"></td>
                                <input type="hidden" name="ttl_hrg" value="<?php echo $ttl_hrg;?>">
                            <td colspan="4" width="50%" style="right:0;" class="total">
                                <?php echo "Jumlah Barang:   ".$jmlh_brg;?><br>
                                <?php echo "Total Harga:   ".$ttl_hrg;?>
                            </td>
                            </tr>
                    </table>
                        <div class="metode_pembayaran">
                            <p>Alamat</p>
                            <label class="container">Kota</label> 
                            <select name="kota">
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Bogor">Bogor</option>
                                    <option value="Depok">Depok</option>
                                    <option value="Tanggerang">Tanggerang</option>
                                    <option value="Bekasi">Bekasi</option>
                            </select>
                            
                            <label class="container">Kecamatan</label>
                            <input type="text" name="kecamatan" required>

                            <label class="container">Kode Pos</label>
                            <input type="text" name="kode_pos" required>

                            <label class="container">Detail Alamat</label>
                            <textarea name="alamat" placeholder="Nama Gedung, jalan dan lainnya" required></textarea>
                        </div>

                    <div class="metode_pembayaran">
                            <p>Metode Pembayaran</p>
                            <label class="container">Cash
                            <input type="radio" checked="checked" name="metode_pembayaran" value="Cash">
                            <span class="checkmark"></span>
                            </label>
                            <label class="container">Transfer
                            <input type="radio" name="metode_pembayaran" value="Transfer">
                            <span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="checkout">
                                <button class="button_buatPesanan">Buat Pesanan</button>
                        </div>
                    </form>

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

<script>
                $(document).on("click", ".button_edit", function () {
                    var id = $(this).data('id');
                    var jumlah_barang = $(this).data('jumlah-barang');

                    $(".modal-body #id").val( id );
                    $(".modal-body #jmlh_brg").val( jumlah_barang );
                });

                $(document).on("click", ".button_delete", function () {
                    var id = $(this).data('id');
                    var jumlah_barang = $(this).data('jumlah-barang');
                    var nama = $(this).data('nama');

                    $(".modal-body2 #id").val(id);
                    $(".modal-body2 #jmlh_brg").val(jumlah_barang);
                    $(".modal-body2 #nama").val(nama);
                });

        </script>

</body>
</html>