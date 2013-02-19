<?php /*
Template Name: Home
*/ ?>
<?php get_header(); ?>



<?php if(!is_front_page()):?>
	<?php get_template_part( 'inc/touch_slider_image_text_horizontal' ); ?>
<?php endif; ?>

<?php if(!is_front_page()):?>
<article style="margin:0;" class="toggle-panel minimal title-plus-icon">
		<h1 style="text-align:center; background:#444">Click to View</h1>

	<div class="content wrap">
	<div class="container inside">
		<?php get_template_part( 'inc/sliders/full_royal_touch_h' ); ?>
	</div>

	<div class="shadow_spacer hide"></div>
	</div>
	<div class="clearboth"></div>
</article>
<?php endif; ?>



<?php if(!is_front_page()):?>
	<div class="content wrap">
	<div class="container inside">
		<?php get_template_part( 'inc/touch_slider_image_text' ); ?>
	</div>

	<div class="shadow_spacer"></div>
	</div>
	<div class="clearboth"></div>
<?php endif; ?>





<div id="home_content" class="content wrap ">
<div class="container inside clearfix">
<article id="content" class="full grid">
<?php while (have_posts()) : the_post(); ?>			    
			    <section <?php post_class('clearfix'); ?>>						
					<?php the_content(); ?>				
				</section>				
				<?php //comments_template('', true); ?>			
			<?php endwhile; ?>		
</article>
</div>
</div>
<div class="clearboth"></div>



<div class="content wrap">
<div class="container inside clearfix">
<article id="content" class="full grid">


<?php $featured_page_count = intval(of_get_option('ttrust_featured_pages_count')); ?>
<?php if($featured_page_count > 0) : ?>
<section id="featuredPages" class="full homeSection clearfix">			
	<h3 class="hide"><span><?php //echo of_get_option('ttrust_featured_pages_title'); ?></span></h3>		
	<?php
	query_posts( array(
		'ignore_sticky_posts' => 1,  
		'meta_key' => '_ttrust_featured_value',
		'meta_value' => 'true',  			
    	'posts_per_page' => $featured_page_count,
    	'post_type' => array(				
		'page'					
		)
	));
	?>
	<div class="thumbs clearfix">
	<?php while (have_posts()) : the_post(); ?>			    
		<?php get_template_part( 'part-page-thumb'); ?>
	<?php endwhile; ?>
	<?php wp_reset_query();	?>
	</div>
</section>
<?php endif; ?>

</article>
</div>
</div>
<div class="clearboth"></div>






<?php if(is_front_page()):?>
<div class="content wrap">
<div class="container inside clearfix">
<article id="content" class="full grid">
<?php $thumb_preset = of_get_option('w45_thumb_preset'); ?>
<?php $home_project_count = intval(of_get_option('ttrust_home_project_count')); ?>
<?php if($home_project_count > 0) : ?>	
<section id="projects" class="full homeSection clearfix">		
<div class="shadow_spacer"></div>	

	<h3><span><?php echo of_get_option('ttrust_recent_projects_title'); ?></span></h3>		
	<?php
	if(of_get_option('ttrust_home_project_type') == "featured") : //Show only featured projects 
		query_posts( array(
			'ignore_sticky_posts' => 1,
			'meta_key' => '_ttrust_featured_value',
			'meta_value' => 'true',    			
    		'posts_per_page' => of_get_option('ttrust_home_project_count'),
    		'post_type' => of_get_option('w45_home_post_type')
    		
			));
	else:
		query_posts( array(
			'ignore_sticky_posts' => 1,			  			
    		'posts_per_page' => of_get_option('ttrust_home_project_count'),
    		'post_type' => of_get_option('w45_home_post_type')
			));	
	endif;
	?>		
					
	<div class="thumbs clearfix ch-grid">			
		<?php  while (have_posts()) : the_post(); ?>

			<?php //get_template_part( 'part-project-thumb'); ?>
			<?php get_template_part($thumb_preset); ?>
			<?php //get_template_part( 'inc/thumbs/part-slide-thumb'); ?>
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



<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>