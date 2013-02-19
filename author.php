<?php get_header(); ?>
		
<div id="pageHead" class="wrap">
	<div class="container">
			<?php global $wp_query; $current_author = $wp_query->get_queried_object(); ?>
			<h1><?php _e('Author:', 'themetrust'); ?> <?php echo $current_author->display_name; ?></h1>
		</div>
</div>		
		
<div  class="content wrap">
<div class="container inside clearfix">
<div  class="two_third clearfix">	

			<?php $c=0; $post_count = $wp_query->post_count; ?>	
			<?php while (have_posts()) : the_post(); ?>
			
			<?php $c++; ?>		
			    
				<article <?php post_class(); ?>>					
																			
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_title(); ?></a></h1>
						<div class="meta clearfix">
							<?php $post_show_author = of_get_option('ttrust_post_show_author'); ?>
							<?php $post_show_date = of_get_option('ttrust_post_show_date'); ?>
							<?php $post_show_category = of_get_option('ttrust_post_show_category'); ?>
							<?php $post_show_comments = of_get_option('ttrust_post_show_comments'); ?>
										
							<?php if($post_show_author || $post_show_date || $post_show_category){ _e('Posted ', 'themetrust'); } ?>					
							<?php if($post_show_author) { _e('by ', 'themetrust'); the_author_posts_link(); }?>
							<?php if($post_show_date) { _e('on', 'themetrust'); ?> <?php the_time( 'M j, Y' ); } ?>
							<?php if($post_show_category) { _e('in', 'themetrust'); ?> <?php the_category(', '); } ?>
							<?php if(($post_show_author || $post_show_date || $post_show_category) && $post_show_comments){ echo " | "; } ?>
							
							<?php if($post_show_comments) : ?>
								<a href="<?php comments_link(); ?>"><?php comments_number(__('No Comments', 'themetrust'), __('One Comment', 'themetrust'), __('% Comments', 'themetrust')); ?></a>
							<?php endif; ?>
						</div>	<!-- /Meta -->					
						
						<?php if(has_post_thumbnail()) : ?>
							<?php if(of_get_option('ttrust_post_featured_img_size')=="large") : ?>											
				    			<a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_post_thumbnail('ttrust_post_thumb_big', array('class' => 'postThumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>		    	
							<?php else: ?>
								<a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_post_thumbnail('ttrust_post_thumb_small', array('class' => 'postThumb alignleft', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
							<?php endif; ?>
						<?php endif; ?>															
						
						<?php the_excerpt(); ?>
						<?php more_link(); ?>		
					</article> <!-- /Post -->																
			   		
			
			
			<?php endwhile; ?>
				<?php get_template_part( 'part-pagination'); ?>
			</div> <!-- /Two third -->	
			
			<?php get_sidebar(); ?>	
		

		</div> <!-- /Container Inside -->
		
</div> <!-- /Content Wrap -->
		
<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>