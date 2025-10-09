<?php /* Template for homepage */ ?>
<?php get_header(); ?>

<?php
// Hero: use the latest sticky or first post featured image if available
$hero_args = array( 'posts_per_page' => 1 );
$hero_query = new WP_Query( $hero_args );
if ( $hero_query->have_posts() ) : $hero_query->the_post();
    $hero_bg = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : '';
?>
<section class="hero"<?php echo $hero_bg ? ' style="background-image:url(' . esc_url( $hero_bg ) . ')"' : ''; ?>>
    <div class="container hero-inner">
        <h1 class="hero-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <p class="hero-subtitle"><?php the_excerpt(); ?></p>
        <a class="hero-cta" href="<?php the_permalink(); ?>">Read story</a>
    </div>
</section>
<?php wp_reset_postdata(); endif; ?>

<section class="posts-grid container" aria-label="Latest posts">
    <?php
    $latest = new WP_Query( array( 'posts_per_page' => 6, 'offset' => 1 ) );
    if ( $latest->have_posts() ) :
        while ( $latest->have_posts() ) : $latest->the_post(); ?>
            <article class="post-card" aria-labelledby="post-<?php the_ID(); ?>-title">
                <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" class="post-thumb-link">
                        <?php the_post_thumbnail( 'finalproject-thumb', array( 'srcset' => wp_get_attachment_image_srcset( get_post_thumbnail_id(), 'finalproject-thumb' ), 'sizes' => '(max-width: 800px) 100vw, 33vw', 'loading' => 'lazy', 'alt' => get_the_title() ) ); ?>
                    </a>
                <?php endif; ?>
                <h3 id="post-<?php the_ID(); ?>-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="excerpt"><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; wp_reset_postdata();
    else:
        echo '<p>No posts found.</p>';
    endif; ?>
</section>

<section class="video-section container">
    <h2>Featured video</h2>
    <div class="video-wrap">
        <?php $video = get_option( 'finalproject_demo_video', '' );
        if ( $video ) : ?>
            <div class="video-poster" data-video-src="<?php echo esc_url( $video ); ?>">
                <img class="poster-img" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/video-poster.png' ) ); ?>" alt="Play video poster">
                <div class="play-btn" aria-hidden="true"></div>
            </div>
        <?php else: ?>
            <p>No demo video available.</p>
        <?php endif; ?>
    </div>
</section>

<section class="recipe-preview container">
    <h2>Try these recipes</h2>
    <div class="posts-grid">
    <?php $recipes = new WP_Query( array( 'post_type' => 'recipe', 'posts_per_page' => 3 ) );
    if ( $recipes->have_posts() ) : while ( $recipes->have_posts() ) : $recipes->the_post(); ?>
        <article class="post-card">
            <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="post-thumb-link"><?php the_post_thumbnail( 'finalproject-thumb' ); ?></a>
            <?php endif; ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </article>
    <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
</section>

<section class="photo-gallery container">
    <h2>Gallery</h2>
    <div class="gallery">
        <div class="item"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/sample1.svg' ) ); ?>" alt="Sample 1"></div>
        <div class="item"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/sample2.svg' ) ); ?>" alt="Sample 2"></div>
        <div class="item"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/sample3.svg' ) ); ?>" alt="Sample 3"></div>
    </div>
</section>

<?php get_footer(); ?>
