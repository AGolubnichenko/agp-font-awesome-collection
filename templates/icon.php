<?php
if (!empty($params) && !empty($params['icon'])) :
    $icon = $params['icon'];
?>
    <i class="fa fa-<?php echo $icon?>"></i>
<?php
endif;
