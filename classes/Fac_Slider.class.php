<?php

class Fac_Slider extends Agp_RepeaterAbstract {
    
    /**
     * The single instance of the class 
     * 
     * @var Fac_Slider 
     */
    protected static $_instance = null;    

	/**
	 * Main Instance
	 *
     * @return object
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self(dirname(dirname(__FILE__)));
            self::$_instance->init('fac_sliders', 'Slider Content', 'fac-sliders', 'normal');
            self::$_instance->setHeaderTemplateAdminName('admin/slider/header');
            self::$_instance->setLayoutTemplateAdminName('admin/slider/layout');
            self::$_instance->setRowTemplateAdminName('admin/slider/row');
		}
		return self::$_instance;
	}    
    
	/**
	 * Cloning is forbidden.
	 */
	public function __clone() {
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 */
	public function __wakeup() {
    }        
    
    public function __construct($baseDir) {
        parent::__construct($baseDir);
        
        add_action( 'add_meta_boxes', array( $this, 'addSliderMetaboxes' ) );        
        add_action( 'save_post', array( $this, 'saveSliderMetaboxes' ), 1, 2);        
    }
    
    public function addSliderMetaboxes() {
        add_meta_box('fac_shortcodes_name', 'Shortcode Name', array( $this, 'viewSliderMetabox' ), 'fac-sliders', 'normal', 'default');        
    }    
    
    public function saveSliderMetaboxes( $post_id, $post ) {
        if ( empty( $_POST['fac_shortcodes_noncename'] ) 
            || !wp_verify_nonce( $_POST['fac_shortcodes_noncename'],  basename(Fac()->getBaseDir()) )
            || !current_user_can( 'edit_post', $post->ID ) ) {
            return $post->ID;
        }

        $shortcodes_meta['_name'] = $_POST['_name'];

        foreach ($shortcodes_meta as $key => $value) {
            if( $post->post_type == 'revision' ) return;
            
            $value = implode(',', (array) $value);            
            if ( !$value ) {
                delete_post_meta($post->ID, $key); 
            } else {
                update_post_meta($post->ID, $key, $value);
            }
        }    
    }  
    
    public function viewSliderMetabox( $post ) {
        global $post;
        echo '<input type="hidden" name="fac_shortcodes_noncename" id="fac_shortcodes_noncename" value="' . wp_create_nonce( basename(Fac()->getBaseDir()) ) . '" />';
        $name = get_post_meta($post->ID, '_name', true);
        if (empty($name)) {
            $name='fac_slider_' . $post->ID;
        }
        echo '<input type="text" name="_name" value="' . $name  . '" class="widefat" />';
    }    
    
}
