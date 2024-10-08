<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       TS Poll
 * @since      1.7.0
 *
 * @package    TS_Poll
 * @subpackage TS_Poll/includes
 */
/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.7.0
 * @package    TS_Poll
 * @subpackage TS_Poll/includes
 * @author     TS Poll <TS Poll>
 */
class TS_Poll {
	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.7.0
	 * @access   protected
	 * @var      ts_poll_loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;
	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.7.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;
	/**
	 * The current version of the plugin.
	 *
	 * @since    1.7.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;
	/**
	 * The question proporty query result.
	 *
	 * @since    1.7.0
	 * @access   protected
	 * @var      string    $version    The question proporty query result.
	 */
	public $ts_poll_question_query;
	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.7.0
	 */
	public $ts_poll_fonts_array;
	public function __construct() {
		if ( defined( 'TS_POLL_VERSION' ) ) {
			$this->version = TS_POLL_VERSION;
		} else {
			$this->version = '2.4.1';
		}
		$this->plugin_name = 'TS Poll';
		$this->load_dependencies();
		add_filter( 'ts_sanitize_string', array( $this, 'ts_sanitize_string' ) );
		$ts_poll_function = new ts_poll_function();
		add_filter( 'tsp_import_template', array( $ts_poll_function, 'tsp_import_template' ) );
		add_action( 'plugins_loaded', array( $this, 'tspoll_text_domain' ) );
		add_filter( 'ts_poll_check_coming', array( $this, 'ts_poll_coming' ) );
		add_filter( 'ts_poll_check_end', array( $this, 'ts_poll_end' ) );
		add_action( 'wp_ajax_tsp_vue_function', array( $this, 'tsp_vue_function' ) );
		add_action( 'wp_ajax_nopriv_tsp_vue_function', array( $this, 'tsp_vue_function' ) );
		add_shortcode( 'Total_Soft_Poll', array( $this, 'ts_poll_shortcode' ) );
		add_shortcode( 'TS_Poll', array( $this, 'ts_poll_shortcode' ) );
		$this->update_plugin();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		global $pagenow;
		if( in_array($pagenow,["post-new.php","edit.php","post.php"])){
			add_action( 'wp_enqueue_scripts', [$this,'ts_poll_activate_scripts'] );
			add_action( 'admin_enqueue_scripts', [$this,'ts_poll_activate_scripts'] );
		}
		new ts_poll_gutenberg_block();
		add_action('rest_api_init', [$this, 'ts_poll_rest_api_init']);
	}
	public function ts_poll_rest_api_init() {
		register_rest_route('ts-poll/v1', '/render', array(
            'methods' => 'POST',
            'callback' => array($this, 'ts_poll_render'),
            'permission_callback' => array($this, 'check_request_origin'),
            'args' => array(
                'poll_id' => array(
                    'required' => true,
                    'validate_callback' => function($param, $request, $key) {
                        return is_numeric($param);
                    }
                )
            )
        ));

		register_rest_route('ts-poll/v1', '/vote', array(
            'methods' => 'POST',
            'callback' => array($this, 'ts_poll_vote'),
            'permission_callback' => array($this, 'check_request_origin'),
            'args' => array(
                'poll_id' => array(
                    'required' => true,
                    'validate_callback' => function($param, $request, $key) {
                        return is_numeric($param);
                    }
                )
            )
        ));
	}
	
    public function ts_poll_render(WP_REST_Request $request) {
		global $wpdb;
        $ts_poll_id = sanitize_text_field($request->get_param('poll_id'));
		$ts_poll_question_query = apply_filters( "tsp_get_all_params", (string) $ts_poll_id, true , true,false);
		$tsp_votes_total = 0;
		remove_all_filters( 'embed_oembed_html', 10 );
		global $wp_embed;
		if (is_array($ts_poll_question_query["Answers"])) {
			$tsp_response_answers = $ts_poll_question_query["Answers"];
			$tsp_votes_total = array_sum( array_column(  $tsp_response_answers , 'Answer_Votes' ) );
			$tsp_votes_total_divider = $tsp_votes_total != 0 ? $tsp_votes_total : 1;
			foreach ( $tsp_response_answers as $tsp_response_key => $tsp_response_value ) {
				$tsp_response_answers[$tsp_response_key]['tsp_result_percent'] = $ts_poll_question_query['Question_Settings']['TotalSoft_Poll_Set_01'] == "true" ? round( $tsp_response_value["Answer_Votes"] * 100 / $tsp_votes_total_divider, 2 ) : 100;
				$tsp_response_answers[$tsp_response_key]['img_src'] = $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ? esc_url( plugins_url( 'public/img/tsp_no_img.jpg', __DIR__ ) ) : esc_url( $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] );
				if ($ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Video Poll" || $ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Video Without Button" || $ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Image Without Button") {
					$tsp_check_embed = "";
					if ($ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Image Without Button") {
						$tsp_check_embed = sprintf(
							'
							<div class="tsp_embed_popup_inner tsp_video_popup_embed">
								<img src="%1$s" alt="%2$s">
							</div>
							',
							$tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ? esc_url( plugin_dir_url( __DIR__ ) . '/public/img/tsp_no_img.jpg' ) : esc_url( $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] ),
							$tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ?  esc_html("No Image avaible" )  : html_entity_decode( htmlspecialchars_decode( $tsp_response_value['Answer_Title'] ), ENT_QUOTES )
						);
					} else {
						$tsp_check_embed = sprintf(
							'								
							<div class="tsp_embed_popup_inner tsp_video_popup_embed">
								%1$s
							</div>
							',
							$tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Vd"] == '' ? sprintf( '<img src="%s" alt="No Video avaible">', esc_url( plugin_dir_url( __DIR__ ) . '/public/img/tsp_no_video.png' ) ) : do_shortcode( $wp_embed->run_shortcode( '[embed]' . esc_url( $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Vd"] ) . '[/embed]' ) )
						);
					}
					$tsp_response_answers[$tsp_response_key]["embed"] = $tsp_check_embed;
				}
			}
			$ts_poll_question_settings = $ts_poll_question_query['Question_Settings'];
			$tspoll_mode = "live";
			if ( apply_filters( 'ts_poll_check_coming', $ts_poll_question_settings['TotalSoft_Poll_Set_02'] ) !== false) {
				$tspoll_mode = "coming";
			}elseif (apply_filters( 'ts_poll_check_end', $ts_poll_question_settings['TotalSoft_Poll_Set_03'] ) !== false) {
				$tspoll_mode = "end";
			}
			return new WP_REST_Response(array('success' => true, 'answers' => $tsp_response_answers,"total_votes" => $tsp_votes_total,"mode" => $tspoll_mode), 200);
		}
		return new WP_Error('not_found', esc_html__('TS Poll render failed.'), array('status' => 404));
    }

    public function ts_poll_vote(WP_REST_Request $request) {
		global $wpdb;
        $ts_poll_id = $request->get_param('poll_id');
        $ts_poll_checked_answers = $request->get_param('checked_answers');
		$ts_poll_checked_answers = explode( '|', $ts_poll_checked_answers);

		if ( is_int( $ts_poll_id ) && $ts_poll_id > 0 && is_array( $ts_poll_checked_answers ) && count( $ts_poll_checked_answers ) > 0 ) {
			$ts_poll_question = apply_filters( "tsp_get_all_params", $ts_poll_id, true , true, false);
			if ( $ts_poll_question !== false ) {
				$ts_poll_question_settings = $ts_poll_question['Question_Settings'];
				$ts_poll_question_style    = $ts_poll_question['Question_Style'];
				if ( apply_filters( 'ts_poll_check_coming', $ts_poll_question_settings['TotalSoft_Poll_Set_02'] ) === false && apply_filters( 'ts_poll_check_end', $ts_poll_question_settings['TotalSoft_Poll_Set_03'] ) === false ) {
					$ts_poll_question_answers = $ts_poll_question["Answers"];
					if ( is_array( $ts_poll_question_answers ) ) {
						if ( count( $ts_poll_checked_answers ) > 1 && array_key_exists( 'ts_poll_ch_cm', $ts_poll_question_style ) && $ts_poll_question_style['ts_poll_ch_cm'] == 'true' || count( $ts_poll_checked_answers ) == 1 ) {
							$ts_poll_answers_columned = array_column( $ts_poll_question_answers, 'Answer_Votes', 'id' );
							foreach ( $ts_poll_checked_answers as $value ) {
								if ( array_key_exists( (int) $value, $ts_poll_answers_columned ) ) {
									$wpdb->update( esc_sql( $wpdb->prefix . 'ts_poll_answers' ), array( 'Answer_Votes' => (int) $ts_poll_answers_columned[ $value ] + 1 ), array( 'id' => (int) $value ), array( '%d' ), array( '%d' ) );
									$ts_poll_answers_columned[ (int) $value ] = (int) $ts_poll_answers_columned[ (int) $value ] + 1;
								}
							}
							$ts_poll_total_votes = array_sum( $ts_poll_answers_columned );
							remove_all_filters( 'embed_oembed_html', 10 );
							global $wp_embed;
							foreach ($ts_poll_question_answers as $key => $value) {
								$ts_poll_answer_settings = $value['Answer_Param'];
								$ts_poll_question_answers[$key]["Answer_Votes"] = $ts_poll_answers_columned[ (int) $value["id"] ];
								$ts_poll_question_answers[$key]['tsp_result_percent'] = $ts_poll_question_settings['TotalSoft_Poll_Set_01'] == "true" ? round( $ts_poll_question_answers[$key]["Answer_Votes"] * 100 / $ts_poll_total_votes, 2 ) : 100;
								$ts_poll_question_answers[$key]['img_src'] = $ts_poll_answer_settings["TotalSoftPoll_Ans_Im"] != '' ? esc_url( $ts_poll_answer_settings["TotalSoftPoll_Ans_Im"] ) : esc_url( plugins_url( 'public/img/tsp_no_img.jpg', __DIR__ ) ) ;
								if ($ts_poll_question["Question_Param"]["TS_Poll_Q_Theme"] === "Video Poll" || $ts_poll_question["Question_Param"]["TS_Poll_Q_Theme"] === "Video Without Button" || $ts_poll_question["Question_Param"]["TS_Poll_Q_Theme"] === "Image Without Button") {
									$ts_poll_embed = "";
									if ($ts_poll_question["Question_Param"]["TS_Poll_Q_Theme"] === "Image Without Button") {
										$ts_poll_embed = sprintf(
											'
											<div class="tsp_embed_popup_inner tsp_video_popup_embed">
												<img src="%1$s" alt="%2$s">
											</div>
											',
											$value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ? esc_url( plugin_dir_url( __DIR__ ) . '/public/img/tsp_no_img.jpg' ) : esc_url( $value["Answer_Param"]["TotalSoftPoll_Ans_Im"] ),
											$value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ?  esc_html("No Image avaible" )  : html_entity_decode( htmlspecialchars_decode( $value['Answer_Title'] ), ENT_QUOTES )
										);
									} else {
										$ts_poll_embed = sprintf(
											'								
											<div class="tsp_embed_popup_inner tsp_video_popup_embed">
												%1$s
											</div>
											',
											$value["Answer_Param"]["TotalSoftPoll_Ans_Vd"] == '' ? sprintf( '<img src="%s" alt="No Video avaible">', esc_url( plugin_dir_url( __DIR__ ) . '/public/img/tsp_no_video.png' ) ) : do_shortcode( $wp_embed->run_shortcode( '[embed]' . esc_url( $value["Answer_Param"]["TotalSoftPoll_Ans_Vd"] ) . '[/embed]' ) )
										);
									}
									$ts_poll_question_answers[$key]["embed"] = $ts_poll_embed;
								}
							}
							return new WP_REST_Response(array('success' => true, 'answers' => $ts_poll_question_answers), 200);
						}
					}
				}
			}
		}
		return new WP_Error('rest_forbidden', esc_html__('TS Poll vote failed.'), array('status' => 403));
    }
	public function check_request_origin(WP_REST_Request $request) {
        if (!isset($_SERVER['HTTP_X_WP_NONCE']) || !wp_verify_nonce($_SERVER['HTTP_X_WP_NONCE'], 'wp_rest')) {
            return new WP_Error('rest_forbidden', esc_html__('You cannot access this resource.'), array('status' => 403));
        }
        return true;
    }
	public function ts_sanitize_string( $string ){
		$string = htmlspecialchars_decode( $string, ENT_QUOTES );
		$string = strip_tags( $string );
		return $string;
	}
	public function ts_poll_activate_scripts() {
		wp_enqueue_style( TS_POLL_PLUGIN_NAME.'_public_css', TS_POLL_PLUGIN_DIR_URL . 'public/css/ts_poll-public.css', array(), TS_POLL_VERSION, 'all' );
		wp_enqueue_style( 'ts_poll_fonts', TS_POLL_PLUGIN_DIR_URL . 'fonts/ts_poll-fonts.css', array(), TS_POLL_VERSION, 'all' );
		wp_enqueue_script( "ts_poll_vue_js", TS_POLL_PLUGIN_DIR_URL . 'public/js/vue.js', array( ), TS_POLL_VERSION , false );
		wp_enqueue_script( TS_POLL_PLUGIN_NAME, TS_POLL_PLUGIN_DIR_URL . 'public/js/ts_poll-public.js', array( 'jquery','ts_poll_vue_js' ), TS_POLL_VERSION, false );
	}
	public function tspoll_text_domain() {
		load_plugin_textdomain( 'tspoll', false, TS_POLL_PLUGIN_DIR . '/languages/' );
	}

	public function tsp_vue_function() {
		global $wpdb;
		$tsp_question_id = sanitize_text_field( $_POST['tsp_id'] );
		$tsp_changed_id  = sanitize_text_field( $_POST['tsp_change_id'] );
		if ( ! isset( $_POST['tsp_vote_nonce'] ) || $_POST['tsp_vote_nonce'] == '' || ! wp_verify_nonce( $_POST['tsp_vote_nonce'], 'tsp_vote_nonce_' . $tsp_changed_id ) ) {
			wp_send_json_error( 'Invalid nonce' );
		}
		$ts_poll_question_query = apply_filters( "tsp_get_all_params", (string) $tsp_question_id, true , true,false);
		$tsp_votes_total = 0;
		remove_all_filters( 'embed_oembed_html', 10 );
		global $wp_embed;
		if (is_array($ts_poll_question_query["Answers"])) {
			$tsp_response_answers = $ts_poll_question_query["Answers"];
			$tsp_votes_total = array_sum( array_column(  $tsp_response_answers , 'Answer_Votes' ) );
			$tsp_votes_total_divider = $tsp_votes_total != 0 ? $tsp_votes_total : 1;
			foreach ( $tsp_response_answers as $tsp_response_key => $tsp_response_value ) {
				$tsp_response_answers[$tsp_response_key]['tsp_result_percent'] = $ts_poll_question_query['Question_Settings']['TotalSoft_Poll_Set_01'] == "true" ? round( $tsp_response_value["Answer_Votes"] * 100 / $tsp_votes_total_divider, 2 ) : 100;
				$tsp_response_answers[$tsp_response_key]['img_src'] = $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ? esc_url( plugins_url( 'public/img/tsp_no_img.jpg', __DIR__ ) ) : esc_url( $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] );
				if ($ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Video Poll" || $ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Video Without Button" || $ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Image Without Button") {
					$tsp_check_embed = "";
					if ($ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Image Without Button") {
						$tsp_check_embed = sprintf(
							'
							<div class="tsp_embed_popup_inner tsp_video_popup_embed">
								<img src="%1$s" alt="%2$s">
							</div>
							',
							$tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ? esc_url( plugin_dir_url( __DIR__ ) . '/public/img/tsp_no_img.jpg' ) : esc_url( $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] ),
							$tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ?  esc_html("No Image avaible" )  : html_entity_decode( htmlspecialchars_decode( $tsp_response_value['Answer_Title'] ), ENT_QUOTES )
						);
					} else {
						$tsp_check_embed = sprintf(
							'								
							<div class="tsp_embed_popup_inner tsp_video_popup_embed">
								%1$s
							</div>
							',
							$tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Vd"] == '' ? sprintf( '<img src="%s" alt="No Video avaible">', esc_url( plugin_dir_url( __DIR__ ) . '/public/img/tsp_no_video.png' ) ) : do_shortcode( $wp_embed->run_shortcode( '[embed]' . esc_url( $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Vd"] ) . '[/embed]' ) )
						);
					}
					$tsp_response_answers[$tsp_response_key]["embed"] = $tsp_check_embed;
				}
			}
			$ts_poll_question_settings = $ts_poll_question_query['Question_Settings'];
			$tspoll_mode = "live";
			if ( apply_filters( 'ts_poll_check_coming', $ts_poll_question_settings['TotalSoft_Poll_Set_02'] ) !== false) {
				$tspoll_mode = "coming";
			}elseif (apply_filters( 'ts_poll_check_end', $ts_poll_question_settings['TotalSoft_Poll_Set_03'] ) !== false) {
				$tspoll_mode = "end";
			}
			$tsp_response_arr = [
				"answers" => $tsp_response_answers,
				"total_votes" => $tsp_votes_total,
				"mode" => $tspoll_mode
			];
			wp_send_json_success($tsp_response_arr);
		}else {
			wp_send_json_error();
		}
	}
	private function update_plugin() {
		global $wpdb;
		$tsp_answers_table           = esc_sql( $wpdb->prefix . 'ts_poll_answers' );
		$tsp_questions_table         = esc_sql( $wpdb->prefix . 'ts_poll_questions' );
		$tsp_answers_table_check     = $wpdb->get_results( $wpdb->prepare( 'SELECT  table_name FROM information_schema.TABLES WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s', esc_sql( $wpdb->dbname ), $tsp_answers_table ) );
		$tsp_questions_table_check   = $wpdb->get_results( $wpdb->prepare( 'SELECT  table_name FROM information_schema.TABLES WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s', esc_sql( $wpdb->dbname ), $tsp_questions_table ) );
		if ( empty( $tsp_answers_table_check ) || empty( $tsp_questions_table_check ) ) {
			$tsp_questions_table_create = 'CREATE TABLE IF NOT EXISTS ' . $tsp_questions_table . '( id INTEGER(10) UNSIGNED AUTO_INCREMENT, Question_Title VARCHAR(255) DEFAULT "", Question_Param longtext NOT NULL, Question_Style longtext NOT NULL, Question_Settings longtext NOT NULL,Answers_Sort longtext NOT NULL,created_at VARCHAR(50) NOT NULL,updated_at VARCHAR(50) NOT NULL, PRIMARY KEY (id))';
			$tsp_answers_table_create   = 'CREATE TABLE IF NOT EXISTS ' . $tsp_answers_table . '( id INTEGER(10) UNSIGNED AUTO_INCREMENT,Question_id int(11) NOT NULL, Answer_Title VARCHAR(255) NOT NULL, Answer_Param longtext NOT NULL, Answer_Votes int(11) NOT NULL, PRIMARY KEY (id))';
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $tsp_questions_table_create );
			dbDelta( $tsp_answers_table_create );
			$tsp_questions_table_convert = 'ALTER TABLE ' . $tsp_questions_table . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
			$tsp_answers_table_convert   = 'ALTER TABLE ' . $tsp_answers_table . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
			$wpdb->query( $tsp_questions_table_convert );
			$wpdb->query( $tsp_answers_table_convert );
			$tsp_old_table_check = $wpdb->get_results( $wpdb->prepare( 'SELECT  table_name FROM information_schema.TABLES WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s', esc_sql( $wpdb->dbname ), esc_sql( $wpdb->prefix . 'totalsoft_poll_manager' ) ) );
			if ( ! empty( $tsp_old_table_check ) ) {
				$tsp_sql               = 'SELECT * FROM ' . esc_sql( $wpdb->prefix . 'totalsoft_poll_manager' );
				$ts_poll_all_questions = $wpdb->get_results( $tsp_sql, ARRAY_A );
				if ( ! empty( $ts_poll_all_questions ) ) {
					for ( $i = 0; $i < count( $ts_poll_all_questions ); $i++ ) {
						$tsp_old_question = $tsp_old_question_params = $tsp_old_question_styles = $tsp_old_question_settings = $tsp_old_question_answers_sort = array();
						$tsp_old_question = array(
							'id'                    => $ts_poll_all_questions[ $i ]['id'],
							'Question_Title'        => $ts_poll_all_questions[ $i ]['TotalSoftPoll_Question'],
							'tsp_question_theme_id' => $ts_poll_all_questions[ $i ]['TotalSoftPoll_Theme'],
							'tsp_answers_count'     => $ts_poll_all_questions[ $i ]['TotalSoftPoll_Ans_C']
						);
						$tsp_get_params   = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . esc_sql( $wpdb->prefix . 'totalsoft_poll_quest_im' ) . ' WHERE Question_ID = %d', (int) $tsp_old_question['id'] ), ARRAY_A );
						if ( ! empty( $tsp_get_params ) ) {
							$tsp_old_question_params['TotalSoftPoll_Q_Vd'] = $tsp_get_params['TotalSoftPoll_Q_Vd'];
							$tsp_old_question_params['TotalSoftPoll_Q_Im'] = $tsp_get_params['TotalSoftPoll_Q_Im'];
						} else {
							$tsp_old_question_params['TotalSoftPoll_Q_Vd'] = '';
							$tsp_old_question_params['TotalSoftPoll_Q_Im'] = '';
							$tsp_get_params['TotalSoftPoll_Q_01']          = '';
						}
						if ( $tsp_get_params['TotalSoftPoll_Q_01'] != '' ) {
							$tsp_get_settings = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . esc_sql( $wpdb->prefix . 'totalsoft_poll_setting' ) . ' WHERE id = %d', (int) $tsp_get_params['TotalSoftPoll_Q_01'] ), ARRAY_A );
							if ( ! empty( $tsp_get_settings ) ) {
								$tsp_old_question_settings = array(
									'TotalSoft_Poll_Set_01' => $tsp_get_settings['TotalSoft_Poll_Set_01'],
									'TotalSoft_Poll_Set_02' => $tsp_get_settings['TotalSoft_Poll_Set_02'],
									'TotalSoft_Poll_Set_03' => $tsp_get_settings['TotalSoft_Poll_Set_03'],
									'TotalSoft_Poll_Set_04' => $tsp_get_settings['TotalSoft_Poll_Set_04'],
									'TotalSoft_Poll_Set_05' => $tsp_get_settings['TotalSoft_Poll_Set_05'],
									'TotalSoft_Poll_Set_06' => $tsp_get_settings['TotalSoft_Poll_Set_06'],
									'TotalSoft_Poll_Set_07' => $tsp_get_settings['TotalSoft_Poll_Set_07'],
									'TotalSoft_Poll_Set_08' => $tsp_get_settings['TotalSoft_Poll_Set_08'],
									'TotalSoft_Poll_Set_09' => $tsp_get_settings['TotalSoft_Poll_Set_09'],
									'TotalSoft_Poll_Set_10' => $tsp_get_settings['TotalSoft_Poll_Set_10'],
									'TotalSoft_Poll_Set_11' => $tsp_get_settings['TotalSoft_Poll_Set_11']
								);
							} else {
								$tsp_old_question_settings = array(
									'TotalSoft_Poll_Set_01' => 'true',
									'TotalSoft_Poll_Set_02' => '',
									'TotalSoft_Poll_Set_03' => '',
									'TotalSoft_Poll_Set_04' => 'Coming Soon',
									'TotalSoft_Poll_Set_05' => 'Thank You !',
									'TotalSoft_Poll_Set_06' => 'rgba(209,209,209,0.79)',
									'TotalSoft_Poll_Set_07' => '#000000',
									'TotalSoft_Poll_Set_08' => '32',
									'TotalSoft_Poll_Set_09' => 'Gabriola',
									'TotalSoft_Poll_Set_10' => 'false',
									'TotalSoft_Poll_Set_11' => 'ipaddress'
								);
							}
						} else {
							$tsp_old_question_settings = array(
								'TotalSoft_Poll_Set_01' => 'true',
								'TotalSoft_Poll_Set_02' => '',
								'TotalSoft_Poll_Set_03' => '',
								'TotalSoft_Poll_Set_04' => 'Coming Soon',
								'TotalSoft_Poll_Set_05' => 'Thank You !',
								'TotalSoft_Poll_Set_06' => 'rgba(209,209,209,0.79)',
								'TotalSoft_Poll_Set_07' => '#000000',
								'TotalSoft_Poll_Set_08' => '32',
								'TotalSoft_Poll_Set_09' => 'Gabriola',
								'TotalSoft_Poll_Set_10' => 'false',
								'TotalSoft_Poll_Set_11' => 'ipaddress'
							);
						}
						$tsp_get_theme_type = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . esc_sql( $wpdb->prefix . 'totalsoft_poll_dbt' ) . ' WHERE id = %d', (int) $tsp_old_question['tsp_question_theme_id'] ), ARRAY_A );
						if ( ! empty( $tsp_get_theme_type ) ) {
							$tsp_themes_tables                          = array(
								'Standart Poll'           => array( 'totalsoft_poll_stpoll', 'totalsoft_poll_stpoll_1', 'totalsoft_poll_1' ),
								'Standard Poll'           => array( 'totalsoft_poll_stpoll', 'totalsoft_poll_stpoll_1', 'totalsoft_poll_1' ),
								'Image Poll'              => array( 'totalsoft_poll_impoll', 'totalsoft_poll_impoll_1', 'totalsoft_poll_2' ),
								'Video Poll'              => array( 'totalsoft_poll_impoll', 'totalsoft_poll_impoll_1', 'totalsoft_poll_2' ),
								'Standard Without Button' => array( 'totalsoft_poll_stwibu', 'totalsoft_poll_stwibu_1', 'totalsoft_poll_3' ),
								'Standart Without Button' => array( 'totalsoft_poll_stwibu', 'totalsoft_poll_stwibu_1', 'totalsoft_poll_3' ),
								'Image Without Button'    => array( 'totalsoft_poll_imwibu', 'totalsoft_poll_imwibu_1', 'totalsoft_poll_4' ),
								'Video Without Button'    => array( 'totalsoft_poll_imwibu', 'totalsoft_poll_imwibu_1', 'totalsoft_poll_4' ),
								'Image in Question'       => array( 'totalsoft_poll_iminqu', 'totalsoft_poll_iminqu_1', 'totalsoft_poll_5' ),
								'Video in Question'       => array( 'totalsoft_poll_iminqu', 'totalsoft_poll_iminqu_1', 'totalsoft_poll_5' )
							);
							$tsp_old_question_params['TS_Poll_Q_Theme'] = $tsp_get_theme_type['TotalSoft_Poll_TType'];
							$tsp_theme_style_select                     = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . esc_sql( $wpdb->prefix . $tsp_themes_tables[ $tsp_get_theme_type['TotalSoft_Poll_TType'] ][0] ) . ' WHERE TotalSoft_Poll_TID = %d', (int) $tsp_old_question['tsp_question_theme_id'] ), ARRAY_A );
							$tsp_theme_style_select_part                = $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . esc_sql( $wpdb->prefix . $tsp_themes_tables[ $tsp_get_theme_type['TotalSoft_Poll_TType'] ][1] ) . ' WHERE TotalSoft_Poll_TID = %d', (int) $tsp_old_question['tsp_question_theme_id'] ), ARRAY_A );
							if ( empty( $tsp_theme_style_select ) || empty( $tsp_theme_style_select_part ) ) {
								$tsp_theme_key           = str_replace( ' ', '_', strtolower( $tsp_get_theme_type['TotalSoft_Poll_TType'] ) );
								$tsp_old_question_styles = apply_filters("tsp_get_theme_params", $tsp_theme_key);
							} else {
								$tsp_theme_select = array_merge( $tsp_theme_style_select, $tsp_theme_style_select_part );
								$tsp_remove_props = array( 'id', 'TotalSoft_Poll_TID', 'TotalSoft_Poll_TTitle', 'TotalSoft_Poll_TType' );
								$tsp_theme_select = array_diff_key( $tsp_theme_select, array_flip( $tsp_remove_props ) );
								$tsp_remove_new   = array();
								if ( $tsp_get_theme_type['TotalSoft_Poll_TType'] == 'Image in Question' || $tsp_get_theme_type['TotalSoft_Poll_TType'] == 'Image Without Button' ) {
									if ( $tsp_get_theme_type['TotalSoft_Poll_TType'] == 'Image in Question' && array_key_exists( 'TotalSoft_Poll_5_I_H', $tsp_theme_select ) ) {
										$tsp_theme_select['TotalSoft_Poll_5_I_H'] = floor( (int) $tsp_theme_select['TotalSoft_Poll_5_I_H'] / 5.5 );
									} elseif ( $tsp_get_theme_type['TotalSoft_Poll_TType'] == 'Image Without Button' && array_key_exists( 'TotalSoft_Poll_4_I_H', $tsp_theme_select ) ) {
										$tsp_theme_select['TotalSoft_Poll_4_I_H'] = floor( (int) $tsp_theme_select['TotalSoft_Poll_4_I_H'] / 4 );
									}
								}
								foreach ( $tsp_theme_select as $key => $value ) {
									$newkey                      = str_replace( $tsp_themes_tables[ $tsp_get_theme_type['TotalSoft_Poll_TType'] ][2], 'ts_poll', strtolower( $key ) );
									$tsp_remove_new[]            = $key;
									$tsp_theme_select[ $newkey ] = $value;
								}
								$tsp_old_question_styles = array_diff_key( $tsp_theme_select, array_flip( $tsp_remove_new ) );
							}
						} else {
							$tsp_old_question_params['TS_Poll_Q_Theme'] = 'Standard Poll';
							$tsp_old_question_styles = apply_filters("tsp_get_theme_params", 'standard_poll');
						}
						$tsp_get_question_answers = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . esc_sql( $wpdb->prefix . 'totalsoft_poll_answers' ) . ' WHERE Question_ID = %d', (int) $tsp_old_question['id'] ), ARRAY_A );
						if ( empty( $tsp_get_question_answers ) ) {
							continue;
						} else {
							$tsp_get_results = $wpdb->get_results( $wpdb->prepare( 'SELECT `Poll_A_Votes`,`Poll_A_ID` FROM ' . esc_sql( $wpdb->prefix . 'totalsoft_poll_results' ) . ' WHERE Poll_ID = %d', (int) $tsp_old_question['id'] ), ARRAY_A );
							$tsp_get_results = array_column( $tsp_get_results, 'Poll_A_Votes', 'Poll_A_ID' );
							for ( $a = 0; $a < count( $tsp_get_question_answers ); $a++ ) {
								$tsp_answer_param = array(
									'TotalSoftPoll_Ans_Im' => $tsp_get_question_answers[ $a ]['TotalSoftPoll_Ans_Im'],
									'TotalSoftPoll_Ans_Vd' => $tsp_get_question_answers[ $a ]['TotalSoftPoll_Ans_Vd'],
									'TotalSoftPoll_Ans_Cl' => $tsp_get_question_answers[ $a ]['TotalSoftPoll_Ans_Cl']
								);
								$wpdb->insert(
									$tsp_answers_table,
									array(
										'id'           => '',
										'Question_id'  => (int) $tsp_old_question['id'],
										'Answer_Title' => $tsp_get_question_answers[ $a ]['TotalSoftPoll_Ans'],
										'Answer_Param' => json_encode( $tsp_answer_param ),
										'Answer_Votes' => (int) $tsp_get_results[ $tsp_get_question_answers[ $a ]['id'] ]
									),
									array( '%d', '%d', '%s', '%s', '%d' )
								);
								$tsp_old_question_answers_sort[] = $wpdb->insert_id;
							}
						}
						$wpdb->insert(
							$tsp_questions_table,
							array(
								'id'                => (int) $tsp_old_question['id'],
								'Question_Title'    => $tsp_old_question['Question_Title'],
								'Question_Param'    => json_encode( $tsp_old_question_params ),
								'Question_Style'    => json_encode( $tsp_old_question_styles ),
								'Question_Settings' => json_encode( $tsp_old_question_settings ),
								'Answers_Sort'      => implode( ',', $tsp_old_question_answers_sort ),
								'created_at'        => date( 'd.m.Y h:i:sa' ),
								'updated_at'        => date( 'd.m.Y h:i:sa' )
							),
							array( '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
						);
					}
				}
			}
		}
	}
	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - ts_poll_loader. Orchestrates the hooks of the plugin.
	 * - ts_poll_admin. Defines all hooks for the admin area.
	 * - ts_poll_public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.7.0
	 * @access   private
	 */
	private function load_dependencies() {
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ts_poll-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-ts_poll-function.php';
		/**
		 * The class responsible for defining all actions that occur in the admin dashboard area.
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ts_poll_dashboard.php';
		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ts_poll-admin.php';
		/**
		* The class responsible for defining all actions that occur in the admin area.
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ts_poll_list.php';
		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		/**
		* The class responsible for defining all actions that occur in the admin area.
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ts_poll_block.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-ts_poll-widget.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-ts_poll-public.php';
		$this->loader = new ts_poll_loader();
	}
	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.7.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		$plugin_admin = new ts_poll_admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'ts_poll_admin_menu', 9 );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'ts_poll_admin_sub', 90 );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'ts_poll_builder_sub', 100 );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'ts_poll_pro_sub', 110 );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'ts_poll_addons_sub', 120 );
	}
	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.7.0
	 * @access   private
	 */
	private function define_public_hooks() {
		function ts_poll_register_widget() {
			register_widget( 'ts_poll_widget' );
		}
		$plugin_public = new ts_poll_public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		add_action( 'widgets_init', 'ts_poll_register_widget' );
	}
	public function ts_poll_coming( $ts_poll_check_date ) {
		if ( strpos( $ts_poll_check_date, '-' ) !== false ) {
			list($ts_poll_cs_year,$ts_poll_cs_month,$ts_poll_cs_day) = explode( '-', $ts_poll_check_date );
			if ( (int) date( 'Y' ) < (int) $ts_poll_cs_year ) {
				return true;
			} elseif ( (int) date( 'Y' ) == (int) $ts_poll_cs_year ) {
				if ( (int) date( 'm' ) < (int) $ts_poll_cs_month ) {
					return true;
				} elseif ( (int) date( 'm' ) == (int) $ts_poll_cs_month ) {
					if ( (int) date( 'd' ) < (int) $ts_poll_cs_day ) {
						return true;
					}
				}
			}
		}
		return false;
	}
	public function ts_poll_end( $ts_poll_check_end_date ) {
		if ( strpos( $ts_poll_check_end_date, '-' ) !== false ) {
			list($ts_poll_end_year,$ts_poll_end_month,$ts_poll_end_day) = explode( '-', $ts_poll_check_end_date );
			if ( (int) date( 'Y' ) > (int) $ts_poll_end_year ) {
				return true;
			} elseif ( (int) date( 'Y' ) == (int) $ts_poll_end_year ) {
				if ( (int) date( 'm' ) > (int) $ts_poll_end_month ) {
					return true;
				} elseif ( (int) date( 'm' ) == (int) $ts_poll_end_month ) {
					if ( (int) date( 'd' ) > (int) $ts_poll_end_day ) {
						return true;
					}
				}
			}
		}
		return false;
	}
	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.7.0
	 */
	public function run() {
		$this->loader->run();
	}
	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.7.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.7.0
	 * @return    ts_poll_loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}
	/**
	 * Primary function to render a poll on the frontend.
	 *
	 * @since 1.7.0
	 *
	 * @param int $id Poll ID.
	 */
	private function ts_poll_content( $total_soft_poll, $ts_poll_edit ) {
		wp_enqueue_script( "ts_poll_vue_js", TS_POLL_PLUGIN_DIR_URL . 'public/js/vue.js', array( ), $this->version , false );
		wp_enqueue_script( $this->plugin_name, TS_POLL_PLUGIN_DIR_URL . 'public/js/ts_poll-public.js', array( 'jquery','ts_poll_vue_js' ), $this->version, false );
		wp_localize_script($this->plugin_name, 'tsPollData', array(
			'root_url' => esc_url_raw(rest_url()),
			'nonce'    => wp_create_nonce('wp_rest')
		));
		wp_enqueue_style( $this->plugin_name.'_public_css', TS_POLL_PLUGIN_DIR_URL . 'public/css/ts_poll-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'ts_poll_fonts', TS_POLL_PLUGIN_DIR_URL . 'fonts/ts_poll-fonts.css', array(), $this->version, 'all' );
		$tsp_themes = array(
			'standart_poll'           => 'Standart Poll',
			'standard_poll'           => 'Standard Poll',
			'image_poll'              => 'Image Poll',
			'video_poll'              => 'Video Poll',
			'standart_without_button' => 'Standart Without Button',
			'standard_without_button' => 'Standard Without Button',
			'image_without_button'    => 'Image Without Button',
			'video_without_button'    => 'Video Without Button',
			'image_in_question'       => 'Image in Question',
			'video_in_question'       => 'Video in Question'
		);
		global $wpdb;
		$ts_poll_question_table     = esc_url( $wpdb->prefix . 'ts_poll_questions' );
		$ts_poll_answers_table      = esc_url( $wpdb->prefix . 'ts_poll_answers' );
		$ts_poll_time_bool = $ts_poll_vote_bool = $ts_poll_can_vote = false;
		$t_s_poll_answers_values    = $ts_poll_answers_query = $ts_poll_answers_count = $tspoll_question_styles = $ts_poll_question_params = $t_s_poll_question_settings =  $ts_poll_old_standard = '';
		$total_soft_poll_res_count  = 1;
		$total_soft_poll_res_count1 = 0;
		$ts_poll_answers_columned   = $ts_poll_answers_order = $ts_poll_question_query = $ts_poll_colors_array = array();
		remove_all_filters( 'embed_oembed_html', 10 );
		if ( $ts_poll_edit != 'true' ) {
			wp_enqueue_script( $this->plugin_name . 'ResizeSensor', plugin_dir_url( __DIR__ ) . 'public/js/ResizeSensor.js', array(), time(), false );
			wp_enqueue_script( $this->plugin_name . 'ElementQueries', plugin_dir_url( __DIR__ ) . 'public/js/ElementQueries.js', array(), time(), false );
		}
		if ( is_numeric( $total_soft_poll ) && is_int( (int) $total_soft_poll ) && (int) $total_soft_poll > 0 || array_key_exists( $total_soft_poll, $tsp_themes ) ) {
			if ( is_numeric( $total_soft_poll ) && is_int( (int) $total_soft_poll ) && (int) $total_soft_poll > 0 ) {
				$ts_poll_question_query = apply_filters( "tsp_get_all_params", (string) $total_soft_poll, true, true, false);
				if ($ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Video Poll" || $ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Video Without Button" || $ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Image Without Button") {
					global $wp_embed;
					foreach ($ts_poll_question_query['Answers'] as $tsp_response_key => $tsp_response_value) {
						$tsp_check_embed = "";
						if ($ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Image Without Button") {
							$tsp_check_embed = sprintf(
								'
								<div class="tsp_embed_popup_inner tsp_video_popup_embed">
									<img src="%1$s" alt="%2$s">
								</div>
								',
								$tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ? esc_url( plugin_dir_url( __DIR__ ) . '/public/img/tsp_no_img.jpg' ) : esc_url( $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] ),
								$tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ?  esc_html("No Image avaible" )  : html_entity_decode( htmlspecialchars_decode( $tsp_response_value['Answer_Title'] ), ENT_QUOTES )
							);
						} else {
							$tsp_check_embed = sprintf(
								'								
								<div class="tsp_embed_popup_inner tsp_video_popup_embed">
									%1$s
								</div>
								',
								$tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Vd"] == '' ? sprintf( '<img src="%s" alt="No Video avaible">', esc_url( plugin_dir_url( __DIR__ ) . '/public/img/tsp_no_video.png' ) ) : do_shortcode( $wp_embed->run_shortcode( '[embed]' . esc_url( $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Vd"] ) . '[/embed]' ) )
							);
						}
						$ts_poll_question_query['Answers'][$tsp_response_key]["embed"] = $tsp_check_embed;
					}
				}
			} elseif ( array_key_exists( $total_soft_poll, $tsp_themes ) ) {
				if ( $ts_poll_edit !== 'true' ) { return false; }
				$ts_poll_question_query = apply_filters( "tsp_get_all_params", (string) $total_soft_poll, false, true, false);
			} else {
				return false;
			}
			if ($ts_poll_question_query === false) { return false; }
			$t_s_poll_answers_values = $ts_poll_question_query['Answers'];
			$ts_poll_answers_count      = $ts_poll_question_query['answers_count'];
			$tspoll_question_styles     = $ts_poll_question_query['Question_Style'];
			$ts_poll_question_params    = $ts_poll_question_query['Question_Param'];
			$t_s_poll_question_settings = $ts_poll_question_query['Question_Settings'];
			$total_soft_poll_res_count = array_sum( array_column(  $t_s_poll_answers_values , 'Answer_Votes' ) );
			if ( $total_soft_poll_res_count == 0 ) {
				$total_soft_poll_res_count  = 1;
				$total_soft_poll_res_count1 = 0;
			} else {
				$total_soft_poll_res_count1 = $total_soft_poll_res_count;
			}
		} else {
			return false;
		}
		if (is_array($ts_poll_question_query)) {
			$ts_poll_base_id = $ts_poll_generated_css = '';
			if ( $ts_poll_edit === 'true' || $ts_poll_edit === 'false') {
				$ts_poll_base_id            = $total_soft_poll;
			}else {
				$ts_poll_base_id            = $total_soft_poll;
				$total_soft_poll            = rand( 100000, 999999 );
				$tspoll_fontfamily_swap_arr = array(
					'ts_poll_q_ff',
					'ts_poll_boxsh',
					'ts_poll_vb_ff',
					'ts_poll_rb_ff',
					'TotalSoft_Poll_Set_09'
				);
				foreach ( $tspoll_fontfamily_swap_arr as $key => $value ) {
					if ( isset( $tspoll_question_styles[$value] ) || isset( $t_s_poll_question_settings[$value] ) ) {
						if ( isset( $tspoll_question_styles[$value] ) ) {
							$ts_poll_generated_css .= apply_filters("tsp_get_font_face", $tspoll_question_styles[$value]);
						} else {
							$ts_poll_generated_css .= apply_filters("tsp_get_font_face", $t_s_poll_question_settings[$value]);
						}
					}
				}
			}
			wp_enqueue_style( "ts_poll_special_{$total_soft_poll}", plugin_dir_url( __DIR__ ) . 'public/css/ts_poll-content-special.css', array(), time(), 'all' );
			include plugin_dir_path( dirname( __FILE__ ) ) . 'public/css/tsp-form-css.php';
			$ts_poll_popup_standard = false;
			$ts_poll_popup_standard_html = "";
			echo sprintf(
				'
				<form method="POST" id="ts_poll_form_%1$s" class="ts_poll_form ts_poll_form_%1$s" data-tsp-pos="%2$s" v-bind:data-tsp-mode="ts_poll_mode">
					<div class="ts_load_vue_poll ts_load_vue_poll_%1$s"  v-bind:class="{tsp_not_active_section : tsp_active_section}">
						<div class="ts_load_poll_logo">
							<div class="tsp_load_circle"></div>
						</div>
						<span class="tsp_load_span">Loading poll ...</span>
					</div>
					<div id="ts_poll_section_%1$s"  class="ts_poll_section_%1$s ts_poll_section" data-tsp-box="%3$s" v-bind:class="{tsp_active_section : tsp_active_section}" > 
				',
				(string) esc_attr( $total_soft_poll ),
				esc_attr( $tspoll_question_styles["ts_poll_pos"] ),
				$tspoll_question_styles["ts_poll_boxsh_show"] != '' || $tspoll_question_styles["ts_poll_boxsh_show"] != 'false' ? esc_attr( $tspoll_question_styles["ts_poll_boxsh_type"] ) : ''
			);
			include plugin_dir_path( dirname( __FILE__ ) ) . 'public/css/tsp-soon-css.php';
			echo sprintf(
				'
				<span class="%1$s">
					<span class="%2$s">
					  	%3$s
					</span>
				</span>
				',
				'ts_poll_cs_' . esc_html( $total_soft_poll ),
				'ts_poll_cs_text_' . esc_html( $total_soft_poll ),
				esc_html( html_entity_decode( htmlspecialchars_decode( $t_s_poll_question_settings["TotalSoft_Poll_Set_04"] ), ENT_QUOTES ) )
			);
			include plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/tsp-header-display.php';
			if ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standart Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standard Poll' ) {
				if ( array_key_exists("ts_poll_p_shpop", $tspoll_question_styles ) ) {
					$ts_poll_old_standard = 'true';
					include TS_POLL_PLUGIN_ENV . 'public/theme_partials/tsp-standard.php';
				} else {
					include TS_POLL_PLUGIN_ENV . 'public/theme_partials/tsp-standard-wb.php';
				}
			} elseif ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ) {
				include TS_POLL_PLUGIN_ENV . 'public/theme_partials/tsp-image-video.php';
			} elseif ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standart Without Button' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standard Without Button' ) {
				include TS_POLL_PLUGIN_ENV . 'public/theme_partials/tsp-standard-wb.php';
			} elseif ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Without Button' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Without Button' ) {
				include TS_POLL_PLUGIN_ENV . 'public/theme_partials/tsp-image-video-wb.php';
			} elseif ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image in Question' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video in Question' ) {
				include TS_POLL_PLUGIN_ENV . 'public/theme_partials/tsp-image-video-in.php';
			}
			include plugin_dir_path( dirname( __FILE__ ) ) . 'public/css/tsp-content-css.php';
			$tsp_special_colors =  $tsp_special_colors_css = '';
			foreach ( $ts_poll_colors_array as $key => $value ) :
				$tsp_special_colors .= sprintf(
					'
					--tsp_a_c_%s-%s : %s;',
					esc_html( $total_soft_poll ),
					esc_html( $key ),
					esc_attr( $value )
				);
				switch ( $ts_poll_question_params["TS_Poll_Q_Theme"] ) {
					case 'Standart Poll':
					case 'Standard Poll':
						if ( $ts_poll_old_standard === 'true' ) {
							$tsp_special_colors_css .= sprintf(
								'
								main.ts_poll_r_main_%1$s[data-tsp-bool="false"] > .ts_poll_answer_result[data-tsp-id="%2$s"] > .ts_poll_answer_result_label > .ts_poll_answer_percent_line{
									background-color: var(--tsp_a_c_%1$s-%2$s);
								}
								main.ts_poll_main_%1$s[data-tsp-bool="false"] > .ts_poll_answer[data-tsp-id="%2$s"] > .ts_poll_answer_label {
									color: var(--tsp_a_c_%1$s-%2$s);
								}
								',
								esc_html( $total_soft_poll ),
								esc_html( $key )
							);
						} else {
							$tsp_special_colors_css .= sprintf(
								'
								main.ts_poll_main_%1$s[data-tsp-color="Background"] > .ts_poll_answer[data-tsp-id="%2$s"]{
									background-color: var(--tsp_a_c_%1$s-%2$s);
								}
								main.ts_poll_main_%1$s[data-tsp-color="Color"] > .ts_poll_answer[data-tsp-id="%2$s"]   .ts_poll_answer_label{
									color: var(--tsp_a_c_%1$s-%2$s);
								}
								main.ts_poll_main_%1$s[data-tsp-voted="Background"] > .ts_poll_answer[data-tsp-id="%2$s"]  span.ts_poll_r_progress{
									background-color: var(--tsp_a_c_%1$s-%2$s);
								}
								main.ts_poll_main_%1$s[data-tsp-voted="Color"] > .ts_poll_answer[data-tsp-id="%2$s"]  label.ts_poll_r_label{
									color: var(--tsp_a_c_%1$s-%2$s);
								}
								',
								esc_html( $total_soft_poll ),
								esc_html( $key )
							);
						}
						break;
					case 'Image Poll':
					case 'Video Poll':
						$tsp_special_colors_css .= sprintf(
							' 
							main.ts_poll_main_%1$s[data-tsp-color="Background"] > .ts_poll_answer[data-tsp-id="%2$s"] > .ts_poll_before_div{
								background: var(--tsp_a_c_%1$s-%2$s);
							}
							main.ts_poll_main_%1$s[data-tsp-color="Color"] > .ts_poll_answer[data-tsp-id="%2$s"]  .ts_poll_answer_label{
								color: var(--tsp_a_c_%1$s-%2$s);
							}
							',
							esc_html( $total_soft_poll ),
							esc_html( $key )
						);
						break;
					case 'Standart Without Button':
					case 'Standard Without Button':
					case 'Image Without Button':
					case 'Video Without Button':
					case 'Image in Question':
					case 'Video in Question':
						$tsp_special_colors_css .= sprintf(
							' 
							main.ts_poll_main_%1$s[data-tsp-color="Background"] > .ts_poll_answer[data-tsp-id="%2$s"]{
								background-color: var(--tsp_a_c_%1$s-%2$s);
							}
							main.ts_poll_main_%1$s[data-tsp-color="Color"] > .ts_poll_answer[data-tsp-id="%2$s"]   .ts_poll_answer_label{
								color: var(--tsp_a_c_%1$s-%2$s);
							}
							main.ts_poll_main_%1$s[data-tsp-voted="Background"] > .ts_poll_answer[data-tsp-id="%2$s"]  span.ts_poll_r_progress{
								background-color: var(--tsp_a_c_%1$s-%2$s);
							}
							main.ts_poll_main_%1$s[data-tsp-voted="Color"] > .ts_poll_answer[data-tsp-id="%2$s"]  label.ts_poll_r_label{
								color: var(--tsp_a_c_%1$s-%2$s);
							}
							',
							esc_html( $total_soft_poll ),
							esc_html( $key )
						);
						break;
				}
			endforeach;
			$ts_poll_generated_css .= sprintf(
				':root{
					%1$s
				}
				%2$s
				',
				$tsp_special_colors,
				$tsp_special_colors_css
			);
			if ($ts_poll_old_standard === '' ) {
				include plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/tsp-footer-display.php';
			}
			if ($ts_poll_edit === "false") {
				echo sprintf(
					'
						<input style="display:none !important;" id="tsp_type_%1$s" value="%2$s">
						<input style="display:none !important;" id="tsp_show_%1$s" value="%3$s">
						<input style="display:none !important;" id="tsp_result_no_%1$s" value="%4$s">
						<input style="display:none !important;" id="tsp_theme_name_%1$s" value="%5$s">
					',
					esc_attr( $total_soft_poll),
					array_key_exists("ts_poll_v_t",$tspoll_question_styles) ? $tspoll_question_styles["ts_poll_v_t"] : $tspoll_question_styles["ts_poll_p_a_vt"],
					array_key_exists("TotalSoft_Poll_Set_01",$t_s_poll_question_settings) ? $t_s_poll_question_settings["TotalSoft_Poll_Set_01"] : "",
					array_key_exists("TotalSoft_Poll_Set_05",$t_s_poll_question_settings) ? $t_s_poll_question_settings["TotalSoft_Poll_Set_05"] : "Thank you!",
					esc_html($ts_poll_question_params["TS_Poll_Q_Theme"])
				);
			}
			if ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standart Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standard Poll' ) {
				if ( $ts_poll_old_standard === 'true' ) {
					if ( $ts_poll_edit == 'true' || $tspoll_question_styles["ts_poll_p_shpop"] == 'true') {
						$ts_poll_popup_standard = true;
						$ts_poll_popup_standard_html .= sprintf(
							'
							<section class="ts_poll_result_popup_section_%1$s"></section>
							<div class="ts_poll_result_popup_result_%1$s">
								<div id="ts_poll_modal_result_section_%1$s" data-tsp-effect="%3$s">
									%2$s
								</div>
							</div>
							',
							esc_attr( $total_soft_poll ),
							$tsp_result_section_inner,
							esc_attr( $tspoll_question_styles["ts_poll_p_sheff"] )
						);
					}
				}
			}
			echo sprintf(
				'
					</div>
					%s
					%s
				</form>
				',
				wp_nonce_field( 'tsp_vote_nonce_' . $total_soft_poll, 'tsp_vote_nonce_field_' . $total_soft_poll, true, false ),
				$ts_poll_popup_standard_html
			);
			if($ts_poll_edit === "true"){
				wp_add_inline_style("ts_poll_special_{$total_soft_poll}",$ts_poll_generated_css);
			}else{
				echo sprintf(
					'
					<style>
						%1$s
					</style>
					',
					$ts_poll_generated_css
				);
			}
			if ( $ts_poll_edit === 'true' ) {
				include plugin_dir_path( dirname( __FILE__ ) ) . 'public/js/tsp-content-js-edit.php';
			}elseif ($ts_poll_edit === 'false') {
				return;
			} else {
				wp_enqueue_script( "ts_poll_js_{$total_soft_poll}", plugin_dir_url( __DIR__ ) . 'public/js/ts_poll-content.js', array( 'jquery' ), time(), false );
				include plugin_dir_path( dirname( __FILE__ ) ) . 'public/js/tsp-content-js.php';
			}
		}else{
			return false;
		}
	}
	/**
	 * Shortcode function for show poll
	 *
	 * @since 1.7.0
	 *
	 * @param array $atts Shortcode attributes provided by a user.
	 *
	 * @return string
	 */
	public function ts_poll_shortcode( $atts ) {
		$atts = shortcode_atts(
			array(
				'id'   => '',
				'edit' => ''
			),
			$atts
		);
		\ob_start();
			$this->ts_poll_content( $atts['id'], $atts['edit'] );
		return \ob_get_clean();
	}
	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.7.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}
