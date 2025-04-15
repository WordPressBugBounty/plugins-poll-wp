<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       TS Poll
 * @since      1.7.0
 *
 * @package    TS_Poll
 * @subpackage TS_Poll/public
 */
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    TS_Poll
 * @subpackage TS_Poll/public
 * @author     TS Poll <TS Poll>
 */
class ts_poll_public {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.7.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;
	/**
	 * The version of this plugin.
	 *
	 * @since    1.7.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.7.0
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.7.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ts_poll_loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ts_poll_loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( TS_POLL_PLUGIN_PREFIX . "public", TS_POLL_PLUGIN_DIR_URL . 'public/css/ts_poll-public.css', array(), TS_POLL_VERSION, 'all' );
   		wp_enqueue_style( TS_POLL_PLUGIN_PREFIX .'fonts', TS_POLL_PLUGIN_DIR_URL . 'fonts/ts_poll-fonts.css', array(), TS_POLL_VERSION, 'all' );
	}
	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.7.0
	 */
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ts_poll_loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ts_poll_loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_register_script( TS_POLL_PLUGIN_PREFIX . "vue", TS_POLL_PLUGIN_DIR_URL . 'public/js/vue.js', array( ), TS_POLL_VERSION , false );
		wp_register_script( TS_POLL_PLUGIN_PREFIX . "public", TS_POLL_PLUGIN_DIR_URL . 'public/js/ts_poll-public.js', array( 'jquery', TS_POLL_PLUGIN_PREFIX . 'vue' ), TS_POLL_VERSION, false );
		wp_enqueue_script( TS_POLL_PLUGIN_PREFIX . "vue");
		wp_enqueue_script( TS_POLL_PLUGIN_PREFIX . "public" );
		wp_localize_script(TS_POLL_PLUGIN_PREFIX . "public", 'tsPollData', array(
			'root_url' => esc_url_raw(rest_url()),
			'nonce' => wp_create_nonce('wp_rest')
		));
	}
}
