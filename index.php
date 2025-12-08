<?php
include_once('medpoint/include/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MedPoint - Healthcare Management System</title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif !important;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            background: #f5f7fa;
            color: #1e293b;
            overflow-x: hidden;
        }
        
        /* ============= NAVBAR ============= */
        .header-modern {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
            padding: 18px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .header-modern.scrolled {
            padding: 10px 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        
        .logo-text {
            font-size: 34px;
            font-weight: 900;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -1.5px;
            margin: 0;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px; 
            margin: 0;
            padding: 0;
            align-items: center;
        }
        
        .nav-links a {
            color: #475569;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            position: relative;
            padding: 5px 0;
        }
        
        .nav-links a::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transition: all 0.3s ease;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        
        .nav-links a:hover::before {
            width: 100%;
        }
        
        .nav-links a:hover {
            color: #667eea;
        }
        
        .btn-book {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff !important;
            padding: 12px 32px;
            border-radius: 30px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.35);
            transition: all 0.3s ease;
            border: none;
            font-size: 14px;
            letter-spacing: 0.5px;
        }
        
        .btn-book:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.45);
            color: #ffffff !important;
        }
        
        /* ============= CAROUSEL ============= */
        .hero-carousel {
            margin-top: 85px;
            position: relative;
        }
        
        .carousel-item {
            height: 700px;
            position: relative;
        }
        
        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }
        
        .gradient-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
        }
        
        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #ffffff;
            z-index: 3;
            width: 85%;
            max-width: 900px;
        }
        
        .hero-text h1 {
            font-size: 72px;
            font-weight: 900;
            margin-bottom: 30px;
            line-height: 1.1;
            letter-spacing: -2.5px;
            text-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.8s ease;
        }
        
        .hero-text p {
            font-size: 24px;
            margin-bottom: 50px;
            opacity: 0.98;
            font-weight: 400;
            line-height: 1.7;
            max-width: 750px;
            margin-left: auto;
            margin-right: auto;
            animation: fadeInUp 1s ease;
        }
        
        .hero-features {
            display: flex;
            gap: 40px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 50px;
            animation: fadeInUp 1.2s ease;
        }
        
        .feature-badge {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 16px 28px;
            border-radius: 50px;
            border: 2px solid rgba(255, 255, 255, 0.25);
            transition: all 0.4s ease;
        }
        
        .feature-badge:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-5px);
        }
        
        .feature-badge i {
            font-size: 24px;
            color: #ffffff;
        }
        
        .feature-badge span {
            font-size: 15px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 0.5px;
        }
        
        .hero-stats {
            display: flex;
            gap: 60px;
            justify-content: center;
            margin-top: 60px;
            animation: fadeInUp 1.4s ease;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 48px;
            font-weight: 900;
            color: #ffffff;
            line-height: 1;
            margin-bottom: 10px;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .stat-label {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }
        
        .carousel-control-prev,
        .carousel-control-next {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 1;
        }
        
        .carousel-control-prev {
            left: 30px;
        }
        
        .carousel-control-next {
            right: 30px;
        }
        
        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        /* ============= SECTIONS ============= */
        .section-wrapper {
            padding: 110px 0;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 70px;
        }
        
        .section-header h2 {
            font-size: 48px;
            font-weight: 900;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 18px;
            letter-spacing: -2px;
        }
        
        .section-header p {
            font-size: 19px;
            color: #64748b;
            font-weight: 500;
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* ============= LOGIN CARDS ============= */
        .portal-card {
            background: #ffffff;
            border-radius: 28px;
            padding: 55px 45px;
            text-align: center;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.08);
            border: 2px solid transparent;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            height: 100%;
        }
        
        .portal-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }
        
        .portal-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 70px rgba(102, 126, 234, 0.25);
            border-color: rgba(102, 126, 234, 0.2);
        }
        
        .portal-icon {
            width: 110px;
            height: 110px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
            transition: all 0.4s ease;
        }
        
        .portal-card:hover .portal-icon {
            transform: scale(1.15) rotate(10deg);
            box-shadow: 0 20px 50px rgba(102, 126, 234, 0.5);
        }
        
        .portal-icon i {
            font-size: 50px;
            color: #ffffff;
        }
        
        .portal-card h3 {
            font-size: 26px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 15px;
            letter-spacing: -0.5px;
        }
        
        .portal-card p {
            color: #64748b;
            font-size: 15px;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .btn-portal {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 16px 55px;
            border-radius: 30px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.35);
            transition: all 0.3s ease;
            border: none;
            display: inline-block;
            font-size: 15px;
        }
        
        .btn-portal:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.45);
            color: #ffffff;
            text-decoration: none;
        }
        
        /* ============= SERVICE CARDS ============= */
        .service-box {
            background: #ffffff;
            border-radius: 24px;
            padding: 45px 35px;
            text-align: center;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.07);
            border: 2px solid transparent;
            transition: all 0.4s ease;
            margin-bottom: 30px;
            height: 100%;
        }
        
        .service-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.2);
            border-color: rgba(102, 126, 234, 0.15);
        }
        
        .service-icon-wrap {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%);
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            transition: all 0.4s ease;
        }
        
        .service-box:hover .service-icon-wrap {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transform: scale(1.15) rotate(8deg);
        }
        
        .service-icon-wrap i {
            font-size: 40px;
            color: #667eea;
            transition: all 0.4s ease;
        }
        
        .service-box:hover .service-icon-wrap i {
            color: #ffffff;
        }
        
        .service-box h5 {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            margin: 20px 0 15px 0;
            letter-spacing: -0.5px;
        }
        
        .service-box p {
            color: #64748b;
            font-size: 15px;
            line-height: 1.7;
        }
        
        /* ============= GALLERY ============= */
        .gallery-wrap {
            background: #f8fafc;
            padding: 110px 0;
        }
        
        .filter-bar {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .btn-filter {
            background: #ffffff;
            color: #475569;
            padding: 14px 35px;
            border-radius: 30px;
            font-weight: 600;
            border: 2px solid #e2e8f0;
            margin: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            font-size: 14px;
        }
        
        .btn-filter:hover,
        .btn-filter.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            border-color: transparent;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.35);
        }
        
        .gallery-image {
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: all 0.4s ease;
            cursor: pointer;
        }
        
        .gallery-image:hover {
            transform: scale(1.08);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.18);
        }
        
        .gallery-image img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            transition: all 0.4s ease;
        }
        
        .gallery-image:hover img {
            transform: scale(1.1);
        }
        
        /* ============= FOOTER ============= */
        .footer-wrap {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #ffffff;
            padding: 40px 0;
            text-align: center;
        }
        
        .footer-wrap p {
            margin: 0;
            font-size: 16px;
            font-weight: 500;
            opacity: 0.9;
        }
        
        /* ============= RESPONSIVE ============= */
        @media (max-width: 768px) {
            .hero-text h1 {
                font-size: 38px;
            }
            
            .hero-text p {
                font-size: 17px;
            }
            
            .section-header h2 {
                font-size: 36px;
            }
            
            .nav-links {
                display: none;
            }
            
            .carousel-item {
                height: 550px;
            }
            
            .hero-btn-group {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <header class="header-modern">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-6">
                    <h1 class="logo-text">MedPoint</h1>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <ul class="nav-links" style="justify-content: center;">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#about" style="white-space: nowrap;">About Us</a></li> 
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#logins">Logins</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-6 text-right">
                    <a href="medpoint/user-login.php" class="btn-book">
                        <i class="fas fa-right-to-bracket"></i> Book Now
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- CAROUSEL -->
    <section id="home" class="hero-carousel">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="assets/images/slider/slider_4.jpg" alt="Healthcare">
                    <div class="gradient-overlay"></div>
                    <div class="hero-text">
                        <h1>Excellence in Healthcare</h1>
                        <p>World-class medical services with compassion and expertise for you and your family</p>
                        <div class="hero-features">
                            <div class="feature-badge">
                                <i class="fas fa-shield-heart"></i>
                                <span>Trusted Care</span>
                            </div>
                            <div class="feature-badge">
                                <i class="fas fa-clock"></i>
                                <span>24/7 Available</span>
                            </div>
                            <div class="feature-badge">
                                <i class="fas fa-user-doctor"></i>
                                <span>Expert Doctors</span>
                            </div>
                        </div>
                        <div class="hero-stats">
                            <div class="stat-item">
                                <div class="stat-number">500+</div>
                                <div class="stat-label">Doctors</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">50k+</div>
                                <div class="stat-label">Happy Patients</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">20+</div>
                                <div class="stat-label">Specialties</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-item active">
                    <img src="assets/images/slider/slider_5.jpg" alt="Medical Care">
                    <div class="gradient-overlay"></div>
                    <div class="hero-text">
                        <h1>Your Health, Our Priority</h1>
                        <p>Modern facilities and experienced doctors providing comprehensive healthcare solutions</p>
                        <div class="hero-features">
                            <div class="feature-badge">
                                <i class="fas fa-hospital"></i>
                                <span>Modern Facilities</span>
                            </div>
                            <div class="feature-badge">
                                <i class="fas fa-medal"></i>
                                <span>Award Winning</span>
                            </div>
                            <div class="feature-badge">
                                <i class="fas fa-heart-pulse"></i>
                                <span>Advanced Care</span>
                            </div>
                        </div>
                        <div class="hero-stats">
                            <div class="stat-item">
                                <div class="stat-number">15+</div>
                                <div class="stat-label">Years Experience</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">98%</div>
                                <div class="stat-label">Success Rate</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">100k+</div>
                                <div class="stat-label">Treatments</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <!-- ABOUT US -->
    <section id="about" class="section-wrapper">
        <div class="container">
            <div class="section-header">
                <h2>About MedPoint</h2>
                <p>Committed to excellence in healthcare delivery</p>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <div style="position: relative;">
                        <img src="assets/images/slider/slider_5.jpg" alt="About Us" style="width: 100%; border-radius: 24px; box-shadow: 0 20px 60px rgba(0,0,0,0.15);">
                        <div style="position: absolute; bottom: -30px; right: -30px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 30px; border-radius: 20px; box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);">
                            <div style="text-align: center; color: white;">
                                <div style="font-size: 42px; font-weight: 900; line-height: 1;">15+</div>
                                <div style="font-size: 14px; font-weight: 600; margin-top: 5px;">Years</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <h3 style="font-size: 38px; font-weight: 800; color: #0f172a; margin-bottom: 25px; letter-spacing: -1px;">Your Health Partner for Life</h3>
                    <p style="font-size: 17px; color: #64748b; line-height: 1.8; margin-bottom: 25px;">MedPoint has been at the forefront of healthcare excellence for over 15 years. We combine cutting-edge medical technology with compassionate care to provide comprehensive healthcare solutions.</p>
                    <p style="font-size: 17px; color: #64748b; line-height: 1.8; margin-bottom: 30px;">Our team of experienced doctors and medical professionals are dedicated to ensuring your well-being through personalized treatment plans and state-of-the-art facilities.</p>
                    <div style="display: flex; gap: 30px; flex-wrap: wrap;">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-check-circle" style="font-size: 28px; color: #667eea;"></i>
                            </div>
                            <div>
                                <div style="font-size: 18px; font-weight: 700; color: #0f172a;">Certified</div>
                                <div style="font-size: 14px; color: #64748b;">ISO Certified</div>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%); border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-award" style="font-size: 28px; color: #667eea;"></i>
                            </div>
                            <div>
                                <div style="font-size: 18px; font-weight: 700; color: #0f172a;">Excellence</div>
                                <div style="font-size: 14px; color: #64748b;">Award Winning</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LOGINS -->
    <section id="logins" class="section-wrapper">
        <div class="container">
            <div class="section-header">
                <h2>Access Your Account</h2>
                <p>Choose your portal to login and manage your healthcare journey</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="portal-card">
                        <div class="portal-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <h3>Patient Login</h3>
                        <p>Book appointments and manage your health records securely</p>
                        <a href="medpoint/user-login.php" class="btn-portal">
                            Login Now
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="portal-card">
                        <div class="portal-icon">
                            <i class="fas fa-user-doctor"></i>
                        </div>
                        <h3>Doctor Login</h3>
                        <p>Manage appointments and patient records efficiently</p>
                        <a href="medpoint/doctor" class="btn-portal">
                            Login Now
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="portal-card">
                        <div class="portal-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h3>Admin Login</h3>
                        <p>System administration and complete management control</p>
                        <a href="medpoint/admin" class="btn-portal">
                            Login Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section id="services" class="section-wrapper" style="background: #f8fafc;">
        <div class="container">
            <div class="section-header">
                <h2>Our Medical Services</h2>
                <p>Comprehensive healthcare solutions delivered with excellence</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-box">
                        <div class="service-icon-wrap">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h5>Cardiology</h5>
                        <p>Expert heart care and advanced cardiovascular treatments</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-box">
                        <div class="service-icon-wrap">
                            <i class="fas fa-bone"></i>
                        </div>
                        <h5>Orthopedics</h5>
                        <p>Comprehensive bone and joint care for better mobility</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-box">
                        <div class="service-icon-wrap">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h5>Neurology</h5>
                        <p>Advanced neurological care and specialized treatments</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-box">
                        <div class="service-icon-wrap">
                            <i class="fas fa-capsules"></i>
                        </div>
                        <h5>Pharma Pipeline</h5>
                        <p>Quality medications and pharmaceutical excellence</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-box">
                        <div class="service-icon-wrap">
                            <i class="fas fa-prescription-bottle"></i>
                        </div>
                        <h5>Pharmacy Team</h5>
                        <p>Professional medication management and consultation</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-box">
                        <div class="service-icon-wrap">
                            <i class="fas fa-medal"></i>
                        </div>
                        <h5>Quality Treatments</h5>
                        <p>Premium healthcare services you can trust completely</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section id="gallery" class="gallery-wrap">
        <div class="container">
            <div class="section-header">
                <h2>Our Facilities</h2>
                <p>Take a virtual tour of our state-of-the-art medical facilities</p>
            </div>
            <div class="filter-bar">
                <button class="btn-filter active" data-filter="all">All</button>
                <button class="btn-filter" data-filter="hdpe">Dental</button>
                <button class="btn-filter" data-filter="sprinkle">Cardiology</button>
                <button class="btn-filter" data-filter="spray">Neurology</button>
                <button class="btn-filter" data-filter="irrigation">Laboratory</button>
            </div>
            <div class="row" id="galleryContainer">
                <div class="col-lg-4 col-md-6 filter hdpe">
                    <div class="gallery-image">
                        <img src="assets/images/gallery/dental.jpg" alt="Dental">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 filter sprinkle">
                    <div class="gallery-image">
                        <img src="assets/images/gallery/cardiology.jpg" alt="Cardiology">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 filter hdpe">
                    <div class="gallery-image">
                        <img src="assets/images/gallery/gallery_03.jpg" alt="Facility">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 filter irrigation">
                    <div class="gallery-image">
                        <img src="assets/images/gallery/kabir.jpg" alt="Laboratory">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 filter spray">
                    <div class="gallery-image">
                        <img src="assets/images/gallery/gallery_05.jpg" alt="Neurology">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 filter spray">
                    <div class="gallery-image">
                        <img src="assets/images/gallery/gallery_06.jpg" alt="Medical">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT US -->
    <section id="contact" class="section-wrapper" style="background: #f8fafc;">
        <div class="container">
            <div class="section-header">
                <h2>Get In Touch</h2>
                <p>We'd love to hear from you. Reach out to us today</p>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="portal-card" style="text-align: left;">
                        <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 18px; display: flex; align-items: center; justify-content: center; margin-bottom: 25px;">
                            <i class="fas fa-map-marker-alt" style="font-size: 32px; color: white;"></i>
                        </div>
                        <h4 style="font-size: 22px; font-weight: 700; color: #0f172a; margin-bottom: 15px;">Visit Us</h4>
                        <p style="color: #64748b; font-size: 16px; line-height: 1.8; margin: 0;">123 Medical Center Drive<br>Healthcare City, HC 12345<br>Philippines</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="portal-card" style="text-align: left;">
                        <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 18px; display: flex; align-items: center; justify-content: center; margin-bottom: 25px;">
                            <i class="fas fa-phone" style="font-size: 32px; color: white;"></i>
                        </div>
                        <h4 style="font-size: 22px; font-weight: 700; color: #0f172a; margin-bottom: 15px;">Call Us</h4>
                        <p style="color: #64748b; font-size: 16px; line-height: 1.8; margin: 0;">Phone: +63 123 456 7890<br>Emergency: +63 987 654 3210<br>Available 24/7</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="portal-card" style="text-align: left;">
                        <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 18px; display: flex; align-items: center; justify-content: center; margin-bottom: 25px;">
                            <i class="fas fa-envelope" style="font-size: 32px; color: white;"></i>
                        </div>
                        <h4 style="font-size: 22px; font-weight: 700; color: #0f172a; margin-bottom: 15px;">Email Us</h4>
                        <p style="color: #64748b; font-size: 16px; line-height: 1.8; margin: 0;">info@medpoint.com<br>support@medpoint.com<br>appointments@medpoint.com</p>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto">
                    <div class="portal-card">
                        <h3 style="font-size: 28px; font-weight: 800; color: #0f172a; margin-bottom: 30px; text-align: center;">Send Us a Message</h3>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <input type="text" name="fullname" class="form-control" placeholder="Your Full Name" required style="padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 15px;">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input type="email" name="emailid" class="form-control" placeholder="Your Email" required style="padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 15px;">
                                </div>
                            </div>
                            <div class="mb-4">
                                <input type="text" name="mobileno" class="form-control" placeholder="Your Phone Number" required style="padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 15px;">
                            </div>
                            <div class="mb-4">
                                <textarea name="description" class="form-control" rows="5" placeholder="Your Message" required style="padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 15px; resize: vertical;"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn-portal" style="padding: 18px 60px;">
                                    <i class="fas fa-paper-plane"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer-wrap">
        <div class="container">
            <p>© 2025 MedPoint - Doctor Appointment Management System. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <script>
        // Navbar scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header-modern');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
        
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Gallery filter
        document.querySelectorAll('.btn-filter').forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                
                document.querySelectorAll('.btn-filter').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                document.querySelectorAll('[class*="filter"]').forEach(item => {
                    if (filter === 'all' || item.classList.contains(filter)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>