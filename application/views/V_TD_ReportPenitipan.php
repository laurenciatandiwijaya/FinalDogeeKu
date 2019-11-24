<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Layanan</title>
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
						<h2>Report Penitipan</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Layanan</span></li>
								<li><span>Report Penitipan</span></li>
								<li><span>Tambah Data Report Penitipan</span></li>
							</ol>
						</div>
					</header>

					<div style="margin-top:-490px;">
						<form id="summary-form" action="<?php echo base_url(). 'ReportSalon/tambahData'?>" method="POST" class="form-horizontal">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Tambah Data Report Penitipan</h2>
								</header>
								<div class="panel-body">
									<div class="validation-message">
										<ul></ul>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Nama Anjing / Pemilik<span class="required">*</span></label>
										<div class="col-md-6">
											<select required name="id_anjing" data-plugin-selectTwo class="form-control populate">
												<option disabled value="" Selected>Pilih Anjing</option>
												<?php foreach($anjing as $list){ ?>
													<option value="<?php echo $list->id_anjing; ?>">
														<?php echo $list->nama_anjing ." / Pemilik : ". $list->nama_lengkap;?>
													</option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Nama Pekerja<span class="required">*</span></label>
										<div class="col-md-6">
											<select required name="id_pekerja" data-plugin-selectTwo class="form-control populate">
												<option disabled value="" Selected>Pilih Pekerja</option>
												<?php foreach($pekerja as $list){ 
													if($list->id_jabatan == "6"){?>
														<option value="<?php echo $list->id_pekerja; ?>">
															<?php echo $list->nama_lengkap; ?>
														</option>
												<?php
												 	}
												}?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Tanggal<span class="required">*</span></label>
										<div class="col-md-9">
											<input class="col-md-5" id="datepicker" name="tanggal" type="date" value="<?php date("Y-m-d"); ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Jam<span class="required">*</span></label>
										<div class="col-sm-9">
											<input class="col-md-5" id="timepicker" name="jam" type="time" value="12:30" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Keterangan<span class="required">*</span></label>
										<div class="col-sm-6">
											<input type="text" name="keterangan" class="form-control" title="Isi Keterangan"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Status Report<span class="required">*</span></label>
										<div class="col-sm-6">
											<select name="status_report" class="form-control" required>
												<option disabled value="" Selected>Pilih Status</option>
												<option value="Menunggu">Menunggu</option>
												<option value="Selesai">Selesai</option>
												<option value="Batal">Batal</option>
											</select>
										</div>
									</div><br>
									<div class="form-group">
										<label class="col-md-3 control-label">Layanan Penitipan 1<span class="required">*</span></label>
										<div class="col-md-6">
											<select required name="id_detail_layanan[]" data-plugin-selectTwo class="form-control populate">
												<option disabled value="" Selected>Pilih Layanan</option>
												<?php foreach($detailLayanan as $list){ ?>
													<option value="<?php echo $list->id_detail_layanan; ?>">
														<?php echo $list->nama_detail_layanan;?>
													</option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Layanan Penitipan 2</label>
										<div class="col-md-6">
											<select name="id_detail_layanan[]" data-plugin-selectTwo class="form-control populate">
												<option disabled value="" Selected>Pilih Layanan</option>
												<?php foreach($detailLayanan as $list){ ?>
													<option value="<?php echo $list->id_detail_layanan; ?>">
														<?php echo $list->nama_detail_layanan;?>
													</option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Layanan Penitipan 3</label>
										<div class="col-md-6">
											<select name="id_detail_layanan[]" data-plugin-selectTwo class="form-control populate">
												<option disabled value="" Selected>Pilih Layanan</option>
												<?php foreach($detailLayanan as $list){ ?>
													<option value="<?php echo $list->id_detail_layanan; ?>">
														<?php echo $list->nama_detail_layanan;?>
													</option>
												<?php }?>
											</select>
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