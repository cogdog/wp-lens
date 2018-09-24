<?php get_header(); ?>


			<h2>
				<?php 
				if ( is_day() ) :
					echo 'Photos from ' . get_the_date( get_option( 'date_format' ) );

				elseif ( is_month() ) :
					echo 'Photos from ' .get_the_date( 'F Y' );

				elseif ( is_year() ) :
					echo 'Photos from ' .get_the_date( 'Y' );

				elseif ( is_category() ) :
					printf( __( 'Photos in Category: %s', 'lens' ), '' . single_cat_title( '', false ) . '' );

				elseif ( is_tag() ) :
					printf( __( 'Photos Tagged: %s', 'lens' ), '' . single_tag_title( '', false ) . '' );

				elseif ( is_author() ) :
					$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
					printf( __( 'Photos by Author: %s', 'lens' ), $curauth->display_name );

				else :
					_e( 'Photo Archive', 'lens' );

				endif;
				?>
				
			</h2>

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