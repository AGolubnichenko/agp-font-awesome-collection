<?php
return array(
    'template' =>'icontext',
    'displayName' => 'Simpe Icon with text and shape',
    'fields' => array(
        'icon' => array(
            'label' => 'Icon',            
            'type' => 'fa-select',                        
            'default' => '',
            'class' => 'widefat fac-element',
            'note' => 'Select icon from dropdown list',
        ),
        'text' => array(
            'label' => 'Text',            
            'type' => 'text',                        
            'default' => '',            
            'class' => 'widefat fac-element',
            'note' => 'Allows to set text value that displays at the right side of the icon',
        ),
        'shape_type' => array(
            'type' => 'select',
            'label' => 'Shape Type',
            'fieldSet' => 'shape_type',
            'default' => 'rounded',
            'class' => 'widefat regular-select fac-element',            
            'note' => 'Preset shape type ( square / rounded / round )',
        ),
        'shape_bg' =>  array(
            'label' => 'Shape background color',            
            'type' => 'colorpicker',                        
            'default' => '',
            'class' => 'fac-element',
            'note' => 'Allows to set shape background color with HEX color value',
        ),
        'icon_color' =>  array(
            'label' => 'Icon Color',            
            'type' => 'colorpicker',                        
            'default' => '',       
            'class' => 'fac-element',
            'note' => 'Allows to set icon color with HEX color value',
        ),
        'text_color' =>  array(
            'label' => 'Text Color',            
            'type' => 'colorpicker',                        
            'default' => '',         
            'class' => 'fac-element',
            'note' => 'Allows to set text color with HEX color value',
        ),
    ),
);
