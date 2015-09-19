<?php
/* for blog post index page */
get_header(); ?>
	<div class="contentPage">	
		<div class="title-container">
			<h1>SoS Backstage</h1>
		</div>
	<?php if ( have_posts() ) :
		$count = 0;
		while ( have_posts() ) : the_post(); ?>
			<?php if($count==0) :
				$wrapperClass = 'grid6col';
				$internalClass = 'grid6col';
				$textpanelClass = 'grid6col';
				$imageType = 'blog-sub';
			else :
				$wrapperClass = 'grid6col';
				$internalClass = 'grid6col';	
				$textpanelClass = 'grid6col';
				$imageType = 'blog-sub';				
			endif;
			$post_url = get_permalink(); ?>
			<div class="margintop">
				<div class="<?php echo $wrapperClass;?> left">
					<a href="<?php echo $post_url; ?>" class="">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail($imageType); 
						} ?>
					</a>
				</div>
				<div class="<?php echo $internalClass; ?> left">
					<div class="<?php echo $textpanelClass ;?>">
						<h1><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h1>
						<div class="meta">Posted - <?php echo get_the_date(); ?> <!-- &nbsp;/ &nbsp;Category - <ul> <?php wp_list_categories('title_li='); ?>--></ul></div>
						<?php the_excerpt(); ?>
						<a class="cta" href="<?php echo $post_url; ?>">Read more</a>
					</div>
				</div>
			</div>			
			<br class="clearboth">
		<?php $count++;
		endwhile;
	endif; ?>
	</div>
<?php get_footer(); ?>
