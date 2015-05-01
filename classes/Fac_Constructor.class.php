<?php

class Fac_Constructor {
    
    /**
     * The single instance of the class 
     * 
     * @var object 
     */
    protected static $_instance = null;    

    /**
     * Parent Module
     * 
     * @var Agp_Module
     */
    protected static $_parentModule;
    
	/**
	 * Main Instance
	 *
     * @return object
	 */
	public static function instance($parentModule = NULL) {
		if ( is_null( self::$_instance ) ) {
            self::$_parentModule = $parentModule;            
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
    
    /**
     * Constructor 
     * 
     * @param Agp_Module $parentModule
     */
    public function __construct() {
        add_action( 'admin_footer', array( $this, 'createForm' ) );       
        //  add_action( 'admin_footer-post.php', array( $this, 'createForm' ) );               
        //
    }
    
    public static function getParentModule() {
       
        return self::$_parentModule;
    }
    
    public function createForm() {
        echo $this->getParentModule()->getTemplate('admin/constructor/constructor');
    }
    
}

