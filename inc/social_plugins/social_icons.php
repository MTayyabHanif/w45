<div id="socialIcons" class="socialIcons">

  <?php $facebook_url = of_get_option('w45_facebook_url'); ?>
  <?php $twitter_url = of_get_option('w45_twitter_url'); ?>
  <?php $tumblr_url = of_get_option('w45_tumblr_url'); ?>
  <?php $google_url = of_get_option('w45_google_url'); ?>
  <?php $linkedin_url = of_get_option('w45_linkedin_url'); ?>
  <?php $youtube_url = of_get_option('w45_youtube_url'); ?>
  <?php $pinterest_url = of_get_option('w45_pinterest_url'); ?>
  <?php $vimeo_url = of_get_option('w45_vimeo_url'); ?>
  <?php $instagram_url = of_get_option('w45_instagram_url'); ?>

  <ul>
    <?php if ($facebook_url != "") : ?>
    <a href="<?php echo ($facebook_url); ?>"><li class="facebook_icon"></li></a>
    <?php endif; ?>

    <?php if ($twitter_url != "") : ?>
    <a href="<?php echo ($twitter_url); ?>"><li class="twitter_icon"></li></a>
    <?php endif; ?>

    <?php if ($tumblr_url != "") : ?>
    <a href="<?php echo ($tumblr_url); ?>"><li class="tumblr_icon"></li></a>
    <?php endif; ?>

    <?php if ($google_url != "") : ?>
    <a href="<?php echo ($google_url); ?>"><li class="google_icon"></li></a>
    <?php endif; ?>

    <?php if ($linkedin_url != "") : ?>
    <a href="<?php echo ($linkedin_url); ?>"><li class="linkedin_icon"></li></a>
    <?php endif; ?>

    <?php if ($youtube_url != "") : ?>
    <a href="<?php echo ($youtube_url); ?>"><li class="youtube_icon"></li></a>
    <?php endif; ?>

    <?php if ($pinterest_url != "") : ?>
    <a href="<?php echo ($pinterest_url); ?>"><li class="pinterest_icon"></li></a>
    <?php endif; ?>

    <?php if ($vimeo_url != "") : ?>
    <a href="<?php echo ($vimeo_url); ?>"><li class="vimeo_icon"></li></a>
    <?php endif; ?>

    <?php if ($instagram_url != "") : ?>
    <a href="<?php echo ($instagram_url); ?>"><li class="instagram_icon"></li></a>
    <?php endif; ?>
  </ul>
</div>