
<?php $facebook_page_id = of_get_option('w45_facebook_page_id'); ?>


<div id="facebook-likes" class="hideMobile">
    <div id="facebook_love" class="box">
         <h3 id="fan_count"></h3>
    </div>  
    <p>Way Better People</p>
<div id="fb-icon"><a href="https://www.facebook.com/<?php echo $facebook_page_id; ?>"><img src="https://www.gowaybetter.com/wbsnx3/assets/facebook2.png"></a></div>
</div>


<script>
jQuery(document).ready(function(){

 //Facebook Page Likes
  jQuery.fn.digits = function(){ 
      return this.each(function(){ 
          jQuery(this).text( jQuery(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
      })
  }
  
      jQuery.ajax({
          dataType: 'jsonp',
          url: 'https://graph.facebook.com/<?php echo($facebook_page_id);?>',
          error: function(data) {
              jQuery('#fan_count').html('8,822 Fans!');
          },
          success: function(data){
              data.likes = data.likes.toString();
              var output = '';

              output = data.likes

              jQuery('#fan_count').html(output);
        jQuery("#fan_count").digits();
          }
      });
});
</script>
