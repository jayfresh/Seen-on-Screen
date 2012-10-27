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
            'rewrite' => array('slug' => 'team'), // So URL is /team
            'register_meta_box_cb' => 'sos_add_team_credits_metabox'
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
                'name' => __('Quote'),
                'singular_name' => __('Quote'),
                ),
            'public' => false, // to hide these from the public website
            'show_ui' => true, // so we can edit these from wp-admin
            'has_archive' => false,
            'supports' => array('title','editor','thumbnail')
        )
    );
    
    register_taxonomy(
		'sos_quotes',
		'sos_quote',
		array(
			'label' => __( 'Quote types' ),
			'hierarchical' => true,
			'rewrite' => false
		)
	);
}

function sos_add_team_credits_metabox() {
	add_meta_box('team_credits_box', 'Team member credits', 'team_credits_box', 'sos_team', 'normal', 'default');
}
function team_credits_box() {
    global $post;
 
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="creditsmeta_noncename" id="creditsmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
    // Get the location data if its already been entered
    $credits = get_post_meta($post->ID, '_credits', true);
 
    // Echo out the field
    echo '<input type="text" name="_credits" value="' . $credits  . '" class="widefat" />';
}

function sos_team_save_credits_meta($post_id, $post) {
 
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['creditsmeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }
 
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
 
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
 
    $team_meta['_credits'] = $_POST['_credits'];
 
    // Add values of $events_meta as custom fields
 
    foreach ($team_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
 
}
 
add_action('save_post', 'sos_team_save_credits_meta', 1, 2);

// Add menus
add_action( 'init', 'sos_register_menus' );
function sos_register_menus() {
  register_nav_menus(
    array( 'nav-menu' => __( 'Nav Menu' ) )
  );
}

?>