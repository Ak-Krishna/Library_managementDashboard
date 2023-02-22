<?php
    // session_start();
    require "./database/dbConn.php";
    include "./functions.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <!-- css link -->
 <link rel="stylesheet" href="./assets/css/style.css">
 <link rel="stylesheet" href="./assets/css/S_style.css">
 <!-- box icon -->
 <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <title>DIEMS - library</title>
</head>

<body>
 <div class="film" id="film"></div>
 <!-------------- SIDE NAVIGATION --------------->
 <?php
 include "./components/_sidenav.php";
 ?>
 <!------------ MAIN CONTENT ------------->
 <main class="main">
  <!-- header -->
  <?php
  include "./components/_header.php";
  ?>

  <!------------------- MODALS ----------------->
  <?php
  include "./modals/admin_modal.php";
  include "./modals/book_modal.php";
  include "./modals/branch_modal.php";
  include "./modals/category_modal.php";
  include "./modals/student_modal.php";
  include "./modals/issue_modal.php";
  include "./modals/return_modal.php";
  ?>