<div class="content wrap">

	<article style="margin:0;" class="toggle-panel minimal title-plus-icon">
		<h1 style="text-align:center; background:#444" class="ir">Click to View</h1>
		
			<div class="tabs underlined hide-title cross-fade">

				

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
							<?php $s = get_term_by( 'name', trim(htmlentities($skill)), 'skill'); ?>
							<?php if($s) { $skill_slugs = $s->slug; } ?>
						<?php endif; 	

						query_posts( 'skill='.$skill_slugs.'&post_type=project&posts_per_page=200' );

					else : // if not, use all the skills ?>
						
			
							<?php $j=1;
							$skills = get_terms('skill');
							foreach ($skills as $skill) {
								echo "<section>";
								$a = '<h1>';
						    	$a .= $skill->name;					
								$a .= '</h1>';
								echo $a;
								query_posts( 'skill='.$skill->name.'&post_type=project&posts_per_page=10' );
								//get_template_part( 'inc/sliders/full_royal_touch_h' );
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