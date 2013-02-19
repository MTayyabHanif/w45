<div id="socialIcons" class="socialIcons">
<?php
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, 'w45_square_thumb_350', false);
$image_url = $image_url[0];
?>
<ul>  
    <a target="_blank" href="http://www.facebook.com/share.php?u=<?php print(urlencode(get_permalink())); ?>&title=<?php print(urlencode(the_title())); ?>"><li class="facebook_icon"></li></a>
    <a target="_blank" href="http://twitter.com/home?status=<?php print(urlencode(the_title())); ?>+<?php the_permalink(); ?>"><li class="twitter_icon"></li></a>
    <a target="_blank" href="http://www.tumblr.com/share?v=3&u=<?php print(urlencode(get_permalink())); ?>&t=<?php print(urlencode(the_title())); ?>"><li class="tumblr_icon"></li></a>
    <a target="_blank" href="https://plus.google.com/share?url=<?php print(urlencode(get_permalink())); ?>"><li class="google_icon"></li></a>
    <a class ="hide" href="#"><li class="linkedin_icon"></li></a>
    <a class ="hide" href="#"><li class="youtube_icon"></li></a>
    <a target="_blank" href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $image_url; ?>&url=<?php print(urlencode(get_permalink())); ?>&is_video=false&description=<?php print(urlencode(the_title())); ?>"><li class="pinterest_icon"></li></a>    
    <a target="_blank" class ="hide" href="http://www.stumbleupon.com/submit?url=[URL]&title=[TITLE]"><li class="stumbleupon_icon"></li></a>  
    <a target="_blank" class ="hide" href="#"><li class="vimeo_icon"></li></a>  
    <a class ="hide"  href="#"><li class="instagram_icon"></li></a>
  </ul>
</div>