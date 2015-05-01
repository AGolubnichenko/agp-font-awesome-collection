<?php
    $args = $params;
    $elementList =  Fac()->getSettings()->getElementList();
?>
<div class="fac-constructor-type">
    <h2>Elements</h2>
    <select class="fac-constructor-type-select widefat">
        <option value="0"></option>
        <?php 
            foreach( $elementList as $k => $v ):
                $selected = $args->key == $k || empty($args->key) && empty($k);
        ?>
                <option value="<?php echo $k;?>"<?php selected( $selected );?>><?php echo $v;?></option>
        <?php 
            endforeach; 
        ?>
    </select>    
</div>
