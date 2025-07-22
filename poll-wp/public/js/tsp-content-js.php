<?php
	$tsp_content_js = $tsp_content_js_block = $tsp_content_js_code = '';
	$tsp_show_result_code = $tsp_hide_result_code  = "";
	switch ( $ts_poll_question_params["TS_Poll_Q_Theme"] ) {
		case 'Image Poll':
		case 'Video Poll':
			$tsp_data_effect = $tsp_data_back_effect = '';
			switch ( $tspoll_question_styles["ts_poll_p_a_veff"] ) {
				case '0':
					$tsp_data_effect      = sprintf( 'jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css("display", "flex");', esc_attr( $total_soft_poll ) );
					$tsp_data_back_effect = sprintf( 'jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css("display", "none");', esc_attr( $total_soft_poll ) );
					break;
				case '1':
					$tsp_data_effect      = sprintf(
						'
						jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
							"transform": "rotateY(-90deg)", "-ms-transform": "rotateY(-90deg)", "-o-transform": "rotateY(-90deg)", "-moz-transform": "rotateY(-90deg)", "-webkit-transform": "rotateY(-90deg)"
						});
						setTimeout(function() {
							jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
								"transform": "rotateY(2deg)","-ms-transform": "rotateY(2deg)","-o-transform": "rotateY(2deg)","-moz-transform": "rotateY(2deg)","-webkit-transform": "rotateY(2deg)"
							});
							jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css({
								"transform": "rotateY(2deg)", "-ms-transform": "rotateY(2deg)", "-o-transform": "rotateY(2deg)", "-moz-transform": "rotateY(2deg)", "-webkit-transform": "rotateY(2deg)"
							});
						}, 500);
						',
						esc_attr( $total_soft_poll )
					);
					$tsp_data_back_effect = sprintf(
						'
						jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
							"transform": "rotateY(-90deg)","-ms-transform": "rotateY(-90deg)","-o-transform": "rotateY(-90deg)","-moz-transform": "rotateY(-90deg)","-webkit-transform": "rotateY(-90deg)"
						});
						jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css({
							"transform": "rotateY(-90deg)","-ms-transform": "rotateY(-90deg)","-o-transform": "rotateY(-90deg)","-moz-transform": "rotateY(-90deg)","-webkit-transform": "rotateY(-90deg)"
						});
						setTimeout(function() {
							jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
								"transform": "rotateY(2deg)","-ms-transform": "rotateY(2deg)","-o-transform": "rotateY(2deg)","-moz-transform": "rotateY(2deg)","-webkit-transform": "rotateY(2deg)"
							});
						}, 500);
						',
						esc_attr( $total_soft_poll )
					);
					break;
				case '2':
					$tsp_data_effect      = sprintf(
						'
						jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
							"transform": "rotateX(-90deg)","-ms-transform": "rotateX(-90deg)","-o-transform": "rotateX(-90deg)","-moz-transform": "rotateX(-90deg)","-webkit-transform": "rotateX(-90deg)"
						});
						setTimeout(function() {
							jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
								"transform": "rotateX(0deg)","-ms-transform": "rotateX(0deg)","-o-transform": "rotateX(0deg)","-moz-transform": "rotateX(0deg)","-webkit-transform": "rotateX(2deg)"
							});
							jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css({
								"transform": "rotateX(0deg)","-ms-transform": "rotateX(0deg)","-o-transform": "rotateX(0deg)","-moz-transform": "rotateX(0deg)","-webkit-transform": "rotateX(2deg)"
							});
						}, 500);
						',
						esc_attr( $total_soft_poll )
					);
					$tsp_data_back_effect = sprintf(
						'
						jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
							"transform": "rotateX(-90deg)","-ms-transform": "rotateX(-90deg)","-o-transform": "rotateX(-90deg)","-moz-transform": "rotateX(-90deg)","-webkit-transform": "rotateX(-90deg)"
						});
						jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css({
							"transform": "rotateX(-90deg)","-ms-transform": "rotateX(-90deg)","-o-transform": "rotateX(-90deg)","-moz-transform": "rotateX(-90deg)","-webkit-transform": "rotateX(-90deg)"
						});
						setTimeout(function() {
							jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
								"transform": "rotateX(0deg)","-ms-transform": "rotateX(0deg)","-o-transform": "rotateX(0deg)","-moz-transform": "rotateX(0deg)","-webkit-transform": "rotateX(2deg)"
							});
						}, 500)
						',
						esc_attr( $total_soft_poll )
					);
					break;
				default:
					$tsp_data_effect      = sprintf( 'jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css("display", "flex");', esc_attr( $total_soft_poll ) );
					$tsp_data_back_effect = sprintf( 'jQuery(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css("display", "none");', esc_attr( $total_soft_poll ) );
					break;
			}
			$tsp_show_result_code .= sprintf(
				'
				jQuery(`footer.ts_poll_footer_%1$s div.ts_poll_footer_res`).css({"z-index": "1"}).animate({"opacity": "1"}, 400);
				%2$s
				',
				esc_js( $total_soft_poll ),
				$tsp_data_effect
			);
			$tsp_hide_result_code .= sprintf(
				'
					jQuery(`footer.ts_poll_footer_%1$s div.ts_poll_footer_res`).animate({ "opacity": "0" }, 500);
					setTimeout(function() {
						jQuery(`footer.ts_poll_footer_%1$s div.ts_poll_footer_res`).css({ "z-index":"-1" });
					}, 500);
					%2$s
				',
				esc_js( $total_soft_poll ),
				$tsp_data_back_effect
			);
			break;
		case 'Standart Without Button':
		case 'Standard Without Button':
		case 'Image Without Button':
		case 'Video Without Button':
		case 'Image in Question':
		case 'Video in Question':
		case 'Standard Poll':
		case 'Standart Poll':
			if ( ($ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standard Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standart Poll') && array_key_exists("ts_poll_p_shpop", $tspoll_question_styles ) ) {
				if ( $tspoll_question_styles["ts_poll_p_shpop"] == 'true' ) {
					if($tspoll_question_styles["ts_poll_p_sheff"] == "FTTB"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
							jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "translateY(0px)",
								"-ms-transform": "translateY(0px)",
								"-o-transform": "translateY(0px)",
								"-moz-transform": "translateY(0px)",
								"-webkit-transform": "translateY(0px)",
								"opacity": "1",
								"max-height": "440px"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "translateY(-12000px)",
								"-ms-transform": "translateY(-12000px)",
								"-o-transform": "translateY(-12000px)",
								"-moz-transform": "translateY(-12000px)",
								"-webkit-transform": "translateY(-12000px)",
								"opacity": "1"
							});
							jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "0%%"}, 300);
							setTimeout(function() {
								jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
							}, 200);
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FLTR"){
						$tsp_show_result_code = sprintf(
							'
							jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
							jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "translateX(0px)",
								"-ms-transform": "translateX(0px)",
								"-o-transform": "translateX(0px)",
								"-moz-transform": "translateX(0px)",
								"-webkit-transform": "translateX(0px)"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "translateX(-12000px)",
								"-ms-transform": "translateX(-12000px)",
								"-o-transform": "translateX(-12000px)",
								"-moz-transform": "translateX(-12000px)",
								"-webkit-transform": "translateX(-12000px)"
							});
							jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "0%%"}, 300);
							setTimeout(function() {
								jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
							}, 200);
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FRTL"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
							jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "translateX(0px)",
								"-ms-transform": "translateX(0px)",
								"-o-transform": "translateX(0px)",
								"-moz-transform": "translateX(0px)",
								"-webkit-transform": "translateX(0px)"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "translateX(12000px)",
								"-ms-transform": "translateX(12000px)",
								"-o-transform": "translateX(12000px)",
								"-moz-transform": "translateX(12000px)",
								"-webkit-transform": "translateX(12000px)"
							});
							jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
							setTimeout(function() {
								jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
							}, 200)
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FCTA"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
							jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
							jQuery("#ts_poll_modal_result_section_%1$s").animate({
								"maxWidth": "750px",
								"width": "100%%",
								"height": "100%%"
							}, 500);
							jQuery("#ts_poll_modal_result_section_%1$s").css("position", "relative");
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								width: "0%%", height: "0%%"
							});
							jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
							setTimeout(function() {
								jQuery("#ts_poll_modal_result_section_%1$s").css("position", "absolute");
								jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
							}, 200)
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FTL"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
							jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "rotateY(0deg)",
								"-ms-transform": "rotateY(0deg)",
								"-o-transform": "rotateY(0deg)",
								"-moz-transform": "rotateY(0deg)",
								"-webkit-transform": "rotateY(0deg)"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "rotateY(-90deg)",
								"-ms-transform": "rotateY(-90deg)",
								"-o-transform": "rotateY(-90deg)",
								"-moz-transform": "rotateY(-90deg)",
								"-webkit-transform": "rotateY(-90deg)"
							});
							jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
							setTimeout(function() {
								jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
							}, 400)
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FTR"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
							jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "rotateX(0deg)",
								"-ms-transform": "rotateX(0deg)",
								"-o-transform": "rotateX(0deg)",
								"-moz-transform": "rotateX(0deg)",
								"-webkit-transform": "rotateX(0deg)"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "rotateX(-90deg)",
								"-ms-transform": "rotateX(-90deg)",
								"-o-transform": "rotateX(-90deg)",
								"-moz-transform": "rotateX(-90deg)",
								"-webkit-transform": "rotateX(-90deg)"
							});
							jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
							setTimeout(function() {
								jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
							}, 600)
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FBL"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "rotate(0deg)",
								"-ms-transform": "rotate(0deg)",
								"-o-transform": "rotate(0deg)",
								"-moz-transform": "rotate(0deg)",
								"-webkit-transform": "rotate(0deg)",
								"opacity": "1"
							});
							jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
							jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "rotate(-180deg)",
								"-ms-transform": "rotate(-180deg)",
								"-o-transform": "rotate(-180deg)",
								"-moz-transform": "rotate(-180deg)",
								"-webkit-transform": "rotate(-180deg)",
								"opacity": "0"
							});
							jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
							setTimeout(function() {
								jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
							}, 600)
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FBR"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "skewX(0deg)",
								"-ms-transform": "skewX(0deg)",
								"-o-transform": "skewX(0deg)",
								"-moz-transform": "skewX(0deg)",
								"-webkit-transform": "skewX(0deg)"
							});
							jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
							jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "skewX(90deg)",
								"-ms-transform": "skewX(90deg)",
								"-o-transform": "skewX(90deg)",
								"-moz-transform": "skewX(90deg)",
								"-webkit-transform": "skewX(90deg)"
							});
							jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
							setTimeout(function() {
								jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
							}, 600)
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FBTT"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "skewY(0deg)",
								"-ms-transform": "skewY(0deg)",
								"-o-transform": "skewY(0deg)",
								"-moz-transform": "skewY(0deg)",
								"-webkit-transform": "skewY(0deg)"
							});
							jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "100%%"}, 300);
							jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("#ts_poll_modal_result_section_%1$s").css({
								"transform": "skewY(90deg)",
								"-ms-transform": "skewY(90deg)",
								"-o-transform": "skewY(90deg)",
								"-moz-transform": "skewY(90deg)",
								"-webkit-transform": "skewY(90deg)"
							});
							jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
							setTimeout(function() {
								jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
							}, 600)
							',
							esc_js( $total_soft_poll )
						);
					}
				} else {
					if($tspoll_question_styles["ts_poll_p_sheff"] == "FTTB"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_r_section_%1$s").css({
								"transform": "translateY(0px)",
								"-ms-transform": "translateY(0px)",
								"-o-transform": "translateY(0px)",
								"-moz-transform": "translateY(0px)",
								"-webkit-transform": "translateY(0px)",
								"opacity": "1"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
								"transform": "translateY(-12000px)",
								"-ms-transform": "translateY(-12000px)",
								"-o-transform": "translateY(-12000px)",
								"-moz-transform": "translateY(-12000px)",
								"-webkit-transform": "translateY(-12000px)",
								"opacity": "0"
							});
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FLTR"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_r_section_%1$s").css({
								"transform": "translateX(0px)",
								"-ms-transform": "translateX(0px)",
								"-o-transform": "translateX(0px)",
								"-moz-transform": "translateX(0px)",
								"-webkit-transform": "translateX(0px)"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
								"transform": "translateX(-12000px)",
								"-ms-transform": "translateX(-12000px)",
								"-o-transform": "translateX(-12000px)",
								"-moz-transform": "translateX(-12000px)",
								"-webkit-transform": "translateX(-12000px)"
							});
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FRTL"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_r_section_%1$s").css({
								"transform": "translateX(0px)",
								"-ms-transform": "translateX(0px)",
								"-o-transform": "translateX(0px)",
								"-moz-transform": "translateX(0px)",
								"-webkit-transform": "translateX(0px)"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
								"transform": "translateX(12000px)",
								"-ms-transform": "translateX(12000px)",
								"-o-transform": "translateX(12000px)",
								"-moz-transform": "translateX(12000px)",
								"-webkit-transform": "translateX(12000px)"
							});
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FCTA"){
						if ( $tspoll_question_styles["ts_poll_pos"] == 'left' ) {
							$tsp_show_result_code .= sprintf(
								'
								jQuery(".ts_poll_r_section_%1$s").animate({
									"width": "100%%",
									"left": "0%%",
									"height": "100%%",
									"top": "0%%",
								}, 500);
								',
								esc_js( $total_soft_poll )
							);
							$tsp_hide_result_code .= sprintf(
								'
								jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
									width: "0",
									height: "0",
									left: "0%%",
									top: "50%%"
								}, 100);
								',
								esc_js( $total_soft_poll )
							);
						} elseif ( $tspoll_question_styles["ts_poll_pos"] == 'right' ) {
							$tsp_show_result_code .= sprintf(
								'
								jQuery(".ts_poll_r_section_%1$s").animate({
									"width": "100%%",
									"right": "0%%",
									"height": "100%%",
									"top": "0%%"
								}, 500);
								',
								esc_js( $total_soft_poll )
							);
							$tsp_hide_result_code .= sprintf(
								'
								jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
									width: "0",
									height: "0",
									right: parseInt(50 - parseInt(100 - parseInt(TotalSoft_Poll_1_MW)) / 2) + "%%",
									top: "50%%"
								}, 100);
								',
								esc_js( $total_soft_poll )
							);
						} else {
							$tsp_show_result_code .= sprintf(
								'
								jQuery(".ts_poll_r_section_%1$s").animate({
									"width": "100%%",
									"left": "0%%",
									"height": "100%%",
									"top": "0%%"
								}, 500);
								',
								esc_js( $total_soft_poll )
							);
							$tsp_hide_result_code .= sprintf(
								'
								jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
									width: "0", height: "0", left: "50%%", top: "50%%"
								}, 100);
								',
								esc_js( $total_soft_poll )
							);
						}
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FTL"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_r_section_%1$s").css({
								"transform": "rotateY(0deg)",
								"-ms-transform": "rotateY(0deg)",
								"-o-transform": "rotateY(0deg)",
								"-moz-transform": "rotateY(0deg)",
								"-webkit-transform": "rotateY(0deg)"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
								"transform": "rotateY(-90deg)",
								"-ms-transform": "rotateY(-90deg)",
								"-o-transform": "rotateY(-90deg)",
								"-moz-transform": "rotateY(-90deg)",
								"-webkit-transform": "rotateY(-90deg)"
							});
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FTR"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_r_section_%1$s").css({
								"transform": "rotateX(0deg)",
								"-ms-transform": "rotateX(0deg)",
								"-o-transform": "rotateX(0deg)",
								"-moz-transform": "rotateX(0deg)",
								"-webkit-transform": "rotateX(0deg)"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
								"transform": "rotateX(-90deg)",
								"-ms-transform": "rotateX(-90deg)",
								"-o-transform": "rotateX(-90deg)",
								"-moz-transform": "rotateX(-90deg)",
								"-webkit-transform": "rotateX(-90deg)"
							});
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FBL"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_r_section_%1$s").css({
								"transform": "rotate(0deg)",
								"-ms-transform": "rotate(0deg)",
								"-o-transform": "rotate(0deg)",
								"-moz-transform": "rotate(0deg)",
								"-webkit-transform": "rotate(0deg)",
								"z-index": "1"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
								"transform": "rotate(-180deg)",
								"-ms-transform": "rotate(-180deg)",
								"-o-transform": "rotate(-180deg)",
								"-moz-transform": "rotate(-180deg)",
								"-webkit-transform": "rotate(-180deg)",
								"z-index": "-1"
							});
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FBR"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_r_section_%1$s").css({
								"transform": "skewX(0deg)",
								"-ms-transform": "skewX(0deg)",
								"-o-transform": "skewX(0deg)",
								"-moz-transform": "skewX(0deg)",
								"-webkit-transform": "skewX(0deg)"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
								"transform": "skewX(90deg)",
								"-ms-transform": "skewX(90deg)",
								"-o-transform": "skewX(90deg)",
								"-moz-transform": "skewX(90deg)",
								"-webkit-transform": "skewX(90deg)"
							});
							',
							esc_js( $total_soft_poll )
						);
					}elseif($tspoll_question_styles["ts_poll_p_sheff"] == "FBTT"){
						$tsp_show_result_code .= sprintf(
							'
							jQuery(".ts_poll_r_section_%1$s").css({
								"transform": "skewY(0deg)",
								"-ms-transform": "skewY(0deg)",
								"-o-transform": "skewY(0deg)",
								"-moz-transform": "skewY(0deg)",
								"-webkit-transform": "skewY(0deg)"
							});
							',
							esc_js( $total_soft_poll )
						);
						$tsp_hide_result_code .= sprintf(
							'
							jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
								"transform": "skewY(90deg)",
								"-ms-transform": "skewY(90deg)",
								"-o-transform": "skewY(90deg)",
								"-moz-transform": "skewY(90deg)",
								"-webkit-transform": "skewY(90deg)"
							});
							',
							esc_js( $total_soft_poll )
						);
					}
					$tsp_show_result_code .= sprintf(
						'
						setTimeout(() => {
							jQuery(".ts_poll_header_%1$s,.ts_poll_main_%1$s,.ts_poll_footer_%1$s").css({
								"opacity": "0"
							});
							jQuery(".ts_poll_r_main_%1$s >  .ts_poll_answer_result > .ts_poll_answer_result_label > span.ts_poll_answer_percent_line").each(function () {
								jQuery(this).animate({"width": `${jQuery(this).attr("data-tsp-w")}%%` }, 1500);
							});
						}, 500);
						',
						esc_js( $total_soft_poll )
					);
					$tsp_hide_result_code .= sprintf(
						'
						jQuery(".ts_poll_r_main_%1$s >  .ts_poll_answer_result > .ts_poll_answer_result_label > span.ts_poll_answer_percent_line").each(function () {
							jQuery(this).animate({"width": `${jQuery(this).attr("data-tsp-w")}%%` }, 1500);
						});
						jQuery(".ts_poll_header_%1$s,.ts_poll_main_%1$s,.ts_poll_footer_%1$s").css({
							"opacity": "1"
						});
						',
						esc_js( $total_soft_poll )
					);
				}
				break;
			}
			$tsp_show_result_code .= sprintf(
				'
				jQuery("footer.ts_poll_footer_%1$s div.ts_poll_footer_res").css("z-index", "1").animate({ "opacity": "1" }, 500);
				jQuery("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block").css("z-index", "1").animate({ "opacity": "1" }, 500);
				setTimeout(() => {
					jQuery("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block span.ts_poll_r_progress").each(function () {
						jQuery(this).animate({ "width": `${jQuery(this).attr("data-tsp-length")}%%` }, 1500);
					});
				}, 500);
				',
				esc_js( $total_soft_poll )
			);
			$tsp_hide_result_code .= sprintf(
				'
				jQuery("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block span.ts_poll_r_progress").each(function () {
					jQuery(this).animate({ "width": 0 }, 500);
				});
				jQuery("footer.ts_poll_footer_%1$s div.ts_poll_footer_res").animate({ "opacity": "0" }, 500);
				jQuery("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block").animate({ "opacity": "0" }, 500);
				setTimeout(() => {
					jQuery("footer.ts_poll_footer_%1$s div.ts_poll_footer_res").css("z-index", "-1");
					jQuery("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block").css("z-index", "-1");
				}, 500);
				',
				esc_js( $total_soft_poll )
			);
			break;
	}
	$tsp_show_popup = false;
	if ($ts_poll_question_params["TS_Poll_Q_Theme"] === "Image Without Button" || $ts_poll_question_params["TS_Poll_Q_Theme"] === "Video Without Button") {
		if ($tspoll_question_styles["ts_poll_pop_show"] === "true") {
			$tsp_show_popup = true;
		}
	}elseif ($ts_poll_question_params["TS_Poll_Q_Theme"] === "Video Poll") {
		$tsp_show_popup = true;
	}
	echo sprintf(
		'
		<script type="text/javascript">
			let tspInterval_for_%1$s = null,
				tspIntervalFunction_%1$s = function(){
					if(typeof Vue === "function" && typeof(document.getElementById("ts_poll_form_%1$s")) != "undefined" && document.getElementById("ts_poll_form_%1$s") != null && typeof(tsPollData) != "undefined" && tsPollData != null) {
						let ts_poll_app_%1$s = new Vue({
							el:"#ts_poll_form_%1$s",
							data:{
								tsp_answers:"",
								tsp_total:"",
								tsp_sceleton: false,
								ts_poll_mode : "",
								tsp_type : "%6$s",
								tsp_show : "%7$s",
								tsp_result_no : "%8$s",		
							},
							methods:{
								tspGetImageSrc(rowIndex,rowId){
									var tspSelf = this;
									if (typeof(document.getElementById(`tspImg%1$s-${rowId}`)) != "undefined" && document.getElementById(`tspImg%1$s-${rowId}`) != null) {
										document.getElementById(`tspImg%1$s-${rowId}`).setAttribute("src", tspSelf["tsp_answers"][rowIndex]["img_src"])
									}
								},
								renderTsPoll:function(){
									let tspSelf = this;
									fetch(tsPollData.root_url + "ts-poll/v1/render", {
										method: "POST",
										headers: {
											"Content-Type": "application/json",
											"X-WP-Nonce": tsPollData.nonce
										},
										body: JSON.stringify({ poll_id: %2$s })
									}).then(response => {
										if (!response.ok) {
											throw new Error("Error: TS Poll loading failed.");
										}
										return response.json();
									}).then(data => {
										if (data.success) {
											tspSelf.tsp_answers = data.answers;
											tspSelf.tsp_total = data.total_votes;
											setTimeout(() => {
												document.getElementById("ts_load_vue_poll_%1$s").style.display = "none";
												document.getElementById("ts_poll_section_%1$s").removeAttribute("style");
												if (typeof(document.getElementById("ts_poll_video_in_header_%1$s")) != "undefined" && document.getElementById("ts_poll_video_in_header_%1$s") != null) {
													document.getElementById("ts_poll_video_in_header_%1$s").setAttribute("src", document.getElementById("ts_poll_video_in_header_%1$s").dataset.video);
												}
												tspSelf.ts_poll_mode = data.mode;
											}, 1000);
										} else {
											alert("Error: TS Poll loading failed.");
										}
									}).catch(error => console.error("Error: TS Poll loading failed."));
									%12$s
								},
								show_results:function(tspAll = false){
									%4$s
									if(tspAll === true){
										document.getElementById("ts_poll_footer_%1$s").remove();
										%10$s
									}
								},
								hide_results : function(){
									%5$s
								},
								vote_function : function(event){
									let tspSelf = this,
										tsp_checked_array = [];
									setTimeout(() => {
										jQuery(`main.ts_poll_main_%1$s input[name="ts_poll_all%1$s"]`).each(function(){
											if(jQuery(this).is(":checked")){
												tsp_checked_array.push(jQuery(this).val());
											}
										});
										if(tsp_checked_array.length === 0 || event.type != "click"){ return; }
										tspSelf.tsp_sceleton = true;
										fetch(tsPollData.root_url + "ts-poll/v1/vote", {
											method: "POST",
											headers: {
												"Content-Type": "application/json",
												"X-WP-Nonce": tsPollData.nonce
											},
											body: JSON.stringify({ poll_id: %2$s, checked_answers : tsp_checked_array.join("|") })
										}).then(response => {
											if (!response.ok) {
												throw new Error("Error: TS Poll vote failed.");
											}
											return response.json();
										}).then(data => {
											if (data.success) {
												tspSelf.tsp_answers = data.answers;
												tspSelf.tsp_sceleton = false;
												jQuery("form.ts_poll_form_%1$s footer").remove();
												tspSelf.show_results();
											} else {
												console.error("Error: TS Poll vote failed.");
											}
										}).catch(error => console.error("Error: TS Poll vote failed."));
									}, 100);
								},
								%9$s
							},
							created:function(){
								this.renderTsPoll();
							},
							%13$s
							watch: {
								ts_poll_mode : function(tspNewMode) {
									if (tspNewMode == "end") {
										this.show_results(true);
									}else if(tspNewMode == "coming"){
										this.tsp_sceleton = true;
									}
								}
							}
						});
						clearInterval(tspInterval_for_%1$s);
					}
				},
				tspReference_for_%1$s = (function tspSameCallFunction_%1$s() {
					tspInterval_for_%1$s = setInterval(tspIntervalFunction_%1$s, 1000);
					%3$s
					return tspSameCallFunction_%1$s;
				}());
		</script>
		',
		esc_attr( $total_soft_poll),
		esc_attr( $ts_poll_base_id),
		$tsp_content_js_code,
		$tsp_show_result_code,
		$tsp_hide_result_code,
		array_key_exists("ts_poll_v_t",$tspoll_question_styles) ? $tspoll_question_styles["ts_poll_v_t"] : $tspoll_question_styles["ts_poll_p_a_vt"],
		array_key_exists("TotalSoft_Poll_Set_01",$t_s_poll_question_settings) ? $t_s_poll_question_settings["TotalSoft_Poll_Set_01"] : "",
		array_key_exists("TotalSoft_Poll_Set_05",$t_s_poll_question_settings) ? $t_s_poll_question_settings["TotalSoft_Poll_Set_05"] : "Thank you!",
		$tsp_show_popup === true ? 
		sprintf(
			'
			tspGetObjKey : function(obj, value) {
				return Object.keys(obj).find(key => obj[key]["id"] === value);
			},
			tspfadeIn : function(element, duration = 600) {
				element.style.display = "flex";
				element.style.opacity = 0;
				let tspLast = +new Date();
				let tspFrameShow = function() {
					element.style.opacity = +element.style.opacity + (new Date() - tspLast) / duration;
					tspLast = +new Date();
					if (1 > +element.style.opacity) {
						(window.requestAnimationFrame && requestAnimationFrame(tspFrameShow)) || setTimeout(tspFrameShow, 16);
					}
				};
				tspFrameShow();
			},
			tspfadeOut : function(element, duration = 600) {
				let tspLast = +new Date();
				let tspFrameHide = function() {
					element.style.opacity = +element.style.opacity - (new Date() - tspLast) / duration;
					tspLast = +new Date();
					if (+element.style.opacity > 0) {
						(window.requestAnimationFrame && requestAnimationFrame(tspFrameHide)) || setTimeout(tspFrameHide, 16);
					}else{
						element.style.display = "none";
						document.getElementById("tsp_popup_attachment_%1$s").innerHTML = "";
					}
				};
				tspFrameHide();
			},
			tspShowAttachment:function (tspRowId) {
				let tspAnswerKeyVal = this.tspGetObjKey(this.tsp_answers,tspRowId);
				document.getElementById("tsp_popup_attachment_%1$s").innerHTML = this.tsp_answers[tspAnswerKeyVal]["embed"];
				this.tspfadeIn( document.getElementById("tsp_popup_question_%1$s"),1500 );
			},
			tspHideAttachment:function (tspTarget) {
				let tspCheckHideOr = false;
				let tspNodeList = document.querySelectorAll("#tsp_popup_attachment_%1$s > .tsp_embed_popup_inner *");
				tspNodeList.forEach(e => { if (e === tspTarget) {  tspCheckHideOr = true; } });
				if (!tspTarget.classList.contains("tsp_embed_popup_inner") && tspCheckHideOr === false) {
					this.tspfadeOut( document.getElementById("tsp_popup_question_%1$s"),1500 );
				}
			},
			',
			esc_html($total_soft_poll)
		) : "",
		$ts_poll_old_standard === 'true' ? sprintf('document.getElementById("ts_poll_r_footer_%1$s").remove();',esc_html($total_soft_poll)) : "",
		esc_url( admin_url( 'admin-ajax.php' ) ),
		$tsp_show_popup === true ? 
		sprintf( 'setTimeout( () => document.body.appendChild(document.getElementById("tsp_popup_question_%1$s")), 1000 );', esc_attr( $total_soft_poll) ) : "",
		$ts_poll_popup_standard === true ? 
		sprintf(
			'
			mounted:function(){
				jQuery(".ts_poll_result_popup_section_%1$s").insertAfter(jQuery(".ts_poll_form_%1$s"));
				jQuery(".ts_poll_result_popup_result_%1$s").insertAfter(jQuery(".ts_poll_result_popup_section_%1$s"));
			},
			',
			esc_attr( $total_soft_poll)
		) : ""
	);
