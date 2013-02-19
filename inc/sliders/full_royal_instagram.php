

<div class="content wrap">
	
			
<div class="carosel_Hor_3x3 container2 inside">


	
<div id="instagram" class="video-touchslider2  royalSlider videoGallery rsDefault">

	<!-- <div class="instagram"></div> -->


<!-- <div class='rsContent'><a class='rsImg' data-rsVideo='#' href='#'><div class='rsTmb'><div class='tc_thumb'   style='background-image: url("http://placehold.it/300x300/FF9E15/ffffff")'><a target='_blank' href='#'></a></div></div></a></div>
 -->

</div><!--video-gallery-->
</div>
</div>


<div class="clearboth"></div>



<?php $instagram_user_id = of_get_option('w45_instagram_user_id'); ?>
<?php $instagram_access_token = of_get_option('w45_instagram_access_token'); ?>
<?php $images_to_display = of_get_option('w45_instagram_image_num'); ?>
<script>

jQuery(document).ready(function(){

	//Instagram Feed
 jQuery.ajax({
    	type: "GET",
        dataType: "jsonp",
        cache: false,
        url: "https://api.instagram.com/v1/users/<?php echo($instagram_user_id);?>/media/recent/?access_token=<?php echo($instagram_access_token);?>",
        success: function(data) {
            for (var i = 0; i < <?php echo($images_to_display);?>; i++) {
        //jQuery(".instagram").append("<div class='instagram-placeholder'><a target='_blank' href='" + data.data[i].link +"'><img class='instagram-image' src='" + data.data[i].images.low_resolution.url +"' /></a></div>");   
       jQuery("#instagram").append("<div class='rsContent'><a class='rsImg' data-rsVideo='#' href='#'><div class='rsTmb'><a target='_blank' href='" + data.data[i].link + "'><div class='tc_thumb'   style='background-image: url(" + data.data[i].images.low_resolution.url + ")'></div></a></div></a></div>");
        //jQuery("#instagram").append("<div class='rsContent'><a class='rsImg' data-rsVideo='#' href='#'><div class='rsTmb'><div class='tc_thumb'   style='background-image: url(http://placehold.it/300x300/FF9E15/ffffff)'><a target='_blank' href='#'></a></div></div></a></div>");
        //jQuery(".instagram").append("<div class='rsContent'><a class='rsImg'><div class='rsTmb'><div class='tc_thumb instagram-image' ><a target='_blank' href='" + data.data[i].link +"'><img class='instagram-image' src='" + data.data[i].images.low_resolution.url +"' /></a></div></div></a></div>");

      		}     
                            
        }
    });
});
</script>
