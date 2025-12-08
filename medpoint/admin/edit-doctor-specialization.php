<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
$id=intval($_GET['id']);// get value
if(isset($_POST['submit']))
{
$docspecialization=$_POST['doctorspecilization'];
$sql=mysqli_query($con,"update  doctorSpecilization set specilization='$docspecialization' where id='$id'");
$_SESSION['msg']="Doctor Specialization updated successfully !!";
} 

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Edit Doctor Specialization</title>
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
				padding: 35px 40px;
			}
			
			/* Dashboard Style Title */
			.dashboard-title {
				margin-bottom: 35px;
			}
			
			.dashboard-title h1 {
				font-size: 48px;
				font-weight: 800;
				background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
				background-clip: text;
				margin: 0;
				letter-spacing: 1px;
				text-transform: uppercase;
			}
			
			/* Form Card */
			.form-card-modern {
				background: #ffffff;
				border-radius: 20px;
				padding: 40px;
				box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
				border: 1px solid #e2e8f0;
				transition: all 0.4s ease;
				max-width: 700px;
				margin: 0 auto;
			}
			
			.form-card-modern:hover {
				box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
			}
			
			.card-header-section {
				display: flex;
				align-items: center;
				gap: 14px;
				margin-bottom: 32px;
				padding-bottom: 24px;
				border-bottom: 2px solid #e2e8f0;
			}
			
			.card-icon-badge {
				width: 56px;
				height: 56px;
				background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
				border-radius: 16px;
				display: flex;
				align-items: center;
				justify-content: center;
				box-shadow: 0 6px 16px rgba(102, 126, 234, 0.3);
			}
			
			.card-icon-badge i {
				color: #ffffff;
				font-size: 24px;
			}
			
			.card-title-main {
				font-size: 24px;
				font-weight: 700;
				color: #0f172a;
				margin: 0;
				letter-spacing: -0.5px;
			}
			
			.card-subtitle {
				font-size: 14px;
				color: #64748b;
				margin: 6px 0 0 0;
				font-weight: 500;
			}
			
			/* Success Message */
			.alert-success-modern {
				background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
				border: 2px solid #6ee7b7;
				border-radius: 12px;
				padding: 16px 20px;
				margin-bottom: 24px;
				display: flex;
				align-items: center;
				gap: 12px;
				color: #065f46;
				font-weight: 600;
				font-size: 14px;
			}
			
			.alert-success-modern i {
				font-size: 20px;
				color: #059669;
			}
			
			/* Form Group */
			.form-group-modern {
				margin-bottom: 28px;
			}
			
			.form-label-modern {
				display: block;
				font-size: 14px;
				font-weight: 600;
				color: #334155;
				margin-bottom: 10px;
				letter-spacing: 0.3px;
			}
			
			.form-label-modern i {
				color: #667eea;
				margin-right: 8px;
				font-size: 16px;
			}
			
			/* Input Field */
			.form-control-modern {
				width: 100%;
				padding: 14px 18px;
				font-size: 15px;
				font-weight: 500;
				color: #1e293b;
				background: #f8fafc;
				border: 2px solid #e2e8f0;
				border-radius: 12px;
				transition: all 0.3s ease;
				outline: none;
			}
			
			.form-control-modern:focus {
				background: #ffffff;
				border-color: #667eea;
				box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
			}
			
			.form-control-modern:hover {
				border-color: #cbd5e1;
			}
			
			/* Button */
			.btn-modern {
				display: inline-flex;
				align-items: center;
				gap: 10px;
				padding: 14px 32px;
				font-size: 15px;
				font-weight: 700;
				color: #ffffff;
				background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
				border: none;
				border-radius: 12px;
				cursor: pointer;
				transition: all 0.3s ease;
				box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
				text-transform: uppercase;
				letter-spacing: 0.5px;
			}
			
			.btn-modern:hover {
				transform: translateY(-2px);
				box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
			}
			
			.btn-modern:active {
				transform: translateY(0);
			}
			
			.btn-modern i {
				font-size: 16px;
			}
			
			/* Helper Text */
			.helper-text {
				font-size: 13px;
				color: #64748b;
				margin-top: 8px;
				display: flex;
				align-items: center;
				gap: 6px;
			}
			
			.helper-text i {
				color: #94a3b8;
				font-size: 14px;
			}
			
			/* Responsive */
			@media (max-width: 768px) {
				.main-content {
					padding: 20px 16px;
				}
				
				.dashboard-title h1 {
					font-size: 36px;
				}
				
				.form-card-modern {
					padding: 28px 20px;
					border-radius: 16px;
				}
				
				.card-header-section {
					flex-direction: column;
					align-items: flex-start;
					gap: 12px;
				}
				
				.card-icon-badge {
					width: 48px;
					height: 48px;
				}
				
				.card-icon-badge i {
					font-size: 20px;
				}
				
				.card-title-main {
					font-size: 20px;
				}
			}
			
			/* Container Overrides */
			.container-fluid.container-fullw {
				background: transparent;
				padding: 0;
			}
			
			/* Remove old styles */
			#page-title {
				display: none;
			}
			
			.panel {
				display: none;
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
						
						<!-- Dashboard Style Title -->
						<div class="dashboard-title">
							<h1>EDIT DOCTOR SPECIALIZATION</h1>
						</div>
						
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="form-card-modern">
										<div class="card-header-section">
											<div class="card-icon-badge">
												<i class="fas fa-user-md"></i>
											</div>
											<div>
												<h2 class="card-title-main">Update Specialization</h2>
												<p class="card-subtitle">Modify the doctor specialization details</p>
											</div>
										</div>
										
										<?php if($_SESSION['msg']): ?>
										<div class="alert-success-modern">
											<i class="fas fa-check-circle"></i>
											<span><?php echo htmlentities($_SESSION['msg']);?></span>
										</div>
										<?php echo htmlentities($_SESSION['msg']="");?>
										<?php endif; ?>
										
										<form role="form" name="dcotorspcl" method="post">
											<?php 
											$id=intval($_GET['id']);
											$sql=mysqli_query($con,"select * from doctorSpecilization where id='$id'");
											while($row=mysqli_fetch_array($sql))
											{
											?>
											<div class="form-group-modern">
												<label class="form-label-modern">
													<i class="fas fa-stethoscope"></i>
													Doctor Specialization
												</label>
												<input 
													type="text" 
													name="doctorspecilization" 
													class="form-control-modern" 
													value="<?php echo htmlentities($row['specilization']);?>"
													placeholder="Enter specialization name"
													required
												>
												<div class="helper-text">
													<i class="fas fa-info-circle"></i>
													Enter the medical specialization field
												</div>
											</div>
											<?php } ?>
											
											<button type="submit" name="submit" class="btn-modern">
												<i class="fas fa-save"></i>
												Update Specialization
											</button>
										</form>
									</div>
									
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