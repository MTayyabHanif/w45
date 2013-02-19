<?php /*
Template Name: Portfolio - filterable
*/ ?>
<?php get_header(); ?>	


<div id="projectBox" class="clearfix">
	<span style="z-index:999" id="ajaxLoading">
		<div style="position:absolute; top:150px; left:50%; z-index:999" id="canvasloader-container" class="wrapper"></div>
	</span>
	<div id="projectHolder"></div>		
</div>




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
				 
		<section id="content" class="fullProjects clearfix full grid">	

										
				<?php while (have_posts()) : the_post(); ?>											
					<?php the_content(); ?>														
				<?php endwhile; ?>				
				<div id="projects" class="clearfix">		

					<?php $page_skills = get_post_meta($post->ID, "_ttrust_page_skills_value", true); ?>

					<?php if ($page_skills) : // if there are a limited number of skills set ?>
						<?php $skill_slugs = ""; $skills = explode(",", $page_skills); ?>

						<?php if (sizeof($skills) > 1) : // if there is more than one skill, show the filter nav?>	
							<div class="filterWrap">
							<ul id="filterNav" class="clearfix">
								<li class="allBtn"><a href="#" data-filter="all" class="selected"><?php _e('All', 'themetrust'); ?></a></li>

								<?php
								$j=1;					  
								foreach ($skills as $skill) {				
									$skill = get_term_by( 'slug', trim(htmlentities($skill)), 'skill');
									if($skill) {
										$skill_slug = $skill->slug;				

										$skill_slugs .= $skill_slug . ",";
						  				$a = '<li><a href="#" data-filter="'.$skill_slug.'">';
										$a .= $skill->name;					
										$a .= '</a></li>';
										echo $a;
										echo "\n";
										$j++;
									}		  
								}?>
							</ul>
							</div>
							<?php $skill_slugs = substr($skill_slugs, 0, strlen($skill_slugs)-1); ?>
						<?php else: ?>
							<?php $skill = $skills[0]; ?>
							<?php $s = get_term_by( 'name', trim(htmlentities($skill)), 'skill'); ?>
							<?php if($s) { $skill_slugs = $s->slug; } ?>
						<?php endif; 	

						query_posts( 'skill='.$skill_slugs.'&post_type=project&posts_per_page=200' );

					else : // if not, use all the skills ?>
						<div class="filterWrap">
						<ul id="filterNav" class="clearfix">
							<li class="allBtn"><a href="#" data-filter="all" class="selected"><?php _e('All', 'themetrust'); ?></a></li>
							<?php $j=1;
							$skills = get_terms('skill');
							foreach ($skills as $skill) {
								$a = '<li><a href="#" data-filter="'.$skill->slug.'">';
						    	$a .= $skill->name;					
								$a .= '</a></li>';
								echo $a;
								echo "\n";
								$j++;
							}?>
						</ul>
						</div>
						<?php query_posts( 'post_type=project&posts_per_page=200' );

					endif; ?>

					<div class="thumbs masonry">			
					<?php  while (have_posts()) : the_post(); ?>

						<?php
						global $p;				
						$p = "";
						$skills = get_the_terms( $post->ID, 'skill');
						if ($skills) {
						   foreach ($skills as $skill) {				
						      $p .= $skill->slug . " ";						
						   }
						}
						?>  

						<?php get_template_part( 'inc/thumbs/part-project-ajax-thumb'); ?>		

					<?php endwhile; ?>
					</div>
				</div>

							
			</section>
		</div>
	</div>
	<?php //get_template_part( 'inc/thumbs/part-project-ajax-thumb'); ?>	
	
<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>