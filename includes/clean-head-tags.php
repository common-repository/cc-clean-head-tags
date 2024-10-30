<?php

/*
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

namespace Clearcode;

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( __NAMESPACE__ . '\Clean_Head_Tags' ) ) {
	class Clean_Head_Tags extends Clean_Head_Tags\Plugin {
		public function action_init() {
			foreach ( array(
				'html',
				'xhtml',
				'atom',
				'rss2',
				'rdf',
				'comment',
				'export'
			) as $type ) {
				add_filter( 'get_the_generator_' . $type, '__return_empty_string' );
			}

			remove_action( 'wp_head', 'wp_generator'                           );
			remove_action( 'wp_head', 'rsd_link'                               );
			remove_action( 'wp_head', 'feed_links_extra',                3     );
			remove_action( 'wp_head', 'feed_links',                      2     );
			remove_action( 'wp_head', 'wlwmanifest_link'                       );
			remove_action( 'wp_head', 'index_rel_link'                         );
			remove_action( 'wp_head', 'parent_post_rel_link',            10, 0 );
			remove_action( 'wp_head', 'start_post_rel_link',             10, 0 );
			remove_action( 'wp_head', 'wp_shortlink_wp_head',            10, 0 );
			remove_action( 'wp_head', 'adjacent_posts_rel_link',         10, 0 );
			remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
			remove_action( 'wp_head', 'rest_output_link_wp_head',        10, 0 );
			remove_action( 'wp_head', 'wp_oembed_add_discovery_links',   10    );
			remove_action( 'wp_head', 'wp_oembed_add_discovery_links'          );
		}

		public function filter_style_loader_src_999( $src, $handle ) {
			if ( static::apply_filters( 'Style', true, $src, $handle ) ) {
				return $this->remove_ver( $src );
			}
			return $src;
		}

		public function filter_script_loader_src_999( $src, $handle ) {
			if ( static::apply_filters( 'Script', true, $src, $handle ) ) {
				return $this->remove_ver( $src );
			}
			return $src;
		}

		protected function remove_ver( $src ) {
			if ( strpos( $src, 'ver=' ) ) {
				$src = remove_query_arg( 'ver', $src );
			}
			return $src;
		}
	}
}
