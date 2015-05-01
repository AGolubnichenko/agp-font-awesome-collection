<?php

class Fac_Settings extends Agp_SettingsAbstract {
    
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
        $config = include ($this->getParentModule()->getBaseDir() . '/config/config.php');        
        
        parent::__construct($config);
    }
    
    public static function getParentModule() {
       
        return self::$_parentModule;
    }
    
    public function getSortcodes() {
        $result = array();

        $shortcodes = $this->objectToArray($this->getConfig()->shortcodes);
        if(!empty($shortcodes)) {
            foreach ($shortcodes as $key => $value) {
               $result[$key] = $this->arrayToObject($value);
            }
            return $result;
        }
    }
    
    public function getShortcodeDefaults($name) {
        $result = array();

        $shortcodes = $this->objectToArray($this->getConfig()->shortcodes);
        if (!empty($shortcodes[$name]['fields'])) {
            foreach( $shortcodes[$name]['fields'] as $key => $item ) {
                if ($item['type'] != 'hidden') {
                    $result[$key] = !empty($item['default']) ? $item['default'] : NULL;
                }
            }
        }

        return $result;
    }
    
    public function getElementList () {
        $result = array();
        $shortcodes = $this->objectToArray($this->getConfig()->shortcodes);
        if (!empty($shortcodes)) {
            foreach( $shortcodes as $key => $item ) {
                if (empty($item['developerOnly'])) {
                    $result[$key] = $item['displayName'];
                }
            }
        }
        return $result;
    }
    
    /**
     * Convert an array into a stdClass()
     * 
     * @param   array   $array  The array we want to convert
     * 
     * @return  object
     */
    public function arrayToObject($array) {
        
        // First we convert the array to a json string
        $json = json_encode($array);

        // The we convert the json string to a stdClass()
        $object = json_decode($json);

        return $object;
    }


    /**
     * Convert a object to an array
     * 
     * @param   object  $object The object we want to convert
     * 
     * @return  array
     */
    public function objectToArray($object) {
        
        // First we convert the object into a json string
        $json = json_encode($object);

        // Then we convert the json string to an array
        $array = json_decode($json, true);

        return $array;
    }       
}

