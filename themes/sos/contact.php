<?php
	/* Template Name: Contact page */

get_header();

?>

<!--<form class="grid10col" id="contactForm">
	<div class="grid3col left">
		<h2>Contact</h2>
		<img class="bottomline" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/contact_dancer.jpg" alt="dancer image" />
	</div>
	<div class="grid7col left">
		<label for="name">Your name</label>
		<input type="text" name="name" id="name" size="30" class="required" />
		<label for="email">Your email address</label>
		<input type="text" name="email" id="email" size="30" class="required email" />
		<label for="subject">Subject</label>
		<input type="text" name="subject" id="subject" size="30" class="required" />
		<label for="message">Message</label>
		<textarea name="message" id="message" class="grid6col required" rows="6"></textarea>
		<div class="button">
			<input type="submit" name="submitButton" id="submitButton" class="grid2col" value="Send message" />
		</div>
	</div>
</form>-->
<div class="grid10col" id="contactForm">
	<div class="grid3col left">
		<h2>Contact</h2>
		<!--<img class="bottomline" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/sliced/contact-dancer.gif" alt="dancer image" />-->
	</div>
	<div class="grid7col left">
		<?php if (have_posts()) : while (have_posts()) : the_post();
			the_content();
		endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>