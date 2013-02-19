<?php /*
Template Name: Ajax Sorter
*/ ?>
<?php get_header(); ?>	



	<div id="projectBox" class="clearfix">
		<span id="ajaxLoading"></span>
		<div id="projectHolder"></div>		
	</div>	
<div class="bar_spacer"></div>


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
	
		<div id="thumbWrapper" class="container inside clearfix">
				 
		<section id="content" class="fullProjects clearfix full grid">	
	
	<div id="projects">		
					
		<?php if(of_get_option('ttrust_home_project_type') == "featured") : //Show only featured projects ?>			
			
			<?php
			query_posts( array(
				'ignore_sticky_posts' => 1,
    			'meta_key' => '_ttrust_featured_value',
				'meta_value' => 'true',
				//'posts_per_page' => of_get_option('ttrust_home_project_count'),   			
    			'post_type' => array(				
				'project'					
				)
			));
			?>	
			
			<?php $skills_nav = array(); ?>			

			<?php  while (have_posts()) : the_post(); ?>	   			    
				<?php 				
				$s = "";
				$skills = get_the_terms( $post->ID, 'skill');
				if ($skills) {
				   foreach ($skills as $skill) {
					  if (isset($skills_nav[$skill->term_id])) {
					  	continue;
					  }
					  $skills_nav[$skill->term_id] = $skill;		      		  		
				   }		   
				}		

				?>
			<?php endwhile; ?>	

			<ul id="filterNav" class="clearfix">				
				<li class="allBtn"><a href="#" data-filter="*" class="selected"><?php _e('All', 'themetrust'); ?></a></li>
				<?php
				$j=1;		  
				  foreach ($skills_nav as $skill) {
				  	$a = '<li><a href="#" data-filter=".'.$skill->slug.'">';
					$a .= $skill->name;					
					$a .= '</a></li>';
					echo $a;
					echo "\n";
					$j++;
				  }
				 ?>								
			</ul>			
			
		<?php else: //Show all projects ?>			
			
			<ul id="filterNav" class="clearfix">
				<li class="allBtn"><a href="#" data-filter="*" class="selected"><?php _e('All', 'themetrust'); ?></a></li>	
				<?php
				$categories =  get_categories('taxonomy=skill'); 										
				foreach ($categories as $category) {					
					$a = '<li><a href="#" data-filter=".'.$category->slug.'">';
					$a .= $category->name;					
					$a .= '</a></li>';
					echo $a;
					echo "\n";								
				 }
				 ?>					
			</ul>
			
			<?php
			query_posts( array(
				'ignore_sticky_posts' => 1,    			
    			//'posts_per_page' => of_get_option('ttrust_home_project_count'),
    			'post_type' => array(				
				'project'					
				)
			));
			?>			
			
		<?php endif; ?>			
					
		<div class="thumbs masonry">			
		<?php  while (have_posts()) : the_post(); ?>
			
			<?php 				
			$p = "";
			$skills = get_the_terms( $post->ID, 'skill');
			if ($skills) {
			   foreach ($skills as $skill) {				
			      $p .= $skill->slug . " ";						
			   }
			}
			?>    		
			
			<?php// include( TEMPLATEPATH . '/inc/thumbs/project_thumb.php'); ?>
			<?php get_template_part( 'inc/thumbs/part-project-ajax-thumb'); ?>

		<?php endwhile; ?>
		
	</div>
</div>


</section>
</div>
</div>

	
<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>