<?php
	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'hbd-theme', TEMPLATEPATH . '/languages' );
	add_theme_support( 'menus' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable($locale_file) )
	    require_once($locale_file);

	// Get the page number
	function get_page_number() {
	    if ( get_query_var('paged') ) {
	        print ' | ' . __( 'Page ' , 'hbd-theme') . get_query_var('paged');
	    }
	} // end get_page_number

	function register_my_menus() {
		register_nav_menus(
		    array( 
		    	'main-menu' => __( 'Main Menu' ),
		    	'mobile-menu' => __( 'Mobile Menu' )
		    )
		);
	}
	add_action( 'init', 'register_my_menus' );

	function my_custom_login_logo() {
	    echo '<style type="text/css">
	        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
	    </style>';
	}

	add_theme_support( 'post-thumbnails' );
	// Medium Size Thumbnail Cropping
	if(false === get_option("medium_crop")) {
	     add_option("medium_crop", "1"); }
	else {
	  update_option("medium_crop", "1");
	}

	add_action('login_head', 'my_custom_login_logo');
?>