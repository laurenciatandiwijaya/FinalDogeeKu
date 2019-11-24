<head>
    <style>
       .header{
          color: #FEFFE4;
          background-color: #5A3921; 
          font-size:100%;
        }

        .fa-bars{
          color:white;
        }

        .header_phone{
          width:50%;
          height:100%;
        }

        .user a, .header_phone a{
          color:  #FEFFE4;
          text-align: center;
          padding:1.2% 1.2%;
          text-decoration: none;
          font-size: 130%;
          height:100%;
        }

        .user a:hover, .header_phone a:hover{
          color:#5A3921;
          background-color: #FEFFE4;
          color:#5A3921;
        }

        .user a.active, .header_phone a.active{
          background-color: #F77754;
          color:  #FEFFE4;
        }

        .user a:hover  .fas, .header_phone a:hover .fas{
          color:#5A3921;
          background-color: #FEFFE4;
        }

        .fas{
          color:#FEFFE4;
        }

        .fas:hover{
          color:#5A3921;
        }
    </style>
</head>

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="<?php echo base_url()?>PHome">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="<?php echo base_url()?>assets/images/logo_1.png" alt=""></div>
						<div>DogeeKu</div>
					</div>
				</a>	
			</div>
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<nav class="main_nav">
				
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
        <div class="user">
            <a href="<?php echo base_url()?>PShop">
               Shop
            </a>
        </div>
        <div class="user">
            <a href="<?php echo base_url()?>PPlanner">
               Planner
            </a>
        </div>
        <div class="user">
            <a  href="<?php echo base_url()?>PWishlist">
              <i class="fas fa-heart"></i>
            </a>
        </div>
        <div class="user">
            <a  href="<?php echo base_url()?>PKeranjang">
              <div>
                <i class="fas fa-cart-plus"></i>
                <div>1</div>
              </div>
            </a>
        </div>
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
          <a href="<?php echo base_url()?>Login/account">
                <div>
                  <i class="fas fa-user"></i>
                  <?php echo $this->session->userdata("nama"); ?>
                </div>
          </a>
				</div>
			</div>
		</div>
	</header>