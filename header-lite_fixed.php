<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<!-- <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" /> -->

	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<meta content="yes" name="apple-mobile-web-app-capable">


	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<script type='text/javascript' src='http://localhost/wp-content/themes/rmtc/js/modernizr.custom.70736.js?ver=3.5.1'></script>

	<!-- <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold" /> -->

	<?php $heading_font = of_get_option('ttrust_heading_font'); ?>
	<?php $body_font = of_get_option('ttrust_body_font'); ?>
	<?php $banner_main_font = of_get_option('ttrust_banner_main_font'); ?>
	<?php $banner_secondary_font = of_get_option('ttrust_banner_secondary_font'); ?>
	<?php if ($heading_font != "") : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($heading_font)); ?>:regular,italic,bold,bolditalic" />
	<?php endif; ?>	
	<?php if ($body_font != "" && $body_font != $heading_font) : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($body_font)); ?>:regular,italic,bold,bolditalic" />
	<?php endif; ?>	
	<?php if ($banner_main_font != "") : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($banner_main_font)); ?>:regular,italic,bold,bolditalic" />
	<?php endif; ?>
	<?php if ($banner_secondary_font != "") : ?>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo(urlencode($banner_secondary_font)); ?>:regular,italic,bold,bolditalic" />
	<?php endif; ?>
	
	<link rel="stylesheet" href="<?php //bloginfo('stylesheet_url'); ?><?php bloginfo('template_url'); ?>/css/style.css" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if (of_get_option('ttrust_favicon') ) : ?>
		<link rel="shortcut icon" href="<?php echo of_get_option('ttrust_favicon'); ?>" />
	<?php endif; ?>
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>



	<?php wp_head(); ?>	

</head>

<?php $ttrust_logo = of_get_option('logo'); ?>
<?php $show_full_page_slider = of_get_option('w45_home_full_page_slider'); ?>
<?php $show_top_nav_bar = of_get_option('w45_show_top_nav_bar'); ?>
<?php $show_top_toggle_slider = of_get_option('w45_show_toggle_slider'); ?>
<?php $show_facebook_likes = of_get_option('w45_show_facebook_likes'); ?>
<?php $nav_location = of_get_option('w45_nav_location'); ?>

<body id="<?php echo ($nav_location); ?>" <?php body_class(); ?> >

<!-- Mobile Navagation -->
<?php //get_template_part( 'inc/nav/mobile_slide_right' ); ?>

<!-- Top Account Login -->
<?php// get_template_part( 'inc/woocommerce/top_account_login' ); ?>

<?php if($show_top_nav_bar) : ?>
<!-- Small Header  Nav -->
<?php get_template_part( 'inc/nav/top_nav_bar' ); ?>
<?php endif; ?>

<!-- Main Navagation -->
<div style="position:relative; z-index:9999; margin:0 auto;" >
<?php get_template_part( 'inc/header_' . of_get_option('w45_nav_location') ); ?>
</div>
<div id="container">

<!-- Facebook Likes -->
<?php if($show_facebook_likes) : ?>
	<?php get_template_part( 'inc/social_plugins/facebook_likes' ); ?>
<?php endif; ?>


<?php if($show_top_toggle_slider) : ?>
<div id="main_toggle" class="mobileFixed2 mobileAbsolute">
<?php //get_template_part( 'inc/sliders/full_royal_touch_project' ); ?>
<?php get_template_part( 'inc/sliders/full_royal_touch_woo_product' ); ?>
</div>

<div class="content wrap hide">
<div class="header_bar"></div>
</div>
<div class="clearboth"></div>
<?php endif; ?>





<div id="meat">

	<?php /* Full Page Slider */?>
	<?php if($show_full_page_slider) : ?>
	<?php $slider_type = of_get_option('w45_slider_type'); ?>
	<?php if(is_front_page()):?>
	<div class="wrap">
	<section id="homeBanner">	
		<?php //get_template_part( 'inc/sliders/full_royal_slider' ); ?>
		<?php get_template_part( $slider_type ); ?>
	</section>
	<div class="shadow_spacer hide"></div>
	</div>
	<?php endif; ?>
	<?php endif; ?>


	<?php if(is_front_page()): ?>		
		<section id="homeBanner"  class="hide">			
			<div id="bannerText">
				<h2><?php echo of_get_option('ttrust_banner_text_primary'); ?></h2>
				<p><?php echo of_get_option('ttrust_banner_text_secondary');  ?></p>
			</div>		
		</section>	
		<div class="shadow_spacer hide"></div>
	<?php endif; ?>	





<?php if(is_front_page()): ?>	
<div id="mission" class="content wrap">
	<div class="container inside">
<section style id="bannerText2">
	<h2><?php echo of_get_option('ttrust_banner_text_primary'); ?></h2>
	<h3><?php echo of_get_option('ttrust_banner_text_secondary');  ?></h3>
</section>
</div>
</div>
<div class="shadow_spacer hide"></div>
<div class="clearboth"></div>

<?php endif; ?>	

	

	