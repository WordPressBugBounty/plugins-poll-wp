<?php
/**
 * All Gutenberg block functions.
 *
 * @link       TS Poll
 * @since      1.7.0
 *
 * @package    TS_Poll
 * @subpackage TS_Poll/admin
 */
class ts_poll_gutenberg_block {
	public function __construct() {
		if ( function_exists( 'register_block_type' ) ) {
			add_action( 'init', array( $this, 'ts_poll_register_block' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'ts_poll_block_editor_scripts' ) );
		}
	}
	public function ts_poll_register_block() {
		wp_register_script(
			TS_POLL_PLUGIN_PREFIX . 'gutenberg',
			plugin_dir_url( __FILE__ ) . 'js/block.js',
			array( 'jquery', 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
		);
		wp_register_style( TS_POLL_PLUGIN_PREFIX . 'block', plugin_dir_url( __FILE__ ) . 'css/block.css' );
		wp_enqueue_style( TS_POLL_PLUGIN_PREFIX . 'block' );
		register_block_type(
			'tspoll/poll-block',
			array(
				'editor_script'   => TS_POLL_PLUGIN_PREFIX . 'gutenberg',
				'render_callback' => array( $this, 'ts_poll_block_render_callback' ),
				'attributes'      => array(
					'tsp_id'  => array(
						'type' => 'string'
					),
					'preview' => array(
						'type'    => 'boolean',
						'default' => false
					)
				)
			)
		);
	}
	public function ts_poll_get_all() {
		global $wpdb;
		$poll_table = esc_sql( $wpdb->prefix . 'ts_poll_questions' );
		$sql        = 'SELECT `id`,`Question_Title` FROM ' . $poll_table;
		$ts_polls   = $wpdb->get_results( $sql, 'ARRAY_A' );
		return $ts_polls;
	}
	public function ts_poll_block_editor_scripts() {
		$ts_polls    = $this->ts_poll_get_all();
		$tspoll_list = array(
			array(
				'value' => 0,
				'label' => esc_html__( 'Select a poll', 'tspoll' )
			),
		);
		foreach ( $ts_polls as $tspoll ) {
			$tspoll_title = $tspoll['Question_Title'];
			if ( empty( $tspoll_title ) ) {
				$tspoll_title = '';
			}
			$tspoll_list[] = array(
				'value' => esc_attr( $tspoll['id'] ),
				'label' => esc_html( html_entity_decode( htmlspecialchars_decode( $tspoll_title ), ENT_QUOTES ) )
			);
		}
		$ts_polls_count = count( $ts_polls );
		wp_localize_script(
			TS_POLL_PLUGIN_PREFIX . 'gutenberg',
			'tsPollGutenberg',
			array(
				'tsp_ajax_url' => esc_url( admin_url( 'admin-ajax.php' ) ),
				'polls_count'        => $ts_polls_count,
				'tspoll_list'        => $tspoll_list,
				'ts_poll_logo'       => plugin_dir_url( __FILE__ ) . 'img/ts_poll_logo.png',
				'ts_poll_preview'    => plugin_dir_url( __FILE__ ) . 'img/ts-poll-preview.png',
				'tspoll_plugin_desc' => esc_html__( 'Poll plugin is a responsive and customizable for WordPress. Poll plugin will help you more easily create powerful poll, Image poll, video poll.', 'tspoll' )
			)
		);
	}
	public function ts_poll_block_render_callback( $attributes ) {
		$id = empty( $attributes['tsp_id'] ) ? 0 : $attributes['tsp_id'];
		if ( $id ) {
			$ts_get_polls = array_column( $this->ts_poll_get_all(), 'Question_Title', 'id' );
			if ( array_key_exists( absint( $id ), $ts_get_polls ) ) {
				if( strstr($_SERVER['REQUEST_URI'], 'poll-block') ) {
					\ob_start();
					echo do_shortcode( sprintf( '[TS_Poll id="%d" edit="%s"]', absint( $id ), "false" ) );
					$tsp_return = \ob_get_clean();
					return $tsp_return;
				}else{
					return  sprintf( '[TS_Poll id="%d"]', absint( $id ) );
				}
			} else {
				return sprintf( '<p>%s</p>', esc_html__( 'Selected poll is not defined.', 'tspoll' ) );
			}
		}
	}
}
