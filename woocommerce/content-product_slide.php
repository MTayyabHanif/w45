<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibilty
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;
?>
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
$placholder_image = get_bloginfo( 'stylesheet_directory' ) . '/images/placeholders/product_placeholder.png';
?>

<div class="project small <?php echo $p; ?> <?php  echo $o; ?> <?php  echo $last; ?>" id="project-<?php echo $post->post_name;?>">

				<div  class="view view-fifth">
					

                    <?php if($image_url) : ?>		
									<div style="background-image: url(<?php echo $image_url; ?>)" class="mask_front">
										<div class="hide mask_front_overlay">
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

								<a href="<?php the_permalink(); ?>">
								<div class="mask_back" style="background-image: url(<?php echo $image_url; ?>)" >

             						<div  class="hide mask_back_overlay">
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
									<h3 style="background:#222; color:#fff"><?php the_title(); ?></h3>
								</div>
                  				</a>
									
									<?php else : ?>	
					<div style="background-image: url(<?php echo $placholder_image; ?>)" class="mask_front"><div class="mask_front_overlay"></div></div>

								

                    <div class="mask_back" style="background-image: url(<?php echo $placholder_image; ?>)" >

             					<div  class="hide mask_back_overlay">
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
								<h2><?php the_title(); ?></h2>
                    </div>
                <?php endif; ?>
                </div>
</div>