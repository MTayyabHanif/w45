
<header id="header" class="hideMobile">
<div class="inside ">
	
		<nav id="mainNav" class="left clearfix">
			<div class="center"	>					
			<?php wp_nav_menu( array('menu_class' => 'sf-menu', 'theme_location' => 'left', 'fallback_cb' => 'default_nav' )); ?>	
			
			</div>		
		</nav>	

							
		<?php $ttrust_logo = of_get_option('logo'); ?>
		<div id="logo">
		<?php if($ttrust_logo) : ?>				
			<h1 class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo $ttrust_logo; ?>" alt="<?php bloginfo('name'); ?>" /></a></h1>
		<?php else : ?>				
			<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>				
		<?php endif; ?>	
		</div>

		
		<nav style="float:right;" id="mainNav" class=" clearfix">							
			<?php wp_nav_menu( array('menu_class' => 'sf-menu', 'theme_location' => 'right', 'fallback_cb' => 'default_nav' )); ?>			
		
		</nav>	

</div>
</header>