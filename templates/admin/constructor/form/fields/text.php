<?php 
    $args = $params;
    $label = !empty($args->fields[$args->field]['label']) ? $args->fields[$args->field]['label'] : '';
    $class = !empty($args->fields[$args->field]['class']) ? $args->fields[$args->field]['class'] : ''; 
    $note = !empty($args->fields[$args->field]['note']) ? $args->fields[$args->field]['note'] : '';
    
    $value = esc_attr($args->fields[$args->field]['default']);
?>
<label for="<?php echo "params[{$args->field}]"; ?>"><?php echo $label;?></label>
<input<?php echo !empty($class) ? ' class="'.$class.'"': '';?> type="text" id="<?php echo "params[{$args->field}]"; ?>" name="<?php echo "params[{$args->field}]"; ?>" value="<?php echo $value;?>">                
<?php if (!empty($note)): ?><p class="wp-open-weather-description"><?php echo $note;?></p><?php endif;?>
