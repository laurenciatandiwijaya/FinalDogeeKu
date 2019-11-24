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

	</head>
	<body>
		<section class="body">
			<?php include('topbar.php'); ?>
			<div class="inner-wrapper">
				<?php include('sidebar.php'); ?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Barang</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Master Data</span></li>
								<li><span>Barang</span></li>
								<li><span>Detail Barang  .</span></li>
							</ol>
						</div>
					</header>

					<div style="margin-top:-490px;">
							<form id="summary-form" action="<?php echo base_url(). 'Barang/index'?>" method="POST" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
										<h2 class="panel-title">Detail Data Barang</h2>
									</header>
									<div class="panel-body">
										<div class="validation-message">
											<ul></ul>
										</div>
									<?php
										foreach($barang as $list){
									?>
										<div class="form-group">
											<label class="col-sm-3 control-label">ID Barang</label>
											<div class="col-sm-6">
												<input type="text" name="id_barang" value="<?php echo $list->id_barang; ?>" 
												class="form-control" readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Kategori Barang<span class="required">*</span></label>
											<div class="col-md-6">
												<?php foreach($kategori_barang as $listKB){ 
													if($list->id_kategori_barang == $listKB->id_kategori_barang){ ?>
														<input type="text" name="" value="<?php echo $listKB->nama_kategori_barang; ?>" 
														class="form-control" readonly/>
													<?php
													}
												}
												?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Barang</label>
											<div class="col-sm-6">
												<input type="text" name="nama_barang" value="<?php echo $list->nama_barang; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Jumlah Barang</label>
											<div class="col-sm-6">
												<input type="text" name="jumlah_barang" value="<?php echo $list->jumlah_barang; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Harga</label>
											<div class="col-sm-6">
												<input type="text" name="harga" value="<?php echo $list->harga; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Warna</label>
											<div class="col-sm-6">
												<input type="text" name="warna" value="<?php echo $list->warna; ?>" class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Ukuran</label>
											<div class="col-sm-6">
												<input type="text" name="ukuran" value="<?php echo $list->ukuran ." ".$list->satuan; ?>" 
												class="form-control"readonly/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Keterangan</label>
											<div class="col-sm-6">
												<input type="text" name="keterangan" value="<?php echo $list->keterangan; ?>" class="form-control"readonly/>
											</div>
										</div>
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