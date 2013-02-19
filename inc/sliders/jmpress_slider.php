<?php
query_posts( array('ignore_sticky_posts' => 1, 'posts_per_page' => 6,'post_type' => array('w45_slides')));
?>

 
<section id="jms-slideshow" class="jms-slideshow">

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

        <div class="step container" data-color="color-1" data-y="500" data-scale="0.4" data-rotate-x="30">
            <div class="jms-content">
                <?php if (current_user_can('administrator')): ?>
            <div class="edit_slide_button">
        <?php edit_post_link('Edit Slide &#9656;'); ?>
            </div>
        <?php endif; ?> 
            <div class="two_third">
                <h3><?php echo $slide_description; ?></h3>

                <a class="jms-link button" href="<?php echo $slide_button_url; ?>"><?php echo $slide_button_label; ?></a>

            </div>
            </div>
            <div class="two_third last" style="position:absolute; right:0; top:0">
            <img src="<?php echo $image_url; ?>" />
        </div>
        </div>
        
<?php endif; ?> 
<?php $i++; ?>          

<?php endwhile; ?>

</section>

<?php endif; ?>
<?php wp_reset_query();?>


<div class="clearboth"></div>

