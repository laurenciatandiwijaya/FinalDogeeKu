<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Verifikasi Transfer</title>
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
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />

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
						<h2>Verifikasi Transfer</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Verifikasi Transfer</span></li>
								<li><span>Edit Data Transfer</span></li>
							</ol>
						</div>
					</header>

					<div style="margin-top:-490px;">
						<form id="summary-form" action="<?php echo base_url(). 'HomeKasir/editDataTransfer'?>" method="POST" class="form-horizontal">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Edit Data Transfer</h2>
								</header>
								<div class="panel-body">
									<div class="validation-message">
										<ul></ul>
									</div>
									<?php foreach($transfer as $listTransfer){?>

									<div class="form-group">
										<label class="col-sm-3 control-label">ID Transfer</label>
										<div class="col-sm-6">
											<input type="text" name="id_transfer" value="<?php echo $listTransfer->id_transfer; ?>" 
											class="form-control" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Nama Bank<span class="required">*</span></label>
										<div class="col-md-6">
											<input type="text" name="nama_bank" value="<?php echo $listTransfer->nama_bank; ?>" 
											class="form-control" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Nomor Rekening<span class="required">*</span></label>
										<div class="col-sm-6">
											<input type="text" name="nomor_rekening" value="<?php echo $listTransfer->nomor_rekening; ?>" 
											class="form-control" readonly/>										
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Pengirim<span class="required">*</span></label>
										<div class="col-sm-6">
											<input type="text" name="nama_pengirim" value="<?php echo $listTransfer->nama_pengirim; ?>" 
											class="form-control" readonly/>										
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Tanggal<span class="required">*</span></label>
										<div class="col-md-6">
											<input type="text" name="tanggal" value="<?php echo $listTransfer->tanggal; ?>" 
											class="form-control" readonly/>	
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Total Transfer<span class="required">*</span></label>
										<div class="col-sm-6">
											<input type="text" name="total" value="<?php echo $listTransfer->total; ?>" 
											class="form-control" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Status Transfer<span class="required">*</span></label>
										<div class="col-md-6">
											<select required name="status_transfer" data-plugin-selectTwo class="form-control populate">
												<option <?php if($listTransfer->status_transfer == "Berhasil"){
														echo "selected";
													} ?> value="Berhasil">Berhasil
												</option>
												<option <?php if($listTransfer->status_transfer == "Batal"){
														echo "selected";
													} ?> value="Batal">Batal
												</option>
											</select>
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
		<!-- Untuk Jam -->
		<script src="<?php echo base_url()?>assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		
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