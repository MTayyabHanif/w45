<?php /*
Template Name: Coming
*/ ?>
<?php get_header(); ?>

<div class="wrap" class="clearfix">
<div class="container" class="clearfix">
    <?php if(!is_front_page()):?>
      <header id="pageHead">
        <h1><?php the_title(); ?></h1>
        <?php $page_description = get_post_meta($post->ID, "_ttrust_page_description_value", true); ?>
        <?php if ($page_description) : ?>
          <p><?php echo $page_description; ?></p>
        <?php endif; ?>
      </header>

    <?php endif; ?>   
         
    <section id="content" class="clearfix full">
    <?php while (have_posts()) : the_post(); ?>         
      <div <?php post_class('clearfix'); ?>>            
        <?php the_content(); ?>       
      </div>        
      <?php //comments_template('', true); ?>     
    <?php endwhile; ?>                
    </section>
    <div class="clearboth"></div>

</div>
</div>
<div class="clearboth"></div>

<?php $footer_template = of_get_option('w45_footer_template'); ?>
<?php if ($footer_template != "") : ?>
<?php get_template_part($footer_template); ?>
<?php else : ?>
<?php get_footer(); ?>
<?php endif ; ?>