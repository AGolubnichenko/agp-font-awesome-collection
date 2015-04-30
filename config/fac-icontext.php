<?php
return array(
    'template' =>'icontext',
    'displayName' => 'Simpe Icon with text and shape',
    'fields' => array(
        'icon' => array(
            'label' => 'Icon',            
            'type' => 'fa-select',                        
            'default' => '',
            'class' => 'widefat',
        ),
        'text' => array(
            'label' => 'Text',            
            'type' => 'text',                        
            'default' => '',            
            'class' => 'widefat',
        ),
        'shape_type' => array(
            'type' => 'select',
            'label' => 'Shape Type',
            'fieldSet' => 'shape_type',
            'default' => '',
            'class' => 'widefat regular-select',            
        ),
        'shape_bg' =>  array(
            'label' => 'Shape background color',            
            'type' => 'colorpicker',                        
            'default' => '',
        ),
        'icon_color' =>  array(
            'label' => 'Icon Color',            
            'type' => 'colorpicker',                        
            'default' => '',            
        ),
        'text_color' =>  array(
            'label' => 'Text Color',            
            'type' => 'colorpicker',                        
            'default' => '',                        
        ),
    ),
);
