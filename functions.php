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

// change the name of admin menu items from "New Posts"
// -- h/t https://wordpress.stackexchange.com/a/9224/14945
// and of course the Codex http://codex.wordpress.org/Function_Reference/add_submenu_page

add_action( 'admin_menu', 'lens_change_post_label' );
add_action( 'init', 'lens_change_post_object' );

// turn 'em from Posts to Collectables
function lens_change_post_label() {
    global $menu;
    global $submenu;
    
    $thing_name = 'Photo';
    
    $menu[5][0] = $thing_name . 's';
    $submenu['edit.php'][5][0] = 'All ' . $thing_name . 's';
    $submenu['edit.php'][10][0] = 'Add ' . $thing_name;
    $submenu['edit.php'][15][0] = $thing_name .' Categories';
    $submenu['edit.php'][16][0] = $thing_name .' Tags';
    echo '';

}

// change the prompts and stuff for posts to be relevant to collectables
function lens_change_post_object() {

    $thing_name = 'Photo';

    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name =  $thing_name . 's';;
    $labels->singular_name =  $thing_name;
    $labels->add_new = 'Add ' . $thing_name;
    $labels->add_new_item = 'Add ' . $thing_name;
    $labels->edit_item = 'Edit ' . $thing_name;
    $labels->new_item =  $thing_name;
    $labels->view_item = 'View ' . $thing_name;
    $labels->search_items = 'Search ' . $thing_name;
    $labels->not_found = 'No ' . $thing_name . ' found';
    $labels->not_found_in_trash = 'No ' .  $thing_name . ' found in Trash';
    $labels->all_items = 'All ' . $thing_name;
    $labels->menu_name =  $thing_name;
    $labels->name_admin_bar =  $thing_name;
}

// edit the post editing admin messages to reflect use of Collectables
// h/t http://www.joanmiquelviade.com/how-to-change-the-wordpress-post-updated-messages-of-the-edit-screen/

function lens_post_updated_messages ( $msg ) {

	$thing_name = 'Photo';
	
    $msg[ 'post' ] = array (
         0 => '', // Unused. Messages start at index 1.
	 1 => $thing_name . " updated.",
	 2 => 'Custom field updated.',  // Probably better do not touch
	 3 => 'Custom field deleted.',  // Probably better do not touch

	 4 => "Collectable updated.",
	 5 => $thing_name . " restored to revision",
	 6 => $thing_name . " published.",

	 7 => $thing_name . " saved.",
	 8 => $thing_name . " submitted.",
	 9 => $thing_name . " scheduled.",
	10 => $thing_name . " draft updated.",
    );
    return $msg;
}

add_filter( 'post_updated_messages', 'lens_post_updated_messages', 10, 1 );

// modify the comment form
add_filter('comment_form_defaults', 'lens_comment_mod');

function lens_comment_mod( $defaults ) {
	$defaults['title_reply'] = 'Provide Feedback';
	$defaults['logged_in_as'] = '';
	$defaults['title_reply_to'] = 'Provide Feedback for %s';
	return $defaults;
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