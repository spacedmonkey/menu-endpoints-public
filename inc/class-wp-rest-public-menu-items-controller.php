<?php
/**
 * REST API: WP_REST_Menu_Items_Controller class
 *
 * @package WordPress
 * @subpackage REST_API
 * @since 0.1.0
 */

/**
 * Core class to access nav items via the REST API.
 *
 * @since 0.1.0
 *
 * @see WP_REST_Posts_Controller
 */
class WP_REST_Public_Menu_Items_Controller extends WP_REST_Menu_Items_Controller {

	/**
	 * Checks whether the current user has read permission for the endpoint.
	 *
	 * This allows for any user that can `edit_theme_options` or edit any REST API available post type.
	 *
	 * @since 0.1.0
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return true True if the request has read access for the item, WP_Error object otherwise.
	 */
	protected function check_has_read_only_access( $request ) {
		return true;
	}
}
