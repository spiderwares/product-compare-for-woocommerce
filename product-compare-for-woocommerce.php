<?php
/**
 * Plugin Name:       Product Compare For WooCommerce
 * Description:       Allow your customers to compare multiple products in your WooCommerce store. Easily display product features side-by-side to help users make better purchase decisions.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            jthemesstudio
 * Author URI:        https://jthemes.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Requires Plugins:  woocommerce
 * Text Domain:       product-compare-for-woocommerce
 *
 * @package Product Compare For WooCommerce
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'PCWC_FILE' ) ) :
    define( 'PCWC_FILE', __FILE__ ); // Define the plugin file path.
endif;

if ( ! defined( 'PCWC_BASENAME' ) ) :
    define( 'PCWC_BASENAME', plugin_basename( PCWC_FILE ) ); // Define the plugin basename.
endif;

if ( ! defined( 'PCWC_VERSION' ) ) :
    define( 'PCWC_VERSION', '1.0.0' ); // Define the plugin version.
endif;

if ( ! defined( 'PCWC_PATH' ) ) :
    define( 'PCWC_PATH', plugin_dir_path( __FILE__ ) ); // Define the plugin directory path.
endif;

if ( ! defined( 'PCWC_TEMPLATE_PATH' ) ) :
	define( 'PCWC_TEMPLATE_PATH', plugin_dir_path( __FILE__ ) . '/templates/' ); // Define the plugin directory path.
endif;

if ( ! defined( 'PCWC_URL' ) ) :
    define( 'PCWC_URL', plugin_dir_url( __FILE__ ) ); // Define the plugin directory URL.
endif;

if ( ! defined( 'PCWC_REVIEWS' ) ) :
    define( 'PCWC_REVIEWS', 'https://jthemes.com/' ); // Define the plugin directory URL.
endif;

if ( ! defined( 'PCWC_CHANGELOG' ) ) :
    define( 'PCWC_CHANGELOG', 'https://jthemes.com/' ); // Define the plugin directory URL.
endif;

if ( ! defined( 'PCWC_DISCUSSION' ) ) :
    define( 'PCWC_DISCUSSION', 'https://jthemes.com/' ); // Define the plugin directory URL.
endif;

if ( ! defined( 'PCWC_UPGRADE_URL' ) ) :
    define( 'PCWC_UPGRADE_URL', 'https://jthemes.com/' ); // Define the upgrade URL.
endif;

if ( ! defined( 'PCWC_PRO_VERSION_URL' ) ) :
    define( 'PCWC_PRO_VERSION_URL', 'https://jthemes.com/' ); // Define the Pro Version URL.
endif;

if ( ! class_exists( 'PCWC', false ) ) :
    include_once PCWC_PATH . 'includes/class-pcwc.php';
endif;

$GLOBALS['pcwc'] = PCWC::instance();
