<div class="touchcarousel_small content wrap">
<div class="container inside">
	

<div id="carousel-image-text-horizontal" class="carousel-image-text-horizontal touchcarousel tc_small grey-blue">       
			
<?php $home_project_count = intval(of_get_option('ttrust_home_project_count')); ?>
<?php if($home_project_count > 0) : ?>	

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
		


<ul class="touchcarousel-container">

<?php  while (have_posts()) : the_post(); ?>
				<li class="touchcarousel-item one_fourth_wide">
					<a class="item-block" href="<?php the_permalink(); ?>" rel="bookmark">
					<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail("w45_square_thumb_60", array('class' => 'thumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); 
					}
					else {
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/placeholders/100x100.gif" />';
						}
?>
</a>


					
					<div class="rblock">
						<h4><?php the_title(); ?></h4>
						<p>Short Description.</p>
					</div>
				</li>

		<?php endwhile; ?>
<?php wp_reset_query();	?>	
							
</ul>
<?php endif; ?>
</div>
</div>

<div class="shadow_spacer hide"></div>
</div>
	
<div class="clearboth"></div>