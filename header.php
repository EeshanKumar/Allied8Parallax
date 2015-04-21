<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="robots" content="NOODP">
    <meta name="google-site-verification" content="OkNGpbGI-VxK5oqWZ0GVaHuL0IGs6fv5YLExE3khwHY" />

    <title><?php
        if ( is_single() ) { bloginfo('name'); print ' | '; single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { bloginfo('name'); print ' | '; single_post_title(); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/normalize.css" />
    <link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.less" />    
    <?php if ( is_page_template( 'page-parallax.php' ) ) { ?>
         <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/parallax/parallax.css" />
    <?php } ?>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <!-- For media queries on < IE8 -->
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/less.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>

    <!-- My JQuery for animations (app.js) is in footer -->

    <!-- MaxImage - To create fullscreen slider -->
    <script src="<?php bloginfo('template_directory'); ?>/maxImage/jquery.cycle.all.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_directory'); ?>/maxImage/jquery.maximage.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/maxImage/jquery.maximage.css" type="text/css" />

    <!-- Flexslider - For Process Page and mobile site -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/flexslider/flexslider.css" type="text/css" />
    <script src="<?php bloginfo('template_directory'); ?>/flexslider/jquery.flexslider-min.js" type="text/javascript"></script>

    <!-- My animations and max image intializer in footer.php -->
 
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_head(); ?>
 
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'hbd-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'hbd-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
</head>

<body <?php body_class(); ?>>
    <div id="wrapper" class="hfeed">
        
        <div id="header" <?php if (is_home()) {echo 'class="home"';} ?> >
            <div id="logo">
                <div class="bg"></div>
                <a href="<?php echo home_url(); ?>/" title="Home" id="home"><img src="<?php bloginfo('template_directory'); ?>/images/logoNew.jpg" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" /></a> 
            </div>
            

            <div id="menu" >

                <div class="expand <?php if (is_home()) { echo 'active';} else {echo 'inactive';} ?>"> <!-- Expand plug minus button -->
                    <div class="bg"></div>
                    <div class="space"></div>
                </div> <!-- #expand -->

                <div id="main-menu">
                    <div class="bg"></div>
                    <?php wp_nav_menu( array( 'theme_location' => 'header', 'sort_column' => 'menu_order', 'menu' => 'Main') ); ?>
                </div><!-- #main-menu -->

            </div><!-- #menu -->
        
        </div><!-- #header -->