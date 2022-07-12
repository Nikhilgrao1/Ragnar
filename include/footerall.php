<div class="footer-basic">
    <footer>
        <div class="social">
          <a href="https://www.instagram.com/sobharealty/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://www.linkedin.com/company/sobharealty/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
          <a href="https://www.youtube.com/channel/UCKIR9isiNyYq1T0GSnIUyHQ" target="_blank"><i class="fab fa-youtube"></i></a>
          <a href="https://www.facebook.com/SobhaRealty/" target="_blank"><i class="fab fa-facebook-f"></i></a>
        </div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="index.php">Home</a></li>
            <li class="list-inline-item"><a href="#">Services</a></li>
            <li class="list-inline-item"><a href="#">About</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">Sobha Business Excellence © 2022</p>
    </footer>
</div>
  </body>

  </html>

  <!-- # Java scripts -->
<script>
  // Get elements from DOM
  const menBtn = document.getElementById('menu-btn');
  const navbar = document.getElementById('navbar');
  const menu = document.querySelector('.menu');
  //offset when the nav bar activates
  const offset = 50;
  //Add click event to menu button
  menBtn.addEventListener('click', () => {
    //Toggle the menu-open class
    menu.classList.toggle('menu-open');
  }
  );
  window.addEventListener
    ("scroll", () => {
      if (pageYOffset > offset) {
        navbar.classList.add('navbar-active');
      }
      else {
        navbar.classList.remove('navbar-active');
      }
    }
    );
</script>