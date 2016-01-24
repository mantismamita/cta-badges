<?php
/**
 * Acme Footer Image
 *
 *  * @link              http://www.kirstencassidy.com
 * @since             1.0.0
 * @package           Cta_Badges
 *
 * @wordpress-plugin
 * Plugin Name:       CTA Badges
 * Plugin URI:        kirstencassidy.com
 * Description:       This displays badges on each of the Boutique Hostels sites which will link to various pages, urls, or forms
 * Version:           1.0.0
 * Author:            Kirsten Cassidy
 * Author URI:        http://www.kirstencassidy.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cta-badges
 * Domain Path:       /languages
 * 
 * adapted from https://github.com/tutsplus/acme-footer-image by Tom McFarlin
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Includes the core plugin class for executing the plugin.
 */
require_once( plugin_dir_path( __FILE__ ) . 'admin/class-cta-badges.php' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_cta_badges() {

	$plugin = new CTA_Badges();
	$plugin->run();

}
run_cta_badges();
