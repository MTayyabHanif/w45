<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
global $post, $product;
?>
<div id="product_pageHead" class="border-bottom">  
<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?><span itemprop="price" class="price"><?php echo $product->get_price_html(); ?></span></h1>
</div>