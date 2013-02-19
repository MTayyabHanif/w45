<?php /*
Template Name: Store
*/ ?>
<?php get_header('shop'); ?>


<?php if(!is_front_page()):?>
<div id="pageHead" class="wrap ">
	<div class="container">
			
		<h1><?php the_title(); ?></h1>
			<?php $page_description = get_post_meta($post->ID, "_ttrust_page_description_value", true); ?>
			<?php if ($page_description) : ?>
			<p><?php echo $page_description; ?></p>
		<?php endif; ?>					
	</div>
</div>
<?php endif; ?>	


<div class="content wrap">
<div class="container inside clearfix">
			
			<?php while (have_posts()) : the_post(); ?>			    
				<div <?php post_class('clearfix'); ?>>						
					<?php the_content(); ?>
					
					



<div class="clearboth"></div>	
		
<!--/Pick’n Choose Your Own 6 -->
<div class="content wrap">
	<div class="container inside">
		<h2 >Pick’n Choose<span>(Create Your Own 6-pack)</span></h2>
		
		<?php
			$args = array( 'post_type' => 'product', 'posts_per_page' => 20, 'product_cat' => 'pick-n-choose'  );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

					<?php global $p; ?>
					<h2 style="display:none;"><?php the_title(); ?></h2>
						<div class="one_half">

						<div class="project2 small <?php echo $p; ?>" id="project-<?php echo $post->post_name;?>">
							<div class="inside">	

							<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
								<?php woocommerce_show_product_sale_flash( $post, $product ); ?></a>

								<!-- <span class="price"><?php //echo $product->get_price_html(); ?></span> -->					

							<?php woocommerce_template_single_add_to_cart(); ?>

							</div>
						</div>
			</div><!--one_half-->

					<div class="one_half last">
					<img class="alignleft size-full wp-image-603" title="PickNChoose_New_bags" src="http://www.gowaybetter.com/wbsnx3/assets/PickNChoose_New_bags.png" alt="">
					<h3 class="price"><?php echo $product->get_price_html(); ?></h3>	
			</div><!--one_half last-->


		<?php endwhile; ?>
	</div>
</div>
<div class="shadow_spacer"></div>
<div class="clearboth"></div>
<!--/Pick’n Choose Your Own 6 -->
		
		
		
<!--Utopia-->			
<div class="content wrap">
	<div class="container inside">
		<h2>Utopia Variety 6 Pack<span>(One of Each Flavor)</span></h2>

	
		<?php
			$args = array( 'post_type' => 'product', 'posts_per_page' => 20, 'product_cat' => 'other'  );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

					<?php global $p; ?>
					<h2 style="display:none;"><?php the_title(); ?></h2>
						<div class="one_half">

						<div class="project2 small <?php echo $p; ?>" id="project-<?php echo $post->post_name;?>">
							<div class="inside">	

							<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
								<?php woocommerce_show_product_sale_flash( $post, $product ); ?></a>

								<!-- <span class="price"><?php //echo $product->get_price_html(); ?></span> -->					

							<?php woocommerce_template_single_add_to_cart(); ?>

							</div>
						</div>
			</div>
			<!--one_half-->
			<div class="one_half last">
					<img class="alignleft size-full wp-image-603" title="PickNChoose_New_bags" src="http://www.gowaybetter.com/wbsnx3/assets/PickNChoose_New_bags.png" alt="">
					<h3 class="price"><?php echo $product->get_price_html(); ?></h3>	
			</div><!--one_half last-->

		<?php endwhile; ?>
</div>
</div>
<div class="shadow_spacer hide"></div>
<div class="clearboth"></div>
	
<!--Utopia-->		




<?php if(!is_front_page()):?>
<div class="content wrap">
<div class="container inside clearfix">
<article id="content" class="full grid">
<?php $thumb_preset = of_get_option('w45_thumb_preset'); ?>
<?php $home_project_count = intval(of_get_option('ttrust_home_project_count')); ?>
<?php if($home_project_count > 0) : ?>	
<section id="projects" class="full homeSection clearfix">		
<div class="shadow_spacer"></div>	

	<h3><span>5.5oz Case (6 Bags Per Box)</span></h3>		
	<span style="text-align:center; font-weight:bold; padding-bottom:30px; float:left; font-size:150%; width:100%;">If you order two or more cases of the single serve bags shipping is FREE!</span>
	<?php
	if(of_get_option('ttrust_home_project_type') == "featured") : //Show only featured projects 
		query_posts( array(
			'ignore_sticky_posts' => 1,
			//'meta_key' => '_ttrust_featured_value',
			'meta_value' => 'true',  

    		//'posts_per_page' => of_get_option('ttrust_home_project_count'),
    		'post_type' => of_get_option('w45_home_post_type')
    		
			));
	else:
		query_posts( array(
			'ignore_sticky_posts' => 1,		
			'product_cat' => '5-5oz',	  			
    		'posts_per_page' => of_get_option('ttrust_home_project_count'),
    		'post_type' => of_get_option('w45_home_post_type')
			));	
	endif;
	?>		
					
	<div class="thumbs clearfix ch-grid">			
		<?php  while (have_posts()) : the_post(); ?>

			<?php //get_template_part( 'part-project-thumb'); ?>
			<?php// get_template_part($thumb_preset); ?>
			<?php get_template_part( 'inc/thumbs/part-wbs_shop-thumb'); ?>
		<?php endwhile; ?>
		<?php wp_reset_query();	?>		
	</div>
</section>
<?php endif; ?>
</article>
</div>
</div>
<div class="clearboth"></div>
<?php endif; ?>



<?php if(!is_front_page()):?>
<div class="content wrap">
<div class="container inside clearfix">
<article id="content" class="full grid">
<?php $thumb_preset = of_get_option('w45_thumb_preset'); ?>
<?php $home_project_count = intval(of_get_option('ttrust_home_project_count')); ?>
<?php if($home_project_count > 0) : ?>	
<section id="projects" class="full homeSection clearfix">		
<div class="shadow_spacer"></div>	

	<h3><span>1.25oz Case (24 Single Serve Bags Per Box)</span></h3>		
	<span style="text-align:center; font-weight:bold; padding-bottom:30px; float:left; font-size:150%; width:100%;">If you order two or more cases of the single serve bags shipping is FREE!</span>
	<?php
	if(of_get_option('ttrust_home_project_type') == "featured") : //Show only featured projects 
		query_posts( array(
			'ignore_sticky_posts' => 1,
			//'meta_key' => '_ttrust_featured_value',
			'meta_value' => 'true',  

    		//'posts_per_page' => of_get_option('ttrust_home_project_count'),
    		'post_type' => of_get_option('w45_home_post_type')
    		
			));
	else:
		query_posts( array(
			'ignore_sticky_posts' => 1,		
			'product_cat' => '1-25oz',	  			
    		'posts_per_page' => of_get_option('ttrust_home_project_count'),
    		'post_type' => of_get_option('w45_home_post_type')
			));	
	endif;
	?>		
					
	<div class="thumbs clearfix ch-grid">			
		<?php  while (have_posts()) : the_post(); ?>

			<?php //get_template_part( 'part-project-thumb'); ?>
			<?php// get_template_part($thumb_preset); ?>
			<?php get_template_part( 'inc/thumbs/part-wbs_shop-thumb'); ?>
		<?php endwhile; ?>
		<?php wp_reset_query();	?>		
	</div>
</section>
<?php endif; ?>
</article>
</div>
</div>
<div class="clearboth"></div>
<?php endif; ?>
		

		
		
	

	
	
		
		

	<?php endwhile; ?>
		
		
	</div>
		
		
		
		<?php get_sidebar( 'product' ); ?>
		</div><!--main-->
		
		</div><!--container-->
		</div>
		
		
<!-- <div class="clearboth"></div>




<div style="width:100%; float:left; height:100px"></div>



<div class="bottom-spacer"></div>
<div class="clearboth"></div>

<em>Try our new single serve bags! They come in a case of 24, but with five great flavors it’s hard to choose which case.</em>

			
	 -->


<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>