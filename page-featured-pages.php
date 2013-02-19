<?php /*
Template Name: Featured Pages
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
		<?php get_template_part( 'part-page-thumb-links'); ?>
	<?php endwhile; ?>
	<?php wp_reset_query();	?>
	</div>
</section>
<?php endif; ?>

</article>
</div>
</div>

<div class="content wrap ">
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



<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>