<?php

add_theme_support( 'post-thumbnails' );
add_image_size( 'main-image', 426, 340 );
add_image_size( 'small-thumb', 120, 80 );

function attachment_toolbox($size = thumbnail, $ulClass = '', $liClass = '') {

	if($images = get_children(array(
		'post_parent'    => get_the_ID(),
		'post_type'      => 'attachment',
		'numberposts'    => -1, // show all
		'post_status'    => null,
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
	))) {			

		if($ulClass) {
			echo "<ul class=\"$ulClass\">";
		} else {
			echo "<ul>";
		}
	
		$i=0;
		foreach($images as $image) {
			$attimg  = wp_get_attachment_image_src($image->ID,$size);
			$attimgurl = $attimg[0];
			$atturl   = wp_get_attachment_url($image->ID);
			$attlink  = get_attachment_link($image->ID);
			$postlink = get_permalink($image->post_parent);
			$atttitle = apply_filters('the_title',$image->post_title);
			$attimgtype	= get_post_meta($image->ID,"_imgTypeSelectBox", true);
			$attcontent = ($image->post_content);
			
			if($liClass) {
				echo "<li class=\"$liClass\">";
			} else {
				echo "<li>";
			}
			
			if($size == 'wide-image') {
				if($attimgtype == 'wide-image') {
					echo '<img src="'.$attimgurl.'" />';
				}
			} else {
				//if($i==0) {
				//	echo '<img class="primary right" src="'.$attimgurl.'" />';
				//} else {
					echo '<img src="'.$attimgurl.'" />';
				//}
			}
			$i++;
			
			echo "</li>";
		}
		
		echo "</ul>";
	}
	return count($images);
}

function add_dancer_posttype() {
    register_post_type( 'dancer',
        array(
            'labels' => array(
                'name' => __( 'Dancers' ),
                'singular_name' => __( 'Dancer' ),
                'add_new' => __( 'Add New Dancer Profile' ),
                'add_new_item' => __( 'Add New Dancer Profile' ),
                'edit_item' => __( 'Edit Dancer Profile' ),
                'new_item' => __( 'Add New Dancer Profile' ),
                'view_item' => __( 'View Dancer Profile' ),
                'search_items' => __( 'Search Dancer Profiles' ),
                'not_found' => __( 'No dancer profiles found' ),
                'not_found_in_trash' => __( 'No dancer profiles found in trash' )
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'template' ),
            'capability_type' => 'post',
            'rewrite' => array("slug" => "dancers"), // Permalinks format
            'menu_position' => 5,
            'register_meta_box_cb' => 'add_credits_metabox'
        )
    );
}
function add_credits_metabox() {
	add_meta_box('dancer_credits_box', 'Dancer credits', 'dancer_credits_box', 'dancer', 'normal', 'default');
}
function dancer_credits_box() {
    global $post;
 
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="creditsmeta_noncename" id="creditsmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
    // Get the location data if its already been entered
    $credits = get_post_meta($post->ID, '_credits', true);
 
    // Echo out the field
    echo '<input type="text" name="_credits" value="' . $credits  . '" class="widefat" />';
 
}
add_action( 'init', 'add_dancer_posttype' );

// Save the Metabox Data
 
function dancer_save_credits_meta($post_id, $post) {
 
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
 
    $dancer_meta['_credits'] = $_POST['_credits'];
 
    // Add values of $events_meta as custom fields
 
    foreach ($dancer_meta as $key => $value) { // Cycle through the $events_meta array!
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
 
add_action('save_post', 'dancer_save_credits_meta', 1, 2); // save the custom fields

?>