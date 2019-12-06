			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
				<?php $id_tipe_pengguna = $this->session->userdata("id_tipe_pengguna"); ?>
					<a href="<?php 
					if($id_tipe_pengguna == "1"){
						echo base_url().'HomeAdmin';
					}
					else if($id_tipe_pengguna == "2"){
						echo base_url().'HomeManager';
					}
					else if($id_tipe_pengguna == "3"){
						echo base_url().'HomeKasir';
					}
					else{
						echo base_url().'HomePekerjaLayanan';
					}?>" class="logo">
						<img src="<?php echo base_url()?>assets/img/logo_DogeeKu.png" height="50" width="65" alt="JSOFT Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?php echo base_url()?>assets/images/usericon.png" alt="Joseph Doe" class="img-circle" data-lock-picture="<?php echo base_url()?>assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name"><?php echo $this->session->userdata("nama"); ?></span>
								<span class="role">
								<?php 
								if($id_tipe_pengguna == "1"){
									echo "Admin";
								}
								else if($id_tipe_pengguna == "2"){
									echo "Manager";
								}
								else if($id_tipe_pengguna == "3"){
									echo "Kasir";
								}
								else{
									echo "Pekerja Layanan";
								}?>
								</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url().'Login/tampilanEditProfilPekerja'?>">
									<i class="fa fa-pencil"></i>Edit Profil</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url().'Login/tampilanGantiPasswordPekerja'?>">
									<i class="fa fa-user"></i>Ganti Password</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url().'Login/coba_logout'?>">
									<i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->
