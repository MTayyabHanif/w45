<div class="content wrap">

	<!-- <article style="margin:0;" class="toggle-panel minimal title-plus-icon"> -->
	<!-- <h1 style="text-align:center;" class="ir">Products</h1> -->
		<article style="margin:0;" class="toggle-panel minimal">
<!-- <h1 style="text-align:center; width:100%; position:absolute; bottom:0; margin-bottom:-68px; height:68px; z-index:999; background-position:center top;" class="ir">Products</h1> -->
		<h1 class="ir2">Products</h1>
		
			<div class="tabs thumb_slider hide-title cross-fade">



					

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
						  				//$a = '<li><a href="#" data-filter="'.$skill_slug.'">';
						  				$a = '<h1>';
										$a .= $skill->name;					
										$a .= '<h1>';
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
							<?php $s = get_term_by( 'name', trim(htmlentities($skill)), 'product_cat'); ?>
							<?php if($s) { $skill_slugs = $s->slug; } ?>
						<?php endif; 	

						//query_posts( 'product_cat='.$skill_slugs.'&post_type=product&posts_per_page=200' );

						query_posts( array(
							'ignore_sticky_posts' => 1,  		
					    	//'posts_per_page' => $featured_page_count,
					    	'meta_key' => '_ttrust_featured_value',
					    	'product_cat' => $skill_slugs,
							'post_type' =>  of_get_option('w45_home_toggle_type')
					    //	'post_type' =>  array( of_get_option('w45_home_toggle_type'), 'post')
					    	//'post_type' =>  array( of_get_option('w45_home_toggle_type'), 'post')
						));
	




					else : // if not, use all the skills ?>




						
			
							<?php 
							$j=1;
							// no default values. using these as examples
							$taxonomies = array( 
							   // 'post_tag',
							    //'my_tax',
							    'product_cat',
							    //'category',
							    // 'awards',
							    // 'videos'
							);



							$args = array(
							    'orderby'       => 'name', 
							    'order'         => 'ASC',
							    'hide_empty'    => 1, 
							    // 'exclude'       => array(), 
							    // 'exclude_tree'  => array(), 
							     //'include'       => array(28, 32, 41, 38)
							      'include'       => array(24, 25, 26)
							    // 'number'        => 4, 
							    // 'fields'        => 'all', 
							    // 'slug'          => , 
							    // 'parent'         => ,
							    // 'hierarchical'  => true, 
							    // 'child_of'      => 0, 
							    // 'get'           => , 
							    // 'name__like'    => ,
							    // 'pad_counts'    => false, 
							    // 'offset'        => , 
							    // 'search'        => , 
							    // 'cache_domain'  => 'core'
							); 
							$skills = get_terms($taxonomies, $args);
							foreach ($skills as $skill) {
								echo '<section>';
								$a = '<h1>';
						    	$a .= $skill->name;					
								$a .= '</h1>';
								echo $a;
								//query_posts( 'product_cat='.$skill->name.'&post_type=product&posts_per_page=10' );

								query_posts( array(
									'ignore_sticky_posts' => 1, 
									'meta_key' => '_ttrust_featured_value',
									'product_cat' => $skill->name,
					    			//'posts_per_page' => 200,



					    			//'post_type' => of_get_option('w45_home_toggle_type')
					    		//	'post_type' =>  array( of_get_option('w45_home_toggle_type'), 'post')
					    			//'post_type' =>   'post'
								));

								get_template_part( 'inc/sliders/full_royal_touch_thumb' );
								echo "</section>";
								echo "\n";
								$j++;
							}?>
						
					

						<?php 

					endif; ?>

			
		</div>
	</article>	
</div>
<div class="clearboth"></div>