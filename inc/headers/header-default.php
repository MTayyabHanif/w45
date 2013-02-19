<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<!-- <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" /> -->

	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<meta content="yes" name="apple-mobile-web-app-capable">


	<meta name="apple-mobile-web-app-status-bar-style" content="black" />

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

<link rel="shortcut icon" href="favicon.png" />
<link rel="apple-touch-icon-precomposed" media="screen and (resolution: 163dpi)" href="apple-touch-icon-57x57-precomposed.png">
<link rel="apple-touch-icon-precomposed" media="screen and (resolution: 132dpi)" href="apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon-precomposed" media="screen and (resolution: 326dpi)" href="apple-touch-icon-114x114-precomposed.png">

<!-- iPhone SPLASHSCREEN-->
 <link href="apple-touch-startup-image-320x460.png" media="(device-width: 320px)" rel="apple-touch-startup-image">
<!-- iPhone (Retina) SPLASHSCREEN-->
<link href="apple-touch-startup-image-640x920.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPhone 5 -->
<link href="apple-touch-startup-image-640x1096.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPad (portrait) SPLASHSCREEN-->
<link href="apple-touch-startup-image-768x1004.png" media="(device-width: 768px) and (orientation: portrait)" rel="apple-touch-startup-image">
<!-- iPad (landscape) SPLASHSCREEN-->
<link href="apple-touch-startup-image-748x1024.png" media="(device-width: 768px) and (orientation: landscape)" rel="apple-touch-startup-image">
<!-- iPad (Retina, portrait) SPLASHSCREEN-->
<link href="apple-touch-startup-image-1536x2008.png" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPad (Retina, landscape) SPLASHSCREEN-->
<link href="apple-touch-startup-image-1496x2048.png" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">

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
 <div id="modal">
    <a class="close_button" href="javascript:jQuery.pageslide.close()">X</a>

     <div class="logo-small"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo $ttrust_logo; ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
<?php wp_nav_menu( array('menu_class' => 'sf-menu', 'theme_location' => 'main', 'fallback_cb' => 'default_nav' )); ?>	
	
</div>
<!-- Mobile Navagation -->




<!-- Account Login -->
<div class="wrap hideMobile hide">
<div class="container " style="position:relative">
<?php if ( is_user_logged_in() ) { ?>
	<div class="woo_login" style="top:0; right:0; position:absolute; z-index:999">
 	<a  href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a>
 </div>
 <?php } 
 else { ?>
 <div class="woo_login" style="top:0; right:0; position:absolute; z-index:999">
 	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a>
</div>
 <?php } ?>
</div>
</div>
<!-- Account Login -->




<?php if($show_top_nav_bar) : ?>
<div class="absolute_top_logo hideMobile hide">
<?php $ttrust_logo = of_get_option('logo'); ?>
	<div id="logo">
		<?php if($ttrust_logo) : ?>				
			<h1 class="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php echo $ttrust_logo; ?>" alt="<?php bloginfo('name'); ?>" /></a></h1>
		<?php else : ?>				
			<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>				
		<?php endif; ?>	
	</div>
</div>
<?php endif; ?>


<header id="header" class="hideMobile">
<div class="inside clearfix">

<?php get_template_part( 'inc/header_' . of_get_option('w45_nav_location') ); ?>

</div>

</header>



<div id="container">

<?php if($show_top_nav_bar) : ?>
<!-- Small Header  Nav -->
<div id="header_small_nav" class="content wrap ">
<div  class="container2 inside" class="clearfix">
<p>
	<?php wp_nav_menu( array('menu_class' => 'sf-menu', 'theme_location' => 'header_small', 'fallback_cb' => 'default_nav' )); ?>
</p>
</div>	
</div>
<div class="clearboth"></div>
<?php endif; ?>



<!-- Facebook Likes -->
<?php if($show_facebook_likes) : ?>
	<?php get_template_part( 'inc/social_plugins/facebook_likes' ); ?>
<?php endif; ?>


<div class="wrap header">
<nav id="mainNavM" class="clearfix">	
	<a href="<?php bloginfo('url'); ?>"><?php// bloginfo('name'); ?><?php //the_title(); ?></a>	
	<a href="#modal" class="right slide_menu"><span class="menu-icon"></span></a>					
			<?php// wp_nav_menu( array('menu_class' => 'sf-menu', 'theme_location' => 'main', 'fallback_cb' => 'default_nav' )); ?>		
	<div style="position:fixed; top:49px; z-index:999" class="shadow_spacer hide"></div>		
</nav>



</div>


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

	<?php if(is_page( array( 'store-locator' ) )  ):?>
		
	<!-- Begin Easy Locator Store Locator Service //-->
	<script type="text/javascript">
	window.onload = function()
	{
	    template = "template_0004";
	    address = getParameterByName("address");
	    country_code = getParameterByName("country_code");
	    product = getParameterByName("product");
	    distance = getParameterByName("distance");

	    frame_url = "http://www.easylocator.net/search/map/Way_Better_Snacks";
	    frame_url += (template) ? "/template/" + template : "";
	    frame_url += (address) ? "/address/" + address : "";
	    frame_url += (country_code) ? "/country_code/" + country_code : "";
	    frame_url += (product) ? "/product/" + product : "";
	    frame_url += (distance) ? "/distance/" + distance : "";

	    EasyLocatorIframe = document.createElement("iframe");
	    EasyLocatorIframe.id = "EasyLocator";
	    EasyLocatorIframe.name = "EasyLocator";
	    //EasyLocatorIframe.width = "100%";
	    EasyLocatorIframe.width = (jQuery(window).width());
	    EasyLocatorIframe.height = "500";
	    //EasyLocatorIframe.height = (jQuery(window).height());
	    EasyLocatorIframe.src = frame_url;
	    EasyLocatorIframe.setAttribute("scrolling", "no");
	    EasyLocatorIframe.setAttribute("frameborder", "0");
	    EasyLocatorIframe.setAttribute("allowtransparency", "true");

	    document.getElementById("EasyLocatorWrapper").appendChild(EasyLocatorIframe);
	}

	function getParameterByName(name)
	{
	  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	  var regexS = "[\?&]" + name + "=([^&#]*)";
	  var regex = new RegExp(regexS);
	  var results = regex.exec(window.location.search);
	  if(results == null)
	    return "";
	  else
	    return decodeURIComponent(results[1].replace(/\+/g, " "));
	}
	
	</script>
	

	<div style="width:100%; height:500px; " id="EasyLocatorWrapper">
		
		
		<!-- <div style="width:100%;" id="EasyLocatorWrapper">  -->
	
		
		<!-- <form action="http://www.batchgeocode.com/map/">
			<input type="hidden" name="i" value="f825347a508f7821d35f0fb7428d46ed">
			<label>Search for nearest location<input type="text" name="q" value=""></label>
			<input type="submit" value="Search">
			</form> -->

			<!-- <iframe src="https://batchgeo.com/map/f825347a508f7821d35f0fb7428d46ed" frameborder="0" width="100%" height="500" style=""></iframe> -->
		
		
		
	</div>
	<!-- End Easy Locator Store Locator Service //-->
	
<div class="bar_spacer"></div>
	<?php endif; ?>


	