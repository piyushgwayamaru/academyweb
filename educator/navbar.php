<?php
// Get the protocol
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";

// Get the host
$host = $_SERVER['HTTP_HOST'];

// Get the current request URI
$uri = $_SERVER['REQUEST_URI'];

// Build the full URL
$fullUrl = $protocol . "://" . $host . $uri;

// Output the result
$fileName = basename(parse_url($fullUrl, PHP_URL_PATH));
$page = $fileName;
?>





<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../css/all.min.css">

  <!-- Google Font -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-NJHZxNfD+1nGFEGDaVTtfHrWLnSrmf/3br+MrjyYO1pbQ9ht0i/ptc5FfYl/2UBG" crossorigin="anonymous">


 <!-- Custom CSS -->
 <link rel="stylesheet" href="../css/admin.css">

</head>

<body>


 <!-- Side Bar -->
 <div class="container container-fluid mb-5" >
    <div class="row">
      <nav class="navline col-sm-3 col-md-2 sidebar d-print-none min-vh-100">
    <div class=" sidebar-sticky text-dark">
     <ul class="nav flex-column">
      <li class="nav-item ">
       <a class="text-dark nav-link <?php if($page == 'index.php') {echo 'active bg-primary';} ?>" href="index.php">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link <?php if($page == 'manage-courses.php') {echo 'active bg-primary';} ?>" href="manage-courses.php">
        <i class="fab fa-accessible-icon"></i>
        Courses
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link <?php if($page == 'manage-enrollment.php') {echo 'active bg-primary';} ?>" href="manage-enrollment.php">
        <i class="fas fa-users"></i>
        Students
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link <?php if($page == 'sell-report.php') {echo 'active bg-primary';} ?>" href="sell-report.php">
        <i class="fas fa-table"></i>
        Sell Report
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link <?php if($page == 'payment-status.php') {echo 'active bg-primary';} ?>" href="payment-status.php">
        <i class="fas fa-table"></i>
        Payment Status
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link <?php if($page == 'feedback.php') {echo 'active bg-primary';} ?>" href="feedback.php">
        <i class="fab fa-accessible-icon"></i>
        Feedback
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link <?php if($page == 'change-password.php') {echo 'active bg-primary';} ?>" href="change-password.php">
        <i class="fas fa-key"></i>
        Change Password
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link" href="../logout.php">
        <i class="fas fa-sign-out-alt"></i>
        Logout
       </a>
      </li>
     </ul>
    </div>
   </nav>