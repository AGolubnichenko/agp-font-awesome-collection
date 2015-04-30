<?php
return array(
    'template' =>'button',
    'displayName' => 'Icon Button',
    'fields' => array(
        'icon' => array(
            'label' => 'Icon',            
            'type' => 'fa-select',                        
            'default' => '',
            'class' => 'widefat',
        ),
        'name' => array(
            'label' => 'Unique Name',            
            'type' => 'text',                        
            'default' => 'fac-button-id',            
            'class' => 'widefat',
        ),        
        'title' => array(
            'label' => 'Title',            
            'type' => 'text',                        
            'default' => '',            
            'class' => 'widefat',
        ),         
        'text' => array(
            'label' => 'Text',            
            'type' => 'text',                        
            'default' => '',            
            'class' => 'widefat',
        ),
        'link' => array(
            'label' => 'Link URL',            
            'type' => 'text',                        
            'default' => '',            
            'class' => 'widefat',
        ),           
        'color' =>  array(
            'label' => 'Text and Icon Color',            
            'type' => 'colorpicker',                        
            'default' => '',
        ),        
        'background' => array(
            'label' => 'Button Background Color',            
            'type' => 'colorpicker',                        
            'default' => '',
        ),        
        'border_width' => array(
            'label' => 'Border Width',            
            'type' => 'text',                        
            'default' => '',            
            'class' => 'widefat',
        ),        
        'border_color' => array(
            'label' => 'Border Color',            
            'type' => 'colorpicker',                        
            'default' => '',
        ),        
        'border_radius' => array(
            'label' => 'Border Radius',            
            'type' => 'text',                        
            'default' => '',            
            'class' => 'widefat',
        ),        
    ),
);
