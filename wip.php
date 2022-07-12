<?php
  include_once 'include/headerall.php'
?>
<title>Work In Progress</title>
<div class="bgimg">
  <div class="topleft">
    <p>Sobha Business Excellence</p>
  </div>
  <div class="middle">
    <h1>COMING SOON</h1>
    <hr>
    <p id="demo" style="font-size:1.3em;"></p>
  </div>
  <div class="bottomleft">
    <p></p>
  </div>
</div>

<style>
        /* Set height to 100% for body and html to enable the background image to cover the whole page: */
        body, html {
        height: 100%
        }

        .bgimg {
        /* Background image */
        background-image: url('cust/images/data_warehouse.jpg');
        /* Full-screen */
        height: 100%;
        /* Center the background image */
        background-position: center;
        /* Scale and zoom in the image */
        background-size: cover;
        /* Add position: relative to enable absolutely positioned elements inside the image (place text) */
        position: relative;
        /* Add a white text color to all elements inside the .bgimg container */
        color: white;
        /* Add a font */
        font-family: "Courier New", Courier, monospace;
        /* Set the font-size to 25 pixels */
        font-size: 25px;
        }

        /* Position text in the top-left corner */
        .topleft {
        position: absolute;
        top: 10%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        }

        /* Position text in the bottom-left corner */
        .bottomleft {
        position: absolute;
        top: 90%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        }

        /* Position text in the middle */
        .middle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        }

        /* Style the <hr> element */
        hr {
        margin: auto;
        width: 40%;
        }
</style>

<?php
  include_once 'include/footerall.php'
?>

<!-- # Java scripts -->
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

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("July 30, 2022 15:37:25").getTime();

    // Update the count down every 1 second
    var countdownfunction = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";

    // If the count down is over, write some text 
    if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("demo").innerHTML = "EXPIRED";
    }
    }, 1000);
</script>
</html>