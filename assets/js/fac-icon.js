(function() {
    
    tinymce.create('tinymce.plugins.fac_icon', {
        init : function(ed, url) {
            ed.addButton('fac_icon', {
               title : 'FontAwesome Icon',
               image : url+'/ico.png',
               onclick : function() {
                    jQuery('.fac-constructor-apply').unbind('click');
                    jQuery('.fac-constructor-apply').bind('click', function(event) {
                        var data = '[todo]';
                        ed.execCommand('mceInsertContent', false, data);
                        jQuery.colorbox.close();
                    });
                    jQuery("#fac-constructor-box").colorbox({inline:true, width:"50%"});  
                    jQuery("#fac-constructor-box").click();
               }
            }); 
        },
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
               longname : "FontAwesome Icon",
               author : 'Alexey Golubnichenko',
               authorurl : 'https://github.com/AGolubnichenko',
               version : "1.0"
            };
        }
    });
    tinymce.PluginManager.add('fac_icon', tinymce.plugins.fac_icon);
})();