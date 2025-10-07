<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <button class="menu-toggle" aria-label="Toggle menu" id="menuToggle">
        <span class="menu-icon"></span>
      </button>
    </div>
  </header>
  <main class="container">
