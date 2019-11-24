<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
        ntegrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> 
    </head>


    <body>

         <?php include('Pside-bar.php'); ?>
           
        <div class="main" id="main">
            <?php include('Ptop-bar.php'); ?>

            <div id="S0">
                 <div class="welcome">
                    <h1 >Layanan Salon</h1>
                </div>
        
                <div class="desc">
                    <p>Layanan salon adalah layanan yang menjadi fokus DogeeKu. Layanan ini berfokus pada
                       kecantikan anjing. Kami memiliki dokter kecantikan yang profesional dan sangat mengerti mengenai
                        perawatan anjing. Hasil yang memuaskan pelanggan adalah tujuan yang ingin kami capai.
                    </p>
                </div>
            </div>
        </div>

        <script>
                function sidebar_open() {
                document.getElementById("main").style.width = "80%";
                document.getElementById("main").style.marginLeft = "20%";
                document.getElementById("mySidebar").style.width = "20%";
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("openNav").style.display = 'none';
                document.getElementById("main").style.marginTop = "185px";
                document.getElementById("leftS6").style.width = "35%";
                document.getElementById("rightS6").style.width = "40%";
                document.getElementById("top_navigation").style.marginRight = "20%";
                }
                function sidebar_close() {
                document.getElementById("main").style.width = "100%";
                document.getElementById("main").style.marginLeft = "0%";
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("openNav").style.display = "inline-block";
                document.getElementById("top_navigation").style.marginRight = "0%";
                }

        </script>

    </body>
</html>
