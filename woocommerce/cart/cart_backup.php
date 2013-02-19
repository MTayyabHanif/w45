<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce;
?>

<?php $woocommerce->show_messages(); ?>
<!-- <div class="one_half">
 --><form action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post">
<?php do_action( 'woocommerce_before_cart_table' ); ?>
<div class="two_third2">
<table class="shop_table2 cart2 one_half2 footable" cellspacing="0">
	<thead>
		<tr>
			<th class="product-remove hide" data-class="expand">&nbsp;</th>
			<th class="product-thumbnail" data-hide=""><?php _e('Items', 'woocommerce'); ?></th>
			<th class="product-name">&nbsp;</th>
			<th class="product-price"><?php _e('Price', 'woocommerce'); ?></th>
			<th class="product-quantity" data-hide="phone"><?php _e('Quantity', 'woocommerce'); ?></th>
			<th class="product-subtotal hide"><?php _e('Total', 'woocommerce'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
			foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
				if ( $_product->exists() && $values['quantity'] > 0 ) {
					?>
					<tr class = "<?php echo esc_attr( apply_filters('woocommerce_cart_table_item_class', 'cart_table_item', $values, $cart_item_key ) ); ?>">
						<!-- Remove from cart link -->
						<td class="product-remove hide">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'woocommerce') ), $cart_item_key );
							?>
						</td>

						<!-- The thumbnail -->
						<td class="product-thumbnail">
							<?php
								$thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail', $_product->get_image(), $values, $cart_item_key );
								printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), $thumbnail );
							?>
						</td>

						<!-- Product Name -->
						<td class="product-name">
							<h3>
							<?php
								if ( ! $_product->is_visible() || ( $_product instanceof WC_Product_Variation && ! $_product->parent_is_visible() ) )
									echo apply_filters( 'woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key );
								else
									printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), apply_filters('woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key ) );

								// Meta data
								echo $woocommerce->cart->get_item_data( $values );

                   				// Backorder notification
                   				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $values['quantity'] ) )
                   					echo '<p class="backorder_notification">' . __('Available on backorder', 'woocommerce') . '</p>';
							?>
						</h3>
							<span>
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">Remove</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __('Remove this item', 'woocommerce') ), $cart_item_key );
							?>
							</span>
						</td>

						<!-- Product price -->
						<td class="product-price">
							<h3>
							<?php
								$product_price = get_option('woocommerce_display_cart_prices_excluding_tax') == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();

								echo apply_filters('woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $values, $cart_item_key );
							?>
						</h3>
						</td>

						<!-- Quantity inputs -->
						<td class="product-quantity">
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = '1';
								} else {
									$data_min = apply_filters( 'woocommerce_cart_item_data_min', '', $_product );
									$data_max = ( $_product->backorders_allowed() ) ? '' : $_product->get_stock_quantity();
									$data_max = apply_filters( 'woocommerce_cart_item_data_max', $data_max, $_product );

									$product_quantity = sprintf( '<div class="quantity"><input name="cart[%s][qty]" data-min="%s" data-max="%s" value="%s" size="4" title="Qty" class="input-text qty text" maxlength="12" /></div>', $cart_item_key, $data_min, $data_max, esc_attr( $values['quantity'] ) );
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
							?>
						</td>

						<!-- Product subtotal -->
						<td class="product-subtotal hide">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', $woocommerce->cart->get_product_subtotal( $_product, $values['quantity'] ), $values, $cart_item_key );
							?>
						</td>
					</tr>
					<?php
				}
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>
		

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>

<table class="footable " cellspacing="0">
	<thead>
		<tr>
			
			<th class="coupon" style="width:100%;">
				<?php if ( get_option( 'woocommerce_enable_coupons' ) == 'yes' && get_option( 'woocommerce_enable_coupon_form_on_cart' ) == 'yes') { ?>

						
						<input type="submit" class="button right" name="apply_coupon" value="<?php _e('Apply Coupon', 'woocommerce'); ?>" />
						<input type="text" name="coupon_code" class="input-text2 right" id="coupon_code2" value="" /> 

						<?php do_action('woocommerce_cart_coupon'); ?>

					
				<?php } ?>
			</th>
			
	</tr>
	</thead>
</table>


<div class="one_third right hide">
<?php if ( get_option( 'woocommerce_enable_coupons' ) == 'yes' && get_option( 'woocommerce_enable_coupon_form_on_cart' ) == 'yes') { ?>

						<input type="text" name="coupon_code" class="input-text2 right" id="coupon_code2" value="" /> 
						<input type="submit" class="button right" name="apply_coupon" value="<?php _e('Apply Coupon', 'woocommerce'); ?>" />

						<?php do_action('woocommerce_cart_coupon'); ?>

					
				<?php } ?>
</div>


			<!-- Product subtotal -->
						
						<div class="cart-sub-total">
							<h3><strong><?php _e('Subtotal:', 'woocommerce'); ?></strong> <?php echo $woocommerce->cart->get_cart_subtotal(); ?></h3>
						</div>

						<?php woocommerce_cart_totals(); ?>



				<input type="submit" class="button" name="update_cart" value="<?php _e('Update Cart', 'woocommerce'); ?>" /> <input type="submit" class="checkout-button button alt" name="proceed" value="<?php _e('Proceed to Checkout &rarr;', 'woocommerce'); ?>" />

				<?php do_action('woocommerce_proceed_to_checkout'); ?>

				<?php $woocommerce->nonce_field('cart') ?>


</div>

<div class="one_third last hide">
<?php //woocommerce_cart_totals(); ?>
<table>	
<tr>
			<td colspan="6" class="actions" style="text-align:right;">

				<input type="submit" class="button" name="update_cart" value="<?php _e('Update Cart', 'woocommerce'); ?>" /> <input type="submit" class="checkout-button button alt" name="proceed" value="<?php _e('Proceed to Checkout &rarr;', 'woocommerce'); ?>" />

				<?php do_action('woocommerce_proceed_to_checkout'); ?>

				<?php $woocommerce->nonce_field('cart') ?>
			</td>
		</tr>
</table>
<?php woocommerce_shipping_calculator(); ?>
</div>

<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
<!-- </div>
<div class="one_half last"> -->
<div class="cart-collaterals">

	<?php do_action('woocommerce_cart_collaterals'); ?>

	<?php// woocommerce_cart_totals(); ?>

	<?php woocommerce_shipping_calculator(); ?>

</div>
<!-- </div> -->