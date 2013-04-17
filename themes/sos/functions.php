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

	$new_rules['^handle-ipn'] = 'index.php?handle-ipn=true';

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
	Navigating the cart:
		- no. of items: e.g. num_cart_items=2
	Getting the dance series page:
		- e.g. custom=beyonce-dance-series (we could also use the title of the button i.e. item_name, although I wonder how that works with accented characters)
		- an alternative is just to hard-code item_name to page mappings for now?

	Variables we need to pull from the IPN:
	
	- series name e.g. "Beyonce Dance Series" or "Jazz Funk"
		- e.g. item_name1=Beyonce dance class
	- date and workshop name
		- e.g. option_selection1_1=20th April: Single Ladies part 2
		- (and there is e.g. option_name1_1=Workshop date)
		- we'll need to turn this into pieces like "Saturday 16th March"
	- number of classes booked:
		- e.g. quantity1=4

	Send one email per series booked.

*/

function handle_ipn($vars) {
	$IPN_all = implode($vars,"~~");
	$payment_status = $vars['payment_status'];	// Completed/Refunded
	$email_id = $vars['custom'];				// ID of the email post to use as confirmation
	$payer_email = $vars['payer_email'];		// email of the payer
	$first_name = $vars['first_name'];
	$last_name = $vars['last_name'];
	$payment_date = $vars['payment_date'];
	$txn_id = $vars['txn_id'];					// Reference
	$num_cart_items = $vars['num_cart_items'];	// number of items in the cart
		
	if($payment_status and $txn_id and $payer_email and $first_name and $last_name) {

		if($payment_status=="Completed") {

			for($i=1;$i<=$num_cart_items;$i++) {
	
				// collect all the items from the cart
				// send a confirmation email and register the booking for each
				$item_name = $vars['item_name'.$i]; // e.g. "End of Time workshop"
				$option_selection = $vars['option_selection1_'.$i]; // e.g. "February 25th"
				$quantity = $vars['quantity'.$i]; // e.g. 2

				$booking = array(
					'payer_email'	=> $payer_email,
					'item_name'		=> $item_name,
					'option_selection' => $option_selection,
					'quantity'		=> $quantity,
					'first_name'	=> $first_name,
					'last_name'		=> $last_name,
					'datetime'		=>	$payment_date
				);
				do_action('activity_log', array(
					'type' => 'booking',
					'entry' => $booking
				));
				if($email_id) {
					// email_manager($email_id, $payer_email, $booking);
					$test_email = "parsons.bonnie@yahoo.com";
					email_manager($email_id, $test_email, $booking);
				}
			}
			echo "Payment acknowledged";
		} else if ($payment_status=="Refunded") {
			// TO-DO: do something for refunds
		}
		do_action('activity_log', array(
			'type' => 'IPN',
			'entry'=> $vars
		), 0);
		// also send this PayPal IPN on to MailChimp for auto-subscribe
		$url = "http://seenonscreenfitness.us2.list-manage1.com/subscribe/paypal-ipn?u=f8ced585667d72e57f4054249&id=0e966065b2";
		$resp = wp_remote_post( $url, $vars );
		do_action('activity_log', array(
			'type' => 'mailchimp_subscribe_response',
			'entry' => $resp
		));
	} else {
		do_action('activity_log', array(
			'type' => 'invalid_IPN',
			'entry'=> $vars
		), 0);
		echo "error: send at least 'payment_status', 'txn_id', 'payer_email', 'first_name' and 'last_name'";
	}
}

// add a 'Bookings' sub-menu to activity log
function bookings_menu() {
	add_submenu_page( 'activity-log-admin', 'Bookings', 'Bookings', 'manage_options', 'bookings-menu', 'bookings_menu_handler');
}
add_action('admin_menu', 'bookings_menu', 26 );

function bookings_menu_handler() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	echo '<div class="wrap"><h1>Bookings</h1>';
	$wp_list_table = new Bookings_Table();
	$wp_list_table->prepare_items();
	$wp_list_table->display();
	echo '</div>';
}

class Bookings_Table extends WP_List_Table {
	function __construct( ){
		parent::__construct( array(
			 'singular'  => 'bookings',
			 'plural'    => 'bookings',
			 'ajax'      => false
		));
	}

	function no_items() {
		_e( 'No bookings have been found.', 'sos' );
	}

	function column_default($item, $column_name){
		return $item[ $column_name ];
	}

	function column_timestamp( $item ) {
		return date( 'Y-m-d H:i:s', strtotime( $item['time'] ) );
	}

/*
	function column_type( $item ) {
		return $item['type'];
	}

	function column_entry( $item ) {
		$entry = unserialize( $item['entry'] );
		if( is_array($entry) ) {
			return $entry['entry'];
		} else {
			return $entry;
		}
	}
*/

	function column_name( $item ) {
		$entry = unserialize( $item['entry'] );
		return $entry['first_name'].' '.$entry['last_name'];
	}
	
	function column_email( $item ) {
		$entry = unserialize( $item['entry'] );
		return $entry['payer_email'];
	}

	function column_series( $item ) {
		$entry = unserialize( $item['entry'] );
		return $entry['item_name'];
	}
	
	function column_class( $item ) {
		$entry = unserialize( $item['entry'] );
		return $entry['option_selection'];
	}
	
	function column_quantity( $item ) {
		$entry = unserialize( $item['entry'] );
		return $entry['quantity'];
	}

	/*
function column_extended( $item ) {
		$html = '';
		$entry = unserialize( $item['entry'] );
		if( is_array( $entry ) ) {
			unset( $entry['entry'] );
			foreach( $entry as $key => $value ) {
				$html  .= sprintf( '<strong>%s: </strong>%s<br/>', $key, $value );
			}
		} else {
			$html = 'n/a';
		}
		return $html;
	}
*/

	function get_columns(){
		$columns = array();
		$columns['timestamp'] = __('Timestamp', 'bookings' );
		$columns['name'] = __('Name', 'bookings' );
		$columns['email'] = __('Email', 'bookings' );
		$columns['series'] = __('Dance Series', 'bookings' );
		$columns['class'] = __('Class', 'bookings' );
		$columns['quantity'] = __('Places booked', 'bookings' );
//		$columns['extended'] = __('Extended Data', 'bookings' );
		return $columns;
	}

	function get_sortable_columns() {
		return null;
	}

	function prepare_items() {
		global $wpdb;
		$per_page = $this->get_items_per_page('posts_per_page');
		$columns = $this->get_columns();
		$hidden = array();
		$sortable = $this->get_sortable_columns();
		$this->_column_headers = array($columns, $hidden, $sortable);
		$this->items = $wpdb->get_results( "SELECT SQL_CALC_FOUND_ROWS * FROM $wpdb->activity_log WHERE type = 'booking' ORDER BY time DESC", ARRAY_A );
		$total_items = $wpdb->get_var( 'SELECT FOUND_ROWS()' );
		$this->set_pagination_args( array(
			 'total_items' => $total_items,
			 'per_page'    => $per_page,
			 'total_pages' => ceil($total_items / $per_page)
		) );
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