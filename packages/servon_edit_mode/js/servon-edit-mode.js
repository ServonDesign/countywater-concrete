(function(global){
    "use strict";

    var ignoreClasses = [], //"square-default-padding", "square-thin-padding"];
    	Concrete;

    function init(){
    	Concrete = global.Concrete;
        Concrete.event.watch('EditModeBlockDragStop EditModeUpdateBlockComplete EditModeAddBlockComplete', blockEvent);
        Concrete.event.watch('EditModeBlockAddInline', inlineEvent);
        var blocks = $('[data-block-id]');

        if(blocks.length){
            blocks.each(function(i, e){
                var blockContent = $(e).children(':not([class*=ccm])');
                if(blockContent.length){
                    var classes = blockContent.prop('class').replace(new RegExp(ignoreClasses.join('|'), "gi"), "");
                    $(e).parent().addClass(classes);
                }
            });
        }
    }

    function updateBlockClasses(id){
        setTimeout(function(){
            var block = $('[data-block-id='+id+']');
            if(block.length){
                var classes = block.children(':not([class*=ccm])').prop('class').replace(new RegExp(ignoreClasses.join('|'), "gi"), "");
                block.parent().addClass(classes);
            }
        }, 1);
    }

    function blockEvent(event, object){
        if(!object){
            return;
        }
        updateBlockClasses(object.block.id);
    }

    function inlineEvent(event, object){
        var target = "#a"+object.area.id+'-bt'+object.btID;
        setTimeout(function(){
            var block = $(target);
            if(block.length){
                var classes = block.find('form > div > div').prop('class').replace(new RegExp(ignoreClasses.join('|'), "gi"), "");
                if(classes.trim() === "redactor-box"){
                    classes += " c5-inline-edit";
                }
                block.addClass(classes);
            }
        }, 750);
    }

    $(document).ready(init);
})(window);
