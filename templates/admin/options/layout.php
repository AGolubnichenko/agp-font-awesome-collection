<?php 
    $args = new stdClass();
    $args->settings = $params;
    $args->key = isset( $_GET['tab'] ) ? $_GET['tab'] : 'fac-global-settings';
    $args->tabs = $args->settings->getTabs();
    $args->fieldSet = $args->settings->getFieldSet();
    $args->data = $args->settings->getSettings($args->key);
    $args->fields = $args->settings->getFields($args->key);
    $title = !empty($args->settings->getConfig()->admin->options->title) ? $args->settings->getConfig()->admin->options->title : '';
?>
<?php if (!empty($title)) :?>
<div style="width: 100%; padding: 20px 0 0;">
    <table>
        <tr style="vertical-align: middle;">
            <td style="padding: 0 20px 0 0;">
                <img src="<?php echo Fac()->getAssetUrl( 'images/icon-128x128.png' )?>" width="100" height="100" />    
            </td>
            <td>
            <h1><?php echo $title;?></h1>
            How to use this features you can find on the <a href="https://wordpress.org/plugins/agp-font-awesome-collection/" target="_blank">plugin page</a> in the FAQ and Screenshots sections    
            </td>
        </tr>
    </table>
</div>


<?php endif;?>
<div class="wrap">
    <?php 
        screen_icon();
        settings_errors();
        
        echo $args->settings->getParentModule()->getTemplate('admin/options/render-tabs', $args);
    ?>
    <form method="post" action="options.php">
        <?php wp_nonce_field( 'update-options' ); ?>
        <?php settings_fields( $args->key ); ?>
        
        <?php echo $args->settings->getParentModule()->getTemplate('admin/options/render-page', $args); ?>
        
        <p class="submit">
            <input id="submit" class="button button-primary" type="submit" value="Save Changes" name="submit">
            <a class="button button-primary" href="?page=<?php echo $args->settings->getPage();?>&tab=<?php echo $args->key;?>&reset-settings=true" >Reset to Default</a>
        </p>
    </form>
</div>