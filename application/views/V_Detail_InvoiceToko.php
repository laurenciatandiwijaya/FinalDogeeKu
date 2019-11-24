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
						<h2>Invoice Toko</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Transaksi</span></li>
								<li><span>Invoice Toko</span></li>
								<li><span>Detail Data Invoice Toko .</span></li>
							</ol>
						</div>
					</header>

					<div style="margin-top:-490px;">
							<form id="summary-form" action="<?php echo base_url(). 'InvoiceToko/index'?>" method="POST" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title">Detail Data Invoice Toko</h2>
									</header>
									<div class="panel-body">
										<div class="validation-message">
											<ul></ul>
										</div>
									<?php
									foreach($invoice as $list){

									?>
										<div class="form-group">
											<label class="col-sm-3 control-label">ID Invoice</label>
											<div class="col-sm-6">
												<input type="text" name="id_invoice" value="<?php echo $list->id_invoice; ?>" 
												class="form-control" readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Tanggal</label>
											<div class="col-sm-6">
												<input type="text" name="tanggal" value="<?php echo $list->tanggal; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Jam</label>
											<div class="col-sm-6">
												<input type="text" name="jam" value="<?php echo $list->jam; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Metode Pembayaran</label>
											<div class="col-sm-6">
												<input type="text" name="metode_pembayaran" value="<?php echo $list->metode_pembayaran; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Total</label>
											<div class="col-sm-6">
												<input type="text" name="total" value="<?php echo $list->total; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Status Invoice</label>
											<div class="col-sm-6">
												<input type="text" name="status_delete" value="<?php echo $list->status_invoice; ?>" class="form-control"readonly/>
											</div>
										</div><br>
										<?php foreach($detailInvoiceBarang as $listBarang){ $i=1; ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Barang <?php echo $i; ?></label>
											<div class="col-sm-6">
												<input type="text" name="id_barang" value="<?php echo $listBarang->nama_barang ." / Warna: ".$listBarang->warna 
												." / ".$listBarang->ukuran ." ".$listBarang->satuan; ?>" 
												class="form-control"readonly/>
											</div>
											<label class="col-sm-2 control-label">Jumlah: <?php echo $listBarang->jumlah_barang; ?></label>
										</div>
										<?php
										$i++;
										} ?><br>
										<div class="form-group">
											<label class="col-sm-3 control-label">Status Delete</label>
											<div class="col-sm-6">
												<input type="text" name="status_delete" value="<?php echo $list->status_delete; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">User Add</label>
											<div class="col-sm-6">
												<input type="text" name="user_add" value="<?php echo $list->user_add; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Waktu Add</label>
											<div class="col-sm-6">
												<input type="text" name="waktu_add" value="<?php echo $list->waktu_add; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">User Edit</label>
											<div class="col-sm-6">
												<input type="text" name="user_edit" value="<?php echo $list->user_edit; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Waktu Edit</label>
											<div class="col-sm-6">
												<input type="text" name="waktu_edit" value="<?php echo $list->waktu_edit; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">User delete</label>
											<div class="col-sm-6">
												<input type="text" name="user_delete" value="<?php echo $list->user_delete; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Waktu Delete</label>
											<div class="col-sm-6">
												<input type="text" name="waktu_delete" value="<?php echo $list->waktu_delete; ?>" class="form-control"readonly/>
											</div>
										</div>
									<?php
									}
									?>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button type="submit" class="btn btn-default">Back</button>
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
	</body>
</html>