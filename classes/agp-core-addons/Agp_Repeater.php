<?php

class Agp_Repeater extends Agp_Module {
    
    private $id;
    
    private $title;
    
    private $screen; 
    
    private $context;
    
    public function __construct($baseDir, $id, $title, $screen, $context) {
        parent::__construct($baseDir);
        
        $this->id = $id;
        $this->title = $title;
        $this->screen = $screen;
        $this->context = $context;
        
        add_action( 'add_meta_boxes', array( $this, 'addMetaboxes' ) );        
        add_action( 'save_post', array( $this, 'saveMetaboxes' ), 1, 2);        
        
    }
    
    public function addMetaboxes() {
        add_meta_box($this->id, $this->title, array($this, 'viewMetabox') , $this->screen, $this->context);
    }
    
    public function viewMetabox( $post ) {
        echo '<input type="hidden" name="'.  $this->id.'_noncename" id="'.  $this->id.'_noncename" value="' . wp_create_nonce( basename(__FILE__) ) . '" />';
        $data = $this->getData($post->ID);
        echo $this->getTemplate('admin/layout', array('data' => $data, 'post_id' => $post->ID));
    }
    
    public function show( $post_id ) {
        echo '<input type="hidden" name="'.  $this->id.'_noncename" id="'.  $this->id.'_noncename" value="' . wp_create_nonce( basename(__FILE__) ) . '" />';
        $data = $this->getData($post_id);
        echo $this->getTemplate('layout', array('data' => $data, 'post_id' => $post_id));
    }    
    
    public function view( $post_id ) {
        $data = $this->getData($post_id);
        echo $this->getTemplate('view', array('data' => $data, 'post_id' => $post_id));
    }        
    
    public function saveMetaboxes( $post_id, $post ) {

        if ( empty( $_POST[$this->id . '_noncename'] ) 
            || !wp_verify_nonce( $_POST[$this->id . '_noncename'],  basename(__FILE__) )
            || !current_user_can( 'edit_post', $post->ID ) ) {
            return $post->ID;
        }

        $data = $_POST[$this->id . '_data'];
        if (isset($data[0])) {
            unset($data[0]);
        }
        foreach ($data as $k => $v) {
            if (empty($v['day']) && empty($v['date']) && $v['opentime']['hour'] === '' && $v['opentime']['min'] === '' && $v['closetime']['hour'] === '' && $v['closetime']['min'] === '') {
                unset($data[$k]);
            }
        }
        $meta[$this->id . '_data'] = serialize($data);

        foreach ($meta as $key => $value) {
            if( $post->post_type == 'revision' ) return;
            
            if ( !$value ) {
                delete_post_meta($post->ID, $key); 
            } else {
                update_post_meta($post->ID, $key, $value);
            }
        }        
    }
    
    public function getData($post_id) {
        $data = get_post_meta($post_id, $this->id .'_data', true);

        if (is_serialized($data)) {
            $data = unserialize($data);
        }    
        
        return $data;
    }
    
    public function getMaxIndex($post_id) {
        $data = $this->getData($post_id);
        return max(array_keys($data));
    }
    
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getScreen() {
        return $this->screen;
    }

    public function getContext() {
        return $this->context;
    }

}