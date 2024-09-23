<?php
	$ts_poll_generated_css .= sprintf(
		'
		:root{
			--tsp_header_bgc_%1$s:%2$s;
			--tsp_header_c_%1$s:%3$s;
			--tsp_header_fs_%1$s:%4$s;
			--tsp_header_ff_%1$s:%5$s;
			--tsp_header_ta_%1$s:%6$s;
			--tsp_header_l_w_%1$s:%7$s;
			--tsp_header_l_bh_%1$s:%8$s;
			--tsp_header_l_bs_%1$s:%9$s;
			--tsp_header_l_bc_%1$s:%10$s;
		}
		header.ts_poll_header_%1$s{
			width:100%%;
			display: -ms-flexbox;display: -webkit-flex;display: flex;
			-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
			-webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
			-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;
			-webkit-align-content: center;-ms-flex-line-pack: center;align-content: center;
			-webkit-align-items: center;-ms-flex-align: center;align-items: center;
			-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;
			background-color:var(--tsp_header_bgc_%1$s); 
			color:var(--tsp_header_c_%1$s); 
			padding: 5px 10px 5px;
		}
		header.ts_poll_header_%1$s > span.ts_poll_title_%1$s{
			margin-bottom: 7px;
			font-family:var(--tsp_header_ff_%1$s);
			line-height:1.2;
			font-size:var(--tsp_header_fs_%1$s);
			text-align:var(--tsp_header_ta_%1$s);
			word-break: break-word;
		}
		header.ts_poll_header_%1$s[data-tsp-pos="left"] > span.ts_poll_title_%1$s{
			margin-right: auto;
		}
		header.ts_poll_header_%1$s[data-tsp-pos="right"] > span.ts_poll_title_%1$s{
			margin-left: auto;
		}
		header.ts_poll_header_%1$s > div.ts_poll_line_%1$s{
			width:var(--tsp_header_l_w_%1$s);
			border-top-width:var(--tsp_header_l_bh_%1$s);
			border-top-style:var(--tsp_header_l_bs_%1$s);
			border-top-color:var(--tsp_header_l_bc_%1$s);
		}
		',
		esc_html( $total_soft_poll ),
		array_key_exists("ts_poll_q_bgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_q_bgc"] ) )  : "",
		array_key_exists("ts_poll_q_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_q_c"] ) )  : "",
		array_key_exists("ts_poll_q_fs",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_q_fs"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists("ts_poll_q_ff",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_q_ff"] ) )  : "",
		array_key_exists("ts_poll_q_ta",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_q_ta"] ) )  : "",
		array_key_exists("ts_poll_laq_w",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_laq_w"] ), FILTER_VALIDATE_INT ) . "%" : "",
		array_key_exists("ts_poll_laq_h",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_laq_h"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists("ts_poll_laq_s",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_laq_s"] ) )  : "",
		array_key_exists("ts_poll_laq_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_laq_c"] ) )  : ""
	);
	$tsp_in_question = '';
	if ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image in Question' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video in Question' ) {
		if ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image in Question' ) {
			$tsp_in_question = sprintf(
				'
				<div class="ts_poll_img_div_%1$s" data-tsp-ratio="%2$s" v-bind:class="{tsp_sceleton_item: tsp_sceleton}">
					<img src="%3$s">
				</div>
				',
				esc_attr( $total_soft_poll ),
				esc_attr( $tspoll_question_styles["ts_poll_i_ra"] ),
				$ts_poll_question_params["TotalSoftPoll_Q_Im"] == '' ? esc_url( plugins_url( 'img/tsp_no_img.jpg', __DIR__ ) ) : esc_url( $ts_poll_question_params["TotalSoftPoll_Q_Im"] )
			);
		} else {
			global $wp_embed;
			$tsp_embed = "";
			if ($ts_poll_question_params["TotalSoftPoll_Q_Vd"] == '') {
				$tsp_embed = sprintf( '<img src="%s">', esc_url( plugins_url( 'img/tsp_no_video.png', __DIR__ ) ) );
			}else{
				if (has_shortcode($wp_embed->run_shortcode( '[embed]' . esc_url( $ts_poll_question_params["TotalSoftPoll_Q_Vd"] ) . '[/embed]' ),"video")) {
					$tsp_embed = sprintf(
						'
						<video controls="controls" preload="metadata" name="media">
							<source type="video/mp4" src="%1$s">
						</video>
						',
						esc_url( $ts_poll_question_params["TotalSoftPoll_Q_Vd"] )
					);
				} else {
					$tsp_embed = do_shortcode( $wp_embed->run_shortcode( '[embed]' . esc_url( $ts_poll_question_params["TotalSoftPoll_Q_Vd"] ) . '[/embed]' ) );
				}
			}
			$tsp_in_question = sprintf(
				'
				<div class="%1$s">
					<div class="%2$s">
						%3$s
					</div>
				</div>
				',
				'ts_poll_video_div_' . esc_attr( $total_soft_poll ),
				'ts_poll_iframe_div_' . esc_attr( $total_soft_poll ),
				$tsp_embed
			);
		}
	}
	echo sprintf(
		'
		<header class="ts_poll_header_%1$s" data-tsp-pos="%2$s">
			%3$s
			<span class="ts_poll_title_%1$s" %5$s>
				%4$s
			</span>
			<div class="ts_poll_line_%1$s"></div>
		</header>
		',
		esc_attr( $total_soft_poll ),
		esc_attr( $tspoll_question_styles["ts_poll_q_ta"] ),
		$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image in Question' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video in Question' ? $tsp_in_question : '',
		esc_html( html_entity_decode( htmlspecialchars_decode( $ts_poll_question_query['Question_Title'] ), ENT_QUOTES ) ),
		$ts_poll_edit === "true" ? 'v-on:click="changeQuestionTitle"' : ""
	);
?>
