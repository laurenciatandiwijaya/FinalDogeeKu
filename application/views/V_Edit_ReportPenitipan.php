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
								<li><span>Edit Data Report Penitipan  .</span></li>
							</ol>
						</div>
					</header>

					<div style="margin-top:-490px;">
						<form id="summary-form" action="<?php echo base_url(). 'ReportSalon/editData'?>" method="POST" class="form-horizontal">
							<section class="panel">
							<header class="panel-heading">
									<h2 class="panel-title">Edit Data Report Penitipan</h2>
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
											<input type="text" name="id_report_penitipan" value="<?php echo $list->id_report_penitipan; ?>" 
											class="form-control" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Nama Anjing / Pemilik<span class="required">*</span></label>
										<div class="col-md-6">
											<input type="hidden" name="id_anjingAsli" value="<?php echo $list->id_anjing; ?>" class="form-control"/>
											<select required name="id_anjingUbah" data-plugin-selectTwo class="form-control populate">
												<?php foreach($anjing as $listAnjing){ ?>
													<option value="<?php echo $listAnjing->id_anjing; ?>" <?php
														if($list->id_anjing == $listAnjing->id_anjing){ echo "selected"; } ?>>
														<?php echo $listAnjing->nama_anjing ." / Pemilik : ". $listAnjing->nama_lengkap;?>
													</option>
												<?php }?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Nama Pekerja<span class="required">*</span></label>
										<div class="col-md-6">
										<input type="hidden" name="id_pekerjaAsli" value="<?php echo $list->id_pekerja; ?>" class="form-control"/>
											<select required name="id_pekerjaUbah" data-plugin-selectTwo class="form-control populate">
												<?php foreach($pekerja as $listPekerja){ 
													if($listPekerja->id_jabatan == "6"){?>
														<option value="<?php echo $listPekerja->id_pekerja; ?>" <?php
														if($list->id_pekerja == $listPekerja->id_pekerja){ echo "selected"; } ?>>
															<?php echo $listPekerja->nama_lengkap; ?>
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
											<input type="hidden" name="tanggalAsli" value="<?php echo $list->tanggal; ?>" class="form-control"/>
											<input class="col-md-5" id="datepicker" name="tanggalUbah" type="date" 
											value="<?php echo $list->tanggal; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Jam<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="hidden" name="jamAsli" value="<?php echo $list->jam; ?>" class="form-control"/>
											<input class="col-md-5" id="timepicker" name="jamUbah" type="time" 
											value="<?php echo $list->jam; ?>" required>
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
													<option value="Selesai" <?php 
													if($list->status_report == "Selesai"){ echo "selected"; } ?>>Selesai</option>
													<option value="Batal" <?php 
													if($list->status_report == "Batal"){ echo "selected"; } ?>>Batal</option>
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