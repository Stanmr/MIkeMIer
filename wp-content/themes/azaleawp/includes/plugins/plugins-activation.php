<?php

if(!function_exists('azalea_eltdf_register_required_plugins')) {
    /**
     * Registers Visual Composer, Revolution Slider, Elated Core, Elated Instagram Feed, Elatedf Twitter Feed  as required plugins. Hooks to tgmpa_register hook
     */
    function azalea_eltdf_register_required_plugins() {
        $plugins = array(
            array(
                'name'               => esc_html__('WPBakery Visual Composer', 'azaleawp'),
                'slug'               => 'js_composer',
                'source'             => get_template_directory().'/includes/plugins/js_composer.zip',
                'required'           => true,
                'version'            => '5.4.2',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'               => esc_html__('Revolution Slider', 'azaleawp'),
                'slug'               => 'revslider',
                'source'             => get_template_directory().'/includes/plugins/revslider.zip',
                'version'            => '5.4.6',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'               => esc_html__('Elated Core', 'azaleawp'),
                'slug'               => 'eltdf-core',
                'source'             => get_template_directory().'/includes/plugins/eltdf-core.zip',
                'required'           => true,
                'version'            => '1.0.1',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'               => esc_html__('Elated Instagram Feed', 'azaleawp'),
                'slug'               => 'eltdf-instagram-feed',
                'source'             => get_template_directory().'/includes/plugins/eltdf-instagram-feed.zip',
                'required'           => true,
                'version'            => '1.0',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            ),
            array(
                'name'               => esc_html__('Elated Twitter Feed', 'azaleawp'),
                'slug'               => 'eltdf-twitter-feed',
                'source'             => get_template_directory().'/includes/plugins/eltdf-twitter-feed.zip',
                'required'           => true,
                'version'            => '1.0',
                'force_activation'   => false,
                'force_deactivation' => false,
                'external_url'       => ''
            )
        );

        $config = array(
            'domain'           => 'azaleawp',
            'default_path'     => '',
            'parent_slug' 	   => 'themes.php',
            'capability' 	   => 'edit_theme_options',
            'menu'             => 'install-required-plugins',
            'has_notices'      => true,
            'is_automatic'     => false,
            'message'          => '',
            'strings'          => array(
                'page_title'                      => esc_html__('Install Required Plugins', 'azaleawp'),
                'menu_title'                      => esc_html__('Install Plugins', 'azaleawp'),
                'installing'                      => esc_html__('Installing Plugin: %s', 'azaleawp'),
                'oops'                            => esc_html__('Something went wrong with the plugin API.', 'azaleawp'),
                'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'azaleawp'),
                'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'azaleawp'),
                'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'azaleawp'),
                'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'azaleawp'),
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'azaleawp'),
                'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'azaleawp'),
                'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'azaleawp'),
                'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'azaleawp'),
                'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', 'azaleawp'),
                'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins', 'azaleawp'),
                'return'                          => esc_html__('Return to Required Plugins Installer', 'azaleawp'),
                'plugin_activated'                => esc_html__('Plugin activated successfully.', 'azaleawp'),
                'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'azaleawp'),
                'nag_type'                        => 'updated'
            )
        );

        tgmpa($plugins, $config);
    }

    add_action('tgmpa_register', 'azalea_eltdf_register_required_plugins');
}