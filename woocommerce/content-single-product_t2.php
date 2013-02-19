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

	

<div id="para-wrapper" class="two_third">
	

	<?php $parallax_middle = get_post_meta($post->ID, "wpcf-parallax-middle", true); ?>
	<?php $parallax_foreground = get_post_meta($post->ID, "wpcf-parallax-foreground", true); ?>
	<?php $parallax_background = get_post_meta($post->ID, "wpcf-parallax-background", true); ?>
	<?php if ($parallax_background) : ?>
	
	<img src="<?php echo $parallax_background; ?>" class="para_back" style="top: -13px; left: 4px;">
	<?php endif; ?>	
	
	
	<?php if ($parallax_middle) : ?>
    <img src="<?php echo $parallax_middle; ?>" class="para_front" style="top: -9px; left: 4px;">
	<?php endif; ?>	

	
	<?php if ($parallax_foreground) : ?>
	<div style="padding-bottom:25px; opacity:0;">	
		<img src="<?php echo $parallax_foreground; ?>">
	</div>
    <img src="<?php echo $parallax_foreground; ?>" class="para_middle" style="top: -22px; left: 7px;" >    
	<?php endif; ?>	
	

	<?php
		/**
		 * woocommerce_show_product_images hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		//do_action( 'woocommerce_before_single_product_summary' );
	?>
</div>

<div id="product_summary" class="one_third last">

			<?php $color_title = get_post_meta($post->ID, "wpcf-color_title", true); ?>
	<?php if ($color_title) : ?>
    <h4 class="<?php echo $post->post_name;?>"><?php echo $color_title; ?></h4>
	<?php endif; ?>
	
	<h1><?php echo get_the_title(); ?></h1>
	

	
	<?php $product_summary = get_post_meta($post->ID, "wpcf-product_summary", true); ?>
	<?php if ($product_summary) : ?>
    <?php echo $product_summary; ?>
	<?php endif; ?>
	
	<?php $food_logos = get_post_meta($post->ID, "wpcf-food_logos", true); ?>
	<?php if ($food_logos == 1) : ?>
    <?php //echo $food_logos; ?>
	<div style="width:60%">
	<img src="http://www.gowaybetter.com/wbsnx3/assets/4logos.gif" alt="" title="4logos" width="150" height="112" class="alignleft size-thumbnail wp-image-997" />
	</div>
	<?php endif; ?>
	
	<div style="margin-top:20px;">
	<a class="button" href="/store">Shop Now →</a>
	</div>

</div><!-- .summary -->


<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */

		//do_action( 'woocommerce_after_single_product_summary' );
?>


</div><!-- #product-<?php the_ID(); ?> -->


