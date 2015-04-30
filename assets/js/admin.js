(function($) {  
    $(document).ready(function() { 
        //$('.fac-agp-color-picker').wpColorPicker({
        $('.fac-agp-color-picker').iris({
            defaultColor: false,
            change: function(event, ui){},
            clear: function() {},
            hide: false,
            palettes: true            
        });        
    });
})(jQuery);


