<?php

namespace Calculogic\Includes\Widgets;

use WP_Widget;

class Calculogic_Form_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'calculogic_form_widget', // Base ID
            __('Calculogic Dashboard', 'calculogic'), // Name
            array('description' => __('A widget to manage Calculogic forms', 'calculogic')) // Args
        );
    }

    public function widget($args, $instance) {
        // Output the widget content
        echo $args['before_widget'];
        echo $args['before_title'] . __('Calculogic Dashboard', 'calculogic') . $args['after_title'];

        // Include the dashboard content
        include plugin_dir_path(__FILE__) . '../../public/partials/calculogic-public-display.php';

        echo $args['after_widget'];
    }

    public function form($instance) {
        // Output the widget settings form in the admin area
        $title = !empty($instance['title']) ? $instance['title'] : __('Calculogic Dashboard', 'calculogic');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'calculogic'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        // Save widget settings
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        return $instance;
    }
}