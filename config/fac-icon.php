<?php
return array(
    'template' =>'icon',
    'displayName' => 'Simpe Icon',
    'fields' => array(
        'icon' => array(
            'label' => 'Icon',            
            'type' => 'fa-select',                        
            'default' => '',
            'class' => 'widefat',
            'note' => 'Select icon from dropdown list.', //TODO            
        ),
        'color' => array(
            'label' => 'Color',            
            'type' => 'colorpicker',                        
            'default' => '',
        ), 
        'font_size' => array(
            'label' => 'Font Size',            
            'type' => 'text',                        
            'default' => '',            
            'class' => 'widefat',
        ), 
    ),
);
