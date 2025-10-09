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
      <div class="footer-widgets">
        <?php if ( is_active_sidebar( 'footer' ) ) : ?>
          <?php dynamic_sidebar( 'footer' ); ?>
        <?php endif; ?>
      </div>
      <div class="footer-contact-map" data-aos="fade-up" style="margin-top:2.5rem;display:flex;flex-wrap:wrap;gap:2.5rem;justify-content:center;align-items:flex-start;">
        <form class="contact-form" method="post" action="#" style="background:#fff;border-radius:1.2rem;box-shadow:0 2px 12px rgba(30,40,90,0.10);padding:2rem 2.5rem;max-width:400px;flex:1 1 320px;">
          <h3 style="font-size:1.4rem;font-weight:800;color:#4e7ad2;margin-bottom:1.2rem;">Contact Us</h3>
          <input type="text" name="name" placeholder="Your Name" required style="width:100%;margin-bottom:1rem;padding:0.7rem 1rem;border-radius:0.7rem;border:1px solid #eee;">
          <input type="email" name="email" placeholder="Your Email" required style="width:100%;margin-bottom:1rem;padding:0.7rem 1rem;border-radius:0.7rem;border:1px solid #eee;">
          <textarea name="message" placeholder="Your Message" required style="width:100%;margin-bottom:1rem;padding:0.7rem 1rem;border-radius:0.7rem;border:1px solid #eee;min-height:100px;"></textarea>
          <button type="submit" style="width:100%;background:linear-gradient(90deg,#ff4e50 0%,#f9d423 100%);color:#fff;font-weight:700;font-size:1.1rem;padding:0.8rem 0;border:none;border-radius:0.7rem;box-shadow:0 2px 8px rgba(255,78,80,0.10);transition:background 0.2s;">Send Message</button>
        </form>
        <div class="footer-map" style="min-width:320px;max-width:420px;flex:1 1 320px;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.9537363159047!3d-37.8162797420217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f1f6e0b1%3A0x5045675218ce6e0!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sus!4v1633072800000!5m2!1sen!2sus" width="100%" height="260" style="border:0;border-radius:1.2rem;box-shadow:0 2px 12px rgba(30,40,90,0.10);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
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
