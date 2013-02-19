<?php /*
Template Name: Coming Soon
*/ ?>
<?php get_header('lite'); ?>








<div class="content wrap">
<div class="container inside clearfix">
<article id="content" class="full grid">


<?php $featured_page_count = intval(of_get_option('ttrust_featured_pages_count')); ?>
<?php if($featured_page_count > 0) : ?>
<section id="featuredPages" class="full homeSection clearfix">      
  <h3 class="hide"><span><?php //echo of_get_option('ttrust_featured_pages_title'); ?></span></h3>    
  <?php
  query_posts( array(
    'ignore_sticky_posts' => 1,  
    'meta_key' => '_ttrust_featured_value',
    'meta_value' => 'true',       
      'posts_per_page' => $featured_page_count,
      'post_type' => array(       
    'page'          
    )
  ));
  ?>
  <div class="thumbs clearfix">
  <?php while (have_posts()) : the_post(); ?>         
    <?php get_template_part( 'part-page-thumb'); ?>
  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
  </div>
</section>
<?php endif; ?>

</article>
</div>
</div>
<div class="clearboth"></div>


<div class="content wrap">
<div class="container inside clearfix">
<article id="content" class="full grid">
<?php while (have_posts()) : the_post(); ?>         
          <section <?php post_class('clearfix'); ?>>            
          <?php the_content(); ?>       
        </section>        
        <?php //comments_template('', true); ?>     
      <?php endwhile; ?>    
</article>
</div>
</div>
<div class="clearboth"></div>





<?php get_footer('lite'); ?>
<?php// get_footer(); ?>