<?php get_header(); ?>

</header>
<!-- end Header -->
		<?php if ( have_posts() ) : ?>
		
			<section id="thumbnails">
			
			<?php 
			
			$counter = 0;

				while ( have_posts() ) : the_post();
					set_query_var( 'counter', $counter);
					get_template_part( 'content' );
	    	
				endwhile; ?>

			</section>
			
			<?php if ( $wp_query->max_num_pages > 1 ) : ?>
				
				<div class="archive-nav">
			
					<?php 
					if ( get_previous_posts_link() ) {
						previous_posts_link( '&larr;' );
					} else {
						echo '';
					} 

			
					if ( get_next_posts_link() ) {
						next_posts_link( '&rarr;' );
					} else {
						echo '';
					} 
					?>
														
				</div><!-- .archive-nav-->
			<?php endif; ?>

		<?php else:?>
		
		
			<!-- Main -->
			
				<?php get_template_part( 'content', 'none' );?>

	


		<?php endif ?>
								
<?php get_footer(); ?>