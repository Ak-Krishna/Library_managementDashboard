<?php
    require('./components/_head.php');

    $sessionLoggedInValue = (isset($_SESSION['loggedIn']) && !is_null($_SESSION['loggedIn'])) ?  $_SESSION['loggedIn'] :  "false";
   // echo "<script>alert('$sessionLoggedInValue');</script>";

   if(!isset($_SESSION['loggedIn']) && $sessionLoggedInValue == "false"){
      // header('location: ./login.php');
      echo "<script>window.location.replace('./login.php')</script>";
      die();
   }
?>

<?php
    $url = parse_url($_SERVER['REQUEST_URI']);
    parse_str($url['query'], $query);
    $branchParam = escape_and_lower($query['branch']);
?>

    <!-- main content -->
    <div class="content" id="content">
    <!-- dash-items -->
    <div class="breadcrum">
        <h3 class="breadcrum-title"><?php echo $branchParam; ?></h3>
    </div>

   <?php
    include "./main_items/_student_list.php";
   ?>

<?php
    require('./components/_foot.php');
?>