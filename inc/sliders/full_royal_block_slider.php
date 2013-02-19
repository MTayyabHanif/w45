<?php
query_posts( array('ignore_sticky_posts' => 1, 'posts_per_page' => 6,'post_type' => array('w45_slides')));
?>

<div class="container inside">
<div id="block_slider" class="royalSlider rsMinW">
	<?php if(have_posts()) :?>  

        <?php $i = 1; while (have_posts()) : the_post(); ?>

        <?php
        $slide_image_url = get_post_meta($post->ID, "w45_slide_image", true);
        $image_url = wp_get_attachment_image_src($slide_image_url, 'full', false);
        $image_url = $image_url[0];
        $featured_slide = get_post_meta($post->ID, "w45_slide_featured", true);
        $show_info_box = get_post_meta($post->ID, "w45_slide_info_box", true);
        $slide_description = get_the_excerpt();
        $slide_button_url = get_post_meta($post->ID, "w45_slide_button_link", true);
        $slide_button_label = get_post_meta($post->ID, "w45_slide_button_label", true);
        ?>
    
<?php if($featured_slide) : ?>


<div class="rsContent slide">
    <!-- <a class="rsImg" href="<?php //echo $image_url; ?>">palms & beach</a> -->
    <div class="bContainer">
      <strong class="rsABlock txtCent blockHeadline"><h3><?php the_title(); ?></h3></strong>
      <span class="rsABlock txtCent" data-move-effect="none"><?php echo $slide_description; ?></span>
    </div>
    <img class="rsABlock palmImg" data-fade-effect="none" data-move-effect="bottom" data-opposite="true" data-move-offset="450" data-delay="350" data-speed="300" data-easing="easeOutBack" src="<?php echo $image_url; ?>" />
    <div class="photoCopy">Photo by <a href="http://placehold.it/300x300">Laurent Aphecetche</a></div>
  </div>

<?php endif; ?> 
<?php $i++; ?>          
<?php endwhile; ?>

</div>
</div> 

<?php endif; ?>
<?php wp_reset_query();?>
<div class="clearboth"></div>