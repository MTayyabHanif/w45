<?php global $p; ?>
<div class="project small ajx <?php echo $p; ?>" id="project-<?php echo $post->post_name;?>">
	<div class="inside">
	<a href="/wbsnx3/ingredients/#<?php echo $post->post_name; ?>" rel="bookmark" >	
		<?php the_post_thumbnail("ttrust_350_cropped", array('class' => 'thumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
		<span class="title <?php echo $post->post_name; ?>"><span class="hide"><?php the_title(); ?></span></span>
	</a>
	</div>																																
</div>

