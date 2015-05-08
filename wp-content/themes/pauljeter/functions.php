<?php
/** Start the engine */
require_once( TEMPLATEPATH . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'Paul Jeter Theme' );
define( 'CHILD_THEME_URL', 'http://www.pauljeter.net' );

$content_width = apply_filters( 'content_width', 660, 490, 760 );

/** Add new image sizes */
add_image_size( 'featured', 600, 300, TRUE );
add_image_size( 'portfolio', 600, 200, TRUE );
add_image_size( 'teaser', 250, 250, TRUE );


/** Add suport for custom background */
add_custom_background();

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array( 'width' => 1020, 'height' => 170, 'textcolor' => '444', 'admin_header_callback' => 'pauljeter_admin_style' ) );

/**
 * Register a custom admin callback to display the custom header preview with the
 * same style as is shown on the front end.
 *
 */
function pauljeter_admin_style() {

	$headimg = sprintf( '.appearance_page_custom-header #headimg { background: url(%s) no-repeat; font-family: Oswald, arial, serif; min-height: %spx; }', get_header_image(), HEADER_IMAGE_HEIGHT );
	$h1 = sprintf( '#headimg h1, #headimg h1 a { color: #%s; font-size: 48px; font-weight: normal; line-height: 48px; margin: 25px 0 0; text-decoration: none; }', esc_html( get_header_textcolor() ) );
	$desc = sprintf( '#headimg #desc { color: #%s; display: none; }', esc_html( get_header_textcolor() ) );

	printf( '<style type="text/css">%1$s %2$s %3$s</style>', $headimg, $h1, $desc );

}

/** Add support for 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );

/** Register widget areas */
genesis_register_sidebar( array(
	'id'			=> 'welcome',
	'name'			=> __( 'Welcome', 'pauljeter' ),
	'description'	=> __( 'This is the welcome section.', 'pauljeter' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'featured',
	'name'			=> __( 'Featured', 'pauljeter' ),
	'description'	=> __( 'This is the featured section.', 'pauljeter' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'portfolio',
	'name'			=> __( 'Portfolio', 'pauljeter' ),
	'description'	=> __( 'This is the portfolio section.', 'pauljeter' ),
) );

add_action( 'init', 'pj_post_type_support' );

function pj_post_type_support() {

	add_post_type_support( 'portfolio', array( 'genesis-seo', 'genesis-layouts' ) );
}

add_filter( 'get_the_author_genesis_author_box_single', '__return_true' );
