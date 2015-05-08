(function($) {  
    $(document).ready(function() { 

        $('.fac-promotion-main-section').each(function() {
            var content = $(this).find('.fac-promotion-content');
            var preview = $(this).find('.fac-promotion-preview');
            
            if ($(content).height() > $(preview).height() ) {
                $(preview).height($(content).height());
            } else {
                $(content).height($(preview).height());
            }
        });

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

    });
})(jQuery);


