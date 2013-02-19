<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {	
	
	// Home Project Type
	$home_project_type = array("all" => "All projects", "featured" => "Featured");	

	// Home Project Type
	$home_post_type = array("project" => "Projects", "product" => "Products");	

	// Home Slider Type
	$home_slider_type = array("inc/sliders/full_royal_slider" => "Full Slider", "inc/sliders/full_royal_video_slider" => "Full Video", "inc/sliders/full_royal_block_slider" => "Block Slider", "inc/sliders/jmpress_slider" => "jmPress Slider");
	
	//Single Product Template
	$single_product_template = array("single-product" => "Default", "single-product_t1" => "Template 1", "single-product_t2" => "Template 2", "single-product_t3" => "Template 3", "single-product_t4" => "Template 4");

	// Thumb Animation Preset
	$thumb_preset = array("inc/thumbs/part-thumb-spin" => "Spin", "inc/thumbs/part-thumb-slide-right" => "Slide Right", "inc/thumbs/part-thumb-bottom-caption" => "Bottom Caption");

	// Thumb Animation Preset
	$footer_template = array("" => "Default", "inc/footers/footer-t1" => "Template 1");	

	// Thumb Animation Preset
	$mobile_nav_template = array("inc/nav/mobile_slide_right" => "Slide Right", "inc/nav/mobile_drop_down" => "Dropdown");	
	
	// Post Featured Image Size
	$post_featured_image_size = array("large" => "Large", "small" => "Small");
	
	// Navigation Location
	$nav_location = array("center" => "Center", "right" => "Right", "left_fixed" => "Left Fixed", "center_fixed_top" => "Center Fixed Top", "center_logo_top" => "Center Logo Top");
	
	// Slideshow Transition Effect
	$slideshow_effect = array("slide" => "Slide", "fade" => "Fade");
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';
		
	$options = array();
	
	$options[] = array( "name" => __('General','themetrust'),
						"type" => "heading");

	$options[] = array( "name" => __('Top Navigation Bar','w45'),
						"desc" => __('Check this box to show the top navigation bar.','w45'),
						"id" => "w45_show_top_nav_bar",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Navigation Location','w45'),
						"desc" => __('Select the location of the main navigation bar.','w45'),
						"id" => "w45_nav_location",
						"std" => "center",
						"type" => "select",
						"options" => $nav_location);	

	$options[] = array( "name" => __('Mobile Navigation','w45'),
						"desc" => __('Select the type of mobile navigation.','w45'),
						"id" => "w45_mobile_nav",
						"std" => "inc/nav/mobile_slide_right",
						"type" => "select",
						"options" => $mobile_nav_template);

	$options[] = array( "name" => __('Navigation Toggle Slider','w45'),
						"desc" => __('Check this box to show the toggle navigation bar.','w45'),
						"id" => "w45_show_toggle_slider",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __('Toggle Post Type','w45'),
						"desc" => __('Select the type of posts to show on the home page.','w45'),
						"id" => "w45_home_toggle_type",
						"std" => "project",
						"type" => "select",
						"options" => $home_post_type);
	
	$options[] = array( "name" => __('Logo','themetrust'),
						"desc" => __('Upload a custom logo.','themetrust'),
						"id" => "logo",
						"type" => "upload");
						
	$options[] = array( "name" => __('Favicon','themetrust'),
						"desc" => __('Upload a custom favicon.','themetrust'),
						"id" => "ttrust_favicon",
						"type" => "upload");					
		
	
	$options[] = array( "name" => __('Custom CSS','themetrust'),
						"desc" => __('Enter custom CSS here.','themetrust'),
						"id" => "ttrust_custom_css",
						"std" => "",
						"type" => "textarea");					









//Appearance				
	$options[] = array( "name" => __('Appearance','themetrust'),
						"type" => "heading");

	$options[] = array( "name" => __('Color 1','w45'),
						"desc" => __('Select Main Color 1','w45'),
						"id" => "w45_color_1",
						"std" => "",
						"type" => "color");	

	$options[] = array( "name" => __('Heading Color','w45'),
						"desc" => __('Select Heading Color.','w45'),
						"id" => "w45_heading_color",
						"std" => "",
						"type" => "color");
						
	$options[] = array( "name" => __('Accent Color','themetrust'),
						"desc" => __('Select an accent color for your theme.','themetrust'),
						"id" => "ttrust_color_accent",
						"std" => "",
						"type" => "color");	

	$options[] = array( "name" => __('Small Header Color','w45'),
						"desc" => __('Select the small footer color for your theme.','w45'),
						"id" => "w45_small_header_color",
						"std" => "",
						"type" => "color");

	$options[] = array( "name" => __('Small Footer Color','w45'),
						"desc" => __('Select the small footer color for your theme.','w45'),
						"id" => "w45_small_footer_color",
						"std" => "",
						"type" => "color");
						
	$options[] = array( "name" => __('Main Navigation Color','themetrust'),
						"desc" => __('Select a color for your menu links.','themetrust'),
						"id" => "ttrust_color_menu",
						"std" => "",
						"type" => "color");
						
	$options[] = array( "name" => __('Main Navigation Hover Color','themetrust'),
						"desc" => __('Select a hover color for your menu links.','themetrust'),
						"id" => "ttrust_color_menu_hover",
						"std" => "",
						"type" => "color");
						
	$options[] = array( "name" => __('Button Color','themetrust'),
						"desc" => __('Select a color for your buttons.','themetrust'),
						"id" => "ttrust_color_btn",
						"std" => "#757575",
						"type" => "color");
						
	$options[] = array( "name" => __('Button Hover Color','themetrust'),
						"desc" => __('Select a hover color for your buttons.','themetrust'),
						"id" => "ttrust_color_btn_hover",
						"std" => "#595959",
						"type" => "color");
						
	$options[] = array( "name" => __('Link Color','themetrust'),
						"desc" => __('Select a color for your links.','themetrust'),
						"id" => "ttrust_color_link",
						"std" => "",
						"type" => "color");
	
	$options[] = array( "name" => __('Link Hover Color','themetrust'),
						"desc" => __('Select a hover color for your links.','themetrust'),
						"id" => "ttrust_color_link_hover",
						"std" => "#aa9862",
						"type" => "color");
						
	$options[] = array( "name" => __('Font for Headings','themetrust'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for headings.','themetrust'),
						"id" => "ttrust_heading_font",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Font for Body Text','themetrust'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for the body text.','themetrust'),
						"id" => "ttrust_body_font",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Font for Home Page Banner Main Text','themetrust'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for the main text in the home page benner.','themetrust'),
						"id" => "ttrust_banner_main_font",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Font for Home Page Banner Secondary Text','themetrust'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for the secondary text in the home page banner.','themetrust'),
						"id" => "ttrust_banner_secondary_font",
						"std" => "",
						"type" => "text");
						
	
						
	$options[] = array( "name" => __('Home Page','themetrust'),
						"type" => "heading");


	$options[] = array( "name" => __('Full Page Slider','themetrust'),
						"desc" => __('Check this box to show full page slidshow.','themetrust'),
						"id" => "w45_home_full_page_slider",
						"std" => "1",
						"type" => "checkbox");

	
						
	$options[] = array( "name" => __('Home Sider Type','w45'),
						"desc" => __('Select the type of homepage slider.','w45'),
						"id" => "w45_slider_type",
						"std" => "inc/sliders/full_royal_slider",
						"type" => "select",
						"options" => $home_slider_type);

						
	$options[] = array( "name" => __('Banner Image','themetrust'),
						"desc" => __('Upload an image for the home page banner. Recommended dimensions: 1200px x 590px','themetrust'),
						"id" => "ttrust_home_banner_img",
						"type" => "upload");
						
	$options[] = array( "name" => __('Banner Background Color','themetrust'),
						"desc" => __('Select a background color for the home page background.','themetrust'),
						"id" => "ttrust_color_banner_bkg",
						"std" => "#787878",
						"type" => "color");
						
						
	$options[] = array( "name" => __('Primary Banner Text','themetrust'),
						"desc" => __('Enter the primary text that will appear in the home page banner.','themetrust'),
						"id" => "ttrust_banner_text_primary",
						"std" => "RESPONSIVE W45 TEMPLATE",
						"type" => "textarea");
						
	$options[] = array( "name" => __('Secondary Banner Text','themetrust'),
						"desc" => __('Enter the secondary text that will appear in the home page banner.','themetrust'),
						"id" => "ttrust_banner_text_secondary",
						"std" => "W45 Responsive Wordpress Framework",
						"type" => "textarea");
						
	$options[] = array( "name" => __('Banner Text Vertical Position','themetrust'),
						"desc" => __('Use this field to adjust the vertical position of the banner text.','themetrust'),
						"id" => "ttrust_banner_text_position",
						"std" => "250",
						"type" => "text");	
						
	$options[] = array( "name" => __('Recent Projects Title','themetrust'),
						"desc" => __('Enter the title that will appear above the recent projects section on the home page.','themetrust'),
						"id" => "ttrust_recent_projects_title",
						"std" => "Recent Projects",
						"type" => "text");	
						
	$options[] = array( "name" => __('Number of Projects to Show','themetrust'),
						"desc" => __('Enter the number of project to show on the home page.','themetrust'),
						"id" => "ttrust_home_project_count",
						"std" => "6",
						"type" => "text");

	$options[] = array( "name" => __('Type of Post to Show','themetrust'),
						"desc" => __('Select the type of projects to show on the home page.','themetrust'),
						"id" => "w45_home_post_type",
						"std" => "latest",
						"type" => "select",
						"options" => $home_post_type);
						
	$options[] = array( "name" => __('Type of Projects to Show','themetrust'),
						"desc" => __('Select the type of projects to show on the home page.','themetrust'),
						"id" => "ttrust_home_project_type",
						"std" => "latest",
						"type" => "select",
						"options" => $home_project_type);
						
	$options[] = array( "name" => __('Featured Pages Title','themetrust'),
						"desc" => __('Enter the title that will appear above the featured pages section on the home page.','themetrust'),
						"id" => "ttrust_featured_pages_title",
						"std" => "Our Services",
						"type" => "text");
						
	$options[] = array( "name" => __('Number of  Featured Pages to Show','themetrust'),
						"desc" => __('Enter the number of featured pages to show on the home page.','themetrust'),
						"id" => "ttrust_featured_pages_count",
						"std" => "6",
						"type" => "text");	
						
						
	$options[] = array( "name" => __('Slideshow','themetrust'),
						"type" => "heading");	

	$options[] = array( "name" => __('Slideshow Delay','themetrust'),
						"desc" => __('Enter the delay in seconds between slides. Enter 0 to disable auto-playing.','themetrust'),
						"id" => "ttrust_slideshow_delay",
						"std" => "6",
						"type" => "text");

	$options[] = array( "name" => __('Slideshow Effect','themetrust'),
						"desc" => __('Select the type of transition effect for the slideshow.','themetrust'),
						"id" => "ttrust_slideshow_effect",
						"std" => "fade",
						"type" => "select",
						"options" => $slideshow_effect);	
						
						
	$options[] = array( "name" => __('Posts','themetrust'),
						"type" => "heading");
						
	$options[] = array( "name" => __('Show Author','themetrust'),
						"desc" => __('Check this box to show the author.','themetrust'),
						"id" => "ttrust_post_show_author",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Show Date','themetrust'),
						"desc" => __('Check this box to show the publish date.','themetrust'),
						"id" => "ttrust_post_show_date",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Show Category','themetrust'),
						"desc" => __('Check this box to show the category.','themetrust'),
						"id" => "ttrust_post_show_category",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Show Comment Count','themetrust'),
						"desc" => __('Check this box to show the comment count.','themetrust'),
						"id" => "ttrust_post_show_comments",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Featured Image Size','themetrust'),
						"desc" => __('Select the size of the post featured image.','themetrust'),
						"id" => "ttrust_post_featured_img_size",
						"std" => "large",
						"type" => "select",
						"options" => $post_featured_image_size);
						
	$options[] = array( "name" => __('Show Featured Image on Single Posts','themetrust'),
						"desc" => __('Check this box to show the featured image on single post pages.','themetrust'),
						"id" => "ttrust_post_show_featured_image",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Select a Page",
						"desc" => "Select the page you're using as your blog page. This is used to show the blog title at the top of your posts.",
						"id" => "ttrust_blog_page",
						"type" => "select",
						"options" => $options_pages);



	//Woocommerce

	$options[] = array( "name" => __('Woocommerce','w45'),
						"type" => "heading");

	$options[] = array( "name" => __('Single Product Page Template','w45'),
						"desc" => __('Select single product page tempalate.','w45'),
						"id" => "w45_single_product_page_template",
						"std" => "single-product",
						"type" => "select",
						"options" => $single_product_template);
						
	$options[] = array( "name" => __('Product Page Image Width','w45'),
						"desc" => __('Enter width to crop the featured product image.','w45'),
						"id" => "w45_product_image_width",
						"std" => "600",
						"type" => "text");

	$options[] = array( "name" => __('Product Page Image Height','w45'),
						"desc" => __('Enter height to crop the featured product image.','w45'),
						"id" => "w45_product_image_height",
						"std" => "400",
						"type" => "text");





	//Thumbs
	$options[] = array( "name" => __('Thumbs','w45'),
						"type" => "heading");

	$options[] = array( "name" => __('Post Thumb Animation','w45'),
						"desc" => __('Select the type of animatino for post thumbnail hover.','w45'),
						"id" => "w45_thumb_preset",
						"std" => "spin",
						"type" => "select",
						"options" => $thumb_preset);




	//Footer 
	$options[] = array( "name" => __('Footer','themetrust'),
						"type" => "heading");

	$options[] = array( "name" => __('Footer Template','w45'),
						"desc" => __('Select footer template.','w45'),
						"id" => "w45_footer_template",
						"std" => "",
						"type" => "select",
						"options" => $footer_template);

	$options[] = array( "name" => __('Footer Widgets','themetrust'),
						"desc" => __('Check this box to show footer widgets.','themetrust'),
						"id" => "w45_footer_widgets",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __('Footer Logo','w45'),
						"desc" => __('Upload a custom footer logo.','w45'),
						"id" => "w45_footer_logo",
						"type" => "upload");

	$options[] = array( "name" => __('Fixed Event Bar','w45'),
						"desc" => __('Check this box to show event bar.','w45'),
						"id" => "w45_fixed_bar",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __('Footer Mission Text','w45'),
						"desc" => __('This will appear above the copywrite.','w45'),
						"id" => "w45_footer_mission_text",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => __('Left Footer Text','themetrust'),
						"desc" => __('This will appear on the left side of the footer.','themetrust'),
						"id" => "ttrust_footer_left",
						"std" => "",
						"type" => "textarea");

	$options[] = array( "name" => __('Right Footer Text','themetrust'),
						"desc" => __('This will appear on the right side of the footer.','themetrust'),
						"id" => "ttrust_footer_right",
						"std" => "",
						"type" => "textarea");


	


	
	//Social Network Extras
	$options[] = array( "name" => __('Social Networks','w45'),
						"type" => "heading");	

	$options[] = array( "name" => __('Facebook Likes','w45'),
						"desc" => __('Check this box to display an Facebook likes.','w45'),
						"id" => "w45_show_facebook_likes",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __('Facebook Page ID','w45'),
						"desc" => __('Enter the facebook page ID. Example (https://www.facebook.com/<stong>FACEBOOK_ID</strong>)','w45'),
						"id" => "w45_facebook_page_id",
						"std" => " ",
						"type" => "text");

	$options[] = array( "name" => __('Instagram Gallery','w45'),
						"desc" => __('Check this box to display an Instagram image feed.','w45'),
						"id" => "w45_show_instagram",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __('Instagram User ID','w45'),
						"desc" => __('Enter the instagram account number. <a href="http://jelled.com/instagram/lookup-user-id">Click For Help</a>','w45'),
						"id" => "w45_instagram_user_id",
						"std" => " ",
						"type" => "text");

	$options[] = array( "name" => __('Instagram Access Token','w45'),
						"desc" => __('Paste the instagram access token. <a href="http://jelled.com/instagram/access-token">Click For Help</a>','w45'),
						"id" => "w45_instagram_access_token",
						"std" => " ",
						"type" => "text");

	$options[] = array( "name" => __('Instagram Image Amount','w45'),
						"desc" => __('Enter the number of images to pull.','w45'),
						"id" => "w45_instagram_image_num",
						"std" => "30",
						"type" => "text");

$options[] = array( "name" => __('Social Network Icons','w45'),
						"desc" => __('Check this box to show footer widgets.','w45'),
						"id" => "w45_social_icons",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => __('Facebook','w45'),
						"desc" => __('Facebook URL.','w45'),
						"id" => "w45_facebook_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Twitter','w45'),
						"desc" => __('Twitter URL.','w45'),
						"id" => "w45_twitter_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Tumblr','w45'),
						"desc" => __('Tumblr URL.','w45'),
						"id" => "w45_tumblr_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Google','w45'),
						"desc" => __('Google URL.','w45'),
						"id" => "w45_google_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Linkedin','w45'),
						"desc" => __('Linkedin URL.','w45'),
						"id" => "w45_linkedin_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Pinterest','w45'),
						"desc" => __('Pinterest URL.','w45'),
						"id" => "w45_pinterest_url",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => __('Vimeo','w45'),
						"desc" => __('Vimeo URL.','w45'),
						"id" => "w45_vimeo_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('YouTube','w45'),
						"desc" => __('YouTube URL.','w45'),
						"id" => "w45_youtube_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Instagram','w45'),
						"desc" => __('Instagram URL.','w45'),
						"id" => "w45_instagram_url",
						"std" => "",
						"type" => "text");



						
	$options[] = array( "name" => __('Integration','themetrust'),
						"type" => "heading");	
						
	$options[] = array( "name" => __('Analytics','themetrust'),
						"desc" => __('Enter your custom analytics code. (e.g. Google Analytics).','themetrust'),
						"id" => "ttrust_analytics",
						"std" => "",
						"type" => "textarea",
						"validate" => "none");
						
	
	
						
	
	return $options;
}