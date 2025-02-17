<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       TS Poll
 * @since      1.7.0
 *
 * @package    TS_Poll
 * @subpackage TS_Poll/admin
 */
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    TS_Poll
 * @subpackage TS_Poll/admin
 * @author     TS Poll <TS Poll>
 */
class ts_poll_admin{
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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public $ts_poll_question_obj;
	public $tsp_build;
	public $tsp_build_proporties;
	public $tsp_build_id;
	private $tsp_page_slug;
	private $tsp_themes;
	private $tsp_themes_links;
	public $ts_poll_dashboard;
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		if ( isset( $_GET ) && isset( $_GET['page'] ) ) {
			if ( 'ts-poll' === $_GET['page'] || 'ts-poll-builder' === $_GET['page'] || 'ts-poll-pro' === $_GET['page'] || 'ts-poll-add-ons' === $_GET['page'] ) {
				$this->tsp_page_slug = $_GET['page'];
			}
		}
		add_action( 'admin_bar_menu', array( $this, 'ts_poll_admin_bar' ), 95 );
		add_action( 'init', [$this,'tsp_process_requests'] );
		add_action( 'wp_ajax_tsp_check_attachment', array( $this, 'tsp_get_attachment_callback' ) );
		add_action( 'wp_ajax_tsp_get_attachment_id', array( $this, 'tsp_get_attachment_id' ) );
		add_action( 'wp_ajax_tsp_save_question', array( $this, 'tsp_save_question' ) );
		add_filter( 'plugin_action_links_' . TS_POLL_BASE, array( $this, 'tsp_add_action_link' ) );
		add_filter( 'set-screen-option', array( $this, 'set_screen' ), 11, 3 );
		add_action( 'wp_dashboard_setup', [ $this, 'tspoll_dashboard_widget_register' ] );
		add_action(	'admin_footer', [$this,'ts_poll_dashboard_footer']);
		add_action( 'wp_ajax_tspoll_dashboard_fetch', array($this,'tspoll_dashboard_fetch_callback') );
		add_action(	'wp_ajax_tspoll_dashboard_update', array($this,'tspoll_dashboard_update_callback'));
		add_action( 'admin_notices', array($this, 'tspoll_push_notice') );
		add_action( 'admin_init', array($this, 'tspoll_dismissed_notice') );
	}
	function tspoll_push_notice() {
		if ($this->tsp_page_slug === 'ts-poll') {
			$ts_poll_dismissed_meta = get_user_meta(  get_current_user_id(), 'tspoll_dismissed_notice' );
			$ts_poll_remind_me_meta = get_user_meta(  get_current_user_id(), 'tspoll_remindme_notice' );
			$ts_poll_dismissed = !$ts_poll_dismissed_meta || $ts_poll_dismissed_meta[0] !== $this->version;
			$ts_poll_remind_me = !$ts_poll_remind_me_meta || time()+(get_option('gmt_offset') * 3600) - (int) $ts_poll_remind_me_meta[0] > 86400;
			if ( $ts_poll_dismissed && $ts_poll_remind_me) {
				echo sprintf(
					'
					<div class="ts-poll-banner">
						<div class="ts-poll-banner-container">
							<svg class="ts-poll-banner-circle ts-poll-banner-circle-a" height="160" width="160">
								<circle cx="80" cy="80" r="80" />
							</svg>
							<svg class="ts-poll-banner-circle ts-poll-banner-circle-b" height="60" width="60">
								<circle cx="30" cy="30" r="30" />
							</svg>
							<svg class="ts-poll-banner-circle ts-poll-banner-circle-c" height="600" width="600">
								<circle cx="300" cy="300" r="300" />
							</svg>
							<svg class="ts-poll-banner-circle ts-poll-banner-circle-d" height="60" width="60">
								<circle cx="30" cy="30" r="30" />
							</svg>
							<img class="ts-poll-banner-img"
								src="%1$s" />
							<div class="ts-poll-banner-content">
								<p class="ts-poll-banner-text">Video Gallery - YouTube Gallery and Vimeo Gallery</p>
								<a target="_blank" href="%2$s" class="ts-poll-banner-link">WP Plugin</a>
								<a target="_blank" href="%3$s" class="ts-poll-banner-link">See demos</a>
							</div>
						</div>
						<div class="ts-poll-banner-btns">
							<a class="ts-poll-banner-btn ts-poll-remind-btn" href="%4$s">%5$s</a>
							<a class="ts-poll-banner-btn ts-poll-dismiss-btn" href="%6$s">%7$s</a>
						</div>
					</div>
					',
					esc_url(plugin_dir_url( __FILE__ ) . 'img/ts-video-gallery-logo.png'),
					esc_url('https://wordpress.org/plugins/gallery-videos/'),
					esc_url('https://total-soft.com/wp-video-gallery/'),
					esc_url( add_query_arg( 'ts-poll-remind-me', 'true' ) ),
					__('Remind me later'),
					esc_url( add_query_arg( 'ts-poll-dismissed', 'true' ) ),
					__('Dismiss')
				);
			}
		}
	}
	function tspoll_dismissed_notice() {
		if ( isset( $_GET['ts-poll-dismissed'] ) || isset( $_GET['ts-poll-remind-me'] )){
			if ( isset( $_GET['ts-poll-dismissed'] )){
				$ts_poll_dismissed_meta = get_user_meta(  get_current_user_id(), 'tspoll_dismissed_notice' );
				!$ts_poll_dismissed_meta ? add_user_meta( get_current_user_id(), 'tspoll_dismissed_notice', $this->version, true ) : update_user_meta( get_current_user_id(), 'tspoll_dismissed_notice', $this->version );
			}else if (isset( $_GET['ts-poll-remind-me'] )) {
				$ts_poll_remind_me_meta = get_user_meta(  get_current_user_id(), 'tspoll_remindme_notice' );
				!$ts_poll_remind_me_meta ? add_user_meta( get_current_user_id(), 'tspoll_remindme_notice', time()+(get_option('gmt_offset') * 3600), true ) : update_user_meta( get_current_user_id(), 'tspoll_remindme_notice', time()+(get_option('gmt_offset') * 3600) ) ;
			}
			wp_redirect(wp_get_referer());
			exit;
		}
	}
	public function tsp_process_requests(){
		if ( 'ts-poll-builder' === $this->tsp_page_slug && is_admin() ) {
			$this->tsp_themes = array(
				'standard_poll'           => array( "name" => 'Standard Poll', "free" => true),
				'image_poll'              => array( "name" => 'Image Poll', "free" => true),
				'video_poll'              => array( "name" => 'Video Poll', "free" => true),
				'standard_without_button' => array( "name" => 'Standard Without Button', "free" => true),
				'image_without_button'    => array( "name" => 'Image Without Button', "free" => true),
				'video_without_button'    => array( "name" => 'Video Without Button', "free" => true),
				'image_in_question'       => array( "name" => 'Image in Question', "free" => true),
				'video_in_question'       => array( "name" => 'Video in Question', "free" => true),
				'versus_poll'             => array( "name" => 'Versus Poll', "free" => false)
			);
			if(isset( $_GET['tsp-template-id'] ) && is_numeric( $_GET['tsp-template-id'] ) && is_int( (int) $_GET['tsp-template-id'] )){
				$tsp_insert_id = apply_filters( "tsp_import_template",sanitize_text_field( $_GET['tsp-template-id'] ));
				if ($tsp_insert_id !== false) {
					wp_safe_redirect( add_query_arg( 'tsp-id', $tsp_insert_id, admin_url( 'admin.php?page=ts-poll-builder' ) ) );
				}else{
					wp_safe_redirect( admin_url( 'admin.php?page=ts-poll-builder' ) );
				}
			}else if ( isset( $_GET['tsp-id'] ) || isset( $_GET['tsp-theme'] ) ) {
				if ( isset( $_GET['tsp-id'] ) && is_numeric( $_GET['tsp-id'] ) && is_int( (int) $_GET['tsp-id'] ) && (int) $_GET['tsp-id'] > 0 ) {
					global $wpdb;
					$this->tsp_build_id         = sanitize_text_field( $_GET['tsp-id'] );
					$ts_poll_check = apply_filters( "tsp_get_all_params",  $this->tsp_build_id, true, false,true);
					if (  $ts_poll_check !== false ) {
						$ts_poll_check['Question_Title'] = html_entity_decode( htmlspecialchars_decode( $ts_poll_check['Question_Title'] ), ENT_QUOTES );
						foreach ( $ts_poll_check['Question_Style'] as $key => $value ) {
							$ts_poll_check['Question_Style'][ $key ] = html_entity_decode( htmlspecialchars_decode( $value ), ENT_QUOTES );
						}
						foreach ( $ts_poll_check['Question_Settings'] as $key => $value ) {
							$ts_poll_check['Question_Settings'][ $key ] = html_entity_decode( htmlspecialchars_decode( $value ), ENT_QUOTES );
						}
						$ts_poll_check_answers              = $ts_poll_check['Answers'];
						foreach ( $ts_poll_check_answers as $key => $value ) {
							$ts_poll_check_answers[ $key ]['Answer_Title'] = html_entity_decode( htmlspecialchars_decode( $value['Answer_Title'] ), ENT_QUOTES );
						}
						$ts_poll_check['Question_Answers'] = $ts_poll_check_answers;
						$this->tsp_build            = 'edit';
						$this->tsp_build_proporties = $ts_poll_check;
					} else {
						$this->tsp_build = 'not';
					}
				} elseif ( isset( $_GET['tsp-theme'] ) && array_key_exists( $_GET['tsp-theme'], $this->tsp_themes ) ) {
					$this->tsp_build_id                                     = sanitize_text_field( $_GET['tsp-theme'] );
					$this->tsp_build                                        = 'edit';
					$tspoll_theme_json = apply_filters( "tsp_get_all_params", (string) $this->tsp_build_id, (bool) false , (bool) false, (bool) true);
					$this->tsp_build_proporties = array(
						'id'                => $this->tsp_build_id,
						'Question_Title'    => $tspoll_theme_json['Question_Title'],
						'Question_Settings' => $tspoll_theme_json['Question_Settings'],
						'Question_Param'    => $tspoll_theme_json['Question_Param'],
						'Question_Style'    => $tspoll_theme_json['Question_Style'],
						'Answers_Sort'      => $tspoll_theme_json['Answers_Sort'],
						'created_at'        => $tspoll_theme_json['created_at'],
						'updated_at'        => $tspoll_theme_json['updated_at'],
						'Question_Answers'  => $tspoll_theme_json['Answers']
					);
				} else {
					$this->tsp_build = '404';
				}
			} else {
				$this->tsp_build        = 'new';
				$this->tsp_themes_links = array(
					'standard_poll'           => 'wp-poll-vote-standard',
					'image_poll'              => 'wp-poll-vote-standard-image',
					'video_poll'              => 'wp-poll-vote-standard-video',
					'standard_without_button' => 'wp-poll-vote-standard-without-button',
					'image_without_button'    => 'wp-poll-vote-standard-image-without-button',
					'video_without_button'    => 'wp-poll-vote-standard-video-without-button',
					'image_in_question'       => 'wp-poll-vote-image-in-question',
					'video_in_question'       => 'wp-poll-vote-video-in-question'
				);
			}
		}
	}
    public function ts_poll_dashboard_footer() {
			$screen = get_current_screen();
			if ( $screen->id != "dashboard" ) return; ?>
			<style>
				#tspoll_dashboard_form  {
					display: -ms-flexbox;
    				display: -webkit-flex;
    				display: flex;
    				-webkit-flex-direction: column;
    				-ms-flex-direction: column;
    				flex-direction: column;
    				-webkit-flex-wrap: nowrap;
    				-ms-flex-wrap: nowrap;
    				flex-wrap: nowrap;
    				-webkit-justify-content: center;
    				-ms-flex-pack: center;
    				justify-content: center;
    				-webkit-align-content: center;
    				-ms-flex-line-pack: center;
    				align-content: center;
    				-webkit-align-items: center;
    				-ms-flex-align: center;
    				align-items: center;
					min-height:150px;
				}
				#tspoll_dashboard_form > #tspoll_dashboard_header  {
					display: -ms-flexbox;
    				display: -webkit-flex;
    				display: flex;
    				-webkit-flex-direction: row;
    				-ms-flex-direction: row;
    				flex-direction: row;
    				-webkit-flex-wrap: nowrap;
    				-ms-flex-wrap: nowrap;
    				flex-wrap: nowrap;
    				-webkit-justify-content: space-between;
    				-ms-flex-pack: justify;
    				justify-content: space-between;
    				-webkit-align-content: center;
    				-ms-flex-line-pack: center;
    				align-content: center;
    				-webkit-align-items: center;
    				-ms-flex-align: center;
    				align-items: center;
					width: 100%;
					max-width:100%;
				}
				#tspoll_dashboard_table {
					position: relative;
					width:100%;
					min-height:100px;
				}
				#tspoll_dashboard_table > #tspoll_dashboard_loader {
					position: absolute;
					background-color:#0000002b;
					width:100%;
					height: 100%;
					left:0;
					right:0;
					top:0;
					bottom:0;
					display: -ms-flexbox;
    				display: -webkit-flex;
    				display: flex;
    				-webkit-flex-direction: column;
    				-ms-flex-direction: column;
    				flex-direction: column;
    				-webkit-flex-wrap: nowrap;
    				-ms-flex-wrap: nowrap;
    				flex-wrap: nowrap;
    				-webkit-justify-content: center;
    				-ms-flex-pack: center;
    				justify-content: center;
    				-webkit-align-content: center;
    				-ms-flex-line-pack: center;
    				align-content: center;
    				-webkit-align-items: center;
    				-ms-flex-align: center;
    				align-items: center;
				}
				#tspoll_dashboard_form input[type="submit"] {
					color: #9f88d7;
					border-color: #9f88d7;
					background: #f6f7f7;
					vertical-align: top;
				}
				#tspoll_dashboard_form input[type="submit"]:focus,
				#tspoll_dashboard_form input[type="submit"]:hover {
					border-color: #9f88d7;
					color: #9f88d7;
					box-shadow: 0 0 0 .0625rem #9f88d7;
					outline: .125rem solid transparent;
					outline-offset: 0;
				}
				#tspoll_dashboard_form td {
					-webkit-touch-callout: none;
					/* iOS Safari */
					-webkit-user-select: none;
					/* Safari */
					-khtml-user-select: none;
					/* Konqueror HTML */
					-moz-user-select: none;
					/* Old versions of Firefox */
					-ms-user-select: none;
					/* Internet Explorer/Edge */
					user-select: none;
				}
				#tspoll_dashboard_form td.column-id>span {
					background: #9f88d7;
					color: #ffffff;
					border-radius: .3125rem;
					padding: .3125rem;
					text-align: center;
					vertical-align: middle;
					cursor: pointer;
					font-size: .6875rem;
					font-weight: 500;
					line-height: 1.455;
				}
				#tspoll_dashboard_form td.column-Question_Title>strong>a,
				#tspoll_dashboard_form td.column-Question_Title>strong>a:hover,
				#tspoll_dashboard_form td.column-Question_Title>strong>a:focus {
					color: #50575e;
					cursor: pointer;
					outline: none;
					box-shadow: none;
					border: none;
				}
				#tspoll_dashboard_form td.column-id{
					text-align:center;
				}
				#tspoll_dashboard_form input[type=checkbox]:focus,
				#tspoll_dashboard_form input[type=color]:focus,
				#tspoll_dashboard_form input[type=date]:focus,
				#tspoll_dashboard_form input[type=datetime-local]:focus,
				#tspoll_dashboard_form input[type=datetime]:focus,
				#tspoll_dashboard_form input[type=email]:focus,
				#tspoll_dashboard_form input[type=month]:focus,
				#tspoll_dashboard_form input[type=number]:focus,
				#tspoll_dashboard_form input[type=password]:focus,
				#tspoll_dashboard_form input[type=radio]:focus,
				#tspoll_dashboard_form input[type=search]:focus,
				#tspoll_dashboard_form input[type=tel]:focus,
				#tspoll_dashboard_form input[type=text]:focus,
				#tspoll_dashboard_form input[type=time]:focus,
				#tspoll_dashboard_form input[type=url]:focus,
				#tspoll_dashboard_form input[type=week]:focus,
				#tspoll_dashboard_form select:focus,
				#tspoll_dashboard_form textarea:focus,
				#tspoll_dashboard_form input[type=search] {
					border-color: #9f88d7;
					box-shadow: 0 0 0 .0625rem #9f88d7;
					outline: .125rem solid transparent;
					background-color: #ffffff !important;
				}
				#tspoll_dashboard_form .button,
				#tspoll_dashboard_form .button-secondary {
					color: #8c8f94;
					border-color: #8c8f94;
					background: #f6f7f7;
					vertical-align: top;
				}
				#tspoll_dashboard_form .button:focus,
				#tspoll_dashboard_form .button-secondary:focus {
					background: #f6f7f7;
					border-color: #8c8f94;
					color: #8c8f94;
					box-shadow: 0 0 0 .0625rem #8c8f94;
					outline: .125rem solid transparent;
					outline-offset: 0;
				}
				#tspoll_dashboard_form th a {
					color: #9f88d7;
					transition-property: border, background, color;
					transition-duration: .05s;
					transition-timing-function: ease-in-out;
				}
				#tspoll_dashboard_form th a:focus {
					color: #9f88d7;
					box-shadow: none;
					outline: none;
				}
				#tspoll_dashboard_form td .row-actions span a {
					color: #9f88d7;
					transition-property: border, background, color;
					transition-duration: .05s;
					transition-timing-function: ease-in-out;
				}
				#tspoll_dashboard_form table {
					border: .0625rem solid #e7e7e7;
					box-shadow: 0 .0625rem .0625rem rgba(0, 0, 0, .04);
				}
			</style>
			<script type="text/javascript">
				(function ($) {
					$( document ).on(
						'click',
						'#tspoll_dashboard_form td.column-id>span',
						function(event) {
							event.stopPropagation();
							event.preventDefault();
							$( this ).html( `Copied ! ` );
							var tsp_create_input = document.createElement( "input" );
							tsp_create_input.setAttribute( "value", `[TS_Poll id="${$(this).attr("data-tsp-id")}"]` );
							document.body.appendChild( tsp_create_input );
							tsp_create_input.select();
							document.execCommand( "copy" );
							document.body.removeChild( tsp_create_input );
							setTimeout(
								() => {
									$( this ).html( "Copy" );
								},
								1000
							);
						}
					);
					ts_poll_dashboard_list = {
						display: function() {
							$.ajax({
								url: ajaxurl,
								dataType: 'json',
								data: {
									ts_poll_dashboard_widget_nonce: $('#tspoll_dashboard_form #ts_poll_dashboard_widget_nonce').val(),
									action: 'tspoll_dashboard_update'
								},
								success: function (response) {
									$("#tspoll_dashboard_table").html(response.display);
									$("#tspoll_dashboard_form tbody").on("click", "#tspoll_dashboard_form .toggle-row", function(e) {
										e.preventDefault();
										$(this).closest("tr").toggleClass("is-expanded")
									});
									ts_poll_dashboard_list.init();
								}
							});
						},
						init: function () {
							var tsp_dashboard_timer;
							var tsp_dashboard_delay = 100;
							$('#tspoll_dashboard_form .tablenav-pages a, #tspoll_dashboard_form .manage-column.sortable a,#tspoll_dashboard_form .manage-column.sorted a').on('click', function (e) {
								e.preventDefault();
								var query = this.search.substring(1);
								var data = {
									paged: ts_poll_dashboard_list.__query( query, 'paged' ) || '1',
								};
								ts_poll_dashboard_list.update(data);
							});
							$('#tspoll_dashboard_form input[name=paged]').on('keyup', function (e) {
								if (13 == e.which)
									e.preventDefault();
								var data = {
									paged: parseInt($('#tspoll_dashboard_form input[name=paged]').val()) || '1',
								};
								window.clearTimeout(tsp_dashboard_timer);
								tsp_dashboard_timer = window.setTimeout(function () {
									ts_poll_dashboard_list.update(data);
								}, tsp_dashboard_delay);
							});
							$('#tspoll_dashboard_form').on('submit', function(e){
								e.preventDefault();
							});
							setTimeout(() => {
								var tspoll_dashboard_loader = document.createElement('div');
								tspoll_dashboard_loader.setAttribute('id', 'tspoll_dashboard_loader');
								tspoll_dashboard_loader.setAttribute('style', 'display:none;');
								var tsp_loader_img = document.createElement('img');
								tsp_loader_img.src = "<?php echo esc_url( plugin_dir_url( __DIR__ ) . 'public/img/tsp_loading.gif' ); ?>";
								tspoll_dashboard_loader.appendChild(tsp_loader_img);
								document.getElementById('tspoll_dashboard_table').appendChild(tspoll_dashboard_loader);
							}, 150);
						},
						update: function (data) {
							$.ajax({
								url: ajaxurl,
								data: $.extend(
									{
										ts_poll_dashboard_widget_nonce: $('#tspoll_dashboard_form  #ts_poll_dashboard_widget_nonce').val(),
										action: 'tspoll_dashboard_fetch',
									},
									data
								),
								beforeSend: function () {
									document.getElementById('tspoll_dashboard_loader').removeAttribute('style');
								},
								success: function (response) {
									document.getElementById('tspoll_dashboard_loader').setAttribute('style', 'display:none;');
									if (response.rows.length)
										$('#tspoll_dashboard_form #the-list').html(response.rows);
									if (response.column_headers.length)
										$('#tspoll_dashboard_form thead tr, #tspoll_dashboard_form tfoot tr').html(response.column_headers);
									if (response.pagination.bottom.length)
										$('#tspoll_dashboard_form .tablenav.top .tablenav-pages').html($(response.pagination.top).html());
									if (response.pagination.top.length)
										$('#tspoll_dashboard_form .tablenav.bottom .tablenav-pages').html($(response.pagination.bottom).html());
										ts_poll_dashboard_list.init();
								}
							});
						},
						__query: function (query, variable) {
							var vars = query.split("&");
							for (var i = 0; i < vars.length; i++) {
								var pair = vars[i].split("=");
								if (pair[0] == variable)
									return pair[1];
							}
							return false;
						}
					};
					ts_poll_dashboard_list.display();
				})(jQuery);
			</script>
		<?php
	}
	function tspoll_dashboard_fetch_callback() {
		$tsp_dashboard_list_table = new ts_poll_dashboard();
		$tsp_dashboard_list_table->ajax_response();
	}
	function tspoll_dashboard_update_callback() {
		check_ajax_referer( 'tsp-dashboard-nonce', 'ts_poll_dashboard_widget_nonce', true );
		$tsp_dashboard_list_table = new ts_poll_dashboard();
		$tsp_dashboard_list_table->prepare_items();
		ob_start();
		$tsp_dashboard_list_table->display();
		$display = ob_get_clean();
		die(
			json_encode(array(
				"display" => $display
			))
		);
	}
	/**
	 * Register the dashboard widget.
	 *
	 * @since 1.8.6
	*/
	public function tspoll_dashboard_widget_register() {
		global $wp_meta_boxes;
		wp_add_dashboard_widget(
			'tspoll_dashboard_widget',
			esc_html__( 'TS Poll', 'tspoll' ),
			array( $this, 'tspoll_widget_inner' )
		);
		$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
		$widget_instance  = array( 'tspoll_dashboard_widget' => $normal_dashboard[ 'tspoll_dashboard_widget' ] );
		unset( $normal_dashboard[ 'tspoll_dashboard_widget' ] );
		$sorted_dashboard = array_merge( $widget_instance, $normal_dashboard );
		$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
	}
    public function tspoll_widget_inner() {
		echo sprintf(
			'
			<form id="tspoll_dashboard_form">
				<div id="tspoll_dashboard_header">
					<img src="%2$s" alt="TS Poll">
					<span >TS Poll</span>
				</div>
				<div id="tspoll_dashboard_table">
					<div id="tspoll_dashboard_loader">
						<img src="%3$s" alt="TS Loader">
					</div>
				</div>
				%1$s
			</form>
			',
			wp_nonce_field( 'tsp-dashboard-nonce', 'ts_poll_dashboard_widget_nonce' ),
			esc_url( plugin_dir_url( __FILE__ ) . 'img/ts_poll_logo_md.png' ),
			esc_url( plugin_dir_url( __DIR__ ) . 'public/img/tsp_loading.gif' )
		);
	}
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.7.0
	 */
	public function tsp_add_action_link( $links ) {
		$links['tspoll_support'] = sprintf( '<a href="%s" style="color: #8bc34a;font-weight: bold;" target="_blank">%s</a>', esc_url( 'https://wordpress.org/support/plugin/poll-wp/' ), esc_attr__( 'Support', 'tspoll' ) );
		$links['tspoll_go_pro']  = sprintf( '<a href="%s" style="color: #ff0000;font-weight: bold;" target="_blank">%s</a>', esc_url( 'https://total-soft.com/wp-poll/' ), esc_attr__( 'Go Pro', 'tspoll' ) );
		return $links;
	}
	public function ts_poll_admin_bar(){
		global $wp_admin_bar;
		$wp_admin_bar->add_menu( array(
			'id'	=> 'tspoll-adminbar-menu',
			'title'	=> sprintf('<img src="%1$s">',esc_url( plugin_dir_url( __FILE__ ) . 'img/ts_poll_logo_md.png' )),
			'href'	=> esc_url(admin_url( 'admin.php?page=ts-poll' )),
			'meta'	=> array( 'tabindex' => 0, 'class' => 'tspoll-top-toolbar' )
		) );
		$wp_admin_bar->add_menu( array(
			'parent'	=> 'tspoll-adminbar-menu',
			'id'		=> 'tspoll-all-polls',
			'title'		=> __( 'All Polls', 'tspoll' ),
			'href'	=> esc_url(admin_url( 'admin.php?page=ts-poll' )),
			'meta'		=> array( 'tabindex' => '0' )
		) );
		$wp_admin_bar->add_menu( array(
			'parent'	=> 'tspoll-adminbar-menu',
			'id'		=> 'tspoll-create-poll',
			'title'		=> __( 'Create Poll', 'tspoll' ),
			'href'	=> esc_url(admin_url( 'admin.php?page=ts-poll-builder' )),
			'meta'		=> array( 'tabindex' => '0' )
		) );
		$wp_admin_bar->add_menu( array(
			'parent'	=> 'tspoll-adminbar-menu',
			'id'		=> 'tspoll-support',
			'title'		=> __( 'Support', 'tspoll' ),
			'href'	=> esc_url("https://wordpress.org/support/plugin/poll-wp/"),
			'meta'		=> array( 'tabindex' => '0', 'target' => '_blank' )
		) );
	}
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
		wp_enqueue_style( 'ts_poll_fonts', plugin_dir_url( __DIR__ ) . 'fonts/ts_poll-fonts.css', array(), time(), 'all' );
		if ( 'ts-poll' === $this->tsp_page_slug ) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ts_poll-admin.css', array(), time(), 'all' );
			wp_enqueue_style( 'tspoll_toastr', plugin_dir_url( __FILE__ ) . 'css/toastr.min.css', array(), time(), 'all' );
		}
		if ( 'ts-poll-builder' === $this->tsp_page_slug ) {
			wp_enqueue_style( 'tspoll_toastr', plugin_dir_url( __FILE__ ) . 'css/toastr.min.css', array(), time(), 'all' );
			wp_enqueue_style( 'tspoll_builder', plugin_dir_url( __FILE__ ) . 'css/ts_poll-builder.css', array(), time(), 'all' );
			wp_add_inline_style( 'tspoll_builder', sprintf( ':root{ --tspoll_click_for : "%s"; }', esc_attr__( 'Click for change text', 'tspoll' ) ) );
			if ( 'edit' === $this->tsp_build ) {
				wp_enqueue_style( "tsp_context-menu", plugin_dir_url( __FILE__ ) . 'css/jquery.contextMenu.css', array(), time(), 'all' );
				wp_enqueue_style( 'tsp_builder', plugin_dir_url( __FILE__ ) . 'css/ts_poll-edit.css', array(), time(), 'all' );
				wp_enqueue_style( 'tspoll_icon_picker', plugin_dir_url( __FILE__ ) . 'css/tsp-aesthetic-icon-picker.css', array(), time(), 'all' );
				wp_enqueue_style( 'tspoll_color_picker', plugin_dir_url( __FILE__ ) . 'css/tsp-spectrum.css', array(), time(), 'all' );
				wp_enqueue_style( 'tspoll_datatables', plugin_dir_url( __FILE__ ) . 'css/vanilla-dataTables.css', array(), time(), 'all' );
			} elseif ( 'new' === $this->tsp_build ) {
				wp_enqueue_style( 'tsp_builder', plugin_dir_url( __FILE__ ) . 'css/ts_poll-new.css', array(), time(), 'all' );
			}
		}
		if ( 'ts-poll-pro' === $this->tsp_page_slug ) {
			wp_enqueue_style( $this->plugin_name."_pro", plugin_dir_url( __FILE__ ) . 'css/ts_poll-pro.css', array(), time(), 'all' );
		}
		if ( 'ts-poll-add-ons' === $this->tsp_page_slug ) {
			wp_enqueue_style( $this->plugin_name."_add_ons", plugin_dir_url( __FILE__ ) . 'css/ts_poll-addons.css', array(), time(), 'all' );
			$tsp_addons_inline_style = sprintf(
				'
				@font-face {
					font-family: "Source Sans Pro";
					font-style: normal;
					font-weight: 200;
					src: url(%1$s) format("truetype");
				}
				@font-face {
					font-family: "Source Sans Pro";
					font-style: normal;
					font-weight: 300;
					src: url(%2$s) format("truetype");
				}
				@font-face {
					font-family: "Source Sans Pro";
					font-style: normal;
					font-weight: 400;
					src: url(%3$s) format("truetype");
				}
				@font-face {
					font-family: "Source Sans Pro";
					font-style: normal;
					font-weight: 600;
					src: url(%4$s) format("truetype");
				}
				@font-face {
					font-family: "Source Sans Pro";
					font-style: normal;
					font-weight: 700;
					src: url(%5$s) format("truetype");
				}
				@font-face {
					font-family: "Source Sans Pro";
					font-style: normal;
					font-weight: 900;
					src: url(%6$s) format("truetype");
				}
				',
				esc_url("https://fonts.gstatic.com/s/sourcesanspro/v21/6xKydSBYKcSV-LCoeQqfX1RYOo3i94_wlxdr.ttf"),
				esc_url("https://fonts.gstatic.com/s/sourcesanspro/v21/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwlxdr.ttf"),
				esc_url("https://fonts.gstatic.com/s/sourcesanspro/v21/6xK3dSBYKcSV-LCoeQqfX1RYOo3qOK7g.ttf"),
				esc_url("https://fonts.gstatic.com/s/sourcesanspro/v21/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwlxdr.ttf"),
				esc_url("https://fonts.gstatic.com/s/sourcesanspro/v21/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwlxdr.ttf"),
				esc_url("https://fonts.gstatic.com/s/sourcesanspro/v21/6xKydSBYKcSV-LCoeQqfX1RYOo3iu4nwlxdr.ttf")
			);
			wp_add_inline_style($this->plugin_name."_add_ons", $tsp_addons_inline_style);
		}
	}
	/**
	 * Register the JavaScript for the admin area.
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
		if ( 'ts-poll' === $this->tsp_page_slug ) {
			wp_register_script( 'tspoll_toastr', plugin_dir_url( __FILE__ ) . 'js/toastr.min.js', array(), time(), false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ts_poll-admin.js', array( 'jquery', 'tspoll_toastr' ), time(), false );
			wp_localize_script(
				$this->plugin_name,
				'tspoll_admin_json',
				array(
					'copy'          	   => esc_html__( 'Copy', 'tspoll' ),
					'delete'        	   => esc_html__( 'Delete', 'tspoll' ),
					'copy_action'   	   => esc_html__( 'Do you really want to copy this poll?', 'tspoll' ),
					'delete_action' 	   => esc_html__( 'Do you really want to delete this poll? This process cannot be undone.', 'tspoll' ),
					'copied'        	   => esc_html__( 'Copied', 'tspoll' ),
					'info'                 => esc_html__( 'Info', 'tspoll' ),
					'error'                => esc_html__( 'Please note!', 'tspoll' ),
					'premium_option'   	   => esc_html__( 'This option is available only in plugin premium version.', 'tspoll' )
				)
			);
		}
		if ( 'ts-poll-builder' === $this->tsp_page_slug ) {
			wp_enqueue_media();
			wp_enqueue_script( "tsp_context-menu", plugin_dir_url( __FILE__ ) . 'js/jquery.contextMenu.js', array( 'jquery' ), time(), true );
			wp_register_script( 'tspoll_toastr', plugin_dir_url( __FILE__ ) . 'js/toastr.min.js', array(), time(), false );
			wp_enqueue_script( 'tspoll_color_picker', plugin_dir_url( __FILE__ ) . 'js/tsp-spectrum.js', array(), time(), false );
			wp_enqueue_script( 'tspoll_datatables', plugin_dir_url( __FILE__ ) . 'js/vanilla-dataTables.js', array(), time(), false );
			wp_localize_script(
				'tspoll_datatables',
				'tspoll_translations',
				array(
					'search'          => esc_html__( 'Search', 'tspoll' ),
					'entries_page'    => esc_html__( 'entries per page', 'tspoll' ),
					'entries_nofound' => esc_html__( 'No entries found', 'tspoll' ),
					'show'            => esc_html__( 'Showing', 'tspoll' ),
					'to'              => esc_html__( 'to', 'tspoll' ),
					'of'              => esc_html__( 'of', 'tspoll' ),
					'entries'         => esc_html__( 'entries', 'tspoll' )
				)
			);
			wp_register_script( "ts_poll_vue_js", TS_POLL_PLUGIN_DIR_URL . 'public/js/vue.js', array( ), $this->version , false );
			wp_enqueue_script( 'tspoll_builder', plugin_dir_url( __FILE__ ) . 'js/ts_poll-builder.js', array( 'jquery','ts_poll_vue_js', 'tspoll_toastr', 'jquery-ui-sortable', 'tspoll_color_picker', 'tspoll_datatables', 'tsp_context-menu' ), time(), true );
			if ( 'edit' === $this->tsp_build ) {
				$tsp_answers = $tsp_votes = $tsp_colors = array();
				foreach ( $this->tsp_build_proporties['Question_Answers'] as $key => $value ) :
					$tsp_answers[]       = $value['Answer_Title'];
					$tsp_votes[]         = $value['Answer_Votes'];
					$tsp_colors[]        = $this->tsp_build_proporties['Question_Answers'][ $key ]['Answer_Param']["TotalSoftPoll_Ans_Cl"];
				endforeach;
				if ($this->tsp_build_proporties["Question_Param"]["TS_Poll_Q_Theme"] === "Video Poll" || $this->tsp_build_proporties["Question_Param"]["TS_Poll_Q_Theme"] === "Video Without Button") {
					global $wp_embed;
					remove_all_filters( 'embed_oembed_html', 10 );
					foreach ($this->tsp_build_proporties['Question_Answers'] as $tsp_response_key => $tsp_response_value) {
						$tsp_check_embed = "";
						$tsp_check_embed = sprintf(
							'								
							<div class="tsp_embed_popup_inner tsp_video_popup_embed">
								%1$s
							</div>
							',
							$tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Vd"] == '' ? sprintf( '<img src="%s" alt="No Video avaible">', esc_url( plugin_dir_url( __DIR__ ) . '/public/img/tsp_no_video.png' ) ) : do_shortcode( $wp_embed->run_shortcode( '[embed]' . esc_url( $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Vd"] ) . '[/embed]' ) )
						);
						$this->tsp_build_proporties['Question_Answers'][$tsp_response_key]["embed"] = $tsp_check_embed;
					}
				}
				wp_localize_script(
					'tspoll_builder',
					'tspoll_builder_json',
					array(
						'ajaxurl'              => admin_url( 'admin-ajax.php' ),
						'tsp_nonce'            => wp_create_nonce( 'tsp_builder_nonce_field' ),
						'tsp_proporties'       => $this->tsp_build_proporties,
						'tsp_id'               => $this->tsp_build_id,
						'tsp_creation'         => isset( $_GET['tsp-theme'] ) ? 'save' : 'update',
						'tsp_answers'          => $tsp_answers,
						'tsp_votes'            => $tsp_votes,
						'tsp_colors'           => $tsp_colors,
						'tsp_choose_img' 	   => esc_html__( 'Choose image', 'tspoll' ),
						'fonts'                => apply_filters("tsp_get_all_fonts",""),
						'tsp_svg_move'         => esc_url( plugin_dir_url( __FILE__ ) . 'img/move.svg' ),
						'tsp_svg_remove'       => esc_url( plugin_dir_url( __FILE__ ) . 'img/recycle.svg' ),
						'tsp_svg_edit'         => esc_url( plugin_dir_url( __FILE__ ) . 'img/edit.svg' ),
						'tsp_svg_copy'         => esc_url( plugin_dir_url( __FILE__ ) . 'img/copy.svg' ),
						'tsp_no_img'           => esc_url( plugin_dir_url( __DIR__ ) . 'public/img/tsp_no_img.jpg' ),
						'tsp_no_video'         => esc_url( plugin_dir_url( __DIR__ ) . 'public/img/tsp_no_video.png' ),
						'warning'              => esc_html__( 'Warning', 'tspoll' ),
						'info'                 => esc_html__( 'Info', 'tspoll' ),
						'success'              => esc_html__( 'Success', 'tspoll' ),
						'error'                => esc_html__( 'Error', 'tspoll' ),
						'theme_warning'        => esc_html__( 'You are already choose theme.', 'tspoll' ),
						'theme_choose_warning' => esc_html__( 'Please choose a theme for more experiance.', 'tspoll' ),
						'statistics_warning'   => esc_html__( 'Poll statistics field is pro feature.', 'tspoll' ),
						'results_warning'      => esc_html__( 'Please save poll for getting results.', 'tspoll' ),
						'icon_warning'         => esc_html__( 'Icon for this field required.', 'tspoll' ),
						'thumbnail_warning'    => esc_html__( 'Your selected video has not thumbnail,but you can add image.', 'tspoll' ),
						'link_warning'         => esc_html__( "Your inserted link isn't valid.", 'tspoll' ),
						'image_warning'        => esc_html__( "Your inserted file type isn't image.", 'tspoll' ),
						'save_warning'         => esc_html__( "Your poll isn't saved.", 'tspoll' ),
						'amount_warning'       => esc_html__( 'Minimum amount of answers is 2.', 'tspoll' ),
						'copy_note'            => esc_html__( 'Answer successfully copied.', 'tspoll' ),
						'delete_note'          => esc_html__( 'Answer successfully deleted.', 'tspoll' ),
						'add_note'             => esc_html__( 'New answer successfully added.', 'tspoll' ),
						'shortcode_note'       => esc_html__( 'Shortcode copied.', 'tspoll' ),
						'shortcode_theme_note' => esc_html__( 'Shortcode theme code copied.', 'tspoll' ),
						'thumbnail_info'       => esc_html__( 'Your selected video has thumbnail,but you can change it.', 'tspoll' )
					)
				);
			}
		}
		if ( 'ts-poll-add-ons' === $this->tsp_page_slug ) {
			wp_enqueue_script( $this->plugin_name."_add_ons", plugin_dir_url( __FILE__ ) . 'js/ts_poll-addons.js', array( 'jquery'), time(), true );
		}
	}
	public static function set_screen( $status, $option, $value ) {
		return $value;
	}
	function tsp_get_attachment_callback() {
		if ( ! isset( $_POST['tsp_nonce'] ) || $_POST['tsp_nonce'] == '' || ! wp_verify_nonce( $_POST['tsp_nonce'], 'tsp_builder_nonce_field' ) ) {
			wp_send_json_error();
		}
		$attachment_url = sanitize_text_field( $_POST['attachment_url'] );
		if ( is_numeric( attachment_url_to_postid( $attachment_url ) ) && attachment_url_to_postid( $attachment_url ) != 0 ) {
			wp_send_json_success( attachment_url_to_postid( $attachment_url ) );
		} else {
			wp_send_json_error();
		}
	}
	function tsp_get_attachment_id() {
		if ( ! isset( $_POST['tsp_nonce'] ) || $_POST['tsp_nonce'] == '' || ! wp_verify_nonce( $_POST['tsp_nonce'], 'tsp_builder_nonce_field' ) ) {
			wp_send_json_error();
		}
		$attachment_url = sanitize_text_field( $_POST['attachment_url'] );
		$fp             = fopen( $attachment_url, 'rb' );
		if ( $fp ) {
			list($width, $height) = getimagesize( $attachment_url );
			$data                 = array(
				'image'  => esc_url( $attachment_url ),
				'width'  => esc_html( $width ),
				'height' => esc_html( $height )
			);
			if ( is_numeric( attachment_url_to_postid( $attachment_url ) ) ) {
				$data['id'] = attachment_url_to_postid( $attachment_url );
			}
			wp_send_json_success( $data );
		} else {
			wp_send_json_error();
		}
	}
	function tsp_save_question() {
		if ( ! isset( $_POST['tsp_nonce'] ) || $_POST['tsp_nonce'] == '' || ! wp_verify_nonce( $_POST['tsp_nonce'], 'tsp_builder_nonce_field' ) ) {
			wp_send_json_error( 'TS Poll nonce error.' );
		}
		$tsp_themes_arr     = array(
			'standard_poll'           => 'Standard Poll',
			'image_poll'              => 'Image Poll',
			'video_poll'              => 'Video Poll',
			'standard_without_button' => 'Standard Without Button',
			'image_without_button'    => 'Image Without Button',
			'video_without_button'    => 'Video Without Button',
			'image_in_question'       => 'Image in Question',
			'video_in_question'       => 'Video in Question'
		);
		$tsp_question_id    = sanitize_text_field( $_POST['tsp_id'] );
		$tsp_question_title = sanitize_text_field( htmlentities( stripslashes( $_POST['tsp_question_title'] ), ENT_QUOTES ) );
		if ( is_numeric( $tsp_question_id ) || array_key_exists( $tsp_question_id, $tsp_themes_arr ) ) {
			global $wpdb;
			$tsp_question_table    = $wpdb->prefix . 'ts_poll_questions';
			$tsp_answers_table     = $wpdb->prefix . 'ts_poll_answers';
			$tsp_answers           = json_decode( json_encode( $_POST['tsp_answers'] ), true );
			$tsp_answers_sort      = json_decode( json_encode( $_POST['tsp_answers_sort'] ), true );
			$tsp_question_styles   = json_decode( json_encode( $_POST['tsp_question_styles'] ), true );
			$tsp_question_params   = json_decode( json_encode( $_POST['tsp_question_params'] ), true );
			$tsp_question_settings = json_decode( json_encode( $_POST['tsp_question_settings'] ), true );
			$tsp_deleted_answers   = isset($_POST['tsp_deleted_answers']) ?  json_decode( json_encode( $_POST['tsp_deleted_answers'] ), true ) : [];
			$tsp_response          = array();
			$tsp_sort_arr          = array();
			foreach ( $tsp_question_styles as $key => $value ) {
				$tsp_question_styles[ $key ] = sanitize_text_field( htmlentities( stripslashes( $value ), ENT_QUOTES ) );
			}
			foreach ( $tsp_question_params as $key => $value ) {
				if ( $key == 'TS_Poll_Q_Theme' ) {
					$tsp_question_params[ $key ] = sanitize_text_field( $value );
				} else {
					$tsp_question_params[ $key ] = sanitize_url( $value );
				}
			}
			foreach ( $tsp_question_settings as $key => $value ) {
				$tsp_question_settings[ $key ] = sanitize_text_field( htmlentities( stripslashes( $value ), ENT_QUOTES ) );
			}
			if ( array_key_exists( $tsp_question_id, $tsp_themes_arr ) ) {
				$wpdb->insert(
					$tsp_question_table,
					array(
						'id'                => '',
						'Question_Title'    => $tsp_question_title,
						'Question_Param'    => json_encode( $tsp_question_params ),
						'Question_Style'    => json_encode( $tsp_question_styles ),
						'Question_Settings' => json_encode( $tsp_question_settings ),
						'Answers_Sort'      => '',
						'created_at'        => date( 'd.m.Y h:i:sa' ),
						'updated_at'        => date( 'd.m.Y h:i:sa' )
					),
					array( '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
				);
				$tsp_new_question_id = $wpdb->insert_id;
				foreach ( $tsp_answers_sort as $key => $value ) {
					$tsp_arr_key      = sanitize_text_field( $value );
					$tsp_answer_title = htmlentities( sanitize_text_field( stripslashes( $tsp_answers[ $tsp_arr_key ]['Answer_Title'] ) ), ENT_QUOTES );
					foreach ( $tsp_answers[ $tsp_arr_key ]['Answer_Param'] as $param_key => $param_value ) {
						if ( $param_key == 'TotalSoftPoll_Ans_Vd' || $param_key == 'TotalSoftPoll_Ans_Im' ) {
							$tsp_answers[ $tsp_arr_key ]['Answer_Param'][ $param_key ] = sanitize_url( $param_value );
						} else {
							$tsp_answers[ $tsp_arr_key ]['Answer_Param'][ $param_key ] = sanitize_text_field( $param_value );
						}
					}
					$wpdb->insert(
						$tsp_answers_table,
						array(
							'id'           => '',
							'Question_id'  => (int) $tsp_new_question_id,
							'Answer_Title' => $tsp_answer_title,
							'Answer_Param' => json_encode( $tsp_answers[ $tsp_arr_key ]['Answer_Param'] ),
							'Answer_Votes' => 0
						),
						array( '%d', '%d', '%s', '%s', '%d' )
					);
					$tsp_sort_arr[] = $wpdb->insert_id;
				}
				$wpdb->update( $tsp_question_table, array( 'Answers_Sort' => implode( ',', $tsp_sort_arr ) ), array( 'id' => (int) $tsp_new_question_id ), array( '%s' ), array( '%d' ) );
				$tsp_response['url'] = add_query_arg( 'tsp-id', $tsp_new_question_id, admin_url( 'admin.php?page=ts-poll-builder' ) );
				wp_send_json_success( $tsp_response );
			} else {
				$str = "[TS_Poll id='". $tsp_question_id ."']";
				$str2 = '[TS_Poll id="'. $tsp_question_id .'"]';
				$str3 = "[Total_Soft_Poll id='". $tsp_question_id ."']";
				$str4 = '[Total_Soft_Poll id="'. $tsp_question_id .'"]';
				$tsp_query_args_wp = array(
					's'=> $str,'posts_per_page' => -1,'post_status' => 'publish'
				);
				$tsp_query_args_wp_two = array(
					's'=> $str2,'posts_per_page' => -1,'post_status' => 'publish'
				);
				$tsp_query_args_wp_three = array(
					's'=> $str3,'posts_per_page' => -1,'post_status' => 'publish'
				);
				$tsp_query_args_wp_four = array(
					's'=> $str4,'posts_per_page' => -1,'post_status' => 'publish'
				);
				$query = new WP_Query( $tsp_query_args_wp );
				if ($query->have_posts()){
				  while ( $query->have_posts() ) {
					$query->the_post();
					$my_post = array(
						'ID'            => get_the_ID(),
						'post_title'   => get_the_title()
					);
					wp_update_post( $my_post );
				  } 
				}
				$query2 = new WP_Query( $tsp_query_args_wp_two );
				if ($query2->have_posts()){
					while ( $query2->have_posts() ) {
					  $query2->the_post();
					  $my_post2 = array(
						  'ID'            => get_the_ID(),
						  'post_title'   => get_the_title()
					  );
					  wp_update_post( $my_post2 );
					} 
				}
				$query3 = new WP_Query( $tsp_query_args_wp_three );
				if ($query3->have_posts()){
					while ( $query3->have_posts() ) {
					  $query3->the_post();
					  $my_post3 = array(
						  'ID'            => get_the_ID(),
						  'post_title'   => get_the_title()
					  );
					  wp_update_post( $my_post3 );
					} 
				}
				$query4 = new WP_Query( $tsp_query_args_wp_four );
				if ($query4->have_posts()){
					while ( $query4->have_posts() ) {
					  $query4->the_post();
					  $my_post4 = array(
						  'ID'            => get_the_ID(),
						  'post_title'   => get_the_title()
					  );
					  wp_update_post( $my_post4 );
					} 
				}
				foreach ( $tsp_answers_sort as $key => $value ) {
					$tsp_arr_key      = sanitize_text_field( $value );
					$tsp_answer_title = sanitize_text_field( htmlentities( stripslashes( $tsp_answers[ $tsp_arr_key ]['Answer_Title'] ), ENT_QUOTES ) );
					foreach ( $tsp_answers[ $tsp_arr_key ]['Answer_Param'] as $param_key => $param_value ) {
						if ( $param_key == 'TotalSoftPoll_Ans_Im' || $param_key == 'TotalSoftPoll_Ans_Vd' ) {
							$tsp_answers[ $tsp_arr_key ]['Answer_Param'][ $param_key ] = sanitize_url( $param_value );
						} else {
							$tsp_answers[ $tsp_arr_key ]['Answer_Param'][ $param_key ] = sanitize_text_field( $param_value );
						}
					}
					if ( strpos( $value, 'new' ) !== false ) {
						$wpdb->insert(
							$tsp_answers_table,
							array(
								'id'           => '',
								'Question_id'  => (int) $tsp_question_id,
								'Answer_Title' => $tsp_answer_title,
								'Answer_Param' => json_encode( $tsp_answers[ $tsp_arr_key ]['Answer_Param'] )
							),
							array( '%d', '%d', '%s', '%s' )
						);
						$tsp_sort_arr[] = $wpdb->insert_id;
					} else {
						$wpdb->update(
							$tsp_answers_table,
							array(
								'Answer_Title' => $tsp_answer_title,
								'Answer_Param' => json_encode( $tsp_answers[ $tsp_arr_key ]['Answer_Param'] )
							),
							array( 'id' => (int) $tsp_arr_key ),
							array( '%s', '%s' ),
							array( '%d' )
						);
						$tsp_sort_arr[] = (int) $tsp_arr_key;
					}
				}
				if ( is_array( $tsp_deleted_answers ) && count( $tsp_deleted_answers ) != 0 ) {
					foreach ( $tsp_deleted_answers as $key => $value ) {
						if ( strpos( sanitize_text_field( $value ), 'new' ) === false ) {
							$wpdb->delete(
								$tsp_answers_table,
								array( 'id' => (int) sanitize_text_field( $value ) ),
								array( '%d' )
							);
						}
					}
				}
				$wpdb->update(
					$tsp_question_table,
					array(
						'Question_Title'    => $tsp_question_title,
						'Question_Param'    => json_encode( $tsp_question_params ),
						'Question_Style'    => json_encode( $tsp_question_styles ),
						'Question_Settings' => json_encode( $tsp_question_settings ),
						'Answers_Sort'      => implode( ',', $tsp_sort_arr ),
						'updated_at'        => date( 'd.m.Y h:i:sa' )
					),
					array( 'id' => (int) $tsp_question_id ),
					array( '%s', '%s', '%s', '%s', '%s', '%s' ),
					array( '%d' )
				);
				$tsp_response['url'] = add_query_arg( 'tsp-id', $tsp_question_id, admin_url( 'admin.php?page=ts-poll-builder' ) );
				wp_send_json_success( $tsp_response );
			}
		} else {
			wp_send_json_error();
		}
	}
	public function tsp_get_field_html( $fieldname, $field, $value ) {
		switch ( $field['type'] ) :
			case 'range':
				$tspRangeBackground = sprintf(
					'linear-gradient(90deg, #8871c3 %1$s, rgba(204, 204, 204, 0.214) %1$s)',
					(100 * ( esc_attr( $value ) - esc_attr( $field['options']['min'] ) ) ) / ( esc_attr( $field['options']['max'] ) - esc_attr( $field['options']['min'] ) ). "%"
				);
				return sprintf(
					'
					<div class="length tsp_range_div" data-tsp-min="%1$s" data-tsp-max="%2$s" >
						<div class="tsp_range_div_title tsp_field_title" data-tsp-field="%4$s" data-tsp-length="%3$s(%7$s)">%8$s:</div>
						<label class="tsp_range_label" for="%4$s">%5$s</label>
						<input id="%4$s"   class="tsp_range_input" @input="tspRangeInput($event)" data-tsp-style="%9$s" type="range" min="%1$s" max="%2$s" value="%3$s" data-tsp-change="%6$s" data-tsp-param="%7$s"  />
			  		</div>
					',
					esc_attr( $field['options']['min'] ),
					esc_attr( $field['options']['max'] ),
					esc_attr( $value ),
					esc_attr( $fieldname ),
					esc_attr( $field['label'] ),
					array_key_exists( 'change', $field ) ? esc_attr( $field['change'] ) : '',
					array_key_exists( 'change_param', $field ) ? esc_attr( $field['change_param'] ) : '',
					esc_attr__( 'length', 'tspoll' ),
					$tspRangeBackground
				);
				break;
			case 'text':
			case 'date':
				return sprintf(
					'
					<div class="tsp_select_div">
						<span class="tsp_select_div_title tsp_field_title">%s</span>
						<input id="%s" @input="tspTextInput($event)" name="%s" type="%s" class="tsp_text_input" value="%s" data-tsp-elem="%s" data-change-prop="%s"/>
					</div>
					',
					esc_attr( $field['label'] ),
					esc_attr( $fieldname ),
					esc_attr( $fieldname ),
					$field['type'] == 'text' ? 'text' : 'date',
					esc_attr( $value ),
					array_key_exists( 'change_elem', $field ) ? esc_attr( $field['change_elem'] ) : '',
					array_key_exists( 'change_attr', $field ) ? esc_attr( $field['change_attr'] ) : ''
				);
				break;
			case 'color':
				return sprintf(
					'
					<div class="tsp_color_div">
						<label class="tsp_color_label" for="%1$s">%2$s</label>
						<tsp-spectrum-picker @update-color="updateColor" color-id="%1$s" change-variable="%4$s" color-value="%3$s" /></tsp-spectrum-picker>
					</div>
					',
					esc_attr( $fieldname ),
					esc_attr( $field['label'] ),
					esc_attr( $value ),
					array_key_exists( 'change_prop', $field ) ? esc_attr( $field['change_prop'] ) : ''
				);
				break;
			case 'input-toggle':
				return sprintf(
					'
					<div class="tsp_checkbox_div" data-tsp-check="%6$s" data-tsp-uncheck="%7$s">
						<input class="tsp_checkbox_input" v-on:click="tspCheckboxInput($event.currentTarget)" type="checkbox" id="%1$s" name="%1$s" %2$s data-change-elem="%4$s" data-change-prop="%5$s"/>
						<label class="tsp_checkbox_label" for="%1$s">%3$s</label>
					</div>
					',
					esc_attr( $fieldname ),
					$value == 'true' ? esc_attr( 'checked' ) : '',
					esc_attr( $field['label'] ),
					array_key_exists( 'change_elem', $field ) ? esc_attr( $field['change_elem'] ) : '',
					array_key_exists( 'change_attr', $field ) ? esc_attr( $field['change_attr'] ) : '',
					array_key_exists( 'yes', $field['options'] ) ? esc_attr( $field['options']['yes'] ) : 'true',
					array_key_exists( 'no', $field['options'] ) ? esc_attr( $field['options']['no'] ) : 'false'
				);
				break;
			case 'select-icon':
				return sprintf(
					'    
					<div class="tsp_icon_picker_div">
						<label id="%s" for="%s">%s</label>
						<div class="ts-poll-icon-picker-wrap" id="%s" data-tsp-field="%s">
							<ul class="icon-picker">
								%s
								<li id="%s" class="ts-poll-select-icon" title="Icon Library" v-on:click="tspOpenIconPicker($event)"><i class="%s"></i></li>
								<input type="hidden" name="icon_value" id="%s" value="%s" data-tsp-elem="%s" data-change-prop="%s">
							</ul>
						</div>
					</div>	
					',
					esc_attr( $fieldname ) . '-icon-picker-wrap-label',
					esc_attr( $fieldname ) . '-icon_value',
					esc_attr( $field['label'] ),
					esc_attr( $fieldname ) . '-icon-picker-wrap',
					esc_attr( $fieldname ),
					$fieldname == 'ts_poll_ch_tbc' || $fieldname == 'ts_poll_ch_tac' ? '' : sprintf( '<li class="tsp-set-icon-none" id="%s" title="None" v-on:click="tspChangeSetIconEmpty($event.currentTarget)"><i class="ts-poll ts-poll-ban"></i></li>', esc_attr( $fieldname ) . '-icon-none' ),
					esc_attr( $fieldname ),
					$fieldname == 'ts_poll_ch_tbc' || $fieldname == 'ts_poll_ch_tac' ? apply_filters("tsp_icon_get_class_value", $value) : esc_attr( $value ),
					esc_attr( $fieldname ) . '-icon_value',
					$fieldname == 'ts_poll_ch_tbc' || $fieldname == 'ts_poll_ch_tac' ? apply_filters("tsp_icon_get_class_value", $value) : esc_attr( $value ),
					array_key_exists( 'change_elem', $field ) ? esc_attr( $field['change_elem'] ) : '',
					array_key_exists( 'change_attr', $field ) ? esc_attr( $field['change_attr'] ) : ''
				);
				break;
			case 'select':
				$tsp_select = '';
				foreach ( $field['options'] as $opt_value => $opt_name ) {
					$tsp_select .= sprintf(
						'<option value="%s" %s>%s</option>',
						esc_attr( $opt_value ),
						$opt_value == $value ? esc_attr( 'selected' ) : esc_attr( '' ),
						esc_html( $opt_name )
					);
				}
				return sprintf( 
					'
					<div class="tsp_select_div">
						<span class="tsp_select_div_title tsp_field_title">%1$s</span>
						<select id="%2$s" name="%2$s" v-on:change="tspSelectOption($event.currentTarget.id)" class="%3$s" data-change-elem="%4$s" data-change-prop="%5$s" />
							%6$s
						</select>
					</div>
					',
					esc_attr( $field['label'] ),
					esc_attr( $fieldname ),
					array_key_exists( 'change_elem', $field ) ? esc_attr( 'tsp_elem_data' ) : esc_attr( 'tsp_root_elem' ),
					array_key_exists( 'change_elem', $field ) ? esc_attr( $field['change_elem'] ) : '',
					array_key_exists( 'change_attr', $field ) ? esc_attr( $field['change_attr'] ) : '',
					$tsp_select 
				);
				break;
			case 'select-position':
				$tsp_select = '';
				foreach ( $field['options'] as $opt_value => $opt_name ) {
					$tsp_select .= sprintf(
						'
						<div class="tsp_position_item %1$s" data-tsp-pos="%2$s" v-on:click.stop.prevent="tspPositionItem($event.currentTarget)" >
							<p class="tsp_flex_col">%3$s</p>
						</div>',
						$opt_value == $value || ( 'ts_poll_tv_pos' === $fieldname && $value === "center" && 'full' === $opt_value ) ? esc_attr( 'tsp_active' ) : esc_attr( '' ),
						esc_attr( $opt_value ),
						esc_html( $opt_name )
					);
				}
				return sprintf(
					'
					<div class="tsp_select_div"><span class="tsp_select_div_title tsp_field_title">%s</span>
						<div class="tsp_position_select  tsp_flex_row" data-tsp="%s" data-tsp-select="%s" data-change-elem="%s" data-change-prop="%s">
							%s
						</div>
					</div>	
					',
					esc_attr( $field['label'] ),
					array_key_exists( 'full', $field['options'] ) ? 'btn' : 'div',
					esc_attr( $fieldname ),
					array_key_exists( 'change_elem', $field ) ? esc_attr( $field['change_elem'] ) : '',
					array_key_exists( 'change_attr', $field ) ? esc_attr( $field['change_attr'] ) : '',
					$tsp_select
				);
				break;
			case 'select-position-image':
				$tsp_select = '';
				foreach ( $field['options'] as $opt_value => $opt_name ) {
					$tsp_select .= sprintf(
						'
						<div class="tsp_position_item %s" data-tsp-pos="%s">
							<img class="tsp_position_image tsp_flex_col" src="%s">
						</div>
						',
						$opt_value == $value ? esc_attr( 'tsp_active' ) : esc_attr( '' ),
						esc_attr( $opt_value ),
						esc_html( $opt_name )
					);
				}
				return sprintf(
					'
					<div class="tsp_select_div"><span class="tsp_select_div_title tsp_field_title">%s</span>
						<div class="tsp_position_select tsp_flex_row" data-tsp="image" data-tsp-select="%s" data-change-elem="%s" data-change-prop="%s">
							%s
						</div>
					</div>	
					',
					esc_attr( $field['label'] ),
					esc_attr( $fieldname ),
					array_key_exists( 'change_elem', $field ) ? esc_attr( $field['change_elem'] ) : '',
					array_key_exists( 'change_attr', $field ) ? esc_attr( $field['change_attr'] ) : '',
					$tsp_select
				);
				break;
			case 'wp_media_image':
				$tsp_image_id_ = $tsp_image_url_ = '';
				if ( $value == '' ) {
					$tsp_image_id_ = $tsp_image_url_ = plugin_dir_url( __DIR__ ) . 'public/img/tsp_no_img.jpg';
				} else {
					if ( is_numeric( attachment_url_to_postid( $value ) ) ) {
						$tsp_image_id_  = attachment_url_to_postid( $value );
						$tsp_image_url_ = $value;
					} else {
						$tsp_image_id_ = $tsp_image_url_ = $value;
					}
				}
				return sprintf(
					'
                  	<div class="tsp_img_div_edit">
                  	  	<span class="tsp_field_title">Question image</span>
						<tsp-image-picker  img-src="%1$s" img-id="%2$s" img-load="%3$s" /></tsp-image-picker>
                  	</div>
                  	',
					esc_url( $tsp_image_url_ ),
					is_int( $tsp_image_id_ ) ? esc_attr( $tsp_image_id_ ) : esc_url( $tsp_image_id_ ),
					esc_url( plugin_dir_url( __DIR__ ) . 'public/img/tsp_loading.gif' )
				);
				break;
			case 'wp_media_video':
				global $wp_embed;
				$tsp_video_id_ = $tsp_video_url_ = '';
				if ( $value != '' ) {
					if ( is_numeric( attachment_url_to_postid( $value ) ) ) {
						$tsp_video_id_  = attachment_url_to_postid( $value );
						$tsp_video_url_ = $value;
					} else {
						$tsp_video_id_ = $tsp_video_url_ = $value;
					}
				}
				return sprintf(
					'
					<div class="tsp_video_div_edit">
					  	<span class="tsp_field_title">Question video</span>
						<tsp-video-picker   video-src="%1$s" video-load="%2$s"  /></tsp-video-picker>
					</div>
					',
					esc_url( $tsp_video_url_ ),
					esc_url( plugin_dir_url( __DIR__ ) . 'public/img/tsp_loading.gif' )
				);
				break;
		endswitch;
	}
	public function screen_option() {
		$option = 'per_page';
		$args   = array(
			'label'   => esc_html__( 'Polls per page', 'tspoll' ),
			'default' => 10,
			'option'  => 'ts_polls_per_page'
		);
		add_screen_option( $option, $args );
		$this->ts_poll_question_obj = new ts_poll_list_table();
	}
	public function ts_poll_admin_menu() {
		$hook = add_menu_page(
			$this->plugin_name,
			esc_html( 'TS Poll' ),
			'manage_options',
			'ts-poll',
			array( $this, 'get_ts_poll_admin_polls' ),
			esc_url( plugin_dir_url( __FILE__ ) . 'img/ts_poll_logo_sm.png' )
		);
		add_action( "load-$hook", array( $this, 'screen_option' ) );
	}
	public function ts_poll_admin_sub() {
		$hooks = add_submenu_page(
			'ts-poll',
			esc_html__( 'All TS Poll', 'tspoll' ),
			esc_html__( 'All Polls', 'tspoll' ),
			'manage_options',
			'ts-poll',
			array( $this, 'get_ts_poll_admin_polls' )
		);
		add_action( "load-$hooks", array( $this, 'screen_option' ) );
	}
	public function ts_poll_builder_sub() {
		add_submenu_page(
			'ts-poll',
			esc_html__( 'TS Poll Builder', 'tspoll' ),
			esc_html__( 'Add Poll', 'tspoll' ),
			'manage_options',
			'ts-poll-builder',
			array( $this, 'get_ts_poll_builder' )
		);
	}
	public function ts_poll_pro_sub() {
		add_submenu_page(
			'ts-poll',
			esc_html__( 'TS Poll Pro Features', 'tspoll' ),
			esc_html__( 'Pro Features', 'tspoll' ),
			'manage_options',
			'ts-poll-pro',
			array( $this, 'get_ts_poll_pro' )
		);
	}
	public function ts_poll_addons_sub() {
		add_submenu_page(
			'ts-poll',
			esc_html__( 'TS Poll Add-Ons', 'tspoll' ),
			esc_html__( 'Add-Ons', 'tspoll' ),
			'manage_options',
			'ts-poll-add-ons',
			array( $this, 'get_ts_poll_add_ons' )
		);
	}
	public function get_ts_poll_admin_polls() {
		include_once 'ts_poll_admin.php';
	}
	public function get_ts_poll_builder() {
		include_once 'ts_poll_builder.php';
	}
	public function get_ts_poll_pro() {
		include_once 'ts_poll_pro_features.php';
	}
	public function get_ts_poll_add_ons() {
		include_once 'ts_poll_add_ons.php';
	}
}
