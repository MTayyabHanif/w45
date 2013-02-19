/**
* jQuery.zLayer.full v0.2 plugin
* Copyright (c) 2010 Devin R. Olsen
* Date: 12/10/2010
*
* Project Home:
* http://www.devinrolsen.com/jquery-zlayers-plugin/
*/jQuery.fn.extend({zlayer:function(e){function o(e,t){var n=t.pageX,r=t.pageY,i=e.offset(),s=i.left,o=i.top,u=s+e.width(),a=o+e.height();return n>=s&&n<=u&&r>=o&&r<=a?!0:!1}function u(e){var t=r.offset(),n=e.pageX-t.left-r.width()/2,i=e.pageY-t.top-r.height()/2;r.css({top:a(i,"y"),left:a(n,"x")})}function a(e,t){e=n.force=="pull"?s==t?e=0:e/=i:s==t?e=0:e=-e/i;return parseInt(e)}var t={canvas:document,confine:"",force:"push",mass:10},e=jQuery.extend(t,e),n=e,r=jQuery(this),i=n.mass,s=n.confine;return this.each(function(){jQuery(n.canvas).bind({mousemove:function(e){u(e)},touchmove:function(e){e=e.originalEvent;e.preventDefault();o(jQuery(this),e)&&u(e)}})})}});