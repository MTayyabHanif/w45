
<div class="clearboth"></div>

	

<div id="copywrite" class="wrap" style="position:fixed; bottom:0; z-index:9999">
<div class="container inside">

	<section class="secondary clearfix">	
			<?php $footer_left = of_get_option('ttrust_footer_left'); ?>
			<?php $footer_right = of_get_option('ttrust_footer_right'); ?>
			<div class="left"><p><?php if($footer_left){echo($footer_left);} else{ ?>&copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> All Rights Reserved.<?php }; ?></p></div>
			<div class="right"><p><?php if($footer_right){echo($footer_right);} else{ ?><a href="http://workhorse45.com" title="W45">W45</a><?php }; ?></p></div>

	</div>
			
		</section><!-- end footer secondary-->		


</div>
</div>
<div class="clearboth"></div>


</div><!-- end container -->
<?php if (current_user_can('administrator')) { ?>
<a href="<?php echo bloginfo('wpurl'); ?>/wp-admin">
<div id="browser-size">
<div id="cols4">4X COLUMNS</div>
<div id="cols5">5X COLUMNS</div>
<div id="cols6">6X COLUMNS</div>
<div id="cols7">7X COLUMNS</div>
<div id="cols8">8X COLUMNS</div>
<div id="cols9">9X COLUMNS</div>
<div id="cols10">10X COLUMNS</div>
<div id="cols12">12X COLUMNS</div>
<div id="cols14">14X COLUMNS</div>
<div id="cols16">16X COLUMNS</div>
<div id="cols18">18X COLUMNS</div>
<?php edit_post_link(); ?>
</div>
</a>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>