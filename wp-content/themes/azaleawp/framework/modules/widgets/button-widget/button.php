<?php

class AzaleaEltdfButtonWidget extends AzaleaEltdfWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_button_widget',
			esc_html__('Elated Button Widget', 'azaleawp'),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'azaleawp'))
		);

		$this->setParams();
	}

	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__('Type', 'azaleawp'),
				'options' => array(
					'solid'   => esc_html__('Solid', 'azaleawp'),
					'outline' => esc_html__('Outline', 'azaleawp'),
					'simple'  => esc_html__('Simple', 'azaleawp')
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'size',
				'title'   => esc_html__('Size', 'azaleawp'),
				'options' => array(
					'small'  => esc_html__('Small', 'azaleawp'),
					'medium' => esc_html__('Medium', 'azaleawp'),
					'large'  => esc_html__('Large', 'azaleawp'),
					'huge'   => esc_html__('Huge', 'azaleawp')
				),
				'description' => esc_html__('This option is only available for solid and outline button type', 'azaleawp')
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__('Text', 'azaleawp'),
				'default' => esc_html__('Button Text', 'azaleawp')
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__('Link', 'azaleawp')
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__('Link Target', 'azaleawp'),
				'options' => azalea_eltdf_get_link_target_array()
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__('Color', 'azaleawp')
			),
			array(
				'type'  => 'textfield',
				'name'  => 'hover_color',
				'title' => esc_html__('Hover Color', 'azaleawp')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'background_color',
				'title'       => esc_html__('Background Color', 'azaleawp'),
				'description' => esc_html__('This option is only available for solid button type', 'azaleawp')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_background_color',
				'title'       => esc_html__('Hover Background Color', 'azaleawp'),
				'description' => esc_html__('This option is only available for solid button type', 'azaleawp')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'border_color',
				'title'       => esc_html__('Border Color', 'azaleawp'),
				'description' => esc_html__('This option is only available for solid and outline button type', 'azaleawp')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_border_color',
				'title'       => esc_html__('Hover Border Color', 'azaleawp'),
				'description' => esc_html__('This option is only available for solid and outline button type', 'azaleawp')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__('Margin', 'azaleawp'),
				'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'azaleawp')
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
		$params = '';

		if (!is_array($instance)) { $instance = array(); }

		// Filter out all empty params
		$instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });

		// Default values
		if (!isset($instance['text'])) { $instance['text'] = 'Button Text'; }

		// Generate shortcode params
		foreach($instance as $key => $value) {
			$params .= " $key='$value' ";
		}

		echo '<div class="widget eltdf-button-widget">';
			echo do_shortcode("[eltdf_button $params]"); // XSS OK
		echo '</div>';
	}
}