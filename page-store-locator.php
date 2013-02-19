<?php /*
Template Name: Store Locator
*/ ?>
<?php get_header(); ?>	
		
	


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

<div  class="content wrap">
	
		<div id="thumbWrapper" class="container inside clearfix">
				 
		<section id="content" class="fullProjects clearfix full grid">	
	
	
		<?php while (have_posts()) : the_post(); ?>			    
			<div <?php post_class('clearfix'); ?>>		
				<div class="one_half">
				<?php //the_content(); ?>	
				</div>	
				<!-- <div class="one_half last"> -->
				<div id="projects" class="clearfix">				
					<?php
					query_posts( array(
						'ignore_sticky_posts' => 1,  
						'orderby' => title,
						'order' => ASC,
									
				    	'posts_per_page' => 200,
				    	'post_type' => array(				
						'distributors'					
						)
					));
					?>
				<div class="thumbs2 masonry2">
					<?php while (have_posts()) : the_post(); ?>			    
					
					<?php get_template_part( 'part-100-thumb'); ?>
					
					<?php endwhile; ?>
					<?php wp_reset_query();	?>
				</div>
				<!-- </div>	 -->
				</div>	
			</div>				
			<?php// comments_template('', true); ?>			
		<?php endwhile; ?>					    	
		</section>
		</div>
		</div>
		
<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>