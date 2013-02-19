<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $post, $woocommerce;

?>
<?php 
$placholder_image = get_bloginfo( 'stylesheet_directory' ) . '/images/placeholders/product_placeholder.png';
 ?>
<div class="images">

	<?php if ( has_post_thumbnail() ) : ?>

		<a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="zoom" rel="thumbnails" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>"><?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'w45_600x400_cropped' ) ) ?></a>

	<?php else : ?>

		<img src="<?php echo $placholder_image; ?>" alt="Placeholder" />

	<?php endif; ?>

	<?php do_action('woocommerce_product_thumbnails'); ?>

</div>


<div class="shadow_spacer hide">

<div class="share">
<h4 class="left c2">Share This</h4>
    <div style="max-height:20px;" class="left">
    <?php //if(function_exists('social_ring_show')){ social_ring_show();} ?>
</div>
</div>
</div>

<div class="p_time hide">
<h4 class="c2">Prep Time <span class="c1" style="">30min</span></h4>
</div>