<?php
session_start();
//error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$cpass=$_POST['cpass'];	
$uname=$_SESSION['login'];
$sql=mysqli_query($con,"SELECT password FROM  admin where password='$cpass' && username='$uname'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$npass=$_POST['npass'];
 $con=mysqli_query($con,"update admin set password='$npass', updationDate='$currentTime' where username='$uname'");
$_SESSION['msg1']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg1']="Old Password not match !!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Change Password | Admin</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		
		<!-- Fonts & Icons -->
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
		
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		
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
				max-width: 700px;
				margin: 0 auto;
			}
			
			/* Simple Page Title - Matching Dashboard Style */
			#page-title {
				background: transparent;
				padding: 0 0 35px 0;
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
			
			/* Form Card */
			.form-card {
				background: #ffffff;
				border-radius: 20px;
				padding: 35px;
				box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
			}
			
			.form-header {
				display: flex;
				align-items: center;
				gap: 14px;
				margin-bottom: 24px;
				padding-bottom: 20px;
				border-bottom: 2px solid #e2e8f0;
			}
			
			.form-icon-badge {
				width: 52px;
				height: 52px;
				background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
				border-radius: 14px;
				display: flex;
				align-items: center;
				justify-content: center;
				box-shadow: 0 6px 16px rgba(102, 126, 234, 0.3);
				flex-shrink: 0;
			}
			
			.form-icon-badge i {
				color: #ffffff;
				font-size: 22px;
			}
			
			.form-header-content h2 {
				font-size: 20px;
				font-weight: 700;
				color: #0f172a;
				margin: 0 0 4px 0;
			}
			
			.form-header-content p {
				font-size: 13px;
				color: #64748b;
				margin: 0;
			}
			
			/* Alert Messages */
			.alert-modern {
				border-radius: 12px;
				padding: 14px 18px;
				margin-bottom: 20px;
				border: none;
				display: flex;
				align-items: center;
				gap: 10px;
				font-weight: 500;
				font-size: 14px;
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
			
			.alert-success {
				background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
				color: #065f46;
				border-left: 4px solid #10b981;
			}
			
			.alert-error {
				background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
				color: #991b1b;
				border-left: 4px solid #ef4444;
			}
			
			.alert-modern i {
				font-size: 18px;
			}
			
			/* Form Groups */
			.form-group {
				margin-bottom: 22px;
			}
			
			.form-group label {
				font-size: 14px;
				font-weight: 600;
				color: #334155;
				margin-bottom: 10px;
				display: flex;
				align-items: center;
				gap: 8px;
			}
			
			.form-group label i {
				color: #667eea;
				font-size: 14px;
			}
			
			.input-wrapper {
				position: relative;
			}
			
			.form-control {
				width: 100%;
				height: 50px;
				padding: 0 50px 0 18px;
				border: 2px solid #e2e8f0;
				border-radius: 12px;
				font-size: 14px;
				color: #1e293b;
				transition: all 0.3s ease;
				background: #f8fafc;
			}
			
			.form-control:focus {
				outline: none;
				border-color: #667eea;
				background: #ffffff;
				box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
			}
			
			.form-control:hover {
				border-color: #cbd5e1;
				background: #ffffff;
			}
			
			.form-control::placeholder {
				color: #94a3b8;
			}
			
			/* Toggle Password Visibility */
			.toggle-password {
				position: absolute;
				right: 18px;
				top: 50%;
				transform: translateY(-50%);
				color: #94a3b8;
				cursor: pointer;
				font-size: 16px;
				transition: color 0.3s ease;
				z-index: 10;
			}
			
			.toggle-password:hover {
				color: #667eea;
			}
			
			/* Submit Button */
			.btn-submit {
				display: flex;
				align-items: center;
				justify-content: center;
				gap: 10px;
				width: 100%;
				height: 52px;
				background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
				color: #ffffff;
				border: none;
				border-radius: 12px;
				font-size: 15px;
				font-weight: 700;
				cursor: pointer;
				transition: all 0.3s ease;
				box-shadow: 0 4px 16px rgba(102, 126, 234, 0.3);
				margin-top: 28px;
			}
			
			.btn-submit:hover {
				transform: translateY(-2px);
				box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
			}
			
			.btn-submit:active {
				transform: translateY(0);
			}
			
			.btn-submit i {
				font-size: 16px;
			}
			
			/* Security Tips */
			.security-tips {
				background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
				border-left: 4px solid #f59e0b;
				border-radius: 12px;
				padding: 18px 20px;
				margin-top: 24px;
			}
			
			.security-tips-title {
				display: flex;
				align-items: center;
				gap: 8px;
				font-size: 14px;
				font-weight: 700;
				color: #92400e;
				margin-bottom: 10px;
			}
			
			.security-tips-title i {
				font-size: 16px;
			}
			
			.security-tips ul {
				margin: 0;
				padding-left: 20px;
				color: #78350f;
			}
			
			.security-tips li {
				margin-bottom: 6px;
				font-size: 13px;
				font-weight: 500;
				line-height: 1.5;
			}
			
			.security-tips li:last-child {
				margin-bottom: 0;
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
				
				.form-card {
					padding: 24px 20px;
					border-radius: 16px;
				}
				
				.form-header {
					flex-direction: column;
					align-items: flex-start;
				}
			}
		</style>

<script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Field is Empty !!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.npass.value=="")
{
alert("New Password Field is Empty !!");
document.chngpwd.npass.focus();
return false;
}
else if(document.chngpwd.cfpass.value=="")
{
alert("Confirm Password Field is Empty !!");
document.chngpwd.cfpass.focus();
return false;
}
else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cfpass.focus();
return false;
}
return true;
}

// Toggle password visibility
function togglePassword(inputId, iconElement) {
	const input = document.getElementById(inputId);
	if (input.type === "password") {
		input.type = "text";
		iconElement.classList.remove("fa-eye");
		iconElement.classList.add("fa-eye-slash");
	} else {
		input.type = "password";
		iconElement.classList.remove("fa-eye-slash");
		iconElement.classList.add("fa-eye");
	}
}
</script>

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
									<h1 class="mainTitle">Change Password</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Change Password</span>
									</li>
								</ol>
							</div>
						</section>
						
						<!-- Form Section -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="form-card">
										<div class="form-header">
											<div class="form-icon-badge">
												<i class="fas fa-key"></i>
											</div>
											<div class="form-header-content">
												<h2>Update Password</h2>
												<p>Enter your current password and choose a new one</p>
											</div>
										</div>
										
										<!-- Alert Messages -->
										<?php if(!empty($_SESSION['msg1'])): ?>
											<?php 
											$isSuccess = strpos($_SESSION['msg1'], 'Successfully') !== false;
											$alertClass = $isSuccess ? 'alert-success' : 'alert-error';
											$iconClass = $isSuccess ? 'fa-check-circle' : 'fa-exclamation-circle';
											?>
											<div class="alert-modern <?php echo $alertClass; ?>">
												<i class="fas <?php echo $iconClass; ?>"></i>
												<span><?php echo htmlentities($_SESSION['msg1']); ?></span>
											</div>
											<?php $_SESSION['msg1']=""; ?>
										<?php endif; ?>
										
										<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
											
											<!-- Current Password -->
											<div class="form-group">
												<label for="currentPassword">
													<i class="fas fa-lock"></i>
													Current Password
												</label>
												<div class="input-wrapper">
													<input type="password" 
														   id="currentPassword"
														   name="cpass" 
														   class="form-control" 
														   placeholder="Enter your current password">
													<i class="fas fa-eye toggle-password" 
													   onclick="togglePassword('currentPassword', this)"></i>
												</div>
											</div>
											
											<!-- New Password -->
											<div class="form-group">
												<label for="newPassword">
													<i class="fas fa-key"></i>
													New Password
												</label>
												<div class="input-wrapper">
													<input type="password" 
														   id="newPassword"
														   name="npass" 
														   class="form-control" 
														   placeholder="Enter your new password">
													<i class="fas fa-eye toggle-password" 
													   onclick="togglePassword('newPassword', this)"></i>
												</div>
											</div>
											
											<!-- Confirm Password -->
											<div class="form-group">
												<label for="confirmPassword">
													<i class="fas fa-check-circle"></i>
													Confirm New Password
												</label>
												<div class="input-wrapper">
													<input type="password" 
														   id="confirmPassword"
														   name="cfpass" 
														   class="form-control" 
														   placeholder="Re-enter your new password">
													<i class="fas fa-eye toggle-password" 
													   onclick="togglePassword('confirmPassword', this)"></i>
												</div>
											</div>
											
											<!-- Submit Button -->
											<button type="submit" name="submit" class="btn-submit">
												<i class="fas fa-shield-alt"></i>
												Update Password
											</button>
											
										</form>
										
										<!-- Security Tips -->
										<div class="security-tips">
											<div class="security-tips-title">
												<i class="fas fa-lightbulb"></i>
												Password Security Tips
											</div>
											<ul>
												<li>Use at least 8 characters with a mix of letters, numbers, and symbols</li>
												<li>Don't use personal information or common words</li>
												<li>Change your password regularly for better security</li>
												<li>Never share your password with anyone</li>
											</ul>
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
		<script src="assets/js/main.js"></script>
		
		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
		</script>
	</body>
</html>
<?php } ?>