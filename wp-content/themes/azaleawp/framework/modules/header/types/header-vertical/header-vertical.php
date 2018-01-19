<?php
namespace AzaleaEltdf\Modules\Header\Types;

use AzaleaEltdf\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Vertical layout and option
 *
 * Class HeaderVertical
 */
class HeaderVertical extends HeaderType {
    protected $heightOfTransparency;
    protected $heightOfCompleteTransparency;
    protected $headerHeight;
    protected $mobileHeaderHeight;

	public function __construct() {
		$this->slug = 'header-vertical';
		
		if ( ! is_admin() ) {
			$this->mobileHeaderHeight = azalea_eltdf_set_default_mobile_menu_height_for_header_types();
			
			add_action( 'wp', array( $this, 'setHeaderHeightProps' ) );
			
			add_filter( 'azalea_eltdf_js_global_variables', array( $this, 'getGlobalJSVariables' ) );
			add_filter( 'azalea_eltdf_per_page_js_vars', array( $this, 'getPerPageJSVariables' ) );

            add_filter('body_class', array($this, 'bodyPerPageClasses'));
		}
	}
	
	/**
	 * Loads template for header type
	 *
	 * @param array $parameters associative array of variables to pass to template
	 */
	public function loadTemplate( $parameters = array() ) {
		$parameters['holder_class'] = azalea_eltdf_vertical_header_holder_class();
		
		$parameters = apply_filters( 'azalea_eltdf_header_vertical_parameters', $parameters );
		
		azalea_eltdf_get_module_template_part( 'templates/' . $this->slug, $this->moduleName . '/types/' . $this->slug, '', $parameters );
	}
	
	/**
	 * Sets header height properties after WP object is set up
	 */
	public function setHeaderHeightProps() {
		$this->heightOfTransparency         = $this->calculateHeightOfTransparency();
		$this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
		$this->headerHeight                 = $this->calculateHeaderHeight();
	}
	
	/**
	 * Returns total height of transparent parts of header
	 *
	 * @return mixed
	 */
	public function calculateHeightOfTransparency() {
		return 0;
	}
	
	/**
	 * Returns height of header parts that are totaly transparent
	 *
	 * @return mixed
	 */
	public function calculateHeightOfCompleteTransparency() {
		return 0;
	}
	
	/**
	 * Returns header height
	 *
	 * @return mixed
	 */
	public function calculateHeaderHeight() {
		return 0;
	}
	
	/**
	 * Returns global js variables of header
	 *
	 * @param $globalVariables
	 *
	 * @return int|string
	 */
	public function getGlobalJSVariables( $globalVariables ) {
		$globalVariables['eltdfLogoAreaHeight'] = 0;
		$globalVariables['eltdfMenuAreaHeight'] = 0;
		
		return $globalVariables;
	}
	
	/**
	 * Returns per page js variables of header
	 *
	 * @param $perPageVars
	 *
	 * @return int|string
	 */
	public function getPerPageJSVariables( $perPageVars ) {
		$perPageVars['eltdfHeaderTransparencyHeight'] = 0;
		
		return $perPageVars;
	}

    public function bodyPerPageClasses($classes) {
        if($this -> heightOfCompleteTransparency > 0) {
            $classes[] = 'eltdf-header-transparent';
        }

        return $classes;
    }
}