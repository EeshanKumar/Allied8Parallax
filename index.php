<?php get_header(); ?> <!-- Wrapper and body divs are still open -->

<div id="social">
    <a target="_blank" href="mailto:info@allied8.com">
        <img src="<?php bloginfo('template_directory'); ?>/images/Email.png" alt="Email" title="Email" />
    </a>    
    <a target="_blank" href="https://www.facebook.com/vergeadrocks">
        <img src="<?php bloginfo('template_directory'); ?>/images/Facebook.png" alt="Facebook" title="Facebook" />
    </a>    
    <a target="_blank" href="http://www.houzz.com/pro/allied8/allied8-formerly-verge-ad">
        <img src="<?php bloginfo('template_directory'); ?>/images/Houzz.png" alt="Houzz" title="Houzz" />
    </a>
    <a target="_blank" href="http://instagram.com/allied8architects/">
        <img src="<?php bloginfo('template_directory'); ?>/images/Instagram.png" alt="Instagram" title="Instagram" />
    </a>
    <a target="_blank" href="http://www.linkedin.com/company/verge-ad?trk=ppro_cprof">
        <img src="<?php bloginfo('template_directory'); ?>/images/Linkedin.png" alt="LinkedIn" title="LinkedIn" />
    </a>
</div><!-- #social -->

<div id="tagline">
    <img src="<?php bloginfo('template_directory'); ?>/images/Tagline.png" alt="Approachable Sustainable Modern" title="Approachable Sustainable Modern" />
</div><!-- #tagline -->

<div id="announcement">
    <div class="bg"></div>
    <h3>We are pleased to announce that Verge Architecture and Design has merged with Root Studio Architects to form allied8!</h3>
</div><!-- #announcement -->

<div id="fullimg">
    <div id="navigation">
    	<a href="" id="arrow_left">
    		<img src="<?php bloginfo('template_directory'); ?>/images/ArrowTaglineSprite.png" alt="Slide Left" title="Prev" />
    	</a>
    	<a href="" id="arrow_right">
    		<img src="<?php bloginfo('template_directory'); ?>/images/ArrowTaglineSprite.png" alt="Slide Right" title="Next" />
    	</a>
    </div> <!-- #navigation -->

    <img id="cycle-loader" src="<?php bloginfo('template_directory'); ?>/images/ajax-loader.gif" style="display: none;">
    <div id="maximage">
        <?php 
            $args = array(
                'order'             => 'ASC',
                'orderby'           => 'menu_order',
                'post_type'         => 'attachment',
                'post_parent'       => 98, // Important home gallery post ID retrived using Reveal IDs plugin
                'post_mime_type'    => 'image',
                'post_status'       => null,
                'numberposts'       => -1,
            );

            $attachments = get_posts($args);
            if ($attachments) {
                foreach ($attachments as $attachment) {
                    $src = wp_get_attachment_image_src($attachment->ID, 'large', false);
                    echo '<img src="'.$src[0].'"/>';
                }
            }
        ?>
    </div> <!-- #maximage -->
</div> <!-- #fullimg -->

<div id="homemenu" class="mobile">
    <?php wp_nav_menu( array( 'theme_location' => 'header', 'sort_column' => 'menu_order', 'menu' => 'Mobile') ); ?>
</div> <!-- #mobilehome -->

<div id="mobilecontact" class="mobile">
    <a href="https://maps.google.com/maps?q=1429+12th+ave+e+seattle+98122+map&amp;ie=UTF-8&amp;hq=&amp;hnear=0x54906acdd333c5cb:0xca26013ba3d9fe6c,1429+12th+Ave,+Seattle,+WA+98122&amp;gl=us&amp;daddr=1429+12th+Ave,+Seattle,+WA+98122&amp;ei=uvIcUtP5IeadjALGo4CYBA&amp;ved=0CDAQwwUwAA" target="_blank">1429 12th Ave, Suite C, Seattle.WA.98122</a>
    <a href="mailto:info@allied8.com" target="_blank">info@allied8.com</a>
    <a href="tel:+1206 383 7274">206.383.7274</a>
</div>
 
<?php get_footer(); ?>