<?php get_header(); ?>	


<?php
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, 'w45_600x400_cropped', false);
$image_url = $image_url[0];
?>

<? //$image_url = wp_get_attachment_image_src($image_id, 'w45_square_thumb_350', false); ?>


<div class="wrap">
<section id="homeBanner2"  class="hide2">
<div class="container clearfix">    




            
    
    <header id="content" class="full hide">  
        <div id="pageHead">     
                    <h1><?php the_title(); ?></h1>
                        <div class="projectNav clearfix">
                <div class="previous <?php if(!get_previous_post()){ echo 'inactive'; }?>">
                    <?php previous_post_link('%link', '&larr; %title'); ?>
                </div>              
                <div class="next <?php if(!get_next_post()){ echo 'inactive'; }?>">                     
                    <?php next_post_link('%link', '%title &rarr;'); ?>              
                </div>  

            </div> <!-- end navigation -->
            
        </div>

    </header>   

     <div class="project clearfix hide">                         
            
                <?php while (have_posts()) : the_post(); ?> 
                <?php //the_content(); ?> 
                <?php endwhile; ?>  
    </div>
                



            </div>      
        </div>  
    
</section>
</div>
<div class="clearboth"></div>


<div class="wrap">
<div class="container clearfix">


<div class="one_half">
    <img src="<?php echo $image_url; ?>">
<div class="shadow_spacer"></div>
<div class="share">
<h4 class="left c2">Share This</h4>
    <div class="left">
    <?php if(function_exists('social_ring_show')){ social_ring_show();} ?>
</div>
</div>

<div class="p_time">
<h4 class="c2">Prep Time <span class="c1" style="">30min</span></h4>
</div>
</div>


<div class="one_half last">
<div id="pageHead" class="border-bottom">  
<h1><?php the_title(); ?><span class="price">$100.00</span></h1>

</div>
<div class="page_description">
<?php the_excerpt(); ?>
</div>

<div class="">
    <a class="button">Add to Cart</a>
    <a class="button add-to-cart">Buy Now</a>
    <a class="button buy">Add to Cart</a>

</div>

<div id="pageHead" class="border-bottom">  
<h1>Ingredients Provided</h1>
<ul class="small_icons">
<li style="background:url(http://placehold.it/60x60)"><p>Sea Bass</p></li>
<li style="background:url(http://placehold.it/60x60)"><p>Sea Bass</p></li>
<li style="background:url(http://placehold.it/60x60)"><p>Sea Bass</p></li>
<li style="background:url(http://placehold.it/60x60)"><p>Sea Bass</p></li>
<li style="background:url(http://placehold.it/60x60)"><p>Sea Bass</p></li>
<li style="background:url(http://placehold.it/60x60)"><p>Sea Bass</p></li>
</ul>
</div>



</div>


</div>
</div>







<div class="wrap">
<div class="container clearfix">

		
		
				 
		<section id="content" class="full">			
			<?php while (have_posts()) : the_post(); ?>			    
			<div class="project clearfix">

				<?php the_content(); ?>		

				<?php $project_url = get_post_meta($post->ID, "_ttrust_url_value", true); ?>
				<?php $project_url_label = get_post_meta($post->ID, "_ttrust_url_label_value", true); ?>
				<?php $project_url_label = ($project_url_label!="") ? $project_url_label : __('Visit Site', 'themetrust'); ?>
				<ul class="skillList clearfix"><?php ttrust_get_terms_list(); ?></ul>	
				<?php if ($project_url) : ?>
					<p><a class="action" href="<?php echo $project_url; ?>"><?php echo $project_url_label; ?></a></p>
				<?php endif; ?>			
								
			</section>
			<?php //comments_template('', true); ?>	
			<?php endwhile; ?>										    	
		</div>

   

	
<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>