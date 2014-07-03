(function() {
    tinymce.create('tinymce.plugins.question', {
        init : function(ed, url) {
            ed.addButton('question', {
                title : 'Add a Question',
                image : url+'/custom_editor_images/question.png',
                onclick : function() {
                     ed.selection.setContent('[question]' + ed.selection.getContent() + '[/question]');
 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('question', tinymce.plugins.question);
    
    
    tinymce.create('tinymce.plugins.full_answer', {
        init : function(ed, url) {
            ed.addButton('full_answer', {
                title : 'Add the Full Answer',
                image : url+'/custom_editor_images/full_answer.png',
                onclick : function() {
                     ed.selection.setContent('[full_answer]' + ed.selection.getContent() + '[/full_answer]');
 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('full_answer', tinymce.plugins.full_answer);
    
    tinymce.create('tinymce.plugins.short_answer', {
        init : function(ed, url) {
            ed.addButton('short_answer', {
                title : 'Add a Short Answer',
                image : url+'/custom_editor_images/short_answer.png',
                onclick : function() {
                     ed.selection.setContent('[short_answer]' + ed.selection.getContent() + '[/short_answer]');
 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('short_answer', tinymce.plugins.short_answer);
})();