<!-- 
1 = berhasil login
2 = tidak berhasil login (email atau password salah).
3 =  ganti password, password lama dan baru tidak sesuai.
4 = ganti password, berhasil
5 = password baru dan password konfirmasi ga sama.
6 = password dan password konfirmasi ga sama, registrasi
7 = Email yang dimasukkan saat registrasi sudah terdaftar.
8 =
9 = Tambah data anjing ttp namanya sudah terdaftar
10 = berhasil tambah anjing
11 = di planner, mau tambahkan kegiatan tpi sudah terdaftar.
12
13 = infoin invoice berhasil, trf
14 = infoin invoice berhasil, cash
15 = Transfer berhasil, salon
16 = tambah barang ke wishlist, tapi jumlah melebihi jumlah yang tersedia.
17 = sudah terdaftar pda layanan yang lain.
18 = 
19 = waktu yang dimasukkan akhir > waktu awal (planner)
20 = Transfer berhasil, layanan

-->

<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
        ntegrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> 
    
        <style>
                ::placeholder{
                color: #FEFFE4;
                opacity: 100%;
            }

            body{
                background-color:#FEFFE4;
            }

            .logout_back{
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                width:10%;
                height:6%;
                padding: 0.5% 0.5% 0.5% 0.5%;
                left:0px;
            }

            .logout_back:hover{
                background-color:#5A3921;
                color: #FEFFE4;
                font-weight:bold;
            }

            .logout_kiri{
                display:inline-block;
                width:49%;
                background-color: #FEFFE4;
                text-align:center;
                
            }

            .logo_dogeeKu{
                width:50%;
                height:50%;
            
            }

            .logout_kanan{
                display:inline-block;
                width:50%;
                height:570px;
                background-color:#5A3921;
                margin-top:-40px;
                margin-right:-100px;
            }

            .logout_kanan p, .logout_kanan h3 {
                text-align:center;
            }

            .logout_kanan h3 {
                color: #FEFFE4;
            }

            .tulisan_logout{
                color:#F77754;
                text-align:center;
                margin-top: 10%;
                font-size:400%;
                margin-bottom:20%;
            }

            .logout_logout{
                background-color:#F77754;
                border-radius:50px;
                text-align:center;
                width:20%;
                height:6%;
                padding: 1.5% 1.5% 1.5% 1.5%;
                margin-top:5%;
            }

            .logout_logout:hover{
                background-color:#FEFFE4;
                color: black;
                font-weight:bold;

            }

            .tulisan_dogeeKu{
                color:#5A3921;
                font-size:350%;
                font-weight:bold;
                margin-top:-5%;
            }

            .warna_clinic{
                margin-top:-9%;
                font-size:150%;
                color: #FFCB5A;
            }

            .warna_salon{
                color:#F77754;
            }

            .warna_penitipan{
                color:#95CEB3;
            }

            .warna_shop{
                color:#5A3921;
            }

            .tulisan{
                margin-top:-5%;
            }
       
        
        </style>
    
    </head>


    <body>
        <?php 
            if($status_announce == 13 || $status_announce == 14|| $status_announce == 16 ){
        ?>
            <a href="<?php echo base_url()?>PHome"><button class="logout_back">HOME</button></a>
        <?php } else if( $status_announce!=11 || $status_announce!=12) {?>
            <a href="<?php echo base_url()?>PHome"><button class="logout_back">BACK</button></a>
        <?php } ?>
        <div class="main" id="main">
            <div class="logout_kiri">
                <img src="<?php echo base_url()?>assets/img/logo_DogeeKu.png" class="logo_dogeeKu">
                <p class="tulisan_dogeeKu">DogeeKu</p>
                <p class="warna_clinic">clinic.<span class="warna_salon">salon.</span><span class="warna_penitipan">dog care.</span><span class="warna_shop">shop.</span>
                </p>
            </div>

            
            <?php
                if($status_announce == '1'){
            ?>

                <div class="logout_kanan">
                    <form method="POST" action="<?php echo base_url().'PHome'?>">
                        <h1 class="tulisan_logout">KONFIRMASI</h1>
                        <h3><?php echo $this->session->userdata("nama"); ?></h3>
                        <h3>Selamat! anda berhasil melakukan login</h3>
                        <p><button class="logout_logout" type="submit">OK</button></p>
                    </form>
                </div>

            <?php
                }  else if($status_announce == '2'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'Login/login'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Maaf, Email atau password yang anda masukkan salah.</h3>
                    <p><button class="logout_logout" type="submit">COBA LAGI</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '3'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'Login/ganti_password'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Maaf, Password lama yang anda masukkan salah</h3>
                    <p><button class="logout_logout" type="submit">COBA LAGI</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '4'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PHome'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Yeay! Password anda berhasil diganti.</h3>
                    <p><button class="logout_logout" type="submit">OK</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '5'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'Login/ganti_password'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Password baru dan konfirmasi password baru</h3>
                    <h3 class="tulisan">yang anda masukkan tidak sama.</h3>
                    <p><button class="logout_logout" type="submit">COBA LAGI</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '6'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'Login/registrasi'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Password dan konfirmasi password baru</h3>
                    <h3 class="tulisan">yang anda masukkan tidak sama.</h3>
                    <p><button class="logout_logout" type="submit">COBA LAGI</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '7'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'Login/registrasi'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Mohon maaf, email yang anda masukkan sudah terdaftar.</h3>
                    <h3 class="tulisan">Coba email yang lain.</h3>
                    <p><button class="logout_logout" type="submit">COBA LAGI</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '8'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'Login/login'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Selamat! Anda berhasil terdaftar</h3>
                    <p><button class="logout_logout" type="submit">LOGIN NOW</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '8'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'Login/edit_profile'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Mohon maaf, email yang anda masukkan sudah terdaftar.</h3>
                    <h3 class="tulisan">Coba email yang lain.</h3>
                    <p><button class="logout_logout" type="submit">LOGIN NOW</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '9'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PAnjing/tambah_anjing'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Mohon maaf, nama anjing <?php echo $nama_anjing;?></h3>
                    <h3 class="tulisan">sudah terdaftar untuk akun ini.</h3><br>
                    <h3>Silahkan coba dengan nama lain.</h3>
                    <p><button class="logout_logout" type="submit">COBA LAGI</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '10'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PHome'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Selamat! Anjing anda <?php echo $nama_anjing;?> berhasil terdaftar</h3>
                    <p><button class="logout_logout" type="submit">OK</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '11'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PPlanner/tambah_kegiatan'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Mohon maaf, kegiatan yang sama sudah terdaftar</h3>
                    <h3 class="tulisan">untuk anjing anda pada waktu tersebut.</h3>
                    <p><button class="logout_logout" type="submit">Coba Lagi</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '12'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PPlanner/tambah_kegiatan'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Mohon maaf, start date dan end date</h3>
                    <h3 class="tulisan">tidak boleh sama.</h3>
                    <p><button class="logout_logout" type="submit">Coba Lagi</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '13'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PInvoice/konfirmasi_transfer'?>">
                    <input type="hidden" name="id_invoice" value="<?php echo $id_invoice;?>">
                    <input type="hidden" name="total_harga" value="<?php echo $total_harga;?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Selamat, pesanan anda sedang di proses.</h3>
                    <h3 class="tulisan">Silahkan memasukkan data bukti transfer anda.</h3>
                    <p><button class="logout_logout" type="submit">OK</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '14'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PInvoice/pemesanan'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Selamat, pesanan anda sedang di proses.</h3>
                    <h3 class="tulisan">Barang anda akan dikirimkan dalam selang waktu 1x24 jam.</h3>
                    <p><button class="logout_logout" type="submit">Lihat Invoice Pesanan</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '15'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PInvoice/pemesanan'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Terimakasih! </h3>
                    <h3 class="tulisan">Barang anda akan dikirimkan dalam selang waktu 1x24 jam.</h3>
                    <p><button class="logout_logout" type="submit">OK</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '16'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PShop/detail_barang_check'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Mohon maaf, jumlah barang yang anda masukkan</h3>
                    <h3 class="tulisan">melebihi jumlah barang yang tersedia.</h3>
                    <input name="id_barang" type="hidden" value="<?php echo $id_barang;?>">
                    <p><button class="logout_logout" type="submit">Coba Lagi</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '17'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PAnjing/data_anjing'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Mohon maaf, Anjing dengan nama tersebut sudah terdaftar</h3>
                    <h3 class="tulisan">pada layanan kami di tanggal dan waktu yang sama.</h3>
                    <h3 class="tulisan">Silahkan coba untuk waktu yang berbeda.</h3>
                    <p><button class="logout_logout" type="submit">Coba Lagi</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '18'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PAnjing/data_anjing'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Mohon maaf,</h3>
                    <h3 class="tulisan">Reservasi di jam dan tanggal tersebut sudah penuh.</h3>
                    <p><button class="logout_logout" type="submit">Coba Lagi</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '19'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PPlanner/tambah_kegiatan'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Mohon maaf,</h3>
                    <h3 class="tulisan">Waktu selesai tidak dapat melebihi waktu mulai.</h3>
                    <p><button class="logout_logout" type="submit">Coba Lagi</button></p>
                </form>
            </div>

            <?php
                }  else if($status_announce == '20'){
            ?>

            <div class="logout_kanan">
                <form method="POST" action="<?php echo base_url().'PReservasi/data_reservasi'?>">
                    <h1 class="tulisan_logout">KONFIRMASI</h1>
                    <h3>Terimakasih. Barang anda akan dikirimkan</h3>
                    <h3 class="tulisan">dalam selang waktu 1x24 jam.</h3>
                    <p><button class="logout_logout" type="submit">OK</button></p>
                </form>
            </div>

            <?php } ?>
            
            
        </div>

    </body>
</html>
