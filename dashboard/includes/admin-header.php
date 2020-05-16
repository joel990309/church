<?php include "includes/init.php";?>
<?php ob_start(); ?>
<?php session_start();?>

<?php
  if(!isset($_SESSION['user_role'])) {
   header("Location: ../index.php");
  }
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Redemption Center Admin Panel | Home :: Church</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

   <link rel="stylesheet" href="assets/css/styles.css">


  <!--google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>

<body class="sidebar-menu-collapsed">
  <div class="se-pre-con"></div>
<section>
  <!-- sidebar menu start -->
  <div class="sidebar-menu sticky-sidebar-menu">

    <!-- logo start -->
    <div class="logo">
      <h1><a href="index.html">Redemption</a></h1>
    </div>

  <!-- if logo is image enable this -->
    <!-- image logo -->
    <div class="logo">
      <a href="index.html">
        <img src="assets/images/logo.png" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
      </a>
    </div>
    <!-- //image logo -->

    <div class="logo-icon text-center">
      <a href="index.html" title="logo"><img src="assets/images/logo.png" alt="logo-icon"> </a>
    </div>
    <!-- //logo end -->