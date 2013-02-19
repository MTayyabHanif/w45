
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



<header id="header" class="hideMobile">
<div class="inside clearfix">

<div class="header_overlay"></div>
<nav class="center_logo_top">
<div id="mainNav" class="clearfix" >							
<?php
wp_nav_menu( array(
	'theme_location'  => 'main',
 'menu'            => 'main',
 'container' => false,
 'menu_class' => 'sf-menu',
 'echo' => true,
 'before' => '',
 'after' => '',
 'link_before' => '',
 'link_after' => '',
 'depth' => 0,
 'walker' => new w45_description_walker())
 );

?>		
</div>
<nav>	
		
</div>
</header>

