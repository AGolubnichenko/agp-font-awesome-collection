<?php
    $settings = Fac()->getSettings();
?>
<div class="fac-constructor" style='display:none'>
    <a class='inline' id="fac-constructor-box" href="#inline_content">Options</a>
    <div style='display:none'>
        <div id='inline_content' style='padding:10px; background:#fff;'>
            <?php            
                echo Fac()->getTemplate('admin/constructor/form/layout', $settings);
            ?>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery("#fac-constructor-box").colorbox({inline:true, width:"50%"});
        });
    </script>    
</div>
