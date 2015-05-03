<?php
return array(
    'admin' => array(
        'menu' => include (__DIR__ . '/admin-menu.php'),
    ),    
    'fieldSet' => include (__DIR__ . '/fac-fieldset.php'),            
    'shortcodes' => array(
        'groups' => array(
            'basic' => array(
                'displayName' => 'Basic',
            ),
            'custom' => array(
                'displayName' => 'Custom',
            ),            
        ),
        'elements' => array(
            'fac_icon' => include (__DIR__ . '/fac-icon.php'),  
            'fac_icontext' => include (__DIR__ . '/fac-icontext.php'),
            'fac_dropdown' => include (__DIR__ . '/fac-dropdown.php'),
            'fac_button' => include (__DIR__ . '/fac-button.php'),
            'fac_version' => include (__DIR__ . '/fac-version.php'),            
        ),
    ),
);


