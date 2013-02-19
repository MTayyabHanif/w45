
<?php global $page_last; ?>
<?php global $p; ?>

<?
$t++;
$page_last++;

if ($page_last == 3 ){
	$last = "last";
	$page_last = 0;
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
<?php
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, 'w45_square_thumb_350', false);
$image_url = $image_url[0];
$placholder_image = get_bloginfo( 'template_directory' ) . '/images/placeholders/product_placeholder.png';
?>

<div class="page small <?php echo $p; ?> <?php  echo $o; ?> <?php  echo $last; ?>" <?php //post_class('small'); ?>>	
			<!-- <a class="thumb clearfix" href="<?php// the_permalink() ?>#" rel="bookmark" > -->
				<?php if($image_url) : ?>
				<?php the_post_thumbnail("ttrust_one_third_cropped", array('class' => 'thumb', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
				
			<?php else : ?>
				<img src="<?php echo ($placholder_image); ?>"/>
			<?php endif ; ?>
			<!-- </a> -->			
			<div class="text-box clearfix">
			<h2>
				<!-- <a href="<?php// the_permalink() ?>#" rel="bookmark" > -->
					<?php the_title(); ?>
				<!-- </a> -->
			</h2>			
			
			<?php the_excerpt(); ?>	
			</div>				
</div>

