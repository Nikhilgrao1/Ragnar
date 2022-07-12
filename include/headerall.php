<?php
  session_start();
  include 'include/functions.inc.php';
  $currenttime = time();
  if (empty($_SESSION['userid'])){
            header("Location: login.php");
            exit();
    }
  elseif ($currenttime > $_SESSION["expire"]) {
            session_unset();
            session_destroy();
            header("Location: login.php");
            exit();
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="cust/styleall.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/31149d48b0.js" crossorigin="anonymous"></script>
    <!-- Java Script -->
    <link rel="stylesheet" href="cust/main/script.js">
    <script src="https://cdn.jsdelivr.net/npm/papaparse@5.2.0/papaparse.min.js"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- For Icons In Footer -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- HighChart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>

<body>
<div class="wrapper-head">
    <nav id="navbar">
    <div class="menu">
        <div>
        <img src="cust/images/logo.png" class="logo">
        <ul>
            <!-- <li><a href="/uploaddataform">Upload Data Form Model</a></li> -->
            <li><a href="upload.php">Upload Data File Model</a></li>
        </ul>
        <ul>
            <li><a href="planning.php">Planning Dashboards</a></li>
            <li><a href="wip.php">STRUCTURE Dashboards</a></li>
            <li><a href="wip.php">CIVIL Dashboards</a></li>
            <li><a href="wip.php">PROCUREMENT Dashboards</a></li>
            <li><a href="wip.php">FINANCE Dashboards</a></li>
        </ul>

        <ul class="social-media">
            <li><a href="https://www.facebook.com/SobhaRealty/"  target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://www.instagram.com/sobharealty/?hl=en"  target="_blank" ><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCKIR9isiNyYq1T0GSnIUyHQ"  target="_blank" ><i class="fab fa-youtube"></i></a></li>
            <li><a href="https://www.linkedin.com/company/sobharealty/"  target="_blank" ><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
        <form>
            <div class="input-wrap">
            <input
                type="search"
                placeholder="Search..."
            />
            <button type="submit">
                <i class="fas fa-search"></i>
            </button>
            </div>
        </form>
        </div>
    </div>
    <div class="container-menu">
        <a href="https://www.sobharealty.com/" class="brand">Sobha BI</a>
        <div class="container-inner">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="wip.php">Meet The Team</a></li>
            <li><a href="wip.php">About</a></li>
            <li>
                <form method="POST" class="text-center">
                <button class="btn" name="logout" style="color:#fff;" >Logout</button>
                </form>
            </li>
        </ul>
        </div>
        <i class="fas fa-bars" id="menu-btn"></i>
    </div>
    </nav>
</div>

