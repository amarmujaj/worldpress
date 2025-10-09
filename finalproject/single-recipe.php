<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="container recipe-single">
        <article <?php post_class(); ?>>
            <header class="recipe-header">
                <h1><?php the_title(); ?></h1>
                <div class="meta">
                    <?php if ( $prep = get_post_meta( get_the_ID(), '_fp_prep_time', true ) ) : ?><span class="prep">Prep: <?php echo esc_html( $prep ); ?></span><?php endif; ?>
                    <?php if ( $serv = get_post_meta( get_the_ID(), '_fp_servings', true ) ) : ?><span class="servings">Serves: <?php echo esc_html( $serv ); ?></span><?php endif; ?>
                </div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="recipe-image"><?php the_post_thumbnail( 'finalproject-thumb' ); ?></div>
            <?php endif; ?>

            <section class="recipe-content">
                <h2>Ingredients</h2>
                <?php $ing = get_post_meta( get_the_ID(), '_fp_ingredients', true );
                if ( $ing ) :
                    echo '<ul class="ingredients">';
                    foreach ( explode( "\n", $ing ) as $line ) {
                        echo '<li>' . esc_html( trim( $line ) ) . '</li>';
                    }
                    echo '</ul>';
                endif; ?>

                <h2>Instructions</h2>
                <div class="instructions"><?php echo wp_kses_post( wpautop( get_post_meta( get_the_ID(), '_fp_instructions', true ) ) ); ?></div>
            </section>
        </article>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>
