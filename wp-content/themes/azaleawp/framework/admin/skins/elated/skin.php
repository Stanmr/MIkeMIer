<?php

//if accessed directly exit
if(!defined('ABSPATH')) exit;

class ElatedSkin extends AzaleaEltdfSkinAbstract {
    /**
     * Skin constructor. Hooks to azalea_eltdf_admin_scripts_init and azalea_eltdf_enqueue_admin_styles
     */
    public function __construct() {
        $this->skinName = 'elated';

        //hook to
        add_action('azalea_eltdf_admin_scripts_init', array($this, 'registerStyles'));
        add_action('azalea_eltdf_admin_scripts_init', array($this, 'registerScripts'));

        add_action('azalea_eltdf_enqueue_admin_styles', array($this, 'enqueueStyles'));
        add_action('azalea_eltdf_enqueue_admin_scripts', array($this, 'enqueueScripts'));

        add_action('azalea_eltdf_enqueue_meta_box_styles', array($this, 'enqueueStyles'));
        add_action('azalea_eltdf_enqueue_meta_box_scripts', array($this, 'enqueueScripts'));

		add_action('before_wp_tiny_mce', array($this, 'setShortcodeJSParams'));

		$this->setIcons();
		$this->setMenuItemPosition();
    }

    /**
     * Method that registers skin scripts
     */
    public function registerScripts() {
        $this->scripts['bootstrap.min'] = 'assets/js/bootstrap.min.js';
        $this->scripts['jquery.nouislider.min'] = 'assets/js/eltdf-ui/jquery.nouislider.min.js';
        $this->scripts['eltdf-ui-admin'] = 'assets/js/eltdf-ui/eltdf-ui.js';
        $this->scripts['eltdf-bootstrap-select'] = 'assets/js/eltdf-ui/eltdf-bootstrap-select.min.js';
        $this->scripts['select2'] = 'assets/js/eltdf-ui/select2.min.js';

        foreach ($this->scripts as $scriptHandle => $scriptPath) {
	        azalea_eltdf_register_skin_script($scriptHandle, $scriptPath);
        }
    }

    /**
     * Method that registers skin styles
     */
    public function registerStyles() {
        $this->styles['eltdf-bootstrap'] = 'assets/css/eltdf-bootstrap.css';
        $this->styles['eltdf-page-admin'] = 'assets/css/eltdf-page.css';
        $this->styles['eltdf-options-admin'] = 'assets/css/eltdf-options.css';
        $this->styles['eltdf-meta-boxes-admin'] = 'assets/css/eltdf-meta-boxes.css';
        $this->styles['eltdf-ui-admin'] = 'assets/css/eltdf-ui/eltdf-ui.css';
        $this->styles['eltdf-forms-admin'] = 'assets/css/eltdf-forms.css';
        $this->styles['eltdf-import'] = 'assets/css/eltdf-import.css';
        $this->styles['font-awesome-admin'] = 'assets/css/font-awesome/css/font-awesome.min.css';
        $this->styles['select2-css'] = 'assets/css/select2.min.css';

        foreach ($this->styles as $styleHandle => $stylePath) {
	        azalea_eltdf_register_skin_style($styleHandle, $stylePath);
        }

    }

	/**
	 * Method that set menu icons
	 */
	public function setIcons() {
		$this->icons = array(
			'portfolio' => 'dashicons-screenoptions',
			'testimonial' => 'dashicons-format-quote',
			'proofing-gallery' => 'dashicons-format-gallery',
			'masonry-gallery' => 'dashicons-schedule',
            'team' => 'dashicons-admin-users',
			'options' => $this->getSkinURI().'/assets/img/admin-logo-icon.png'
		);
	}

	/**
	 * Method that set menu item position
	 */

	public function setMenuItemPosition() {
		$this->itemPosition = array(
			'testimonial' => 20,
			'portfolio' => 5,
			'options' => 100
		);
	}

    /**
     * Method that renders options page
     *
     * @see ElatedSkin::getHeader()
     * @see ElatedSkin::getPageNav()
     * @see ElatedSkin::getPageContent()
     */
    public function renderOptions() {
        global $azalea_eltdf_Framework;
        $tab    = azalea_eltdf_get_admin_tab();
        $active_page = $azalea_eltdf_Framework->eltdOptions->getAdminPageFromSlug($tab);
        if ($active_page == null) return;
        ?>
        <div class="eltdf-options-page eltdf-page">
            <?php $this->getHeader($active_page); ?>
            <div class="eltdf-page-content-wrapper">
                <div class="eltdf-page-content">
                    <div class="eltdf-page-navigation eltdf-tabs-wrapper vertical left clearfix">
                        <?php $this->getPageNav($tab); ?>
                        <?php $this->getPageContent($active_page); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

    /**
     * Method that renders header of options page.
     * @param bool $show_save_btn whether to show save button. Should be hidden on import page
     *
     * @see ElatedSkinAbstract::loadTemplatePart()
     */
    public function getHeader($activePage = '', $show_save_btn = true) {
        $this->loadTemplatePart('header', array('active_page' => $activePage, 'show_save_btn' => $show_save_btn));
    }

    /**
     * Method that loads page navigation
     * @param string $tab current tab
     * @param bool $is_import_page if is import page highlighted that tab
     *
     * @see ElatedSkinAbstract::loadTemplatePart()
     */
    public function getPageNav($tab, $is_import_page = false, $is_backup_options_page = false) {
        $this->loadTemplatePart('navigation', array(
            'tab' => $tab,
            'is_import_page' => $is_import_page,
			'is_backup_options_page' => $is_backup_options_page
        ));
    }
	
	/**
	 * Method that loads current page content
	 *
	 * @param AzaleaEltdfAdminPage $page current page to load
	 * @see ElatedSkinAbstract::loadTemplatePart()
	 */
    public function getPageContent($page) {
        $this->loadTemplatePart('content', array('page' => $page));
    }

    /**
     * Method that loads content for import page
     */
    public function getImportContent() {
        $this->loadTemplatePart('content-import');
    }
	
	/**
	 * Method that loads content for backup page
	 */
	public function getBackupOptionsContent() {
		$this->loadTemplatePart('backup-options');
	}

    /**
     * Method that loads anchors and save button template part
     *
     * @param AzaleaEltdfAdminPage $page current page to load
     * @see ElatedSkinAbstract::loadTemplatePart()
     */
    public function getAnchors($page) {
        $this->loadTemplatePart('anchors', array('page' => $page));
    }

    /**
     * Method that renders import page
     *
     *  @see ElatedSkin::getHeader()
     *  @see ElatedSkin::getPageNav()
     *  @see ElatedSkin::getImportContent()
     */
    public function renderImport() { ?>
        <div class="eltdf-options-page eltdf-page">
            <?php $this->getHeader('', false); ?>
            <div class="eltdf-page-content-wrapper">
                <div class="eltdf-page-content">
                    <div class="eltdf-page-navigation eltdf-tabs-wrapper vertical left clearfix">
                        <?php $this->getPageNav('tabimport', true); ?>
                        <?php $this->getImportContent(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

	/**
	 * Method that renders backup options page
	 *
	 * @see SelectSkin::getHeader()
	 * * @see SelectSkin::getPageNav()
	 * * @see SelectSkin::getImportContent()
	 */
	public function renderBackupOptions() { ?>
		<div class="eltdf-options-page eltdf-page">
			<?php $this->getHeader('',false); ?>
			<div class="eltdf-page-content-wrapper">
				<div class="eltdf-page-content">
					<div class="eltdf-page-navigation eltdf-tabs-wrapper vertical left clearfix">
						<?php $this->getPageNav('backup_options', false, true); ?>
						<?php $this->getBackupOptionsContent(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php }
}
?>