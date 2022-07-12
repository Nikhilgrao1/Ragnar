<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initi-scale=1.0">
    <link rel="stylesheet" href="cust/styleall.css">
    <link rel="stylesheet" href="cust/css/all.min.css">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
</head>

<div class="wrapper-head">
    <nav id="navbar">
    <div class="menu">
        <div>
        <img src="cust/images/logo.png" class="logo">

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
        <form>
            <div class="input-wrap">
            </div>
        </form>
        </div>
        <i class="fas fa-bars" id="menu-btn"></i>
    </div>
    </nav>
</div>

<title>Login</title>

<style>
.signup-container {
  background-color: #40DAB5;
  font-family: 'Roboto',sans-serif;
  padding-bottom:20px;
  padding-top:20px;
}


.sign-up-form{
  width:350px;
  height:320px;
  margin:auto;
  background-color:#40DAB5;
  border-radius:3px;  
  
}
h2{
  text-align:center;
  padding-top:15px;
  padding-bottom:15px;
}
h4{
  text-align:center;
}
form {
  width:300px;
  margin-left:20px;
}
form label {
  display :flex;
  margin-top:20px;
  font-size:1em;   
}
form input {
  width :100%;
  padding:7px;
  border:none;
  border: 1px solid black;
  border-radius:6px;
  outline:none;
}
form button[name="signin-submit"]{
  width:300px;
  height:45px;
  margin-top:20px;
  margin-bottom:20px;
  border:none;
  border: 1px solid black;
  border-radius:6px;
  background-color:#000000;
  font-size : 1em;
  text-align:center;
}
</style>

<div class = 'signup-container'>
  <section class = "signin-form">
    <div class="sign-up-form">
      <h2>Log in</h2>
      <?php
            if (isset($_GET["error"])) {
              if ($_GET["error"] == "Notfound") {
                echo "<h4>User Not Found </h4>";
              }
              else if ($_GET["error"] == "loginfailed") {
                echo "<h4> Login Failed Incorrect Password</h4>";
              }
              else if ($_GET["error"] == "Loggedin") {
                // Need to Redirect to Index.html
                header("Location: index.php");

              }
            }
          ?>
    <form action="include/login.inc.php" method="post">
      <label>Employee ID</label>
      <input type="text" name="emp_id" placeholder = "EMP ID....">

      <label>Password</label>
      <input type="password" name="pwd" placeholder = "Password....">
      
      <button type="submit" name="signin-submit">Log in</button>
    </form>
  </div>

  </section>
</div>


<?php
  include_once 'include/footerall.php'
?>