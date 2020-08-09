<?php
/**
 * Plugin name: WP Plugin Composer
 * Description: A starter WordPress plugin the leverages the Composer dependency management tool.
 * Author: J. Michael Ward
 * Author URI: https://jmichaelward.com
 * License: GPL-2.0-or-later
 */

use function JMichaelWard\WPPluginComposer\maybe_install_dependencies;
use function JMichaelWard\WPPluginComposer\maybe_autoload;

/*
 * Change this value to the fully-qualified namespace of your main plugin class.
 */
$plugin_class = "JMichaelWard\\WPPluginComposer\\Plugin";

require_once __DIR__ . '/functions.php';

/**
 * Install plugin dependencies on activation.
 */
register_activation_hook( __FILE__, function() use ( $plugin_class ) {
	maybe_install_dependencies( $plugin_class );
} );

/*-----------------------------------------------------------------
|| Initialize plugin.
||-----------------------------------------------------------------*/

// 1. Autoload classes if it's necessary.
maybe_autoload();

// 2. Make sure classes were actually autoloaded.
if ( ! class_exists( $plugin_class, false ) ) {
	return;
}

// 3. Fire it up!
add_action( 'plugins_loaded', [  new $plugin_class(), 'run' ] );
