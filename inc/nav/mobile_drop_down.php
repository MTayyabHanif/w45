<header id="header2">
<div class="container inside clearfix">
		<nav id="right">
		<?php $ttrust_logo = of_get_option('logo'); ?>
		<div id="logo">
		<?php if($ttrust_logo) : ?>				
			<h1 class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo $ttrust_logo; ?>" alt="<?php bloginfo('name'); ?>" /></a></h1>
		<?php else : ?>				
			<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>				
		<?php endif; ?>	
		</div>
	
	
		<div id="mainNav" class="right clearfix" >							
			<?php wp_nav_menu( array('menu_class' => 'sf-menu', 'theme_location' => 'mobile_menu', 'fallback_cb' => 'default_nav' )); ?>			
		</div>
		<nav>	
</div>
<div class="shadow_spacer"></div>

</header>
