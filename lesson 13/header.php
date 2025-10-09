<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="keywords" content="WordPress, Modern, Portfolio, Business, Creative, Responsive, Best, Theme, Design, Digital, School">
  <meta name="author" content="<?php bloginfo('name'); ?>">
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>">
  <meta property="og:description" content="<?php bloginfo('description'); ?>">
  <meta property="og:url" content="<?php echo esc_url( home_url('/') ); ?>">
  <meta property="og:image" content="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>">
  <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
  <meta name="twitter:image" content="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
  <?php wp_head(); ?>
</head>
<?php
// Add some demo custom classes based on front page
if ( is_front_page() ) {
  $awesome_classes = array( 'ds-class', 'my-ds-class' );
} else {
  $awesome_classes = array( 'no-ds-class' );
}
?>
<body <?php body_class( $awesome_classes ); ?>>
  <header class="site-header sticky-header">
    <div class="container nav-container">
      <div class="logo-area">
        <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>">
          <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Site Logo" class="site-logo" width="44" height="44">
          <span class="site-title">DS Theme</span>
        </a>
      </div>
      <nav class="main-nav" id="mainNav">
        <?php
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'nav-list',
            'fallback_cb'    => false
          ) );
        ?>
      </nav>
      <div class="user-account-links">
        <?php if ( function_exists('is_user_logged_in') && is_user_logged_in() ) : ?>
          <a href="<?php echo esc_url( admin_url('profile.php') ); ?>" class="account-link">My Profile</a>
          <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="account-link">Logout</a>
        <?php else : ?>
          <a href="<?php echo esc_url( wp_login_url() ); ?>" class="account-link">Login</a>
          <a href="<?php echo esc_url( wp_registration_url() ); ?>" class="account-link">Register</a>
        <?php endif; ?>
      </div>
      <button class="menu-toggle" aria-label="Toggle menu" id="menuToggle">
        <span class="menu-icon"></span>
      </button>
    </div>
  </header>
  <main class="container">
