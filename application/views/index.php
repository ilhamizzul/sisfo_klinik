<!doctype html>
<html lang="en">

<head>
	<title>Sisfo Klinik</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="theme-color" content="#303441"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>assets/img/favicon.png">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-admin.css">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/morris.css">
	
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<?php echo base_url() ?>Dashboard"><img src="<?php echo base_url() ?>assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<!-- <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul> -->
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li>
							<a href="<?php echo base_url() ?>dashboard" class="<?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>">
								<i class="lnr lnr-home"></i> <span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>data_pemeriksaan" class="<?php if($this->uri->segment(1)=="data_pemeriksaan"){echo "active";}?>">
								<i class="lnr lnr-book"></i> <span>Data Pemeriksaan</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>data_pasien" class="<?php if($this->uri->segment(1)=="data_pasien"){echo "active";}?>">
								<i class="lnr lnr-wheelchair"></i> <span>Data Pasien</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>data_obat" class="<?php if($this->uri->segment(1)=="data_obat"){echo "active";}?>">
								<i class="fa fa-plus"></i> <span>Data Obat</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- NOTIFICATION -->
					<?php 
	                    $success = $this->session->flashdata('success');
	                    $failed = $this->session->flashdata('failed');

	                    if (!empty($failed)) {
	                        echo '
	                            <div class="alert alert-danger alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                <i class="fa fa-times-circle"></i> '.$failed.'
	                            </div>
	                        ';
	                    }

	                    if (!empty($success)) {
	                        echo '
	                            <div class="alert alert-success alert-dismissible" role="alert">
	                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                <i class="fa fa-check-circle"></i> '.$success.'
	                            </div>
	                        ';
	                    }
	                ?>
					<?php $this->load->view($main_view); ?>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2019 <a href="https://github.com/ilhamizzul" target="_blank">Ilham Izzul</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url() ?>assets/scripts/klorofil-common.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-datatable/jquery.dataTables.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-datatable/extensions/export/buttons.print.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-datatable.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/raphael-min.js"></script>

	<?php $this->load->view($JSON); ?>
</body>

</html>
