<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header" role="banner">
    <div class="container header-inner">
        <div class="branding">
            <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) :
                the_custom_logo();
            else: ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><?php bloginfo( 'name' ); ?></a>
            <?php endif; ?>
        </div>
        <nav class="site-nav" role="navigation" aria-label="Primary">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_id' => 'primary-menu' ) ); ?>
        </nav>
        <button class="nav-toggle" aria-expanded="false" aria-controls="primary-menu">Menu</button>
    </div>
</header>
<main id="main" class="site-main" role="main">
