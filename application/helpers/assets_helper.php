<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	if ( ! function_exists('assets_url'))
	{
		/**
		 * ASSETS URL
		 *
		 * Create a local URL that points to the assets for this application
		 *
		 * @param	string	$uri
		 * @param	string	$protocol
		 * @return	string
		 */
		function assets_url($uri = '')
		{
			return get_instance()->config->base_url("/assets");
		}
	}

	// ------------------------------------------------------------------------

?>