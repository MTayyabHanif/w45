<?php get_header(); ?>

		<div id="pageHead">
			<h1><?php _e('Links', 'themetrust'); ?></h1>
		</div>
						 
		<div id="content" class="twoThirds clearfix">			    
			<div class="post">					
				<ul>
					<?php get_links_list(); ?>
				</ul>				
			</div>						    	
		</div>		
		<?php get_sidebar(); ?>
	
<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>
