<div class="sidebar app-aside" id="sidebar">
	<div class="sidebar-container perfect-scrollbar">
		<style>
			/* Import Poppins Font */
			@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
			
			/* Sidebar Base Styles - Blue to Purple Gradient */
			.sidebar {
				font-family: 'Poppins', sans-serif !important;
				background: linear-gradient(180deg, #e0e7ff 0%, #ede9fe 100%) !important;
				width: 280px;
				box-shadow: 4px 0 24px rgba(102, 126, 234, 0.2);
			}
			
			.sidebar * {
				font-family: 'Poppins', sans-serif !important;
			}
			
			.sidebar-container {
				padding: 15px 0 30px 0;
			}
			
			/* Navbar Title */
			.navbar-title {
				padding: 15px 20px 12px 20px;
				margin-bottom: 8px;
				border-bottom: none !important;
			}
			
			.navbar-title span {
				font-size: 10px;
				font-weight: 700;
				text-transform: uppercase;
				letter-spacing: 1.5px;
				color: #6366f1 !important;
			}
			
			/* Main Navigation Menu */
			.main-navigation-menu {
				list-style: none;
				padding: 0;
				margin: 0;
			}
			
			.main-navigation-menu > li {
				margin-bottom: 2px;
				border-bottom: none !important;
			}
			
			/* Menu Links - Compact Version */
			.main-navigation-menu > li > a {
				display: flex;
				align-items: center;
				padding: 11px 20px !important;
				color: #1e293b !important;
				text-decoration: none !important;
				transition: all 0.3s ease;
				position: relative;
				border-left: 3px solid transparent;
				border-bottom: none !important;
			}
			
			.main-navigation-menu > li > a:hover {
				background: rgba(99, 102, 241, 0.15) !important;
				color: #1e293b !important;
				border-left-color: #6366f1;
				text-decoration: none !important;
			}
			
			.main-navigation-menu > li > a.active,
			.main-navigation-menu > li.active > a {
				background: rgba(99, 102, 241, 0.2) !important;
				color: #1e293b !important;
				border-left-color: #6366f1;
			}
			
			/* Item Content */
			.item-content {
				display: flex;
				align-items: center;
				width: 100%;
				gap: 12px;
				border-bottom: none !important;
			}
			
			/* Icon Styling - Compact & Fixed */
			.item-media {
				width: 35px;
				height: 35px;
				display: flex;
				align-items: center;
				justify-content: center;
				background: rgba(99, 102, 241, 0.15);
				border-radius: 10px;
				flex-shrink: 0;
				transition: all 0.3s ease;
			}
			
			.item-media i {
				font-size: 18px !important;
				color: #6366f1 !important;
				transition: all 0.3s ease;
				display: block !important;
				width: auto !important;
				height: auto !important;
			}
			
			.main-navigation-menu > li > a:hover .item-media {
				background: rgba(99, 102, 241, 0.25);
				transform: translateX(5px);
			}
			
			.main-navigation-menu > li > a:hover .item-media i,
			.main-navigation-menu > li.active > a .item-media i {
				color: #4f46e5 !important;
				transform: scale(1.1);
			}
			
			/* Item Inner */
			.item-inner {
				display: flex;
				align-items: center;
				justify-content: space-between;
				flex: 1;
				border-bottom: none !important;
			}
			
			.item-inner .title {
				font-size: 13px;
				font-weight: 500;
				color: #1e293b !important;
			}
			
			/* Arrow Icon - Aligned Right */
			.icon-arrow {
				margin-left: auto;
				width: 20px;
				height: 20px;
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 16px;
				transition: transform 0.3s ease;
				color: #64748b !important;
				font-style: normal;
			}
			
			.icon-arrow::before {
				content: '›';
				display: block;
				transition: transform 0.3s ease;
				font-weight: 600;
			}
			
			.main-navigation-menu > li > a:hover .icon-arrow {
				color: #1e293b !important;
			}
			
			/* Submenu Styles - Compact */
			.sub-menu {
				list-style: none;
				padding: 0;
				margin: 0;
				background: rgba(99, 102, 241, 0.08);
				display: none;
			}
			
			.sub-menu li {
				border-left: 3px solid transparent;
				border-bottom: none !important;
			}
			
			.sub-menu li a {
				display: block;
				padding: 9px 20px 9px 70px !important;
				color: #1e293b !important;
				text-decoration: none !important;
				font-size: 12px;
				font-weight: 400;
				transition: all 0.3s ease;
				position: relative;
				border-bottom: none !important;
			}
			
			.sub-menu li a::before {
				content: '';
				position: absolute;
				left: 55px;
				top: 50%;
				transform: translateY(-50%);
				width: 5px;
				height: 5px;
				background: #6366f1;
				border-radius: 50%;
				transition: all 0.3s ease;
			}
			
			.sub-menu li a:hover {
				color: #1e293b !important;
				background: rgba(99, 102, 241, 0.15) !important;
				padding-left: 73px !important;
				text-decoration: none !important;
			}
			
			.sub-menu li a:hover::before {
				background: #4f46e5;
				transform: translateY(-50%) scale(1.3);
			}
			
			.sub-menu li.active a {
				color: #1e293b !important;
				background: rgba(99, 102, 241, 0.2) !important;
			}
			
			/* Scrollbar Styling */
			.sidebar-container::-webkit-scrollbar {
				width: 5px;
			}
			
			.sidebar-container::-webkit-scrollbar-track {
				background: rgba(99, 102, 241, 0.1);
			}
			
			.sidebar-container::-webkit-scrollbar-thumb {
				background: rgba(99, 102, 241, 0.3);
				border-radius: 10px;
			}
			
			.sidebar-container::-webkit-scrollbar-thumb:hover {
				background: rgba(99, 102, 241, 0.5);
			}
			
			/* Active State Animation */
			@keyframes slideIn {
				from {
					opacity: 0;
					transform: translateX(-10px);
				}
				to {
					opacity: 1;
					transform: translateX(0);
				}
			}
			
			.main-navigation-menu > li {
				animation: slideIn 0.3s ease forwards;
			}
			
			.main-navigation-menu > li:nth-child(1) { animation-delay: 0.05s; }
			.main-navigation-menu > li:nth-child(2) { animation-delay: 0.1s; }
			.main-navigation-menu > li:nth-child(3) { animation-delay: 0.15s; }
			.main-navigation-menu > li:nth-child(4) { animation-delay: 0.2s; }
			.main-navigation-menu > li:nth-child(5) { animation-delay: 0.25s; }
			.main-navigation-menu > li:nth-child(6) { animation-delay: 0.3s; }
			.main-navigation-menu > li:nth-child(7) { animation-delay: 0.35s; }
			.main-navigation-menu > li:nth-child(8) { animation-delay: 0.4s; }
			.main-navigation-menu > li:nth-child(9) { animation-delay: 0.45s; }
			.main-navigation-menu > li:nth-child(10) { animation-delay: 0.5s; }
		</style>

		<nav>
			<!-- start: MAIN NAVIGATION MENU -->
			<div class="navbar-title">
				<span>Main Navigation</span>
			</div>
			<ul class="main-navigation-menu">
				<li>
					<a href="dashboard.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-home"></i>
							</div>
							<div class="item-inner">
								<span class="title">Dashboard</span>
							</div>
						</div>
					</a>
				</li>
				
				<li>
					<a href="javascript:void(0)">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-user"></i>
							</div>
							<div class="item-inner">
								<span class="title">Doctors</span>
								<i class="icon-arrow"></i>
							</div>
						</div>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="doctor-specilization.php">
								<span class="title">Doctor Specialization</span>
							</a>
						</li>
						<li>
							<a href="add-doctor.php">
								<span class="title">Add Doctor</span>
							</a>
						</li>
						<li>
							<a href="Manage-doctors.php">
								<span class="title">Manage Doctors</span>
							</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="javascript:void(0)">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-user"></i>
							</div>
							<div class="item-inner">
								<span class="title">Users</span>
								<i class="icon-arrow"></i>
							</div>
						</div>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="manage-users.php">
								<span class="title">Manage Users</span>
							</a>
						</li>
					</ul>
				</li>
				
				<li>
					<a href="javascript:void(0)">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-heart"></i>
							</div>
							<div class="item-inner">
								<span class="title">Patients</span>
								<i class="icon-arrow"></i>
							</div>
						</div>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="manage-patient.php">
								<span class="title">Manage Patients</span>
							</a>
						</li>
					</ul>
				</li>	

				<li>
					<a href="appointment-history.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-calendar"></i>
							</div>
							<div class="item-inner">
								<span class="title">Appointment History</span>
							</div>
						</div>
					</a>
				</li>

				<li>
					<a href="javascript:void(0)">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-email"></i>
							</div>
							<div class="item-inner">
								<span class="title">Contact us Queries</span>
								<i class="icon-arrow"></i>
							</div>
						</div>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="unread-queries.php">
								<span class="title">Unread Query</span>
							</a>
						</li>
						<li>
							<a href="read-query.php">
								<span class="title">Read Query</span>
							</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="doctor-logs.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-clipboard"></i>
							</div>
							<div class="item-inner">
								<span class="title">Doctor Session Logs</span>
							</div>
						</div>
					</a>
				</li>

				<li>
					<a href="user-logs.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-notepad"></i>
							</div>
							<div class="item-inner">
								<span class="title">User Session Logs</span>
							</div>
						</div>
					</a>
				</li>
				
				<li>
					<a href="javascript:void(0)">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-bar-chart"></i>
							</div>
							<div class="item-inner">
								<span class="title">Reports</span>
								<i class="icon-arrow"></i>
							</div>
						</div>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="between-dates-reports.php">
								<span class="title">B/w dates reports</span>
							</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="patient-search.php">
						<div class="item-content">
							<div class="item-media">
								<i class="ti-search"></i>
							</div>
							<div class="item-inner">
								<span class="title">Patient Search</span>
							</div>
						</div>
					</a>
				</li>
			</ul>
			<!-- end: CORE FEATURES -->
		</nav>
	</div>
</div>