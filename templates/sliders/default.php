<?php

$data = !empty($params['data']) ? $params['data'] : NULL;
$post_id = !empty($params['post_id']) ? $params['post_id'] : NULL;

if (!empty($data)) :
?>
<div class="fac-slider fac-slider-default">
    <div class="container">
        <ul>
            <?php foreach ($data as $item): ?>
            <li>
                <?php Fac::debug($item); ?>
            </li>
            <?php endforeach;?>
        </ul>
    </div>    
</div>
<?php
endif;

