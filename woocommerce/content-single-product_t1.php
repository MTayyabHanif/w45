<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="one_half">
	<?php
		/**
		 * woocommerce_show_product_images hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		//do_action( 'woocommerce_before_single_product_summary' );
	?>


<?php if ( has_post_thumbnail() ) : ?>

		<a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="zoom" rel="thumbnails" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>"><?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'w45_product_cropped' ) ) ?></a>

	<?php else : ?>

		<img src="<?php echo $placholder_image; ?>" alt="Placeholder" />

	<?php endif; ?>




<div style="margin-top:3em" class="shadow_spacer">

<div class="share">
<h4 class="left c2">Share This</h4>
    <div style="max-height:20px;" class="left">
    	
    	
<div id="socialIcons" class="socialIcons">


<?php //the_title(); ?>
<?php //the_permalink(); ?>
<?php
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, 'w45_square_thumb_350', false);
$image_url = $image_url[0];
?>

	<ul>
		
		<a target="_blank" href="http://www.facebook.com/share.php?u=<?php print(urlencode(get_permalink())); ?>&title=<?php print(urlencode(the_title())); ?>"><li class="facebook_icon"></li></a>
		

		
		<a target="_blank" href="http://twitter.com/home?status=<?php print(urlencode(the_title())); ?>+<?php the_permalink(); ?>"><li class="twitter_icon"></li></a>
		

		
		<a target="_blank" href="http://www.tumblr.com/share?v=3&u=<?php print(urlencode(get_permalink())); ?>&t=<?php print(urlencode(the_title())); ?>"><li class="tumblr_icon"></li></a>
		

		
		<a target="_blank" href="https://plus.google.com/share?url=<?php print(urlencode(get_permalink())); ?>"><li class="google_icon"></li></a>
		

		
		<a class ="hide" href="#"><li class="linkedin_icon"></li></a>
		

		
		<a class ="hide" href="#"><li class="youtube_icon"></li></a>
		

		
		<a target="_blank" href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $image_url; ?>&url=<?php print(urlencode(get_permalink())); ?>&is_video=false&description=<?php print(urlencode(the_title())); ?>"><li class="pinterest_icon"></li></a>
		
		<a target="_blank" class ="hide" href="http://www.stumbleupon.com/submit?url=[URL]&title=[TITLE]"><li class="stumbleupon_icon"></li></a>

		
		<a target="_blank" class ="hide" href="#"><li class="vimeo_icon"></li></a>
		

		
		<a class ="hide"  href="#"><li class="instagram_icon"></li></a>
		
	</ul>
</div>

    <?php //if(function_exists('social_ring_show')){ social_ring_show();} ?>
</div>
</div>
</div>

<?php $cook_time = get_post_meta($post->ID, "wpcf-time", true); ?>
<div class="p_time">
<h4 class="c2">Prep Time <span class="c1" style=""><?php echo $cook_time; ?>min</span></h4>
</div>




</div>

<div id="product_summary" class="one_half last" style="margin-top:0;">

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			//do_action( 'woocommerce_single_product_summary' );
		?>

<?php global $post, $product; ?>
<div id="product_pageHead" class="border-bottom">  
<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?><span itemprop="price" class="price"><?php echo $product->get_price_html(); ?></span></h1>
</div>

<div itemprop="description" class="page_description">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>

<?php

global $woocommerce, $product;

if ( ! $product->is_purchasable() ) return;
?>

<?php
	// Availability
	$availability = $product->get_availability();

	if ($availability['availability']) :
		echo apply_filters( 'woocommerce_stock_html', '<p class="stock '.$availability['class'].'">'.$availability['availability'].'</p>', $availability['availability'] );
    endif;
?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action('woocommerce_before_add_to_cart_form'); ?>

	<form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="cart" method="post" enctype='multipart/form-data'>

	 	<?php do_action('woocommerce_before_add_to_cart_button'); ?>

	 	<?php
	 		if ( ! $product->is_sold_individually() )
	 			woocommerce_quantity_input( array( 'min_value' => 1, 'max_value' => $product->backorders_allowed() ? '' : $product->get_stock_quantity() ) );
	 	?>

	 	<button style="background-color: transparent" type="submit" class="single_add_to_cart_button button alt"><?php echo apply_filters('single_add_to_cart_text', __('Add to cart', 'woocommerce'), $product->product_type); ?></button>

	 	<?php do_action('woocommerce_after_add_to_cart_button'); ?>

	 	<button type="submit" class="single_buy_now_button hide button alt"><?php echo apply_filters('single_add_to_cart_text', __('Add to cart', 'woocommerce'), $product->product_type); ?></button>

	 	<?php do_action('woocommerce_after_add_to_cart_button'); ?>

	</form>

	<?php do_action('woocommerce_after_add_to_cart_form'); ?>


	

<?php endif; ?>





<?php woocommerce_get_template_part( 'inc/part-ingredients' ); ?>

</div><!-- .summary -->


<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>


<div class="content wrap">
<div class="container inside clearfix">


	

											
					<?php the_content(); ?>						

				</div>
			</div>
