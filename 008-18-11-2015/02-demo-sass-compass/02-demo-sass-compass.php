<?php namespace WP_Meetup_Bologna;
/**
 * Plugin Name: 02 Demo WordPress Mettup Bologna Sass e Compass
 * Plugin URI: http://www.meetup.com/it/WordPress-Meetup-Bologna/
 * Description: Vediamo Sass e Compass come funziona.
 * Version: 1.0.0
 * Author: Enea Overclokk, lucatume
 * Author URI: https://github.com/WordPressMeetupBologna
 * Text Domain: wordpress-meetup-bologna
 * License: GPLv2 or later
 *
 * @package WordPress Mettup Bologna
 * @since 1.0.0
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * This will make shure the plugin files can't be accessed within the web browser directly.
 */
if ( ! defined( 'WPINC' ) )
	die;

/**
 * Use this file for loading any scripts and styles
 * If you use child theme copy it in child folder and change wp_meetup_bologna_PARENT_PATH if necessary
 *
 * @package wp_meetup_bologna
 * @since 1.0.0
 */

/**
 * Init script and style
 */
function wp_meetup_bologna_add_style_and_script() {

	/**
	 * Avoid caching script
	 * @var int
	 */
	$ver = ( WP_DEBUG ) ? rand( 0, 100000 ) : null;

	/**
	 * Load Bootstrap styles
	 */
	wp_enqueue_style( 'sass',  plugin_dir_url( __FILE__ ) . '/style.css', null, $ver, null );

}

/**
 * Hook into the 'wp_enqueue_scripts' action
 */
add_action( 'wp_enqueue_scripts', 'WP_Meetup_Bologna\wp_meetup_bologna_add_style_and_script' );
