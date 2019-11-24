<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Schedule</title>
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
						<h2>Kegiatan Anjing</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Schedule</span></li>
								<li><span>Kegiatan</span></li>
								<li><span>Edit Data Kegiatan Anjing  .</span></li>
							</ol>
						</div>
					</header>

					<div style="margin-top:-490px;">
							<form id="summary-form" action="<?php echo base_url(). 'Kegiatan/editData'?>" method="POST" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title">Edit Data Kegiatan Anjing</h2>
									</header>
									<div class="panel-body">
										<div class="validation-message">
											<ul></ul>
										</div>
									<?php
										foreach($kegiatan as $listKegiatan){
									?>
										<div class="form-group">
											<label class="col-sm-3 control-label">ID Kegiatan</label>
											<div class="col-sm-6">
												<input type="text" name="id_kegiatan" value="<?php echo $listKegiatan->id_kegiatan; ?>" 
												class="form-control" readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Anjing / Pemilik<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="hidden" name="id_anjingAsli" value="<?php echo $listKegiatan->id_anjing; ?>" class="form-control"/>
												<select name="id_anjingUbah" data-plugin-selectTwo class="form-control populate" required>
													<option disabled value="" Selected>Pilih Anjing</option>
													<?php foreach($anjingPemilik as $list){ ?>
														<option value="<?php echo $list->id_anjing; ?>"
														<?php if($listKegiatan->id_anjing == $list->id_anjing){ 
																echo "selected"; 
																} ?>>
															<?php echo $list->nama_anjing . " / " .$list->nama_lengkap;?>
														</option>
													<?php }?>
												</select>
												<label class="error" for="company"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Kegiatan<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="hidden" name="nama_kegiatanAsli" value="<?php echo $listKegiatan->nama_kegiatan; ?>" class="form-control"/>
												<input type="text" name="nama_kegiatanUbah" value="<?php echo $listKegiatan->nama_kegiatan; ?>" class="form-control" required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Tanggal<span class="required">*</span></label>
											<div class="col-md-9">
												<input name="tanggalAsli" type="hidden" value="<?php echo $listKegiatan->tanggal; ?>">
												<input class="col-md-7" id="datepicker" name="tanggalUbah" type="date" 
												value="<?php echo $listKegiatan->tanggal; ?>" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Jam<span class="required">*</span></label>
											<div class="col-md-9">
												<input name="jamAsli" type="hidden" value="<?php echo $listKegiatan->jam; ?>">
												<input class="col-md-7" id="timepicker" name="jamUbah" type="time" 
												value="<?php echo $listKegiatan->jam; ?>" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Status Kegiatan<span class="required">*</span></label>
											<div class="col-sm-6">
												<select name="status_kegiatan" class="form-control" required>
													<option value="Selesai" <?php if($listKegiatan->status_kegiatan == "Selesai"){
														echo "selected"; } ?>>Selesai</option>
													<option value="Belum selesai" <?php if($listKegiatan->status_kegiatan == "Belum selesai"){
														echo "selected"; } ?>>Belum selesai</option>
												</select>
												<label class="error" for="company"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Status Delete</label>
											<div class="col-sm-6">
												<input type="text" name="status_delete" value="<?php echo $listKegiatan->status_delete; ?>" class="form-control"readonly/>
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