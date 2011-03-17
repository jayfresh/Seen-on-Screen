<?php
	/* Template Name: Dancer page */

get_header();

global $post;

?>
<div class="fullwidth">
				<div class="leftpane marginright left">
					<h2><?php the_title(); ?></h2>
					<ul class="mini starred">
					<?php
					$creditsList = get_post_meta($post->ID,'_credits',true);
					$creditsList = explode(',', $creditsList);
					foreach($creditsList as $credit) : ?>
						<li class="equalize"><?php echo trim($credit); ?></li>
					<?php endforeach; ?>
					</ul>
				</div>
				<div class="rightpane left dancer">
					<div>
						<?php the_post_thumbnail(); ?>
					</div>
				</div>
			</div>
			<div class="fullwidth paddingtopsmall">
				<div class="leftpane marginright left">
					<p><?php echo $post->post_content; ?></p>
				</div>
				<div class="rightpane left dancer">
					<div>
						<?php attachment_toolbox('small-thumb', '', 'grid2col left'); ?>
						<!--<ul class="inline">
							
						</ul>-->
					</div>
					<a href="<?php bloginfo('url'); ?>/contact?page=dancer&class=<?php the_title(); ?>" class="book">Book a session with <?php the_title(); ?> now &raquo;</a>
				</div>
			</div>
<?php get_footer(); ?>