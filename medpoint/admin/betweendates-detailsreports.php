<?php
/**
 * Between Dates Details Reports Page
 * File: betweendates-detailsreports.php
 */
session_start();
error_reporting(0);
include('include/config.php');

if(strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
    exit;
}

// Get date range from POST
$fdate = isset($_POST['fromdate']) ? $_POST['fromdate'] : '';
$tdate = isset($_POST['todate']) ? $_POST['todate'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Report | Admin</title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link rel="stylesheet" href="vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="vendor/perfect-scrollbar/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="vendor/switchery/switchery.min.css">
    
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
        
        /* Simple Date Range Display */
        .date-range-simple {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
            font-size: 15px;
            flex-wrap: wrap;
        }
        
        .date-range-simple .date-label {
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }
        
        .date-range-simple .date-value {
            font-weight: 700;
            color: #0f172a;
        }
        
        .date-range-simple .date-separator {
            color: #667eea;
            font-weight: 700;
        }
        
        /* Table Card */
        .table-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .card-header-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            padding-bottom: 24px;
            border-bottom: 2px solid #e2e8f0;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .card-header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        
        .card-icon-badge {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
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
            margin: 5px 0 0 0;
            font-weight: 500;
        }
        
        /* Stats Badge */
        .stat-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }
        
        .stat-badge i {
            font-size: 16px;
        }
        
        /* Modern Table */
        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 12px;
        }
        
        .table-modern {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 900px;
        }
        
        .table-modern thead {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }
        
        .table-modern thead th {
            padding: 18px 16px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            color: #475569;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
            text-align: left;
            white-space: nowrap;
            vertical-align: middle;
        }
        
        .table-modern thead th:first-child {
            border-radius: 12px 0 0 0;
            text-align: center;
        }
        
        .table-modern thead th:last-child {
            border-radius: 0 12px 0 0;
        }
        
        .table-modern tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid #f1f5f9;
        }
        
        .table-modern tbody tr:hover {
            background: linear-gradient(135deg, #f8faff 0%, #f1f5ff 100%);
        }
        
        .table-modern tbody td {
            padding: 20px 16px;
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
            font-size: 15px;
        }
        
        .cell-content {
            color: #475569;
            font-weight: 500;
        }
        
        /* Gender Badge */
        .gender-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            white-space: nowrap;
        }
        
        .gender-badge.male {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            border: 1px solid #93c5fd;
        }
        
        .gender-badge.female {
            background: linear-gradient(135deg, #fce7f3 0%, #fbcfe8 100%);
            color: #be185d;
            border: 1px solid #f9a8d4;
        }
        
        .gender-badge.other {
            background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 100%);
            color: #7c3aed;
            border: 1px solid #d8b4fe;
        }
        
        .gender-badge i {
            font-size: 13px;
        }
        
        /* Action Button */
        .btn-view {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 18px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }
        
        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
            color: #ffffff;
            text-decoration: none;
        }
        
        .btn-view i {
            font-size: 13px;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }
        
        .empty-state-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }
        
        .empty-state-icon i {
            font-size: 48px;
            color: #94a3b8;
        }
        
        .empty-state-title {
            font-size: 22px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 12px;
        }
        
        .empty-state-text {
            font-size: 15px;
            color: #64748b;
            line-height: 1.6;
            max-width: 500px;
            margin: 0 auto;
        }
        
        /* Back Button */
        .btn-back-bottom {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            background: #ffffff;
            color: #667eea;
            border: 2px solid #667eea;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.15);
        }
        
        .btn-back-bottom:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            border-color: #667eea;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(102, 126, 234, 0.3);
        }
        
        .btn-back-bottom i {
            font-size: 15px;
            transition: transform 0.3s ease;
        }
        
        .btn-back-bottom:hover i {
            transform: translateX(-4px);
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
            
            .date-range-simple {
                font-size: 13px;
                gap: 8px;
            }
            
            .table-card {
                padding: 20px;
                border-radius: 16px;
            }
            
            .card-header-section {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .stat-badge {
                width: 100%;
                justify-content: center;
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
                    
                    <!-- Simple Page Title -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Patients Report</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li>
                                    <span>Reports</span>
                                </li>
                                <li class="active">
                                    <span>View Report</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    
                    <!-- Date Range Info -->
                    <?php if($fdate && $tdate): ?>
                    <div class="date-range-simple">
                        <span class="date-label">Report Date Range</span>
                        <span class="date-separator">→</span>
                        <span class="date-value"><?php echo date('F d, Y', strtotime($fdate)); ?></span>
                        <span class="date-separator">→</span>
                        <span class="date-value"><?php echo date('F d, Y', strtotime($tdate)); ?></span>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Table Section -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="table-card">
                                    <div class="card-header-section">
                                        <div class="card-header-left">
                                            <div class="card-icon-badge">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div>
                                                <h2 class="card-title-main">Patient Records</h2>
                                                <p class="card-subtitle">Registered patients in selected period</p>
                                            </div>
                                        </div>
                                        <div>
                                            <?php 
                                            // Use prepared statement for security
                                            $stmt = $con->prepare("SELECT COUNT(*) as total FROM tblpatient WHERE DATE(CreationDate) BETWEEN ? AND ?");
                                            $stmt->bind_param("ss", $fdate, $tdate);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $count_row = $result->fetch_assoc();
                                            $total_patients = $count_row['total'];
                                            ?>
                                            <div class="stat-badge">
                                                <i class="fas fa-users"></i>
                                                Total: <?php echo $total_patients; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="table-wrapper">
                                        <table class="table-modern">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>PATIENT NAME</th>
                                                    <th>CONTACT NUMBER</th>
                                                    <th>GENDER</th>
                                                    <th>CREATION DATE</th>
                                                    <th>UPDATION DATE</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Use prepared statement for security
                                                $stmt = $con->prepare("SELECT * FROM tblpatient WHERE DATE(CreationDate) BETWEEN ? AND ? ORDER BY CreationDate DESC");
                                                $stmt->bind_param("ss", $fdate, $tdate);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                
                                                $cnt = 1;
                                                $has_records = false;
                                                
                                                while($row = $result->fetch_assoc()) {
                                                    $has_records = true;
                                                    
                                                    // Determine gender badge class
                                                    $gender_class = 'other';
                                                    $gender_icon = 'fa-genderless';
                                                    if(strtolower($row['PatientGender']) == 'male') {
                                                        $gender_class = 'male';
                                                        $gender_icon = 'fa-mars';
                                                    } elseif(strtolower($row['PatientGender']) == 'female') {
                                                        $gender_class = 'female';
                                                        $gender_icon = 'fa-venus';
                                                    }
                                                ?>
                                                <tr>
                                                    <td class="cell-number"><?php echo $cnt; ?></td>
                                                    <td>
                                                        <div class="cell-name"><?php echo htmlentities($row['PatientName']); ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="cell-content"><?php echo htmlentities($row['PatientContno']); ?></div>
                                                    </td>
                                                    <td>
                                                        <span class="gender-badge <?php echo $gender_class; ?>">
                                                            <i class="fas <?php echo $gender_icon; ?>"></i>
                                                            <?php echo htmlentities($row['PatientGender']); ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="cell-content">
                                                            <?php echo date('M d, Y h:i A', strtotime($row['CreationDate'])); ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="cell-content">
                                                            <?php 
                                                            echo $row['UpdationDate'] 
                                                                ? date('M d, Y h:i A', strtotime($row['UpdationDate'])) 
                                                                : '<span style="color: #94a3b8;">Not updated</span>'; 
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="view-patient.php?viewid=<?php echo $row['ID']; ?>" 
                                                           class="btn-view" 
                                                           target="_blank">
                                                            <i class="fas fa-eye"></i>
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php 
                                                    $cnt++;
                                                }
                                                
                                                if(!$has_records) {
                                                ?>
                                                <tr>
                                                    <td colspan="7">
                                                        <div class="empty-state">
                                                            <div class="empty-state-icon">
                                                                <i class="fas fa-calendar-xmark"></i>
                                                            </div>
                                                            <h3 class="empty-state-title">No Patients Found</h3>
                                                            <p class="empty-state-text">
                                                                There are no patients registered between 
                                                                <?php echo date('F d, Y', strtotime($fdate)); ?> and 
                                                                <?php echo date('F d, Y', strtotime($tdate)); ?>
                                                            </p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <!-- Back Button -->
                                <div style="text-align: center; margin-top: 30px;">
                                    <a href="between-dates-reports.php" class="btn-back-bottom">
                                        <i class="fas fa-arrow-left"></i>
                                        Back to Date Selection
                                    </a>
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