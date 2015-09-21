<?php
namespace Agp\FontAwesomeCollection\Core;

class Agp_Autoloader {

    private $baseDir;
    
    /**
     * Class map
     * 
     * @var array 
     */
    private $classMap = array(
        __DIR__ => array(''),
    );
    
    private $classes;
    
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
    
    /**
     * Constructor
     */
    public function __construct() {
        spl_autoload_register(array( $this, 'autoload' ));
    }
    
    /**
     * Class autoload
     * 
     * @param string $class
     */
    private function autoload($class) {
        if (!class_exists($class) && !empty($this->classMap)) {

            if (array_key_exists('classmap', $this->classMap)) {
                $filename = $this->classMap['classmap'];
                if (empty($this->classes) && file_exists($filename) && is_file($filename)) {
                    $fp = fopen($filename, 'r');
                    $data = fread($fp, filesize($filename));
                    fclose($fp);                                        
                    $this->classes = json_decode($data, TRUE);
                }
            }
            
            if (!empty($this->classes)) {
                
                if ( array_key_exists($class, $this->classes) ) {
                    $file = $this->baseDir . $this->classes[$class];
                    if ( file_exists($file) && is_file($file) ) {
                        require_once $file;
                        return;    
                    }                    
                }
                
            } else {
                
                if (array_key_exists('namespaces', $this->classMap)) {
                    $parts = explode('\\', $class);
                    $className = array_pop($parts);

                    if (!empty($parts)) {
                        $namespace = implode('\\', $parts);
                        if (!empty($this->classMap['namespaces'][$namespace])) {
                            foreach ($this->classMap['namespaces'][$namespace] as $path => $value) {
                                $maps = array();
                                if (is_array($value)) {
                                    $maps = $value;
                                } else {
                                    $maps[] = $value;
                                }

                                foreach ($maps as $map) {
                                    if (!is_array($map)) {
                                        $file = $path . '/' . $map .'/' . $className . '.class.php';
                                        $file = str_replace('//', '/', $file);
                                        $files = $this->rglob($file) ;
                                        if (!empty($files) && is_array($files) && file_exists($files[0]) && is_file($files[0])) {
                                            require_once $files[0];
                                            return;
                                        }                                                            
                                    }
                                }
                            }
                        }
                    }
                }
                
                foreach ($this->classMap as $path => $value) {
                    $maps = array();
                    if (is_array($value)) {
                        $maps = $value;
                    } else {
                        $maps[] = $value;
                    }

                    foreach ($maps as $map) {
                        if (!is_array($map)) {
                            $file = $path . '/' . $map .'/' . $class . '.class.php';
                            $file = str_replace('//', '/', $file);
                            $files = $this->rglob($file) ;
                            if (!empty($files) && is_array($files) && file_exists($files[0]) && is_file($files[0])) {
                                require_once $files[0];
                                return;
                            }                                    
                        }
                    }
                }        
            }
        }
    }
    
    /**
     * Recursive file search
     * 
     * @param string $pattern
     * @param int $flags
     * @return array
     */
    private function rglob($pattern, $flags = 0) {
        $files = glob($pattern, $flags); 
        $glob_files = glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT);
        if ($files === FALSE) {
            $files = array();
        }
        if ($glob_files === FALSE) {
            $glob_files = array();
        }        

        foreach ($glob_files as $dir) {
            $files = array_merge($files, $this->rglob($dir.'/'.basename($pattern), $flags));
        }
        return $files;
    }      

    public function getClassMap() {
        return $this->classMap;
    }

    public function setClassMap($classMap) {
        if (is_array($classMap)) {
            $this->classMap = array_merge_recursive($this->classMap, $classMap);
        }
        
        return $this;
    }
    
    public function getBaseDir() {
        return $this->baseDir;
    }

    public function getClasses() {
        return $this->classes;
    }

    public function setBaseDir($baseDir) {
        $this->baseDir = $baseDir;
        return $this;
    }

    public function setClasses($classes) {
        $this->classes = $classes;
        return $this;
    }
    
    public function generateClassMap($baseDir) {
        $result = array();
        if (array_key_exists('namespaces', $this->classMap)) {
            foreach ($this->classMap['namespaces'] as $namespace => $data) {
                foreach ($data as $path => $value) {
                    $maps = array();
                    if (is_array($value)) {
                        $maps = $value;
                    } else {
                        $maps[] = $value;
                    }

                    foreach ($maps as $map) {
                        if (!is_array($map)) {
                            $file = $path . '/' . $map .'/*.class.php';
                            $file = str_replace('//', '/', $file);
                            $files = $this->rglob($file) ;
                            if (!empty($files) && is_array($files)) {
                                foreach ($files as $file) {
                                    $value = str_replace($baseDir, '', $file);
                                    $path_arr = explode('/', $value);
                                    if (is_array($path_arr) && count($path_arr) > 0) {
                                        $class_file = array_pop($path_arr);
                                        $class_name = str_replace('.class.php', '', $class_file);
                                        $result["$namespace\\$class_name"] = $value;
                                    }
                                }
                            }                                                            
                        }
                    }
                }                
            }
                                        
        }
        
        foreach ($this->classMap as $path => $value) {
            $maps = array();
            if (is_array($value)) {
                $maps = $value;
            } else {
                $maps[] = $value;
            }
            foreach ($maps as $map) {
                if (!is_array($map)) {
                    $file = $path . '/' . $map .'/*.class.php';
                    $file = str_replace('//', '/', $file);
                    $files = $this->rglob($file) ;
                    if (!empty($files) && is_array($files)) {
                        foreach ($files as $file) {
                            $value = str_replace($baseDir, '', $file);
                            $path_arr = explode('/', $value);
                            if (is_array($path_arr) && count($path_arr) > 0) {
                                $class_file = array_pop($path_arr);
                                $class_name = str_replace('.class.php', '', $class_file);
                                $result["$class_name"] = $value;
                            }
                        }
                    }                                    
                }
            }
        }        
        
        if (!empty($result)) {
            $filename = $baseDir . '/classmap.json';
            if(!file_exists($filename)){
                touch($filename);
            }
            $fp = fopen($filename, 'w+');
            fwrite($fp, json_encode($result));
            fclose($fp);                    
        }

    }

    

}

Agp_Autoloader::instance();
