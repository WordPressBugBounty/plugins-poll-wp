<?php
	  /*
	  Plugin Name: Poll
	  Plugin URI: https://total-soft.com/wp-poll/
	  Description: Best Add a powerful poll on your site. WordPress Poll plugin is a responsive and customizable for WordPress. Poll plugin will help you more easily create powerful poll.
	  Author: totalsoft
	  Version: 2.6.0
	  Author URI: https://total-soft.com
	  License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
	  */
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'TS_POLL_VERSION', '2.6.0' );
define( 'TS_POLL_PLUGIN_NAME', 'TS_POLL' );
define( 'TS_POLL_PLUGIN_PREFIX', 'ts-poll-' );
define( 'TS_POLL_BASE', plugin_basename( __FILE__ ) );
define( 'TS_POLL_PLUGIN_ENV', plugin_dir_path( __FILE__ ) );
define( 'TS_POLL_PLUGIN_DIR', dirname( plugin_basename( __FILE__ ) ) );
define( 'TS_POLL_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
function activate_ts_poll() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ts_poll-activator.php';
	ts_poll_activate::activate();
}
function deactivate_ts_poll() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ts_poll-deactivator.php';
	ts_poll_deactivate::deactivate();
}
register_activation_hook( __FILE__, 'activate_ts_poll' );
register_deactivation_hook( __FILE__, 'deactivate_ts_poll' );
require plugin_dir_path( __FILE__ ) . 'includes/class-ts_poll.php';
function run_ts_poll() {
	$plugin = new TS_Poll();
	$plugin->run();
}
run_ts_poll();
