(function($) {  
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
            $(inner).width($(inner).parent().width());
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


