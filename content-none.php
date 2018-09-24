<article>

	<h2><?php _e( 'No Photos Found', 'lens' ); ?></h2>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>To add your photos, create  new posts with big luscious featured images (bigger than 1200px)! Hello World does not count ;-)</p>
			<p><?php printf( __( 'Ready to publish your first photo? <a href="%1$s">Do it now</a>.', 'lens' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
			
	<p>Shrug.</p>


</article>