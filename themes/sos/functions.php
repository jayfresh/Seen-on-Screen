<?php

// support featured images etc.
add_theme_support( 'post-thumbnails' );

// Thumbnail sizes
add_image_size( 'homepage-banner', 990, 236 );
add_image_size( 'team-member', 310, 275 );
add_image_size( 'content-page', 400, 610 );

// Register the 'Team' custom post type
add_action( 'init', 'sos_register_custom_post_types');
function sos_register_custom_post_types() { 
    register_post_type( 'sos_team',
        array(
            'labels' => array(
                'name' => __('Team'),
                'singular_name' => __('Team member'),
                ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title','editor','thumbnail'),
            'rewrite' => array('slug' => 'team') // So URL is /team
        )
    );
    register_post_type( 'sos_studio',
        array(
            'labels' => array(
                'name' => __('Studios'),
                'singular_name' => __('Studio'),
                ),
            'public' => true,
            'has_archive' => false, // as there is no studios page
            'supports' => array('title','editor','thumbnail'),
            'rewrite' => array('slug' => 'studios') // So URL is /studios
        )
    );
    register_post_type( 'sos_quote',
        array(
            'labels' => array(
                'name' => __('Quotes'),
                'singular_name' => __('Quote'),
                ),
            'public' => false, // to hide these from the public website
            'show_ui' => true, // so we can edit these from wp-admin
            'has_archive' => false,
            'supports' => array('title','editor','thumbnail'),
            'taxonomies' => array('category')
        )
    );
}

// Add menus
add_action( 'init', 'sos_register_menus' );
function sos_register_menus() {
  register_nav_menus(
    array( 'nav-menu' => __( 'Nav Menu' ) )
  );
}

?>