<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'tgmpa_register', 'yakeen_register_required_plugins' );
function yakeen_register_required_plugins() {
	$plugins = array(
		// Bundled
		array(
			'name'         => 'Yakeen Core',
			'slug'         => 'yakeen-core',
			'source'       => 'yakeen-core.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '1.1'
		),
		array(
			'name'         => 'RT Framework',
			'slug'         => 'rt-framework',
			'source'       => 'rt-framework.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '2.4'
		),
		array(
			'name'         => 'RT Demo Importer',
			'slug'         => 'rt-demo-importer',
			'source'       => 'rt-demo-importer.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '4.3'
		),
		array(
			'name'     		=> 'Review Schema',
			'slug'     		=> 'review-schema',
			'required' 		=> false,
		),
		// Repository
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => true,
		),
		array(
			'name'     => 'Elementor Page Builder',
			'slug'     => 'elementor',
			'required' => true,
		),
		array(
			'name'     => 'WP Fluent Forms',
			'slug'     => 'fluentform',
			'required' => false,
		),
		array(
			'name'     => 'AccessPress Social Counter',
			'slug'     => 'accesspress-social-counter',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'yakeen',                 	// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => YAKEEN_PLUGINS_DIR,       	// Default absolute path to bundled plugins.
		'menu'         => 'yakeen-install-plugins', 	// Menu slug.
		'has_notices'  => true,                    		// Show admin notices or not.
		'dismissable'  => true,                    		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   		// Automatically activate plugins after installation or not.
		'message'      => '',                      		// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}