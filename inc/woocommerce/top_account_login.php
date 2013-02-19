<!-- Account Login -->
<div class="wrap hideMobile">
<div class="container " style="position:relative">
<?php if ( is_user_logged_in() ) { ?>
	<div class="woo_login" style="top:0; right:0; position:absolute; z-index:999">
 	<a  href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a>
 </div>
 <?php } 
 else { ?>
 <div class="woo_login" style="top:0; right:0; position:absolute; z-index:999">
 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a>
</div>
 <?php } ?>
</div>
</div>
<!-- Account Login -->