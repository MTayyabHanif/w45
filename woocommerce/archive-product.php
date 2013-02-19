<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

get_header('shop'); ?>





<?php if(!is_front_page()):?>
<div id="pageHead" class="wrap ">
	<div class="container">
			
			<h1 class="page-title">
			<?php if ( is_search() ) : ?>
				<?php
					printf( __( 'Search Results: &ldquo;%s&rdquo;', 'woocommerce' ), get_search_query() );
					if ( get_query_var( 'paged' ) )
						printf( __( '&nbsp;&ndash; Page %s', 'woocommerce' ), get_query_var( 'paged' ) );
				?>
			<?php elseif ( is_tax() ) : ?>
				<?php echo single_term_title( "", false ); ?>
			<?php else : ?>
				<?php
					$shop_page = get_post( woocommerce_get_page_id( 'shop' ) );

					echo apply_filters( 'the_title', ( $shop_page_title = get_option( 'woocommerce_shop_page_title' ) ) ? $shop_page_title : $shop_page->post_title );
				?>
			<?php endif; ?>
		</h1>

			<?php $page_description = get_post_meta($post->ID, "_ttrust_page_description_value", true); ?>
			<?php if ($page_description) : ?>
				<p><?php echo $page_description; ?></p>
			<?php endif; ?>					
	</div>
</div>
<?php endif; ?>	




<div class="content wrap">
<div class="container inside clearfix">
<article id="content" class="full grid">
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action('woocommerce_before_main_content');
	?>

		
		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( is_tax() ) : ?>
			<?php do_action( 'woocommerce_taxonomy_archive_description' ); ?>
		<?php elseif ( ! empty( $shop_page ) && is_object( $shop_page ) ) : ?>
			<?php do_action( 'woocommerce_product_archive_description', $shop_page ); ?>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>

			<?php do_action('woocommerce_before_shop_loop'); ?>

			<!-- <ul class="products"> -->
			<div class="thumbs clearfix ch-grid">

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php //woocommerce_get_template_part( 'content', 'product' ); ?>
					<?php //woocommerce_get_template_part( 'content', 'product_slide' ); ?>

					<?php $thumb_preset = of_get_option('w45_thumb_preset'); ?>
					<?php get_template_part($thumb_preset); ?>

				<?php endwhile; // end of the loop. ?>
			</div>
			<!-- </ul> -->

			<?php do_action('woocommerce_after_shop_loop'); ?>

		<?php else : ?>

			<?php if ( ! woocommerce_product_subcategories( array( 'before' => '<ul class="products">', 'after' => '</ul>' ) ) ) : ?>

				<p><?php _e( 'No products found which match your selection.', 'woocommerce' ); ?></p>

			<?php endif; ?>

		<?php endif; ?>

		<div class="clear"></div>

		<?php
			/**
			 * woocommerce_pagination hook
			 *
			 * @hooked woocommerce_pagination - 10
			 * @hooked woocommerce_catalog_ordering - 20
			 */
			do_action( 'woocommerce_pagination' );
		?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action('woocommerce_after_main_content');
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action('woocommerce_sidebar');
	?>
</article>
</div>
</div>

<?php //get_footer('shop'); ?>
<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>

