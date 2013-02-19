<!-- <div id="projectBox" class="clearfix">
	<span id="ajaxLoading"></span>
	<div id="projectHolder"></div>		
</div> -->

<div id="content" class="fullProjects clearfix full">
<div id="projects" class="clearfix">		
				
	<?php query_posts( 'skill='.$post->post_name.'&post_type=project&posts_per_page=200' ); ?>
	
	<div class="thumbs masonry">			
	<?php  while (have_posts()) : the_post(); ?>
		<?php get_template_part( 'inc/thumbs/part-bowl-thumb'); ?>	

	<?php endwhile; ?>
	</div>
</div>
</div>
