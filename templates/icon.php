<?php
if (!empty($params) && !empty($params['icon'])) :
    $icon = $params['icon'];
    $color = $params['color'];
    $font_size = $params['font_size'];
    
    
    $styles = array();
    if (!empty($color)) {
        $styles[] = "color: $color"; 
    }                
    if (!empty($font_size)) {
        $styles[] = "font-size: $font_size"; 
    }                
    $styles = implode('; ', $styles);    
?>
    <i class="fa fa-<?php echo $icon?>"<?php echo (!empty($styles)) ? 'style="' . $styles . '"' : '';?>></i>
<?php
endif;
