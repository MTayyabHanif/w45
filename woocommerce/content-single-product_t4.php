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
<?php 
$placholder_image = get_bloginfo( 'template_directory' ) . '/images/placeholders/product_placeholder.png';
 ?>

<?php if ( has_post_thumbnail() ) : ?>

		<a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="zoom" rel="thumbnails" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>"><?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'w45_product_cropped' ) ) ?></a>

	<?php else : ?>

		<img src="<?php echo $placholder_image; ?>" alt="Placeholder" />

	<?php endif; ?>




<div class="shadow_spacer">

<div class="share">
<h4 class="left">Share This</h4>
<div style="max-height:20px;" class="left">    	
<?php woocommerce_get_template_part( 'inc/social_plugins/social_share_icons' ); ?>
</div>
</div>
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

	 	<button style="background-color: transparent" type="submit" class="single_add_to_cart_button button alt"><?php echo apply_filters('single_add_to_cart_text', __(' ', 'woocommerce'), $product->product_type); ?></button>

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

<?php the_content(); ?>	

</div>


<?php if(is_front_page()): ?>	
<div class="content wrap">
<div class="container inside clearfix">

<div class="tabs underlined hide-title cross-fade">
	<section>
		<h1>Directions</h1>											
			<?php the_content(); ?>	
	</section>

		<?php $what_u_need = get_post_meta($post->ID, "wpcf-what_u_need", true); ?>
		<?php if ($what_u_need != "") : ?>
		<section>
				<h1>What You Need</h1>
				<p><?php echo $what_u_need; ?></p>
		</section>
		<?php endif; ?>

<?php if(is_front_page()): ?>
		<?php $n_facts = get_post_meta($post->ID, "wpcf-nutrition", true); ?>
		<?php if ($n_facts != "") : ?>
		<section>
				<h1>Nutrition Facts</h1>
				<p><?php echo $n_facts; ?></p>

				
		</section>
		<?php endif; ?>
	<?php endif; ?>
	
		
	</div>	



	</div>
</div>
<?php endif; ?>









