(function($) {  
    $(document).ready(function() { 
        jQuery(document).ready(function(){
            jQuery("#fac-constructor-box").colorbox({inline:true, width:"50%"});
        });
        
        $('.fac-agp-color-picker').wpColorPicker({
        //$('.fac-agp-color-picker').iris({
            defaultColor: false,
            change: function(event, ui){},
            clear: function() {},
            //hide: false,
            palettes: true            
        });        
    });
})(jQuery);


