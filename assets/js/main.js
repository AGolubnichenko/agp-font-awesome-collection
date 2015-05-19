(function($) {  
    
    $( window ).resize(function() {
        $('.fac-promotion-main-section').each(function() {
            var height;            
            var content = $(this).find('.fac-promotion-content');
            var preview = $(this).find('.fac-promotion-preview');
            var inner = $(this).find('.fpp-inner');
            
            if ($(content).height() > $(preview).height() ) {
                height = $(content).height();
                $(preview).height(height);
            } else {
                height = $(preview).height();
                $(content).height(height);
            }
            
            $(inner).height(height);
            $(inner).width($(this).outerWidth());
        });
    });    
    
    $(document).ready(function() { 

        $('.fac-promotion-main-section').each(function() {
            var height;            
            var content = $(this).find('.fac-promotion-content');
            var preview = $(this).find('.fac-promotion-preview');
            var inner = $(this).find('.fpp-inner');
            
            if ($(content).height() > $(preview).height() ) {
                height = $(content).height();
                $(preview).height(height);
            } else {
                height = $(preview).height();
                $(content).height(height);
            }
            
            $(inner).height(height);
            $(inner).width($(this).outerWidth());
        });


        if( /Android|iPhone|iPad|iPod|webOS|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {   
            $('.fac-promotion-main-section a').on('click', function(e) {
                e.preventDefault();
                return false;
            });               
            
            $('.fac-promotion-main-section .fac-promotion-preview').on('click', function(e) { 
                e.preventDefault();
                $(this).closest('.fac-promotion-main-section').find('.fac-promotion-content').show();
                $(this).closest('.fac-promotion-main-section').find('.fac-promotion-preview').hide();                
                return false;
            });             
            
            $('.fac-promotion-main-section .fac-promotion-content').on('tap', function(e) { 
                e.preventDefault();                                    
                var link = $(this).closest('.fac-promotion-main-section').find('a').attr('href');
                if (typeof(link) !== "undefined" && link != '' ) {
                    window.location = link;
                }
                return false;                
            });                         
            
            $('.fac-promotion-main-section').mouseout(function(e){
                $(this).find('.fac-promotion-content').hide();
                $(this).find('.fac-promotion-preview').show();                                
                return false;
            });            
        } else {
            $('.fac-promotion-main-section').hover(
                function() {
                    $(this).find('.fac-promotion-content').show();
                    $(this).find('.fac-promotion-preview').hide();
                },
                function() {
                    $(this).find('.fac-promotion-content').hide();
                    $(this).find('.fac-promotion-preview').show();
                }                
            );            
        }
        

        $(".fac-slider.fac-slider-default > .container > ul").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 1000,
                maxwidth: "940"
        });        
        
    });
})(jQuery);


