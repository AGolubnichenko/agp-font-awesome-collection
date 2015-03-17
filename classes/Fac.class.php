<?php

class Fac extends Agp_Module {
    
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
        
        add_action( 'init', array($this, 'init' ), 999 );        
        add_action( 'wp_enqueue_scripts', array($this, 'enqueueScripts' ));                
        add_action( 'admin_enqueue_scripts', array($this, 'enqueueScripts' ));                

        add_shortcode( 'fac_version', array($this, 'doVersionShortcode') );         
        add_shortcode( 'fac_icon', array($this, 'doIconShortcode') );                 
        add_shortcode( 'fac_dropdown', array($this, 'doDropdownShortcode') );                 
        add_shortcode( 'fac_button', array($this, 'doButtonShortcode') );                         
    }
    
    public function init () {
        $this->iconRepository->refreshRepository();
    }
    
    public function enqueueScripts () {
        wp_enqueue_style( 'fac-fa', $this->getBaseUrl() .'/vendor/agpfontawesome/components/css/font-awesome.min.css' );
        wp_enqueue_script( 'fac', $this->getAssetUrl('js/main.js'), array('jquery') );                                                         
        wp_enqueue_style( 'fac-css', $this->getAssetUrl('css/style.css') );  
    }        

    public function getIconRepository() {
        return $this->iconRepository;
    }

    public function setIconRepository(Fac_IconRepository $iconRepository) {
        $this->iconRepository = $iconRepository;
        return $this;
    }
    
    public function doShortcode ($atts) {
        $default = array(
            'template' => 'default',
        );
        
        if (empty($atts) || !is_array($atts)) {
            $atts = array();
        }

        $atts = array_merge($default, $atts );        

        return $this->getTemplate($atts['template'], $atts);                    
    }    
    
    public function doVersionShortcode ($atts) {
        $atts = shortcode_atts( array(
            'template' => 'version',
        ), $atts );        
        return $this->doShortcode($atts);
    }
    
    public function doIconShortcode ($atts) {
        $atts = shortcode_atts( array(
            'icon' => '',
            'template' => 'icon',
        ), $atts );        
        return $this->doShortcode($atts);
    }    

    public function doDropdownShortcode ($atts) {
        $uniqueId = 'fac-dropdown-' . uniqid();
        $atts = shortcode_atts( array(
            'name' => $uniqueId,
            'icon' => '',
            'template' => 'dropdown',
        ), $atts );        
        return $this->doShortcode($atts);
    }    
    
    public function doButtonShortcode ($atts) {
        $uniqueId = 'fac-button-' . uniqid();
        $atts = shortcode_atts( array(
            'name' => $uniqueId,
            'title' => '',
            'icon' => '',
            'template' => 'button',
        ), $atts );        
        return $this->doShortcode($atts);
    }    
    
}