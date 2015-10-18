<?php
/* for the 404 page */
get_header();
?>
<?php /*
	Sub-template for single pages
*/ ?>
	<div class="title-container">
		<h1>Oops!</h1>
	</div>
	<?php if ( has_post_thumbnail() ) { ?>
		<?php the_post_thumbnail('full'); ?>
	<?php } ?>
	<div class="page-content-container">
		<p>Sorry, we can't find the page you are looking for. If you want to get in touch, send us an email at <a href="mailto:info@seenonscreenfitness.com">info@seenonscreenfitness.com</a></p>
	</div>
<?php
get_footer();
?>
