<?php 
    $args = $params;
    
    $label = !empty($args->fields[$args->field]['label']) ? $args->fields[$args->field]['label'] : '';
    $class = !empty($args->fields[$args->field]['class']) ? $args->fields[$args->field]['class'] : ''; 
    $note = !empty($args->fields[$args->field]['note']) ? $args->fields[$args->field]['note'] : '';    
    
    $name = "{$args->key}[{$args->field}]";
    $selected = !empty($args->fields[$args->field]['default']) ? $args->fields[$args->field]['default'] : '';
    $categories = Fac()->getIconRepository()->getAllCategories();
?>

    <label for="<?php echo "{$args->key}[{$args->field}]"; ?>"><?php echo $label;?></label>    
    <select style="font-family:FontAwesome, Arial;"<?php echo !empty($class) ? ' class="'.$class.'"': '';?> name="<?php echo $name; ?>" id="<?php echo $name; ?>">
        <option value=""></option>                
        <?php 
            foreach ($categories as $category) : 
        ?>
                <optgroup label="<?php echo $category;?>">            
        <?php
                $icons = Fac()->getIconRepository()->getAllByCategory($category);
                foreach ($icons as $icon) : 
        ?>
            <option style="font-family:FontAwesome, Arial;" data-icon="fa-<?php echo $icon->getId(); ?>" value="<?php echo $icon->getId(); ?>"<?php selected($icon->getId(), $selected); ?>>
                &#x<?php echo $icon->getUnicode(); ?>; <?php echo $icon->getName(); ?>
            </option>            
        <?php 
                endforeach;
        ?>
                </optgroup>
        <?php                
            endforeach; 
        ?>
    </select>
    <?php if (!empty($note)): ?><p class="wp-open-weather-description"><?php echo $note;?></p><?php endif;?>    
