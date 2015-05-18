<?php
    $row = isset($params['row']) ? $params['row'] : 0;
    $data = !empty($params['data']) ? $params['data'] : NULL;
    $visible = isset($params['visible']) ? $params['visible'] : TRUE;
    $noaction = isset($params['noaction']) ? $params['noaction'] : FALSE;
    
    $id = Rit()->getId();    
    $days = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
    $meridiems = array('AM', 'PM');
?>
<tr class="rit-row<?php echo empty($row) ? ' rit-row-template' : '';?>"<?php echo (!$visible) ? ' style="display: none;"' : '';?>>
    <td>
        <select class="widefat" id="<?php echo "{$id}_data_{$row}_day";?>" name=<?php echo "{$id}_data[{$row}][day]";?>>
            <option value=""></option>
            <?php foreach ($days as $day) :?>
            <option value="<?php echo $day;?>"<?php selected(!empty($data['day']) && $data['day'] == $day);?>><?php echo $day;?></option>
            <?php endforeach;?>
        </select>
    </td>
    <td>
        <select class="widefat" id="<?php echo "{$id}_data_{$row}_date";?>" name=<?php echo "{$id}_data[{$row}][date]";?>>
            <option value=""></option>
            <?php for ($i = 1; $i <= 31; $i++) :?>
            <option value="<?php echo $i;?>"<?php selected(!empty($data['date']) && $data['date'] == $i);?>><?php echo $i;?></option>
            <?php endfor;?>
        </select>
    </td>
    <td class="time-group">
        <input class="formInput" type="number" min="0" max="11" value="<?php echo !empty($data['opentime']['hour']) ? $data['opentime']['hour'] : '' ;?>" id="<?php echo "{$id}_data_{$row}_opentime_hour";?>" name=<?php echo "{$id}_data[{$row}][opentime][hour]";?> />
        <input class="formInput" type="number" min="0" max="59" value="<?php echo !empty($data['opentime']['min']) ? $data['opentime']['min'] : '' ;?>" id="<?php echo "{$id}_data_{$row}_opentime_min";?>" name=<?php echo "{$id}_data[{$row}][opentime][min]";?> />
        <select class="formInput" id="<?php echo "{$id}_data_{$row}_opentime_meridiem";?>" name=<?php echo "{$id}_data[{$row}][opentime][meridiem]";?>>
            <?php foreach ($meridiems as $meridiem) :?>
            <option value="<?php echo $meridiem;?>"<?php selected(!empty($data['opentime']['meridiem']) && $data['opentime']['meridiem'] == $meridiem);?>><?php echo $meridiem;?></option>
            <?php endforeach;?>
        </select>                    
    </td>
    <td class="time-group">
        <input class="formInput" type="number" min="0" max="11" value="<?php echo !empty($data['closetime']['hour']) ? $data['closetime']['hour'] : '' ;?>" id="<?php echo "{$id}_data_{$row}_closetime_hour";?>" name=<?php echo "{$id}_data[{$row}][closetime][hour]";?> />
        <input class="formInput" type="number" min="0" max="59" value="<?php echo !empty($data['closetime']['min']) ? $data['closetime']['min'] : '' ;?>" id="<?php echo "{$id}_data_{$row}_closetime_min";?>" name=<?php echo "{$id}_data[{$row}][closetime][min]";?> />
        <select class="formInput" id="<?php echo "{$id}_data_{$row}_closetime_meridiem";?>" name=<?php echo "{$id}_data[{$row}][closetime][meridiem]";?>>
            <?php foreach ($meridiems as $meridiem) :?>
            <option value="<?php echo $meridiem;?>"<?php selected(!empty($data['closetime']['meridiem']) && $data['closetime']['meridiem'] == $meridiem);?>><?php echo $meridiem;?></option>
            <?php endforeach;?>
        </select>                      
    </td>
    <td class="tbl-actions"><?php if (empty($noaction)) :?><a class="button rit-del-row" href="javascript:void(0);">Delete</a><?php endif; ?></td>                
</tr>
