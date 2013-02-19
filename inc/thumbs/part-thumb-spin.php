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

global $woocommerce, $product;
?>

<?php 
$placholder_image = get_bloginfo( 'stylesheet_directory' ) . '/images/placeholders/product_placeholder.png';
 ?>

<div class="project small <?php echo $p; ?> <?php  echo $o; ?> <?php  echo $last; ?>" id="project-<?php echo $post->post_name;?>">
	
<li>
						<div class="ch-item ch-img-1">				
							<div style="background-image: url(<?php //echo $r_thumb; ?>)" class="ch-info-wrap">
								<div class="ch-info">
									
										<!-- <p><?php the_title(); ?><a class="hide" href="http://drbl.in/ewUW">15min</a></p>

										<div class="time">
										
										<div class="time_icon"></div>

										<div class="time_text">
											<span>15min</span>
										</div>

										</div> -->


									<?php if($image_url) : ?>		
									<div style="background-image: url(<?php echo $image_url; ?>)" class="ch-info-front ch-img-1"></div>
									<div style="background-image: url(<?php echo $image_url; ?>)" class="ch-info-front2 ch-img-1"></div>
									<?php else : ?>	
									<div style="background-image: url(<?php echo $placholder_image; ?>)" class="ch-info-front ch-img-1"></div>
									<div style="background-image: url(<?php echo $placholder_image; ?>)" class="ch-info-front2 ch-img-1"></div>
									<?php endif; ?>	

<div class="ch-info-back2">
										<!-- <h3><?php //the_title(); ?></h3> -->
										<div class="order_now"></div>
										<div class="add_to_cart"></div>
										<div class="clearboth"></div>
										<p><?php the_title(); ?></p>

										<div class="time">
										
										<div class="time_icon">
											
										</div>

										<div class="time_text">
											<span>15min</span>
										</div>

										</div>



									</div>	










									<div class="ch-info-back">
										<!-- <h3><?php //the_title(); ?></h3> -->
										<form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="cart" method="post" enctype='multipart/form-data'>
										
										<button type="submit" class="order_now"><?php echo apply_filters('single_add_to_cart_text', __('', 'woocommerce'), $product->product_type); ?></button>
										

										</form>
										<a href="<?php the_permalink(); ?>"><div class="add_to_cart"></div></a>
										<div class="clearboth"></div>

										<a class="hide" href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>

										<div class="time">
										
										<div class="time_icon">
											
										</div>

										<div class="time_text">
											<span>15min</span>
										</div>

										</div>
										


									</div>	
								</div>
							</div>
						</div>

					</li>

</div>





<div class="hide project small <?php echo $p; ?>" id="project-<?php echo $post->post_name;?>">
	<div class="inside">
	<a href="<?php the_permalink(); ?>" rel="bookmark" >	
		<?php //the_post_thumbnail("ttrust_one_third_cropped", array('class' => 'thumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
		
		<img src="http://localhost/prefare/assets/2012/11/f99b27.png">

		<span class="title"><span><?php the_title(); ?></span></span>
	</a>
	</div>																																
</div>