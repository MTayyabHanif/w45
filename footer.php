

</div><!--/meat-->
<div class="content wrap ">
<div class="container">
<!--FOOTER HEADER-->
<div id="footer-header" class="clearfix">
<!--FOOTER OVERLAY ARROWS-->
<div class="left-corner corner"></div>
<div class="right-corner corner"></div>			 
</div>
</div>	
</div>		 



<?php $footer_logo = of_get_option('w45_footer_logo'); ?>
<?php if ($footer_logo != "") : ?>

<div class="content wrap ">
<div class="footer_bar" style="position:relative; margin-bottom: -5px;">
<div class="absolute_top_logo">

		<div id="footer_logo"  class="hideMobile">
		<?php if($footer_logo) : ?>				
			<span class="footer_logo"><img src="<?php echo $footer_logo; ?>" alt="<?php bloginfo('name'); ?>" /></span>
		<?php else : ?>				
<h1><a  href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>				
<?php endif; ?>	
</div>
</div>
</div>
</div>
<?php endif; ?>	



<div class="clearboth"></div>


	<footer class="wrap">
	<div class="container">

	<div id="footer" >

		

	<?php //get_template_part( 'inc/nav/footer_' . of_get_option('w45_nav_location') ); ?>

	<?php //get_template_part( 'inc/nav/footer_nav_big'); ?>
	
		<div class="inside">		
		<div class="main clearfix">
				

			<?php //get_template_part( 'inc/nav/footer_nav_big'); ?>
		
	<?php $show_footer_widgets = of_get_option('w45_footer_widgets'); ?>

	<?php if($show_footer_widgets) : ?>

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_1') ) : ?> <?php endif; ?> 
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_2') ) : ?>  <?php endif; ?> 
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_3') ) : ?>  <?php endif; ?> 
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_4') ) : ?> <?php endif; ?> 


	<?php endif; ?>	
	



	<!-- Begin MailChimp Signup Form -->
		
		<div id="mailChip_Wrapper" class="hideMobile hide">
		<div style="background: transparent; text-align:center; padding-top:0px; text-transform:uppercase;" id="mc_embed_signup">
		<form action="http://workhorse45.us5.list-manage.com/subscribe/post?u=d53384428d51ee3c406bbd355&amp;id=0f8a565d0b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
			<!-- <label for="mce-EMAIL">Subscribe to our mailing list</label> -->
			
			
			<input style="color:#383532 !important;"  type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
			<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
			<div class="clear">
		<p>Subscribe to our mailing list</p>
			</div>
		</form>
		</div>
	</div>

		<!--End mc_embed_signup-->

</div><!-- end footer main -->							
</div><!-- end footer inside-->		
</div><!-- end footer -->
</div>
</footer>
<div class="clearboth"></div>



<?php //if(is_front_page()):?>
<?php $show_insta_feed = of_get_option('w45_show_instagram'); ?>
<?php if($show_insta_feed) : ?>
<?php //get_template_part( 'inc/sliders/full_royal_instagram' ); ?>
<?php get_template_part( 'inc/sliders/full_royal_instagram_test' ); ?>
<?php endif; ?>	
<?php //endif; ?>	




<div id="footerNav" class="wrap">
<div class="container inside clearfix">

	<div style="margin-bottom:0;" class="two_third">
        <?php wp_nav_menu( array('menu_class' => 'sf-menu', 'theme_location' => 'footer', 'fallback_cb' => 'default_nav' )); ?>	
    </div>

</div>
</div>
<div class="clearboth"></div>





</div><!-- end container -->





<?php $show_fixed_bar = of_get_option('w45_fixed_bar'); ?>
<?php if($show_fixed_bar) : ?>
<article class="toggle-panel boxed bottom apple-green" style="z-index:99">
		<span>
			<div class="tour_button"></div>
			<div class="tour_hand"></div>
		</span>
			
			<?php get_template_part( 'inc/sliders/full_royal_events' ); ?>	
		
</article>
<div class="clearboth"></div>
<?php endif; ?>


<div id="copywrite" class="wrap">
<div class="container inside clearfix">
<section class="secondary clearfix">
	<?php $footer_address = of_get_option('w45_footer_address'); ?>
	<?php $footer_left = of_get_option('ttrust_footer_left'); ?>
	<?php $footer_right = of_get_option('ttrust_footer_right'); ?>
	<div class="left"><p><?php if($footer_left){echo($footer_left);} else{ ?>&copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> All Rights Reserved.<?php }; ?></p></div>
	<?php if($footer_address){echo('<div id="footer_address"><p>' . $footer_address . '</p></div>');}?>
	<div id="footer_small_nav"><p><?php wp_nav_menu( array('menu_class' => 'sf-menu', 'theme_location' => 'footer_small', 'fallback_cb' => 'default_nav' )); ?></p></div>
	<div class="right">

<?php $show_social_icons = of_get_option('w45_social_icons'); ?>
<?php if($show_social_icons) : ?>

<?php get_template_part( 'inc/social_plugins/social_icons'); ?>

<?php else : ?>
	<p><?php if($footer_right){echo($footer_right);} else{ ?><a href="http://workhorse45.com" title="Workhorse 45">W45</a><?php }; ?></p>
<?php endif; ?>	

	</div>
</section><!-- end footer secondary-->		
</div>
</div>
<div class="clearboth"></div>


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
<div id="cols11">11X COLUMNS</div>
<div id="cols12">12X COLUMNS</div>
<div id="cols13">13X COLUMNS</div>
<div id="cols14">14X COLUMNS</div>
<div id="cols15">15X COLUMNS</div>
<div id="cols16">16X COLUMNS</div>
<div id="cols17">17X COLUMNS</div>
<div id="cols18">18X COLUMNS</div>
<div id="cols19">19X COLUMNS</div>
<div id="cols20">20X COLUMNS</div>
<div id="cols21">21X COLUMNS</div>
<div id="cols22">22X COLUMNS</div>
<div id="cols23">20X COLUMNS</div>
<div id="cols24">24X COLUMNS</div>
<div id="cols25">25X COLUMNS</div>
<div id="cols26">26X COLUMNS</div>
<div id="cols27">27X COLUMNS</div>
<div id="cols28">28X COLUMNS</div>
<div id="cols29">29X COLUMNS</div>
<div id="cols30">30X COLUMNS</div>
<div style="float:left; position:fixed; bottom:40px;">
<?php edit_post_link(); ?>
</div>
</div>
</a>
<?php } ?>


<?php wp_footer(); ?>




</body>
</html>