<?php
    $id = !empty($params['id']) ? $params['id'] : '';
    $headline = !empty($params['headline']) ? $params['headline'] : '';
    $description = !empty($params['description']) ? $params['description'] : '';
    $icon = !empty($params['icon']) ? $params['icon'] : '';
    $link = !empty($params['link']) ? $params['link'] : '';    
?>
<div id="<?php echo $id;?>" class="fac-promotion-main-section">
    <?php if (!empty($link)) : ?>
    <a href="<?php echo $link; ?>" title="<?php echo $headline; ?>" target="_blank">
    <?php endif;?>
    
    <?php if (!empty($icon) || !empty($headline)): ?>
    <div class="fac-promotion-preview">
        <?php if (!empty($icon)): ?>
            <i class="fa fa-<?php echo $icon; ?>"></i>
        <?php endif; ?>    

        <?php if (!empty($headline)): ?>
            <h2><?php echo $headline; ?></h2>
        <?php endif; ?>        
    </div>
    <?php endif;?>
    
    <?php if (!empty($description)): ?>
    <div class="fac-promotion-content" style="display: none;">    
        <?php if (!empty($headline)): ?>
            <h2><?php echo $headline; ?></h2>
        <?php endif; ?>        
            
        <p><?php echo $description; ?></p>
    </div>            
    <?php endif; ?>                
    
    <?php if (!empty($link)) : ?>
    </a>
    <?php endif;?>
</div>       

