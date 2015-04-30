<?php

class Fac extends Agp_Module {
    
    /**
     * Settings
     * 
     * @var Fac_Settings
     */
    private $settings;
    
    /**
     * Shortcode Conctructor
     * 
     * @var Fac_Constructor
     */
    private $constructor;
    
    /**
     * Icon Repository
     * 
     * @var Fac_IconRepository
     */
    private $iconRepository;        
    
    
    /**
     * The single instance of the class 
     * 
     * @var object 
     */
    protected static $_instance = null;    
    
	/**
	 * Main Instance
	 *
     * @return object
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
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
    
    public function __construct() {
        parent::__construct(dirname(dirname(__FILE__)));

        $this->iconRepository = new Fac_IconRepository();
        $this->settings = Fac_Settings::instance( $this );
        $this->constructor = Fac_Constructor::instance( $this );
        
        add_action( 'init', array($this, 'init' ), 999 );        
        add_action( 'wp_enqueue_scripts', array($this, 'enqueueScripts' ));                
        add_action( 'admin_enqueue_scripts', array($this, 'enqueueAdminScripts' ));                

        $this->registerShortcodes();        

        add_action( 'init', array($this, 'facTinyMCEButtons' ) );        
    }
    
    public function registerShortcodes() {
        $shortcodes = $this->settings->getSortcodes();

        if(!empty($shortcodes)) {
            foreach ($shortcodes as $key => $obj) {
                add_shortcode( $key, array( $this, 'doShortcode' ) );                     
            }
        }
    }
    
    public function init () {
        $this->iconRepository->refreshRepository();
    }
    
    public function facTinyMCEButtons () {
        if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
           return;
        }

        if ( get_user_option('rich_editing') == 'true' ) {
           add_filter( 'mce_external_plugins', array($this, 'facTinyMCEAddPlugin') );
           add_filter( 'mce_buttons', array($this, 'facTinyMCERegisterButtons'));
        }        
    }

    public function facTinyMCERegisterButtons( $buttons ) {
       array_push( $buttons, "|", "fac_icon" );
       return $buttons;
    }    
    
    public function facTinyMCEAddPlugin( $plugin_array ) {
        $plugin_array['fac_icon'] = $this->getAssetUrl() . '/js/fac-icon.js';
        return $plugin_array;        
    }        
    
    public function enqueueScripts () {
        wp_enqueue_style( 'fac-fa', $this->getBaseUrl() .'/vendor/agpfontawesome/components/css/font-awesome.min.css' );
        wp_enqueue_script( 'fac', $this->getAssetUrl('js/main.js'), array('jquery') );                                                         
        wp_enqueue_style( 'fac-css', $this->getAssetUrl('css/style.css') );  
    }        
    
    public function enqueueAdminScripts () {
        wp_enqueue_style( 'wp-color-picker' );        
        wp_enqueue_script( 'wp-color-picker' );        
        wp_enqueue_script( 'iris', $this->getAssetUrl('libs/iris/iris.min.js'), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );                
        wp_enqueue_script('colorbox-js', $this->getAssetUrl() . '/libs/colorbox/jquery.colorbox-min.js',array('jquery'));
        wp_enqueue_style('colorbox-css', $this->getAssetUrl() . '/libs/colorbox/colorbox.css');        
        wp_enqueue_style( 'fac-fa', $this->getBaseUrl() .'/vendor/agpfontawesome/components/css/font-awesome.min.css' );
        wp_enqueue_script( 'fac', $this->getAssetUrl('js/admin.js'), array('jquery') );                                                         
        wp_enqueue_style( 'fac-css', $this->getAssetUrl('css/admin.css') );  
    }            
    

    public function getIconRepository() {
        return $this->iconRepository;
    }

    public function setIconRepository(Fac_IconRepository $iconRepository) {
        $this->iconRepository = $iconRepository;
        return $this;
    }
    
    public function doShortcode ($atts, $content, $tag) {
        $shortcodes = $this->settings->getSortcodes();
        
        if (!empty($shortcodes[$tag])) {
            $obj = $shortcodes[$tag];
            $default = $this->settings->getShortcodeDefaults($tag);            
            if (empty($atts) || !is_array($atts)) {
                $atts = array();
            }
            $atts = array_merge($default, $atts );        
            
            return $this->getTemplate($obj->template, $atts);                             
        }

    }    
    
    public function getSettings() {
        return $this->settings;
    }
 
    public function getConstructor() {
        return $this->constructor;
    }
}