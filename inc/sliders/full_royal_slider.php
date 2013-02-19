

<?php
query_posts( array(
	'ignore_sticky_posts' => 1,
	'posts_per_page' => 6,
	'post_type' => array(
			'w45_slides'
			
		)
));
?>

<?php if(have_posts()) :?>	
	
<!-- <div  id="video-gallery" class="royalSlider videoGallery rsDefault"> -->
<div id="homeSlider" class="royalSlider rsDefaultInv col span_4 fwImage">
	
		<?php $i = 1; while (have_posts()) : the_post(); ?>
		<?php


		//Get slide options
		// $slide_description = get_post_meta($post->ID, "_ttrust_slide_description_value", true);
		// 	$slide_hide_title = get_post_meta($post->ID, "_ttrust_hide_title_value", true);
		// 	$slide_text_position = get_post_meta($post->ID, "_ttrust_slide_text_position_value", true);
		// 	$slide_text_animation = get_post_meta($post->ID, "_ttrust_slide_text_animation_value", true);
		// 	$slide_img_position = get_post_meta($post->ID, "_ttrust_slide_image_position_value", true);
		// 	$slide_img_animation = get_post_meta($post->ID, "_ttrust_slide_image_animation_value", true);
		// 	$slide_full_image = (get_post_meta($post->ID, "_ttrust_full_image_value", true)) ? "full" : "";
		//$featured_slide = get_post_meta($post->ID, "wpcf-featured", true);
		$slide_image_url = get_post_meta($post->ID, "w45_slide_image", true);
		//$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($slide_image_url, 'w45_home_slide', false);
		$image_url = $image_url[0];


		$featured_slide = get_post_meta($post->ID, "w45_slide_featured", true);
		$show_info_box = get_post_meta($post->ID, "w45_slide_info_box", true);

		//$slide_title = get_post_meta($post->ID, "wpcf-title", true);
		$slide_description = get_the_excerpt();
		$slide_button_url = get_post_meta($post->ID, "w45_slide_button_link", true);
		$slide_button_label = get_post_meta($post->ID, "w45_slide_button_label", true);
		?>
	
<?php if($featured_slide) : ?>

<!--rsContent-->
<div class="rsContent slide<?php echo $i?>">


<?php if($show_info_box) : ?>
	
		<!-- <div style="position:absolute; margin-top:200px;  margin-left:3%; z-index:999; background:#000" class="infoBlock infoBlockLeftBlack rsABlock rsNoDrag" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200"> -->
	
	<div class="infoBlock infoBlockLeftBlack rsABlock rsNoDrag" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
		<div class="container inside" class="clearfix">
			<div class="one_half">	
	 	<?php the_title( '<h4>', '</h4>' ); ?>

		<?php if( $slide_description != '' ): ?>
			
	      	<h5><?php echo $slide_description; ?></h5>

	 	<?php else : ?>	     
			<?php echo $image_url; ?>
		<?php endif; ?>	


		<?php if( $slide_button_url != '' ): ?>
			<a class="slider_button button" href="<?php echo $slide_button_url ?>"><span><?php echo $slide_button_label ?> &#9656;</span></a>
		<?php else : ?>	 	
		
		<?php endif; ?>	


		<?php if (current_user_can('administrator')): ?>
			<div class="edit_slide_button">
		<?php edit_post_link('Edit Slide &#9656;'); ?>
			</div>
		<?php endif; ?>	
	</div>
	</div>
	</div>
	

<?php endif; ?>	

  <a class="rsImg slide-<?php echo $i?>" data-rsVideo="" href="<?php echo $image_url; ?>"></a>

</div><!--/rsContent-->


<?php endif; ?>


<?php $i++; ?>			

<?php endwhile; ?>

</div><!--video-gallery-->




<?php endif; ?>
<?php wp_reset_query();?>


<?php /*
<!--rsContent-->
<div class="rsContent">	
   <a class="rsImg" data-rsVideo="http://youtu.be/u6nvFHql4Dg" href="<?php echo get_site_url(); ?>/assets/Chip1_Slider.jpg">
    <div class="rsTmb">
      <h5>Chip Bag Nutrition</h5>
      <p>Click to watch the video</p>
    </div>
  </a>
</div>
<!--/rsContent-->

*/?>




<div class="clearboth"></div>

