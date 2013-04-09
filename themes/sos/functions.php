<?php

require_once( '_inc/activity-log.php' );
require_once( '_inc/email-manager.php' );

// support featured images etc.
add_theme_support( 'post-thumbnails' );

// Thumbnail sizes
add_image_size( 'homepage-banner', 990, 300, true );
add_image_size( 'team-member', 310, 275, true );
add_image_size( 'content-page', 610, 400, true );
add_image_size( 'blog', 700, 370, true );
add_image_size( 'blog-sub', 430, 300, true );

// Register the custom post types
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
            'has_archive' => true,
            'supports' => array('title','editor','thumbnail'),
            'rewrite' => array('slug' => 'studios'), // So URL is /studios
            'register_meta_box_cb' => 'sos_add_studio_metabox'
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
            'exclude_from_search' => false, // to allow WP_Query to find these
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

/* add metaboxes to studio post type */

function sos_add_studio_metabox() {
	add_meta_box('studio_metabox', 'Studio details', 'studio_metabox', 'sos_studio', 'normal', 'default');
}

function studio_metabox() {
    global $post;
 
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="studiometa_noncename" id="studiometa_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
    $address = get_post_meta($post->ID, '_address', true);
    $website = get_post_meta($post->ID, '_website', true);

    echo '<label for="_address">Address</label><input type="text" id="_address" name="_address" value="' . $address  . '" class="widefat" />';
    echo '<label for="_website">Website</label><input type="text" id="_website" name="_website" value="' . $website  . '" class="widefat" />';
}

function sos_studio_save_meta($post_id, $post) {
 
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['studiometa_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }
 
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
 
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
 
    $studio_meta['_address'] = $_POST['_address'];
    $studio_meta['_website'] = $_POST['_website'];
 
    // Add values of $events_meta as custom fields
 
    foreach ($studio_meta as $key => $value) { // Cycle through the $events_meta array!
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
 
add_action('save_post', 'sos_studio_save_meta', 1, 2);

/* add meta boxes to team post type */

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

/* Add 'link' field to images */
function attachment_sos_fields($form_fields, $post) {

	// get the current value of our custom field
	$current_value = get_post_meta($post->ID, "_bannerlink", true);

	// build the html for our input
	$mySelectBoxHtml = "<input type='text' value='{$current_value}' name='attachments[{$post->ID}][bannerlink]' id='attachments[{$post->ID}][bannerlink]'>";

	// add our custom select box to the form_fields
	$form_fields["bannerlink"]["label"] = __("Link for banner");
	$form_fields["bannerlink"]["input"] = "html";
	$form_fields["bannerlink"]["html"] = $mySelectBoxHtml;

	return $form_fields;
}
add_filter("attachment_fields_to_edit", "attachment_sos_fields", null, 2);

function attachment_sos_save($post, $attachment) {
	if( isset($attachment['bannerlink']) ){
		update_post_meta($post['ID'], '_bannerlink', $attachment['bannerlink']);
	}
	return $post;
}
add_filter("attachment_fields_to_save", "attachment_sos_save", null, 2);

// Add menus
add_action( 'init', 'sos_register_menus' );
function sos_register_menus() {
  register_nav_menus(
    array( 'nav-menu' => __( 'Nav Menu' ) )
  );
}

function attachment_toolbox($size = 'thumbnail', $ulClass = '', $liClass = '') {

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
			$attsrc  = wp_get_attachment_image_src($image->ID,$size);
			$atttitle = apply_filters('the_title',$image->post_title);
			$bannerlink = get_post_meta($image->ID, "_bannerlink", true);
			if($liClass) {
				echo '<li class="'.$liClass.'">';
			} else {
				echo "<li>";
			}
			if($bannerlink) {
				echo "<a href='$bannerlink'>";
			}
			echo '<img alt="'.$atttitle.'" src="'.$attsrc[0].'" />';
			if($bannerlink) {
				echo "</a>";
			}
			$i++;

			echo "</li>";
		}

		echo "</ul>";
	}
	return count($images);
}

/* handle PayPal IPNs */

/*
 *  Query vars allow us to use rewrites without upsetting WordPress
 *  see the rewrite rules and template redirect for their actual use
 */
function sos_add_query_vars( $qvars ) {
	$qvars[] = 'handle-ipn';
	return $qvars;
}
add_action('query_vars', 'sos_add_query_vars');

/* Generally triggered on a "save permalinks", this adds new rules at the top of the pile */
function sos_add_rewrite_rules( $wp_rewrite )	{
	$newrules = array();

	$new_rules['^analytics'] = 'index.php?analytics=true';
	$new_rules['^supermum'] = 'index.php?supermum=true';
	$new_rules['^account-details'] = 'index.php?account-details=true';

	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'sos_add_rewrite_rules');

/* Allows us to point WordPress in a different direction if desired. */
function sos_template_redirect() {
	if( get_query_var('handle-ipn') ) {
		handle_ipn($_POST);
		exit();
	}
}
add_action('template_redirect','sos_template_redirect');

/*
	Variables we need to pull from the IPN:
	
	- product name e.g. "End of Time Workshop"
		- sent as item_name
	- series name e.g. "Beyonce Dance Series" or "Jazz Funk"
		- could be sent in "custom"
	- date e.g. "Saturday 16th March"
		- perhaps this needs to be part of the item_name
	- time e.g. 1:30-3pm
		- perhaps this needs to be part of the item_name
	
	Variables we want to calculate:
	
	- studio address e.g.
		Central YMCA
		112 Great Russell Street
		London
		WC1B 3NQ
		- this can come from knowing the series name and looking up the studio attached to that page
	- nearest tube e.g. "Tottenham Court Road"
		- as above
	- link to studio e.g. "http://seenonscreenfitness.com/studios/central-ymca"
		- as above

*/

function handle_ipn($vars) {
	$IPN_all = implode($vars,"~~");
	$IPN_payment_status = $vars['payment_status'];	// Completed/Refunded
	$IPN_item_name = $vars['item_name']; 			// e.g. "End of Time workshop"
	$IPN_txn_id = $vars['txn_id']; 					// Reference/"cash"
	$IPN_item_number = $vars['item_number']; 		// TBC
	$IPN_custom = $vars['custom'];					// TBC
	$IPN_payer_email = $vars['payer_email'];		// email of the payer
	if($IPN_payment_status and $IPN_item_name and $IPN_txn_id and $IPN_payer_email) {
		$meta = array(
			'ipn_txn_id' 		=> $IPN_txn_id,
			'ipn_payer_email'	=> $IPN_payer_email,
			'ipn_all'			=> $IPN_all,
			'ipn_datetime'		=>	time()
		);
		$extraVars = array(
			'user_email' => $IPN_payer_email,
			'address'   => $IPN_address,
		);
		$post_id = 0; // TO-DO: where is this going to come from? Do we need it?
		if($IPN_payment_status=="Completed") {
			email_manager('', $post_id, $extraVars); // TO-DO: which first and second arguments to use?
			echo "Payment acknowledged";
		} else if ($payment_status=="Refunded") {
			email_manager('', $post_id, $extraVars); // TO-DO: which first and second arguments to use?
			echo "Refund processed";
		}
		do_action('activity_log', array(
			'type' => 'IPN',
			'entry'=> $vars
		), $post_id); // TO-DO: which post_id to use?
	} else {
		do_action('activity_log', array(
			'type' => 'invalid_IPN',
			'entry'=> $vars
		), 0);
		echo "error: send at least 'payment_status', 'item_name', 'txn_id' and 'payer_email'";
	}
}

// add scripts
function sos_load_scripts() {
	$stylesheet_directory = get_stylesheet_directory_uri();
	$wp_url = get_bloginfo('wpurl');
	wp_enqueue_script('jquery',$wp_url.'/wp-includes/js/jquery/jquery.js','','',true);
	wp_register_script('jquery.easing', $stylesheet_directory.'/js/jquery.easing.1.3.js', array('jquery'), false, true);
	wp_enqueue_script('jquery.easing');
	wp_register_script('jquery.imagesLoaded', $stylesheet_directory.'/js/jquery.imagesLoaded.min.js', array('jquery'), false, true);
	wp_enqueue_script('jquery.imagesLoaded');
	wp_register_script('jquery.youtubeUploadsAndFavorites', $stylesheet_directory.'/js/jquery.youtubeUploadsAndFavorites.js', array('jquery'), false, true);
	wp_enqueue_script('jquery.youtubeUploadsAndFavorites');
	wp_register_script('jquery.touchSwipe', $stylesheet_directory.'/js/jquery.touchSwipe.min.js', array('jquery'), false, true);
	wp_enqueue_script('jquery.touchSwipe');
	wp_register_script('sos', $stylesheet_directory.'/js/app.js', array('jquery'), false, true);
	wp_enqueue_script('sos');
}
add_action('wp_enqueue_scripts', 'sos_load_scripts');

?>