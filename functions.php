<?php
  
// Load main options panel file  
if ( !function_exists( 'optionsframework_init' ) ) {
	define('OPTIONS_FRAMEWORK_URL', TEMPLATEPATH . '/admin/');
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/');
	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');
}

// Enable translation
// Translations can be put in the /languages/ directory
load_theme_textdomain( 'themetrust', TEMPLATEPATH . '/languages' );



// Change CSS Location
//add_filter('stylesheet_directory_uri','wpi_stylesheet_dir_uri',10,2);

/**
 * wpi_stylesheet_dir_uri
 * overwrite theme stylesheet directory uri
 * filter stylesheet_directory_uri
 * @see get_stylesheet_directory_uri()
 */
//function wpi_stylesheet_dir_uri($stylesheet_dir_uri, $theme_name){

	//$subdir = '/css';
	//return $stylesheet_dir_uri.$subdir;

//}

// Widgets
require_once (TEMPLATEPATH . '/admin/widgets.php');

// Multiple Featured Images
require_once (TEMPLATEPATH . '/admin/multiple_featured_images.php');


// Mobile device detection
if( !function_exists('mobile_user_agent_switch') ){
	function is_mobile(){
		$device = '';
 
		if( stristr($_SERVER['HTTP_USER_AGENT'],'ipad') ) {
			$device = "ipad";
		} else if( stristr($_SERVER['HTTP_USER_AGENT'],'iphone') || strstr($_SERVER['HTTP_USER_AGENT'],'iphone') ) {
			$device = "iphone";
		} else if( stristr($_SERVER['HTTP_USER_AGENT'],'blackberry') ) {
			$device = "blackberry";
		} else if( stristr($_SERVER['HTTP_USER_AGENT'],'android') ) {
			$device = "android";
		}
 
		if( $device ) {
			return $device; 
		} return false; {
			return false;
		}
	}
}

// Disable Updates
function ttrust_hidden_theme( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check/1.0/' ) )
		return $r; // Not a theme update request. Bail immediately.
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}

add_filter( 'http_request_args', 'ttrust_hidden_theme', 5, 2 );

//////////////////////////////////////////////////////////////
// Remove Admin Bar
/////////////////////////////////////////////////////////////
if ( ! is_admin() ) {
	add_filter( 'show_admin_bar', '__return_false' );
} 


//////////////////////////////////////////////////////////////
// Theme Header
/////////////////////////////////////////////////////////////
	
add_action('wp_enqueue_scripts', 'ttrust_scripts');

function ttrust_scripts() {

	$is_tiled_bkg = get_meta_box_vlaue("_ttrust_background_tile_value");	

	wp_enqueue_script('jquery');
	
	wp_enqueue_script('superfish', get_bloginfo('template_url').'/js/superfish.js', array('jquery'), '1.4.8', true);
	wp_enqueue_style('superfish', get_bloginfo('template_url').'/css/superfish.css', false, '1.4.8', 'all' );

	if ( has_single_custom_background() && !is_archive()) :	
		wp_enqueue_style('supersized', get_bloginfo('template_url').'/css/supersized.css', false, '3.2.6', 'all' );	
	endif;
	
	//wp_enqueue_style('woocommerce', get_bloginfo('template_url').'/css/woocommerce.css', false, '1', 'all' );	
	
	if(is_active_widget(false,'','ttrust_flickr')) :	
    	wp_enqueue_script('flickrfeed', get_bloginfo('template_url').'/js/jflickrfeed.js', array('jquery'), '0.8', true);
	endif;
	
	if(is_active_widget(false,'','ttrust_twitter')) :	
    	wp_enqueue_script('jquery_twitter', get_bloginfo('template_url').'/js/jquery.twitter.js', array('jquery'), '1.5', true);
	endif;	

	if ( has_single_custom_background() && !is_archive()) :	
		wp_enqueue_script('supersized', get_bloginfo('template_url').'/js/supersized.3.2.6.min.js', array('jquery'), '3.2.6');	
	endif;
	
	wp_enqueue_script('fitvids', get_bloginfo('template_url').'/js/jquery.fitvids.js', array('jquery'), '1.0', true);

	//wp_enqueue_script('easing', get_bloginfo('template_url').'/js/jquery.easing.1.3.js', array('jquery'), '1.3', true);

	//wp_enqueue_script('accordion', get_bloginfo('template_url').'/js/jquery.accordion.js', array('jquery'), NULL, true);

	//wp_enqueue_script('pretty_photo', get_bloginfo('template_url').'/js/jquery.prettyPhoto.js', array('jquery'), '3.1.2', true);
	//wp_enqueue_style('pretty_photo', get_bloginfo('template_url').'/css/prettyPhoto.css', false, '3.1.2', 'all' );

	//Royal Slider
	//wp_enqueue_script('royalslider', get_bloginfo('template_url').'/js/jquery.royalslider.min.js', array('jquery'), NULL, true);
	//wp_enqueue_script('royalslider', get_bloginfo('template_url').'/js/jquery.royalslider.js', array('jquery'), NULL, true);

	//wp_enqueue_style('royalslider_main', get_bloginfo('template_url').'/css/royalslider/royalslider.css', false, NULL, 'all' );
	//wp_enqueue_style('royalslider', get_bloginfo('template_url').'/css/royalslider/default/rs-default.css', false, NULL, 'all' );

	//Touch Carosel
	//wp_enqueue_script('touchcarousel', get_bloginfo('template_url').'/js/jquery.touchcarousel-1.1.min.js', array('jquery'), NULL, true);
	//wp_enqueue_style('touchcarousel_main', get_bloginfo('template_url').'/css/touchcarousel/touchcarousel.css', false, NULL, 'all' );
	//wp_enqueue_style('touchcarousel', get_bloginfo('template_url').'/css/touchcarousel/grey-blue-skin/grey-blue-skin.css', false, NULL, 'all' );



	//Page Slide
	//wp_enqueue_script('page_slide', get_bloginfo('template_url').'/js/jquery.pageslide.min.js', array('jquery'), NULL, true);

	//Responsive Tables
	wp_enqueue_script('footable', get_bloginfo('template_url').'/js/footable-0.1.js', array('jquery'), NULL, true);


	//scrollTo
	//wp_enqueue_script('scroll_to', get_bloginfo('template_url').'/js/jquery.scrollTo.js', array('jquery'), '1.4.2', true);

	wp_enqueue_script('tinynav', get_bloginfo('template_url').'/js/tinynav.min.js', array('jquery'), '1.05', true);	



	//Toggle Panel
	// wp_enqueue_script('ajax_retry', get_bloginfo('template_url').'/js/jquery.ajax-retry.js', array('jquery'), NULL, true);
	// wp_enqueue_script('ba_resize', get_bloginfo('template_url').'/js/jquery.ba-resize.js', array('jquery'), NULL, true);
	// wp_enqueue_script('toggle_panel', get_bloginfo('template_url').'/js/jquery.toggle-panel.js', array('jquery'), NULL, true);

	//Tabbing Accordion Panel
	//wp_enqueue_script('tab_panel2', get_bloginfo('template_url').'/js/tabs_js/index.js', array('jquery'), NULL, true);
	//wp_enqueue_script('tab_panel', get_bloginfo('template_url').'/js/tabs_js/jquery.tabs+accordion.js', array('jquery'), NULL, true);

	//Thumb Hover Animation
	//wp_enqueue_style('thumb_slide_right', get_bloginfo('template_url').'/css/thumb_hover_slide_right.css', false, NULL, 'all' );

	
	//wp_enqueue_script('fittext', get_bloginfo('template_url').'/js/jquery.fittext.js', array('jquery'), '1.0', true);	
	
	//wp_enqueue_script('isotope', get_bloginfo('template_url').'/js/jquery.isotope.min.js', array('jquery'), '1.3.110525', true);	
	
	//wp_enqueue_style('slideshow', get_bloginfo('template_url').'/css/flexslider.css', false, '1.8', 'all' );
	//wp_enqueue_script('slideshow', get_bloginfo('template_url').'/js/jquery.flexslider-min.js', array('jquery'), '1.8', true);	

	//Parallax Image Rollover
	//wp_enqueue_script('z_layer', get_bloginfo('template_url').'/js/jquery.zlayer.full.js', array('jquery'), NULL, true);

	
//	wp_enqueue_script('workhorse45_js', get_bloginfo('template_url').'/js/theme_trust-ck.js', array('jquery'), '1.0', true);
	wp_enqueue_script('workhorse45_js', get_bloginfo('template_url').'/js/workhorse45-ck.js', array('jquery'), '1.0', true);		
	//load wordpress Ajax
	wp_localize_script( 'workhorse45_js', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

//add_action('wp_head','ttrust_theme_head');

function ttrust_theme_head() { ?>
<meta name="generator" content="<?php global $ttrust_theme, $ttrust_version; echo $ttrust_theme.' '.$ttrust_version; ?>" />

<style type="text/css" media="screen">

<?php $heading_font = of_get_option('ttrust_heading_font'); ?>
<?php $body_font = of_get_option('ttrust_body_font'); ?>
<?php $call_to_action_font = of_get_option('ttrust_call_to_action_font'); ?>
<?php $banner_main_font = of_get_option('ttrust_banner_main_font'); ?>
<?php $banner_secondary_font = of_get_option('ttrust_banner_secondary_font'); ?>
<?php if ($heading_font) : ?>
	h1, h2, h3, h4, h5, h6 { font-family: '<?php echo $heading_font; ?>'; }
<?php endif; ?>
<?php if ($body_font) : ?>
	body { font-family: '<?php echo $body_font; ?>'; }
<?php endif; ?>
<?php if ($banner_main_font) : ?>
	#homeBanner h2 { font-family: '<?php echo $banner_main_font; ?>'; }
<?php endif; ?>
<?php if ($banner_secondary_font) : ?>
	#homeBanner p { font-family: '<?php echo $banner_secondary_font; ?>'; }
<?php endif; ?>

<?php if(of_get_option('ttrust_banner_text_position')) : ?>
	#bannerText { top: <?php echo(of_get_option('ttrust_banner_text_position')); ?>px; }
<?php endif; ?>

<?php if(of_get_option('ttrust_color_accent')) : ?>
	blockquote, address {
		border-left: 5px solid <?php echo(of_get_option('ttrust_color_accent')); ?>;
	}	
	#filterNav .selected, #filterNav a.selected:hover, #content .project.small .inside {
		background-color: <?php echo(of_get_option('ttrust_color_accent')); ?>;
	}	
<?php endif; ?>






<?php if(of_get_option('ttrust_color_btn')) : ?>.button, #searchsubmit, input[type="submit"] {background-color: <?php echo(of_get_option('ttrust_color_btn')); ?> !important;}<?php endif; ?>

<?php if(of_get_option('ttrust_color_btn_hover')) : ?>.button:hover, #searchsubmit:hover, input[type="submit"]:hover {background-color: <?php echo(of_get_option('ttrust_color_btn_hover')); ?> !important;}<?php endif; ?>

<?php if ( is_archive() ): ?> html {height: 101%;} <?php endif; ?>

<?php if(of_get_option('ttrust_color_banner_bkg')) : ?>
	#homeBanner {
		background-color: <?php echo(of_get_option('ttrust_color_banner_bkg')); ?>;
	}	
<?php endif; ?>



<?php echo(of_get_option('ttrust_custom_css')); ?>

</style>

<!--[if IE 7]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie7.css" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie8.css" type="text/css" media="screen" />
<![endif]-->
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<?php echo "\n".of_get_option('ttrust_analytics')."\n"; ?>

<?php }



//Head Scripts////////////////////////////
add_action('wp_head','w45_theme_head');
function w45_theme_head() { ?>
<style type="text/css" media="screen">

<?php if(of_get_option('w45_small_header_color')) : ?>
#header_small_nav.wrap { background-color: <?php echo(of_get_option('w45_small_header_color')); ?>;}
<?php endif; ?>

<?php if(of_get_option('ttrust_color_accent')) : ?>
	blockquote, address {
		border-left: .5em solid <?php echo(of_get_option('ttrust_color_accent')); ?>;
	}	

	::selection, ::-moz-selection {background: <?php echo(of_get_option('ttrust_color_accent')); ?>; color: white;}

	#filterNav .selected, #filterNav a.selected:hover, #content .project.small .inside {
		background-color: <?php echo(of_get_option('ttrust_color_accent')); ?>;
	}	
<?php endif; ?>

<?php $home_banner_img = of_get_option('ttrust_home_banner_img'); ?>
<?php if($home_banner_img) : ?>
	#homeBanner {
		background-image: url(<?php echo $home_banner_img; ?>);		
		background-repeat:no-repeat;
		background-attachment:fixed;
		background-position:center top;			
	}
<?php endif; ?>


<?php if(of_get_option('w45_small_footer_color')) : ?>
#copywrite.wrap{ background-color: <?php echo(of_get_option('w45_small_footer_color')); ?>;}
<?php endif; ?>

<?php if(of_get_option('ttrust_color_menu')) : ?>#mainNav ul a, #mainNav ul li.sfHover ul a { color: <?php echo(of_get_option('ttrust_color_menu')); ?> !important;	}<?php endif; ?>

<?php if(of_get_option('ttrust_color_menu_hover')) : ?>
	#mainNav ul li.current a,
	#mainNav ul li.current-cat a,
	#mainNav ul li.current_page_item a,
	#mainNav ul li.current-menu-item a,
	#mainNav ul li.current-post-ancestor a,	
	.single-post #mainNav ul li.current_page_parent a,
	#mainNav ul li.current-category-parent a,
	#mainNav ul li.current-category-ancestor a,
	#mainNav ul li.current-portfolio-ancestor a,
	#mainNav ul li.current-projects-ancestor a {
		color: <?php echo(of_get_option('ttrust_color_menu_hover')); ?> !important;		
	}
	#mainNav ul li.sfHover a,
	#mainNav ul li a:hover,
	#header_small_nav li a:hover,
	#mainNav ul li:hover {
		color: <?php echo(of_get_option('ttrust_color_menu_hover')); ?> !important;	
	}
	#mainNav ul li.sfHover ul a:hover { color: <?php echo(of_get_option('ttrust_color_menu_hover')); ?> !important;}	
<?php endif; ?>

<?php if(of_get_option('w45_color_1')) : ?>p { color: <?php echo(of_get_option('w45_color_1')); ?>;}<?php endif; ?>
<?php if(of_get_option('ttrust_color_link')) : ?>a, .thumb_slider.tabs > ul > li.current, li:hover { color: <?php echo(of_get_option('ttrust_color_link')); ?>;}<?php endif; ?>
<?php if(of_get_option('ttrust_color_link_hover')) : ?>a:hover {color: <?php echo(of_get_option('ttrust_color_link_hover')); ?>;}<?php endif; ?>
<?php if(of_get_option('ttrust_color_btn')) : ?>.button, #searchsubmit, input[type="submit"] {background-color: <?php echo(of_get_option('ttrust_color_btn')); ?> !important;}<?php endif; ?>
<?php if(of_get_option('ttrust_color_btn_hover')) : ?>.button:hover, #searchsubmit:hover, input[type="submit"]:hover {background-color: <?php echo(of_get_option('ttrust_color_btn_hover')); ?> !important;}<?php endif; ?>
<?php if(of_get_option('w45_heading_color')) : ?>
h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color: <?php echo(of_get_option('w45_heading_color')); ?>;}
#pageHead .container{ border-color: <?php echo(of_get_option('w45_heading_color')); ?>;}
<?php endif; ?>


<?php
//Set background CSS if there is a custom single background
global $wp_query;
global $post;

$is_tiled_bkg = get_post_meta($post->ID, "_ttrust_background_tile_value", true);

//if ( is_singular() && has_single_custom_background()) {
if ( has_single_custom_background()) {
	if ( $is_tiled_bkg ) {		
		echo "body {background: url(".get_single_custom_background().") repeat !important;}";		
	}
	else {
		//echo 'body { background-image: none !important; background-color: #d4d4d4 !important;}';
		echo "body {background: url(".get_single_custom_background().") fixed !important;}";
	}			
}
?>


</style>


<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.png" />
<link rel="apple-touch-icon-precomposed" media="screen and (resolution: 163dpi)" href="<?php bloginfo('url'); ?>/apple-touch-icon-57x57-precomposed.png">
<link rel="apple-touch-icon-precomposed" media="screen and (resolution: 132dpi)" href="<?php bloginfo('url'); ?>/apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon-precomposed" media="screen and (resolution: 326dpi)" href="<?php bloginfo('url'); ?>/apple-touch-icon-114x114-precomposed.png">
<!-- iPhone SPLASHSCREEN-->
 <link href="<?php bloginfo('url'); ?>/apple-touch-startup-image-320x460.png" media="(device-width: 320px)" rel="apple-touch-startup-image">
<!-- iPhone (Retina) SPLASHSCREEN-->
<link href="<?php bloginfo('url'); ?>/apple-touch-startup-image-640x920.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPhone 5 -->
<link href="<?php bloginfo('url'); ?>/apple-touch-startup-image-640x1096.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPad (portrait) SPLASHSCREEN-->
<link href="<?php bloginfo('url'); ?>/apple-touch-startup-image-768x1004.png" media="(device-width: 768px) and (orientation: portrait)" rel="apple-touch-startup-image">
<!-- iPad (landscape) SPLASHSCREEN-->
<link href="<?php bloginfo('url'); ?>/apple-touch-startup-image-748x1024.png" media="(device-width: 768px) and (orientation: landscape)" rel="apple-touch-startup-image">
<!-- iPad (Retina, portrait) SPLASHSCREEN-->
<link href="<?php bloginfo('url'); ?>/apple-touch-startup-image-1536x2008.png" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPad (Retina, landscape) SPLASHSCREEN-->
<link href="<?php bloginfo('url'); ?>/apple-touch-startup-image-1496x2048.png" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">

<!--[if IE 7]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie7.css" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie8.css" type="text/css" media="screen" />
<![endif]-->
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<?php echo "\n".of_get_option('ttrust_analytics')."\n"; ?>


<?php }




add_action('init', 'remheadlink');
function remheadlink() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}


//////////////////////////////////////////////////////////////
// Custom Background Support
/////////////////////////////////////////////////////////////

if(function_exists('add_custom_background')) add_custom_background();

//////////////////////////////////////////////////////////////
// Body Class
/////////////////////////////////////////////////////////////

function ttrust_body_classes($classes) {	
	
	$classes[] = of_get_option('ttrust_background');	
	return $classes;
}
add_filter('body_class','ttrust_body_classes');


//////////////////////////////////////////////////////////////
// Theme Footer
/////////////////////////////////////////////////////////////

add_action('wp_footer','ttrust_footer');

function ttrust_footer() {		
	wp_reset_query(); 	
	global $wp_query;
	global $post;
	$is_tiled_bkg = get_meta_box_vlaue("_ttrust_background_tile_value");
		if ( !$is_tiled_bkg && !is_archive() && has_single_custom_background() ) {
			include(TEMPLATEPATH . '/js/background_single.php');
		}
		
	if ( false !== strpos($post->post_content, '[slideshow') ) {	
		include(TEMPLATEPATH . '/js/slideshow.php');			
	}		
}




//////////////////////////////////////////////////////////////
// Remove
/////////////////////////////////////////////////////////////

// #more from more-link
function ttrust_remove($content) {
	global $id;
	return str_replace('#more-'.$id.'"', '"', $content);
}
add_filter('the_content', 'ttrust_remove');


//////////////////////////////////////////////////////////////
// Custom Excerpt
/////////////////////////////////////////////////////////////

function excerpt_ellipsis($text) {
	return str_replace('[...]', '...', $text);
}
add_filter('the_excerpt', 'excerpt_ellipsis');


//////////////////////////////////////////////////////////////
// Add Excerpt Support for Pages
/////////////////////////////////////////////////////////////

add_post_type_support( 'page', 'excerpt' );


//////////////////////////////////////////////////////////////
// Get Meta Box Value
/////////////////////////////////////////////////////////////

function get_meta_box_vlaue($m) {
	global $wp_query;
	global $post;
	$meta_box_value = get_post_meta($post->ID, $m, true);
	return $meta_box_value;
}

//////////////////////////////////////////////////////////////
// Pagination Styles
/////////////////////////////////////////////////////////////

add_action( 'wp_print_styles', 'ttrust_deregister_styles', 100 );
function ttrust_deregister_styles() {
	wp_deregister_style( 'wp-pagenavi' );
}
remove_action('wp_head', 'pagenavi_css');
remove_action('wp_print_styles', 'pagenavi_stylesheets');


//////////////////////////////////////////////////////////////
// Navigation Menus
/////////////////////////////////////////////////////////////

add_theme_support('menus');
register_nav_menu('main', 'Main Navigation Menu');
register_nav_menu('mobile_menu', 'Mobile Menu');
register_nav_menu('right', 'Right Navigation Menu');
register_nav_menu('left', 'Left Navigation Menu');
register_nav_menu('big_footer', 'Big Footer Menu');
register_nav_menu('footer', 'Footer Navigation Menu');
register_nav_menu('header_small', 'Small Header Links');
register_nav_menu('footer_small', 'Small Footer Links');


function default_nav() {
	echo '<ul class="sf-menu clearfix" >';					
		wp_list_pages('sort_column=menu_order&title_li='); 
	echo '</ul>';
}


//////////////////////////////////////////////////////////////
// Navigation Description Walker (w45)
/////////////////////////////////////////////////////////////
class w45_description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}
//////////////////////////////////////////////////////////////
// Custom Background
/////////////////////////////////////////////////////////////

add_theme_support( 'custom-background');


//////////////////////////////////////////////////////////////
// Feature Images (Post Thumbnails)
/////////////////////////////////////////////////////////////

add_theme_support('post-thumbnails');

set_post_thumbnail_size(100, 100, true);
add_image_size('ttrust_post_thumb_big', 720, 220, true);
add_image_size('ttrust_post_thumb_small', 150, 150, true);
add_image_size('ttrust_post_thumb_tiny', 50, 50, true);
add_image_size('w45_square_thumb_60', 60, 60, true);
add_image_size('w45_square_thumb_350', 350, 350, true);
add_image_size('w45_home_slide', 1600, 600, true);
add_image_size('ttrust_one_third_cropped', 300, 175, true);
add_image_size('w45_600x400_cropped', 600, 400, true);
//add_image_size('w45_600x750_cropped', 600, 750, true);

if(of_get_option('w45_product_image_width') & of_get_option('w45_product_image_height')) {
$w45_product_width = of_get_option('w45_product_image_width');
$w45_product_height = of_get_option('w45_product_image_height');
add_image_size('w45_product_cropped', $w45_product_width, $w45_product_height, true);
} else {
add_image_size('w45_product_cropped', 600, 400, true);
}

new MultiPostThumbnails(array(
	'label' => 'Background Image',
	'id' => 'background_image',
	'post_type' => 'page'
	)
);

new MultiPostThumbnails(array(
	'label' => 'Background Image',
	'id' => 'background_image',
	'post_type' => 'post'
	)
);

new MultiPostThumbnails(array(
	'label' => 'Background Image',
	'id' => 'background_image',
	'post_type' => 'project'
	)
);

new MultiPostThumbnails(array(
	'label' => 'Background Image',
	'id' => 'background_image',
	'post_type' => 'product'
	)
);

 add_image_size('ttrust_background_image_full', 3000, 30000);

// Hide MultiPostThumbnails Links in regular media upload page

function multi_post_thumbnail_links() {
   echo '<style type="text/css">
           .media-php .post-slidewhow_image-thumbnail{display: none;}
           .media-php .page-slidewhow_image-thumbnail{display: none;}
           .media-php .project-slidewhow_image-thumbnail{display: none;}
         </style>';
}

add_action('admin_head', 'multi_post_thumbnail_links');

function get_single_custom_background() {	
	global $wp_query;
	global $post;
	$post_type = get_post_type($post->ID);
	$is_tiled_bkg = get_post_meta($post->ID, "_ttrust_background_tile_value", true);
	$custom_background_img = MultiPostThumbnails::get_the_post_thumbnail_url($post_type, "background_image", $post->ID, "ttrust_background_image_full");
	return $custom_background_img;	
}

function has_single_custom_background() {	
	if(get_single_custom_background()){
		return true;
	}
}


//////////////////////////////////////////////////////////////
// Button Shortcode
/////////////////////////////////////////////////////////////

function ttrust_button($a) {
	extract(shortcode_atts(array(
		'label' 	=> 'Button Text',
		'id' 	=> '1',
		'url'	=> '',
		'target' => '_parent',		
		'size'	=> '',
		'ptag'	=> false
	), $a));
	
	$link = $url ? $url : get_permalink($id);	
	
	if($ptag) :
		return  wpautop('<a href="'.$link.'" target="'.$target.'" class="button '.$size.'">'.$label.'</a>');
	else :
		return '<a href="'.$link.'" target="'.$target.'" class="button '.$size.'">'.$label.'</a>';
	endif;
	
}

add_shortcode('button', 'ttrust_button');


//////////////////////////////////////////////////////////////
// Toggle Panel
/////////////////////////////////////////////////////////////


function w45_toggle_panel( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'title' 	=> 'Button Text',
		
	), $atts));
   return '<article class="toggle-panel minimal title-plus-icon"><h1>'.$title.'</h1>' . do_shortcode(wpautop($content)) . '</article>';
}

add_shortcode('toggle_panel', 'w45_toggle_panel');




//////////////////////////////////////////////////////////////
// Tabs
/////////////////////////////////////////////////////////////

function w45_tab_panel( $atts, $content = null ) {
   return '<div class="tabs hide-title cross-fade underlined_tabs">' . do_shortcode(wpautop($content)) . '</div>';
}
add_shortcode('tab_panel', 'w45_tab_panel');



function w45_tab( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'title' 	=> 'Button Text',
		
	), $atts));
   return '<section><h1>'.$title.'</h1>' . do_shortcode(wpautop($content)) . '</section>';
}

add_shortcode('tab', 'w45_tab');




//////////////////////////////////////////////////////////////
// Column Shortcodes
/////////////////////////////////////////////////////////////


function ttrust_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode(wpautop($content)) . '</div>';
}
add_shortcode('one_fourth', 'ttrust_one_fourth');

function ttrust_one_fourth_mid( $atts, $content = null ) {
   return '<div class="one_fourth mid">' . do_shortcode(wpautop($content)) . '</div>';
}

add_shortcode('one_fourth_mid', 'ttrust_one_fourth_mid');

function ttrust_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode(wpautop($content)) . '</div>';
}
add_shortcode('one_fourth_last', 'ttrust_one_fourth_last');


//one_sixth
function w45_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode(wpautop($content)) . '</div>';
}
add_shortcode('one_sixth', 'w45_one_sixth');

function w45_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth last">' . do_shortcode(wpautop($content)) . '</div>';
}
add_shortcode('one_sixth_last', 'w45_one_sixth_last');






function ttrust_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode(wpautop($content)) . '</div>';
}
add_shortcode('one_third', 'ttrust_one_third');

function ttrust_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode(wpautop($content)) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'ttrust_one_third_last');

function ttrust_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode(wpautop($content)) . '</div>';
}
add_shortcode('two_third', 'ttrust_two_third');

function ttrust_two_third_last( $atts, $content = null ) {
   return '<div class="two_third last">' . do_shortcode(wpautop($content)) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'ttrust_two_third_last');

function ttrust_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode(wpautop($content)) . '</div>';
}
add_shortcode('one_half', 'ttrust_one_half');

function ttrust_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode(wpautop($content)) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_half_last', 'ttrust_one_half_last');


//////////////////////////////////////////////////////////////
// Slideshow Shortcode
/////////////////////////////////////////////////////////////

function ttrust_slideshow( $atts, $content = null ) {
    $content = str_replace('<br />', '', $content);
	$content = str_replace('<img', '<li><img', $content);
	$content = str_replace('/>', '/></li>', $content);
	return '<div class="flexslider clearfix"><ul class="slides">' . $content . '</ul></div>';
}
add_shortcode('slideshow', 'ttrust_slideshow');

//////////////////////////////////////////////////////////////
// Elastic Video
/////////////////////////////////////////////////////////////

function ttrust_elasticVideo( $atts, $content = null ) {    
	return '<div class="videoContainer">' . $content . '</div>';
}
add_shortcode('elastic-video', 'ttrust_elasticVideo');

//////////////////////////////////////////////////////////////
// Add conainers to all videos
/////////////////////////////////////////////////////////////

function add_video_containers($content) { 
	$content = str_replace('<object', '<div class="videoContainer"><object', $content);
	$content = str_replace('</object>', '</object></div>', $content);
	
	$content = str_replace('<embed', '<div class="videoContainer"><embed', $content);
	$content = str_replace('</embed>', '</embed></div>', $content);
	
	$content = str_replace('<iframe', '<div class="videoContainer"><iframe', $content);
	$content = str_replace('</iframe>', '</iframe></div>', $content);
	
	return $content;
}

add_action('the_content', 'add_video_containers');  

//////////////////////////////////////////////////////////////
// Home Custom Excerpt
/////////////////////////////////////////////////////////////

// Variable & intelligent excerpt length.
function print_excerpt($title) { // Max excerpt length. Length is set in characters
	global $post;

	$rem_len = ""; //clear variable
	$title_len = strlen($title); //get length of title
	$excerpt_line=20;
	if($title_len <= 30){
    	$rem_len=$excerpt_line*8; //calc space remaining for excerpt
	}elseif($title_len <= 34){
    	$rem_len=$excerpt_line*7;
	}elseif($title_len <= 51){
    	$rem_len=$excerpt_line*6;
	}elseif($title_len <= 68){
    	$rem_len=$excerpt_line*5;
	}elseif($title_len <= 85){
    	$rem_len=$excerpt_line*4;
	}

	$text = $post->post_excerpt;
	if ( '' == $text ) {
    	$text = get_the_content('');
    	$text = apply_filters('the_content', $text);
    	$text = str_replace(']]>', ']]>', $text);
	}
	$text = strip_shortcodes($text); // optional, recommended
	$text = strip_tags($text,'<p>'); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags

	$text = substr($text,0,$rem_len);
	$excerpt = reverse_strrchr($text, ' ', 1) . "&#0133;";
	if( $excerpt ) {
    	echo apply_filters('the_excerpt',$excerpt);
	} else {
    	echo apply_filters('the_excerpt',$text);
	}
}

// Returns the portion of haystack which goes until the last occurrence of needle
function reverse_strrchr($haystack, $needle, $trail) {
    return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}


//////////////////////////////////////////////////////////////
// Custom More Link
/////////////////////////////////////////////////////////////

function more_link() {
	global $post;	
	$more_link = '<p class="moreLink"><a href="'.get_permalink().'" title="'.get_the_title().'">';
	$more_link .= '<span>'.__('Read More', 'themetrust').'</span>';
	$more_link .= '</a></p>';
	echo $more_link;	
}

//////////////////////////////////////////////////////////////
// Custom Sanitize for Theme Options
/////////////////////////////////////////////////////////////

add_action('admin_init','optionscheck_change_santiziation', 100);
 

function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}
 
function custom_sanitize_textarea($input) {
    global $allowedposttags;
    
      $custom_allowedtags["script"] = array();
 
      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}


//////////////////////////////////////////////////////////////
// Custom Post Types and Custom Taxonamies
/////////////////////////////////////////////////////////////

add_action( 'init', 'create_post_types' );

function create_post_types() {
	
	$labels = array(
		'name' => __( 'Projects' ),
		'singular_name' => __( 'Project' ),
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add New Project' ),
		'edit' => __( 'Edit' ),
		'edit_item' => __( 'Edit Project' ),
		'new_item' => __( 'New Project' ),
		'view' => __( 'View Project' ),
		'view_item' => __( 'View Project' ),
		'search_items' => __( 'Search Projects' ),
		'not_found' => __( 'No projects found' ),
		'not_found_in_trash' => __( 'No projects found in Trash' ),
		'parent' => __( 'Parent Project' ),
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,		
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail', 'comments', 'revisions', 'excerpt')
	); 	
	
	register_post_type( 'project' , $args );
	flush_rewrite_rules( false );
}

add_action( 'init', 'create_taxonomies' );
function create_taxonomies() {
	$labels = array(
    	'name' => __( 'Skills' ),
    	'singular_name' => __( 'Skill' ),
    	'search_items' =>  __( 'Search Skills' ),
    	'all_items' => __( 'All Skills' ),
    	'parent_item' => __( 'Parent Skill' ),
    	'parent_item_colon' => __( 'Parent Skill:' ),
    	'edit_item' => __( 'Edit Skill' ),
    	'update_item' => __( 'Update Skill' ),
    	'add_new_item' => __( 'Add New Skill' ),
    	'new_item_name' => __( 'New Skill Name' )
  	); 	

  	register_taxonomy('skill','project',array(
    	'hierarchical' => true,
    	'labels' => $labels
  	));
	flush_rewrite_rules( false );
}

// List custom post type taxonomies

function ttrust_get_terms( $id = '' ) {
  global $post;

  if ( empty( $id ) )
    $id = $post->ID;

  if ( !empty( $id ) ) {
    $post_taxonomies = array();
    $post_type = get_post_type( $id );
    $taxonomies = get_object_taxonomies( $post_type , 'names' );

    foreach ( $taxonomies as $taxonomy ) {
      $term_links = array();
      $terms = get_the_terms( $id, $taxonomy );

      if ( is_wp_error( $terms ) )
        return $terms;

      if ( $terms ) {
        foreach ( $terms as $term ) {
          $link = get_term_link( $term, $taxonomy );
          if ( is_wp_error( $link ) )
            return $link;
          $term_links[] = '<li><span><a href="'.$link.'">' . $term->name . '</a></span></li>';
        }
      }

      $term_links = apply_filters( "term_links-$taxonomy" , $term_links );
      $post_terms[$taxonomy] = $term_links;
    }
    return $post_terms;
  } else {
    return false;
  }
}

function ttrust_get_terms_list( $id = '' , $echo = true ) {
  global $post;

  if ( empty( $id ) )
    $id = $post->ID;

  if ( !empty( $id ) ) {
    $my_terms = ttrust_get_terms( $id );
    if ( $my_terms ) {
      $my_taxonomies = array();
      foreach ( $my_terms as $taxonomy => $terms ) {
        $my_taxonomy = get_taxonomy( $taxonomy );
        if ( !empty( $terms ) ) $my_taxonomies[] = implode( $terms);
      }

      if ( !empty( $my_taxonomies ) ) {
	    $output = "";
        foreach ( $my_taxonomies as $my_taxonomy ) {
          $output .= $my_taxonomy . "\n";
        }        
      }

      if ( $echo )
        if(isset($output)) echo $output;
      else
        if(isset($output)) return $output;
    } else {
      return;
    }
  } else {
    return false;
  }
}





//////////////////////////////////////////////////////////////
// Meta Box
/////////////////////////////////////////////////////////////

$prefix = "_ttrust_";

$project_details = array(		

		"url" => array(
    	"type" => "textfield",
		"name" => $prefix."url",
    	"std" => "",
    	"title" => __('URL','themetrust'),
    	"description" => __('Enter the URL of your project.','themetrust')),

		"url_label" => array(
		"type" => "textfield",
		"name" => $prefix."url_label",
		"std" => "",
		"title" => __('URL Label','themetrust'),
		"description" => __('Enter a label for the URL.','themetrust'))		
);

$page_options = array(	
		"description" => array(
    	"type" => "textarea",
		"name" => $prefix."page_description",
    	"std" => "",
    	"title" => __('Description','themetrust'),
    	"description" => __('Enter a description about this page.','themetrust'))		
);

$portfolio_options = array(	
		"notes" => array(
    	"type" => "textarea",
		"name" => $prefix."page_skills",
    	"std" => "",
    	"title" => __('Skills','themetrust'),
    	"description" => __('For use with the Portfolio page template. <br/><br/>Enter the names of the skills (separated by commas) you want shown on this page. If left blank, all skills will be used.','themetrust'))
);

$home_feature_options = array(
		"featured" => array(
    	"type" => "checkbox",
		"name" => $prefix."featured",
    	"std" => "",
    	"title" => __('Feature on Home','themetrust'),
    	"description" => __('Check this box to feature this on the home page.','themetrust'))
);

$background_options = array(
		"featured" => array(
    	"type" => "checkbox",
		"name" => $prefix."background_tile",
    	"std" => "",
    	"title" => __('Tile Background','themetrust'),
    	"description" => __('Check this box if you want the background image to be tiled instead of full screen.','themetrust'))
);



$meta_box_groups = array($project_details, $page_options, $portfolio_options, $home_feature_options, $background_options);

function new_meta_box($post, $metabox) {	
	
	$meta_boxes_inputs = $metabox['args']['inputs'];

	foreach($meta_boxes_inputs as $meta_box) {
	
		$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		if($meta_box_value == "") $meta_box_value = $meta_box['std'];
		
		echo'<div class="meta-field">';
		
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		
		echo'<p><strong>'.$meta_box['title'].'</strong></p>';
		
		if(isset($meta_box['type']) && $meta_box['type'] == 'checkbox') {
		
			if($meta_box_value == 'true') {
				$checked = "checked=\"checked\"";
			} elseif($meta_box['std'] == "true") {	
					$checked = "checked=\"checked\"";	
			} else {
					$checked = "";
			}
		
			echo'<p class="clearfix"><input type="checkbox" class="meta-radio" name="'.$meta_box['name'].'_value" id="'.$meta_box['name'].'_value" value="true" '.$checked.' /> ';		
			echo'<label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p><br />';		
		
		} elseif(isset($meta_box['type']) && $meta_box['type'] == 'textarea')  {			
			
			echo'<textarea rows="4" style="width:98%" name="'.$meta_box['name'].'_value" id="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br />';			
			echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p><br />';			
		
		} else {
			
			echo'<input style="width:70%"type="text" name="'.$meta_box['name'].'_value" id="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" /><br />';		
			echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p><br />';			
		
		}
		
		echo'</div>';
		
	} // end foreach
		
	echo'<br style="clear:both" />';
	
} // end meta boxes

function create_meta_box() {	
	global $project_details, $page_options, $portfolio_options, $home_feature_options, $background_options;	
	
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'new-meta-boxes-details', __('Project Options','themetrust'), 'new_meta_box', 'project', 'normal', 'high', array('inputs'=>$project_details) );				
		add_meta_box( 'new-meta-boxes-page-options', __('Page Options','themetrust'), 'new_meta_box', 'page', 'side', 'low', array('inputs'=>$page_options) );	
		add_meta_box( 'new-meta-boxes-portfolio-options', __('Portfolio Options','themetrust'), 'new_meta_box', 'page', 'side', 'low', array('inputs'=>$portfolio_options) );		
		add_meta_box( 'new-meta-boxes-home-feature', __('Home Feature Options','themetrust'), 'new_meta_box', 'project', 'normal', 'high', array('inputs'=>$home_feature_options) );
		add_meta_box( 'new-meta-boxes-home-feature', __('Home Feature Options','themetrust'), 'new_meta_box', 'page', 'normal', 'high', array('inputs'=>$home_feature_options) );
		add_meta_box( 'new-meta-boxes-home-feature', __('Home Feature Options','themetrust'), 'new_meta_box', 'product', 'normal', 'high', array('inputs'=>$home_feature_options) );
		add_meta_box( 'new-meta-boxes-home-feature', __('Home Feature Options','themetrust'), 'new_meta_box', 'post', 'normal', 'high', array('inputs'=>$home_feature_options) );
		//background options
		add_meta_box( 'new-meta-boxes-background-options', __('Background Options','themetrust'), 'new_meta_box', 'page', 'side', 'low', array('inputs'=>$background_options) );
		add_meta_box( 'new-meta-boxes-background-options', __('Background Options','themetrust'), 'new_meta_box', 'post', 'side', 'low', array('inputs'=>$background_options) );
		add_meta_box( 'new-meta-boxes-background-options', __('Background Options','themetrust'), 'new_meta_box', 'project', 'side', 'low', array('inputs'=>$background_options) );
		add_meta_box( 'new-meta-boxes-background-options', __('Background Options','themetrust'), 'new_meta_box', 'product', 'side', 'low', array('inputs'=>$background_options) );
	}
}



function save_postdata( $post_id ) {
global $post, $new_meta_boxes, $meta_box_groups;

if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
	return $post_id;
}

if( defined('DOING_AJAX') && DOING_AJAX ) { //Prevents the metaboxes from being overwritten while quick editing.
	return $post_id;
}

if( ereg('/\edit\.php', $_SERVER['REQUEST_URI']) ) { //Detects if the save action is coming from a quick edit/batch edit.
	return $post_id;
}

foreach($meta_box_groups as $group) {
	foreach($group as $meta_box) {

		// Verify
		if(isset($_POST[$meta_box['name'].'_noncename'])){
			if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
				return $post_id;
			}
		}

		if ( isset($_POST['post_type']) && 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ))
				return $post_id;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ))
				return $post_id;
		}

		$data = "";
		if(isset($_POST[$meta_box['name'].'_value'])){
			$data = $_POST[$meta_box['name'].'_value'];
		}


		if(get_post_meta($post_id, $meta_box['name'].'_value') == "") 
			add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
		elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
			update_post_meta($post_id, $meta_box['name'].'_value', $data);
		elseif($data == "" || $data == $meta_box['std'] )
			delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
	
		} // end foreach
	} // end foreach
} // end save_postdata

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');



//////////////////////////////////////////////////////////////
// Custom Login Styles 
/////////////////////////////////////////////////////////////

 // verander de url op de login pagina
    function put_my_url(){
    	
    return (home_url()); // verander in de url van je website
    }
    add_filter('login_headerurl', 'put_my_url');


function custom_login() { 
$w45_logo = of_get_option('logo');
echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/css/child_style.css" />'; 



echo '<style>.login h1 a{background-image: url('. $w45_logo . ')}</style>';

}

add_action('login_head', 'custom_login');



//////////////////////////////////////////////////////////////
// Add Sub Admin
/////////////////////////////////////////////////////////////


function add_theme_caps() {
    $role = get_role( 'site-admin' );
    // create if neccesary
    if (!$role) $role = add_role('site-admin', 'Site Admin'); 
    // add theme specific roles
    $role->add_cap('activate_plugins');
    $role->add_cap('add_users');
    $role->add_cap('create_users');
    $role->add_cap('delete_others_posts');
    $role->add_cap('delete_pages');
    $role->add_cap('delete_plugins');
    $role->add_cap('delete_posts');
    $role->add_cap('delete_private_pages');
    $role->add_cap('delete_private_posts');
    $role->add_cap('delete_published_pages');
    $role->add_cap('delete_published_posts');
    $role->add_cap('delete_users');
    $role->add_cap('edit_dashboard');
    $role->add_cap('edit_files');
    $role->add_cap('edit_others_posts');
    $role->add_cap('edit_pages');
    $role->add_cap('edit_posts');
    $role->add_cap('edit_private_pages');
    $role->add_cap('edit_others_pages');
    $role->add_cap('edit_private_posts');
    $role->add_cap('edit_published_pages');
    $role->add_cap('edit_published_posts');
    $role->add_cap('edit_theme_options');
    $role->add_cap('export');
    $role->add_cap('import');
    $role->add_cap('list_users');
    $role->add_cap('manage_categories');
    $role->add_cap('manage_links');
   // $role->add_cap('manage_options');
    $role->add_cap('moderate_comments');
    $role->add_cap('publish_pages');
    $role->add_cap('publish_posts');
    $role->add_cap('read_private_pages');
    $role->add_cap('read_private_pages');
    $role->add_cap('read_private_posts');
    $role->add_cap('read');
    $role->add_cap('remove_users');
    $role->add_cap('switch_themes');
    $role->add_cap('unfiltered_upload');
    $role->add_cap('upload_files');
    

    //woocommerce
    $role->add_cap('manage_woocommerce');
    $role->add_cap('manage_woocommerce_orders');
    $role->add_cap('manage_woocommerce_coupons');
    $role->add_cap('manage_woocommerce_products');
    $role->add_cap('view_woocommerce_reports');
   

}
add_action( 'admin_init', 'add_theme_caps');



//////////////////////////////////////////////////////////////
// Remove User Roles (uncoment and refresh to remeove role)
/////////////////////////////////////////////////////////////
//view role names
// $wp_roles = new WP_Roles();
// $names = $wp_roles->get_names();
// print_r($names);

// $wp_roles = new WP_Roles();
// $wp_roles->remove_role("site-admin");

//////////////////////////////////////////////////////////////
// Disable anyone from adding or editing administraitors
/////////////////////////////////////////////////////////////


class JPB_User_Caps {

  // Add our filters
  function JPB_User_Caps(){
    add_filter( 'editable_roles', array(&$this, 'editable_roles'));
    add_filter( 'map_meta_cap', array(&$this, 'map_meta_cap'),10,4);
  }

  // Remove 'Administrator' from the list of roles if the current user is not an admin
  function editable_roles( $roles ){
    if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
      unset( $roles['administrator']);
    }
    return $roles;
  }

  // If someone is trying to edit or delete and admin and that user isn't an admin, don't allow it
  function map_meta_cap( $caps, $cap, $user_id, $args ){

    switch( $cap ){
        case 'edit_user':
        case 'remove_user':
        case 'promote_user':
            if( isset($args[0]) && $args[0] == $user_id )
                break;
            elseif( !isset($args[0]) )
                $caps[] = 'do_not_allow';
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        case 'delete_user':
        case 'delete_users':
            if( !isset($args[0]) )
                break;
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        default:
            break;
    }
    return $caps;
  }

}

$jpb_user_caps = new JPB_User_Caps();




//////////////////////////////////////////////////////////////
// Remove Dashboard Widgets
/////////////////////////////////////////////////////////////


function example_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
} 


add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );


//////////////////////////////////////////////////////////////
// Remove Dashboard Menus
/////////////////////////////////////////////////////////////
if (!current_user_can('manage_options')) {	

add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
	//remove_menu_page('edit.php');
	remove_menu_page('link-manager.php');
	//remove_menu_page('themes.php');
	
	remove_menu_page('tools.php');
	remove_menu_page('upload.php');
	remove_menu_page('edit-comments.php');
	remove_menu_page('plugins.php');
	remove_submenu_page( 'index.php', 'update-core.php');
	remove_submenu_page( 'options-general.php', 'options-media.php' );
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page('themes.php', 'theme-install.php' );
}
}



// function remove_menus () {
// global $menu;
// 	//$restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
// 	$restricted = array(__('Dashboard'),   __('Links'),   __('Tools'), __('Users'),  __('Plugins'));
// 	end ($menu);
// 	while (prev($menu)){
// 		$value = explode(' ',$menu[key($menu)][0]);
// 		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
// 	}
// }
// add_action('admin_menu', 'remove_menus');

//////////////////////////////////////////////////////////////
// Custom WordPress Admin Color Scheme
/////////////////////////////////////////////////////////////

function admin_css() {
    wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin.css' );
}
add_action('admin_print_styles', 'admin_css' );



//////////////////////////////////////////////////////////////
// Woocomerce 
/////////////////////////////////////////////////////////////

remove_action( 'woocommerce_product_tabs', 'woocommerce_product_reviews_tab', 30);
remove_action( 'woocommerce_product_tab_panels', 'woocommerce_product_reviews_panel', 30);

remove_action( 'woocommerce_product_tabs', 'woocommerce_product_description_tab', 10);
//remove_action( 'woocommerce_product_tab_panels', 'woocommerce_product_description_panel', 10);
//remove_action( 'woocommerce_product_tabs', 'woocommerce_product_attributes_tab', 20);
//remove_action( 'woocommerce_product_tab_panels', 'woocommerce_product_attributes_panel', 20);


// Add to cart checkout redirect
function add_to_cart_checkout_redirect() {
	wp_safe_redirect( get_permalink( get_option( 'woocommerce_checkout_page_id' ) ) );
	die();
}
//add_action( 'woocommerce_add_to_cart',  'add_to_cart_checkout_redirect', 11 );


// Change empty price
function custom_empty_price( $price, $product ) {
	return 'No Price';
}
add_filter( 'woocommerce_variable_empty_price_html', 'custom_empty_price', 10, 2 );
add_filter( 'woocommerce_empty_price_html', 'custom_empty_price', 10, 2 );


//Move sort dropdown to top of page
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 11 );
remove_action( 'woocommerce_pagination', 'woocommerce_catalog_ordering', 20 );


//////////////////////////////////////////////////////////////
// W45 Homepage Slide Control
/////////////////////////////////////////////////////////////


add_action( 'init', 'create_w45_slide' );


function create_w45_slide() {
register_post_type( 'w45_slides',
array(
'labels' => array(
'name' => 'Slides',
'singular_name' => 'Slide',
'add_new' => 'Add New',
'add_new_item' => 'Add New Slide',
'edit' => 'Edit',
'edit_item' => 'Edit Slide',
'new_item' => 'New Slide',
'view' => 'View',
'view_item' => 'View Slides',
'search_items' => 'Search Slides',
'not_found' => 'No Slides found',
'not_found_in_trash' =>
'No Slides found in Trash',
'parent' => 'Parent Slide'
),
'public' => true,
'menu_position' => 15,
'supports' =>
array( 'title', excerpt, page-attributes  ),
'taxonomies' => array( '' ),
'menu_icon' =>
get_template_directory_uri().'/images/image.png',
'has_archive' => true
)
);
}

//add_action( 'admin_init', 'my_admin' );

function my_admin() {
add_meta_box( 'slide_settings_meta_box', 'Slide Settings', 'display_slide_settings_meta_box', 'w45_slides', 'normal', 'high' );
}

function display_slide_settings_meta_box( $w45_slide ) {
// Retrieve current name of the Director and Movie Rating based on review ID
$slide_url = esc_html( get_post_meta( $w45_slide->ID, 'slide_url', true ) );
$slide_button_url = esc_html( get_post_meta( $w45_slide->ID, 'slide_button_url', true ) );
$slide_button_label = esc_html( get_post_meta( $w45_slide->ID, 'slide_button_label', true ) );
$slide_drop_settings = intval( get_post_meta( $w45_slide->ID, 'slide_drop_settings', true ) );
?>
<table>
<tr>
<td style="width: 100%">Slide URL</td>
<td><input type="text" size="80" name="slide_url" value="<?php echo $slide_url; ?>" /></td>
</tr>

<tr>
<td style="width: 100%">Slide Button Label</td>
<td><input type="text" size="80" name="slide_button_label" value="<?php echo $slide_button_label; ?>" /></td>
</tr>

<tr>
<td style="width: 100%">Slide Button URL</td>
<td><input type="text" size="80" name="slide_button_url" value="<?php echo $slide_button_url; ?>" /></td>
</tr>

<tr>
<td style="width: 150px">Slide Settings</td>
<td>
<select style="width: 100px" name="slide_drop_settings">
<?php
// Generate all items of drop-down list
for ( $rating = 5; $rating >= 1; $rating -- ) {
?>
<option value="<?php echo $rating; ?>" <?php echo selected( $rating, $slide_drop_settings ); ?>>
<?php echo $rating; ?> stars <?php } ?>
</select>
</td>
</tr>
</table>
<?php }

add_action( 'save_post', 'add_slide_settings_fields', 10, 2 );


function add_slide_settings_fields( $slide_settings_id, $w45_slide ) {
// Check post type for movie reviews
if ( $w45_slide->post_type == 'w45_slides' ) {
// Store data in post meta table if present in post data
if ( isset( $_POST['slide_url'] ) &&
$_POST['slide_url'] != '' ) {
update_post_meta( $slide_settings_id, 'slide_url',
$_POST['slide_url'] );
}

if ( isset( $_POST['slide_button_label'] ) &&
$_POST['slide_button_label'] != '' ) {
update_post_meta( $slide_settings_id, 'slide_button_label',
$_POST['slide_button_label'] );
}

if ( isset( $_POST['slide_button_url'] ) &&
$_POST['slide_button_url'] != '' ) {
update_post_meta( $slide_settings_id, 'slide_button_url',
$_POST['slide_button_url'] );
}

if ( isset( $_POST['slide_drop_settings'] ) &&
$_POST['slide_drop_settings'] != '' ) {
update_post_meta( $slide_settings_id, 'slide_drop_settings',
$_POST['slide_drop_settings'] );
}
}
}






//////////////////////////////////////////////////////////////
// Slider Meta Boxes
/////////////////////////////////////////////////////////////


// Add the Meta Box
function add_custom_meta_box() {
    add_meta_box(
		'custom_meta_box', // $id
		'Homepage Slide Settings', // $title 
		'show_custom_meta_box', // $callback
		'w45_slides', // $page
		'normal', // $context
		'high'); // $priority
}
add_action('add_meta_boxes', 'add_custom_meta_box');

// Field Array
$prefix = 'w45_slide_';
$custom_meta_fields = array(
	array(
		'label'	=> 'Image',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'image',
		'type'	=> 'image'
	),

	array(
		'label'	=> 'Feature on homepage',
		'desc'	=> 'Check to show on homepage.',
		'id'	=> $prefix.'featured',
		'type'	=> 'checkbox'
	),

	array(
		'label'	=> 'show Info Box',
		'desc'	=> 'Check to show info box.',
		'id'	=> $prefix.'info_box',
		'type'	=> 'checkbox'
	),

	array(
		'label'	=> 'Button Label',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'button_label',
		'type'	=> 'text'
	),
	array(
		'label'	=> 'Button Link',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'button_link',
		'type'	=> 'text'
	)
	// array(
	// 	'label'	=> 'Textarea',
	// 	'desc'	=> 'A description for the field.',
	// 	'id'	=> $prefix.'textarea',
	// 	'type'	=> 'textarea'
	// ),
	// array(
	// 	'label'	=> 'Checkbox Input',
	// 	'desc'	=> 'A description for the field.',
	// 	'id'	=> $prefix.'checkbox',
	// 	'type'	=> 'checkbox'
	// ),
	// array(
	// 	'label'	=> 'Select Box',
	// 	'desc'	=> 'A description for the field.',
	// 	'id'	=> $prefix.'select',
	// 	'type'	=> 'select',
	// 	'options' => array (
	// 		'one' => array (
	// 			'label' => 'Option One',
	// 			'value'	=> 'one'
	// 		),
	// 		'two' => array (
	// 			'label' => 'Option Two',
	// 			'value'	=> 'two'
	// 		),
	// 		'three' => array (
	// 			'label' => 'Option Three',
	// 			'value'	=> 'three'
	// 		)
	// 	)
	// ),
	// array (
	// 	'label'	=> 'Radio Group',
	// 	'desc'	=> 'A description for the field.',
	// 	'id'	=> $prefix.'radio',
	// 	'type'	=> 'radio',
	// 	'options' => array (
	// 		'one' => array (
	// 			'label' => 'Option One',
	// 			'value'	=> 'one'
	// 		),
	// 		'two' => array (
	// 			'label' => 'Option Two',
	// 			'value'	=> 'two'
	// 		),
	// 		'three' => array (
	// 			'label' => 'Option Three',
	// 			'value'	=> 'three'
	// 		)
	// 	)
	// ),
	// array (
	// 	'label'	=> 'Checkbox Group',
	// 	'desc'	=> 'A description for the field.',
	// 	'id'	=> $prefix.'checkbox_group',
	// 	'type'	=> 'checkbox_group',
	// 	'options' => array (
	// 		'one' => array (
	// 			'label' => 'Option One',
	// 			'value'	=> 'one'
	// 		),
	// 		'two' => array (
	// 			'label' => 'Option Two',
	// 			'value'	=> 'two'
	// 		),
	// 		'three' => array (
	// 			'label' => 'Option Three',
	// 			'value'	=> 'three'
	// 		)
	// 	)
	// ),
	// array(
	// 	'label'	=> 'Category',
	// 	'id'	=> 'category',
	// 	'type'	=> 'tax_select'
	// ),
	// array(
	// 	'label'	=> 'Post List',
	// 	'desc'	=> 'A description for the field.',
	// 	'id'	=>  $prefix.'post_id',
	// 	'type'	=> 'post_list',
	// 	'post_type' => array('post','page')
	// ),
	// array(
	// 	'label'	=> 'Date',
	// 	'desc'	=> 'A description for the field.',
	// 	'id'	=> $prefix.'date',
	// 	'type'	=> 'date'
	// ),
	// array(
	// 	'label'	=> 'Slider',
	// 	'desc'	=> 'A description for the field.',
	// 	'id'	=> $prefix.'slider',
	// 	'type'	=> 'slider',
	// 	'min'	=> '0',
	// 	'max'	=> '100',
	// 	'step'	=> '5'
	// ),
	
	// array(
	// 	'label'	=> 'Repeatable',
	// 	'desc'	=> 'A description for the field.',
	// 	'id'	=> $prefix.'repeatable',
	// 	'type'	=> 'repeatable'
	// ),
	
);


if(is_admin()) {
// enqueue scripts and styles, but only if is_admin
function my_admin_scripts() {

	 wp_enqueue_script('media-upload');
	 wp_enqueue_script('thickbox');
	 wp_enqueue_script('jquery-ui-datepicker');
	 wp_enqueue_script('jquery-ui-slider');

	 wp_enqueue_script('custom-js', get_template_directory_uri().'/js/custom-js.js');
	//wp_enqueue_script('custom-js', get_template_directory_uri().'/js/custom-js-ck.js');
	
	}

function my_admin_styles() {
	wp_enqueue_style('jquery-ui-custom', get_template_directory_uri().'/css/jquery-ui-custom.css');
	wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');


}
// function my_admin_scripts() {
// wp_enqueue_script('media-upload');
// wp_enqueue_script('thickbox');
// wp_register_script('my-upload', get_bloginfo('template_url') . '/functions/my-script.js', array('jquery','media-upload','thickbox'));
// wp_enqueue_script('my-upload');
// }
// function my_admin_styles() {
// wp_enqueue_style('thickbox');
// }
// add_action('admin_print_scripts', 'my_admin_scripts');
// add_action('admin_print_styles', 'my_admin_styles');







// add some custom js to the head of the page
add_action('admin_head','add_custom_scripts');
function add_custom_scripts() {
	global $custom_meta_fields, $post;
	
	$output = '<script type="text/javascript">
				jQuery(function() {';
	
	foreach ($custom_meta_fields as $field) { // loop through the fields looking for certain types
		// date
		if($field['type'] == 'date')
			$output .= 'jQuery(".datepicker").datepicker();';
		// slider
		if ($field['type'] == 'slider') {
			$value = get_post_meta($post->ID, $field['id'], true);
			if ($value == '') $value = $field['min'];
			$output .= '
					jQuery( "#'.$field['id'].'-slider" ).slider({
						value: '.$value.',
						min: '.$field['min'].',
						max: '.$field['max'].',
						step: '.$field['step'].',
						slide: function( event, ui ) {
							jQuery( "#'.$field['id'].'" ).val( ui.value );
						}
					});';
		}
	}
	
	$output .= '});
		</script>';
		
	echo $output;
}

// The Callback
function show_custom_meta_box() {
	global $custom_meta_fields, $post;
	// Use nonce for verification
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
	
	// Begin the field table and loop
	echo '<table class="form-table">';
	foreach ($custom_meta_fields as $field) {
		// get value of this field if it exists for this post
		$meta = get_post_meta($post->ID, $field['id'], true);
		// begin a table row with
		echo '<tr>
				<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
				<td>';
				switch($field['type']) {
					// text
					case 'text':
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
								<br /><span class="description">'.$field['desc'].'</span>';
					break;
					// textarea
					case 'textarea':
						echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
								<br /><span class="description">'.$field['desc'].'</span>';
					break;
					// checkbox
					case 'checkbox':
						echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
								<label for="'.$field['id'].'">'.$field['desc'].'</label>';
					break;
					// select
					case 'select':
						echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
						foreach ($field['options'] as $option) {
							echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
						}
						echo '</select><br /><span class="description">'.$field['desc'].'</span>';
					break;
					// radio
					case 'radio':
						foreach ( $field['options'] as $option ) {
							echo '<input type="radio" name="'.$field['id'].'" id="'.$option['value'].'" value="'.$option['value'].'" ',$meta == $option['value'] ? ' checked="checked"' : '',' />
									<label for="'.$option['value'].'">'.$option['label'].'</label><br />';
						}
						echo '<span class="description">'.$field['desc'].'</span>';
					break;
					// checkbox_group
					case 'checkbox_group':
						foreach ($field['options'] as $option) {
							echo '<input type="checkbox" value="'.$option['value'].'" name="'.$field['id'].'[]" id="'.$option['value'].'"',$meta && in_array($option['value'], $meta) ? ' checked="checked"' : '',' /> 
									<label for="'.$option['value'].'">'.$option['label'].'</label><br />';
						}
						echo '<span class="description">'.$field['desc'].'</span>';
					break;
					// tax_select
					case 'tax_select':
						echo '<select name="'.$field['id'].'" id="'.$field['id'].'">
								<option value="">Select One</option>'; // Select One
						$terms = get_terms($field['id'], 'get=all');
						$selected = wp_get_object_terms($post->ID, $field['id']);
						foreach ($terms as $term) {
							if (!empty($selected) && !strcmp($term->slug, $selected[0]->slug)) 
								echo '<option value="'.$term->slug.'" selected="selected">'.$term->name.'</option>'; 
							else
								echo '<option value="'.$term->slug.'">'.$term->name.'</option>'; 
						}
						$taxonomy = get_taxonomy($field['id']);
						echo '</select><br /><span class="description"><a href="'.get_bloginfo('home').'/wp-admin/edit-tags.php?taxonomy='.$field['id'].'">Manage '.$taxonomy->label.'</a></span>';
					break;
					// post_list
					case 'post_list':
					$items = get_posts( array (
						'post_type'	=> $field['post_type'],
						'posts_per_page' => -1
					));
						echo '<select name="'.$field['id'].'" id="'.$field['id'].'">
								<option value="">Select One</option>'; // Select One
							foreach($items as $item) {
								echo '<option value="'.$item->ID.'"',$meta == $item->ID ? ' selected="selected"' : '','>'.$item->post_type.': '.$item->post_title.'</option>';
							} // end foreach
						echo '</select><br /><span class="description">'.$field['desc'].'</span>';
					break;
					// date
					case 'date':
						echo '<input type="text" class="datepicker" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
								<br /><span class="description">'.$field['desc'].'</span>';
					break;
					// slider
					case 'slider':
					$value = $meta != '' ? $meta : '0';
						echo '<div id="'.$field['id'].'-slider"></div>
								<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$value.'" size="5" />
								<br /><span class="description">'.$field['desc'].'</span>';
					break;
					// image
					case 'image':
						$image = get_template_directory_uri().'/images/optional_image.png';	
						echo '<span class="custom_default_image" style="display:none">'.$image.'</span>';
						if ($meta) { $image = wp_get_attachment_image_src($meta, 'medium');	$image = $image[0]; }				
						echo	'<input name="'.$field['id'].'" type="hidden" class="custom_upload_image" value="'.$meta.'" />
									<img src="'.$image.'" class="custom_preview_image" alt="" /><br />
										<input class="custom_upload_image_button button" type="button" value="Choose Image" />
										<small>&nbsp;<a href="#" class="custom_clear_image_button">Remove Image</a></small>
										<br clear="all" /><span class="description">'.$field['desc'].'</span>';
					break;
					// repeatable
					case 'repeatable':
						echo '<a class="repeatable-add button" href="#">+</a>
								<ul id="'.$field['id'].'-repeatable" class="custom_repeatable">';
						$i = 0;
						if ($meta) {
							foreach($meta as $row) {
								echo '<li><span class="sort hndle">|||</span>
											<input type="text" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" value="'.$row.'" size="30" />
											<a class="repeatable-remove button" href="#">-</a></li>';
								$i++;
							}
						} else {
							echo '<li><span class="sort hndle">|||</span>
										<input type="text" name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" value="" size="30" />
										<a class="repeatable-remove button" href="#">-</a></li>';
						}
						echo '</ul>
							<span class="description">'.$field['desc'].'</span>';
					break;
				} //end switch
		echo '</td></tr>';
	} // end foreach
	echo '</table>'; // end table
}

function remove_taxonomy_boxes() {
	remove_meta_box('categorydiv', 'post', 'side');
}
add_action( 'admin_menu' , 'remove_taxonomy_boxes' );

// Save the Data
function save_custom_meta($post_id) {
    global $custom_meta_fields;
	
	// verify nonce
	if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) 
		return $post_id;
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
	}
	
	// loop through fields and save the data
	foreach ($custom_meta_fields as $field) {
		if($field['type'] == 'tax_select') continue;
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} // enf foreach
	
	// save taxonomies
	$post = get_post($post_id);
	$category = $_POST['category'];
	wp_set_object_terms( $post_id, $category, 'category' );
}
add_action('save_post', 'save_custom_meta');



// Disable the theme / plugin text editor in Admin
//define('DISALLOW_FILE_EDIT', true);


//////////////////////////////////////////////////////////////
// Ajax Project
/////////////////////////////////////////////////////////////

add_action( 'wp_ajax_nopriv_myajax-submit', 'ajax_project_load' );
add_action( 'wp_ajax_myajax-submit', 'ajax_project_load' );
 
function ajax_project_load() {
	
	$the_slug = $_POST['slug'];
	$args=array(
	  'name' => $the_slug,
	  'post_type' => 'project',
	  'post_status' => 'publish',
	  'showposts' => 1,
	  'ignore_sticky_posts' => 1
	);
	$my_posts = get_posts($args);
	if( $my_posts ) :
	
		global $post;
		$post = $my_posts[0];    	
 
    	// generate the response
    	$response = json_encode( "Success" );
 
    	// response output
    	header( "Content-Type: application/json" );		
		?>
		<?php $project_url = get_post_meta($post->ID, "_ttrust_url_value", true); ?>
		<?php if ($project_url) : ?>
<div class="project-background" style="background-image: url(<?php echo $project_url; ?>);">
	<?php endif; ?>	
	
		<div class="projectNav clearfix">					
			<?php
			
			$prev_post = get_previous_post();
			if($prev_post) $prev_slug = $prev_post->post_name;
			$next_post = get_next_post();
			if($next_post) $next_slug = $next_post->post_name;
			?>			
			
			<?php if(isset($next_slug)) : ?>
			<a href="#<?php echo $next_slug;?>" onClick="nextPrevProject('<?php echo $next_slug;?>');">		
			<div class="previous <?php if(!$next_slug) echo 'inactive';?>">	
			</div>
			Previous</a>
			<?php endif; ?>
			
			<?php if(isset($prev_slug)) : ?>
			<a href="#<?php echo $prev_slug;?>" onClick="nextPrevProject('<?php echo $prev_slug;?>');">
			<div class="next <?php if(!$prev_slug) echo 'inactive';?>">	
			</div>Next</a>
			<?php endif; ?>
			
			<a href="#index">
			<div class="closeBtn">	
			</div>
			Close</a>			
		</div>
	
	
<div class="container" >
		<div id="ajax-project-<?php the_ID(); ?>" <?php post_class('project main ajax clearfix'); ?> >
	
			<div class="projectHeader">
				
		
			
			</div>
																					
			<div class="visuals clearfix">								
				<?php echo wpautop(do_shortcode(add_video_containers($post->post_content))); ?>		
			</div>
	
			<div class="details one_half">	
				<div class="details_inside">
				<h2><?php the_title(); ?></h2>						
				<?php $project_notes = get_post_meta($post->ID, "_ttrust_notes_value", true); ?>
				<?php echo wpautop(do_shortcode($project_notes)); ?>
		
				<?php //$project_url = get_post_meta($post->ID, "_ttrust_url_value", true); ?>
				<?php //$project_url_label = get_post_meta($post->ID, "_ttrust_url_label_value", true); ?>
				<?php //$project_url_label = ($project_url_label!="") ? $project_url_label : __('Visit Site', 'themetrust'); ?>
				<?php if ($project_url) : ?>
					<!-- <p><a class="action" href="<?php //echo $project_url; ?>"><?php //echo $project_url_label; ?></a></p> -->
				<?php endif; ?>		
				</div>		
			</div>																						
		</div>	
		
		</div>
		</div>
		
		
			
		
		<?php $slideshow_delay = of_get_option('ttrust_slideshow_delay'); ?>
		<?php $slideshow_delay = ($slideshow_delay != "") ? $slideshow_delay : '6'; ?>		
		<script type="text/javascript">
		//<![CDATA[
			waitForMedia("<?php echo $the_slug; ?>", <?php echo $slideshow_delay; ?>);
			lightboxInit();
			//]]>
		</script>			
		
	<?php endif; ?>	
    
<?php    
    exit;
}






//////////////////////////////////////////////////////////////
// Comments
/////////////////////////////////////////////////////////////

function ttrust_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>		
	<li id="li-comment-<?php comment_ID() ?>">		
		
		<div class="comment <?php echo get_comment_type(); ?>" id="comment-<?php comment_ID() ?>">						
			
			<?php echo get_avatar($comment,'60',get_bloginfo('template_url').'/images/default_avatar.png'); ?>			
   	   			
   	   		<h5><?php comment_author_link(); ?></h5>
			<span class="date"><?php comment_date(); ?></span>
				
			<?php if ($comment->comment_approved == '0') : ?>
				<p><span class="message"><?php _e('Your comment is awaiting moderation.', 'themetrust'); ?></span></p>
			<?php endif; ?>
				
			<?php comment_text() ?>				
				
			<?php
			if(get_comment_type() != "trackback")
				comment_reply_link(array_merge( $args, array('add_below' => 'comment','reply_text' => '<span>'. __('Reply', 'themetrust') .'</span>', 'login_text' => '<span>'. __('Log in to reply', 'themetrust') .'</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'])))
			
			?>
				
		</div><!-- end comment -->
			
<?php
}

function ttrust_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
		<li class="comment" id="comment-<?php comment_ID() ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
<?php
}
?>