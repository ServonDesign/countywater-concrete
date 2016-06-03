<?php
    defined('C5_EXECUTE') or die("Access Denied.");
?>

<ul class="nav nav-tabs js-nav-tabs">
    <li class="active"><a href="#form">Form</a></li>
    <!-- <li><a href="#template">Template</a></li> -->
</ul>

<div class="tab-content js-tab-panes">
    <div class="tab-pane active" id="form">
        <?php $this->inc('form.php'); ?>
    </div>
    <!-- <div class="tab-pane active" id="template">
        <?php //$this->inc('template.php'); ?>
    </div> -->
</div>

<script>
    (function(global){
        "use strict";

        var nav,
            tabPanes;

        function init(){
            nav = $('.js-nav-tabs');
            tabPanes = $('.js-tab-panes');

            nav.on('click', 'a', handleNavChange);
            nav.find('.active a').trigger('click');
        }

        function handleNavChange(e){
            e.preventDefault();

            nav.children().removeClass('active');
            tabPanes.children().removeClass('active');

            $(this).parent().addClass('active');

            var id = $(this).prop('href').split('#');
            console.log(id, '#'+id[1]);
            tabPanes.find('#'+id[1]).addClass('active');
        }

        global.tabInit = init;
    })(window);

    tabInit();
</script>