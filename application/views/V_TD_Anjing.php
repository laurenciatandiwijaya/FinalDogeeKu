<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Master Data DogeeKu</title>
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
						<h2>Anjing</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Master Data</span></li>
								<li><span>Anjing</span></li>
								<li><span>Tambah Data Anjing</span></li>
							</ol>
						</div>
					</header>

					<div style="margin-top:-490px;">
						<form id="summary-form" action="<?php echo base_url(). 'Anjing/tambahData'?>" method="POST" class="form-horizontal">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Tambah Data Anjing</h2>
								</header>
								<div class="panel-body">
									<div class="validation-message">
										<ul></ul>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Anjing<span class="required">*</span></label>
										<div class="col-sm-6">
											<input type="text" name="nama_anjing" class="form-control" title="Isi Nama Anjing"required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Pemilik<span class="required">*</span></label>
										<div class="col-sm-6">
											<select name="id_pelanggan" data-plugin-selectTwo class="form-control populate" required>
												<option disabled value="" Selected>Pilih Nama Pemilik</option>

												<?php foreach($pemilik as $list){ ?>
													<option value="<?php echo $list->id_pelanggan; ?>">
														<?php echo $list->nama_lengkap;?>
													</option>
												<?php }?>
											</select>
											<label class="error" for="company"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Jenis Anjing<span class="required">*</span></label>
										<div class="col-sm-6">
											<select name="id_jenis_anjing" data-plugin-selectTwo class="form-control populate" required>
												<option disabled value="" Selected>Pilih Jenis Anjing</option>

												<?php foreach($jenis_anjing as $list){ ?>
													<option value="<?php echo $list->id_jenis_anjing; ?>">
														<?php echo $list->nama_jenis_anjing;?>
													</option>
												<?php }?>
											</select>
											<label class="error" for="company"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Jenis Kelamin<span class="required">*</span></label>
										<div class="col-sm-6">
											<select name="jenis_kelamin" class="form-control" required>
												<option disabled value="">Pilih Jenis Kelamin</option>
												<option value="L">Laki-Laki</option>
												<option value="P">Perempuan</option>
											</select>
											<label class="error" for="company"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Berat Badan (kg)<span class="required">*</span></label>
										<div class="col-sm-6">
											<input type="text" name="berat_badan" class="form-control" title="Isi Berat Badan"required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Tinggi (cm)<span class="required">*</span></label>
										<div class="col-sm-6">
											<input type="text" name="tinggi" class="form-control" title="Isi Tinggi Anjing"required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Tanggal Lahir<span class="required">*</span></label>
										<div class="col-md-3">
											<input id="datepicker" name="tanggal_lahir" type="date" value="<?php date("Y-m-d"); ?>" required>
										</div>
									</div>
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