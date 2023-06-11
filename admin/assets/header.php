<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DAVIETSPACE Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Company - v4.8.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .margin{
      margin-bottom:20px; !important
    }
    .avtar{
      padding-left:440px;;
    }
    .padding{
      padding-left:100px;
    }
    .marginbtw{
      margin-bottom:0px;
      margin-top:0px;
      padding-top:5px;
      padding-bottom:5px;
    }
    .card{
      height:350px;
      width:250px;
      margin:10px;
    }
  </style>
</head>
<?php
session_start();
?>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html"><span>DAVIET</span>SPACE</a></h1>
      
       <nav id="navbar" class="navbar order-last order-lg-0 padding">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <?php
          if (isset($_SESSION['admin_name'])) {
          ?>
            <!-- <li class="dropdown"><a href="#"><span>Course</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="add_course.php">Add</a></li>
              <li><a href="view_course.php">View</a></li>
            </ul>
          </li> 
          <li class="dropdown"><a href="#"><span>Branch</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="add_branch.php">Add</a></li>
              <li><a href="view_branch.php">View</a></li>
            </ul>
          </li> 
          <li class="dropdown"><a href="#"><span>Syllabus</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="add_syllabus.php">Add</a></li>
              <li><a href="view_syllabus.php">View</a></li>
            </ul>
          </li> 
          <li class="dropdown"><a href="#"><span>Timetable</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="add_timetable.php">Add</a></li>
              <li><a href="view_timetable.php">View</a></li>
            </ul>
          </li> 
          <li class="dropdown"><a href="#"><span>datesheet</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="add_datesheet.php">Add</a></li>
              <li><a href="view_datesheet.php">View</a></li>
            </ul>
          </li> 
          <li class="dropdown"><a href="#"><span>Notice</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="add_notice.php">Add</a></li>
              <li><a href="view_notice.php">View</a></li>
            </ul>
          </li> 
          <li class="dropdown"><a href="#"><span>Notes</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="add_notes.php">Add</a></li>
              <li><a href="view_notes.php">View</a></li>
            </ul>
          </li> 
          <li class="dropdown"><a href="#"><span>Previous Year Papers</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="add_pyq.php">Add</a></li>
              <li><a href="view_pyq.php">View</a></li>
            </ul>
          </li>  --> 
          <li><a href="addcontent.php">Add Content</a></li>
          <li><a href="viewcontent.php">View Content</a></li>
          <li><a href="logout.php">Logout</a></li>

        </ul>
          <?php
          }
          ?>
          
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      

    </div>
  </header>