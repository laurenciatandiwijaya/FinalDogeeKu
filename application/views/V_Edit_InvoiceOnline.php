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
						<h2>Invoice Online</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Transaksi</span></li>
								<li><span>Invoice Online</span></li>
								<li><span>Edit Data Invoice Online .</span></li>
							</ol>
						</div>
					</header>

					<div style="margin-top:-490px;">
						<form id="summary-form" action="<?php echo base_url(). 'InvoiceOnline/editData'?>" method="POST" class="form-horizontal">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Edit Data Invoice Online</h2>
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
										<label class="col-md-3 control-label">Nama Pelanggan<span class="required">*</span></label>
										<div class="col-md-6">
											<select required name="id_pelanggan" data-plugin-selectTwo class="form-control populate">
												<?php foreach($pelanggan as $listPelanggan){ ?>
													<option <?php if($list->id_pelanggan == $listPelanggan->id_pelanggan){ echo "selected"; } ?>
													value="<?php echo $listPelanggan->id_pelanggan; ?>">
														<?php echo $listPelanggan->nama_lengkap;?>
													</option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Tanggal<span class="required">*</span></label>
										<div class="col-md-9">
											<input class="col-md-7" id="datepicker" name="tanggal" type="date" 
											value="<?php echo $list->tanggal; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Jam<span class="required">*</span></label>
										<div class="col-md-9">
											<input class="col-md-7" id="timepicker" name="jam" type="time" 
											value="<?php echo $list->jam; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Metode Pembayaran<span class="required">*</span></label>
										<div class="col-md-6">
											<select required name="metode_pembayaran" data-plugin-selectTwo class="form-control populate">
												<option <?php if($list->metode_pembayaran == "Cash"){ echo "selected"; } ?> 
												value="Cash">Cash</option>
												<option <?php if($list->metode_pembayaran == "Transfer"){ echo "selected"; } ?> 
												value="Transfer">Transfer</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Total Harga<span class="required">*</span></label>
										<div class="col-sm-6">
											<div class="input-group mb-md">
												<span class="input-group-addon">Rp</span>
												<input type="text" name="total" class="form-control" value="<?php echo $list->total; ?>"
												title="Isi total harga"readonly/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Status Invoice<span class="required">*</span></label>
										<div class="col-sm-6">
											<select name="status_invoice" class="form-control" required>
												<option <?php if($list->status_invoice == "Lunas"){ echo "selected"; } ?> 
												value="Lunas">Lunas</option>
												<option <?php if($list->status_invoice == "Belum Lunas"){ echo "selected"; } ?> 
												value="Belum Lunas">Belum Lunas</option>
												<option <?php if($list->status_invoice == "Batal"){ echo "selected"; } ?> 
												value="Batal">Batal</option>
											</select>
											<label class="error" for="company"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Status Delete</label>
										<div class="col-sm-6">
											<input type="text" name="status_delete" value="<?php echo $list->status_delete; ?>" class="form-control"readonly/>
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