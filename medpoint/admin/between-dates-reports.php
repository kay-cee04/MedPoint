<?php
/**
 * Between Dates Reports Page
 * File: between-dates-reports.php
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
    <title>Between Dates Reports | Admin</title>
    
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
        
        /* Form Card */
        .form-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            max-width: 700px;
            margin: 0 auto;
        }
        
        .form-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e2e8f0;
        }
        
        .form-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
            flex-shrink: 0;
        }
        
        .form-icon i {
            color: #ffffff;
            font-size: 24px;
        }
        
        .form-header-content h2 {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 4px 0;
        }
        
        .form-header-content p {
            font-size: 13px;
            color: #64748b;
            margin: 0;
        }
        
        /* Info Box */
        .info-box {
            background: #eef2ff;
            border-left: 4px solid #667eea;
            border-radius: 12px;
            padding: 16px 18px;
            margin-bottom: 28px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }
        
        .info-box i {
            color: #667eea;
            font-size: 18px;
            flex-shrink: 0;
            margin-top: 2px;
        }
        
        .info-box-content {
            flex: 1;
        }
        
        .info-box-content h4 {
            font-size: 14px;
            font-weight: 700;
            color: #4338ca;
            margin: 0 0 6px 0;
        }
        
        .info-box-content p {
            font-size: 13px;
            color: #4f46e5;
            margin: 0;
            line-height: 1.6;
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 24px;
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
        
        .form-control {
            height: 50px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 0 18px;
            font-size: 14px;
            color: #1e293b;
            transition: all 0.3s ease;
            background: #f8fafc;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            outline: none;
            background: #ffffff;
        }
        
        .form-control:hover {
            border-color: #cbd5e1;
            background: #ffffff;
        }
        
        /* Date Input */
        input[type="date"].form-control {
            appearance: none;
            -webkit-appearance: none;
        }
        
        input[type="date"].form-control::-webkit-calendar-picker-indicator {
            cursor: pointer;
            opacity: 0.6;
        }
        
        input[type="date"].form-control::-webkit-calendar-picker-indicator:hover {
            opacity: 1;
        }
        
        /* Submit Button */
        .btn-submit {
            width: 100%;
            height: 52px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            color: #ffffff;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
        }
        
        .btn-submit i {
            font-size: 16px;
        }
        
        /* Container Overrides */
        .container-fluid.container-fullw {
            background: transparent;
            padding: 0;
        }
        
        .panel {
            border: none;
            box-shadow: none;
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
            }
            
            .form-header {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }
            
            .form-icon {
                width: 48px;
                height: 48px;
            }
            
            .form-icon i {
                font-size: 20px;
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
                                <h1 class="mainTitle">Between Dates Reports</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li>
                                    <span>Reports</span>
                                </li>
                                <li class="active">
                                    <span>Between Dates</span>
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
                                        <div class="form-icon">
                                            <i class="fas fa-filter"></i>
                                        </div>
                                        <div class="form-header-content">
                                            <h2>Date Range Filter</h2>
                                            <p>Select start and end dates to generate your report</p>
                                        </div>
                                    </div>
                                    
                                    <div class="info-box">
                                        <i class="fas fa-info-circle"></i>
                                        <div class="info-box-content">
                                            <h4>How to use this report</h4>
                                            <p>Select a start date and end date to view all appointments scheduled within that date range. The report will include appointment details, patient information, and status.</p>
                                        </div>
                                    </div>
                                    
                                    <form role="form" method="post" action="betweendates-detailsreports.php">
                                        <div class="form-group">
                                            <label for="fromdate">
                                                <i class="fas fa-calendar-check"></i>
                                                From Date
                                            </label>
                                            <input 
                                                type="date" 
                                                class="form-control" 
                                                name="fromdate" 
                                                id="fromdate" 
                                                required
                                            >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="todate">
                                                <i class="fas fa-calendar-xmark"></i>
                                                To Date
                                            </label>
                                            <input 
                                                type="date" 
                                                class="form-control" 
                                                name="todate" 
                                                id="todate" 
                                                required
                                            >
                                        </div>
                                        
                                        <button type="submit" name="submit" id="submit" class="btn-submit">
                                            <i class="fas fa-file-chart-line"></i>
                                            Generate Report
                                        </button>
                                    </form>
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
            
            // Set max date for both fields to today
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('fromdate').setAttribute('max', today);
            document.getElementById('todate').setAttribute('max', today);
            
            // Validate date range
            document.getElementById('fromdate').addEventListener('change', function() {
                var fromDate = this.value;
                document.getElementById('todate').setAttribute('min', fromDate);
            });
            
            document.getElementById('todate').addEventListener('change', function() {
                var toDate = this.value;
                var fromDate = document.getElementById('fromdate').value;
                
                if(fromDate && toDate < fromDate) {
                    alert('End date cannot be earlier than start date');
                    this.value = '';
                }
            });
        });
    </script>
</body>
</html>