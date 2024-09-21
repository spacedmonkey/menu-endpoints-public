<?php

/**
 * Core class used to managed menu terms associated via the REST API.
 *
 * @since 5.9.0
 *
 * @see WP_REST_Controller
 */
class WP_REST_Public_Menus_Controller extends WP_REST_Menus_Controller {
	/**
	 * Checks whether the current user has read permission for the endpoint.
	 *
	 * This allows for any user that can `edit_theme_options` or edit any REST API available post type.
	 *
	 * @since 5.9.0
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return true True if the current user has permission, WP_Error object otherwise.
	 */
	protected function check_has_read_only_access( $request ) {
		return true;
	}
}
