  </main>

  <footer class="site-footer colorful-footer mt-5">
    <div class="footer-content">
      <div class="footer-brand">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo" class="footer-logo" width="40" height="40">
        <span class="footer-title">Digital School</span>
      </div>
      <div class="footer-social">
        <a href="#" aria-label="Facebook" class="footer-social-icon"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" width="28" height="28" alt="Facebook"></a>
        <a href="#" aria-label="Twitter" class="footer-social-icon"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" width="28" height="28" alt="Twitter"></a>
        <a href="#" aria-label="Instagram" class="footer-social-icon"><img src="https://cdn-icons-png.flaticon.com/512/733/733558.png" width="28" height="28" alt="Instagram"></a>
      </div>
      <div class="footer-menu">
        <?php
          if ( has_nav_menu( 'footer' ) ) {
            wp_nav_menu( array(
              'theme_location' => 'footer',
              'container'      => 'nav',
              'container_class'=> 'nav justify-content-center',
              'menu_class'     => 'nav'
            ) );
          }
        ?>
      </div>
      <div class="footer-copy">&copy; <?php echo date('Y'); ?> Digital School. All rights reserved.</div>
    </div>
  </footer>
  </main>
  <script>
  // Mobile menu toggle for responsive nav
  document.addEventListener('DOMContentLoaded', function() {
    var toggle = document.querySelector('.menu-toggle');
    var nav = document.querySelector('.main-nav');
    if (toggle && nav) {
      toggle.addEventListener('click', function() {
        nav.classList.toggle('active');
      });
    }
  });
  </script>
  <?php wp_footer(); ?>
</body>
</html>
