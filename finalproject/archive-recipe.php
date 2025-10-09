<?php get_header(); ?>

<div class="container recipes-archive">
    <header class="archive-header"><h1>Recipes</h1></header>
    <section class="posts-grid">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="post-card">
                <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" class="post-thumb-link"><?php the_post_thumbnail( 'finalproject-thumb' ); ?></a>
                <?php endif; ?>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="excerpt"><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; else: ?>
            <p>No recipes found.</p>
        <?php endif; wp_reset_postdata(); ?>
    </section>
</div>

<?php get_footer(); ?>
