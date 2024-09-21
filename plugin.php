<?php
/**
 * Plugin Name:       Menu endpoint
 * Description:       Plugin menu endpoints
 * Requires at least: 5.9
 * Requires PHP:      7.2
 * Version:           0.1.0
 * Author:            REST API team
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       menu-endpoint
 *
 * @package           nuk-wp-block-plugin
 */

declare( strict_types = 1 );

use NUK\WP\Inc\Init;

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Filters the arguments for registering a post type to include a REST API controller class.
 *
 * @param array $args An array of arguments used for registering the post type.
 * @param string $post_type The name of the post type being registered.
 * @return array The filtered array of arguments for the post type registration.
 */
function wp_register_post_type_args_for_menu_item($args, $post_type ) {
	if ( 'nav_menu_item' === $post_type ) {
		require_once __DIR__ . '/inc/class-wp-rest-public-menu-items-controller.php';
		$args['rest_controller_class'] = WP_REST_Public_Menu_Items_Controller::class;
	}

	return $args;
}
add_filter( 'register_post_type_args', 'wp_register_post_type_args_for_menu_item', 10, 2 );

/**
 * Filters the arguments for registering a taxonomy to include a REST API controller class.
 *
 * @param array $args An array of arguments used for registering the taxonomy.
 * @param string $taxonomy The name of the taxonomy being registered.
 * @return array The filtered array of arguments for the taxonomy registration.
 */
function wp_register_taxonomy_args_for_menu_item($args, $taxonomy ) {
	if ( 'nav_menu' === $taxonomy ) {
		require_once __DIR__ . '/inc/class-wp-rest-public-menus-controller.php';
		$args['rest_controller_class'] = WP_REST_Public_Menus_Controller::class;
	}

	return $args;
}
add_filter( 'register_taxonomy_args', 'wp_register_taxonomy_args_for_menu_item', 10, 2 );

function wp_register_public_menu_locations_rest_init(){
	require_once __DIR__ . '/inc/class-wp-rest-public-menu-locations-controller.php';
	// Menu Locations.
	$controller = new WP_REST_Public_Menu_Locations_Controller();
	$controller->register_routes();
}
add_action( 'rest_api_init', 'wp_register_public_menu_locations_rest_init', 100, 0 );
