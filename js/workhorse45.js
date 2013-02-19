//////////////////////////////////////////////////////////////
// IMPORTS
/////////////////////////////////////////////////////////////

//@codekit-prepend "modernizr.custom.70736.js"

//@codekit-prepend "jquery.isotope.min.js"
//@codekit-prepend "jquery.scrollTo.js"

//@codekit-prepend "jquery.dropdown.js"

//@codekit-prepend "jquery.easing.1.3.js"

//@codekit-prepend "jquery.prettyPhoto.js"

//@codekit-prepend "jquery.royalslider.js"

//Toggle Panel

//@codekit-prepend "jquery.pageslide.min.js"

//Toggle Panel

//@codekit-prepend "jquery.ajax-retry.js"
//@codekit-prepend "jquery.ba-resize.js"
//@codekit-prepend "jquery.toggle-panel.js"

//Tabbing Accordion

//@codekit-prepend "tabs_js/index.js"
//@codekit-prepend "tabs_js/jquery.tabs+accordion.js"


//jmpress Slidshow
//@codekit-prepend "jquery.jmslideshow.js"
//@codekit-prepend "jmpress.min.js"



//Parallax Image Frame

//@codekit-prepend "jquery.zlayer.full.js"


// "jquery.masonry.min.js"
// "jquery.history.js"
// "js-url.min.js"
// "jquerypp.custom.js"
// "gamma.js"





//////////////////////////////////////////////////////////////
// Set Variables
/////////////////////////////////////////////////////////////

var transitionSpeed = 500;
var scrollSpeed = 700;
var fadeDelay = 100;
var currentProject = "";
var nextProject = "";
var previousHeight = "";
var emptyProjectBoxHeight = 400;
var hasSlideshow = false;
  
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
  
function isiPad(){
    return (navigator.platform.indexOf("iPad") != -1);
}

function isiPhone(){
    return (
        //Detect iPhone
        (navigator.platform.indexOf("iPhone") != -1) || 
        //Detect iPod
        (navigator.platform.indexOf("iPod") != -1)
    );
}

///////////////////////////////   
// Isotope Browser Check
///////////////////////////////

function isotopeAnimationEngine(){
  if(jQuery.browser.mozilla || jQuery.browser.msie){
    return "jquery";
  }else{
    return "css";
  }
}

///////////////////////////////   
// Lightbox
/////////////////////////////// 

function lightboxInit() {
  if(screen.width > 500){
    jQuery("a[rel^='prettyPhoto']").prettyPhoto({
      social_tools: false,
      deeplinking: false
    });
  }
}


///////////////////////////////
// Project Filtering 
///////////////////////////////

function projectFilterInit() {
  jQuery('#filterNav a').click(function(){
    var selector = jQuery(this).attr('data-filter');  
    jQuery('#projects .thumbs2').isotope({
      filter: selector,     
      hiddenStyle : {
          opacity: 0,
          scale : 1
      }     
    });
  
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
  
  if(!isiPad() && !isiPhone()) {
    jQuery(".project.small").hover(
      function() {
        if(!jQuery(this).hasClass("selected")){
          jQuery(this).find('img:last').stop().fadeTo("fast", .9);
        }
          
      },
      function() {
        if(!jQuery(this).hasClass("selected")){
          jQuery(this).find('img:last').stop().fadeTo("fast", 1);
        } 
    });
    
    jQuery(".project.small").hover( 
      function() {
        
          jQuery(this).find('.title').stop().fadeTo("fast", 1);
          jQuery(this).find('img:last').attr('title','');
        
      },
      function() {
        if(!jQuery(this).hasClass("selected")){
          jQuery(this).find('.title').stop().fadeTo("fast", 0);
        }       
    });
  } 
  
  
 // // var container = jQuery('.thumbs.masonry');
 //  var container = jQuery('#thumbWrapper');
 //  var colW = container.width() * 0.2475;    
 //  //var colW = container.width() * 0.5;    
 //  container.isotope({ 
 //    animationEngine: "jquery",  
 //    resizable: false,
 //    masonry: {
 //      columnWidth: colW
 //    }
    
 //  });
  

  jQuery(".project.small").css("opacity", "1"); 
  
  jQuery(".project.small.ajx").click(function(){
    jQuery(".thumbs2 .selected .title").hide();
    jQuery(".thumbs2 .selected").find('img:last').stop().fadeTo("fast", 1);  
    jQuery(".thumbs2 .selected").removeClass("selected");            
    jQuery(this).addClass("selected");    
    jQuery(".thumbs2 .selected .title").show();
      
    var projectSlug = jQuery(this).attr('id').replace(/^project-/, '');
    jQuery.scrollTo(0, scrollSpeed);    
    processProject(projectSlug);
  }); 
  
}
  
  
///////////////////////////////   
//  Project Loading
/////////////////////////////// 

function processProject(projectSlug) {  
  
  // Prevent projecBox from collapsing  
  jQuery("#projectBox").css("height", jQuery("#projectHolder").outerHeight());  
  
  // Fade out the old project 
  if(currentProject != "") {      
    jQuery("#projectHolder").fadeOut(transitionSpeed,
      function() {
        jQuery(".project.ajax").remove();
        currentProject = "";            
        if(projectSlug){
          loadProject(projectSlug);
          jQuery("#ajaxLoading").fadeIn('fast');      
        };
      });
  }else{
    //No project currently loaded - open the projectBox to show the loader. 
    if(projectSlug){
      jQuery("#homeMessage").removeClass('withBorder');
      jQuery("#pageHead").removeClass('withBorder');
      jQuery("#projectBox").animate({
        height: emptyProjectBoxHeight
      }, scrollSpeed,
      function() {        
        jQuery("#ajaxLoading").fadeIn('fast',
          function() {
            loadProject(projectSlug);   
        }); 
      });         
    };
  } 
  
  if(!projectSlug){
    jQuery("#projectBox").animate({
      height: 0
      }, scrollSpeed,
      function() {        
        jQuery("#homeMessage").addClass('withBorder');
        jQuery("#pageHead").addClass('withBorder');       
      });
              
  }   
}

  
function loadProject(projectSlug) { 
  // Scroll to the top of the projects  
  jQuery("#projectHolder").load(      
      MyAjax.ajaxurl,
      {         
          action : 'myajax-submit',         
          slug : projectSlug
      },
      function( response ) {
          
      }
  );
}


function waitForMedia(projectSlug, slideshowDelay) {
  
  var totalMediaElements = 0;
  var loadedMediaElements = 0;
  var mediaTypes = ['img'];
  var autoPlay = (slideshowDelay != "0") ? 1 : 0;
  for(var i=0; i<=mediaTypes.length; i++) {
    totalMediaElements += jQuery("#projectHolder " + mediaTypes[i]).length; 
  } 
  
  if(totalMediaElements > 0){
    for(var i=0; i<=mediaTypes.length; i++) {
      jQuery("#projectHolder " + mediaTypes[i]).each(function() {                 
          jQuery(this).load(function() {        
              loadedMediaElements++;
              if(loadedMediaElements == totalMediaElements) {
            jQuery("#ajaxLoading").fadeOut('fast',
            function(){           
              //Set up the slideshow
                  jQuery('.flexslider').flexslider({
                slideshowSpeed: slideshowDelay + '000',     
                slideshow: autoPlay,                
                animation: "fade",
                animationLoop: true,
                controlNav: true,             
                directionNav: true,
                pauseOnAction: true,            
                pauseOnHover: false,            
                useCSS: true,                   
                touch: true,                  
                video: false
              });
              showProject(projectSlug);
            });
              }
          });
      
      }); 
    }
  }else{
    jQuery("#ajaxLoading").fadeOut('fast',
    function(){         
      //Fix Vimeo embed for iPad      
      if(isiPad()) {        
        jQuery.each(jQuery("iframe"), function() {
          jQuery(this).attr({
            src: jQuery(this).attr("src")
          });
        });
      }     
      showProject(projectSlug);     
    });   
  } 
}

function showProject(projectSlug) {   
  
  // Fade in the new project  
  jQuery("#projectHolder").fadeIn(transitionSpeed); 
  currentProject = "project-" + projectSlug;
  jQuery("#" + currentProject).addClass("selected");  
  
  // Adjust the height of project container
  
  targetHeight = jQuery("#projectHolder").outerHeight();  
  jQuery("#projectHolder").css("height", targetHeight); 
  jQuery("#projectBox").animate({
    height: jQuery("#projectHolder").outerHeight()
  }, scrollSpeed,
  function() {
    jQuery("#projectHolder").css("height", "auto");       
    jQuery("#projectBox").css("height", "auto");    
  }); 
  previousHeight = targetHeight;  
  
  jQuery("#projectHolder .closeBtn").click(function(){
    jQuery(".thumbs .selected .title").hide();
    jQuery(".thumbs .selected").find('img:last').stop().fadeTo("fast", 1);  
    jQuery(".thumbs .selected").removeClass("selected");    
    jQuery.scrollTo(0, scrollSpeed);  
    processProject();
  });
}

///////////////////////////////
// Project Nav 
///////////////////////////////

function nextPrevProject(slug) {
  var projectSlug = slug;
  jQuery(".thumbs .selected .title").hide();
  jQuery(".thumbs .selected").find('img:last').stop().fadeTo("fast", 1);  
  jQuery(".thumbs .selected").removeClass("selected");            
  jQuery("#project-"+projectSlug).addClass("selected"); 
  jQuery(".thumbs .selected").find('.title').stop().fadeTo("fast", 1);    
  
  jQuery.scrollTo(0, scrollSpeed);    
  processProject(projectSlug);
}

///////////////////////////////
// Isotope Grid Resize
///////////////////////////////

// function gridResize() { 
//   // update columnWidth on window resize
//   var container = jQuery('#thumbWrapper');
//   //var colW = container.width() * 0.2475;  
//   var colW = container.width() * .20;  
//   container.isotope({
//     resizable: false,
//     masonry: {
//       columnWidth: colW
//     }
//   });     
// }





// // Set Variables
// /////////////////////////////////////////////////////////////
// var transitionSpeed = 500;
// var scrollSpeed = 700;
// var fadeDelay = 100;
// var currentProject = "";
// var nextProject = "";
// var previousHeight = "";
// var emptyProjectBoxHeight = 450;
// var hasSlideshow = false;




// ///////////////////////////////   
// // Mobile Detection
// ///////////////////////////////

// function isMobile(){
//     return (
//         (navigator.userAgent.match(/Android/i)) ||
//     (navigator.userAgent.match(/webOS/i)) ||
//     (navigator.userAgent.match(/iPhone/i)) ||
//     (navigator.userAgent.match(/iPod/i)) ||
//     (navigator.userAgent.match(/iPad/i)) ||
//     (navigator.userAgent.match(/BlackBerry/))
//     );
// }
  
// function isiPad(){
//     return (navigator.platform.indexOf("iPad") != -1);
// }

// function isiPhone(){
//     return (
//         //Detect iPhone
//         (navigator.platform.indexOf("iPhone") != -1) || 
//         //Detect iPod
//         (navigator.platform.indexOf("iPod") != -1)
//     );
// }

// ///////////////////////////////   
// // Isotope Browser Check
// ///////////////////////////////

// function isotopeAnimationEngine(){
//   if(jQuery.browser.mozilla || jQuery.browser.msie){
//     return "jquery";
//   }else{
//     return "css";
//   }
// }

// ///////////////////////////////   
// // Lightbox
// /////////////////////////////// 

// function lightboxInit() {
//   if(screen.width > 500){
//     jQuery("a[rel^='prettyPhoto']").prettyPhoto({
//       social_tools: false,
//       deeplinking: false
//     });
//   }
// }



// ///////////////////////////////
// // Project Filtering 
// ///////////////////////////////

// function projectFilterInit2() {
//   jQuery('#filterNav a').click(function() {
//     var selector = jQuery(this).attr('data-filter');
//     jQuery('#projects .thumbs').isotope({
//       filter: selector,
//       hiddenStyle: {
//         opacity: 0,
//         scale: 1
//       }
//     });

//     if (!jQuery(this).hasClass('selected')) {
//       jQuery(this).parents('#filterNav').find('.selected').removeClass('selected');
//       jQuery(this).addClass('selected');
//     }

//     return false;
//   });
// }


// ///////////////////////////////
// // Project thumbs 
// ///////////////////////////////

// function projectThumbInit() {

//   if (!isiPad() && !isiPhone()) {
//     jQuery(".project.small").hover(

//     function() {
//       if (!jQuery(this).hasClass("selected")) {
//         jQuery(this).find('img:last').stop().fadeTo("fast", 1);
//       }

//     }, function() {
//       if (!jQuery(this).hasClass("selected")) {
//         jQuery(this).find('img:last').stop().fadeTo("fast", 1);
//       }
//     });

//     jQuery(".project.small").hover(

//     function() {

//       jQuery(this).find('.title').stop().fadeTo("fast", 1);
//       jQuery(this).find('img:last').attr('title', '');

//     }, function() {
//       if (!jQuery(this).hasClass("selected")) {
//         jQuery(this).find('.title').stop().fadeTo("fast", 0);
//       }
//     });
//   }


//   jQuery('.thumbs.masonry').isotope({
//     // options
//     itemSelector: '.project.small',
//     layoutMode: 'masonry',
//     animationEngine: isotopeAnimationEngine()
//   });


//   jQuery(".project.small").css("opacity", "1");

//   jQuery(".project.small.ajx").click(function() {
//     jQuery(".thumbs .selected .title").hide();
//     jQuery(".thumbs .selected").find('img:last').stop().fadeTo("fast", 1);
//     jQuery(".thumbs .selected").removeClass("selected");
//     jQuery(this).addClass("selected");
//     jQuery(".thumbs .selected .title").show();

    
//     //  jQuery.scrollTo('#category_pulldown', scrollSpeed);   
//     //jQuery.scrollTo(0, scrollSpeed);
//     //jQuery.scrollTo( '#category_pulldown', scrollSpeed );
//     jQuery.scrollTo('#projectBox', scrollSpeed);


// var projectSlug = jQuery(this).attr('id').replace(/^project-/, '');
//     processProject(projectSlug);
//   });

// }


// ///////////////////////////////   
// //  Project Loading
// /////////////////////////////// 

// function processProject(projectSlug) {

//   // Prevent projecBox from collapsing  
//   jQuery("#projectBox").css("height", jQuery("#projectHolder").outerHeight());

//   // Fade out the old project 
//   if (currentProject != "") {
//     jQuery("#projectHolder").fadeOut(transitionSpeed, function() {
//       jQuery(".project.ajax").remove();
//       currentProject = "";
//       if (projectSlug) {
//         loadProject(projectSlug);
//         //jQuery("#canvasloader-container").fadeIn('fast');
//         //cl.show();
//         jQuery("#ajaxLoading").fadeIn('fast');
//       };
//     });
//   } else {
//     //No project currently loaded - open the projectBox to show the loader. 
//     if (projectSlug) {
//       jQuery("#homeMessage").removeClass('withBorder');
//       jQuery("#pageHead").removeClass('withBorder');
//       jQuery("#projectBox").animate({
//         height: emptyProjectBoxHeight
//       }, scrollSpeed, function() {
//         //jQuery("#canvasloader-container").fadeIn('fast'); 
//         //cl.show();
//         jQuery("#ajaxLoading").fadeIn('fast', function() {
//           loadProject(projectSlug);
//         });
//       });
//     };
//   }

//   if (!projectSlug) {
//     jQuery("#projectBox").animate({
//       height: 0
//     }, scrollSpeed, function() {
//       jQuery("#homeMessage").addClass('withBorder');
//       jQuery("#pageHead").addClass('withBorder');
//     });

//   }
// }


// function loadProject(projectSlug) {
//   // Scroll to the top of the projects  
//   jQuery("#projectHolder").load(
//   MyAjax.ajaxurl, {
//     action: 'myajax-submit',
//     slug: projectSlug
//   }, function(response) {

//   });
// }


// function waitForMedia(projectSlug, slideshowDelay) {

//   var totalMediaElements = 0;
//   var loadedMediaElements = 0;
//   var mediaTypes = ['img'];

//   for (var i = 0; i <= mediaTypes.length; i++) {
//     totalMediaElements += jQuery("#projectHolder " + mediaTypes[i]).length;
//   }
//   //alert(totalMediaElements);
//   if (totalMediaElements > 0) {
//     for (var i = 0; i <= mediaTypes.length; i++) {
//       jQuery("#projectHolder " + mediaTypes[i]).each(function() {
//         jQuery(this).load(function() {
//           loadedMediaElements++;
//           if (loadedMediaElements == totalMediaElements) {
//             //jQuery("#canvasloader-container").fadeOut('fast');
//             //cl.hide();
//             jQuery("#ajaxLoading").fadeOut('fast', function() {
//               //Set up the slideshow
//               //jQuery('.flexslider').flexslider({
//               //slideshowSpeed: slideshowDelay+"000",  
//               //directionNav: true,         
//               //animation: "fade" 
//               //});
//               showProject(projectSlug);
//             });
//           }
//         });

//       });
//     }
//   } else {
//     //cl.hide();
//     //jQuery("#canvasloader-container").fadeOut('fast');
//     jQuery("#ajaxLoading").fadeOut('fast', function() {
//       //Fix Vimeo embed for iPad      
//       if (isiPad()) {
//         jQuery.each(jQuery("iframe"), function() {
//           jQuery(this).attr({
//             src: jQuery(this).attr("src")
//           });
//         });
//       }
//       showProject(projectSlug);
//     });
//   }
// }

// function showProject(projectSlug) {

//   // Fade in the new project  
//   jQuery("#projectHolder").fadeIn(transitionSpeed);
//   currentProject = "project-" + projectSlug;
//   jQuery("#" + currentProject).addClass("selected");

//   // Adjust the height of project container
//   targetHeight = jQuery("#projectHolder").outerHeight();
//   jQuery("#projectHolder").css("height", targetHeight);
//   jQuery("#projectBox").animate({
//     height: jQuery("#projectHolder").outerHeight()
//   }, scrollSpeed, function() {
//     jQuery("#projectHolder").css("height", "auto");
//     jQuery("#projectBox").css("height", "auto");

//     // jQuery('.visuals').transition({
//     //   x: 1500
//     // }, 800, 'cubic-bezier(0,0.9,0.3,1)');
//     // jQuery('.details').transition({
//     //   x: -1500
//     // }, 800, 'cubic-bezier(0,0.9,0.3,1)');

//   });
//   previousHeight = targetHeight;

//   jQuery("#projectHolder .closeBtn").click(function() {
//     jQuery(".thumbs .selected .title").hide();
//     jQuery(".thumbs .selected").find('img:last').stop().fadeTo("fast", 1);
//     jQuery(".thumbs .selected").removeClass("selected");
//     //jQuery.scrollTo(0, scrollSpeed);
//     //jQuery.scrollTo( '#category_pulldown', scrollSpeed ); 
//     jQuery.scrollTo('#projectBox', scrollSpeed);
//     processProject();
//   });
// }

// ///////////////////////////////
// // Project Nav 
// ///////////////////////////////

// function nextPrevProject(slug) {
//   var projectSlug = slug;
//   jQuery(".thumbs .selected .title").hide();
//   jQuery(".thumbs .selected").find('img:last').stop().fadeTo("fast", 1);
//   jQuery(".thumbs .selected").removeClass("selected");
//   jQuery("#project-" + projectSlug).addClass("selected");
//   jQuery(".thumbs .selected").find('.title').stop().fadeTo("fast", 1);

//   //jQuery.scrollTo(0, scrollSpeed);
//   //jQuery.scrollTo( '#category_pulldown', scrollSpeed );   
//   jQuery.scrollTo('#projectBox', scrollSpeed);
//   processProject(projectSlug);
// }







///////////////////////////////		
// Mobile Detection
///////////////////////////////

// function isMobile(){
//     return (
//         (navigator.userAgent.match(/Android/i)) ||
// 		(navigator.userAgent.match(/webOS/i)) ||
// 		(navigator.userAgent.match(/iPhone/i)) ||
// 		(navigator.userAgent.match(/iPod/i)) ||
// 		(navigator.userAgent.match(/iPad/i)) ||
// 		(navigator.userAgent.match(/BlackBerry/))
//     );
// }

// ///////////////////////////////
// // Project Filtering 
// ///////////////////////////////

// function projectFilterInit() {
// 	jQuery('#filterNav a').click(function(){
// 		var selector = jQuery(this).attr('data-filter');	
// 		jQuery(this).css('outline','none');
// 		jQuery('ul#filter .current').removeClass('current');
// 		jQuery(this).parent().addClass('current');
		
// 		if(selector == 'all') {
// 			jQuery('#projects .thumbs .project.inactive .inside').fadeIn('slow').removeClass('inactive').addClass('active');
// 		} else {
// 			jQuery('#projects .thumbs .project').each(function() {
// 				if(!jQuery(this).hasClass(selector)) {
// 					jQuery(this).removeClass('active').addClass('inactive');
// 					jQuery(this).find('.inside').fadeOut('normal');
// 				} else {
// 					jQuery(this).addClass('active').removeClass('inactive');
// 					jQuery(this).find('.inside').fadeIn('slow');
// 				}
// 			});
// 		}		
	
// 		if ( !jQuery(this).hasClass('selected') ) {
// 			jQuery(this).parents('#filterNav').find('.selected').removeClass('selected');
// 			jQuery(this).addClass('selected');
// 		}
	
// 		return false;
// 	});		
// }






// ///////////////////////////////
// // Project thumbs 
// ///////////////////////////////

// function projectThumbInit() {
	
// 	if(!isMobile()) {		
	
// 		jQuery(".project.small .inside a").hover(
// 			function() {
// 				jQuery(this).find('img:last').stop().fadeTo("fast", .1);
// 				jQuery(this).find('img:last').attr('title','');	
// 			},
// 			function() {
// 				jQuery(this).find('img:last').stop().fadeTo("fast", 1);	
// 		});
			
// 		jQuery(".project.small .inside").hover(	
// 			function() {				
// 				jQuery(this).find('.title').stop().fadeTo("fast", 1);
// 				jQuery(this).find('img:last').attr('title','');				
// 			},
// 			function() {				
// 				jQuery(this).find('.title').stop().fadeTo("fast", 0);							
// 		});
		
// 	}
	
// 	jQuery(".project.small").css("opacity", "1");	
// }

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
jQuery('#main_toggle .accordion, #main_toggle .tabs')
	.TabsAccordion({
		hashWatch: true,
		pauseMedia: true,
		//responsiveSwitch: 'tablist',
    responsiveSwitch: 1,
		//saveState: sessionStorage,
	});
}

function tab_panel_underlined() {
jQuery('.accordion, .tabs')
  .TabsAccordion({
    hashWatch: true,
    pauseMedia: true,
    responsiveSwitch: 'tablist',
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
      autoScaleSlider: true, 
       autoScaleSliderWidth: 1600,     
      autoScaleSliderHeight: 500,
    minSlideOffset: 10,
		arrowsNav: true,
		autoPlay: {
			enabled: true,
			delay: 4000
		},
		autoScaleSliderHeight: 500,
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
    //startSlideId: 0,
    randomizeSlides: true,
    autoPlay: true,
    transitionType:'fade',
    autoPlay: {
    pauseOnHover: false,
    enabled: true,

    delay: 4000
  },
    globalCaption: true
  });
}

function fullWidthSlidshow(){
jQuery('#homeSlider').royalSlider({
  //controlNavigation:'thumbnails',
  imageScaleMode: 'fill',
  allowCSS3OnMacWebkit: true,
  
  fullscreen: false,
  loop: true,
  thumbs: {
    firstMargin: false
  },
  autoPlay: {
    enabled: true,
    delay: 5000
  },
//controlNavigation: 'bullets',
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
}

///////////////////////////////
// Royal Slider With Blocks
///////////////////////////////
function blockSlider(){
jQuery('#block_slider').royalSlider({
    arrowsNav: true,
    imageScaleMode: 'fill',
    arrowsNavAutoHide: false,
    fadeinLoadedSlide: false,
    controlNavigationSpacing: 0,
    controlNavigation: 'bullets',
    //imageScaleMode: 'none',
    imageAlignCenter:true,
    blockLoop: true,
    loop: true,
    numImagesToPreload: 6,
    transitionType: 'fade',
    keyboardNavEnabled: true,
    block: {
      delay: 400
    }
  });
}

///////////////////////////////
// Mobile Nav
///////////////////////////////

function setMobileNav(){
  jQuery('#mainNav .sf-menu').tinyNav({
    active: 'current-menu-item'
  }); 
}

///////////////////////////////
// jmpress Slider
///////////////////////////////
function jmpressSlideshow() {
      
      var jmpressOpts = {
        animation   : { transitionDuration : '3.0s' }
      };
      
      jQuery( '#jms-slideshow' ).jmslideshow( jQuery.extend( true, { jmpressOpts : jmpressOpts }, {
        autoplay  : true,
        bgColorSpeed: '0.5s',
        arrows    : true
      }));
      
    }




/////////////////////////////////////////////////////////////////////////
// Initialize
/////////////////////////////////////////////////////////////////////////
	
jQuery.noConflict();
jQuery(document).ready(function(){

//tab_panel();
tab_panel_underlined();

horThumbSlider();
video_gallery();


toggle_panel();



fullPageSlidshow();
fullWidthSlidshow();

blockSlider();
jmpressSlideshow();

setMobileNav();

// jQuery( '#cd-dropdown' ).dropdown( { gutter : 5 } );

// jQuery( '#pa_size' ).dropdown( { gutter : 5 } );

// jQuery( '.orderby' ).dropdown( { gutter : 5 } );



	
	// if(!isMobile()) {
	// 	jQuery(window).scroll(function() {	      
	//        scrollBanner();	      
	// 	});
	// }




 //Slide to the left, and make it model (you'll have to call $.pageslide.close() to close) 
  
  	
  	//toggle_panel();
	
	jQuery(".videoContainer").fitVids();
	//jQuery("#homeBanner h2").fitText(1.7, { minFontSize: '24px', maxFontSize: '45px' });	
	//jQuery("#bannerText2 h2").fitText(1.7, { minFontSize: '16px', maxFontSize: '45px' });	


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

//Custom Login/Registar
// jQuery(".tab_content_login").hide();
// jQuery("ul.tabs_login li:first").addClass("active_login").show();
// jQuery(".tab_content_login:first").show();
// jQuery("ul.tabs_login li").click(function() {
// jQuery("ul.tabs_login li").removeClass("active_login");
// jQuery(this).addClass("active_login");
// jQuery(".tab_content_login").hide();
// var activeTab = jQuery(this).find("a").attr("href");
// if (jQuery.browser.msie) {jQuery(activeTab).show();}
// else {jQuery(activeTab).show();}
// return false;
// });





});




jQuery(window).load(function() {
  jQuery('#left_fixed #product_summary').css({ 'min-height': (jQuery(window).height()) });
  //jQuery('#left_fixed header#header').css({ 'min-height': (jQuery(window).height()) });

  jQuery('#full_bg_slideshow').css({ 'min-height': (jQuery(window).height()) });
  jQuery('#full_bg_slideshow .rsImg').css({ 'min-height': (jQuery(window).height()) });
  jQuery('#full_bg_slideshow .rsContent').css({ 'min-height': (jQuery(window).height()) });
  jQuery('#full_bg_slideshow .rsOverflow').css({ 'min-height': (jQuery(window).height()) });
  jQuery('#full_bg_slideshow .rsContainer').css({ 'min-height': (jQuery(window).height()) });
  jQuery('#full_bg_slideshow .rsSlide').css({ 'min-height': (jQuery(window).height()) });
  lightboxInit();
  projectThumbInit(); 
  projectFilterInit();
  

// jQuery('#homeBanner').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#block_slider').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#block_slider .rsImg').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#block_slider .rsContent').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#block_slider .rsOverflow').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#block_slider .rsContainer').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#block_slider .rsSlide').css({ 'min-height': (jQuery(window).height()) });





  instagramSlider();
 jQuery(".slide_menu").pageslide({ direction: "left", modal: true });


// Show project is there is a hash in the URL
  var projectSlug = location.hash.replace("\#",""); 
  if(projectSlug != "index"){
    processProject(projectSlug);
  }
  
  // jQuery(window).smartresize(function(){
  //   gridResize();
  // });






        







});





jQuery(window).resize(function(){
  
  jQuery('#left_fixed #product_summary').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#left_fixed header#header').css({ 'min-height': (jQuery(window).height()) });
  jQuery('#full_bg_slideshow').css({ 'min-height': (jQuery(window).height()) });
  jQuery('#full_bg_slideshow .rsImg').css({ 'min-height': (jQuery(window).height()) });
  jQuery('#full_bg_slideshow .rsContent').css({ 'min-height': (jQuery(window).height()) });
  jQuery('#full_bg_slideshow .rsOverflow').css({ 'min-height': (jQuery(window).height()) });
  jQuery('#full_bg_slideshow .rsContainer').css({ 'min-height': (jQuery(window).height()) });
  jQuery('#full_bg_slideshow .rsSlide').css({ 'min-height': (jQuery(window).height()) });


// jQuery('#homeBanner').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#block_slider').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#block_slider .rsImg').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#block_slider .rsContent').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#block_slider .rsOverflow').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#block_slider .rsContainer').css({ 'min-height': (jQuery(window).height()) });
// jQuery('#block_slider .rsSlide').css({ 'min-height': (jQuery(window).height()) });


 
   

});




