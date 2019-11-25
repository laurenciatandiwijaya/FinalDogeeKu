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
						<form id="summary-form" action="<?php echo base_url(). 'HomePekerjaLayanan/editReport'?>" method="POST" class="form-horizontal">
							<section class="panel">
								<header class="panel-heading">
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
											<input type="text" name="id_report" value="<?php echo $list->id_report; ?>" 
											class="form-control" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Anjing</label>
										<div class="col-sm-6">
											<input type="text" name="nama_anjing" value="<?php echo $list->nama_anjing; ?>" class="form-control"readonly/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Pemilik</label>
										<div class="col-sm-6">
											<input type="text" name="nama_pelanggan" value="<?php echo $list->nama_pelanggan; ?>" class="form-control"readonly/>
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
									</div><br>
									<?php foreach($detailLayanan as $listDetLay){ $i=1; ?>
									<div class="form-group">
										<label class="col-sm-3 control-label">Layanan <?php echo $i; ?></label>
										<div class="col-sm-6">
											<input type="text" name="detail_layanan" value="<?php echo $listDetLay->nama_detail_layanan; ?>" 
											class="form-control"readonly/>
										</div>
									</div>
									<?php
									$i++;
									} ?><br>

									<?php
									$id_tipe_pengguna = $this->session->userdata("id_tipe_pengguna");
									if($id_tipe_pengguna == "4"){
										if($jumlahObat > 0){
											foreach($obatDalamReport as $listObat1){ $i=1; ?>
												<div class="form-group">
													<label class="col-sm-3 control-label">Obat <?php echo $i; ?></label>
													<div class="col-sm-6">
														<input type="text" name="id_barang" value="<?php echo $listObat1->nama_barang 
														." / ".$listObat1->ukuran ." ".$listObat1->satuan; ?>" 
														class="form-control"readonly/>
													</div>
													<label class="control-label">Jumlah : <?php echo $listObat1->jumlah_barang; ?></label>
													
												</div>
												<?php
												$i++;
											}
										}
										else{ ?>
											<div class="form-group">
												<label class="col-md-3 control-label">Obat 1</label>
												<div class="col-md-6">
													<select name="id_barang[]" data-plugin-selectTwo class="form-control populate">
														<option disabled value="" Selected>Pilih Obat</option>
														<option value="">Unselect Obat</option>
														<?php foreach($listSemuaObat as $listObat2){ ?>
															<option value="<?php echo $listObat2->id_barang; ?>">
																<?php echo $listObat2->nama_barang ." / ".$listObat2->ukuran ." "
																.$listObat2->satuan ." / Stok: ".$listObat2->jumlah_barang ;?>
															</option>
														<?php }?>
													</select>
												</div>
												<label class="col-sm-1 control-label">Jumlah</label>
												<div class="col-sm-2">
													<input type="number" min="1" max="30" step="1" value="1" 
													name="jumlah_barang[]" class="spinner-input form-control" title="Isi jumlah obat">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label">Obat 2</label>
												<div class="col-md-6">
													<select name="id_barang[]" data-plugin-selectTwo class="form-control populate">
														<option disabled value="" Selected>Pilih Obat</option>
														<option value="">Unselect Obat</option>
														<?php foreach($listSemuaObat as $listObat2){ ?>
															<option value="<?php echo $listObat2->id_barang; ?>">
																<?php echo $listObat2->nama_barang ." / ".$listObat2->ukuran ." "
																.$listObat2->satuan ." / Stok: ".$listObat2->jumlah_barang ;?>
															</option>
														<?php }?>
													</select>
												</div>
												<label class="col-sm-1 control-label">Jumlah</label>
												<div class="col-sm-2">
													<input type="number" min="1" max="30" step="1" value="1" 
													name="jumlah_barang[]" class="spinner-input form-control" title="Isi jumlah obat">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label">Obat 3</label>
												<div class="col-md-6">
													<select name="id_barang[]" data-plugin-selectTwo class="form-control populate">
														<option disabled value="" Selected>Pilih Obat</option>
														<option value="">Unselect Obat</option>
														<?php foreach($listSemuaObat as $listObat2){ ?>
															<option value="<?php echo $listObat2->id_barang; ?>">
																<?php echo $listObat2->nama_barang ." / ".$listObat2->ukuran ." "
																.$listObat2->satuan ." / Stok: ".$listObat2->jumlah_barang ;?>
															</option>
														<?php }?>
													</select>
												</div>
												<label class="col-sm-1 control-label">Jumlah</label>
												<div class="col-sm-2">
													<input type="number" min="1" max="30" step="1" value="1" 
													name="jumlah_barang[]" class="spinner-input form-control" title="Isi jumlah obat">
												</div>
											</div>
										<?php
										}
									}
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