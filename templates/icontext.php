<?php
if (!empty($params) && !empty($params['icon'])) :
    
    $icon = $params['icon'];
    $text = $params['text'];
    
    $shape_type = !empty($params['shape_type']) && in_array($params['shape_type'], array('square','rounded','round')) ? $params['shape_type'] : '';
    $shape_bg = !empty($params['shape_bg']) ? $params['shape_bg'] : '';
    $icon_color = !empty($params['icon_color']) ? $params['icon_color'] : '';    
    $text_color = !empty($params['text_color']) ? $params['text_color'] : '';    
    
    $shape_styles = array();
    if (!empty($icon_color)) {
        $shape_styles[] = "color: $icon_color"; 
    }                
    if (!empty($shape_bg)) {
        $shape_styles[] = "background: $shape_bg"; 
    }                
    $shape_styles = implode('; ', $shape_styles);        
    
    
    $text_styles = array();
    if (!empty($text_color)) {
        $text_styles[] = "color: $text_color"; 
    }                
    $text_styles = implode('; ', $text_styles);            
?>
    <div class="fac fac-icontext-template">
        <span<?php echo !empty($shape_type) ? ' class="fac-shape fac-' . $shape_type . '"' : '';?><?php echo (!empty($shape_styles)) ? 'style="' . $shape_styles . '"' : '';?>>
            <i class="fa fa-<?php echo $icon?>"></i>
        </span>
        <?php echo (!empty($text)) ? '<span class="fac-text"' . (!empty($text_styles) ? 'style="' . $text_styles . '"' : '') .'>' . $text . '</span>' : '';?>
    </div>
<?php
endif;
