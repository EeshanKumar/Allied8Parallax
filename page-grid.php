<?php
/*
Template Name: Grid
*/
?>

<?php get_header(); ?> <!-- Wrapper and body divs are still open -->

<!-- This is all a hack to get the logo to work between 1080px and 980px -->
<style type="text/css">
    #header #logo {width: 245px;}
    @media only screen and (max-width: 1080px) {
        #header #logo #home img { padding-left:0; }
    }

    @media only screen and (max-width: 980px) {
        #header #logo {width:100%;}
    }
</style>

<ul class="projectPage">
	<?php 
		$cat = get_post_meta($post->ID, 'Category', true);
		$skip = get_post_meta($post->ID, 'Skip', true);
		$skip = explode(",", $skip);
		$args = array(
			'posts_per_page'   => 11,
			'category'         => (int)$cat,
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);

		$myposts = get_posts( $args );
		$i = 1;

		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			<?php 
				if ($i==9) {echo "<li class></li>"; $i++; }
				foreach ( $skip as $skipval ) {
					if ($i==$skipval) {echo "<li class='dark'></li>"; $i++;}
				}
			?>
			<?php $src=wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'thumbnail'); ?>
			<li>
				<a href="<?php the_permalink(); ?>" style="background:url(<?php echo $src[0]; ?>) no-repeat center; background-size:cover;">	
					<div class="project_hover_info">
						<div class="bg"></div>
						<div class="title"><?php the_title(); ?></div>
						<div class="tag">
                            <?php echo get_post_meta($post->ID, 'Location', true); ?>
                            <?php echo get_post_meta($post->ID, 'Tagline', true); ?>
                        </div>
					</div>
				</a>
			</li> 
			<?php 
				$i++;
				foreach ( $skip as $skipval ) {
					if ($i==$skipval) {echo "<li class='dark'></li>"; $i++;}
				}
			?>
		<?php endforeach;

		wp_reset_postdata();
	?>
	<br style="clear:both" />
</ul> <!-- .projectPage -->
 
<?php get_footer(); ?>