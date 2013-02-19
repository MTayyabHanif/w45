<?php 
global $p;
global $product;
 ?>
<div class="project small ajx <?php echo $p; ?>" id="project-<?php echo $post->post_name;?>">
	<div class="inside">
	
		<?php the_post_thumbnail("ttrust_350_cropped", array('class' => 'thumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
		<span class="title <?php echo $post->post_name; ?>"><span class="hide"><?php the_title(); ?></span></span>
	
	</div>	
	<h4><?php the_title(); ?></h4>		
	<h2 class="price" style="top:0; z-index:999; background:#a8a190; width:50%; border:solid 2px #383532;"><?php echo $product->get_price_html(); ?></h2>
	<?php woocommerce_template_single_add_to_cart(); ?>		
	<div class="shadow_spacer" style="opacity:0;"></div>																											
</div>


