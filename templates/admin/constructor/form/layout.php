<?php 
    $key = 'fac_icon';
    $obj = $params;    
    
    $args = new stdClass();
    $args->key = $key;
    $args->settings =$obj ;
    $config = $obj->getConfig();
    $args->fieldSet = $obj->objectToArray($obj->getConfig()->fieldSet);
    $args->fields = $obj->objectToArray($args->settings->getConfig()->shortcodes->$key->fields);    
?>
<h1>Font Awesome Constructor</h1>
<form method="post" action="">
    <?php echo Fac()->getTemplate('admin/constructor/form/render-page', $args); ?>
    <p>
        <a class="fac-constructor-apply button button-primary" href="javascript:void(0);" >Apply</a>
    </p>
</form>
