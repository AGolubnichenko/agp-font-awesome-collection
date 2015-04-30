<?php 
    $args = $params;
    $label = !empty($args->fields[$args->field]['label']) ? $args->fields[$args->field]['label'] : '';
    $class = !empty($args->fields[$args->field]['class']) ? $args->fields[$args->field]['class'] : ''; 
    $note = !empty($args->fields[$args->field]['note']) ? $args->fields[$args->field]['note'] : '';
    
    $checked = !empty($args->fields[$args->field]['default']);
?>
<label for="<?php echo "{$args->key}[{$args->field}]"; ?>"><?php echo $label;?></label>
<input<?php echo !empty($class) ? ' class="'.$class.'"': '';?> type="checkbox" id="<?php echo "{$args->key}[{$args->field}]"; ?>" name="<?php echo "{$args->key}[{$args->field}]"; ?>" <?php checked( $checked ); ?>>                
<?php if (!empty($note)): ?><p class="wp-open-weather-description"><?php echo $note;?></p><?php endif;?>