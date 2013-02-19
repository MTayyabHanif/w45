
<?php $ttrust_logo = of_get_option('logo'); ?>
<!-- Mobile Navagation -->
 <div id="modal">
    <a class="close_button" href="javascript:jQuery.pageslide.close()">X</a>
     <div class="logo-small"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo $ttrust_logo; ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
	<?php wp_nav_menu( array('menu_class' => 'sf-menu', 'theme_location' => 'main', 'fallback_cb' => 'default_nav' )); ?>	
</div>

<div class="wrap header">
<nav id="mainNavM" class="clearfix">	
	<a href="<?php bloginfo('url'); ?>"><?php// bloginfo('name'); ?><?php //the_title(); ?></a>	
	<a href="#modal" class="right slide_menu"><span class="menu-icon"></span></a>							
</nav>
</div>
<!-- Mobile Navagation -->
