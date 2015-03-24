(function() {
    
    tinymce.create('tinymce.plugins.fac_icon', {
        init : function(ed, url) {
            ed.addButton('fac_icon', {
               title : 'FontAwesome Icon',
               image : url+'/ico.png',
               onclick : function() {
                  var icon = prompt("Icon Name", "");
                  if (icon != null && icon != ''){
                    ed.execCommand('mceInsertContent', false, '[fac_icon icon="'+icon+'"]');
                  }
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