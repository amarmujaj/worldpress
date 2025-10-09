<?php
/**
 * FinalProject theme functions and setup
 */

if ( ! function_exists( 'finalproject_setup' ) ) {
    function finalproject_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'finalproject' ),
        ) );
    }
    add_action( 'after_setup_theme', 'finalproject_setup' );
}

function finalproject_scripts() {
    $css_file = get_theme_file_path( '/assets/css/main.css' );
    $css_ver = file_exists( $css_file ) ? filemtime( $css_file ) : '1.0.0';
    wp_enqueue_style( 'finalproject-main', get_theme_file_uri( '/assets/css/main.css' ), array(), $css_ver );

    $js_file = get_theme_file_path( '/assets/js/main.js' );
    $js_ver = file_exists( $js_file ) ? filemtime( $js_file ) : '1.0.0';
    wp_enqueue_script( 'finalproject-main', get_theme_file_uri( '/assets/js/main.js' ), array(), $js_ver, true );
}
add_action( 'wp_enqueue_scripts', 'finalproject_scripts' );

// Add defer attribute to our main script for better loading
function finalproject_add_defer( $tag, $handle ) {
    if ( 'finalproject-main' === $handle ) {
        return str_replace( ' src', ' defer src', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'finalproject_add_defer', 10, 2 );

// Add resource hints (preconnect & preload fonts)
function finalproject_resource_hints() {
    ?>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" as="style">
    <?php
}
add_action( 'wp_head', 'finalproject_resource_hints' );

// Image sizes
function finalproject_image_sizes() {
    add_image_size( 'finalproject-thumb', 720, 480, true );
}
add_action( 'after_setup_theme', 'finalproject_image_sizes' );

// Ensure post thumbnails output lazy loading attribute if WP doesn't add it
function finalproject_add_img_loading_attr( $attr, $attachment, $size ) {
    if ( ! isset( $attr['loading'] ) ) {
        $attr['loading'] = 'lazy';
    }
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'finalproject_add_img_loading_attr', 10, 3 );

/**
 * Recipe Custom Post Type and taxonomies
 */
function finalproject_register_recipe_cpt() {
    $labels = array(
        'name' => __( 'Recipes', 'finalproject' ),
        'singular_name' => __( 'Recipe', 'finalproject' ),
        'add_new_item' => __( 'Add New Recipe', 'finalproject' ),
        'edit_item' => __( 'Edit Recipe', 'finalproject' ),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'rewrite' => array( 'slug' => 'recipes' ),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-carrot',
    );
    register_post_type( 'recipe', $args );

    register_taxonomy( 'cuisine', 'recipe', array(
        'label' => __( 'Cuisine', 'finalproject' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ) );

    register_taxonomy( 'meal_type', 'recipe', array(
        'label' => __( 'Meal Type', 'finalproject' ),
        'hierarchical' => false,
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'finalproject_register_recipe_cpt' );

// Add meta boxes for recipe details
function finalproject_recipe_meta_boxes() {
    add_meta_box( 'recipe_meta', __( 'Recipe details', 'finalproject' ), 'finalproject_recipe_meta_box_cb', array( 'recipe' ), 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'finalproject_recipe_meta_boxes' );

function finalproject_recipe_meta_box_cb( $post ) {
    wp_nonce_field( 'finalproject_recipe_nonce', 'finalproject_recipe_nonce_field' );
    $ingredients = get_post_meta( $post->ID, '_fp_ingredients', true );
    $instructions = get_post_meta( $post->ID, '_fp_instructions', true );
    $prep_time = get_post_meta( $post->ID, '_fp_prep_time', true );
    $servings = get_post_meta( $post->ID, '_fp_servings', true );
    ?>
    <p>
        <label><?php _e( 'Prep time (e.g. 15 mins)', 'finalproject' ); ?></label><br>
        <input type="text" name="fp_prep_time" value="<?php echo esc_attr( $prep_time ); ?>" style="width:100%" />
    </p>
    <p>
        <label><?php _e( 'Servings', 'finalproject' ); ?></label><br>
        <input type="text" name="fp_servings" value="<?php echo esc_attr( $servings ); ?>" style="width:100%" />
    </p>
    <p>
        <label><?php _e( 'Ingredients (one per line)', 'finalproject' ); ?></label><br>
        <textarea name="fp_ingredients" rows="6" style="width:100%"><?php echo esc_textarea( $ingredients ); ?></textarea>
    </p>
    <p>
        <label><?php _e( 'Instructions', 'finalproject' ); ?></label><br>
        <textarea name="fp_instructions" rows="8" style="width:100%"><?php echo esc_textarea( $instructions ); ?></textarea>
    </p>
    <?php
}

function finalproject_save_recipe_meta( $post_id ) {
    if ( ! isset( $_POST['finalproject_recipe_nonce_field'] ) || ! wp_verify_nonce( $_POST['finalproject_recipe_nonce_field'], 'finalproject_recipe_nonce' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( isset( $_POST['fp_ingredients'] ) ) update_post_meta( $post_id, '_fp_ingredients', sanitize_textarea_field( wp_unslash( $_POST['fp_ingredients'] ) ) );
    if ( isset( $_POST['fp_instructions'] ) ) update_post_meta( $post_id, '_fp_instructions', wp_kses_post( wp_unslash( $_POST['fp_instructions'] ) ) );
    if ( isset( $_POST['fp_prep_time'] ) ) update_post_meta( $post_id, '_fp_prep_time', sanitize_text_field( wp_unslash( $_POST['fp_prep_time'] ) ) );
    if ( isset( $_POST['fp_servings'] ) ) update_post_meta( $post_id, '_fp_servings', sanitize_text_field( wp_unslash( $_POST['fp_servings'] ) ) );
}
add_action( 'save_post', 'finalproject_save_recipe_meta' );

// Create demo content on theme activation
function finalproject_create_demo_content() {
    if ( get_option( 'finalproject_demo_installed' ) ) return;

    // Helper to create attachment from our assets
    $images = array(
        get_theme_file_path( '/assets/images/sample1.svg' ),
        get_theme_file_path( '/assets/images/sample2.svg' ),
        get_theme_file_path( '/assets/images/sample3.svg' ),
    );

    foreach ( $images as $i => $img_path ) {
        if ( file_exists( $img_path ) ) {
            $filetype = wp_check_filetype( basename( $img_path ), null );
            $upload = wp_upload_bits( basename( $img_path ), null, file_get_contents( $img_path ) );
            if ( ! $upload['error'] ) {
                $attachment = array(
                    'post_mime_type' => $filetype['type'] ?: 'image/svg+xml',
                    'post_title' => sanitize_file_name( basename( $img_path ) ),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                $attach_id = wp_insert_attachment( $attachment, $upload['file'] );
                require_once( ABSPATH . 'wp-admin/includes/image.php' );
                $attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
                wp_update_attachment_metadata( $attach_id, $attach_data );

                // create a recipe post
                $post_id = wp_insert_post( array(
                    'post_title' => 'Demo Recipe ' . ( $i + 1 ),
                    'post_content' => 'This is a demo recipe. Replace with your real content.',
                    'post_status' => 'publish',
                    'post_type' => 'recipe',
                ) );
                if ( $post_id && ! is_wp_error( $post_id ) ) {
                    set_post_thumbnail( $post_id, $attach_id );
                    update_post_meta( $post_id, '_fp_ingredients', "Ingredient A\nIngredient B\nIngredient C" );
                    update_post_meta( $post_id, '_fp_instructions', "1. Do this.\n2. Do that." );
                    update_post_meta( $post_id, '_fp_prep_time', '15 mins' );
                    update_post_meta( $post_id, '_fp_servings', '2' );
                    wp_set_post_terms( $post_id, array( 'quick' ), 'meal_type', false );
                }
            }
        }
    }

    // Set demo video URL option
    update_option( 'finalproject_demo_video', 'https://www.youtube.com/embed/dQw4w9WgXcQ' );
    update_option( 'finalproject_demo_installed', 1 );
}
add_action( 'after_switch_theme', 'finalproject_create_demo_content' );
