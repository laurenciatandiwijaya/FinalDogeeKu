<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Transaksi</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url()?>assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">
			<?php include('topbar.php'); ?>
			<div class="inner-wrapper">
				<?php include('sidebar.php'); ?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Keranjang</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Transaksi</span></li>
								<li><span>Keranjang</span></li>
								<li><span>Edit Data Keranjang</span></li>
							</ol>
						</div>
					</header>

					<div style="margin-top:-490px;">
						<form id="summary-form" action="<?php echo base_url(). 'Keranjang/editData'?>" method="POST" class="form-horizontal">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Edit Data Keranjang</h2>
								</header>
								<div class="panel-body">
									<div class="validation-message">
										<ul></ul>
									</div>
									<?php
									foreach($keranjang as $list){?>
									<div class="form-group">
										<label class="col-sm-3 control-label">ID Keranjang</label>
										<div class="col-sm-6">
											<input type="text" name="id_keranjang" value="<?php echo $list->id_keranjang; ?>" class="form-control" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Pelanggan<span class="required">*</span></label>
										<div class="col-md-6">
											<input type="hidden" name="id_pelangganAsli" value="<?php echo $list->id_pelanggan; ?>" class="form-control"/>
											<select required name="id_pelangganUbah" data-plugin-selectTwo class="form-control populate">
												<?php foreach($pelanggan as $listPelanggan){ ?>
													<option value="<?php echo $listPelanggan->id_pelanggan; ?>" 
													<?php if($listPelanggan->id_pelanggan == $list->id_pelanggan){
														echo "selected";
														}
													?>>
														<?php $listPelanggan->nama_lengkap;?>
													</option>
												<?php 
												}?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Barang<span class="required">*</span></label>
										<div class="col-md-6">
											<input type="hidden" name="id_barangAsli" value="<?php echo $list->id_barang; ?>" class="form-control"/>
											<select required name="id_barangUbah" data-plugin-selectTwo class="form-control populate">
												<?php foreach($barang as $listBarang){ ?>
													<option value="<?php echo $listBarang->id_barang; ?>"
													<?php if($listBarang->id_barang == $list->id_barang){
														echo "selected";
														}
													?>>
														<?php echo $listBarang->nama_barang ." / Stok: ".$listBarang->jumlah_barang ." / Warna: ".$listBarang->warna ." / "
														.$listBarang->ukuran ." ".$listBarang->satuan ;?>
													</option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Jumlah Barang</label>
										<div class="col-sm-6">
											<input type="number" min="1" max="30" step="1" value="<?php echo $list->jumlah_barang; ?>" 
											name="jumlah_barang" class="spinner-input form-control" title="Isi jumlah barang">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Status Delete</label>
										<div class="col-sm-6">
											<input type="text" name="status_delete" value="<?php echo $list->status_delete; ?>" 
											class="form-control"readonly/>
										</div>
									</div>
									<?php
									}
									?>
								</div>
								
								<footer class="panel-footer">
									<div class="row">
										<div class="col-sm-9 col-sm-offset-3">
											<button class="btn btn-primary">Submit</button>
											<button type="reset" class="btn btn-default">Reset</button>
										</div>
									</div>
								</footer>
							</section>
						</form>
					</div>
				</section>
			</div>

			
		</section>

		<!-- Vendor -->
		<script src="<?php echo base_url()?>assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="<?php echo base_url()?>assets/vendor/select2/select2.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url()?>assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url()?>assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url()?>assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?php echo base_url()?>assets/javascripts/tables/examples.datatables.ajax.js"></script>
		<script src="<?php echo base_url()?>assets/javascripts/forms/examples.advanced.form.js"></script>
	</body>
</html>