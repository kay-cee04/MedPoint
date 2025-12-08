<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

$did=intval($_GET['id']);// get doctor id
if(isset($_POST['submit']))
{
	$docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$sql=mysqli_query($con,"Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
if($sql)
{
$msg="Doctor Details updated Successfully";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Edit Doctor Details</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Fonts & Icons -->
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
				font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important;
			}
			
			body {
				background: #f8fafc;
				color: #0f172a;
				line-height: 1.6;
			}
			
			.main-content {
				background: #f8fafc;
				padding: 32px 40px;
				min-height: 100vh;
			}
			
			/* Page Header */
			.page-header {
				margin-bottom: 32px;
			}
			
			.page-title {
				font-size: 32px;
				font-weight: 700;
				color: #0f172a;
				margin: 0 0 8px 0;
				letter-spacing: -0.5px;
			}
			
			.page-breadcrumb {
				display: flex;
				align-items: center;
				gap: 8px;
				font-size: 14px;
				color: #64748b;
			}
			
			.page-breadcrumb i {
				font-size: 12px;
			}
			
			/* Doctor Info Section */
			.doctor-info-section {
				background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
				border-radius: 16px;
				padding: 32px;
				margin-bottom: 24px;
				color: #ffffff;
				box-shadow: 0 4px 16px rgba(99, 102, 241, 0.25);
			}
			
			.doctor-header {
				display: flex;
				align-items: center;
				gap: 20px;
				margin-bottom: 28px;
			}
			
			.doctor-avatar {
				width: 72px;
				height: 72px;
				background: rgba(255, 255, 255, 0.15);
				backdrop-filter: blur(10px);
				border-radius: 16px;
				display: flex;
				align-items: center;
				justify-content: center;
				border: 2px solid rgba(255, 255, 255, 0.2);
				flex-shrink: 0;
			}
			
			.doctor-avatar i {
				font-size: 32px;
				color: #ffffff;
			}
			
			.doctor-name-block h2 {
				font-size: 28px;
				font-weight: 700;
				margin: 0 0 4px 0;
				color: #ffffff;
				letter-spacing: -0.5px;
			}
			
			.doctor-subtitle {
				font-size: 14px;
				color: rgba(255, 255, 255, 0.85);
				font-weight: 500;
			}
			
			.doctor-meta-row {
				display: flex;
				gap: 32px;
				flex-wrap: wrap;
				align-items: center;
			}
			
			.meta-box {
				display: flex;
				align-items: center;
				gap: 10px;
			}
			
			.meta-icon {
				width: 20px;
				height: 20px;
				display: flex;
				align-items: center;
				justify-content: center;
				flex-shrink: 0;
			}
			
			.meta-icon i {
				font-size: 16px;
				color: rgba(255, 255, 255, 0.9);
			}
			
			.meta-content {
				display: flex;
				flex-direction: column;
				gap: 2px;
			}
			
			.meta-label {
				font-size: 11px;
				color: rgba(255, 255, 255, 0.7);
				font-weight: 500;
				text-transform: uppercase;
				letter-spacing: 0.5px;
			}
			
			.meta-value {
				font-size: 15px;
				color: #ffffff;
				font-weight: 600;
			}
			
			/* Success Alert */
			.success-alert {
				background: #f0fdf4;
				border: 1px solid #86efac;
				border-left: 4px solid #22c55e;
				border-radius: 12px;
				padding: 16px 20px;
				margin-bottom: 24px;
				display: flex;
				align-items: center;
				gap: 12px;
			}
			
			.success-alert-icon {
				width: 36px;
				height: 36px;
				background: #dcfce7;
				border-radius: 8px;
				display: flex;
				align-items: center;
				justify-content: center;
				flex-shrink: 0;
			}
			
			.success-alert-icon i {
				color: #16a34a;
				font-size: 18px;
			}
			
			.success-alert-text {
				color: #166534;
				font-size: 14px;
				font-weight: 600;
			}
			
			/* Form Card */
			.form-card {
				background: #ffffff;
				border-radius: 16px;
				padding: 32px;
				box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
				border: 1px solid #e2e8f0;
			}
			
			.form-header {
				display: flex;
				align-items: center;
				gap: 16px;
				margin-bottom: 28px;
				padding-bottom: 20px;
				border-bottom: 1px solid #e2e8f0;
			}
			
			.form-icon {
				width: 48px;
				height: 48px;
				background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
				border-radius: 12px;
				display: flex;
				align-items: center;
				justify-content: center;
				flex-shrink: 0;
			}
			
			.form-icon i {
				color: #ffffff;
				font-size: 22px;
			}
			
			.form-title-block h3 {
				font-size: 20px;
				font-weight: 700;
				color: #0f172a;
				margin: 0 0 4px 0;
				letter-spacing: -0.3px;
			}
			
			.form-subtitle {
				font-size: 14px;
				color: #64748b;
				margin: 0;
			}
			
			/* Form Grid */
			.form-grid {
				display: grid;
				grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
				gap: 24px;
				margin-bottom: 24px;
			}
			
			.form-grid-full {
				grid-column: 1 / -1;
			}
			
			/* Form Field */
			.form-field {
				display: flex;
				flex-direction: column;
			}
			
			.field-label {
				display: flex;
				align-items: center;
				gap: 8px;
				font-size: 14px;
				font-weight: 600;
				color: #1e293b;
				margin-bottom: 8px;
			}
			
			.field-label i {
				color: #6366f1;
				font-size: 15px;
			}
			
			.required-mark {
				color: #ef4444;
			}
			
			.field-input {
				width: 100%;
				padding: 12px 16px;
				font-size: 15px;
				font-weight: 500;
				color: #0f172a;
				background: #ffffff;
				border: 1.5px solid #e2e8f0;
				border-radius: 10px;
				transition: all 0.2s ease;
				outline: none;
			}
			
			.field-input:focus {
				border-color: #6366f1;
				box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
			}
			
			.field-input:hover:not(:disabled) {
				border-color: #cbd5e1;
			}
			
			.field-input:disabled,
			.field-input[readonly] {
				background: #f8fafc;
				color: #94a3b8;
				cursor: not-allowed;
				border-color: #e2e8f0;
			}
			
			textarea.field-input {
				min-height: 110px;
				resize: vertical;
				line-height: 1.6;
			}
			
			select.field-input {
				cursor: pointer;
				appearance: none;
				background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%236366f1' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
				background-repeat: no-repeat;
				background-position: right 14px center;
				padding-right: 45px;
			}
			
			.field-hint {
				display: flex;
				align-items: center;
				gap: 6px;
				font-size: 13px;
				color: #64748b;
				margin-top: 6px;
			}
			
			.field-hint i {
				font-size: 12px;
				color: #94a3b8;
			}
			
			/* Action Buttons */
			.action-buttons {
				display: flex;
				gap: 12px;
				margin-top: 28px;
				padding-top: 24px;
				border-top: 1px solid #e2e8f0;
			}
			
			.btn-primary-custom {
				display: inline-flex;
				align-items: center;
				justify-content: center;
				gap: 10px;
				padding: 13px 28px;
				font-size: 15px;
				font-weight: 600;
				color: #ffffff;
				background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
				border: none;
				border-radius: 10px;
				cursor: pointer;
				transition: all 0.2s ease;
				box-shadow: 0 2px 8px rgba(99, 102, 241, 0.25);
			}
			
			.btn-primary-custom:hover {
				transform: translateY(-1px);
				box-shadow: 0 4px 12px rgba(99, 102, 241, 0.35);
			}
			
			.btn-primary-custom:active {
				transform: translateY(0);
			}
			
			.btn-primary-custom i {
				font-size: 16px;
			}
			
			.btn-secondary-custom {
				display: inline-flex;
				align-items: center;
				justify-content: center;
				gap: 10px;
				padding: 13px 28px;
				font-size: 15px;
				font-weight: 600;
				color: #475569;
				background: #ffffff;
				border: 1.5px solid #e2e8f0;
				border-radius: 10px;
				cursor: pointer;
				transition: all 0.2s ease;
			}
			
			.btn-secondary-custom:hover {
				background: #f8fafc;
				border-color: #cbd5e1;
			}
			
			.btn-secondary-custom i {
				font-size: 16px;
			}
			
			/* Responsive Design */
			@media (max-width: 768px) {
				.main-content {
					padding: 20px 16px;
				}
				
				.page-title {
					font-size: 26px;
				}
				
				.doctor-info-section {
					padding: 24px 20px;
				}
				
				.doctor-header {
					flex-direction: column;
					align-items: flex-start;
					gap: 16px;
				}
				
				.doctor-avatar {
					width: 64px;
					height: 64px;
				}
				
				.doctor-avatar i {
					font-size: 28px;
				}
				
				.doctor-name-block h2 {
					font-size: 22px;
				}
				
				.doctor-meta-row {
					gap: 24px;
					width: 100%;
				}
				
				.meta-box {
					min-width: auto;
				}
				
				.form-card {
					padding: 24px 20px;
				}
				
				.form-grid {
					grid-template-columns: 1fr;
					gap: 20px;
				}
				
				.action-buttons {
					flex-direction: column;
				}
				
				.btn-primary-custom,
				.btn-secondary-custom {
					width: 100%;
				}
			}
			
			/* Hide old elements */
			#page-title,
			.panel {
				display: none !important;
			}
			
			.container-fluid.container-fullw {
				background: transparent;
				padding: 0;
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
						
						<!-- Page Header -->
						<div class="page-header">
							<h1 class="page-title">Edit Doctor Details</h1>
							<div class="page-breadcrumb">
								<span>Dashboard</span>
								<i class="fas fa-chevron-right"></i>
								<span>Doctors</span>
								<i class="fas fa-chevron-right"></i>
								<span>Edit Doctor</span>
							</div>
						</div>
						
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<?php if($msg): ?>
									<div class="success-alert">
										<div class="success-alert-icon">
											<i class="fas fa-check-circle"></i>
										</div>
										<div class="success-alert-text">
											<?php echo htmlentities($msg);?>
										</div>
									</div>
									<?php endif; ?>
									
									<?php 
									$sql=mysqli_query($con,"select * from doctors where id='$did'");
									while($data=mysqli_fetch_array($sql))
									{
									?>
									
									<!-- Doctor Info Section -->
									<div class="doctor-info-section">
										<div class="doctor-header">
											<div class="doctor-avatar">
												<i class="fas fa-user-doctor"></i>
											</div>
											<div class="doctor-name-block">
												<h2><?php echo htmlentities($data['doctorName']);?></h2>
												<div class="doctor-subtitle">Medical Professional Profile</div>
											</div>
										</div>
										<div class="doctor-meta-row">
											<div class="meta-box">
												<div class="meta-icon">
													<i class="fas fa-calendar-plus"></i>
												</div>
												<div class="meta-content">
													<div class="meta-label">Registered On</div>
													<div class="meta-value"><?php echo date('M d, Y', strtotime($data['creationDate']));?></div>
												</div>
											</div>
											<?php if($data['updationDate']): ?>
											<div class="meta-box">
												<div class="meta-icon">
													<i class="fas fa-clock-rotate-left"></i>
												</div>
												<div class="meta-content">
													<div class="meta-label">Last Updated</div>
													<div class="meta-value"><?php echo date('M d, Y', strtotime($data['updationDate']));?></div>
												</div>
											</div>
											<?php endif; ?>
										</div>
									</div>
									
									<!-- Edit Form Card -->
									<div class="form-card">
										<div class="form-header">
											<div class="form-icon">
												<i class="fas fa-pen-to-square"></i>
											</div>
											<div class="form-title-block">
												<h3>Update Doctor Information</h3>
												<p class="form-subtitle">Modify doctor details and professional information</p>
											</div>
										</div>
										
										<form role="form" name="adddoc" method="post">
											
											<!-- Specialization & Name -->
											<div class="form-grid">
												<div class="form-field">
													<label class="field-label">
														<i class="fas fa-stethoscope"></i>
														<span>Doctor Specialization <span class="required-mark">*</span></span>
													</label>
													<select name="Doctorspecialization" class="field-input" required>
														<option value="<?php echo htmlentities($data['specilization']);?>">
															<?php echo htmlentities($data['specilization']);?>
														</option>
														<?php 
														$ret=mysqli_query($con,"select * from doctorspecilization");
														while($row=mysqli_fetch_array($ret))
														{
														?>
														<option value="<?php echo htmlentities($row['specilization']);?>">
															<?php echo htmlentities($row['specilization']);?>
														</option>
														<?php } ?>
													</select>
												</div>
												
												<div class="form-field">
													<label class="field-label">
														<i class="fas fa-user-doctor"></i>
														<span>Doctor Full Name <span class="required-mark">*</span></span>
													</label>
													<input 
														type="text" 
														name="docname" 
														class="field-input" 
														value="<?php echo htmlentities($data['doctorName']);?>"
														placeholder="Enter doctor's full name"
														required
													>
												</div>
											</div>
											
											<!-- Clinic Address -->
											<div class="form-grid form-grid-full">
												<div class="form-field">
													<label class="field-label">
														<i class="fas fa-location-dot"></i>
														<span>Clinic Address</span>
													</label>
													<textarea 
														name="clinicaddress" 
														class="field-input"
														placeholder="Enter complete clinic address with street, city, and postal code"
													><?php echo htmlentities($data['address']);?></textarea>
													<div class="field-hint">
														<i class="fas fa-info-circle"></i>
														<span>Provide the complete address for patient reference</span>
													</div>
												</div>
											</div>
											
											<!-- Fees & Contact -->
											<div class="form-grid">
												<div class="form-field">
													<label class="field-label">
														<i class="fas fa-dollar-sign"></i>
														<span>Consultancy Fees <span class="required-mark">*</span></span>
													</label>
													<input 
														type="text" 
														name="docfees" 
														class="field-input" 
														value="<?php echo htmlentities($data['docFees']);?>"
														placeholder="Enter consultation fee amount"
														required
													>
													<div class="field-hint">
														<i class="fas fa-info-circle"></i>
														<span>Fee amount in your local currency</span>
													</div>
												</div>
												
												<div class="form-field">
													<label class="field-label">
														<i class="fas fa-phone"></i>
														<span>Contact Number <span class="required-mark">*</span></span>
													</label>
													<input 
														type="text" 
														name="doccontact" 
														class="field-input" 
														value="<?php echo htmlentities($data['contactno']);?>"
														placeholder="Enter contact number"
														required
													>
													<div class="field-hint">
														<i class="fas fa-info-circle"></i>
														<span>Primary contact for appointments</span>
													</div>
												</div>
											</div>
											
											<!-- Email -->
											<div class="form-grid form-grid-full">
												<div class="form-field">
													<label class="field-label">
														<i class="fas fa-envelope"></i>
														<span>Email Address</span>
													</label>
													<input 
														type="email" 
														name="docemail" 
														class="field-input" 
														value="<?php echo htmlentities($data['docEmail']);?>"
														readonly
													>
													<div class="field-hint">
														<i class="fas fa-lock"></i>
														<span>Email address cannot be modified</span>
													</div>
												</div>
											</div>
											
											<?php } ?>
											
											<!-- Action Buttons -->
											<div class="action-buttons">
												<button type="submit" name="submit" class="btn-primary-custom">
													<i class="fas fa-save"></i>
													<span>Update Doctor Details</span>
												</button>
												<button type="button" class="btn-secondary-custom" onclick="window.history.back();">
													<i class="fas fa-arrow-left"></i>
													<span>Cancel</span>
												</button>
											</div>
										</form>
									</div>
									
								</div>
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
		
		<!-- Page Specific JavaScripts -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		
		<!-- Theme JavaScripts -->
		<script src="assets/js/main.js"></script>
		<script src="assets/js/form-elements.js"></script>
		
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
	</body>
</html>
<?php } ?>