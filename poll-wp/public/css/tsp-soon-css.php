<?php
	$ts_poll_generated_css .= sprintf(
		'
		:root{
			--tsp_coming_bgc_%1$s:%2$s;
			--tsp_coming_c_%1$s:%3$s;
			--tsp_coming_fs_%1$s:%4$s;
			--tsp_coming_ff_%1$s:%5$s;
		}
		span.ts_poll_cs_%1$s {
			position:absolute;
			left:0;
			right:0;
			top:0;
			bottom:0;
			background-color: var(--tsp_coming_bgc_%1$s);
			text-align: center;
			width: 100%%;
			height: 100%%;
			line-height: 1;
			display: -ms-flexbox;display: -webkit-flex;display: flex;
			-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;
			-webkit-align-content: center;-ms-flex-line-pack: center;align-content: center;
			-webkit-align-items: center;-ms-flex-align: center;align-items: center;
			-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
		}
		span.ts_poll_cs_text_%1$s {
			color: var(--tsp_coming_c_%1$s);
			font-size: var(--tsp_coming_fs_%1$s);
			font-family: var(--tsp_coming_ff_%1$s);
			cursor: default;
		}
		',
		esc_html( $total_soft_poll ),
		array_key_exists("TotalSoft_Poll_Set_06",$t_s_poll_question_settings) ? apply_filters( 'ts_sanitize_string', esc_html( $t_s_poll_question_settings["TotalSoft_Poll_Set_06"] ) ) : "",
		array_key_exists("TotalSoft_Poll_Set_07",$t_s_poll_question_settings) ? apply_filters( 'ts_sanitize_string', esc_html( $t_s_poll_question_settings["TotalSoft_Poll_Set_07"] ) ) : "",
		array_key_exists("TotalSoft_Poll_Set_08",$t_s_poll_question_settings) ? filter_var( esc_html( $t_s_poll_question_settings["TotalSoft_Poll_Set_08"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists("TotalSoft_Poll_Set_09",$t_s_poll_question_settings) ? apply_filters( 'ts_sanitize_string', esc_html( $t_s_poll_question_settings["TotalSoft_Poll_Set_09"] ) ) : ""
	);
?>	
