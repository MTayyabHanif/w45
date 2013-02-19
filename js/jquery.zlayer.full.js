/**
* jQuery.zLayer.full v0.2 plugin
* Copyright (c) 2010 Devin R. Olsen
* Date: 12/10/2010
*
* Project Home:
* http://www.devinrolsen.com/jquery-zlayers-plugin/
*/
jQuery.fn.extend({   
    zlayer: function(options) {  
    var defaults = {  
     canvas: document,
     confine:'',
     force:'push',
     mass:10
    }    
        var options =  jQuery.extend(defaults, options);
        var o = options;   
        var obj = jQuery(this);//OBJECT
        var m = o.mass; //MASS VALUE
        var c = o.confine; //CONFINED VALUE    
    
        return this.each(function() {         
            jQuery(o.canvas).bind({
                mousemove: function(e) {
                    pointerMove(e);
                },
                touchmove: function(e) {
                    e = e.originalEvent;
                    e.preventDefault();
                    if (withinContainer(jQuery(this), e)) {
                        pointerMove(e);
                    }
                }
            });
        });
        
        function withinContainer(container, e) {
            var x = e.pageX,
                y = e.pageY,
                position = container.offset(),
                minX = position.left,
                minY = position.top,
                maxX = minX + container.width(),
                maxY = minY + container.height();
            
            if ( (x >= minX && x <= maxX) && (y >= minY && y <= maxY) ) {
                return true;
            }
            else {
                return false;
            }
        }
        
        function pointerMove(e) {
            // OBJECT UNDER OFFSET
            var elm = obj.offset();
        
            // LOCATE ORIENTATION LOCATION
            var x = e.pageX - elm.left - obj.width() / 2;
            var y = e.pageY - elm.top - obj.height() / 2;
        
            obj.css({
                top : cal(y,'y'),
                left : cal(x,'x')
            });
        }

        
        function cal(a,t){
        a = (o.force == 'pull')
        ? //IF FORCE IS PULL
            (c == t)
            ? a = 0 : a = a / m
        ://IF FORCE IS PUSH
            (c == t)
            ? //IF AXIS IS CONFINED
            a = 0 : a = -a / m ;    
            return parseInt(a);            
        }        
    }  
});
