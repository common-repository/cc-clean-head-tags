=== CC-Clean-Head-Tags ===
Contributors: ClearcodeHQ, PiotrPress
Tags: clear head tags, head tags, head tag, html head, meta, meta tag, ver, version, version number, clean, disable, feed link, head, header, json-api, wp-api, rest-api, next, prev, post links, links, remove, rsd link, RSS Feed, shortlink, wlwmanifest, wp generator
Requires PHP: 7.2
Requires at least: 4.7.1
Tested up to: 5.9.2
Stable tag: trunk
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.txt

This plugin removes unnecessary html tags from the head section as well as version numbers from style/script links.

== Description ==

The CC-Clean-Head-Tags plugin removes:

* RSD / EditURI Link
* WLW Manifest Link
* RSS Feed Links
* Next & Prev Post Links
* Shortlink URL
* WP-API Links

WP Generator Meta from:

* html
* xhtml
* atom
* rss2
* rdf
* comment
* export

Additionally it removes version numbers from style and script links.

= Tips & Tricks =

You can exclude version number removal from certain style and/or script using these built-in filters:

* `Clearcode\Clean_Head_Tags\Style`
* `Clearcode\Clean_Head_Tags\Script`

For example like this:
`add_filter( 'Clearcode\Clean_Head_Tags\Style', function( $clean, $src, $handle ) {
	return ! in_array( $handle, ['style'] );
}, 10, 3 );`

== Installation ==

= From your WordPress Dashboard =

1. Go to 'Plugins > Add New'
2. Search for 'CC-Clean-Head-Tags'
3. Activate the plugin from the Plugin section on your WordPress Dashboard.

= From WordPress.org =

1. Download 'CC-Clean-Head-Tags'.
2. Upload the 'CC-Clean-Head-Tags' directory to your '/wp-content/plugins/' directory using your favorite method (ftp, sftp, scp, etc...)
3. Activate the plugin from the Plugin section in your WordPress Dashboard.

= Multisite =

The plugin can be activated and used for just about any use case.

* Activate at the site level to load the plugin on that site only.
* Activate at the network level for full integration with all sites in your network (this is the most common type of multisite installation).

== Changelog ==

= 1.0.4 =
*Release date: 16.03.2022*

* Added: PHP 8.0 support.

= 1.0.3 =
*Release date: 14.03.2019*

* Fixed: Excluded wp-admin tags.

= 1.0.2 =
*Release date: 13.03.2018*

* Fixed: Compatibility with WooCommerce.

= 1.0.1 =
*Release date: 24.01.2017*

* Corrected activation/deactivation functions & added basename property to Plugin class.

= 1.0.0 =
*Release date: 23.01.2017*

* First stable version of the plugin.