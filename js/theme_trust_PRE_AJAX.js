
///////////////////////////////		
// Mobile Detection
///////////////////////////////

function isMobile(){
    return (
        (navigator.userAgent.match(/Android/i)) ||
		(navigator.userAgent.match(/webOS/i)) ||
		(navigator.userAgent.match(/iPhone/i)) ||
		(navigator.userAgent.match(/iPod/i)) ||
		(navigator.userAgent.match(/iPad/i)) ||
		(navigator.userAgent.match(/BlackBerry/))
    );
}

///////////////////////////////
// Project Filtering 
///////////////////////////////

function projectFilterInit() {
	jQuery('#filterNav a').click(function(){
		var selector = jQuery(this).attr('data-filter');	
		jQuery(this).css('outline','none');
		jQuery('ul#filter .current').removeClass('current');
		jQuery(this).parent().addClass('current');
		
		if(selector == 'all') {
			jQuery('#projects .thumbs .project.inactive .inside').fadeIn('slow').removeClass('inactive').addClass('active');
		} else {
			jQuery('#projects .thumbs .project').each(function() {
				if(!jQuery(this).hasClass(selector)) {
					jQuery(this).removeClass('active').addClass('inactive');
					jQuery(this).find('.inside').fadeOut('normal');
				} else {
					jQuery(this).addClass('active').removeClass('inactive');
					jQuery(this).find('.inside').fadeIn('slow');
				}
			});
		}		
	
		if ( !jQuery(this).hasClass('selected') ) {
			jQuery(this).parents('#filterNav').find('.selected').removeClass('selected');
			jQuery(this).addClass('selected');
		}
	
		return false;
	});		
}






///////////////////////////////
// Project thumbs 
///////////////////////////////

function projectThumbInit() {
	
	if(!isMobile()) {		
	
		jQuery(".project.small .inside a").hover(
			function() {
				jQuery(this).find('img:last').stop().fadeTo("fast", .1);
				jQuery(this).find('img:last').attr('title','');	
			},
			function() {
				jQuery(this).find('img:last').stop().fadeTo("fast", 1);	
		});
			
		jQuery(".project.small .inside").hover(	
			function() {				
				jQuery(this).find('.title').stop().fadeTo("fast", 1);
				jQuery(this).find('img:last').attr('title','');				
			},
			function() {				
				jQuery(this).find('.title').stop().fadeTo("fast", 0);							
		});
		
	}
	
	jQuery(".project.small").css("opacity", "1");	
}

///////////////////////////////
// Parallax
///////////////////////////////

// Calcualte the home banner parallax scrolling
  // function scrollBanner() {
  //   //Get the scoll position of the page
  //   scrollPos = jQuery(this).scrollTop();

  //   //Scroll and fade out the banner text
  //   jQuery('#bannerText').css({
  //     'margin-top' : -(scrollPos/3)+"px",
  //     'opacity' : 1-(scrollPos/300)
  //   });
	
  //   //Scroll the background of the banner
  //   jQuery('#homeBanner').css({
  //     'background-position' : 'bottom ' + (-scrollPos/8)+"px"
  //   });    
  // }



//   function carousel_ITH() {
// jQuery("#carousel-image-text-horizontal").touchCarousel({			
// 				itemsPerMove: 1,
// 				pagingNav: true,
// 				scrollbar: false,				
// 				scrollToLast: true,
// 				loopItems: false				
// 			});
// }

// function carousel_ITV() {
// jQuery("#carousel-image-and-text").touchCarousel({					
// 				pagingNav: false,
// 				snapToItems: false,
// 				itemsPerMove: 1,				
// 				scrollToLast: false,
// 				loopItems: false,
// 				pagingNav: true,
// 				scrollbar: true
// 		    });
// }


function toggle_panel() {
	jQuery('.toggle-panel')
	.TogglePanel({
		ajax: {
			settings: {
				timeout: 1000,
			},
		},
		hashWatch: true,
		pauseMedia: true,
		saveState: 'session',
	});

	jQuery('.collapse-all').on('click', function() {

		jQuery('.toggle-panel').TogglePanel('collapse');

	});

	jQuery('.expand-all').on('click', function() {

		jQuery('.toggle-panel').TogglePanel('expand');
	});

	jQuery('.toggle-all').on('click', function() {

		jQuery('.toggle-panel').TogglePanel('toggle');
	});
}



function tab_panel() {
jQuery('.accordion, .tabs')
	.TabsAccordion({
		hashWatch: true,
		pauseMedia: true,
		//responsiveSwitch: 'tablist',
    responsiveSwitch: 1,
		//saveState: sessionStorage,
	});
}




function horThumbSlider() {
jQuery('.video-touchslider').royalSlider({
    arrowsNav: false,
    fadeinLoadedSlide: true,
    controlNavigationSpacing: 0,
    controlNavigation: 'thumbnails',

    thumbs: {
      autoCenter: true,
      fitInViewport: true,
      orientation: 'horizontal',
      spacing: 0
    },
    
    imageScaleMode: 'fill',
    imageAlignCenter:true,
    loop: false,
    loopRewind: true,
    numImagesToPreload: 3,
    video: {
      autoHideArrows:true,
      autoHideControlNav:false,
      youTubeCode:'<iframe src="http://www.youtube.com/embed/%id%?theme=dark&color=white&rel=1&autoplay=1&showinfo=0" frameborder="no"></iframe>',
      vimeoCode:'<iframe src="http://player.vimeo.com/video/%id%?byline=0&amp;portrait=0&amp;autoplay=1&amp;color=FF9E15"" frameborder="no" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
    keyboardNavEnabled: true,
      autoHideBlocks: true
    }, 
    // autoScaleSlider: true, 
    //  autoScaleSliderWidth: 1900,     
    // autoScaleSliderHeight: 500,
    minSlideOffset: 10,
    slidesSpacing: 0,
    //imgWidth: 100%,
    //imgHeight: 0
    //slidesOrientation: 'vertical'
  });
}


function instagramSlider() {
jQuery('#instagram').royalSlider({
    arrowsNav: false,
    fadeinLoadedSlide: true,
    controlNavigationSpacing: 0,
    controlNavigation: 'thumbnails',

    thumbs: {
      autoCenter: true,
      fitInViewport: true,
      orientation: 'horizontal',
      spacing: 0
    },
    
    imageScaleMode: 'fill',
    imageAlignCenter:true,
    loop: false,
    loopRewind: true,
    numImagesToPreload: 3,
    video: {
      autoHideArrows:true,
      autoHideControlNav:false,
      youTubeCode:'<iframe src="http://www.youtube.com/embed/%id%?theme=dark&color=white&rel=1&autoplay=1&showinfo=0" frameborder="no"></iframe>',
      vimeoCode:'<iframe src="http://player.vimeo.com/video/%id%?byline=0&amp;portrait=0&amp;autoplay=1&amp;color=FF9E15"" frameborder="no" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
    keyboardNavEnabled: true,
      autoHideBlocks: true
    }, 
    // autoScaleSlider: true, 
    //  autoScaleSliderWidth: 1900,     
    // autoScaleSliderHeight: 500,
    minSlideOffset: 10,
    slidesSpacing: 0
    //imgWidth: 100%,
    //imgHeight: auto,
    //slidesOrientation: 'vertical'
  });
}

function video_gallery() {
//transitionType:  'move' or 'fade'
//Scale mode for images. "fill", "fit", "fit-if-smaller" or "none"
jQuery('.video-gallery').royalSlider({
    arrowsNav: false,
    fadeinLoadedSlide: true,
    controlNavigationSpacing: 0,
    controlNavigation: 'thumbnails',

    thumbs: {
      autoCenter: false,
      fitInViewport: true,
      orientation: 'vertical',
      spacing: 0
    },
    
    imageScaleMode: 'fill',
    imageAlignCenter:true,
    loop: false,
    loopRewind: true,
    numImagesToPreload: 3,
    video: {
      autoHideArrows:true,
      autoHideControlNav:false,
      youTubeCode:'<iframe src="http://www.youtube.com/embed/%id%?theme=dark&color=white&rel=1&autoplay=1&showinfo=0" frameborder="no"></iframe>',
      vimeoCode:'<iframe src="http://player.vimeo.com/video/%id%?byline=0&amp;portrait=0&amp;autoplay=1&amp;color=FF9E15"" frameborder="no" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
    keyboardNavEnabled: true,
      autoHideBlocks: true
    }, 
     // autoScaleSlider: true, 
     //  autoScaleSliderWidth: 1900,     
     // autoScaleSliderHeight: 600,
    minSlideOffset: 10,
    slidesSpacing: 0
    //imgWidth: 100%,
    //imgHeight: auto,
    //slidesOrientation: 'vertical'
  });

}


function fullPageSlidshow(){
jQuery('#full_bg_slideshow').royalSlider({
    arrowsNav: true,
    loop: true,
    keyboardNavEnabled: true,
    controlsInside: false,
    imageScaleMode: 'fill',
    arrowsNavAutoHide: false,
    autoScaleSlider: true, 
    //autoScaleSliderWidth: jQuery(window).width(),     
    //autoScaleSliderHeight: jQuery(window).height(),
    controlNavigation: 'bullets',
    thumbsFitInViewport: false,
    navigateByClick: true,
    startSlideId: 0,
    autoPlay: true,
    transitionType:'fade',
    autoPlay: {
    enabled: true,
    delay: 4000
  },
    globalCaption: true
  });
}








/////////////////////////////////////////////////////////////////////////
// Initialize
/////////////////////////////////////////////////////////////////////////
	
jQuery.noConflict();
jQuery(document).ready(function(){

tab_panel();

horThumbSlider();
video_gallery();


toggle_panel();


fullPageSlidshow();

	
	// if(!isMobile()) {
	// 	jQuery(window).scroll(function() {	      
	//        scrollBanner();	      
	// 	});
	// }

var sliderJQ = jQuery('#homeSlider').royalSlider({
  //controlNavigation:'thumbnails',
  imageScaleMode: 'fill',
  allowCSS3OnMacWebkit: true,
  arrowsNav: false,
  fullscreen: false,
  loop: true,
  thumbs: {
    firstMargin: false
  },
  autoPlay: {
    enabled: true,
    delay: 5000
  },
controlNavigation: 'bullets',
  thumbsFirstMargin: false,
  controlsInside: true,
  autoScaleSlider: true, 
  autoScaleSliderWidth: 1600,     
  autoScaleSliderHeight: 400,
  keyboardNavEnabled: true,
  minSlideOffset: 50,
  slidesSpacing: 0,
arrowsNav: true   

});













jQuery(".carousel-image-text-horizontal").touchCarousel({			
				// itemsPerMove: 1,
				 pagingNav: true,
				 scrollbar: false,				
				// scrollToLast: true,
				// loopItems: false		

				itemsPerPage: 4,				
				//scrollbar: true,
				scrollbarAutoHide: true,
				scrollbarTheme: "dark",				
				pagingNav: false,
				snapToItems: true,
				scrollToLast: true,
				useWebkit3d: true,				
				loopItems: false		
			});

jQuery(".carousel-image-and-text").touchCarousel({					
				// pagingNav: false,
				// snapToItems: false,
				// itemsPerMove: 1,				
				// scrollToLast: false,
				// loopItems: false,
				// pagingNav: true,
				// scrollbar: false

				itemsPerPage: 1,				
				scrollbar: false,
				scrollbarAutoHide: true,
				scrollbarTheme: "dark",				
				pagingNav: false,
				snapToItems: false,
				scrollToLast: true,
				useWebkit3d: true,				
				loopItems: false


});








// jQuery('#st-accordion').accordion({
// 					oneOpenedItem	: false
// 				});

 //Slide to the left, and make it model (you'll have to call $.pageslide.close() to close) 
  
  	
  	//toggle_panel();
	projectThumbInit();	
	projectFilterInit();
	jQuery(".videoContainer").fitVids();
	//jQuery("#homeBanner h2").fitText(1.7, { minFontSize: '24px', maxFontSize: '45px' });	
	//jQuery("#bannerText2 h2").fitText(1.7, { minFontSize: '16px', maxFontSize: '45px' });	




	//Instagram Feed
 // jQuery.ajax({
 //    	type: "GET",
 //        dataType: "jsonp",
 //        cache: false,
 //        url: "https://api.instagram.com/v1/users/218665735/media/recent/?access_token=18360510.f59def8.d8d77acfa353492e8842597295028fd3",
 //        success: function(data) {
 //            for (var i = 0; i < 30; i++) {
 //        //jQuery(".instagram").append("<div class='instagram-placeholder'><a target='_blank' href='" + data.data[i].link +"'><img class='instagram-image' src='" + data.data[i].images.low_resolution.url +"' /></a></div>");   
 //        jQuery("#instagram").append("<div class='rsContent'><a class='rsImg' data-rsVideo='#' href='#'><div class='rsTmb'><a target='_blank' href='" + data.data[i].link + "'><div class='tc_thumb'   style='background-image: url(" + data.data[i].images.low_resolution.url + ")'></div></a></div></a></div>");
 //        //jQuery(".instagram").append("<div class='rsContent'><a class='rsImg'><div class='rsTmb'><div class='tc_thumb instagram-image' ><a target='_blank' href='" + data.data[i].link +"'><img class='instagram-image' src='" + data.data[i].images.low_resolution.url +"' /></a></div></div></a></div>");

 //      		}     
                            
 //        }
 //    });
jQuery('table').footable();




  jQuery('.para_back').zlayer({
    mass: 25,
    force: 'push',
    canvas: '#para-wrapper'
  });
  jQuery('.para_middle').zlayer({
    mass: 28,
    force: 'push',
    canvas: '#para-wrapper'
  });
  jQuery('.para_front').zlayer({
    mass: 15,
    force: 'push',
    canvas: '#para-wrapper'
  });

});




jQuery(window).load(function() {


  // jQuery('#full_bg_slideshow').css({ 'min-height': (jQuery(window).height()) });
  // jQuery('#full_bg_slideshow .rsImg').css({ 'min-height': (jQuery(window).height()) });
  // jQuery('#full_bg_slideshow .rsContent').css({ 'min-height': (jQuery(window).height()) });
  // jQuery('#full_bg_slideshow .rsOverflow').css({ 'min-height': (jQuery(window).height()) });
  // jQuery('#full_bg_slideshow .rsContainer').css({ 'min-height': (jQuery(window).height()) });
  // jQuery('#full_bg_slideshow .rsSlide').css({ 'min-height': (jQuery(window).height()) });

instagramSlider();
 jQuery(".slide_menu").pageslide({ direction: "left", modal: true });
});

jQuery(window).resize(function(){
 
  // jQuery('#full_bg_slideshow').css({ 'min-height': (jQuery(window).height()) });
  // jQuery('#full_bg_slideshow .rsImg').css({ 'min-height': (jQuery(window).height()) });
  // jQuery('#full_bg_slideshow .rsContent').css({ 'min-height': (jQuery(window).height()) });
  // jQuery('#full_bg_slideshow .rsOverflow').css({ 'min-height': (jQuery(window).height()) });
  // jQuery('#full_bg_slideshow .rsContainer').css({ 'min-height': (jQuery(window).height()) });
  // jQuery('#full_bg_slideshow .rsSlide').css({ 'min-height': (jQuery(window).height()) });

 
   

});




