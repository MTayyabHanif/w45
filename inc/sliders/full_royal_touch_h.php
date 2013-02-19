

<?php
// query_posts( array(
// 	'ignore_sticky_posts' => 1,
// 	'posts_per_page' => 9,
// 	'post_type' => array(
// 			//'product'
// 		'project'
			
// 		)
// ));
?>





<?php if(have_posts()) :?>	


			
<div class="carosel_Hor_2x2 container inside">


	
<div class="video-touchslider  royalSlider videoGallery rsDefault">

		<?php $i = 1; while (have_posts()) : the_post(); ?>

		<?php
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, 'w45_square_thumb_350', false);
$image_url = $image_url[0];
?>

<?php $placholder_image = get_bloginfo( 'stylesheet_directory' ) . '/images/placeholders/placeholder_square.png';?>	

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
	
<?php// if($featured_slide) : ?>

 <div class="rsContent">
 	<?php if (current_user_can('administrator')): ?>
			<div style="position:absolute; z-index:999999" class="edit_slide_button">
		<?php edit_post_link('Edit Slide &#9656;'); ?>
			</div>
		<?php endif; ?>
    <a class="rsImg" data-rsvideo="<?php //echo $slide_button_url ?>" href="<?php //echo $image_url; ?>">

      <div class="rsTmb">

<div class="tc_thumb"   style="background-image: url(
					

						<?php if($image_url) : ?>	

						<?php echo $image_url; ?>

						<?php else : ?>	

						<?php echo $placholder_image; ?>

						<?php endif; ?>	


						);">


        <a href="<?php the_permalink();?>"><?php the_title( '<h5>', '</h5>' ); ?></a>
        <p><?php// echo $slide_button_label ?>This animated block is here just to show you that</p>
       </div>

      </div>

    </a>
    <h3 class="rsABlock sampleBlock hide">This animated block is here just to show you that you can put anything you want inside each slide.</h3>
  </div>


<?php// endif; ?>	


<?php $i++; ?>			

<?php endwhile; ?>

</div><!--video-gallery-->
</div>


<?php endif; ?>
<?php wp_reset_query();?>



<div class="clearboth"></div>






<?php if(!is_front_page()):?>
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
<?php endif; ?>	





