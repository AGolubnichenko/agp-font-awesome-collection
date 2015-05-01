<?php
    $args = $params;
?>
<div class="fac-constructor-params">
    <form id="fac-constructor-params" method="post" action="">
        <input name="key" type="hidden" value="<?php echo $args->key;?>">
        <?php if (!empty($args->fields)) : ?>    
            <h2>Parameters</h2>
            <?php echo Fac()->getTemplate('admin/constructor/form/render-page', $args); ?>
        <?php endif; ?>        
    </form>    
</div>


