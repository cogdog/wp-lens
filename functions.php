<?php
/* Functions and stuff for the WP-Lens theme
   
   Based on HTML5up html5up.net
   
   mods by and blame go to http://cog.dog
*/


/* --- setup -------------------------------------------------------------------------- */
add_action( 'after_setup_theme', 'lens_setup' );

function lens_setup() {
   add_theme_support( 'title-tag' );
   
   // give us thumbnails
	add_theme_support( 'post-thumbnails' ); 	
		
	add_image_size( 'lens-thumb', 360, 225, true );
	
	// big image for front page view
	add_image_size( 'lens-fulls', 1200, 750, true );

}


/* --- excerpts ------------------------------------------------------------------------ */

function lens_custom_excerpt_length( $length ) {
    return 70;
}
add_filter( 'excerpt_length', 'lens_custom_excerpt_length', 999 );


function lens_excerpt_more( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'lens_excerpt_more' );


/* --- widgets ------------------------------------------------------------------------- */

// Add sidebar widget area
add_action( 'widgets_init', 'lens_sidebar_reg' ); 

function lens_sidebar_reg() {
	register_sidebar(array(
	  'name' => __( 'Sidebar', 'lens' ),
	  'id' => 'sidebar',
	  'description' => __( 'Widgets in this area will be shown in the sidebar.', 'lens' ),
	  'before_title' => '<h3 class="widget-title">',
	  'after_title' => '</h3>',
	  'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
	  'after_widget' => '</div><div class="clear"></div></div>'
	));
}


/* --- menus -------------------------------------------------------------------------- */
add_action( 'init', 'lens_register_my_menu' );

function lens_register_my_menu() {
	register_nav_menu( 'lens-social', __( 'Social Media' ) );
}


/* --- archive nav  --------------------------------------------------------------------- */


function lens_archive_navigation() {
	
	global $wp_query;
	
	if ( $wp_query->max_num_pages > 1 ) : ?>
				
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
			
			<div class="clear"></div>
				
		</div><!-- .archive-nav-->
						
	<?php endif;
}

/* --- return last post url to hide in footer  ------------------------------------------ */
function lens_get_last_pic() {
	global $wp_query;
	// total number pages
	$numpages = $wp_query->max_num_pages;
	
	// current paged
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	if ( $numpages > 1 AND $paged != $numpages  ) {
		return( site_url() . '/page/' . $numpages );
	} else {
		return("");
	}

	/* get last post ID
	$lastpic = get_posts("numberposts=1&fields=ids");
	// return URL
	return get_permalink($lastpic[0][0]);
	*/
}



/* --- enqueues ------------------------------------------------------------------------ */
// enqueue the scripts'n styles... do it right!

function lens_scripts() {

	// Big Picture CSS
	wp_register_style( 'lens-style', get_stylesheet_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'lens-style' );

	// scrolly jquery down in the footer you go
	wp_register_script( 'lens-browser-min' , get_stylesheet_directory_uri() . '/assets/js/browser.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'lens-browser-min' );

	// scrolly jquery down in the footer you go
	wp_register_script( 'lens-breakpoints' , get_stylesheet_directory_uri() . '/assets/js/breakpoints.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'lens-breakpoints' );
	

	wp_register_script( 'lens-main' , get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'lens-main' );
	
}

add_action( 'wp_enqueue_scripts', 'lens_scripts' );


// Load plugin requirements file to display admin notices.
require get_stylesheet_directory() . '/includes/splot-plugins.php';

?>