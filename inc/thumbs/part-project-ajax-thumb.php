<?php global $i; ?>
<?php global $t; ?>
<?php global $b; ?>
<?
$t++;
$b++;

if ($b == 3 ){
	$last = "last";
	$b = 0;
} else{
	$last = " ";
}



if ($i == NULL ){
	$i = 1;
	$t = 0;
} else {
	$i = $i;
}



if ($i > 3 ){
	$i = 1;
} else {
	$i = $i;
}

if ($t % 2 == 0 ){
	$o = "odd";
} else{
	$o = "even";
}



?>




<?php global $p; ?>
<div class="project small ajx <?php echo $p; ?> <?php  //echo $o; ?> <?php  //echo $last; ?>" id="project-<?php echo $post->post_name;?>">
	<div class="inside">
	<a href="#<?php echo $post->post_name; ?>" rel="bookmark" >	
		<?php the_post_thumbnail("ttrust_350_cropped", array('class' => 'thumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
		<span class="title <?php echo $post->post_name; ?>"><span class="hide"><?php the_title(); ?></span></span>
	</a>
	</div>																																
</div>

