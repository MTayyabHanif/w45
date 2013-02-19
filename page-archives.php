<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
		
		<div id="pageHead">
			<h1><?php the_title(); ?></h1>
		</div>
							 
		<div id="content" class="twoThirds clearfix">
			<h2><?php _e('Archives by Month:', 'themetrust'); ?></h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
			<h2><?php _e('Archives by Subject:', 'themetrust'); ?></h2>
			<ul>
				<?php wp_list_categories(); ?>
			</ul>			    	
		</div>
				
		<?php get_sidebar(); ?>
		
<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>
