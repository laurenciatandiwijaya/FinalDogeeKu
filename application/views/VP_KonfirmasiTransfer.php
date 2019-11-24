<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/style.css"> 
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
                height:100%;
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
                text-align:center;
            }

            .logout_kanan a, .logout_kanan h3 {
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
                padding: 1.5% 1.5% 1.5% 1.5%;
                margin-top:5%;
                margin-right:5%;
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

            input, select{
                width:80%;
                background:transparent;
                border: 2px solid #F77754;
                border-radius: 50px;
                padding: 3% 3% 3% 3%;
                color:#FEFFE4;
            }

           option{
                color: #5A3921;
                background-color: #F77754;
            }

            table{
                width:100%;
                color:#FEFFE4;
                margin-top:-20%;
                font-size:120%;
            }

            ::placeholder{
                color: #FEFFE4;
                opacity: 0.5; 
            }
       
        
        </style>
    
    </head>


    <body>
        <a href="<?php echo base_url()?>PHome"><button class="logout_back">BACK</button></a>

        <div class="main" id="main">
            <div class="logout_kiri">
                <img src="<?php echo base_url()?>assets/img/logo_DogeeKu.png" class="logo_dogeeKu">
                <p class="tulisan_dogeeKu">DogeeKu</p>
                <p class="warna_clinic">clinic.<span class="warna_salon">salon.</span><span class="warna_penitipan">dog care.</span><span class="warna_shop">shop.</span>
                </p>
            </div>

            <div class="logout_kanan">
                    <h1 class="tulisan_logout">Konfirmasi Transfer</h1>
                    <form method="POST" action="<?php echo base_url().'PInvoice/coba_konfirmasiTransfer'?>">
                    <table>
                            <tr>
                                <input name="id_invoice" type="hidden" value=<?php echo $id_invoice;?>>
                                <td>Nama Bank</td>
                                <td>
                                    <select name="nama_bank">
                                            <option value="BCA">BCA</option>
                                            <option value="BRI">BRI</option>
                                            <option value="BNI">BNI</option>
                                            <option value="Mandiri">Mandiri</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Rekening Pengirim</td>
                                <td>
                                    <input name="nomor_rekening" type="text" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Pengirim</td>
                                <td>
                                    <input name="nama_pengirim" type="text" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Dikirim</td>
                                <td>
                                    <input id="datepicker" name="tanggal_dikirim" type="date" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Total Dikirim</td>
                                <td>
                                    <input name="total" type="text" required placeholder="<?php echo $total_harga;?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="logout_logout">Konfirmasi</button>
                                </td>
                            </tr>
                            <br><br><br><br><br>
                    </table>
                    </form>

            </div>
        </div>

    </body>
</html>
