<?php global $p; ?>
<div class="project small ajx <?php echo $p; ?>" id="project-<?php echo $post->post_name;?>">
	<div class="inside">
		<?php $dis_url = get_post_meta($post->ID, "wpcf-url", true); ?>
		<?php if ($dis_url) : ?>
	    <a href="<?php echo $dis_url; ?>" rel="bookmark" >
		<?php endif; ?>
	
		<?php the_post_thumbnail("ttrust_350_cropped", array('class' => 'thumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
		<!-- <span class="title"><span><?php //the_title(); ?></span></span> -->
	</a>
	</div>																																
</div>