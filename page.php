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
	
		<div class="container inside clearfix">
			<div class="two_third">
			<?php while (have_posts()) : the_post(); ?>			    
			   <div <?php post_class('clearfix'); ?>>						
					<?php the_content(); ?>				
			</div>
		</div>				
				<?php //comments_template('', true); ?>			
			<?php endwhile; ?>	
			<?php get_sidebar(); ?>		
			</div>		    	
		
	
</div>
	
<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>
