<?php
/**
 * Appointment History Page
 * File: appointment-history.php
 */
session_start();
error_reporting(0);
include('include/config.php');

if(strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Appointment History</title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link rel="stylesheet" href="vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="vendor/perfect-scrollbar/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="vendor/switchery/switchery.min.css">
    <link rel="stylesheet" href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css">
    <link rel="stylesheet" href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css">
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color">
    
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
        
        /* Stats Summary */
        .stats-summary {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        
        .stat-card {
            flex: 1;
            min-width: 200px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 20px 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card.total {
            border-left: 4px solid #667eea;
        }
        
        .stat-card.active {
            border-left: 4px solid #10b981;
        }
        
        .stat-card.cancelled {
            border-left: 4px solid #ef4444;
        }
        
        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }
        
        .stat-label {
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
        }
        
        .stat-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .stat-card.total .stat-icon {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }
        
        .stat-card.active .stat-icon {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }
        
        .stat-card.cancelled .stat-icon {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1;
        }
        
        /* Table Card - Simple White Background */
        .table-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        }
        
        .table-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e2e8f0;
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
            padding: 16px 12px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            color: #475569;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
            text-align: left;
            white-space: nowrap;
        }
        
        .table-modern thead th:first-child {
            border-radius: 12px 0 0 0;
            text-align: center;
        }
        
        .table-modern thead th:last-child {
            border-radius: 0 12px 0 0;
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
            font-size: 14px;
            color: #334155;
            vertical-align: middle;
        }
        
        .table-modern tbody td:first-child {
            text-align: center;
        }
        
        /* Table Cell Styles */
        .cell-number {
            font-weight: 700;
            color: #667eea;
            font-size: 15px;
        }
        
        .cell-name {
            font-weight: 600;
            color: #0f172a;
        }
        
        .date-time-cell small {
            display: block;
            margin-top: 4px;
            color: #64748b;
            font-size: 11px;
        }
        
        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }
        
        .status-badge.active {
            background: #d1fae5;
            color: #059669;
        }
        
        .status-badge.cancelled-patient {
            background: #fee2e2;
            color: #dc2626;
        }
        
        .status-badge.cancelled-doctor {
            background: #fed7aa;
            color: #c2410c;
        }
        
        .status-badge i {
            font-size: 10px;
        }
        
        /* Action Text */
        .action-text {
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .action-text.no-action {
            color: #64748b;
        }
        
        .action-text.cancelled {
            color: #ef4444;
        }
        
        /* Alert Message */
        .alert-message {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 24px;
            color: #92400e;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }
        
        .empty-state-icon {
            width: 100px;
            height: 100px;
            background: #f1f5f9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        
        .empty-state-icon i {
            font-size: 40px;
            color: #94a3b8;
        }
        
        .empty-state-title {
            font-size: 18px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 8px;
        }
        
        .empty-state-text {
            font-size: 14px;
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
            
            .stats-summary {
                flex-direction: column;
            }
            
            .stat-card {
                min-width: 100%;
            }
            
            .table-wrapper {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            
            .table-modern {
                min-width: 1000px;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <?php include('include/sidebar.php'); ?>
        
        <div class="app-content">
            <?php include('include/header.php'); ?>
            
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    
                    <!-- Simple Page Title - Like Dashboard -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Appointment History</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>Appointment History</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    
                    <!-- Stats Summary Cards -->
                    <div class="stats-summary">
                        <?php 
                        // Count statistics
                        $total_query = mysqli_query($con, "
                            SELECT COUNT(*) as total 
                            FROM appointment 
                            JOIN doctors ON doctors.id = appointment.doctorId 
                            JOIN users ON users.id = appointment.userId
                        ");
                        $total_row = mysqli_fetch_assoc($total_query);
                        $total = $total_row['total'];
                        
                        $active_query = mysqli_query($con, "
                            SELECT COUNT(*) as active 
                            FROM appointment 
                            JOIN doctors ON doctors.id = appointment.doctorId 
                            JOIN users ON users.id = appointment.userId
                            WHERE appointment.userStatus=1 AND appointment.doctorStatus=1
                        ");
                        $active_row = mysqli_fetch_assoc($active_query);
                        $active = $active_row['active'];
                        
                        $cancelled_query = mysqli_query($con, "
                            SELECT COUNT(*) as cancelled 
                            FROM appointment 
                            JOIN doctors ON doctors.id = appointment.doctorId 
                            JOIN users ON users.id = appointment.userId
                            WHERE appointment.userStatus=0 OR appointment.doctorStatus=0
                        ");
                        $cancelled_row = mysqli_fetch_assoc($cancelled_query);
                        $cancelled = $cancelled_row['cancelled'];
                        ?>
                        
                        <div class="stat-card total">
                            <div class="stat-header">
                                <span class="stat-label">Total Appointments</span>
                                <div class="stat-icon">
                                    <i class="fas fa-list"></i>
                                </div>
                            </div>
                            <div class="stat-value"><?php echo $total; ?></div>
                        </div>
                        
                        <div class="stat-card active">
                            <div class="stat-header">
                                <span class="stat-label">Active</span>
                                <div class="stat-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="stat-value"><?php echo $active; ?></div>
                        </div>
                        
                        <div class="stat-card cancelled">
                            <div class="stat-header">
                                <span class="stat-label">Cancelled</span>
                                <div class="stat-icon">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                            </div>
                            <div class="stat-value"><?php echo $cancelled; ?></div>
                        </div>
                    </div>
                    
                    <!-- Table Section -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <?php if(!empty($_SESSION['msg'])): ?>
                                <div class="alert-message">
                                    <i class="fas fa-info-circle"></i>
                                    <span><?php echo htmlentities($_SESSION['msg']); $_SESSION['msg'] = ""; ?></span>
                                </div>
                                <?php endif; ?>
                                
                                <div class="table-card">
                                    <div class="table-header">
                                        <div class="table-icon">
                                            <i class="fas fa-clipboard-list"></i>
                                        </div>
                                        <h2 class="table-title">All Appointments</h2>
                                    </div>
                                    
                                    <div class="table-wrapper">
                                        <table class="table-modern">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>DOCTOR</th>
                                                    <th>PATIENT</th>
                                                    <th>SPECIALIZATION</th>
                                                    <th>FEE</th>
                                                    <th>APPOINTMENT</th>
                                                    <th>CREATED</th>
                                                    <th>STATUS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = mysqli_query($con, "
                                                    SELECT 
                                                        doctors.doctorName as docname,
                                                        users.fullName as pname,
                                                        appointment.*  
                                                    FROM appointment 
                                                    JOIN doctors ON doctors.id = appointment.doctorId 
                                                    JOIN users ON users.id = appointment.userId 
                                                    ORDER BY appointment.id DESC
                                                ");
                                                
                                                $cnt = 1;
                                                $has_records = false;
                                                
                                                while($row = mysqli_fetch_array($sql)) {
                                                    $has_records = true;
                                                ?>
                                                <tr>
                                                    <td class="cell-number"><?php echo $cnt; ?></td>
                                                    <td>
                                                        <div class="cell-name"><?php echo htmlentities($row['docname']); ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="cell-name"><?php echo htmlentities($row['pname']); ?></div>
                                                    </td>
                                                    <td><?php echo htmlentities($row['doctorSpecialization']); ?></td>
                                                    <td>$<?php echo number_format($row['consultancyFees'], 2); ?></td>
                                                    <td>
                                                        <div class="date-time-cell">
                                                            <div><?php echo date('M d, Y', strtotime($row['appointmentDate'])); ?></div>
                                                            <small><?php echo htmlentities($row['appointmentTime']); ?></small>
                                                        </div>
                                                    </td>
                                                    <td><?php echo date('M d, Y', strtotime($row['postingDate'])); ?></td>
                                                    <td>
                                                        <?php 
                                                        if($row['userStatus'] == 1 && $row['doctorStatus'] == 1) {
                                                            echo '<span class="status-badge active"><i class="fas fa-check-circle"></i> Active</span>';
                                                        } elseif($row['userStatus'] == 0 && $row['doctorStatus'] == 1) {
                                                            echo '<span class="status-badge cancelled-patient"><i class="fas fa-user-xmark"></i> Patient</span>';
                                                        } elseif($row['userStatus'] == 1 && $row['doctorStatus'] == 0) {
                                                            echo '<span class="status-badge cancelled-doctor"><i class="fas fa-user-doctor"></i> Doctor</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        if($row['userStatus'] == 1 && $row['doctorStatus'] == 1) {
                                                            echo '<span class="action-text no-action"><i class="fas fa-hourglass-half"></i> Pending</span>';
                                                        } else {
                                                            echo '<span class="action-text cancelled"><i class="fas fa-ban"></i> Cancelled</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php 
                                                    $cnt++;
                                                }
                                                
                                                if(!$has_records) {
                                                ?>
                                                <tr>
                                                    <td colspan="9">
                                                        <div class="empty-state">
                                                            <div class="empty-state-icon">
                                                                <i class="fas fa-calendar-xmark"></i>
                                                            </div>
                                                            <h3 class="empty-state-title">No Appointments Found</h3>
                                                            <p class="empty-state-text">There are no appointment records to display.</p>
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
                    
                </div>
            </div>
        </div>
                
        <!-- Settings -->
        <?php include('include/setting.php'); ?>
    </div>
    
    <!-- JavaScripts -->
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