<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Yakeen_Core;
use \RT_Posts;
use YakeenTheme;


if ( !class_exists( 'RT_Posts' ) ) {
	return;
}

$post_types = array(
	'yakeen_team'       => array(
		'title'           => __( 'Team Member', 'yakeen-core' ),
		'plural_title'    => __( 'Team', 'yakeen-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => array(
			'menu_name'   => __( 'Team', 'yakeen-core' ),
		),
		'rewrite'         => YakeenTheme::$options['team_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' )
	),
);

$taxonomies = array(
	'yakeen_team_category' => array(
		'title'        => __( 'Team Category', 'yakeen-core' ),
		'plural_title' => __( 'Team Categories', 'yakeen-core' ),
		'post_types'   => 'yakeen_team',
		'rewrite'      => array( 'slug' => YakeenTheme::$options['team_cat_slug'] ),
	),
);

$Posts = RT_Posts::getInstance();
$Posts->add_post_types( $post_types );
$Posts->add_taxonomies( $taxonomies );