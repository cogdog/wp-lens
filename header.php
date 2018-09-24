<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		
		<?php wp_head(); ?>
		
		<?php if ( is_admin_bar_showing() ) :?>
		<style>
		#viewer { top: 30px;}
		.caption {margin-bottom: 30px;}
		</style>
		<?php endif?>	
				
		<noscript><link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/css/noscript.css" /></noscript>
	</head>
	<body <?php body_class('is-preload-0' , 'is-preload-1' , 'is-preload-2'); ?>>


		<!-- Main -->
			<div id="main">

			<!-- Header -->
				<header id="header">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<p><?php bloginfo( 'description' ); ?></p>
		
					<!-- begin social menu -->
					<?php 
						if (  has_nav_menu( 'lens-social' ) ) {
							wp_nav_menu( array( 'theme_location' => 'lens-social', 'menu_class' => 'icons' ) );
						} 
					?>
					<!-- end social menu -->
		
