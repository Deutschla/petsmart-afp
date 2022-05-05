<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$yakeen_theme_data = wp_get_theme();
	$action  = 'yakeen_theme_init';
	do_action( $action );

	define( 'YAKEEN_VERSION', ( WP_DEBUG ) ? time() : $yakeen_theme_data->get( 'Version' ) );
	define( 'YAKEEN_AUTHOR_URI', $yakeen_theme_data->get( 'AuthorURI' ) );
	define( 'YAKEEN_NAME', 'yakeen' );

	// DIR
	define( 'YAKEEN_BASE_DIR',    get_template_directory(). '/' );
	define( 'YAKEEN_INC_DIR',     YAKEEN_BASE_DIR . 'inc/' );
	define( 'YAKEEN_VIEW_DIR',    YAKEEN_INC_DIR . 'views/' );
	define( 'YAKEEN_LIB_DIR',     YAKEEN_BASE_DIR . 'lib/' );
	define( 'YAKEEN_WID_DIR',     YAKEEN_INC_DIR . 'widgets/' );
	define( 'YAKEEN_PLUGINS_DIR', YAKEEN_INC_DIR . 'plugins/' );
	define( 'YAKEEN_MODULES_DIR', YAKEEN_INC_DIR . 'modules/' );
	define( 'YAKEEN_ASSETS_DIR',  YAKEEN_BASE_DIR . 'assets/' );
	define( 'YAKEEN_CSS_DIR',     YAKEEN_ASSETS_DIR . 'css/' );
	define( 'YAKEEN_JS_DIR',      YAKEEN_ASSETS_DIR . 'js/' );

	// URL
	define( 'YAKEEN_BASE_URL',    get_template_directory_uri(). '/' );
	define( 'YAKEEN_ASSETS_URL',  YAKEEN_BASE_URL . 'assets/' );
	define( 'YAKEEN_CSS_URL',     YAKEEN_ASSETS_URL . 'css/' );
	define( 'YAKEEN_JS_URL',      YAKEEN_ASSETS_URL . 'js/' );
	define( 'YAKEEN_IMG_URL',     YAKEEN_ASSETS_URL . 'img/' );
	define( 'YAKEEN_LIB_URL',     YAKEEN_BASE_URL . 'lib/' );

	// icon trait Plugin Activation
	require_once YAKEEN_INC_DIR . 'icon-trait.php';
	// Includes
	require_once YAKEEN_INC_DIR . 'svg-icon.php';
	require_once YAKEEN_INC_DIR . 'helper-functions.php';
	require_once YAKEEN_INC_DIR . 'yakeen.php';
	require_once YAKEEN_INC_DIR . 'general.php';
	require_once YAKEEN_INC_DIR . 'scripts.php';
	require_once YAKEEN_INC_DIR . 'template-vars.php';
	require_once YAKEEN_INC_DIR . 'includes.php';

	// Includes Modules
	require_once YAKEEN_MODULES_DIR . 'rt-post-related.php';
	require_once YAKEEN_MODULES_DIR . 'rt-team-related.php';
	require_once YAKEEN_MODULES_DIR . 'rt-breadcrumbs.php';

	// TGM Plugin Activation
	require_once YAKEEN_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once YAKEEN_INC_DIR . 'tgm-config.php';

	add_editor_style( 'style-editor.css' );

	// Update Breadcrumb Separator
	add_action('bcn_after_fill', 'yakeen_hseparator_breadcrumb_trail', 1);
	function yakeen_hseparator_breadcrumb_trail($object){
		$object->opt['hseparator'] = '<span class="dvdr"> <i class="fas fa-caret-right"></i> </span>';
		return $object;
	}
