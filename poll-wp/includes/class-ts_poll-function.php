<?php
class ts_poll_function {
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
	private $ts_poll_fonts;
	private $ts_poll_fonts_array;
	private $ts_poll_themes;
	private $tsp_theme_names;
	public function __construct() {
		$this->set_fonts();
		$this->ts_poll_themes = $this->get_json('themes');
		$this->tsp_theme_names = array(
			'standard_poll'           => 'Standard Poll',
			'image_poll'              => 'Image Poll',
			'video_poll'              => 'Video Poll',
			'standard_without_button' => 'Standard Without Button',
			'image_without_button'    => 'Image Without Button',
			'video_without_button'    => 'Video Without Button',
			'image_in_question'       => 'Image in Question',
			'video_in_question'       => 'Video in Question'
		);
		add_filter( "tsp_get_all_fonts", array( $this, 'tsp_get_all_fonts' ) , 10 ,1 );
		add_filter( "tsp_icon_get_class_value", array( $this, 'tsp_icon_get_class_value' ) , 10 ,1 );
		add_filter( "tsp_get_font_face", array( $this, 'tsp_get_font_face' ) , 10 ,1 );
		add_filter( "tsp_get_theme_params", array( $this, 'tsp_get_theme_params' ) , 10 ,1 );
		add_filter( "tsp_get_all_params", array( $this, 'tsp_get_all_params' ) , 10, 4 );
	}
	public function set_fonts() {
		$this->ts_poll_fonts = array(
			'tsp_fonts' => array(
				'tsp_emojies' => $this->get_json('emojies'),
				'tsp_fontawesome' => $this->get_json('fontawesome')
			),
			'tsp_font_families' => $this->get_json('font_families')
		);
		$this->ts_poll_fonts_array = array_merge( $this->ts_poll_fonts['tsp_fonts']['tsp_emojies'], $this->ts_poll_fonts['tsp_fonts']['tsp_fontawesome'] );
    }
	public function get_json( $file_key ){
        $json_path = TS_POLL_PLUGIN_ENV . 'json/'. $file_key .'.json';
        if (!file_exists($json_path)) return [];
        $json_data = file_get_contents($json_path);
        $return_data = json_decode($json_data, true);
		if ($return_data === null && json_last_error() !== JSON_ERROR_NONE) {
			return [];
		} else {
			return $return_data;
		}
	}
	public function tsp_icon_swap( $tsp_question_style, $bool ) {
		$tspoll_icon_swap_arr     = array( 'ts_poll_i_it', 'ts_poll_ch_tbc', 'ts_poll_ch_tac', 'ts_poll_vt_it', 'ts_poll_vb_it', 'ts_poll_rb_it', 'ts_poll_p_bb_it', 'ts_poll_bb_it', 'ts_poll_pop_it', 'ts_poll_play_it' );
		foreach ( $tspoll_icon_swap_arr as $key ) {
			if ( array_key_exists( $key, $tsp_question_style ) ) {
				$value = $tsp_question_style[$key];
				$value_length = strlen( $value );
				if ( $key != 'ts_poll_ch_tbc' && $key != 'ts_poll_ch_tac' ) {
					if ( $value_length == 4 ) {
						if ( $value == 'none' || $value == 'None' ) {
							$tsp_question_style[$key] =  'ts-poll ts-poll-none';
						} else {
							if ( array_key_exists( $value, $this->ts_poll_fonts_array ) ) {
								$tsp_question_style[$key] =  $this->ts_poll_fonts_array[ $value ];
							} else {
								$tsp_question_style[$key] =  'ts-poll ts-poll-none';
							}
						}
					} elseif ( $value == '' ) {
						$tsp_question_style[$key] = 'ts-poll ts-poll-none';
					} else {
						$tsp_question_style[$key] = $value;
					}
				} else {
					if ( $bool == true) {
						if ( $value_length != 4 ) {
							if ( in_array( $value, $this->ts_poll_fonts_array ) ) {
								$encode_key = array_search( $value, $this->ts_poll_fonts_array );
								$tsp_question_style[$key] = $encode_key;
							} else {
								if ( $key == 'ts_poll_ch_tbc' ) {
									$tsp_question_style[$key] = 'f10c';
								} else {
									$tsp_question_style[$key] = 'f192';
								}
							}
						} else {
							$tsp_question_style[$key] = $value;
						}
					} else {
						if ( $value_length == 4 ) {
							if ( $value == 'none' || $value == 'None' ) {
								if ( $key == 'ts_poll_ch_tbc' ) {
									  $tsp_question_style[$key] = 'ts-poll ts-poll-circle-o';
								} else {
									$tsp_question_style[$key] = 'ts-poll ts-poll-dot-circle-o';
								}
							} else {
								if ( array_key_exists( $value, $this->ts_poll_fonts_array ) ) {
									$tsp_question_style[$key] = $this->ts_poll_fonts_array[ $value ];
								} else {
									if ( $key == 'ts_poll_ch_tbc' ) {
										$tsp_question_style[$key] = 'ts-poll ts-poll-circle-o';
									} else {
										$tsp_question_style[$key] = 'ts-poll ts-poll-dot-circle-o';
									}
								}
							}
						} elseif ( $value == '' ) {
							if ( $key == 'ts_poll_ch_tbc' ) {
								$tsp_question_style[$key] = 'ts-poll ts-poll-circle-o';
							} else {
								$tsp_question_style[$key] = 'ts-poll ts-poll-dot-circle-o';
							}
						} else {
							$tsp_question_style[$key] = $value;
						}
					}
				}
			}
		}
		return $tsp_question_style;
	}
	public function tsp_icon_get_class_value( $value ) {
		if ( strlen( $value ) == 4 ) {
			if ( array_key_exists( $value, $this->ts_poll_fonts_array ) ) {
				return $this->ts_poll_fonts_array[ $value ];
			} else {
				return $value;
			}
		} else {
			return $value;
		}
	}
	public function tsp_get_all_fonts($argument) {
		return $this->ts_poll_fonts;
	}
	public function tsp_get_all_params($tsp_id,$tsp_saved,$tsp_shortcode,$tsp_from_builder) {
		global $wpdb;
		$ts_poll_question_table = esc_sql( $wpdb->prefix . 'ts_poll_questions' );
		$ts_poll_answers_table = esc_sql( $wpdb->prefix . 'ts_poll_answers' );
		if (true === $tsp_saved) {
			$ts_poll_question_check = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $ts_poll_question_table WHERE id = %d", (int) $tsp_id ) );
			$ts_poll_answers_check = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $ts_poll_answers_table WHERE Question_id = %d", (int) $tsp_id ) );
			if ( $ts_poll_question_check == 0 || $ts_poll_answers_check == 0 ) { return false; }
			$ts_poll_question_query = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $ts_poll_question_table WHERE id = %d", (int) $tsp_id ), ARRAY_A );
			$ts_poll_answers_query  = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ts_poll_answers_table WHERE Question_id = %d", (int) $tsp_id ),ARRAY_A );
			$ts_poll_question_query['Question_Style'] = json_decode( $ts_poll_question_query['Question_Style'], true );
			$ts_poll_question_query['Question_Param'] = json_decode( $ts_poll_question_query['Question_Param'], true );
			$ts_poll_question_query['Question_Settings'] = json_decode( $ts_poll_question_query['Question_Settings'], true );
			$ts_poll_question_query['Question_Style'] = $this->tsp_icon_swap($ts_poll_question_query['Question_Style'],$tsp_shortcode);
			$ts_poll_question_query['answers_count'] = count($ts_poll_answers_query);
			$ts_poll_question_query['Answers'] = $this->tsp_get_sorted_answers($ts_poll_question_query['answers_count'],$ts_poll_question_query['Answers_Sort'],$ts_poll_answers_query,$tsp_saved);
			if ($tsp_from_builder === true) {
				$tsp_total_votes_count = array_sum( array_column( $ts_poll_question_query['Answers'], 'Answer_Votes' ) );
				$tsp_votes_total_divider =  $tsp_total_votes_count != 0 ? $tsp_total_votes_count : 1;
				foreach ( $ts_poll_question_query['Answers'] as $tsp_response_key => $tsp_response_value ) {
					$ts_poll_question_query['Answers'][$tsp_response_key]['tsp_result_percent'] = $ts_poll_question_query['Question_Settings']['TotalSoft_Poll_Set_01'] == "true" ? round( $tsp_response_value["Answer_Votes"] * 100 / $tsp_votes_total_divider, 2 ) : 100;
					$ts_poll_question_query['Answers'][$tsp_response_key]['img_src'] = $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ? esc_url( plugins_url( 'public/img/tsp_no_img.jpg', __DIR__ ) ) : esc_url( $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] );
				}
			}
			foreach ( $ts_poll_question_query['Answers'] as $tsp_response_key => $tsp_response_value ) {
				$ts_poll_question_query['Answers'][$tsp_response_key]['Answer_Title'] = html_entity_decode( htmlspecialchars_decode( esc_html( $ts_poll_question_query['Answers'][$tsp_response_key]['Answer_Title'] ), ENT_QUOTES ) );
			}
			if ( array_key_exists("ts_poll_ch_s", $ts_poll_question_query['Question_Style'] ) ) {
				if ( ! is_numeric( $ts_poll_question_query['Question_Style']["ts_poll_ch_s"] ) ) {
					if ( $ts_poll_question_query['Question_Style']["ts_poll_ch_s"] == 'big' ) {
						$ts_poll_question_query['Question_Style']["ts_poll_ch_s"] = '32';
					} elseif ( $ts_poll_question_query['Question_Style']["ts_poll_ch_s"] == 'medium 2' ) {
						$ts_poll_question_query['Question_Style']["ts_poll_ch_s"] = '26';
					} elseif ( $ts_poll_question_query['Question_Style']["ts_poll_ch_s"] == 'medium 1' ) {
						$ts_poll_question_query['Question_Style']["ts_poll_ch_s"] = '22';
					} elseif ( $ts_poll_question_query['Question_Style']["ts_poll_ch_s"] == 'small' ) {
						$ts_poll_question_query['Question_Style']["ts_poll_ch_s"] = '18';
					} else {
						$ts_poll_question_query['Question_Style']["ts_poll_ch_s"] == '22';
					}
				}
			}
			if ($ts_poll_question_query["Question_Param"]["TS_Poll_Q_Theme"] === "Image Without Button") {
				foreach ($ts_poll_question_query['Answers'] as $tsp_response_key => $tsp_response_value) {
					$tsp_check_embed = "";
					$tsp_check_embed = sprintf(
						'
						<div class="tsp_embed_popup_inner tsp_video_popup_embed">
							<img src="%1$s" alt="%2$s">
						</div>
						',
						$tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ? esc_url( plugin_dir_url( __DIR__ ) . '/public/img/tsp_no_img.jpg' ) : esc_url( $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] ),
						$tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ?  esc_html("No Image avaible" )  : html_entity_decode( htmlspecialchars_decode( $tsp_response_value['Answer_Title'] ), ENT_QUOTES )
					);
					$ts_poll_question_query['Answers'][$tsp_response_key]["embed"] = $tsp_check_embed;
				}
			}
			return $ts_poll_question_query;
		} else if (false === $tsp_saved) {
			$tsp_check_embed = "";
			switch ($this->tsp_theme_names[$tsp_id]) {
				case 'Video Poll':
				case 'Video Without Button':
				case 'Image Without Button':
					$tsp_check_embed = sprintf(
						'
						<div class="tsp_embed_popup_inner tsp_video_popup_embed">
							<img src="%1$s" alt="%2$s">
						</div>
						',
						$this->tsp_theme_names[$tsp_id] === "Image Without Button" ? esc_url( plugin_dir_url( __DIR__ ) . '/public/img/tsp_no_img.jpg' ) : esc_url( plugin_dir_url( __DIR__ ) . '/public/img/tsp_no_video.png' ),
						$this->tsp_theme_names[$tsp_id] === "Image Without Button" ? esc_html("No Image avaible") : esc_html("No Video avaible")
					);
					break;
				default:
					$tsp_check_embed = "";
					break;
			}
			$ts_poll_question_query = array(
				'id' => $tsp_id,
				'Question_Title'    => 'Do You Like Our Plugin?',
				'Question_Settings' => array(
					'TotalSoft_Poll_Set_01' => 'true',
					'TotalSoft_Poll_Set_02' => '',
					'TotalSoft_Poll_Set_03' => '',
					'TotalSoft_Poll_Set_04' => 'Coming Soon',
					'TotalSoft_Poll_Set_05' => 'Thank You !',
					'TotalSoft_Poll_Set_06' => 'rgba(209,209,209,0.79)',
					'TotalSoft_Poll_Set_07' => '#000000',
					'TotalSoft_Poll_Set_08' => '32',
					'TotalSoft_Poll_Set_09' => 'Cairo',
					'TotalSoft_Poll_Set_10' => 'false',
					'TotalSoft_Poll_Set_11' => 'ipaddress'
				),
				'Question_Param'    => array(
					'TS_Poll_Q_Theme'    => $this->tsp_theme_names[$tsp_id],
					'TotalSoftPoll_Q_Im' => '',
					'TotalSoftPoll_Q_Vd' => ''
				),
				'Answers_Sort'      => 'new-1,new-2,new-3,new-4,new-5',
				'Answers'           => array(
					'new-1' => array(
						'id'           => 'new-1',
						'Question_id'  => $tsp_id,
						'Answer_Title' => 'The Best Plugin Ever',
						'Answer_Votes' => '0',
						'Answer_Param' => array(
							'TotalSoftPoll_Ans_Im' => '',
							'TotalSoftPoll_Ans_Vd' => '',
							'TotalSoftPoll_Ans_Cl' => '#dd3333'
						),
						'embed' =>  $tsp_check_embed
					),
					'new-2' => array(
						'id'           => 'new-2',
						'Question_id'  => $tsp_id,
						'Answer_Title' => 'Of Course',
						'Answer_Votes' => '0',
						'Answer_Param' => array(
							'TotalSoftPoll_Ans_Im' => '',
							'TotalSoftPoll_Ans_Vd' => '',
							'TotalSoftPoll_Ans_Cl' => '#dd9933'
						),
						'embed' =>  $tsp_check_embed
					),
					'new-3' => array(
						'id'           => 'new-3',
						'Question_id'  => $tsp_id,
						'Answer_Title' => 'Not at All',
						'Answer_Votes' => '0',
						'Answer_Param' => array(
							'TotalSoftPoll_Ans_Im' => '',
							'TotalSoftPoll_Ans_Vd' => '',
							'TotalSoftPoll_Ans_Cl' => '#81d742'
						),
						'embed' =>  $tsp_check_embed
					),
					'new-4' => array(
						'id'           => 'new-4',
						'Question_id'  => $tsp_id,
						'Answer_Title' => 'No',
						'Answer_Votes' => '0',
						'Answer_Param' => array(
							'TotalSoftPoll_Ans_Im' => '',
							'TotalSoftPoll_Ans_Vd' => '',
							'TotalSoftPoll_Ans_Cl' => '#1e73be'
						),
						'embed' =>  $tsp_check_embed
					),
					'new-5' => array(
						'id'           => 'new-5',
						'Question_id'  => $tsp_id,
						'Answer_Title' => 'Yes',
						'Answer_Votes' => '0',
						'Answer_Param' => array(
							'TotalSoftPoll_Ans_Im' => '',
							'TotalSoftPoll_Ans_Vd' => '',
							'TotalSoftPoll_Ans_Cl' => '#8224e3'
						),
						'embed' =>  $tsp_check_embed
					),
				),
				'created_at'        => date( 'd.m.Y h:i:sa' ),
				'updated_at'        => date( 'd.m.Y h:i:sa' )
			);
			$ts_poll_question_query['Question_Style'] = $this->ts_poll_themes[$tsp_id];
			$ts_poll_question_query['Question_Style'] = $this->tsp_icon_swap($ts_poll_question_query['Question_Style'],$tsp_shortcode);
			$ts_poll_question_query['answers_count'] = count($ts_poll_question_query['Answers']);
			$ts_poll_question_query['Answers'] = $this->tsp_get_sorted_answers($ts_poll_question_query['answers_count'],$ts_poll_question_query['Answers_Sort'],$ts_poll_question_query['Answers'],$tsp_saved);
			if ($tsp_from_builder === true) {
				$tsp_total_votes_count = array_sum( array_column( $ts_poll_question_query['Answers'], 'Answer_Votes' ) );
				$tsp_votes_total_divider =  $tsp_total_votes_count != 0 ? $tsp_total_votes_count : 1;
				foreach ( $ts_poll_question_query['Answers'] as $tsp_response_key => $tsp_response_value ) {
					$ts_poll_question_query['Answers'][$tsp_response_key]['tsp_result_percent'] = $ts_poll_question_query['Question_Settings']['TotalSoft_Poll_Set_01'] == "true" ? round( $tsp_response_value["Answer_Votes"] * 100 / $tsp_votes_total_divider, 2 ) : 100;
					$ts_poll_question_query['Answers'][$tsp_response_key]['img_src'] = $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] == '' ? esc_url( plugins_url( 'public/img/tsp_no_img.jpg', __DIR__ ) ) : esc_url( $tsp_response_value["Answer_Param"]["TotalSoftPoll_Ans_Im"] );
				}
			}
			if ( array_key_exists("ts_poll_ch_s", $ts_poll_question_query['Question_Style'] ) ) {
				if ( ! is_numeric( $ts_poll_question_query['Question_Style']["ts_poll_ch_s"] ) ) {
					if ( $ts_poll_question_query['Question_Style']["ts_poll_ch_s"] == 'big' ) {
						$ts_poll_question_query['Question_Style']["ts_poll_ch_s"] = '32';
					} elseif ( $ts_poll_question_query['Question_Style']["ts_poll_ch_s"] == 'medium 2' ) {
						$ts_poll_question_query['Question_Style']["ts_poll_ch_s"] = '26';
					} elseif ( $ts_poll_question_query['Question_Style']["ts_poll_ch_s"] == 'medium 1' ) {
						$ts_poll_question_query['Question_Style']["ts_poll_ch_s"] = '22';
					} elseif ( $ts_poll_question_query['Question_Style']["ts_poll_ch_s"] == 'small' ) {
						$ts_poll_question_query['Question_Style']["ts_poll_ch_s"] = '18';
					} else {
						$ts_poll_question_query['Question_Style']["ts_poll_ch_s"] == '22';
					}
				}
			}
			return $ts_poll_question_query;
		}
		return false;
	}
	public function tsp_get_theme_params( $theme_id ) {
		if ( array_key_exists( $theme_id, $this->ts_poll_themes ) ) {
			return $this->ts_poll_themes[ $theme_id ];
		} else {
			return array();
		}
	}
	public function tsp_get_font_face( $value ) {
		if ( array_key_exists( $value, $this->ts_poll_fonts['tsp_font_families'] ) ) {
			return sprintf(
				'
				  @font-face {
					font-family: "%1$s";
					font-style: normal;
					font-weight: 400;
					src: url("%2$s"); 
					src: url("%3$s") format("embedded-opentype"), 
						 url("%4$s") format("woff2"), 
						 url("%5$s") format("woff"), 
						 url("%6$s") format("truetype"), 
						 url("%7$s") format("svg");
				  }
				',
				esc_attr( $value ),
				array_key_exists( 'eot', $this->ts_poll_fonts['tsp_font_families'][ $value ] ) ? esc_url( $this->ts_poll_fonts['tsp_font_families'][ $value ]['eot'] ) : '',
				array_key_exists( 'eot', $this->ts_poll_fonts['tsp_font_families'][ $value ] ) ? esc_url( $this->ts_poll_fonts['tsp_font_families'][ $value ]['eot'] ) : '',
				array_key_exists( 'woff2', $this->ts_poll_fonts['tsp_font_families'][ $value ] ) ? esc_url( $this->ts_poll_fonts['tsp_font_families'][ $value ]['woff2'] ) : '',
				array_key_exists( 'woff', $this->ts_poll_fonts['tsp_font_families'][ $value ] ) ? esc_url( $this->ts_poll_fonts['tsp_font_families'][ $value ]['woff'] ) : '',
				array_key_exists( 'ttf', $this->ts_poll_fonts['tsp_font_families'][ $value ] ) ? esc_url( $this->ts_poll_fonts['tsp_font_families'][ $value ]['ttf'] ) : '',
				array_key_exists( 'svg', $this->ts_poll_fonts['tsp_font_families'][ $value ] ) ? esc_url( $this->ts_poll_fonts['tsp_font_families'][ $value ]['svg'] ) : ''
			);
		} else {
			return false;
		}
	}
	public function tsp_get_sorted_answers($tsp_answers_count,$tsp_answers_sort,$tsp_answers,$tsp_saved_bool){
		$ts_poll_answers_order = $ts_poll_answers_columned =  [];
		if ( $tsp_answers_count > 1 ) {
			$ts_poll_answers_order = explode( ',', $tsp_answers_sort );
		} elseif ( $tsp_answers_count == 1 ) {
			$ts_poll_answers_order = array( $tsp_answers_sort );
		}
		$ts_poll_answers_columned = array_column( $tsp_answers, null, 'id' );
		foreach ($ts_poll_answers_columned as $key => $value) {
			if (array_key_exists("Answer_Param",$value)) {
				if ($tsp_saved_bool === true) {
					$ts_poll_answers_columned[$key]["Answer_Param"] = json_decode($ts_poll_answers_columned[$key]["Answer_Param"],true);
				}
			}else {
				$ts_poll_answers_columned[$key]["Answer_Param"] = array(
					'TotalSoftPoll_Ans_Im' => '',
					'TotalSoftPoll_Ans_Vd' => '',
					'TotalSoftPoll_Ans_Cl' => '#dd3333'
				);
			}
		}
		uksort(
			$ts_poll_answers_columned,
			function( $x, $y ) use ( $ts_poll_answers_order ) {
				if ( (int) array_search( $x, $ts_poll_answers_order ) == (int) array_search( $y, $ts_poll_answers_order ) ) {
					return 0;
				}
				return ( (int) array_search( $x, $ts_poll_answers_order ) < (int) array_search( $y, $ts_poll_answers_order ) ) ? -1 : 1;
			}
		);
		return array_values( $ts_poll_answers_columned );
	}
	public function tsp_import_template($ts_template_id){
		$ts_templates_arr = $this->get_json('templates');
		if (array_key_exists($ts_template_id,$ts_templates_arr)) {
			$ts_template_array = $ts_templates_arr[$ts_template_id];
			$ts_title = sanitize_text_field( htmlspecialchars( stripslashes( $ts_template_array['title'] ), ENT_QUOTES ) );
			global $wpdb;
			$tsp_question_table = $wpdb->prefix . 'ts_poll_questions';
			$tsp_answers_table  = $wpdb->prefix . 'ts_poll_answers';
			$tsp_answers        = $ts_template_array['answers'];
			$tsp_styles   		= $ts_template_array['styles'];
			$tsp_parameters   	= $ts_template_array['parameters'];
			$tsp_settings 		= $ts_template_array['settings'];
			$tsp_answers_order  = array();
			foreach ( $tsp_styles as $key => $value ) {
				$tsp_styles[ $key ] = sanitize_text_field( htmlentities( stripslashes( $value ), ENT_QUOTES ) );
			}
			foreach ( $tsp_parameters as $key => $value ) {
				if ( $key == 'TS_Poll_Q_Theme' ) {
					$tsp_parameters[ $key ] = sanitize_text_field( $value );
				} else {
					$tsp_parameters[ $key ] = sanitize_url( $value );
				}
			}
			foreach ( $tsp_settings as $key => $value ) {
				$tsp_settings[ $key ] = sanitize_text_field( htmlentities( stripslashes( $value ), ENT_QUOTES ) );
			}
			$wpdb->insert(
				$tsp_question_table,
				array(
					'id'                => '',
					'Question_Title'    => $ts_title,
					'Question_Param'    => json_encode( $tsp_parameters ),
					'Question_Style'    => json_encode( $tsp_styles ),
					'Question_Settings' => json_encode( $tsp_settings ),
					'Answers_Sort'      => '',
					'created_at'        => date( 'd.m.Y h:i:sa' ),
					'updated_at'        => date( 'd.m.Y h:i:sa' )
				),
				array( '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
			);
			$tsp_insert_id = $wpdb->insert_id;
			foreach ( $tsp_answers as $tsp_answers_key => $tsp_answers_value ) {
				$tsp_answer_param = $tsp_answers_value['Answer_Param'];
				foreach ( $tsp_answer_param as $tsp_answer_param_key => $tsp_answer_param_value ) {
					if ( $tsp_answer_param_key === 'TotalSoftPoll_Ans_Vd' || $tsp_answer_param_key === 'TotalSoftPoll_Ans_Im' ) {
						$tsp_answer_param[ $tsp_answer_param_key ] = sanitize_url( $tsp_answer_param_value );
					} else {
						$tsp_answer_param[ $tsp_answer_param_key ] = sanitize_text_field( $tsp_answer_param_value );
					}
				}
				$wpdb->insert(
					$tsp_answers_table,
					array(
						'id'           => '',
						'Question_id'  => (int) $tsp_insert_id,
						'Answer_Title' => htmlspecialchars( sanitize_text_field( stripslashes( $tsp_answers_value['Answer_Title'] ) ), ENT_QUOTES ),
						'Answer_Param' => json_encode( $tsp_answer_param ),
						'Answer_Votes' => 0
					),
					array( '%d', '%d', '%s', '%s', '%d' )
				);
				$tsp_answers_order[] = $wpdb->insert_id;
			}
			$wpdb->update( $tsp_question_table, array( 'Answers_Sort' => implode( ',', $tsp_answers_order ) ), array( 'id' => (int) $tsp_insert_id ), array( '%s' ), array( '%d' ) );
			return $tsp_insert_id;
		}
		return false;
	}
}
