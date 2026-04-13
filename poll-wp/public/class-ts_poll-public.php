<?php
class ts_poll_public {
	private $plugin_name;
	private $version;
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}
	public function enqueue_styles() {
		wp_enqueue_style( TS_POLL_PLUGIN_PREFIX . "public", TS_POLL_PLUGIN_DIR_URL . 'public/css/ts_poll-public.css', array(), TS_POLL_VERSION, 'all' );
   		wp_enqueue_style( TS_POLL_PLUGIN_PREFIX .'fonts', TS_POLL_PLUGIN_DIR_URL . 'fonts/ts_poll-fonts.css', array(), TS_POLL_VERSION, 'all' );
	}
	public function enqueue_scripts() {
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
