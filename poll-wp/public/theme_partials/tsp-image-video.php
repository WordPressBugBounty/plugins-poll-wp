<?php
	$ts_poll_generated_css .= sprintf(
		'
		:root{
			--tsp_checkbox_size_%1$s:%2$s;
			--tsp_label_size_%1$s : calc(10px + var(--tsp_checkbox_size_%1$s));
			--tsp_ans_ratio_%1$s : calc(100%% - var(--tsp_label_size_%1$s));
			--tsp_overlay_bgc_%1$s: %3$s;
			--tsp_overlay_c_%1$s:%4$s;
			--tsp_answer_h_bsh_%1$s:%5$s;
			--tsp_answer_pbottom_%1$s:%6$s;
		}
		div#ts_poll_section_%1$s > main.ts_poll_main_%1$s {
			display: -ms-flexbox;display: -webkit-flex;display: flex;
			-webkit-flex-direction: row;-ms-flex-direction: row;flex-direction: row;
			-webkit-flex-wrap: wrap;-ms-flex-wrap: wrap;flex-wrap: wrap;
			-webkit-justify-content: space-around;-ms-flex-pack: distribute;justify-content: space-around;
			-webkit-align-content: center;-ms-flex-line-pack: center;align-content: center;
			-webkit-align-items: flex-start;-ms-flex-align: start;align-items: flex-start;
			background-color: var(--tsp_main_bgc_%1$s);
			width:100%% !important;
			padding: 8px 10px 5px 10px;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer {
			position: relative;
			display: inline-block;
			padding: 3px 3px;
			margin-top: 3px;
			line-height: 1.2 !important;
		}
		main.ts_poll_main_%1$s[data-tsp-layout="1"] > .ts_poll_answer {
			width: 99%%;
		}
		main.ts_poll_main_%1$s[data-tsp-layout="2"] > .ts_poll_answer {
			width: 49%%;
		}
		main.ts_poll_main_%1$s[data-tsp-layout="3"] > .ts_poll_answer {
		width: 32%%;
		}
		main.ts_poll_main_%1$s[data-tsp-layout="4"] > .ts_poll_answer {
		width: 24%%;
		}
		main.ts_poll_main_%1$s[data-tsp-layout="5"] > .ts_poll_answer {
		width: 19%%;
		}
		main.ts_poll_main_%1$s:not([data-tsp-color="Background"]) > .ts_poll_answer > .ts_poll_before_div{
			background-color: var(--tsp_answer_bgc_%1$s);
		}
		main.ts_poll_main_%1$s[data-tsp-effect="1"] > .ts_poll_answer > .ts_poll_before_div{
			-ms-transform: rotateY(0deg);
			-moz-transform: rotateY(0deg);
			-o-transform: rotateY(0deg);
			-webkit-transform: rotateY(0deg);
			transform: rotateY(0deg);
			-webkit-transition: transform 0.5s ease-in-out 0.5s;
			-moz-transition: transform 0.5s ease-in-out 0.5s;
			-o-transition: transform 0.5s ease-in-out 0.5s;
			-ms-transition: transform 0.5s ease-in-out 0.5s;
			transition: transform 0.5s ease-in-out 0.5s;
			-webkit-transition-delay: 0s;
			-moz-transition-delay: 0s;
			-o-transition-delay: 0s;
			-ms-transition-delay: 0s;
			transition-delay: 0s;
		}
		main.ts_poll_main_%1$s[data-tsp-effect="2"] > .ts_poll_answer > .ts_poll_before_div{
			-ms-transform: rotateX(0deg);
			-moz-transform: rotateX(0deg);
			-o-transform: rotateX(0deg);
			-webkit-transform: rotateX(0deg);
			transform: rotateX(0deg);
			-webkit-transition: transform 0.5s ease-in-out 0.5s;
			-moz-transition: transform 0.5s ease-in-out 0.5s;
			-o-transition: transform 0.5s ease-in-out 0.5s;
			-ms-transition: transform 0.5s ease-in-out 0.5s;
			transition: transform 0.5s ease-in-out 0.5s;
			-webkit-transition-delay: 0s;
			-moz-transition-delay: 0s;
			-o-transition-delay: 0s;
			-ms-transition-delay: 0s;
			transition-delay: 0s;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div{
			display: -ms-flexbox;display: -webkit-flex;display: flex;
			-webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
			-webkit-justify-content:center;-ms-flex-pack: center;justify-content:center;
			-webkit-align-content: center;-ms-flex-line-pack: center;align-content: center;
			-webkit-align-items: center;-ms-flex-align: center;align-items: center;
			-webkit-transition: background-color 700ms linear;
			-ms-transition: background-color 700ms linear;
			transition: background-color 700ms linear;
		}
		main.ts_poll_main_%1$s[data-tsp-position="Position 1"] > .ts_poll_answer > .ts_poll_before_div,
		main.ts_poll_main_%1$s[data-tsp-position="Position 2"] > .ts_poll_answer > .ts_poll_before_div{
			-webkit-flex-direction: column-reverse;-ms-flex-direction: column-reverse;flex-direction: column-reverse;
		}
		main.ts_poll_main_%1$s[data-tsp-position="Position 3"] > .ts_poll_answer > .ts_poll_before_div,
		main.ts_poll_main_%1$s[data-tsp-position="Position 4"] > .ts_poll_answer > .ts_poll_before_div{
			-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
		}
		main.ts_poll_main_%1$s[data-tsp-position="Position 5"] > .ts_poll_answer > .ts_poll_before_div{
			-webkit-flex-direction: row-reverse;-ms-flex-direction: row-reverse;flex-direction: row-reverse;
		}
		main.ts_poll_main_%1$s[data-tsp-position="Position 6"] > .ts_poll_answer > .ts_poll_before_div{
			-webkit-flex-direction: row;-ms-flex-direction: row;flex-direction: row;
		}
		main.ts_poll_main_%1$s[data-tsp-position="Position 5"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div,
		main.ts_poll_main_%1$s[data-tsp-position="Position 6"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div
		{
			width:var(--tsp_ans_ratio_%1$s);
		}
		main.ts_poll_main_%1$s[data-tsp-position="Position 5"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_answer_label,
		main.ts_poll_main_%1$s[data-tsp-position="Position 6"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_answer_label
		{
			width:var(--tsp_label_size_%1$s);
		}
		main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div{
			background-color: var(--tsp_overlay_bgc_%1$s);
			width: 100%%;
			height: 100%%;
			position: absolute;
			top: 0 !important;
			left: 0 !important;
			display: flex;
			flex-direction: column;
			flex-wrap: wrap;
			align-content: center;
			justify-content: center;
			align-items: center;
			text-align: center;
		}
		main.ts_poll_main_%1$s[data-tsp-effect="0"] > .ts_poll_answer > .ts_poll_after_div{
			display: none;
		}
		main.ts_poll_main_%1$s[data-tsp-effect="1"] > .ts_poll_answer > .ts_poll_after_div{
			-ms-transform: rotateY(-90deg);
			-moz-transform: rotateY(-90deg);
			-o-transform: rotateY(-90deg);
			-webkit-transform: rotateY(-90deg);
			transform: rotateY(-90deg);
			-webkit-transition: transform 0.5s ease-in-out 0.5s;
			-moz-transition: transform 0.5s ease-in-out 0.5s;
			-o-transition: transform 0.5s ease-in-out 0.5s;
			-ms-transition: transform 0.5s ease-in-out 0.5s;
			transition: transform 0.5s ease-in-out 0.5s;
			-webkit-transition-delay: 0s;
			-moz-transition-delay: 0s;
			-o-transition-delay: 0s;
			-ms-transition-delay: 0s;
			transition-delay: 0s;
		}
		main.ts_poll_main_%1$s[data-tsp-effect="2"] > .ts_poll_answer > .ts_poll_after_div{
			-ms-transform: rotateX(-90deg);
			-moz-transform: rotateX(-90deg);
			-o-transform: rotateX(-90deg);
			-webkit-transform: rotateX(-90deg);
			transform: rotateX(-90deg);
			-webkit-transition: transform 0.5s ease-in-out 0.5s;
			-moz-transition: transform 0.5s ease-in-out 0.5s;
			-o-transition: transform 0.5s ease-in-out 0.5s;
			-ms-transition: transform 0.5s ease-in-out 0.5s;
			transition: transform 0.5s ease-in-out 0.5s;
			-webkit-transition-delay: 0s;
			-moz-transition-delay: 0s;
			-o-transition-delay: 0s;
			-ms-transition-delay: 0s;
			transition-delay: 0s;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div .ts_poll_r_answer_title,
		main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div .ts_poll_answer_percent_line{
			color: var(--tsp_overlay_c_%1$s) !important;
			line-height: 1.2 !important;
			font-size: var(--tsp_answer_fs_%1$s) !important;
			display: block;
			width: 100%%;
			font-family:var(--tsp_answer_ff_%1$s);
			word-break: break-word;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div{
			position: relative;
			width: 100%%;
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="none"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div{
			padding-bottom: var(--tsp_answer_pbottom_%1$s);
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="1"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div{
			padding-bottom: 100%%; 
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="2"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div{
			padding-bottom: 56.25%%;
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="3"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div{
			padding-bottom: 177.78%%;
		} 
		main.ts_poll_main_%1$s[data-tsp-ratio="4"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div{
			padding-bottom: 133.3%%; 
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="5"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div{
			padding-bottom: 75%%;
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="6"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div{
			padding-bottom: 66.7%%;
		} 
		main.ts_poll_main_%1$s[data-tsp-ratio="7"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div{
			padding-bottom: 150%%; 
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="8"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div{
			padding-bottom: 62.5%%;
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="9"] > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div{
			padding-bottom: 160%%;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div,
		main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div > .ts_poll_imgvd_div{
			overflow:hidden;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div img{
			width: 100%%;
			height: 100%% !important;
			position: absolute;
			left: 0;
			top: 0;
			margin: 0 !important;
			padding: 0 !important;
			float: none !important;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer:not(.tsp_sceleton_item) > .ts_poll_before_div:hover {
			background-color: var(--tsp_answer_h_bgc_%1$s) !important;
		}
		main.ts_poll_main_%1$s[data-tsp-hover="true"] > .ts_poll_answer:not(.tsp_sceleton_item) > .ts_poll_before_div:hover {
			box-shadow: 0px 0px 5px var(--tsp_answer_h_bsh_%1$s) !important;
			-moz-box-shadow: 0px 0px 5px var(--tsp_answer_h_bsh_%1$s) !important;
			-webkit-box-shadow: 0px 0px 5px var(--tsp_answer_h_bsh_%1$s) !important;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer:not(.tsp_sceleton_item) > .ts_poll_before_div:hover label{
			color: var(--tsp_answer_h_c_%1$s) !important;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer input{
			display: none !important;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer input + label{
			font-size: var(--tsp_answer_fs_%1$s) !important;
			cursor: pointer;
			font-family: var(--tsp_answer_ff_%1$s);
			position: relative;
		}
		main.ts_poll_main_%1$s:not([data-tsp-color="Color"]) > .ts_poll_answer input + label{
			color: var(--tsp_answer_c_%1$s) !important;
		}
		main.ts_poll_main_%1$s[data-tsp-position="Position 2"] > .ts_poll_answer input + label,
		main.ts_poll_main_%1$s[data-tsp-position="Position 4"] > .ts_poll_answer input + label
		{
			height:var(--tsp_label_size_%1$s);
		}
		main.ts_poll_main_%1$s[data-tsp-position="Position 1"] > .ts_poll_answer input + label,
		main.ts_poll_main_%1$s[data-tsp-position="Position 3"] > .ts_poll_answer input + label
		{
			padding:7px;
		}
		main.ts_poll_main_%1$s[data-tsp-position="Position 1"] > .ts_poll_answer input + label,
		main.ts_poll_main_%1$s[data-tsp-position="Position 2"] > .ts_poll_answer input + label,
		main.ts_poll_main_%1$s[data-tsp-position="Position 3"] > .ts_poll_answer input + label,
		main.ts_poll_main_%1$s[data-tsp-position="Position 4"] > .ts_poll_answer input + label{
			margin-bottom: 0px !important;
			width:100%%;
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
		main.ts_poll_main_%1$s > .ts_poll_answer input + label:before{
			color: var(--tsp_before_check_c_%1$s);
			content: var(--tsp_before_check_%1$s);
			font-size :var(--tsp_checkbox_size_%1$s);
			font-family: FontAwesome !important;
		}
		main.ts_poll_main_%1$s[data-tsp-position="Position 1"] > .ts_poll_answer input + label:before,
		main.ts_poll_main_%1$s[data-tsp-position="Position 3"] > .ts_poll_answer input + label:before
		{
			margin: 0 .25em 0 0 !important;
		}
		main.ts_poll_main_%1$s[data-tsp-position="Position 5"] > .ts_poll_answer input + label,
		main.ts_poll_main_%1$s[data-tsp-position="Position 6"] > .ts_poll_answer input + label{
			display: -ms-flexbox;display: -webkit-flex;display: flex;
			-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
			-webkit-align-items: center;-ms-flex-align: center;align-items: center;
			padding:0;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer input:checked + label:before{
			color: var(--tsp_after_check_c_%1$s) !important;
			content: var(--tsp_after_check_%1$s);
		}
		main.ts_poll_main_%1$s > .ts_poll_answer input:checked + label:after{
			font-weight: bold;
		}
		main.ts_poll_main_%1$s[data-tsp-position="Position 2"] > .ts_poll_answer label > span,
		main.ts_poll_main_%1$s[data-tsp-position="Position 4"] > .ts_poll_answer label > span,
		main.ts_poll_main_%1$s[data-tsp-position="Position 5"] > .ts_poll_answer label > span,
		main.ts_poll_main_%1$s[data-tsp-position="Position 6"] > .ts_poll_answer label > span{
			visibility: hidden;
			display: none;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer input + label{
			word-break: break-word;
			overflow:hidden;
		}
		div#ts_poll_section_%1$s[max-width~="300px"] main.ts_poll_main_%1$s > .ts_poll_answer {
			width: 99%% !important;
		}
		div#ts_poll_section_%1$s[max-width~="450px"] main.ts_poll_main_%1$s[data-tsp-layout="3"] > .ts_poll_answer,
		div#ts_poll_section_%1$s[max-width~="450px"] main.ts_poll_main_%1$s[data-tsp-layout="4"] > .ts_poll_answer,
		div#ts_poll_section_%1$s[max-width~="450px"] main.ts_poll_main_%1$s[data-tsp-layout="5"] > .ts_poll_answer {
			width: 49%% ;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer{
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			-ms-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
		}
		',
		esc_attr( $total_soft_poll ),
		array_key_exists("ts_poll_ch_s",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_ch_s"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists("ts_poll_p_a_oc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_a_oc"] ) ) : "",
		array_key_exists("ts_poll_p_a_c",$tspoll_question_styles) ?  apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_a_c"] ) )  : "",
		array_key_exists("ts_poll_a_hshc",$tspoll_question_styles) ?  apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_a_hshc"] ) )  : "",
		array_key_exists("ts_poll_a_ih",$tspoll_question_styles) ?  esc_attr( $tspoll_question_styles["ts_poll_a_ih"] ) . "px" : ""
	);
	if ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ) { 
		$ts_poll_generated_css .= sprintf(
			'
			:root{
				--tsp_video_bgc_%1$s:%2$s;
				--tsp_video_c_%1$s:%3$s;
				--tsp_video_fs_%1$s:%4$s;
			}
			main.ts_poll_main_%1$s .ts_poll_video_overlay{
				background: var(--tsp_video_bgc_%1$s);
				position: absolute;
				left: 0 !important;
				top: 0;
				width: 100%% !important;
				cursor: pointer;
				z-index: 1;
				-webkit-transition: opacity 700ms linear;
				-ms-transition: opacity 700ms linear;
				transition: opacity 700ms linear;
				opacity: 0;
				height: 100%%;
			}
			main.ts_poll_main_%1$s .ts_poll_video_overlay > .ts_poll_overlay_icon {
				position: relative;
				text-align: center;
				width: 100%%;
				line-height: 1 !important;
				display: block;
				top: 50%%;
				-ms-transform: translateY(-50%%);
				-webkit-transform: translateY(-50%%);
				-moz-transform: translateY(-50%%);
				-o-transform: translateY(-50%%);
				transform: translateY(-50%%);
			}
			main.ts_poll_main_%1$s .ts_poll_video_overlay > .ts_poll_overlay_icon i{
				color: var(--tsp_video_c_%1$s);
				font-size: var(--tsp_video_fs_%1$s);
			}
			main.ts_poll_main_%1$s .ts_poll_video_overlay > .ts_poll_overlay_icon i:before{
				font-family:FontAwesome;
			}
			main.ts_poll_main_%1$s > .ts_poll_answer:not(.tsp_sceleton_item) > .ts_poll_before_div:hover .ts_poll_video_overlay{
				opacity: 1;
				height: 100%% !important;
			}
			section.tsp_popup_question_%1$s * {
			-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box;
			}
			section.tsp_popup_question_%1$s {
				width: 100%%;
				height: 100%%;
				position: fixed;
				left: 0;
				right: 0;
				top: 0;
				bottom: 0;
				z-index: 9999999999;
				background: #6460604a;
				display:none;
			}
			div.tsp_popup_inner_%1$s {
				position:relative;
				width: 100%%;
				height: 100%%;
				max-width: 70%%;
				max-height: 70%%;
				padding: 3em;
			}
			@media all and (max-width:400px) {
				div.tsp_popup_inner_%1$s {
					max-width: 95%%;
					max-height: 95%%;
				}
			}
			div.tsp_popup_attachment_%1$s {
				position: absolute;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				width:100%%;
				height:100%%;
			}
			div.tsp_popup_attachment_%1$s > div > *{
				max-width: 100%% !important;
				max-height: 100%% !important;
			}
			div.tsp_popup_attachment_%1$s > div {
				width: 100%%;
				height: 0;
				padding-bottom: 56.25%%;
				position: relative;
			}
			div.tsp_popup_attachment_%1$s > div  > *:not(img) {
				position: absolute;
				height: 100%% !important;
				width: 100%% !important;
			}
			div.tsp_popup_attachment_%1$s > div video{
				height: 100%% !important;
				width: 100%% !important;
				background-color:#000;
			}
			div.tsp_popup_attachment_%1$s > div > img{
				left: 50%%;
				top: 50%%;
				transform: translate(-50%%, -50%%);
				position: absolute;
				max-height: 100%% !important;
				width: auto !important;
				height: auto !important;
			}
			div.tsp_popup_inner_close_%1$s{
				position: absolute;
				top: 1em;
				right: 1em;
				width: 4em;
				height: 4em;
				padding: 2em;
				cursor: pointer;
			}
			div.tsp_popup_inner_close_%1$s > i{
				font-size: 3em;
				color:var(--tsp_popup_close_c_%1$s);
			}
			',
			esc_attr( $total_soft_poll ),
			array_key_exists("ts_poll_play_iovc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_play_iovc"] ) ) : "", 
			array_key_exists("ts_poll_play_ic",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_play_ic"] ) ) : "",
			array_key_exists("ts_poll_play_is",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_play_is"] ), FILTER_VALIDATE_INT ) . "px" : ""
		);
	}
	$tsp_main_answers = '';
	for ( $i = 0;$i < $ts_poll_answers_count;$i ++ ) {
		$TS_Poll_Question_Answer_Param = $t_s_poll_answers_values[ $i ]["Answer_Param"];
		$ts_poll_colors_array[ $t_s_poll_answers_values[ $i ]["id"] ] = $TS_Poll_Question_Answer_Param["TotalSoftPoll_Ans_Cl"];
	}
	echo sprintf(
		'
		<main 
			class="ts_poll_main_%1$s" 
			data-tsp-layout="%2$s" 
			data-tsp-color="%3$s"
			data-tsp-effect="%4$s"
			data-tsp-ratio="%5$s"
			data-tsp-position="%6$s"
			data-tsp-hover="%7$s"
		>
			<div class="ts_poll_answer" v-bind:class="{tsp_sceleton_item: tsp_sceleton}" v-for="(row, index) in tsp_answers" v-bind:data-tsp-id="row.id" data-tsp-type="%9$s">
				<div class="ts_poll_before_div">
					<div class="ts_poll_imgvd_div">
						%10$s
						<img class="ts_poll_imgvd_div_pic" :id="`tspImg%1$s-${row.id}`" %14$s  v-bind:alt="row.Answer_Title">
					</div>
					<input 
						type="%11$s" 
						class="ts_poll_answer_input"
						v-bind:id="`%12$s${row.id}`" name="%13$s" v-bind:value="row.id"
						style="display:none !important;"
					>
					<label  class="ts_poll_answer_label" v-bind:for="`%12$s${row.id}`">
						<span dir="auto"> {{ row.Answer_Title }} </span>
					</label>
				</div>
				<div class="ts_poll_after_div">
					<span class="ts_poll_after_span">
						<span  dir="auto" class="ts_poll_r_answer_title" v-if="tsp_type === `percentlab` || tsp_type === `countlab` || tsp_type === `bothlab`"> {{ row.Answer_Title }} </span>
						<span  dir="auto" class="ts_poll_r_answer_title" v-else></span>
						<span  v-if="(tsp_type === `percent` || tsp_type === `percentlab`) && tsp_show === `true` " class="ts_poll_answer_percent_line" v-bind:data-tsp-w="`${row.tsp_result_percent}%%`"> {{row.tsp_result_percent}} %% </span>
						<span  v-else-if="(tsp_type === `count` || tsp_type === `countlab`) && tsp_show === `true` " class="ts_poll_answer_percent_line" v-bind:data-tsp-w="`${row.tsp_result_percent}%%`"> {{row.Answer_Votes}} </span>
						<span  v-else-if="(tsp_type === `both` || tsp_type === `bothlab`) && tsp_show === `true` " class="ts_poll_answer_percent_line" v-bind:data-tsp-w="`${row.tsp_result_percent}%%`"> {{row.Answer_Votes}} ( {{row.tsp_result_percent}} %% ) </span>
						<span  v-else  class="ts_poll_answer_percent_line" v-bind:data-tsp-w="`${row.tsp_result_percent}%%`"> {{ tsp_result_no }} </span>
					</span>
				</div>
			</div>
			<div class="ts_poll_after_line_%1$s"></div> 
		</main>
		%8$s     
		',
		esc_attr( $total_soft_poll ),
		esc_attr( $tspoll_question_styles["ts_poll_a_cc"] ),
		esc_attr( $tspoll_question_styles["ts_poll_a_ca"] ),
		esc_attr( $tspoll_question_styles["ts_poll_p_a_veff"] ),
		in_array( $tspoll_question_styles["ts_poll_a_ih"], range( 1, 9 ) ) ? esc_attr( $tspoll_question_styles["ts_poll_a_ih"] ) : esc_attr( 'none' ),
		esc_attr( $tspoll_question_styles["ts_poll_a_pos"] ),
		esc_attr( $tspoll_question_styles["ts_poll_a_hsh_show"] ),
		$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ?
		sprintf(
			'
			<section id="tsp_popup_question_%1$s" class="tsp_popup_question_%1$s tsp_flex_col tsp_popup_question_fixed" v-on:click="tspHideAttachment($event.target)" style="display:none;">
				<div class="tsp_popup_inner_%1$s tsp_flex_col">
					<div id="tsp_popup_attachment_%1$s" class="tsp_popup_attachment_%1$s tsp_flex_col">
						<img >
					</div>
				</div>
			</section>
			',
			esc_attr( $total_soft_poll )
		)
		: '',
		$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ? 'video' : 'image',
		$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ? sprintf(
			'
			<div class="ts_poll_video_overlay" v-on:click.prevent.stop="tspShowAttachment(row.id)"  v-bind:data-tsp-video="row.id">
				<span class="ts_poll_overlay_icon">
				<i class="ts_poll_video_play_ic %1$s"></i>
			</div>
			',
			esc_html( $tspoll_question_styles["ts_poll_play_it"] )
		) : '',
		$tspoll_question_styles["ts_poll_ch_cm"] == 'true' ? 'checkbox' : 'radio',
		'ts_poll_answer_input_' . esc_attr( $total_soft_poll ) . '-',
		'ts_poll_all' . esc_attr( $total_soft_poll ),
		$ts_poll_edit != 'true' ? 'v-bind:data-tsp="tspGetImageSrc(index,row.id)"' : 'v-bind:src="row.img_src"'
	);
?>
