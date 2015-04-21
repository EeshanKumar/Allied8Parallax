<?php
/*
Template Name: Process
*/
?>

<?php get_header(); ?> <!-- Wrapper and body divs are still open -->
<div id="process">
    <div class="flexslider">
        <ul class="slides">
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
                if ($attachments) {
                    foreach ($attachments as $attachment) {
                        $src = wp_get_attachment_image_src($attachment->ID, 'large', false);
                        echo '<li><a href="'.$src[0].'"><img src="'.$src[0].'"/></a></li>';
                    }
                }
            ?>
        </ul> <!-- .slides -->
    </div> <!-- .flexslider -->
</div> <!-- #process -->

<div id="navigation" class="post">
</div>

<script type="text/javascript" charset="utf-8">
    $('.flexslider').flexslider({
        animation: "slide",
        controlsContainer: "#navigation",
        slideshowSpeed: 5000,
        animationSpeed: 1000,
        pauseOnAction: true,
        animationLoop: false,
        controlNav: false
    });
</script>
 
<?php get_footer(); ?>