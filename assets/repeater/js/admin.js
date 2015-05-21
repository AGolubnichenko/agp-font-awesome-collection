var agp_repeater = {};

(function($) {  
    $(document).ready(function() { 
        $('.fac-slider-text-color').each(function() {
            var row = $(this).data('row');
            if (row != '_0_') {
                $(this).wpColorPicker();             
            }
        }); 
        
        $('.fac-slider-background-color').each(function() {
            var row = $(this).data('row');
            if (row != '_0_') {
                $(this).wpColorPicker();             
            }
        });         
        
        $('.agp-del-row').click(function(e) {
           $(this).closest('.agp-row').remove();
        });
        
        $('.agp-add-row').click(function(e) {
            
            var id = 'rp_' + $(this).closest('.agp-repeater').data('id');
            var content = $(this).closest('.agp-repeater').find('.agp-row.agp-row-template').html();

            agp_repeater[id].index = agp_repeater[id].index + 1;

            content = '<tr class="agp-row">' + content.replace(/\[0\]/g, '[' + agp_repeater[id].index + ']').replace(/_0_/g, '_' + agp_repeater[id].index + '_') + '</tr>';

            $(this).closest('.agp-repeater').find('tbody').append(content);

            $('.agp-del-row').unbind('click');
            $('.agp-del-row').click(function(e) {
                $(this).closest('.agp-row').remove();
            });
            
            $('.fac-slider-text-color').each(function() {
                var row = $(this).data('row');
                if (row != '_0_') {
                    $(this).wpColorPicker();             
                }
            }); 
            
            $('.fac-slider-background-color').each(function() {
                var row = $(this).data('row');
                if (row != '_0_') {
                    $(this).wpColorPicker();             
                }
            });             
        });
        
    });
})(jQuery);
