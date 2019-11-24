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
								<li><span>Tambah Data Barang</span></li>
							</ol>
						</div>
					</header>

					<div style="margin-top:-490px;">
						<form id="summary-form" action="<?php echo base_url(). 'Barang/tambahData'?>" method="POST" class="form-horizontal">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Edit Data Barang</h2>
								</header>
								<div class="panel-body">
									<div class="validation-message">
										<ul></ul>
									</div>
									<?php
									foreach($barang as $list){ ?>
									<div class="form-group">
										<label class="col-sm-3 control-label">ID Barang</label>
										<div class="col-sm-6">
											<input type="text" name="id_barang" value="<?php echo $list->id_barang; ?>" 
											class="form-control" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Kategori Barang<span class="required">*</span></label>
										<div class="col-sm-6">
											<input type="hidden" name="id_kategori_barangAsli" value="<?php echo $list->id_kategori_barang; ?>" />
											<select name="id_kategori_barangUbah" data-plugin-selectTwo class="form-control populate" required>
												<?php foreach($kategori_barang as $listKB){ ?>
													<option value="<?php echo $listKB->id_kategori_barang; ?>"
													<?php if($listKB->id_kategori_barang == $list->id_kategori_barang){
														echo "selected";
													} ?>>
														<?php echo $list->nama_kategori_barang;?>
													</option>
												<?php }?>
											</select>
											<label class="error" for="company"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Barang<span class="required">*</span></label>
										<div class="col-sm-6">
											<input type="hidden" name="nama_barangAsli" value="<?php echo $list->nama_barang; ?>" />
											<input type="text" name="nama_barangUbah" class="form-control" 
											value="<?php echo $list->nama_barang; ?>"required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Jumlah Barang<span class="required">*</span></label>
										<div class="col-sm-6">
											<input type="number" min="1" max="1000" step="1" value="<?php echo $list->jumlah_barang; ?>" 
											name="jumlah_barang" class="spinner-input form-control" title="Isi jumlah barang"required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Harga Barang<span class="required">*</span></label>
										<div class="col-sm-6">
											<div class="input-group mb-md">
												<span class="input-group-addon">Rp</span>
												<input type="text" name="harga" class="form-control" 
												value="<?php echo $list->harga; ?>"required/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Warna</label>
										<div class="col-md-6">
											<input type="hidden" name="warnaAsli" value="<?php echo $list->warna; ?>" />
											<select required name="warnaUbah" data-plugin-selectTwo class="form-control populate">
												<option value="-" <?php if($list->warna == "-"){
													echo "selected"; } ?>>Tidak ada warna</option>
												<option value="Merah" <?php if($list->warna == "Merah"){
													echo "selected"; } ?>>Merah</option>
												<option value="Kuning" <?php if($list->warna == "Kuning"){
													echo "selected"; } ?>>Kuning</option>
												<option value="Hijau" <?php if($list->warna == "Hijau"){
													echo "selected"; } ?>>Hijau</option>
												<option value="Biru" <?php if($list->warna == "Biru"){
													echo "selected"; } ?>>Biru</option>
												<option value="Abu" <?php if($list->warna == "Abu"){
													echo "selected"; } ?>>Abu</option>
												<option value="Hitam" <?php if($list->warna == "Hitam"){
													echo "selected"; } ?>>Hitam</option>
												<option value="Putih" <?php if($list->warna == "Putih"){
													echo "selected"; } ?>>Putih</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Ukuran</label>
										<div class="col-sm-2">
											<input type="hidden" name="ukuranAsli" value="<?php echo $list->ukuran; ?>" />
											<input type="number" min="1" max="1000" step="1" value="<?php echo $list->ukuran; ?>" 
											name="ukuranUbah" class="spinner-input form-control">
										</div>
										<label class="col-sm-2 control-label">Satuan</label>
										<div class="col-sm-2">
											<input type="hidden" name="satuanAsli" value="<?php echo $list->satuan; ?>" />
											<select name="satuanUbah" data-plugin-selectTwo class="form-control populate">
												<option value="cm" <?php if($list->satuan == "cm"){
													echo "selected"; } ?>>cm</option>
												<option value="gram" <?php if($list->satuan == "gram"){
													echo "selected"; } ?>>gram</option>
												<option value="mililiter" <?php if($list->satuan == "mililiter"){
													echo "selected"; } ?>>mililiter</option>
												<option value="liter" <?php if($list->satuan == "liter"){
													echo "selected"; } ?>>liter</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Keterangan</label>
										<div class="col-sm-6">
											<input type="text" name="keterangan" class="form-control" 
											value="<?php echo $list->keterangan; ?>"/>
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