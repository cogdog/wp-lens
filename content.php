<?php
	    			$full_size = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lens-fulls' ); 
					$thumb_size = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lens-thumb' ); 
					$original_size =  wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
					$counter++;
		
					$data = ( $counter == 1) ? ' data-position="left center"' :   '';
		
?>
					
					<article>
						<a class="thumbnail" href="<?php echo $full_size[0]?>" <?php echo $data?>>
						<img src="<?php echo $thumb_size[0];?>" /></a>
						<h2><?php the_title()?></h2>
					
						<?php the_excerpt();?> 
						
						<p class="edit-this">
					
						<a href="<?php echo $original_size[0]?>" title="download original" target="_blank"><span class="fa fa-download" aria-hidden="true"></span></a>
					
						<?php edit_post_link('<span class="fa fa-pencil-square-o" aria-hidden="true"></span>');?>
						</p>
					</article>
