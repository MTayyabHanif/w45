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

				<div  class="view view-fifth">
					

                    <?php if($image_url) : ?>		
									<div style="background-image: url(<?php echo $image_url; ?>)" class="mask_front">
										<div class="mask_front_overlay">
											<div class="order_now"></div>
											<div class="add_to_cart"></div>
											
											<p><?php the_title(); ?></p>

											<div class="time">
												<div class="time_icon"></div>

												<div class="time_text">
												<span>15min</span>
												</div>

											</div>
										</div>
									</div>


								<div class="mask_back" style="background-image: url(<?php echo $image_url; ?>)" >

             						<div  class="mask_back_overlay">
										<!-- <h3><?php //the_title(); ?></h3> -->
											<div class="order_now"></div>
											<div class="add_to_cart"></div>
										
											<p><?php the_title(); ?></p>

										<div class="time">
										
											<div class="time_icon"></div>

											<div class="time_text">
											<span>15min</span>
											</div>

										</div>
									
									</div>	
								</div>
                   
									
									<?php else : ?>	
					<div style="background-image: url(<?php echo $placholder_image; ?>)" class="mask_front"><div class="mask_front_overlay"></div></div>

								

                    <div class="mask_back" style="background-image: url(<?php echo $placholder_image; ?>)" >

             					<div  class="mask_back_overlay">
										<!-- <h3><?php //the_title(); ?></h3> -->
										<div class="order_now"></div>
										<div class="add_to_cart"></div>
										
										<p><?php the_title(); ?></p>

									<div class="time">
										
										<div class="time_icon"></div>

										<div class="time_text">
											<span>15min</span>
										</div>

									</div>
								</div>	
                    </div>
                <?php endif; ?>
                </div>
</div>