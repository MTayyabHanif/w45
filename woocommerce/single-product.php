<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

get_header('shop'); ?>


<?php if(!is_front_page()):?>

<div class="shadow_spacer hide"></div>
<div id="pageHead" class="wrap hide">
	<div class="container">
			
			<h1><?php the_title(); ?></h1>
			<?php $page_description = get_post_meta($post->ID, "_ttrust_page_description_value", true); ?>
			<?php if ($page_description) : ?>
				<p><?php echo $page_description; ?></p>
			<?php endif; ?>					
	</div>
</div>
<?php endif; ?>	


<div class="content wrap">
<div class="container inside clearfix" style="position:relative">
	
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action('woocommerce_before_main_content');
	?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php $single_product_template = of_get_option('w45_single_product_page_template'); ?>

			<?php woocommerce_get_template_part( 'content', $single_product_template ); ?>
			<?php// woocommerce_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action('woocommerce_after_main_content');
	?>
</div>
</div>


<div class="content wrap hide">
<div class="container inside clearfix">


	

											
					<?php the_content(); ?>						

				</div>
			</div>




<div class="shadow_spacer hide"></div>
<div class="content wrap">
<div class="container inside clearfix">




			
		<?php $product_ingredients = get_post_meta($post->ID, "wpcf-product_ingredients", true); ?>
		<?php if ($product_ingredients) : ?>
				<div class="ingredients">
	    <?php echo $product_ingredients; ?>
				</div>
		<?php endif; ?>
		
		<?php get_template_part( 'inc/thumbs/part-bowls'); ?>	

		<?php //get_template_part( 'inc/thumbs/part-thumb-slide-right'); ?>	



</div>
</div>
<div class="clearboth"></div>


<div style="opacity:0;" class="shadow_spacer hide"></div>


<?php// get_footer('shop'); ?>
<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>