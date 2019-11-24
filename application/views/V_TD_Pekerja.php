<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Master Data</title>
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

		<!-- Buat tanggal -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	</head>
	<body>
		<section class="body">
			<?php include('topbar.php'); ?>
			<div class="inner-wrapper">
				<?php include('sidebar.php'); ?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Pekerja</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Master Data</span></li>
								<li><span>Pekerja</span></li>
								<li><span>Tambah Data Pekerja  .</span></li>
							</ol>
						</div>
					</header>

					<div style="margin-top:-490px;">
							<form id="summary-form" action="<?php echo base_url(). 'Pekerja/tambahData'?>" 
							method="POST" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title">Tambah Data Pekerja</h2>
									</header>
									<div class="panel-body">
										<div class="validation-message">
											<ul></ul>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Lengkap<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="text" name="nama_lengkap" class="form-control" title="Isi Nama Lengkap"required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Jabatan<span class="required">*</span></label>
											<div class="col-md-6">
												<select required name="id_jabatan" data-plugin-selectTwo class="form-control populate">
													<option disabled value="" Selected>Pilih Jabatan</option>
													<?php foreach($jabatan as $listJabatan){ ?>
														<option value="<?php echo $listJabatan->id_jabatan; ?>">
															<?php echo $listJabatan->nama_jabatan ;?>
														</option>
													<?php }?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Tanggal Lahir<span class="required">*</span></label>
											<div class="col-md-3">
												<input id="datepicker" name="tanggal_lahir" type="date" value="<?php date("Y-m-d"); ?>" required>
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
											<label class="col-sm-3 control-label">No Hp<span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="text" name="no_hp" class="form-control" title="Isi Nomor Hp"required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="textareaAutosize">Alamat<span class="required">*</span></label>
											<div class="col-md-6">
												<textarea name="alamat" class="form-control" rows="3" title="Isi Alamat" data-plugin-textarea-autosize></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Tanggal Masuk<span class="required">*</span></label>
											<div class="col-md-3">
												<input id="datepicker2" name="tanggal_masuk" type="date" value="<?php date("Y-m-d"); ?>" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
											<div class="col-sm-6">
												<input type="email" name="email" class="form-control" title="Isi Alamat Email"  required/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="inputPassword">Password<span class="required">*</span></label>
											<div class="col-md-6">
												<input type="password" name="password" class="form-control" title="Isi Password" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Tipe Pengguna<span class="required">*</span></label>
											<div class="col-md-6">
												<select required name="id_tipe_pengguna" data-plugin-selectTwo class="form-control populate">
													<option disabled value="" Selected>Pilih Tipe Pengguna</option>
													<?php foreach($tipePengguna as $listTP){ ?>
														<option value="<?php echo $listTP->id_tipe_pengguna; ?>">
															<?php echo $listTP->nama_tipe_pengguna ;?>
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
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url()?>assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url()?>assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url()?>assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?php echo base_url()?>assets/javascripts/tables/examples.datatables.ajax.js"></script>

		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	</body>
</html>