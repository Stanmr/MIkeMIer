<?php

class AzaleaEltdfRawHTMLWidget extends AzaleaEltdfWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'eltdf_raw_html_widget',
			esc_html__( 'Elated Raw HTML Widget', 'azaleawp' ),
			array( 'description' => esc_html__( 'Add raw HTML holder to widget areas', 'azaleawp' ) )
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
				'name'  => 'extra_class',
				'title' => esc_html__( 'Extra Class Name', 'azaleawp' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'azaleawp' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'widget_grid',
				'title'   => esc_html__('Widget Grid', 'azaleawp'),
				'options' => array(
					''     => esc_html__('Full Width', 'azaleawp'),
					'auto' => esc_html__('Auto', 'azaleawp')
				)
			),
			array(
				'type'  => 'textarea',
				'name'  => 'content',
				'title' => esc_html__( 'Content', 'azaleawp' )
			)
		);
	}
	
	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		
		$extra_class   = array();
		$extra_class[] = !empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';
		$extra_class[] = !empty( $instance['widget_grid'] ) && $instance['widget_grid'] === 'auto' ? 'eltdf-grid-auto-width' : '';
		?>
		
		<div class="widget eltdf-raw-html-widget <?php echo esc_attr( implode( $extra_class ) ); ?>">
			<?php
			if ( ! empty( $instance['widget_title'] ) ) {
				print $args['before_title'] . esc_html( $instance['widget_title'] ) . $args['after_title'];
			}
			if ( ! empty( $instance['content'] ) ) {
				echo wp_kses( $instance['content'], array(
					'div'    => array(
						'class' => true,
						'style' => true,
						'id'    => true
					),
					'p'      => array(
						'class' => true,
						'style' => true,
						'id'    => true
					),
					'span'   => array(
						'class' => true,
						'style' => true,
						'id'    => true
					),
					'a'      => array(
						'class'  => true,
						'style'  => true,
						'id'     => true,
						'href'   => true,
						'target' => true
					),
					'br'     => array(),
					'strong' => array(),
					'b'      => array(),
					'i'      => array()
				) );
			}
			?>
		</div>
		<?php
	}
}