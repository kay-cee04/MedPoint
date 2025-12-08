<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if(isset($_GET['del']))
{
    $docid=$_GET['id'];
    mysqli_query($con,"delete from doctors where id ='$docid'");
    $_SESSION['msg']="Doctor deleted successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Manage Doctors</title>
		
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" type="text/css" />
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
			:root {
				--primary-blue: #1e40af;
				--primary-light: #3b82f6;
				--primary-dark: #1e3a8a;
				--secondary-blue: #60a5fa;
				--accent-teal: #0d9488;
				--accent-cyan: #06b6d4;
				--light-blue: #dbeafe;
				--background: #f0f9ff;
				--card-bg: #ffffff;
				--text-dark: #1e293b;
				--text-medium: #475569;
				--text-light: #64748b;
				--border-light: #e2e8f0;
				--success: #10b981;
				--warning: #f59e0b;
				--danger: #ef4444;
				--shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
				--shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
				--shadow-lg: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
			}
			
			* {
				font-family: 'Poppins', sans-serif !important;
			}
			
			body {
				background: #f0f9ff;
				color: var(--text-dark);
			}
			
			.main-content {
				background: #f0f9ff;
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
				background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-light) 100%);
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
				background-clip: text;
				margin: 0;
				letter-spacing: -1px;
				position: relative;
				display: inline-block;
			}
			
			#page-title .mainTitle::after {
				content: '';
				position: absolute;
				bottom: -10px;
				left: 0;
				width: 80px;
				height: 4px;
				background: linear-gradient(90deg, var(--primary-blue), var(--accent-cyan));
				border-radius: 2px;
			}
			
			#page-title .breadcrumb {
				background: transparent;
				padding: 16px 0;
				margin: 20px 0 0 0;
				font-size: 15px;
			}
			
			#page-title .breadcrumb li {
				color: var(--text-medium);
				font-weight: 400;
			}
			
			#page-title .breadcrumb li.active {
				color: var(--primary-blue);
				font-weight: 600;
			}
			
			#page-title .breadcrumb li a {
				color: var(--text-light);
				text-decoration: none;
				transition: color 0.3s;
			}
			
			#page-title .breadcrumb li a:hover {
				color: var(--primary-blue);
			}
			
			/* Success Message */
			.alert-success {
				background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
				color: white;
				border: none;
				border-radius: 12px;
				padding: 16px 20px;
				margin-bottom: 20px;
				box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
				border-left: 4px solid #059669;
			}
			
			/* Table Styling */
			.container-fluid.container-fullw.bg-white {
				background: white;
				border-radius: 20px;
				padding: 30px;
				box-shadow: var(--shadow);
				border: 1px solid var(--border-light);
			}
			
			.over-title {
				font-size: 24px;
				font-weight: 700;
				color: var(--text-dark);
				margin-bottom: 25px !important;
				padding-bottom: 15px;
				border-bottom: 3px solid var(--primary-light);
				display: inline-block;
			}
			
			.over-title span {
				color: var(--primary-blue);
			}
			
			/* Table Styling */
			.table {
				width: 100%;
				border-collapse: separate;
				border-spacing: 0;
				margin-bottom: 0;
			}
			
			.table thead th {
				background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-light) 100%);
				color: white;
				font-weight: 600;
				padding: 18px 15px;
				border: none;
				text-transform: uppercase;
				letter-spacing: 0.5px;
				font-size: 14px;
			}
			
			.table thead th:first-child {
				border-radius: 12px 0 0 12px;
			}
			
			.table thead th:last-child {
				border-radius: 0 12px 12px 0;
			}
			
			.table tbody tr {
				background: white;
				transition: all 0.3s ease;
				border-bottom: 1px solid var(--border-light);
			}
			
			.table tbody tr:hover {
				background: #f8fafc;
				transform: translateY(-2px);
				box-shadow: 0 4px 12px rgba(30, 64, 175, 0.1);
			}
			
			.table tbody td {
				padding: 18px 15px;
				border: none;
				color: var(--text-medium);
				font-weight: 500;
				vertical-align: middle;
			}
			
			.table tbody tr:nth-child(even) {
				background: #f8fafc;
			}
			
			.table tbody tr:hover {
				background: #f0f9ff;
			}
			
			/* Action Buttons */
			.btn-transparent {
				background: transparent;
				border: 2px solid var(--primary-light);
				color: var(--primary-blue);
				padding: 8px 16px;
				border-radius: 10px;
				font-weight: 600;
				transition: all 0.3s ease;
				text-decoration: none;
				display: inline-flex;
				align-items: center;
				justify-content: center;
				gap: 8px;
			}
			
			.btn-transparent:hover {
				background: var(--primary-blue);
				color: white;
				transform: translateY(-2px);
				box-shadow: 0 4px 12px rgba(30, 64, 175, 0.2);
				text-decoration: none;
			}
			
			.btn-transparent.btn-xs {
				padding: 6px 12px;
				font-size: 12px;
				margin-right: 5px;
			}
			
			.btn-transparent i {
				font-size: 14px;
			}
			
			.btn-transparent.edit-btn {
				border-color: #10b981;
				color: #10b981;
			}
			
			.btn-transparent.edit-btn:hover {
				background: #10b981;
				color: white;
			}
			
			.btn-transparent.delete-btn {
				border-color: #ef4444;
				color: #ef4444;
			}
			
			.btn-transparent.delete-btn:hover {
				background: #ef4444;
				color: white;
			}
			
			/* Badge for Status */
			.status-badge {
				display: inline-block;
				padding: 6px 16px;
				border-radius: 20px;
				font-size: 12px;
				font-weight: 600;
				text-transform: uppercase;
				letter-spacing: 0.5px;
			}
			
			.status-active {
				background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
				color: white;
			}
			
			.status-inactive {
				background: linear-gradient(135deg, #ef4444 0%, #f87171 100%);
				color: white;
			}
			
			.status-pending {
				background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
				color: white;
			}
			
			/* Mobile Responsive */
			@media (max-width: 768px) {
				.wrap-content {
					padding: 24px 16px;
				}
				
				.container-fluid.container-fullw.bg-white {
					padding: 20px;
					border-radius: 16px;
				}
				
				#page-title .mainTitle {
					font-size: 28px;
				}
				
				.over-title {
					font-size: 20px;
				}
				
				.table thead th {
					padding: 14px 10px;
					font-size: 12px;
				}
				
				.table tbody td {
					padding: 14px 10px;
					font-size: 13px;
				}
				
				.btn-transparent.btn-xs {
					padding: 4px 8px;
					font-size: 11px;
				}
				
				.table-responsive {
					border-radius: 12px;
					overflow: hidden;
				}
			}
			
			@media (max-width: 576px) {
				#page-title .mainTitle {
					font-size: 24px;
				}
				
				.over-title {
					font-size: 18px;
				}
				
				.table thead {
					display: none;
				}
				
				.table tbody tr {
					display: block;
					margin-bottom: 20px;
					border-radius: 12px;
					box-shadow: var(--shadow);
					border: 1px solid var(--border-light);
				}
				
				.table tbody td {
					display: block;
					text-align: right;
					padding: 12px;
					position: relative;
					border-bottom: 1px solid var(--border-light);
				}
				
				.table tbody td:last-child {
					border-bottom: none;
				}
				
				.table tbody td:before {
					content: attr(data-label);
					position: absolute;
					left: 12px;
					width: 45%;
					padding-right: 10px;
					text-align: left;
					font-weight: 600;
					color: var(--primary-blue);
				}
				
				.table tbody tr:hover {
					transform: none;
				}
			}
			
			/* Add Doctor Button */
			.add-doctor-btn {
				background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-light) 100%);
				color: white;
				border: none;
				padding: 14px 28px;
				border-radius: 12px;
				font-weight: 600;
				transition: all 0.3s ease;
				text-decoration: none;
				display: inline-flex;
				align-items: center;
				gap: 10px;
				float: right;
				margin-bottom: 20px;
				box-shadow: 0 4px 15px rgba(30, 64, 175, 0.3);
			}
			
			.add-doctor-btn:hover {
				transform: translateY(-3px);
				box-shadow: 0 6px 20px rgba(30, 64, 175, 0.4);
				color: white;
				text-decoration: none;
			}
			
			.add-doctor-btn i {
				font-size: 18px;
				transition: transform 0.3s ease;
			}
			
			.add-doctor-btn:hover i {
				transform: translateX(4px);
			}
			
			/* Action Buttons Container */
			.action-buttons {
				display: flex;
				gap: 10px;
				justify-content: center;
			}
			
			/* Center the table content */
			.table tbody td.center {
				text-align: center;
				font-weight: 700;
				color: var(--primary-blue);
			}
		</style>
	</head>
	<body>
		<div id="app">		
			<?php include('include/sidebar.php');?>
			<div class="app-content">
				<?php include('include/header.php');?>
				
				<!-- end: TOP NAVBAR -->
				<div class="main-content">
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Manage Doctors</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Manage Doctors</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						
						<!-- start: DOCTORS TABLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<!-- Add Doctor Button -->
									<a href="add-doctor.php" class="add-doctor-btn">
										<i class="fa fa-plus"></i> Add New Doctor
									</a>
									
									<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Doctors</span></h5>
									
									<!-- Success Message -->
									<?php if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])): ?>
									<div class="alert alert-success" role="alert">
										<i class="fa fa-check-circle"></i> <?php echo htmlentities($_SESSION['msg']); ?>
									</div>
									<?php $_SESSION['msg'] = ""; endif; ?>
									
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th class="center">#</th>
													<th>Specialization</th>
													<th class="hidden-xs">Doctor Name</th>
													<th>Creation Date</th>
													<th class="text-center">Actions</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$sql=mysqli_query($con,"select * from doctors");
												$cnt=1;
												while($row=mysqli_fetch_array($sql))
												{
												?>
												<tr>
													<td class="center" data-label="No."><?php echo $cnt;?></td>
													<td data-label="Specialization"><?php echo htmlentities($row['specilization']);?></td>
													<td data-label="Doctor Name"><?php echo htmlentities($row['doctorName']);?></td>
													<td data-label="Creation Date"><?php echo htmlentities($row['creationDate']);?></td>
													<td data-label="Actions">
														<div class="action-buttons">
															<!-- Edit Button -->
															<a href="edit-doctor.php?id=<?php echo $row['id'];?>" class="btn-transparent btn-xs edit-btn" title="Edit Doctor">
																<i class="fa fa-pencil"></i> Edit
															</a>
															
															<!-- Delete Button -->
															<a href="manage-doctors.php?id=<?php echo $row['id']?>&del=delete" 
															   onClick="return confirm('Are you sure you want to delete this doctor?')" 
															   class="btn-transparent btn-xs delete-btn" title="Delete Doctor">
																<i class="fa fa-times"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<?php 
												$cnt=$cnt+1;
												} 
												?>
												
												<?php if(mysqli_num_rows($sql) == 0): ?>
												<tr>
													<td colspan="5" class="text-center" style="padding: 40px;">
														<div style="text-align: center; color: var(--text-light);">
															<i class="fa fa-user-md" style="font-size: 60px; color: var(--border-light); margin-bottom: 20px;"></i>
															<h4 style="color: var(--text-medium); margin-bottom: 10px;">No Doctors Found</h4>
															<p style="color: var(--text-light); margin-bottom: 20px;">Add your first doctor to get started.</p>
															<a href="add-doctor.php" class="add-doctor-btn" style="float: none; display: inline-flex;">
																<i class="fa fa-plus"></i> Add First Doctor
															</a>
														</div>
													</td>
												</tr>
												<?php endif; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- end: DOCTORS TABLE -->
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
				
				// Add data-label attributes for mobile responsive
				$('table thead th').each(function() {
					var label = $(this).text();
					$('table tbody td:nth-child(' + ($(this).index() + 1) + ')').attr('data-label', label);
				});
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php } ?>