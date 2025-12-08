<?php error_reporting(0);?>
<style>
	/* Import Poppins Font */
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
	
	/* Header/Navbar Styles - Purple Theme */
	.navbar-default {
		background: #ffffff !important;
		border: none !important;
		border-bottom: 2px solid #e0e7ff !important;
		box-shadow: 0 2px 12px rgba(99, 102, 241, 0.08) !important;
		font-family: 'Poppins', sans-serif !important;
		min-height: 70px !important;
		padding: 0 20px !important;
	}
	
	.navbar-default * {
		font-family: 'Poppins', sans-serif !important;
	}
	
	/* Brand/Logo */
	.navbar-brand h2 {
		font-size: 26px !important;
		font-weight: 800 !important;
		color: #6366f1 !important;
		margin: 0 !important;
		padding-top: 0 !important;
		line-height: 70px !important;
		letter-spacing: 0.5px !important;
	}
	
	/* Admin Title in Center */
	.nav.navbar-right li h2 {
		font-size: 20px !important;
		font-weight: 700 !important;
		color: #1e293b !important;
		margin: 0 !important;
		padding: 0 !important;
		line-height: 70px !important;
	}
	
	/* Sidebar Toggle Buttons */
	.sidebar-toggler,
	.sidebar-mobile-toggler,
	.menu-toggler {
		color: #6366f1 !important;
		font-size: 24px !important;
		padding: 23px 15px !important;
		transition: all 0.3s ease !important;
	}
	
	.sidebar-toggler:hover,
	.sidebar-mobile-toggler:hover,
	.menu-toggler:hover {
		color: #4f46e5 !important;
		background: rgba(99, 102, 241, 0.1) !important;
	}
	
	/* User Dropdown */
	.current-user > a {
		padding: 15px 20px !important;
		color: #1e293b !important;
		transition: all 0.3s ease !important;
		display: flex !important;
		align-items: center !important;
		gap: 12px !important;
	}
	
	.current-user > a:hover {
		background: rgba(99, 102, 241, 0.1) !important;
		color: #6366f1 !important;
	}
	
	/* User Avatar */
	.current-user img {
		width: 40px !important;
		height: 40px !important;
		border-radius: 50% !important;
		border: 2px solid #6366f1 !important;
		object-fit: cover !important;
		transition: all 0.3s ease !important;
	}
	
	.current-user > a:hover img {
		border-color: #4f46e5 !important;
		transform: scale(1.05) !important;
	}
	
	/* Username Text */
	.current-user .username {
		font-size: 14px !important;
		font-weight: 600 !important;
		color: #1e293b !important;
		display: flex !important;
		align-items: center !important;
		gap: 8px !important;
	}
	
	.current-user > a:hover .username {
		color: #6366f1 !important;
	}
	
	/* Dropdown Arrow */
	.current-user .username i {
		font-size: 16px !important;
		transition: transform 0.3s ease !important;
	}
	
	.current-user.open .username i {
		transform: rotate(180deg) !important;
	}
	
	/* Dropdown Menu */
	.dropdown-menu.dropdown-dark {
		background: #ffffff !important;
		border: 1px solid #e0e7ff !important;
		border-radius: 12px !important;
		box-shadow: 0 8px 24px rgba(99, 102, 241, 0.15) !important;
		padding: 8px !important;
		margin-top: 8px !important;
		min-width: 200px !important;
	}
	
	.dropdown-menu.dropdown-dark li a {
		color: #1e293b !important;
		padding: 12px 16px !important;
		font-size: 14px !important;
		font-weight: 500 !important;
		border-radius: 8px !important;
		transition: all 0.3s ease !important;
		display: flex !important;
		align-items: center !important;
		gap: 10px !important;
	}
	
	.dropdown-menu.dropdown-dark li a:hover {
		background: rgba(99, 102, 241, 0.1) !important;
		color: #6366f1 !important;
		transform: translateX(4px) !important;
	}
	
	.dropdown-menu.dropdown-dark li a::before {
		content: '›';
		font-size: 18px;
		font-weight: 700;
		color: #6366f1;
		transition: transform 0.3s ease;
	}
	
	.dropdown-menu.dropdown-dark li a:hover::before {
		transform: translateX(4px);
	}
	
	/* Navbar Collapse */
	.navbar-collapse {
		border: none !important;
	}
	
	/* Responsive Mobile Menu */
	.close-handle.menu-toggler {
		background: rgba(99, 102, 241, 0.1) !important;
		padding: 10px !important;
		border-radius: 8px !important;
	}
	
	/* Admin Badge Style */
	.nav.navbar-right li h2::before {
		content: '●';
		color: #6366f1;
		margin-right: 8px;
		font-size: 12px;
	}
	
	/* Navbar Right Alignment */
	.nav.navbar-right {
		display: flex !important;
		align-items: center !important;
		gap: 20px !important;
	}
	
	/* Mobile Responsive */
	@media (max-width: 768px) {
		.navbar-brand h2 {
			font-size: 20px !important;
			line-height: 60px !important;
		}
		
		.navbar-default {
			min-height: 60px !important;
		}
		
		.nav.navbar-right li h2 {
			font-size: 16px !important;
			line-height: 60px !important;
		}
	}
</style>

<header class="navbar navbar-default navbar-static-top">
	<!-- start: NAVBAR HEADER -->
	<div class="navbar-header">
		<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
			<i class="ti-align-justify"></i>
		</a>
		<a class="navbar-brand" href="dashboard.php">
			<h2>MedPoint</h2>
		</a>
		<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
			<i class="ti-align-justify"></i>
		</a>
		<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<i class="ti-view-grid"></i>
		</a>
	</div>
	<!-- end: NAVBAR HEADER -->
	
	<!-- start: NAVBAR COLLAPSE -->
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-right">
			<!-- Admin Title -->
			<li style="padding-top: 0;">
				<h2>Admin</h2>
			</li>
			
			<!-- User Dropdown -->
			<li class="dropdown current-user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="assets/images/images.jpg" alt="Admin">
					<span class="username">
						Admin
						<i class="ti-angle-down"></i>
					</span>
				</a>
				<ul class="dropdown-menu dropdown-dark">
					<li>
						<a href="change-password.php">
							Change Password
						</a>
					</li>
					<li>
						<a href="logout.php">
							Log Out
						</a>
					</li>
				</ul>
			</li>
		</ul>
		
		<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
		<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
			<div class="arrow-left"></div>
			<div class="arrow-right"></div>
		</div>
		<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
	</div>
	<!-- end: NAVBAR COLLAPSE -->
</header>