<?php 
	if ( $ts_poll_question_params["TS_Poll_Q_Theme"] != 'Image Without Button' && $ts_poll_question_params["TS_Poll_Q_Theme"] != 'Video Without Button' ) {
		$ts_poll_generated_css .= sprintf(
			'
			:root{
				--tsp_before_check_c_%1$s:%2$s;
				--tsp_after_check_c_%1$s:%3$s;
				--tsp_before_check_%1$s:"\%4$s";
				--tsp_after_check_%1$s:"\%5$s";
			}	
			',
			esc_html( $total_soft_poll ),
			array_key_exists("ts_poll_ch_cbc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_ch_cbc"] ) ) : "",
			array_key_exists("ts_poll_ch_cac",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_ch_cac"] ) ) : "",
			array_key_exists("ts_poll_ch_tbc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_ch_tbc"] ) ) : "",
			array_key_exists("ts_poll_ch_tac",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_ch_tac"] ) ) : ""
		);
	}
	$ts_poll_generated_css .= sprintf(
		'
		:root{
			--tsp_answer_fs_%1$s:%2$s;
			--tsp_main_bgc_%1$s:%3$s;
			--tsp_answer_bgc_%1$s:%4$s;
			--tsp_answer_h_bgc_%1$s:%5$s;
			--tsp_answer_h_c_%1$s:%6$s;
			--tsp_answer_c_%1$s:%7$s;
			--tsp_answer_ff_%1$s:%8$s;
			--tsp_main_l_bw_%1$s:%9$s;
			--tsp_main_l_bh_%1$s:%10$s;
			--tsp_main_l_bc_%1$s:%11$s;
			--tsp_main_l_bs_%1$s:%12$s;
		}
		.tsp_flex_col {
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
		.tsp_flex_row {
			display: -ms-flexbox;
			display: -webkit-flex;
			display: flex;
			-webkit-flex-direction: row;
			-ms-flex-direction: row;
			flex-direction: row;
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
		footer.ts_poll_footer_%1$s button{
			font-weight:normal !important;
		}
		footer.ts_poll_footer_%1$s button:focus{
			outline: none !important;
		}
		form.ts_poll_form_%1$s[max-width~="450px"] div.ts_poll_section_%1$s{
			width: 100%% !important;
		}
		
		div.ts_poll_section_%1$s[max-width~="250px"] footer.ts_poll_footer_%1$s button {
			width: 98%% !important;
			margin: 5px 1%% !important;
		}
		main.ts_poll_main_%1$s >  div.ts_poll_after_line_%1$s {
			width: var(--tsp_main_l_bw_%1$s);
			margin-top: 5px;
			border-top: var(--tsp_main_l_bh_%1$s) var(--tsp_main_l_bs_%1$s) var(--tsp_main_l_bc_%1$s);
		}
		',
		esc_html( $total_soft_poll ),
		array_key_exists("ts_poll_a_fs",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_a_fs"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists("ts_poll_a_mbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string',  esc_html( $tspoll_question_styles["ts_poll_a_mbgc"] ) ) : "",
		array_key_exists("ts_poll_a_bgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string',  esc_html( $tspoll_question_styles["ts_poll_a_bgc"] ) ) : "",
		array_key_exists("ts_poll_a_hbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string',  esc_html( $tspoll_question_styles["ts_poll_a_hbgc"] ) ) : "",
		array_key_exists("ts_poll_a_hc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string',  esc_html( $tspoll_question_styles["ts_poll_a_hc"] ) ) : "",
		array_key_exists("ts_poll_a_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string',  esc_html( $tspoll_question_styles["ts_poll_a_c"] ) ) : "",
		array_key_exists("ts_poll_boxsh",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string',  esc_html( $tspoll_question_styles["ts_poll_boxsh"] ) ) : "",
		array_key_exists("ts_poll_laa_w",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_laa_w"] ), FILTER_VALIDATE_INT ) . "%" : "",
		array_key_exists("ts_poll_laa_h",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_laa_h"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists("ts_poll_laa_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string',  esc_html( $tspoll_question_styles["ts_poll_laa_c"] ) )  : "",
		array_key_exists("ts_poll_laa_s",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string',  esc_html( $tspoll_question_styles["ts_poll_laa_s"] ) )  : ""
	);
	if ( ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standard Poll' && $ts_poll_old_standard === '' ) || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standart Without Button' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standard Without Button'
			|| $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Without Button' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Without Button'
			|| $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image in Question' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video in Question'
	) {
		$ts_poll_generated_css .= sprintf(
			'
			main.ts_poll_main_%1$s  > .ts_poll_answer span.ts_poll_r_progress{ 
				background-repeat:unset !important;
			}
			main.ts_poll_main_%1$s[data-tsp-veff="2"]  > .ts_poll_answer span.ts_poll_r_progress{ 
				background-size: 30px 30px;
				-moz-background-size: 30px 30px;
				-webkit-background-size: 30px 30px;
				-o-background-size: 30px 30px;
				background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0)), color-stop(100%%, rgba(255, 255, 255, 0)));
				background-image: -o-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -ms-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;
				-moz-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;
				-webkit-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;
				filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr="#33ffffff", endColorstr="#33000000", GradientType=0);
				animation: TSprogress 2s linear infinite;
				-moz-animation: TSprogress 2s linear infinite;
				-webkit-animation: TSprogress 2s linear infinite;
			}
			main.ts_poll_main_%1$s[data-tsp-veff="3"]  > .ts_poll_answer span.ts_poll_r_progress{
				background-size: 30px 30px;
				-moz-background-size: 30px 30px;
				-webkit-background-size: 30px 30px;
				-o-background-size: 30px 30px;
				background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0)), color-stop(100%%, rgba(255, 255, 255, 0)));
				background-image: -o-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -ms-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr="#33ffffff", endColorstr="#33000000", GradientType=0);
				animation: TSprogress 2s linear infinite;
				-moz-animation: TSprogress 2s linear infinite;
				-webkit-animation: TSprogress 2s linear infinite;
			}
			main.ts_poll_main_%1$s[data-tsp-veff="4"]  > .ts_poll_answer span.ts_poll_r_progress{
				background-size: 30px 30px;
				-moz-background-size: 30px 30px;
				-webkit-background-size: 30px 30px;
				-o-background-size: 30px 30px;
				background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -webkit-gradient(linear, right top, left bottom, color-stop(0%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0)), color-stop(100%%, rgba(255, 255, 255, 0)));
				background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -ms-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;
				-moz-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;
				-webkit-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;
				filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr="#33ffffff", endColorstr="#33000000", GradientType=0);
				animation: TSprogressa 2s linear infinite;
				-moz-animation: TSprogressa 2s linear infinite;
				-webkit-animation: TSprogressa 2s linear infinite;
			}
			main.ts_poll_main_%1$s[data-tsp-veff="5"]  > .ts_poll_answer span.ts_poll_r_progress{
			background-size: 30px 30px;
			-moz-background-size: 30px 30px;
			-webkit-background-size: 30px 30px;
			-o-background-size: 30px 30px;
			background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
			background-image: -webkit-gradient(linear, right top, left bottom, color-stop(0%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0)), color-stop(100%%, rgba(255, 255, 255, 0)));
			background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
			background-image: -ms-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
			filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr="#33ffffff", endColorstr="#33000000", GradientType=0);
			animation: TSprogressa 2s linear infinite;
			-moz-animation: TSprogressa 2s linear infinite;
			-webkit-animation: TSprogressa 2s linear infinite;
			}
			main.ts_poll_main_%1$s[data-tsp-veff="6"]  > .ts_poll_answer span.ts_poll_r_progress{
				background-size: 30px 30px;
				-moz-background-size: 30px 30px;
				-webkit-background-size: 30px 30px;
				-o-background-size: 30px 30px;
				background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -webkit-gradient(linear, right top, left bottom, color-stop(0%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0)), color-stop(100%%, rgba(255, 255, 255, 0)));
				background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -ms-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;
				-moz-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;
				-webkit-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;
				filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr="#33ffffff", endColorstr="#33000000", GradientType=0);
				animation: TSprogressb 2s linear infinite;
				-moz-animation: TSprogressb 2s linear infinite;
				-webkit-animation: TSprogressb 2s linear infinite;
			}
			main.ts_poll_main_%1$s[data-tsp-veff="7"]  > .ts_poll_answer span.ts_poll_r_progress{
				background-size: 30px 30px;
				-moz-background-size: 30px 30px;
				-webkit-background-size: 30px 30px;
				-o-background-size: 30px 30px;
				background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -webkit-gradient(linear, right top, left bottom, color-stop(0%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0)), color-stop(100%%, rgba(255, 255, 255, 0)));
				background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -ms-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr="#33ffffff", endColorstr="#33000000", GradientType=0);
				animation: TSprogressb 2s linear infinite;
				-moz-animation: TSprogressb 2s linear infinite;
				-webkit-animation: TSprogressb 2s linear infinite;
			}
			main.ts_poll_main_%1$s[data-tsp-veff="8"]  > .ts_poll_answer span.ts_poll_r_progress{
				background-size: 30px 30px;
				-moz-background-size: 30px 30px;
				-webkit-background-size: 30px 30px;
				-o-background-size: 30px 30px;
				background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0)), color-stop(100%%, rgba(255, 255, 255, 0)));
				background-image: -o-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -ms-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;
				-moz-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;
				-webkit-box-shadow: 0 5px 5px rgba(255, 255, 255, 0.6) inset, 0 -5px 7px rgba(0, 0, 0, 0.4) inset;
				filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr="#33ffffff", endColorstr="#33000000", GradientType=0);
				animation: TSprogressc 2s linear infinite;
				-moz-animation: TSprogressc 2s linear infinite;
				-webkit-animation: TSprogressc 2s linear infinite;
			}
			main.ts_poll_main_%1$s[data-tsp-veff="9"]  > .ts_poll_answer span.ts_poll_r_progress{
				background-size: 30px 30px;
				-moz-background-size: 30px 30px;
				-webkit-background-size: 30px 30px;
				-o-background-size: 30px 30px;
				background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0.2)), color-stop(25%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0)), color-stop(50%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0.2)), color-stop(75%%, rgba(255, 255, 255, 0)), color-stop(100%%, rgba(255, 255, 255, 0)));
				background-image: -o-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				background-image: -ms-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 0%%, rgba(255, 255, 255, 0.15) 25%%, rgba(255, 255, 255, 0) 25%%, rgba(255, 255, 255, 0) 50%%, rgba(255, 255, 255, 0.15) 50%%, rgba(255, 255, 255, 0.15) 75%%, rgba(255, 255, 255, 0) 75%%, rgba(255, 255, 255, 0) 100%%);
				filter: progid:-DXImageTransform.Microsoft.gradient(startColorstr="#33ffffff", endColorstr="#33000000", GradientType=0);
				animation: TSprogressc 2s linear infinite;
				-moz-animation: TSprogressc 2s linear infinite;
				-webkit-animation: TSprogressc 2s linear infinite;
			}
			@-webkit-keyframes TSprogress {
				0%% {
					background-position: 0 0;
				}
				100%% {
					background-position: -60px -60px;
				}
			}      
			@-moz-keyframes TSprogress {
				0%% {
					background-position: 0 0;
				}
				100%% {
					background-position: -60px -60px;
				}
			}      
			@keyframes TSprogress {
				0%% {
					background-position: 0 0;
				}
				100%% {
					background-position: -60px -60px;
				}
			}      
			@-webkit-keyframes TSprogressa {
				0%% {
					background-position: 0 0;
				}
				100%% {
					background-position: -60px 60px;
				}
			}      
			@-moz-keyframes TSprogressa {
				0%% {
					background-position: 0 0;
				}
				100%% {
					background-position: -60px 60px;
				}
			}      
			@keyframes TSprogressa {
				0%% {
					background-position: 0 0;
				}
				100%% {
					background-position: -60px 60px;
				}
			}      
			@-webkit-keyframes TSprogressb {
				0%% {
					background-position: 0 0;
				}
				100%% {
					background-position: 60px -60px;
				}
			}      
			@-moz-keyframes TSprogressb {
				0%% {
					background-position: 0 0;
				}
				100%% {
					background-position: 60px -60px;
				}
			}      
			@keyframes TSprogressb {
				0%% {
					background-position: 0 0;
				}
				100%% {
					background-position: 60px -60px;
				}
			}      
			@-webkit-keyframes TSprogressc {
				0%% {
					background-position: 0 0;
				}
				100%% {
					background-position: 60px 60px;
				}
			}      
			@-moz-keyframes TSprogressc {
				0%% {
					background-position: 0 0;
				}
				100%% {
					background-position: 60px 60px;
				}
			}      
			@keyframes TSprogressc {
				0%% {
					background-position: 0 0;
				}
				100%% {
					background-position: 60px 60px;
				}
			}
			',
			esc_attr( $total_soft_poll )
		);
	}
?>
