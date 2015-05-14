<?php
/**
 * Plugin Name: AGP Font Awesome Collection
 * Plugin URI: https://wordpress.org/plugins/agp-font-awesome-collection/
 * Description: Latest Font Awesome icons with HTML and shortcodes usage, dynamic visualizer for TinyMCE editor, promotion widget and other features in the one plugin
 * Version: 2.1.0
 * Author: Alexey Golubnichenko
 * Author URI: https://profiles.wordpress.org/agolubnichenko/
 * License: GPL2
 * 
 * @package Fac
 * @category Core
 * @author Alexey Golubnichenko
 */
/*  Copyright 2015  Alexey Golubnichenko  (email : profosbox@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'fac_output_buffer');
function fac_output_buffer() {
    ob_start();
}

if (file_exists(dirname(__FILE__) . '/agp-core/agp-core.php' )) {
    include_once (dirname(__FILE__) . '/agp-core/agp-core.php' );
} 

if (!class_exists('Agp_Autoloader')) {
    global $pagenow;
    if ( !empty($pagenow) && 'plugins.php' === $pagenow ) {
        add_action( 'admin_notices', 'fac_check_admin_notices', 0 );
    }

    function fac_check_admin_notices() {
        if (!class_exists('Agp_Autoloader')) {
            unset( $_GET['activate'] );
            $name = get_file_data( __FILE__, array ( 'Plugin Name' ), 'plugin' );
            printf(
                '<div class="error">
                    <p><i><a target="_blank" href="https://github.com/AGolubnichenko/agp-core" title="AGP Plugins Core">AGP Plugins Core</a></i> not installed</p>
                    <p><i>%1$s</i> has been deactivated.</p>
                </div>',
                $name[0]
            );
            deactivate_plugins( plugin_basename( __FILE__ ) );                
        }
    }    
}

add_action( 'plugins_loaded', 'fac_activate_plugin' );
function fac_activate_plugin() {
    if (class_exists('Agp_Autoloader') && !function_exists('Fac')) {
        $autoloader = Agp_Autoloader::instance();
        $autoloader->setClassMap(array(
            __DIR__ => array('classes', 'agp-core'),
        ));

        function Fac() {
            return Fac::instance();
        }    

        Fac();                
    }
}

fac_activate_plugin();
