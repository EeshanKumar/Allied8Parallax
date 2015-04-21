<?php get_header(); ?> <!-- Wrapper and body divs are still open -->

<div id="fullimg">
    <div id="navigation">
        <a href id="arrow_left">
            <img src="<?php bloginfo('template_directory'); ?>/images/ArrowTaglineSprite.png" alt="Slide Left" title="Prev">
        </a>
        <a href id="arrow_right">
            <img src="<?php bloginfo('template_directory'); ?>/images/ArrowTaglineSprite.png" alt="Slide Right" title="Next">
        </a>
    </div> <!-- #navigation -->

    <div class="projheader">
        <div class="bg"></div>
        <h3>Hide Project Info</h3>
    </div>
    <div class="projtext">
        <div class="bg"></div>
        <p>
            <?php echo get_the_excerpt(); ?>
        </p>
    </div>

    <?php 
        global $post;
        $args = array(
            'order'             => 'ASC',
            'orderby'           => 'menu_order',
            'post_type'         => 'attachment',
            'post_parent'       => $post->ID,
            'post_mime_type'    => 'image',
            'post_status'       => null,
            'numberposts'       => -1,
        );

        $attachments = get_posts($args);
    ?>

    <div id="maximage">
        <?php
            if ($attachments) {
                foreach ($attachments as $attachment) {
                    $src = wp_get_attachment_image_src($attachment->ID, 'large', false);
                    echo '<img src="'.$src[0].'"/>';
                }
            }
        ?>
    </div> <!-- #maximage -->
</div> <!-- #fullimg -->

<div class="flexslider mobile">
    <ul class="slides">
        <?php
            if ($attachments) {
                foreach ($attachments as $attachment) {
                    $src = wp_get_attachment_image_src($attachment->ID, 'medium', false);
                    echo '<li><img src="'.$src[0].'"/></li>';
                }
            }
        ?>
    </ul> <!-- .slides -->
</div> <!-- .flexslider -->

<div id="mobilenav" class="post mobile">
</div>

<script type="text/javascript" charset="utf-8">
    $('#projinfo').css({'display': 'block',});
    $('#navigation').css({'bottom': '266px'});
</script>

<script type="text/javascript" charset="utf-8">
    $('.flexslider').flexslider({
        animation: "slide",
        slideshowSpeed: 5000,
        animationSpeed: 1000,
        pauseOnAction: true,
        animationLoop: true,
        controlNav: false,
        controlsContainer: "#mobilenav",        
    });
</script>

<?php get_footer(); ?>