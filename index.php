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
            echo "<script> alert('No idea');</script>";
            exit();
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="cust/css/all.min.css">
    <link rel="stylesheet" href="cust/styleindex.css">
    <!-- For Icons In Footer -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    <title>Business Intelligence Website</title>
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
                <button class="btn" name="logout">Logout</button>
                </form>
            </li>
            </ul>
          </div>
          <i class="fas fa-bars" id="menu-btn"></i>
        </div>
      </nav>
      <div class="content-head">
        <small>Welcome to the site</small>
        <h1>Business Intelligence Sobha</h1>
        <a href="wip.php">
        <button type="button" >Watch Video</button>
        </a>
        <p>Business Intelligence Team is a part of Business Excellence <br>
        Focused on improving the business by providing technical solution. <br>
        This website and dashboard embeded into the website are part of <br>
        Business Intelligence. The team currently consists of one member <br>
        Nikhil Gangadharappa
        </p>
      </div>
    </div>
    <div class="container-main">
      <div class="card">
        <div class="card-image car-1"></div>
        <h2>Main Man</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu luctus erat. Integer vitae mattis nunc. Pellentesque euismod neque erat, at varius arcu ullamcorper ac.<br>
         In nec accumsan nisi. Aliquam vitae lectus eros.
        <p>Nunc ornare tincidunt ornare. Duis lacus dolor, ullamcorper ut blandit ac, tincidunt vitae libero. Fusce vehicula pulvinar nulla quis congue. Nunc sit amet placerat elit.<br> 
        Donec vestibulum erat eget leo aliquam, quis scelerisque lacus mollis. Aenean quis volutpat metus. Sed semper diam sit amet est dapibus, ut varius eros feugiat.</p>
      </div>
      <div class="card">
        <div class="card-image car-2"></div>
        <h2>Main Man</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu luctus erat. Integer vitae mattis nunc. Pellentesque euismod neque erat, at varius arcu ullamcorper ac.<br> 
        In nec accumsan nisi. Aliquam vitae lectus eros.
        <p>Nunc ornare tincidunt ornare. Duis lacus dolor, ullamcorper ut blandit ac, tincidunt vitae libero. Fusce vehicula pulvinar nulla quis congue. Nunc sit amet placerat elit.<br> 
        Donec vestibulum erat eget leo aliquam, quis scelerisque lacus mollis. Aenean quis volutpat metus. Sed semper diam sit amet est dapibus, ut varius eros feugiat.</p>
      </div>
      <div class="card">
        <div class="card-image car-3"></div>
        <h2>Main Man</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu luctus erat. Integer vitae mattis nunc. Pellentesque euismod neque erat, at varius arcu ullamcorper ac.<br> 
        In nec accumsan nisi. Aliquam vitae lectus eros.
        <p>Nunc ornare tincidunt ornare. Duis lacus dolor, ullamcorper ut blandit ac, tincidunt vitae libero. Fusce vehicula pulvinar nulla quis congue. Nunc sit amet placerat elit.<br>
         Donec vestibulum erat eget leo aliquam, quis scelerisque lacus mollis. Aenean quis volutpat metus. Sed semper diam sit amet est dapibus, ut varius eros feugiat.</p>
      </div>
    </div>
    
    <?php
  include_once 'include/footerall.php'
?>

<script>
    // Get elements from DOM
    const menBtn = document.getElementById('menu-btn');
    const navbar = document.getElementById('navbar');
    const menu = document.querySelector('.menu');
    //offset when the nav bar activates
    const offset = 50;
    //Add click event to menu button
    menBtn.addEventListener('click', () =>
    {
      //Toggle the menu-open class
      menu.classList.toggle('menu-open');
    }
    );


    window.addEventListener
    ("scroll",()=>
      {
         if (pageYOffset > offset) {
           navbar.classList.add('navbar-active'); }
           else {
             navbar.classList.remove('navbar-active');}
       }
   );

   </script>