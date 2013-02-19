
<div id="carousel-image-and-text" class="carousel-image-and-text touchcarousel grey-blue">   


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

	<?php
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, 'w45_square_thumb_350', false);
$image_url = $image_url[0];
?>

<?php $placholder_image = get_bloginfo( 'stylesheet_directory' ) . '/images/placeholders/placeholder_square.png';?>	
		    
			


				<li class="touchcarousel-item one_sixth"   style="background-image: url(
					

						<?php if($image_url) : ?>	

						<?php echo $image_url; ?>

						<?php else : ?>	

						<?php echo $placholder_image; ?>

						<?php endif; ?>	


						);">

						


					    <?php 
					    /* if ( has_post_thumbnail() ) {the_post_thumbnail("w45_square_thumb_350", array('class' => 'thumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); 
					}else {echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/placeholders/placeholder_square.png" />';} 
					*/?>
					        <a class="item-block" href="<?php the_permalink(); ?>" rel="bookmark">
						<h4><?php the_title(); ?></h4>
					</a>
					
				</li>
				<?php endwhile; ?>
<?php wp_reset_query();	?>	
				
			</ul> 
			<?php endif; ?>
		</div>
		



<div class="clearboth"></div>

