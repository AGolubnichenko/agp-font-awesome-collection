<?php
if (!empty($params)):
    $name = !empty($params['name']) ? $params['name'] : '';
    $title = !empty($params['title']) ? $params['title'] : '';
    $icon = !empty($params['icon']) ? $params['icon'] : '';
    $link = !empty($params['link']) ? $params['link'] : '';    
    $text = !empty($params['text']) ? $params['text'] : '';    
    $background = !empty($params['background']) ? $params['background'] : '';
    $border_radius = isset($params['border_radius']) ? $params['border_radius'] : '';
    $border_width = !empty($params['border_width']) ? $params['border_width'] : '';
    $border_color = !empty($params['border_color']) ? $params['border_color'] : '';
    $color = !empty($params['color']) ? $params['color'] : '';
    
    $styles = array();
    if (!empty($background)) {
        $styles[] = "background: $background"; 
    }
    if (isset($border_radius)) {
        $styles[] = "border-radius: $border_radius"; 
    }    
    if (!empty($border_width)) {
        $styles[] = "border-width: $border_width"; 
    }        
    if (!empty($border_color)) {
        $styles[] = "border-color: $border_color"; 
    }            
    if (!empty($color)) {
        $styles[] = "color: $color"; 
    }                
    $styles = implode('; ', $styles);
?>
<div class="fac fac-button-template">
    <a href="<?php echo (!empty($link)) ? $link : '#';?>" 
       class="fac-button<?php echo (!empty($text)) ? ' fac-text' : '';?>" 
       <?php echo (!empty($name)) ? ' id="' . $name . '"'  : '';?>       
       title="<?php echo $title;?>"
       <?php echo (!empty($styles)) ? 'style="' . $styles . '"' : '';?>>
            <i class="fa fa-<?php echo $icon;?>"></i>
            <?php echo (!empty($text)) ? '<span>' . $text . '</span>' : '';?>
    </a>    
</div>
<?php
endif;
