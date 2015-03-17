<?php
if (!empty($params)):
    $name = !empty($params['name']) ? $params['name'] : '';
    $title = !empty($params['title']) ? $params['title'] : '';
    $icon = !empty($params['icon']) ? $params['icon'] : '';
?>
<div class="fac fac-button-template">
    <a href="#" class="fac-button" id="<?php echo $name;?>" title="<?php echo $title;?>" ><i class="fa fa-<?php echo $icon;?>"></i></a>    
</div>
<?php
endif;
