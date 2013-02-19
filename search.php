<?php get_header(); ?>
<div id="pageHead" class="wrap ">
	<div class="container">
		<h1><?php _e('Search Results', 'themetrust'); ?></h1>
</div>
</div>			 
	<div  class="content wrap">
	
		<div class="container inside clearfix">
			<div class="two_third">
		<?php $c=0; $post_count = $wp_query->post_count; ?>	
		<?php while (have_posts()) : the_post(); ?>
			<?php $c++; ?>				
			<div <?php post_class('post'); ?> >																				
				<div class="inside">
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_title(); ?></a></h1>	
					<?php the_excerpt('',TRUE); ?>
								
					<?php $project_notes = get_post_meta($post->ID, "_ttrust_notes_value", true); ?>
					<?php echo wpautop($project_notes); ?>
				</div>																									
			</div>				
			
		<?php endwhile; ?>
		<?php get_template_part( 'part-pagination'); ?>		    	
	</div>
		
	<?php get_sidebar(); ?>		
			</div>		    	
		
	
</div>
	
<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>