<?php

/*
	Plugin Name: CC-Clean-Head-Tags
	Plugin URI: https://wordpress.org/plugins/cc-clean-head-tags
	Description: This plugin removes unnecessary html tags from the head section as well as version numbers from style/script links.
	Version: 1.0.4
	Author: Clearcode
	Author URI: https://clearcode.cc
	Text Domain: cc-clean-head-tags
	Domain Path: /languages/
	License: GPLv3
	License URI: http://www.gnu.org/licenses/gpl-3.0.txt

	Copyright (C) 2022 by Clearcode <http://clearcode.cc>
	and associates (see AUTHORS.txt file).

	This file is part of CC-Clean-Head-Tags.

	CC-Clean-Head-Tags is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	CC-Clean-Head-Tags is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with CC-Clean-Head-Tags; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

namespace Clearcode\Clean_Head_Tags;

use Clearcode\Clean_Head_Tags;
use Exception;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_admin() ) {
    return;
}

if ( ! function_exists( 'get_plugin_data' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

foreach ( array( 'singleton', 'filterer', 'plugin' ) as $file ) {
	require_once( __DIR__ . "/framework/$file.php" );
}

require_once( __DIR__ . '/includes/clean-head-tags.php' );

try {
	spl_autoload_register( __NAMESPACE__ . '::autoload' );

	if ( ! has_action( __NAMESPACE__ ) ) {
		do_action( __NAMESPACE__, Clean_Head_Tags::instance( __FILE__ ) );
	}
} catch ( Exception $exception ) {
	if ( WP_DEBUG && WP_DEBUG_DISPLAY ) {
		echo $exception->getMessage();
	}
}
