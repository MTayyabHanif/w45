<?php global $i; ?>
<?php global $t; ?>
<?php global $b; ?>
<?
$t++;
$b++;

if ($b == 3 ){
	$last = "last";
	$b = 0;
} else{
	$last = " ";
}



if ($i == NULL ){
	$i = 1;
	$t = 0;
} else {
	$i = $i;
}



if ($i > 3 ){
	$i = 1;
} else {
	$i = $i;
}

if ($t % 2 == 0 ){
	$o = "odd";
} else{
	$o = "even";
}



?>








<?php global $p; ?>
<?php $r_thumb = get_post_meta($post->ID, "wpcf-thumb_image", true); ?>
<?php $r_time = get_post_meta($post->ID, "wpcf-time", true); ?>
<?php
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, 'w45_square_thumb_350', false);
$image_url = $image_url[0];
$placholder_image = get_bloginfo( 'template_directory' ) . '/images/placeholders/product_placeholder.png';
?>

<div class="project small <?php echo $p; ?> <?php  echo $o; ?> <?php  echo $last; ?>" id="project-<?php echo $post->post_name;?>">
<a href="<?php the_permalink(); ?>">
				<div  class="view view-first">
					

                    <?php if($image_url) : ?>		
									<div class="mask_front" style="background-image: url(<?php echo $image_url; ?>)" >
										
											<!-- <div class="mask"> -->
										
											
										<!-- <a href="#" class="info button">Read More</a> -->
									<!-- </div> -->
									</div>
									<h2><?php the_title(); ?></h2>
									</div>
								
									
									<?php else : ?>	
					
									<div class="mask_front" style="background-image: url(<?php echo $placholder_image; ?>)" >
										
									</div>
									<h2><?php the_title(); ?></h2>
									</div>
                <?php endif; ?>
          </a>      
</div>