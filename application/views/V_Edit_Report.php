<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Report DogeeKu</title>
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
						<h2>Report</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Report</span></li>
								<li><span>Edit Report .</span></li>
							</ol>
						</div>
					</header>

					<div style="margin-top:-490px;">
						<form id="summary-form" action="<?php echo base_url(). ''?>" method="POST" class="form-horizontal">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="<?php echo base_url(). ''?>" class="fa fa-times"></a>
									</div>
									<h2 class="panel-title">Edit Report</h2>
								</header>
								<div class="panel-body">
									<div class="validation-message">
										<ul></ul>
									</div>
								<?php
									foreach($report as $list){
								?>
									<div class="form-group">
										<label class="col-sm-3 control-label">ID Report</label>
										<div class="col-sm-6">
											<input type="text" name="id_kegiatan" value="<?php echo $list->id_report; ?>" 
											class="form-control" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Anjing / Pemilik</label>
										<div class="col-sm-6">
										<?php
										foreach($anjingPemilik as $listAP){
											if($list->id_anjing == $listAP->id_anjing){
										?>
											<input type="text" name="id_anjing" value="<?php echo $listAP->nama_anjing . " / ". $listAP->nama_lengkap ; ?>" 
											class="form-control"readonly/>
										<?php
											}
										}
										?>
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
										<label class="col-sm-3 control-label">Keterangan</label>
										<div class="col-sm-6">
											<input type="text" name="keterangan" value="<?php echo $list->keterangan; ?>" 
											class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Status Report<span class="required">*</span></label>
										<div class="col-sm-6">
											<?php 
											if($list->status_report == "Menunggu"){ ?>
												<select name="status_report" class="form-control" required>
													<option value="Selesai">Selesai</option>
													<option value="Batal">Batal</option>
												</select>
											<?php
											}
											else{ ?>
												<input type="text" name="status_report" value="<?php echo $list->status_report; ?>" 
												class="form-control" readonly/>
											<?php
											}
											?>
										</div>
									</div>
								<?php
									}
								?>
								</div>
								<footer class="panel-footer">
									<div class="row">
										<div class="col-sm-9 col-sm-offset-3">
											<button class="btn btn-primary">Simpan</button>
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