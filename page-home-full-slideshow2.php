<?php /*
Template Name: Home Full Slideshow2
*/ ?>
<?php get_header(); ?>

<div id="gallery-2" class="royalSlider rsDefault" style="background:#333;" >
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800/333333/ffffff" href="http://placehold.it/800x800/333333/ffffff"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
  <a class="rsImg" data-rsBigImg="http://placehold.it/800x800" href="http://placehold.it/800x800"><img width="100" height="50" class="rsTmb" src="http://placehold.it/100x50" /></a>
 
</div>

<script id="addJS">
jQuery(document).ready(function() {
  jQuery('#gallery-2').royalSlider({
    fullscreen: {
      enabled: true,
      nativeFS: true
    },
    controlNavigation: 'thumbnails',
    thumbs: {
      orientation: 'vertical'
    },
    transitionType:'fade',
    autoScaleSlider: true, 
    autoScaleSliderWidth: 960,     
    autoScaleSliderHeight: 600,
    loop: true,
    arrowsNav: false,
    keyboardNavEnabled: true
  });

jQuery('#gallery-2').css({ 'height': (jQuery(window).height()) });

});





jQuery(window).resize(function(){
  
  jQuery('#gallery-2').css({ 'height': (jQuery(window).height()) });
 //jQuery('#gallery-2').css({ 'min-height': (jQuery(window).width()) });

});

</script>


<?php get_footer('lite'); ?>	