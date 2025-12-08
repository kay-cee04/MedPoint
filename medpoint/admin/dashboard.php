<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Dashboard</title>
		
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		
		<style>
			* {
				font-family: 'Poppins', sans-serif !important;
			}
			
			body {
				background: #f0f9ff; /* Light blue background */
				color: #1e293b;
			}
			
			.main-content {
				background: #f0f9ff; /* Light blue background */
			}
			
			.wrap-content {
				padding: 40px 30px;
			}
			
			/* Page Title - Blue Theme */
			#page-title {
				background: transparent;
				padding: 0 0 40px 0;
				border: none;
			}
			
			#page-title .mainTitle {
				font-size: 36px;
				font-weight: 800;
				background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%); /* Blue gradient */
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
				background-clip: text;
				margin: 0;
				letter-spacing: -1px;
			}
			
			#page-title .breadcrumb {
				background: transparent;
				padding: 12px 0;
				margin: 12px 0 0 0;
				font-size: 14px;
			}
			
			#page-title .breadcrumb li {
				color: #64748b;
				font-weight: 400;
			}
			
			#page-title .breadcrumb li.active {
				color: #1e40af; /* Dark blue */
				font-weight: 600;
			}
			
			/* Dashboard Cards - Blue Theme */
			.dashboard-card {
				background: #ffffff;
				border-radius: 20px;
				padding: 0;
				margin-bottom: 28px;
				border: 1px solid #e2e8f0;
				transition: all 0.3s ease;
				box-shadow: 0 4px 15px rgba(30, 64, 175, 0.1); /* Blue shadow */
				height: 100%;
				position: relative;
				overflow: hidden;
			}
			
			.dashboard-card:hover {
				transform: translateY(-5px);
				box-shadow: 0 8px 25px rgba(30, 64, 175, 0.2); /* Blue shadow on hover */
			}
			
			/* Card Header with Solid Blue Color */
			.card-header-gradient {
				padding: 32px 28px 24px 28px;
				position: relative;
				overflow: hidden;
			}
			
			.card-header-gradient.blue {
				background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%); /* Blue gradient */
			}
			
			.card-header-gradient.green {
				background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%); /* Teal gradient */
			}
			
			.card-header-gradient.purple {
				background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%); /* Indigo gradient */
			}
			
			.card-header-gradient.orange {
				background: linear-gradient(135deg, #059669 0%, #10b981 100%); /* Emerald gradient */
			}
			
			.card-header-gradient.teal {
				background: linear-gradient(135deg, #0284c7 0%, #0ea5e9 100%); /* Sky blue gradient */
			}
			
			/* Floating Icon */
			.floating-icon {
				position: relative;
				z-index: 2;
				display: flex;
				align-items: center;
				justify-content: space-between;
				margin-bottom: 20px;
			}
			
			.icon-circle {
				width: 85px;
				height: 85px;
				background: rgba(255, 255, 255, 0.3);
				border-radius: 20px;
				display: flex;
				align-items: center;
				justify-content: center;
				border: 2px solid rgba(255, 255, 255, 0.5);
				transition: all 0.3s ease;
				box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
			}
			
			.dashboard-card:hover .icon-circle {
				transform: rotate(5deg) scale(1.05);
				background: rgba(255, 255, 255, 0.4);
			}
			
			.icon-circle i {
				font-size: 42px;
				color: #ffffff;
			}
			
			.icon-decoration-large {
				font-size: 160px;
				color: rgba(255, 255, 255, 0.2);
				position: absolute;
				right: -40px;
				top: -40px;
				z-index: 1;
				transform: rotate(-15deg);
			}
			
			/* Card Title in Header */
			.card-title-header {
				font-size: 17px;
				font-weight: 700;
				color: #ffffff;
				margin: 0;
				letter-spacing: 0.8px;
				text-transform: uppercase;
				position: relative;
				z-index: 2;
			}
			
			/* Card Body */
			.card-body-content {
				padding: 28px;
				background: #ffffff;
			}
			
			.card-value {
				font-size: 48px;
				font-weight: 800;
				color: #1e40af; /* Dark blue */
				margin: 0 0 8px 0;
				letter-spacing: -2px;
				line-height: 1;
			}
			
			.card-label {
				font-size: 14px;
				color: #64748b;
				font-weight: 500;
				margin: 0 0 24px 0;
				display: flex;
				align-items: center;
				gap: 8px;
			}
			
			.card-label i {
				font-size: 18px;
				color: #3b82f6; /* Blue */
			}
			
			/* Progress Bar - Blue Theme */
			.progress-bar-custom {
				height: 6px;
				background: #e2e8f0;
				border-radius: 10px;
				overflow: hidden;
				margin-bottom: 20px;
			}
			
			.progress-fill {
				height: 100%;
				border-radius: 10px;
				transition: width 0.6s ease;
			}
			
			.progress-fill.blue {
				background: linear-gradient(90deg, #1e40af 0%, #3b82f6 100%); /* Blue gradient */
			}
			
			.progress-fill.green {
				background: linear-gradient(90deg, #0d9488 0%, #14b8a6 100%); /* Teal gradient */
			}
			
			.progress-fill.purple {
				background: linear-gradient(90deg, #4f46e5 0%, #6366f1 100%); /* Indigo gradient */
			}
			
			.progress-fill.orange {
				background: linear-gradient(90deg, #059669 0%, #10b981 100%); /* Emerald gradient */
			}
			
			.progress-fill.teal {
				background: linear-gradient(90deg, #0284c7 0%, #0ea5e9 100%); /* Sky blue gradient */
			}
			
			/* Action Button - Blue Theme */
			.card-action-btn {
				display: inline-flex;
				align-items: center;
				justify-content: center;
				gap: 12px;
				width: 100%;
				padding: 16px 24px;
				background: #f0f9ff; /* Light blue */
				color: #1e40af; /* Dark blue */
				text-decoration: none;
				border-radius: 16px;
				font-size: 15px;
				font-weight: 700;
				transition: all 0.3s ease;
				border: 2px solid #bfdbfe; /* Blue border */
			}
			
			.card-action-btn:hover {
				background: #1e40af; /* Dark blue */
				color: #ffffff;
				text-decoration: none;
				transform: translateY(-2px);
				box-shadow: 0 8px 16px rgba(30, 64, 175, 0.2);
			}
			
			.card-action-btn i {
				font-size: 18px;
				transition: transform 0.3s ease;
			}
			
			.card-action-btn:hover i {
				transform: translateX(6px);
			}
			
			/* Stats Badge - Blue Theme */
			.stats-badge {
				display: inline-flex;
				align-items: center;
				gap: 8px;
				padding: 8px 18px;
				background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%); /* Blue gradient */
				color: #ffffff;
				border-radius: 25px;
				font-size: 13px;
				font-weight: 700;
				margin-bottom: 18px;
				box-shadow: 0 4px 12px rgba(30, 64, 175, 0.3);
			}
			
			.stats-badge i {
				font-size: 14px;
			}
			
			/* Container adjustments */
			.container-fluid.container-fullw {
				background: transparent;
				padding: 0;
			}
			
			.row {
				margin-left: -14px;
				margin-right: -14px;
			}
			
			.col-sm-4 {
				padding-left: 14px;
				padding-right: 14px;
			}
			
			/* Remove old panel styles */
			.panel {
				border: none;
				box-shadow: none;
				background: transparent;
			}
			
			.panel-body {
				padding: 0;
			}
			
			/* Responsive */
			@media (max-width: 768px) {
				.wrap-content {
					padding: 24px 16px;
				}
				
				#page-title .mainTitle {
					font-size: 28px;
				}
				
				.dashboard-card {
					margin-bottom: 20px;
				}
				
				.card-header-gradient {
					padding: 24px 20px 20px 20px;
				}
				
				.card-body-content {
					padding: 20px;
				}
				
				.card-value {
					font-size: 40px;
				}
				
				.icon-circle {
					width: 64px;
					height: 64px;
				}
				
				.icon-circle i {
					font-size: 28px;
				}
			}
		</style>
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin Dashboard</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Dashboard</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: DASHBOARD CARDS -->
							<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<div class="dashboard-card">
												<!-- Gradient Header -->
												<div class="card-header-gradient blue">
													<i class="fa fa-user-circle icon-decoration-large"></i>
													<div class="floating-icon">
														<div class="icon-circle">
															<i class="fa fa-users"></i>
														</div>
													</div>
													<h3 class="card-title-header">Total Users</h3>
												</div>
												
												<!-- Card Body -->
												<div class="card-body-content">
													<span class="stats-badge">
														<i class="fa fa-arrow-up"></i> Active
													</span>
													<?php 
													$result = mysqli_query($con,"SELECT * FROM users ");
													$num_rows = mysqli_num_rows($result);
													?>
													<div class="card-value"><?php echo htmlentities($num_rows); ?></div>
													<p class="card-label">
														<i class="fa fa-check-circle"></i>
														Registered users in system
													</p>
													
													<div class="progress-bar-custom">
														<div class="progress-fill blue" style="width: 85%;"></div>
													</div>
													
													<a href="manage-users.php" class="card-action-btn">
														Manage Users <i class="fa fa-arrow-right"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<div class="dashboard-card">
												<!-- Gradient Header -->
												<div class="card-header-gradient green">
													<i class="fa fa-user-md icon-decoration-large"></i>
													<div class="floating-icon">
														<div class="icon-circle">
															<i class="fa fa-user-md"></i>
														</div>
													</div>
													<h3 class="card-title-header">Total Doctors</h3>
												</div>
												
												<!-- Card Body -->
												<div class="card-body-content">
													<span class="stats-badge">
														<i class="fa fa-arrow-up"></i> Active
													</span>
													<?php 
													$result1 = mysqli_query($con,"SELECT * FROM doctors ");
													$num_rows1 = mysqli_num_rows($result1);
													?>
													<div class="card-value"><?php echo htmlentities($num_rows1); ?></div>
													<p class="card-label">
														<i class="fa fa-check-circle"></i>
														Medical professionals
													</p>
													
													<div class="progress-bar-custom">
														<div class="progress-fill green" style="width: 70%;"></div>
													</div>
													
													<a href="manage-doctors.php" class="card-action-btn">
														Manage Doctors <i class="fa fa-arrow-right"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<div class="dashboard-card">
												<!-- Gradient Header -->
												<div class="card-header-gradient purple">
													<i class="fa fa-calendar-check-o icon-decoration-large"></i>
													<div class="floating-icon">
														<div class="icon-circle">
															<i class="fa fa-calendar"></i>
														</div>
													</div>
													<h3 class="card-title-header">Appointments</h3>
												</div>
												
												<!-- Card Body -->
												<div class="card-body-content">
													<span class="stats-badge">
														<i class="fa fa-arrow-up"></i> Today
													</span>
													<?php 
													$sql= mysqli_query($con,"SELECT * FROM appointment");
													$num_rows2 = mysqli_num_rows($sql);
													?>
													<div class="card-value"><?php echo htmlentities($num_rows2); ?></div>
													<p class="card-label">
														<i class="fa fa-check-circle"></i>
														Scheduled appointments
													</p>
													
													<div class="progress-bar-custom">
														<div class="progress-fill purple" style="width: 92%;"></div>
													</div>
													
													<a href="appointment-history.php" class="card-action-btn">
														View All <i class="fa fa-arrow-right"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<div class="dashboard-card">
												<!-- Gradient Header -->
												<div class="card-header-gradient orange">
													<i class="fa fa-heart icon-decoration-large"></i>
													<div class="floating-icon">
														<div class="icon-circle">
															<i class="fa fa-heartbeat"></i>
														</div>
													</div>
													<h3 class="card-title-header">Total Patients</h3>
												</div>
												
												<!-- Card Body -->
												<div class="card-body-content">
													<span class="stats-badge">
														<i class="fa fa-arrow-up"></i> Active
													</span>
													<?php 
													$result = mysqli_query($con,"SELECT * FROM tblpatient ");
													$num_rows = mysqli_num_rows($result);
													?>
													<div class="card-value"><?php echo htmlentities($num_rows); ?></div>
													<p class="card-label">
														<i class="fa fa-check-circle"></i>
														Registered patient records
													</p>
													
													<div class="progress-bar-custom">
														<div class="progress-fill orange" style="width: 78%;"></div>
													</div>
													
													<a href="manage-patient.php" class="card-action-btn">
														Manage Patients <i class="fa fa-arrow-right"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<div class="dashboard-card">
												<!-- Gradient Header -->
												<div class="card-header-gradient teal">
													<i class="fa fa-envelope-o icon-decoration-large"></i>
													<div class="floating-icon">
														<div class="icon-circle">
															<i class="fa fa-commenting-o"></i>
														</div>
													</div>
													<h3 class="card-title-header">New Queries</h3>
												</div>
												
												<!-- Card Body -->
												<div class="card-body-content">
													<span class="stats-badge">
														<i class="fa fa-arrow-up"></i> New
													</span>
													<?php 
													$sql= mysqli_query($con,"SELECT * FROM tblcontactus where IsRead is null");
													$num_rows22 = mysqli_num_rows($sql);
													?>
													<div class="card-value"><?php echo htmlentities($num_rows22); ?></div>
													<p class="card-label">
														<i class="fa fa-check-circle"></i>
														Unread contact messages
													</p>
													
													<div class="progress-bar-custom">
														<div class="progress-fill teal" style="width: 65%;"></div>
													</div>
													
													<a href="unread-queries.php" class="card-action-btn">
														View Queries <i class="fa fa-arrow-right"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
		
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php } ?>