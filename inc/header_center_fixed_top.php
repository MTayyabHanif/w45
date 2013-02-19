<div class="absolute_top_logo hideMobile">
<?php $ttrust_logo = of_get_option('logo'); ?>
	<div id="logo">
		<?php if($ttrust_logo) : ?>				
			<h1 class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo $ttrust_logo; ?>" alt="<?php bloginfo('name'); ?>" /></a></h1>
		<?php else : ?>				
			<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>				
		<?php endif; ?>	
	</div>
</div>


<!--TOP STRIP-->
	
	    <div id="top-strip" class="clearfix">
		<div class="before"></div>
	    	<div class="left">
	        	<p>Love Your Pet Healthy!</p>
	        </div>
	        <a href="#" id="scroll-top" class="scroll-to-top" title="Go to the top of the page?">&nbsp;</a>
	        <div class="right">
		<?php// echo get_the_social_widgets(); ?>
	        	<p><a href="#">Questions? ask Matilda</a></p>
	        </div>
	<div class="after"></div>
	    </div>
<!--/TOP STRIP-->

<header id="header" class="hideMobile">
<div class="inside ">
	<div id="mainNav" style="width:100%;">
	
		<nav  class="left clearfix">
			<div class="center"	>					
			<?php wp_nav_menu( array('menu_class' => 'sf-menu', 'theme_location' => 'left', 'fallback_cb' => 'default_nav' )); ?>	
			
			</div>		
		</nav>	

							
		

		
		<nav style="float:right;"  class="right clearfix">							
			<?php wp_nav_menu( array('menu_class' => 'sf-menu', 'theme_location' => 'right', 'fallback_cb' => 'default_nav' )); ?>			
		
		</nav>	
</div>
</div>
</header>