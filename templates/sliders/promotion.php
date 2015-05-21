<?php

$data = !empty($params['data']) ? $params['data'] : NULL;
$post_id = !empty($params['post_id']) ? $params['post_id'] : NULL;

if (!empty($data)) :
?>
<div class="fac-slider fac-slider-promotion">
    <div class="container">
        <div class="fac-promotion-slider">
            <?php foreach ($data as $item): ?>
                <?php 
                    echo Fac()->getTemplate('sliders/promotion-slide', $item); 
                ?>
            <?php endforeach;?>
        </div>
    </div>    
</div>
<?php
endif;

