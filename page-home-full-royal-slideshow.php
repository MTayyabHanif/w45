<?php /*
Template Name: Home Full Royal Slideshow
*/ ?>
<?php get_header('lite_fixed'); ?>


<?php
query_posts( array(
	'ignore_sticky_posts' => 1,
	'posts_per_page' => 6,
	'post_type' => array(
			'w45_slides'
			//'post'		
		)
));
?>
<?php if(have_posts()) :?>	
	<div id="full_bg_slideshow" class="royalSlider heroSlider2 rsMinW">
<?php $i = 1; while (have_posts()) : the_post(); ?>

<?php
$slide_image_url = get_post_meta($post->ID, "w45_slide_image", true);
$image_url = wp_get_attachment_image_src($slide_image_url, 'full', true);
$image_url = $image_url[0];
$featured_slide = get_post_meta($post->ID, "w45_slide_featured", true);
?>

<?php if($featured_slide) : ?>

  <div   class="rsContent slide<?php echo $i?>" style="background-image: url(<?php echo $image_url; ?>);">
    <img class=" hide rsImg" src="<?php echo $image_url; ?>" alt="" />
    <div class=" hide infoBlock infoBlockLeftBlack rsABlock rsNoDrag" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
      <?php the_title( '<h4>', '</h4>' ); ?>
      <p>Put completely anything inside - text, images, inputs, links, buttons.</p>
      <?php if (current_user_can('administrator')): ?>
		<div style="" class="edit_slide_button"><?php edit_post_link('Edit Slide &#9656;'); ?></div>
	<?php endif; ?>	
<?php endif; ?>	
    </div>
  </div>

<?php $i++; ?>			
	<?php endwhile; ?>
</div>
<?php endif; ?>
<?php wp_reset_query();?>
<div class="clearboth"></div>

<?php get_footer('lite'); ?>	