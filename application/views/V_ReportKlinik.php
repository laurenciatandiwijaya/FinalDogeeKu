<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Layanan DogeeKu</title>
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
						<h2>Report Klinik</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Layanan</span></li>
								<li><span>Report Klinik  .</span></li>
							</ol>
						</div>
					</header>

						<section class="panel" style="margin-top:-490px;">
							<header class="panel-heading">
								<div class="panel-actions">
									<a  href="<?php echo base_url().'ReportKlinik/tampilanTambahData' ?>">
										<button type="Submit" class="mb-xs mt-xs mr-xs btn btn-primary">
											Tambah Report Klinik
										</button>
									</a>
								</div>
						
								<h2 class="panel-title">Report Klinik</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th width="25%">Action</th>
											<th width="10%">ID Report</th>
											<th width="15%">Nama Anjing</th>
											<th width="15%">Nama Pemilik</th>
											<th width="15%">Nama Pekerja</th>
											<th width="10%">Tanggal</th>	
											<th width="10%">Jam</th>
											<th width="10%">Keterangan</th>	
											<th width="10%">Status Report</th>	
										</tr>
									</thead>
									<tbody>
										<?php
											foreach($report as $list){
										?>

										<tr>
											<td>
												<a href="<?php echo base_url().'ReportKlinik/tampilanDetailData/'.$list->id_report_klinik;?> ">
													<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-info">
													<i class="fa fa-plus"></i>Detail</button>
												</a>
												<a href="<?php echo base_url().'ReportKlinik/tampilanEditData/'.$list->id_report_klinik;?> ">
													<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-warning">
													<i class="fa fa-pencil"></i>Edit</button>
												</a>
												<a href="<?php echo base_url().'ReportKlinik/deleteData/'.$list->id_report_klinik;?> ">
													<button type="button" class="mb-xs mt-xs mr-xs btn btn-sm btn-danger">
													<i class="fa fa-trash-o"></i>Delete</button>
												</a>
											</td>
											<td><?php echo $list->id_report_klinik; ?></td>
											<td><?php echo $list->nama_anjing; ?></td>
											<td><?php echo $list->nama_pelanggan; ?></td>
											<td><?php echo $list->nama_pekerja; ?></td>
											<td><?php echo $list->tanggal; ?></td>
											<td><?php echo $list->jam; ?></td>
											<td><?php echo $list->keterangan; ?></td>
											<td><?php echo $list->status_report; ?></td>
										</tr>

										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</section>
					<!-- end: page -->
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
		<script src="<?php echo base_url()?>assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url()?>assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url()?>assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url()?>assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?php echo base_url()?>assets/javascripts/tables/examples.datatables.ajax.js"></script>
		<script src="<?php echo base_url()?>assets/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?php echo base_url()?>assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="<?php echo base_url()?>assets/javascripts/tables/examples.datatables.tabletools.js"></script>
	</body>
</html>