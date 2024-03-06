<?php
ob_start(); // Start output buffering
?>
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
 <div class="container container-fluid mb-5 mt-4" >
    <div class="row">
      <nav class="navline position-fixed col-sm-3 col-md-2 sidebar d-print-none min-vh-100">
    <div class="text-dark">
     <ul class="nav flex-column">
     <li class="nav-item">
       <a class="text-dark nav-link <?php 
          if ($page == 'index.php') { echo 'active bg-primary';}?>" href="index.php">
        <i class="fa-solid fa-list"></i>
        Dashboard
       </a>
      </li>
      <li class="nav-item"> 
       <a class="text-dark nav-link <?php 
          if ($page == 'manage-category.php') { echo 'active bg-primary';}?>" href="manage-category.php">
        <i class="fa-solid fa-list"></i>
        Category
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link <?php 
          if ($page == 'manage-course.php') { echo 'active bg-primary';}?>" href="manage-courses.php">
        <i class="fa-solid fa-play"></i>
        Courses 
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link <?php 
          if ($page == 'manage-educators.php') { echo 'active bg-primary';}?>" href="manage-educators.php">
        <i class="fa-solid fa-list"></i>
        Educators
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link <?php 
          if ($page == 'manage-students.php') { echo 'active bg-primary';}?>" href="manage-students.php">
        <i class="fa-solid fa-list"></i>
        Students
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link <?php if($page == 'contact.php') {echo 'active bg-primary';} ?>" href="contact.php">
       <i class="fa-solid fa-phone"></i>
        Contact
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link <?php if($page == 'change-password.php') {echo 'active bg-primary';} ?>" href="change-password.php">
        <i class="fas fa-key"></i>
        Change Password
       </a>
      </li>
      <li class="nav-item">
       <a class="text-dark nav-link" href="logout.php">
        <i class="fas fa-sign-out-alt"></i>
        Logout
       </a>
      </li>
     </ul>
    </div>
   </nav>