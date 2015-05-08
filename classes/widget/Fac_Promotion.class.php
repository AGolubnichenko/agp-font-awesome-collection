<?php

class Fac_Promotion extends WP_Widget {
    
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 'description' => __( "Adds promotion block to sidebar") );
		parent::__construct('fac_promotion', __('AGP Promotion'), $widget_ops);
	}
    
	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if (!empty( $instance['title'])) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }
        
        $atts = array();
        $atts['id'] = 'fac-' . $this->id;
        if (!empty($instance['headline'])) {
            $atts['headline'] = $instance['headline'];
        }
        if (!empty($instance['description'])) {
            $atts['description'] = $instance['description'];
        }
        if (!empty($instance['icon'])) {
            $atts['icon'] = $instance['icon'];
        }        
        if (!empty($instance['link'])) {
            $atts['link'] = $instance['link'];
        }                

        echo Fac()->getTemplate('widget/promotion', $atts);
        
        echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title = !empty($instance['title']) ? $instance['title'] : '';
		$headline = !empty($instance['headline']) ? $instance['headline'] : '';        
		$description = !empty($instance['description']) ? $instance['description'] : '';        
		$icon = !empty($instance['icon']) ? $instance['icon'] : '';                
        $link = !empty($instance['link']) ? $instance['link'] : '';                        
    ?>
        <p><?php $this->renderTitleField($title); ?></p>
        <p><?php $this->renderHeadlineField($headline); ?></p>        
        <p><?php $this->renderDescriptionField($description); ?></p>        
        <p><?php $this->renderIconField($icon); ?></p>                        
        <p><?php $this->renderLinkField($link); ?></p>                                
    <?php    
	}
    
	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
        
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags( $new_instance['title'] ) : '';
        $instance['headline'] = (!empty($new_instance['headline'])) ? strip_tags( $new_instance['headline'] ) : '';
        $instance['description'] = (!empty($new_instance['description'])) ? strip_tags( $new_instance['description'] ) : '';
        $instance['icon'] = (!empty($new_instance['icon'])) ? strip_tags( $new_instance['icon'] ) : '';
        $instance['link'] = (!empty($new_instance['link'])) ? strip_tags( $new_instance['link'] ) : '';        
        
		return $instance;
	}    
    
    public function renderTitleField ($title) {
    ?>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">    
    <?php    
    }    
    
    public function renderHeadlineField ($headline) {
    ?>
        <label for="<?php echo esc_attr( $this->get_field_id( 'headline' ) ); ?>"><?php _e( 'Headline:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'headline' ); ?>" name="<?php echo $this->get_field_name( 'headline' ); ?>" type="text" value="<?php echo esc_attr( $headline ); ?>">    
    <?php    
    }    
    
    public function renderIconField ($icon) {
        $selected = !empty($icon) ? $icon : '';
        $categories = Fac()->getIconRepository()->getAllCategories();
    ?>
        <label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php _e( 'Icon:' ); ?></label> 
        <select class="widefat" style="font-family:FontAwesome, Arial;" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>">
            <option value=""></option>                
            <?php 
                foreach ($categories as $category) : 
            ?>
                    <optgroup label="<?php echo $category;?>">            
            <?php
                    $icons = Fac()->getIconRepository()->getAllByCategory($category);
                    foreach ($icons as $icon) : 
            ?>
                <option style="font-family:FontAwesome, Arial;" data-icon="fa-<?php echo $icon->getId(); ?>" value="<?php echo $icon->getId(); ?>"<?php selected($icon->getId(), $selected); ?>>
                    &#x<?php echo $icon->getUnicode(); ?>; <?php echo $icon->getName(); ?>
                </option>            
            <?php 
                    endforeach;
            ?>
                    </optgroup>
            <?php                
                endforeach; 
            ?>
        </select>        
    <?php    
    }            
    
    public function renderDescriptionField ($description) {
    ?>
        <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php _e( 'Description:' ); ?></label> 
        <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo $description; ?></textarea>        
    <?php    
    }        
    
    public function renderLinkField ($link) {
    ?>
        <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php _e( 'Link URL:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">    
    <?php    
    }        
    
}

    