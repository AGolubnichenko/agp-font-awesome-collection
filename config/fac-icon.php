<?php
return array(
    'template' =>'icon',
    'displayName' => 'Simpe Icon',
    'fields' => array(
        'icon' => array(
            'label' => 'Icon',            
            'type' => 'fa-select',                        
            'default' => '',
            'class' => 'widefat fac-element',
            'note' => 'Select icon from dropdown list',
        ),
        'color' => array(
            'label' => 'Color',            
            'type' => 'colorpicker',                        
            'default' => '',
            'class' => 'fac-element',
            'note' => 'Allow to set icon color with HEX color value',
        ), 
        'font_size' => array(
            'label' => 'Font Size',            
            'type' => 'text',                        
            'default' => '',            
            'class' => 'widefat fac-element',
            'note' => 'Allow to set icon size, positive digital value with "px"',
        ), 
    ),
);
