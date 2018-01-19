<?php

class AzaleaEltdfSeparatorWidget extends AzaleaEltdfWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_separator_widget',
	        esc_html__('Elated Separator Widget', 'azaleawp'),
	        array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'azaleawp'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'name' => 'type',
                'title' => esc_html__('Type', 'azaleawp'),
                'options' => array(
                    'normal' => esc_html__('Normal', 'azaleawp'),
                    'full-width' => esc_html__('Full Width', 'azaleawp')
                )
            ),
            array(
                'type' => 'dropdown',
                'name' => 'position',
                'title' => esc_html__('Position', 'azaleawp'),
                'options' => array(
                    'center' => esc_html__('Center', 'azaleawp'),
                    'left' => esc_html__('Left', 'azaleawp'),
                    'right' => esc_html__('Right', 'azaleawp')
                )
            ),
            array(
                'type' => 'dropdown',
                'name' => 'border_style',
                'title' => esc_html__('Style', 'azaleawp'),
                'options' => array(
                    'solid' => esc_html__('Solid', 'azaleawp'),
                    'dashed' => esc_html__('Dashed', 'azaleawp'),
                    'dotted' => esc_html__('Dotted', 'azaleawp')
                )
            ),
            array(
                'type' => 'textfield',
                'name' => 'color',
                'title' => esc_html__('Color', 'azaleawp')
            ),
            array(
                'type' => 'textfield',
                'name' => 'width',
                'title' => esc_html__('Width', 'azaleawp')
            ),
            array(
                'type' => 'textfield',
                'name' => 'thickness',
                'title' => esc_html__('Thickness (px)', 'azaleawp')
            ),
            array(
                'type' => 'textfield',
                'name' => 'top_margin',
                'title' => esc_html__('Top Margin', 'azaleawp')
            ),
            array(
                'type' => 'textfield',
                'name' => 'bottom_margin',
                'title' => esc_html__('Bottom Margin', 'azaleawp')
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget eltdf-separator-widget">';
            echo do_shortcode("[eltdf_separator $params]"); // XSS OK
        echo '</div>';
    }
}