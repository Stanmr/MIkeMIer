<?php

class AzaleaEldtfAuthorWidget extends AzaleaEltdfWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_author_widget',
            esc_html__('Elated Author Widget', 'azaleawp'),
            array( 'description' => esc_html__( 'Display author image and bio', 'azaleawp'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type'  => 'textfield',
                'name'  => 'image_src',
                'title' => esc_html__('Image Source', 'azaleawp')
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'bio',
                'title' => esc_html__('Author Bio', 'azaleawp')
            ),
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        if (!is_array($instance)) { $instance = array(); }

        // Filter out all empty params
        $instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });



        echo '<div class="widget eltdf-author-widget">';
        if(!empty($instance['widget_title'])) {
            print $args['before_title'].$instance['widget_title'].$args['after_title'];
        }

        echo '<div class="eltdf-author-image-holder">';
        echo '<img src="'.$instance['image_src'].'" alt="author-image"/>';
        echo '</div>';
        echo '<div class="eltdf-author-bio-holder">';
        echo '<p>'.$instance['bio'].'</p>';
        echo '</div>';
        echo '</div>';
    }
}