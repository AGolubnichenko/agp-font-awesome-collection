<?php
$data = $params['data'];
$id = Rit()->getId();
$newKey = Rit()->getMaxIndex($params['post_id']) + 1;
?>
<script type="text/javascript">
    rit_repeater = {};
    rit_repeater.newKey=<?php echo $newKey; ?>;
</script>
<div class="rit-repeater <?php echo $id?>">
    <table class="widefat striped tbl-admin-open-time" width="100%" cellspacing="0" cellpadding="0" border="0">
        <thead>
            <th>Day</th>
            <th>Date</th>
            <th>Open Time</th>
            <th>Close Time</th>
            <th class="tbl-actions">Actions</th>
        </thead>        
        <tbody>
            <?php 
            echo Rit()->getTemplate('admin/row', array('row' => 0, 'data' => $data, 'visible' => FALSE)); 
            if (!empty($data)):
                foreach ($data as $key => $value) :
                    echo Rit()->getTemplate('admin/row', array('row' => $key, 'data' => $value));
                endforeach;
            endif; 
            echo Rit()->getTemplate('admin/row', array('row' => $newKey));             
            ?>
        </tbody>
    </table>
    <p class="rit-actions">
        <a class="button rit-add-row" href="javascript:void(0);">Add New</a>
    </p>    
</div>

