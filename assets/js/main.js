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
        
//        $('.fac-slider-promotion').each(function() {
//            var inner = $(this).find('.fpp-inner');
//            $(inner).width($(this).outerWidth());
//        });


        $('.fac-slider-promotion').each(function() {
            var height = 0;
            $(this).find('.fac-promotion-main-section').each(function () {
                if ( height < $(this).height() ) {
                    height = $(this).height();
                }
            });
            $(this).find('.fac-promotion-main-section .fac-promotion-content').height(height);
            $(this).find('.fac-promotion-main-section .fac-promotion-preview').height(height);            
            //$(this).find('.fac-promotion-main-section .fac-promotion-content .fpp-inner').height(height);
            //$(this).find('.fac-promotion-main-section .fac-promotion-preview .fpp-inner').height(height);
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

        $('.fac-slider-promotion').each(function() {
            var height = 0;
            $(this).find('.fac-promotion-main-section').each(function () {
                if ( height < $(this).height() ) {
                    height = $(this).height();
                }
            });
            $(this).find('.fac-promotion-main-section .fac-promotion-content').height(height);
            $(this).find('.fac-promotion-main-section .fac-promotion-preview').height(height);            
            $(this).find('.fac-promotion-main-section .fac-promotion-content .fpp-inner').height(height);
            $(this).find('.fac-promotion-main-section .fac-promotion-preview .fpp-inner').height(height);
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
  
        $(".fac-slider.fac-slider-promotion .fac-promotion-slider").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            pause: true,
            speed: 0
        });  

        $(".fac-slider.fac-slider-promotion ul.rslides_tabs").each(function(){
            $(this).wrapAll('<div class="container"></div>');
        });        
        
    });
})(jQuery);


