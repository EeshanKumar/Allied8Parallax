<?php
/*
Template Name: Default (Gray Column Text With Navigation Arrows)
*/
?>

<?php get_header(); ?> <!-- Wrapper and body divs are still open -->

<div id="content">

    <?php the_post(); ?>
        <div class="textcolumn">
            <div class="bg"></div>
            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content --> 
        </div><!-- .textcolumn -->
     
</div><!-- #content -->

<div id="fullimg">
    <div id="navigation" class="post">
        <a href id="arrow_left">
            <img src="<?php bloginfo('template_directory'); ?>/images/ArrowTaglineSprite.png" alt="Slide Left" title="Prev">
        </a>
        <a href id="arrow_right">
            <img src="<?php bloginfo('template_directory'); ?>/images/ArrowTaglineSprite.png" alt="Slide Right" title="Next">
        </a>
    </div> <!-- #navigation -->

    <div id="maximage">
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
                    echo '<img src="'.$src[0].'"/>';
                }
            }
        ?>
    </div> <!-- #maximage -->
</div> <!-- #fullimag -->
 
<?php get_footer(); ?>