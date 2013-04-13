<?php

	/* function for sending templated emails */
	function email_manager( $email_id, $toAddresses, $shortcodeVars ) {

		global $email_types;
		if( !$email_id ) return false;

		$email_template = new WP_Query( array(
			'post_type'  => 'emails', // this defaults to 'post' if you don't provide it
			'p'	=> $email_id
		));

		if ( $email_template->posts ) {
			$post = $email_template->posts[0];

			$meta = get_post_custom( $post->ID );

			$body = email_shortcodes($post->post_content, $shortcodeVars);
			
			$subject = $meta['_email_subject'][0] != '' ? $meta['_email_subject'][0] : $post->post_title;
			$subject = email_shortcodes($subject, $shortcodeVars);

			// If this template has a 'FROM' email address use that, else use the admin email address
			$fromAddress =  $meta['_email_from'][0] != '' ? $meta['_email_from'][0] : get_option( 'admin_email');

			$headers = '';
			if( $fromAddress ) {
				$headers .= "Reply-To: $fromAddress\r\n";
				$headers .= "From: Seen On Screen Fitness <$fromAddress>\r\n"; // TO-DO: make the "Seen On Screen Fitness" set from an admin panel
			}

			send_email_and_log( $toAddresses, $subject, $body, $headers );
		}
		return (bool)$email_template->posts;
	}

	function email_shortcodes($body, $shortcodeVars) {
		// replace all the shortcodes that match variables passed in ext
		foreach($shortcodeVars as $key => $value) {
		       $shortcode = strtoupper($key);
		       $body = str_ireplace( '['.$key.']', $value, $body );
		}
		
		$message = sprintf(__('%s'), $body) . "\r\n";
		return $message;
	}

	function set_html_email( $content_type ) {
		return 'text/html';
	}
	add_filter( 'wp_mail_content_type', 'set_html_email' );

	/* create post type: Emails */

	if ( ! function_exists( 'post_type_emails' ) ) :
		function post_type_emails() {
			register_post_type(
				'emails',
				array(
					'label' => __('Emails'),
					'description' => __('Edit an Email.'),
					'public' => true,
					'show_ui' => true,
					'register_meta_box_cb' => 'init_email_metaboxes',
					'supports' => array (
						'editor',		// added to support text editor for email body content
						'title',
						'revisions'
					)
				)
			);
		}
	endif;

	add_action('init', 'post_type_emails');

	/* add metaboxes to email post type */
	
	function init_email_metaboxes() {
		add_meta_box('email_metaboxes', 'Extra Email Information', 'email_metaboxes', 'emails', 'normal', 'high');
	}
	
	function email_metaboxes() {
	    global $post;
	 
	    // Noncename needed to verify where the data originated
	    echo '<input type="hidden" name="emailmeta_noncename" id="emailmeta_noncename" value="' .
	    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	 
	    // Get the location data if its already been entered
	    $email_subject = get_post_meta($post->ID, '_email_subject', true);
	    $email_text = get_post_meta($post->ID, '_email_text', true);
	    $email_from = get_post_meta($post->ID, '_email_from', true);
		$email_template = get_post_meta($post->ID, '_email_template', true);
	 
	    // Echo out the fields
	    ?>
	    
	    <div style="overflow:hidden;  margin-top:10px;">
			<div style="width:100px; float:left; padding-top:7px;"><label for="_email_subject"><strong>Email Subject</strong></label></div>
			<div style="width:500px; float:left;"><input style="width: 80%%;" type="text" name="_email_subject" value="<?php echo $email_subject; ?>" />
			<p style="clear:both"><em>Subject line for the email</em></p></div>
		</div>
	    
	    <!--<div style="overflow:hidden; margin-top:10px; ">
			<div style="width:100px; float:left; padding-top:7px;"><label for="_email_text"><strong>Email text</strong></label></div>
			<div style="width:500px; float:left;"><textarea style="width: 90%%; height:200px;" name="_email_text"><?php echo $email_text; ?></textarea>
			<p style="clear:both"><em>Body of the email</em></p></div>
		</div>-->
	
	    <div style="overflow:hidden;  margin-top:10px;">
			<div style="width:100px; float:left; padding-top:7px;"><label for="_email_from"><strong>Email From Address</strong></label></div>
			<div style="width:500px; float:left;"><input style="width: 80%%;" type="text" name="_email_from" value="<?php echo $email_from; ?>" />
			<p style="clear:both"><em>Enter the address this email is from</em></p></div>
		</div>
	
		<!--<div style="overflow:hidden; margin-top:10px; ">
			<div style="width:100px; float:left;"><label for="_email_template"><strong>Email Template</strong></label></div>
			<div style="width:500px; float:left;">
				<select name="_email_template" id="_email_template">
				<?php
					$templates = array_merge( array( '' => 'No Template' ), array_flip( get_page_templates() ) );
					foreach($templates as $value => $label){
	
						// if this value is the currently selected template we'll mark it selected			
						$selected = ($email_template == $value) ? ' selected="selected"' : '';
	
						// escape value	for quotes so they won't break the html
						$value = addslashes($value);
				
						echo '<option value="'.$value.'"'.$selected.'>'.$label.'</option>';
					}
				?>
				</select>
				<p><em>Select an HTML template to render the email</em></p>
			</div>
		</div>-->
	
	    <?php
	}
	
	function email_save_meta($post_id, $post) {
	 
	    // verify this came from the our screen and with proper authorization,
	    // because save_post can be triggered at other times
	    if ( !wp_verify_nonce( $_POST['emailmeta_noncename'], plugin_basename(__FILE__) )) {
	    return $post->ID;
	    }
	 
	    // Is the user allowed to edit the post or page?
	    if ( !current_user_can( 'edit_post', $post->ID ))
	        return $post->ID;
	 
	    // OK, we're authenticated: we need to find and save the data
	    // We'll put it into an array to make it easier to loop though.
	
	    $email_meta['_email_subject'] = $_POST['_email_subject'];
	    $email_meta['_email_text'] = $_POST['_email_text'];
	    $email_meta['_email_from'] = $_POST['_email_from'];
		$email_meta['email_template'] = $_POST['_email_template'];
	 
	    // Add values of $email_meta as custom fields
	 
	    foreach ($email_meta as $key => $value) { // Cycle through the $events_meta array!
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
	
	add_action('save_post', 'email_save_meta', 1, 2);

	function send_email_and_log($to_address, $subject, $body, $headers='', $no_reply=FALSE) {

		if($headers=='') {
			if($no_reply) {
				$headers .= "Reply-To: no-reply@seenonscreenfitness.com\r\n"; // TO-DO: put these emails in a setting
				$headers .= "From: Seen On Screen (No-reply) <no-reply@seenonscreenfitness.com>\r\n";
			} else {
				$replyTo = get_option('admin_email');
				$headers .= "Reply-To: $replyTo\r\n";
				$headers .= "From: Seen On Screen Fitness <$replyTo>\r\n"; // TO-DO: put the name in a setting (perhaps the setting could be the entirety e.g. "Seen On Screen Fitness <email@seenonscreenfitness.com>"
			}
		}
		$log_string = $to_address."~~".$headers."~~".$body;
	
		do_action('activity_log', array(
			'type' => 'email',
			'entry'=> array(
				'to'=>$to_address,
				'subject'=>$subject,
				'body'=>$body,
				'headers'=>$headers
			)
		), 0);
		if(!TEST_MODE) {
			wp_mail($to_address, $subject, $body, $headers);
		}
	}