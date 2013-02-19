

<div id="big_footer_nav" class="hideMobile">
		<nav class="center_logo_top">
		
	
		<div id="mainNav" class="clearfix" >							
			<?php //wp_nav_menu( array('menu_class' => 'sf-menu', 'theme_location' => 'main', 'fallback_cb' => 'default_nav' )); ?>	


			<?php

// $defaults = array(
// 	'theme_location'  => 'main',
// 	'menu'            => 'main',
// 	'container'       => 'div',
// 	//'container_class' => '',
// 	//'container_id'    => '',
// 	'menu_class'      => 'sf-menu',
// 	//'menu_id'         => '',
// 	//'echo'            => true,
// 	'fallback_cb'     => 'default_nav',
// 	//'before'          => '<h5></h5>',
// 	//'after'           => '',
// 	//'link_before'     => '',
// 	//'link_after'      => '',
// 	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
// 	//'depth'           => 0,
// 	'walker' => new w45_description_walker())
// );

// wp_nav_menu( $defaults );


wp_nav_menu( array(
'theme_location'  => 'big_footer',
 'menu'            => 'big_footer',
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

