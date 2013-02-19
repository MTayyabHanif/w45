<?php /*
Template Name: Home Full Slideshow
*/ ?>
<?php get_header('lite_fixed'); ?>


<?php
query_posts( array(
	'ignore_sticky_posts' => 1,
	'posts_per_page' => 6,
	'post_type' => array(
			'w45_slides',
			'post'		
		)
));
?>
<?php if(have_posts()) :?>	
	<ul class="cb-slideshow">
<?php $i = 1; while (have_posts()) : the_post(); ?>

	<?php

		$slide_image_url = get_post_meta($post->ID, "w45_slide_image", true);
		$image_url = wp_get_attachment_image_src($slide_image_url, 'w45_home_slide', false);
		$image_url = $image_url[0];
		$featured_slide = get_post_meta($post->ID, "w45_slide_featured", true);

	?>
<?php if($featured_slide) : ?>
  <li class="slide<?php echo $i?>">
     
	<span style="background-image: url(<?php echo $image_url; ?>)">Image 01</span>
	<div><?php the_title( '<h3>', '</h3>' ); ?></div>
	
</li>
<?php if (current_user_can('administrator')): ?>
		<div style="position:absolute; z-index:99999; top:400px; left:0;" class="edit_slide_button"><?php edit_post_link('Edit Slide &#9656;'); ?></div>
	<?php endif; ?>	
<?php endif; ?>	

        <?php $i++; ?>			
	<?php endwhile; ?>
 </ul>
<?php endif; ?>
<?php wp_reset_query();?>
<div class="clearboth"></div>

 <!-- <ul class="cb-slideshow">
        <li><span style="background-image: url(http://tympanus.net/Tutorials/CSS3FullscreenSlideshow/images/1.jpg)">Image 01</span><div><h3>re·lax·a·tion</h3></div></li>
        <li><span style="background-image: url(http://tympanus.net/Tutorials/CSS3FullscreenSlideshow/images/2.jpg)">Image 02</span><div><h3>qui·e·tude</h3></div></li>
        <li><span style="background-image: url(http://tympanus.net/Tutorials/CSS3FullscreenSlideshow/images/3.jpg)">Image 03</span><div><h3>bal·ance</h3></div></li>
        <li><span style="background-image: url(http://tympanus.net/Tutorials/CSS3FullscreenSlideshow/images/4.jpg)">Image 04</span><div><h3>e·qua·nim·i·ty</h3></div></li>
        <li><span style="background-image: url(http://tympanus.net/Tutorials/CSS3FullscreenSlideshow/images/5.jpg)">Image 05</span><div><h3>com·po·sure</h3></div></li>
        <li><span style="background-image: url(http://tympanus.net/Tutorials/CSS3FullscreenSlideshow/images/6.jpg)">Image 06</span><div><h3>se·ren·i·ty</h3></div></li>
 </ul> -->

<?php get_footer('lite'); ?>	