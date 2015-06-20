<?php
if (!empty($params) && !empty($params['shortcode'])) :
    $text_align = $params['text_align'];
    $shortcode = $params['shortcode'];
    
    $styles = array();
    if (!empty($text_align)) {
        $styles[] = "text-align: $text_align"; 
    }                
    $styles = 'display: block; width: 100%; ' . implode('; ', $styles);    
?>
    <span <?php echo (!empty($styles)) ? 'style="' . $styles . ';"' : '';?>>
        <?php echo do_shortcode("[$shortcode]"); ?>
    </span>
<?php
endif;
