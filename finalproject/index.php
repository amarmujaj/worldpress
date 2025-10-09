<?php get_header(); ?>

<div class="container">
    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="entry-excerpt"><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile;
        the_posts_pagination();
    else:
        echo '<p>No posts found.</p>';
    endif; ?>
</div>

<?php get_footer(); ?>
