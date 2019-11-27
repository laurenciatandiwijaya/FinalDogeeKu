<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">
				
	<div class="sidebar-header">
		<div class="sidebar-title" style="color: white">
			Navigation
		</div>
		<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
			<?php $id_tipe_pengguna = $this->session->userdata("id_tipe_pengguna");
				if($id_tipe_pengguna == "1"){ ?>
				<ul class="nav nav-main">
					<li>
						<a href="<?php echo base_url().'HomeAdmin' ?>">
							<i class="fa fa-home" aria-hidden="true"></i>
							<span>Home</span>
						</a>
					</li>
					<li class="nav-parent">
						<a>
							<i class="fa fa-tasks" aria-hidden="true"></i>
							<span>Master Data</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="<?php echo base_url(). 'TipePengguna' ?>">
									Tipe Pengguna
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'Pekerja' ?>">
									Pekerja
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'Pelanggan' ?> ">
									Pelanggan
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'Jabatan' ?>">
									Jabatan
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'Anjing' ?>">
									Anjing
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'JenisAnjing' ?>">
									Jenis Anjing
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'Barang' ?>">
									Barang
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'KategoriBarang' ?>">
									Kategori Barang
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'Layanan' ?>">
									Layanan
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'DetailLayanan' ?>">
									Detail Layanan
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-parent">
						<a>
							<i class="fa fa-list-alt" aria-hidden="true"></i>
							<span>Schedule</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="<?php echo base_url(). 'Kegiatan' ?>">
									Kegiatan Anjing
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-parent">
						<a>
							<i class="fa fa-heart" aria-hidden="true"></i>
							<span>Layanan</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="<?php echo base_url(). 'ReportKlinik' ?>">
									Report Klinik
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'ReportSalon' ?>">
									Report Salon
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'ReportPenitipan' ?>">
									Report Penitipan
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-parent">
						<a>
							<i class="fa fa-money" aria-hidden="true"></i>
							<span>Transaksi</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="<?php echo base_url(). 'Wishlist' ?>">
									Wishlist
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'Keranjang' ?>">
									Keranjang
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'InvoiceToko' ?>">
									Invoice Toko
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'InvoiceOnline' ?>">
									Invoice Online
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(). 'Transfer' ?>">
									Transfer
								</a>
							</li>
							
						</ul>
					</li>
				</ul>
			<?php 
				}
				else if($id_tipe_pengguna == "2"){ ?>
				<ul class="nav nav-main">
					<li>
						<a href="<?php echo base_url().'HomeManager' ?>">
							<i class="fa fa-home" aria-hidden="true"></i>
							<span>Home</span>
						</a>
					</li>
				</ul>
			<?php	
				}
				else if($id_tipe_pengguna == "3"){ ?>
				<ul class="nav nav-main">
					<li>
						<a href="<?php echo base_url().'HomeKasir' ?>">
							<i class="fa fa-home" aria-hidden="true"></i>
							<span>Home</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'HomeKasir/tampilanInvoiceToko' ?>">
							<i class="fa fa-money" aria-hidden="true"></i>
							<span>Invoice Toko</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'HomeKasir/tampilanTransfer' ?>">
							<i class="fa fa-exchange" aria-hidden="true"></i>
							<span>Verifikasi Transfer</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'HomeKasir/tampilanPengiriman' ?>">
							<i class="fa fa-check-square-o" aria-hidden="true"></i>
							<span>Konfirmasi Pengiriman</span>
						</a>
					</li>
				</ul>
			<?php
				}
				else{ ?>
				<ul class="nav nav-main">
					<li>
						<a href="<?php echo base_url().'HomePekerjaLayanan' ?>">
							<i class="fa fa-home" aria-hidden="true"></i>
							<span>Home</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'HomePekerjaLayanan/tampilanReportUpcoming' ?>">
							<i class="fa fa-sign-in" aria-hidden="true"></i>
							<span>Upcoming Report</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'HomePekerjaLayanan/tampilanReportFinished' ?>">
							<i class="fa fa-check-square-o"  aria-hidden="true"></i>
							<span>Finished Report</span>
						</a>
					</li>
				</ul>	
			
			<?php
				}
			?>
			</div>
		</div>
	</div>
</aside>
			<!-- end: sidebar -->