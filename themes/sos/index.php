<?php
/* for blog post index page */
get_header();
	if ( have_posts() ) :
		$count = 0;
		while ( have_posts() ) : the_post(); ?>
		<div class="hero"><!-- Start blog landing hero  -->
			<?php if($count==0) :
				$wrapperClass = 'grid8col';
				$internalClass = 'grid4col';
				$textpanelClass = 'textPanel';
				$imageType = 'carousel';
			else :
				$wrapperClass = 'grid5col';
				$internalClass = 'grid7col';	
				$textpanelClass = 'grid5col';
				$imageType = 'blog-sub';				
			endif;
			$post_url = get_permalink(); ?>

			<div class="<?php echo $wrapperClass;?> left">
				<a href="<?php echo $post_url; ?>" class="">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail($imageType); 
					} ?>
				</a>
			</div>
			<div class="<?php echo $internalClass; ?> left marginleft">
				<div class="marginleft <?php echo $textpanelClass ;?>">
					<h1><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h1>
					<div class="meta">Posted - <?php echo get_the_date(); ?> <!-- &nbsp;/ &nbsp;Category - <ul> <?php wp_list_categories('title_li='); ?>--></ul></div>
					<?php the_excerpt(); ?>
					<a class="cta" href="<?php echo $post_url; ?>">Read more</a>
				</div>
			</div>
		</div><!-- End blog landing hero -->
		<?php $count++;
		endwhile;
	endif;
get_footer(); ?>