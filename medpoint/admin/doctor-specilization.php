<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if(isset($_POST['submit']))
{
$doctorspecilization=$_POST['doctorspecilization'];
$sql=mysqli_query($con,"insert into doctorSpecilization(specilization) values('$doctorspecilization')");
$_SESSION['msg']="Doctor Specialization added successfully !!";
}
//Code Deletion
if(isset($_GET['del']))
{
$sid=$_GET['id'];	
mysqli_query($con,"delete from doctorSpecilization where id = '$sid'");
$_SESSION['msg']="data deleted !!";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Doctor Specialization</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Fonts & Icons -->
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
		
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		
		<style>
			* {
				font-family: 'Poppins', sans-serif !important;
			}
			
			body {
				background: #f0f4f8;
				color: #1e293b;
			}
			
			.main-content {
				background: #f0f4f8;
			}
			
			.wrap-content {
				padding: 40px 30px;
			}
			
			/* Simple Page Title - Like Dashboard */
			#page-title {
				background: transparent;
				padding: 0 0 40px 0;
				border: none;
			}
			
			#page-title .mainTitle {
				font-size: 36px;
				font-weight: 800;
				background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
				color: #334155;
				font-weight: 600;
			}
			
			/* Alert Message */
			.alert-message {
				background: #d1fae5;
				border-left: 4px solid #10b981;
				border-radius: 12px;
				padding: 14px 18px;
				margin-bottom: 24px;
				color: #065f46;
				font-weight: 600;
				display: flex;
				align-items: center;
				gap: 10px;
				animation: slideDown 0.3s ease;
			}
			
			@keyframes slideDown {
				from {
					opacity: 0;
					transform: translateY(-10px);
				}
				to {
					opacity: 1;
					transform: translateY(0);
				}
			}
			
			.alert-message i {
				font-size: 18px;
			}
			
			/* Form Card */
			.form-card {
				background: #ffffff;
				border-radius: 16px;
				padding: 30px;
				box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
				margin-bottom: 30px;
			}
			
			.form-header {
				display: flex;
				align-items: center;
				gap: 12px;
				margin-bottom: 24px;
				padding-bottom: 18px;
				border-bottom: 2px solid #e2e8f0;
			}
			
			.form-icon {
				width: 48px;
				height: 48px;
				background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
				border-radius: 12px;
				display: flex;
				align-items: center;
				justify-content: center;
				box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
			}
			
			.form-icon i {
				color: #ffffff;
				font-size: 20px;
			}
			
			.form-title {
				font-size: 20px;
				font-weight: 700;
				color: #0f172a;
				margin: 0;
			}
			
			/* Form Input */
			.form-group-modern {
				margin-bottom: 20px;
			}
			
			.form-label-modern {
				font-size: 13px;
				font-weight: 600;
				color: #334155;
				margin-bottom: 8px;
				display: flex;
				align-items: center;
				gap: 6px;
			}
			
			.form-label-modern i {
				color: #667eea;
				font-size: 14px;
			}
			
			.input-wrapper {
				position: relative;
			}
			
			.input-icon {
				position: absolute;
				left: 14px;
				top: 50%;
				transform: translateY(-50%);
				color: #94a3b8;
				font-size: 16px;
			}
			
			.form-control-modern {
				width: 100%;
				padding: 12px 14px 12px 44px;
				border: 2px solid #e2e8f0;
				border-radius: 10px;
				font-size: 14px;
				color: #1e293b;
				transition: all 0.3s ease;
				background: #f8fafc;
			}
			
			.form-control-modern:focus {
				outline: none;
				border-color: #667eea;
				background: #ffffff;
				box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
			}
			
			.form-control-modern:focus + .input-icon {
				color: #667eea;
			}
			
			/* Submit Button */
			.btn-submit {
				display: inline-flex;
				align-items: center;
				gap: 8px;
				padding: 12px 24px;
				background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
				color: #ffffff;
				border: none;
				border-radius: 10px;
				font-size: 14px;
				font-weight: 700;
				cursor: pointer;
				transition: all 0.3s ease;
				box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
			}
			
			.btn-submit:hover {
				transform: translateY(-2px);
				box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
			}
			
			/* Table Card */
			.table-card {
				background: #ffffff;
				border-radius: 16px;
				padding: 30px;
				box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
			}
			
			.table-header {
				display: flex;
				align-items: center;
				justify-content: space-between;
				margin-bottom: 20px;
				padding-bottom: 18px;
				border-bottom: 2px solid #e2e8f0;
			}
			
			.table-header-left {
				display: flex;
				align-items: center;
				gap: 12px;
			}
			
			.table-icon {
				width: 48px;
				height: 48px;
				background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
				border-radius: 12px;
				display: flex;
				align-items: center;
				justify-content: center;
				box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
			}
			
			.table-icon i {
				color: #ffffff;
				font-size: 20px;
			}
			
			.table-title {
				font-size: 20px;
				font-weight: 700;
				color: #0f172a;
				margin: 0;
			}
			
			.table-subtitle {
				font-size: 12px;
				color: #64748b;
				margin: 4px 0 0 0;
			}
			
			.stat-badge {
				display: flex;
				align-items: center;
				gap: 6px;
				padding: 8px 16px;
				border-radius: 10px;
				font-size: 12px;
				font-weight: 700;
				background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
				color: #ffffff;
			}
			
			/* Modern Table */
			.table-modern {
				width: 100%;
				border-collapse: separate;
				border-spacing: 0;
			}
			
			.table-modern thead {
				background: #f8fafc;
			}
			
			.table-modern thead th {
				padding: 14px 12px;
				font-size: 11px;
				font-weight: 700;
				text-transform: uppercase;
				color: #475569;
				letter-spacing: 0.5px;
				border-bottom: 2px solid #e2e8f0;
				text-align: left;
			}
			
			.table-modern thead th:first-child {
				border-radius: 12px 0 0 0;
				text-align: center;
			}
			
			.table-modern thead th:last-child {
				border-radius: 0 12px 0 0;
				text-align: center;
			}
			
			.table-modern tbody tr {
				transition: all 0.2s ease;
				border-bottom: 1px solid #f1f5f9;
			}
			
			.table-modern tbody tr:hover {
				background: #faf5ff;
			}
			
			.table-modern tbody td {
				padding: 16px 12px;
				font-size: 13px;
				color: #334155;
				vertical-align: middle;
			}
			
			.table-modern tbody td:first-child {
				text-align: center;
			}
			
			.table-modern tbody td:last-child {
				text-align: center;
			}
			
			.cell-number {
				font-weight: 700;
				color: #667eea;
				font-size: 14px;
			}
			
			.cell-specialization {
				font-weight: 600;
				color: #0f172a;
				font-size: 14px;
			}
			
			/* Action Buttons */
			.btn-action {
				display: inline-flex;
				align-items: center;
				justify-content: center;
				width: 32px;
				height: 32px;
				border-radius: 8px;
				border: none;
				cursor: pointer;
				transition: all 0.3s ease;
				margin: 0 3px;
			}
			
			.btn-edit {
				background: #dbeafe;
				color: #1e40af;
			}
			
			.btn-edit:hover {
				background: #3b82f6;
				color: #ffffff;
				transform: translateY(-2px);
			}
			
			.btn-delete {
				background: #fee2e2;
				color: #991b1b;
			}
			
			.btn-delete:hover {
				background: #ef4444;
				color: #ffffff;
				transform: translateY(-2px);
			}
			
			/* Empty State */
			.empty-state {
				text-align: center;
				padding: 50px 20px;
			}
			
			.empty-state-icon {
				width: 80px;
				height: 80px;
				background: #f1f5f9;
				border-radius: 50%;
				display: flex;
				align-items: center;
				justify-content: center;
				margin: 0 auto 16px;
			}
			
			.empty-state-icon i {
				font-size: 32px;
				color: #94a3b8;
			}
			
			.empty-state-title {
				font-size: 16px;
				font-weight: 700;
				color: #334155;
				margin-bottom: 8px;
			}
			
			.empty-state-text {
				font-size: 13px;
				color: #64748b;
			}
			
			/* Container Overrides */
			.container-fluid.container-fullw {
				background: transparent;
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
				
				.form-card,
				.table-card {
					padding: 24px 20px;
				}
				
				.table-header {
					flex-direction: column;
					align-items: flex-start;
					gap: 12px;
				}
				
				.table-wrapper {
					overflow-x: auto;
					-webkit-overflow-scrolling: touch;
				}
				
				.table-modern {
					min-width: 700px;
				}
			}
		</style>
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
				<?php include('include/header.php');?>
				
				<div class="main-content">
					<div class="wrap-content container" id="container">
						
						<!-- Simple Page Title -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor Specializations</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li>
										<span>Doctors</span>
									</li>
									<li class="active">
										<span>Specializations</span>
									</li>
								</ol>
							</div>
						</section>
						
						<!-- Alert Message -->
						<?php if(!empty($_SESSION['msg'])): ?>
						<div class="alert-message">
							<i class="fas fa-check-circle"></i>
							<span><?php echo htmlentities($_SESSION['msg']); ?></span>
						</div>
						<?php $_SESSION['msg']=""; ?>
						<?php endif; ?>
						
						<!-- Add Specialization Form -->
						<div class="form-card">
							<div class="form-header">
								<div class="form-icon">
									<i class="fas fa-plus-circle"></i>
								</div>
								<h2 class="form-title">Add New Specialization</h2>
							</div>
							
							<form role="form" name="dcotorspcl" method="post">
								<div class="form-group-modern">
									<label class="form-label-modern">
										<i class="fas fa-user-md"></i>
										Specialization Name
									</label>
									<div class="input-wrapper">
										<input type="text" 
											   name="doctorspecilization" 
											   class="form-control-modern" 
											   placeholder="e.g., Cardiology, Pediatrics, Neurology"
											   required>
										<i class="fas fa-user-md input-icon"></i>
									</div>
								</div>
								
								<button type="submit" name="submit" class="btn-submit">
									<i class="fas fa-plus"></i>
									Add Specialization
								</button>
							</form>
						</div>
						
						<!-- Manage Specializations Table -->
						<div class="table-card">
							<div class="table-header">
								<div class="table-header-left">
									<div class="table-icon">
										<i class="fas fa-list"></i>
									</div>
									<div>
										<h2 class="table-title">Manage Specializations</h2>
										<p class="table-subtitle">View and manage all medical specializations</p>
									</div>
								</div>
								<div>
									<?php 
									$total_spec = mysqli_num_rows(mysqli_query($con,"SELECT * FROM doctorSpecilization"));
									?>
									<div class="stat-badge">
										<i class="fas fa-hashtag"></i>
										Total: <?php echo $total_spec; ?>
									</div>
								</div>
							</div>
							
							<div class="table-wrapper">
								<table class="table-modern">
									<thead>
										<tr>
											<th>#</th>
											<th>SPECIALIZATION</th>
											<th>CREATION DATE</th>
											<th>LAST UPDATE</th>
											<th>ACTIONS</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql=mysqli_query($con,"select * from doctorSpecilization ORDER BY id DESC");
										$cnt=1;
										$has_records = false;
										
										while($row=mysqli_fetch_array($sql))
										{
											$has_records = true;
										?>
										<tr>
											<td class="cell-number"><?php echo $cnt;?></td>
											<td>
												<span class="cell-specialization">
													<?php echo htmlentities($row['specilization']);?>
												</span>
											</td>
											<td><?php echo htmlentities($row['creationDate']);?></td>
											<td>
												<?php if($row['updationDate']): ?>
													<?php echo htmlentities($row['updationDate']);?>
												<?php else: ?>
													<span style="color: #94a3b8; font-style: italic;">Not updated</span>
												<?php endif; ?>
											</td>
											<td>
												<a href="edit-doctor-specialization.php?id=<?php echo $row['id'];?>" 
												   class="btn-action btn-edit"
												   title="Edit">
													<i class="fas fa-edit"></i>
												</a>
												<a href="doctor-specilization.php?id=<?php echo $row['id']?>&del=delete" 
												   onclick="return confirm('Are you sure you want to delete?')"
												   class="btn-action btn-delete"
												   title="Delete">
													<i class="fas fa-trash"></i>
												</a>
											</td>
										</tr>
										<?php 
										$cnt++;
										}
										
										if(!$has_records) {
										?>
										<tr>
											<td colspan="5">
												<div class="empty-state">
													<div class="empty-state-icon">
														<i class="fas fa-folder-open"></i>
													</div>
													<h3 class="empty-state-title">No Specializations Found</h3>
													<p class="empty-state-text">
														Add your first medical specialization using the form above.
													</p>
												</div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			
			<!-- Settings -->
			<?php include('include/setting.php');?>
		</div>
		
		<!-- Main JavaScripts -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="assets/js/main.js"></script>
		
		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
		</script>
	</body>
</html>
<?php } ?>