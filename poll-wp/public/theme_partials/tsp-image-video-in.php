<?php
	$ts_poll_generated_css .= sprintf(
		'
		:root{
			--tsp_checkbox_size_%1$s:%2$s;
			--tsp_answer_bw_%1$s:%3$s;
			--tsp_answer_br_%1$s:%4$s;
			--tsp_answer_bc_%1$s:%5$s;
			--tsp_block_bgc_%1$s:%6$s;
			--tsp_progress_bgc_%1$s:%7$s;
			--tsp_progress_c_%1$s:%8$s;
		}
		form.ts_poll_form_%1$s  main.ts_poll_main_%1$s {
			position: relative;
			width:100%% !important;
			display: -ms-flexbox;display: -webkit-flex;display: flex;
			-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
			-webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
			-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;
			-webkit-align-items: center;-ms-flex-align: center;align-items: center;
			background-color: var(--tsp_main_bgc_%1$s);
			width:100%%;
			padding: 5px 10px;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer:not(:last-child) {
			margin-bottom: 3px;
		}
		main.ts_poll_main_%1$s:not([data-tsp-color="Background"]) > .ts_poll_answer {
			background-color: var(--tsp_answer_bgc_%1$s);
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer {
			position: relative;
			width: 100%%;
			border-radius: var(--tsp_answer_br_%1$s);
			line-height: 1.2 !important;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer .ts_poll_answer_label{
			width: 100%%;
			line-height: 1.5;
			padding: 7px 10px;
			margin-bottom:0 !important;
			float: none;
			display: -webkit-box;
			display: -moz-box;
			display: -ms-inline-flexbox;
			display: -webkit-inline-flex;
			display: inline-flex;
			-webkit-box-direction: normal;
			-moz-box-direction: normal;
			-webkit-box-orient: horizontal;
			-moz-box-orient: horizontal;
			-webkit-flex-direction: row;
			-ms-flex-direction: row;
			flex-direction: row;
			-webkit-flex-wrap: nowrap;
			-ms-flex-wrap: nowrap;
			flex-wrap: nowrap;
			-webkit-box-pack: start;
			-moz-box-pack: start;
			-webkit-justify-content: flex-start;
			-ms-flex-pack: start;
			justify-content: flex-start;
			-webkit-align-content: center;
			-ms-flex-line-pack: center;
			align-content: center;
			-webkit-box-align: center;
			-moz-box-align: center;
			-webkit-align-items: center;
			-ms-flex-align: center;
			align-items: center;
			text-align:right !important;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer:not(.tsp_sceleton_item):hover {
			background-color: var(--tsp_answer_h_bgc_%1$s) !important;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer:not(.tsp_sceleton_item):hover .ts_poll_answer_label {
			color: var(--tsp_answer_h_c_%1$s) !important;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer input {
			display: none !important;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer input + label {
			font-size: var(--tsp_answer_fs_%1$s) !important;
			cursor: pointer;
			margin-bottom: 0px !important;
			font-family: var(--tsp_answer_ff_%1$s);
		}
		main.ts_poll_main_%1$s:not([data-tsp-color="Color"]) > .ts_poll_answer input + label {
			color: var(--tsp_answer_c_%1$s) !important;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer input + label:before {
			margin: 0 .25em 0 0 !important;
			padding: 0 !important;
			font-size: var(--tsp_checkbox_size_%1$s) !important;
			font-family: FontAwesome !important;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer input:not(:checked) + label:before {
			color: var(--tsp_before_check_c_%1$s) !important;
			content: var(--tsp_before_check_%1$s);
		}
		main.ts_poll_main_%1$s > .ts_poll_answer input:checked + label:before {
			color: var(--tsp_after_check_c_%1$s) !important;
			content: var(--tsp_after_check_%1$s);
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer input:checked + label:after {
			font-weight: bold;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer span.ts_poll_r_block{
			position: absolute;
			display: inline-block;
			overflow: hidden;
			top: 0;
			left: 0;
			width:100%%;
			height: 100%%;
			background: var(--tsp_block_bgc_%1$s) !important;
			border-radius: calc( var(--tsp_answer_br_%1$s) - 3px);
			opacity: 0;
			z-index: -1;
			cursor: default;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer span.ts_poll_r_inner {
			position: relative;
			display: inline-block;
			top: 0;
			left: 0;
			width: 100%%;
			height: 100%%;
			border-radius: calc( var(--tsp_answer_br_%1$s) - 3px);
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer span.ts_poll_r_progress {
			position: absolute;
			display: inline-block;
			top: 0;
			left: 0;
			height: 100%%;
			min-width: 3px !important;
			border-radius: calc( var(--tsp_answer_br_%1$s) - 2px);
		}
		main.ts_poll_main_%1$s:not([data-tsp-voted="Background"]) > .ts_poll_answer span.ts_poll_r_progress{
			background-color: var(--tsp_progress_bgc_%1$s) !important;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer label.ts_poll_r_label{
			position: absolute;
			display: -ms-inline-flexbox;
			display: -webkit-inline-flex;
			display: inline-flex;
			-webkit-flex-direction: row;
			-ms-flex-direction: row;
			flex-direction: row;
			-webkit-flex-wrap: wrap;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
			-webkit-justify-content: space-between;
			-ms-flex-pack: justify;
			justify-content: space-between;
			-webkit-align-content: center;
			-ms-flex-line-pack: center;
			align-content: center;
			-webkit-align-items: center;
			-ms-flex-align: center;
			align-items: center;
			top: 0;
			left: 0;
			width: 100%%;
			height: 100%%;
			padding: 10px;
			font-family: var(--tsp_answer_ff_%1$s);
			font-size: var(--tsp_answer_fs_%1$s);
			margin-bottom:0px;
		}
		main.ts_poll_main_%1$s:not([data-tsp-voted="Color"]) > .ts_poll_answer label.ts_poll_r_label{
			color: var(--tsp_progress_c_%1$s) !important;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer label.ts_poll_r_label span.ts_poll_r_info{
			margin-left: auto;
			line-height: 1 !important;
		}
		',
		esc_attr( $total_soft_poll ),
		array_key_exists("ts_poll_ch_s",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_ch_s"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists("ts_poll_a_bw",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_a_bw"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists("ts_poll_a_br",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_a_br"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists("ts_poll_a_bc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_a_bc"] ) )  : "",
		array_key_exists("ts_poll_v_mbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_v_mbgc"] ) )  : "",
		array_key_exists("ts_poll_v_bgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_v_bgc"] ) )  : "",
		array_key_exists("ts_poll_v_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_v_c"] ) )  : ""
	);
	if ($ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image in Question') {
		$ts_poll_generated_css .= sprintf(
			'
			:root{
				--tsp_attachment_w_%1$s : %2$s; 
			}
			header.ts_poll_header_%1$s > div.ts_poll_img_div_%1$s {
				width: var(--tsp_attachment_w_%1$s); 
				position:relative;
				margin-bottom : 5px;
			}
			header.ts_poll_header_%1$s > div.ts_poll_img_div_%1$s[data-tsp-ratio="1"]{
				padding-top:var(--tsp_attachment_w_%1$s);
			}
			header.ts_poll_header_%1$s > div.ts_poll_img_div_%1$s[data-tsp-ratio="2"]{
				padding-top:calc(var(--tsp_attachment_w_%1$s) * 9/16);
			}
			header.ts_poll_header_%1$s > div.ts_poll_img_div_%1$s[data-tsp-ratio="3"]{
				padding-top:calc(var(--tsp_attachment_w_%1$s) * 16/9);
			}
			header.ts_poll_header_%1$s > div.ts_poll_img_div_%1$s[data-tsp-ratio="4"]{
				padding-top:calc(var(--tsp_attachment_w_%1$s) * 4/3);
			}
			header.ts_poll_header_%1$s > div.ts_poll_img_div_%1$s[data-tsp-ratio="5"]{
				padding-top:calc(var(--tsp_attachment_w_%1$s) * 3/4);
			}
			header.ts_poll_header_%1$s > div.ts_poll_img_div_%1$s[data-tsp-ratio="6"]{
				padding-top:calc(var(--tsp_attachment_w_%1$s) * 2/3);
			}
			header.ts_poll_header_%1$s > div.ts_poll_img_div_%1$s[data-tsp-ratio="7"]{
				padding-top:calc(var(--tsp_attachment_w_%1$s) * 3/2);
			}
			header.ts_poll_header_%1$s > div.ts_poll_img_div_%1$s[data-tsp-ratio="8"]{
				padding-top:calc(var(--tsp_attachment_w_%1$s) * 5/8);
			}
			header.ts_poll_header_%1$s > div.ts_poll_img_div_%1$s[data-tsp-ratio="9"]{
				padding-top:calc(var(--tsp_attachment_w_%1$s) * 8/5);
			}
			header.ts_poll_header_%1$s > div.ts_poll_img_div_%1$s > img{
				width:100%%;
				height:100%%;
				background-size:100%% 100%%;
				position: absolute;
				left: 0;
				top: 0;
				right: 0;
				bottom: 0; 
			}
			div#ts_poll_section_%1$s[max-width~="500px"]  {
				--tsp_attachment_w_%1$s : 100%%;
			}
			',
			esc_html( $total_soft_poll ),
			array_key_exists("ts_poll_i_h",$tspoll_question_styles) ?  filter_var( $tspoll_question_styles["ts_poll_i_h"], FILTER_VALIDATE_INT ) . "%" : ""
		);
	} else {
		$ts_poll_generated_css .= sprintf(
			'
			:root{
				--tsp_video_w_%1$s : %2$s;
			}
			header.ts_poll_header_%1$s div.ts_poll_video_div_%1$s {
				position: relative;
				width: var(--tsp_video_w_%1$s); 
				margin-bottom : 5px;
			}
			header.ts_poll_header_%1$s div.ts_poll_iframe_div_%1$s {
				position: relative;
				width: 100%%;
				padding-top: 56.25%%;
				margin-bottom : 5px;
			}  
			header.ts_poll_header_%1$s div.ts_poll_iframe_div_%1$s > iframe,
			header.ts_poll_header_%1$s div.ts_poll_iframe_div_%1$s > video,
			header.ts_poll_header_%1$s div.ts_poll_iframe_div_%1$s > img,
			header.ts_poll_header_%1$s div.ts_poll_iframe_div_%1$s > div
			{
				position: absolute;
				top: 0;
				left: 0;
				right:0;
				bottom:0;
				width: 100%%;
				height: 100%%;
				max-width: 100%% !important;
				max-height: 100%% !important;
			}
			div#ts_poll_section_%1$s[max-width~="500px"]  {
				--tsp_video_w_%1$s : 100%%;
			}
			',
			esc_html( $total_soft_poll ),
			array_key_exists("ts_poll_v_w",$tspoll_question_styles) ?  filter_var( $tspoll_question_styles["ts_poll_v_w"], FILTER_VALIDATE_INT ) . "%" : ""
		);
	}
	$tsp_main_answers = '';
	for ( $i = 0;$i < $ts_poll_answers_count;$i ++ ) {
		$TS_Poll_Question_Answer_Param = $t_s_poll_answers_values[ $i ]["Answer_Param"];
		if ( array_key_exists( "TotalSoftPoll_Ans_Cl", $TS_Poll_Question_Answer_Param ) ) {
			$ts_poll_colors_array[ $t_s_poll_answers_values[ $i ]["id"] ] = $TS_Poll_Question_Answer_Param["TotalSoftPoll_Ans_Cl"];
		}
	}
	echo sprintf(
		'
		<main 
			class="ts_poll_main_%1$s" 
			id="ts_poll_main_%1$s"
			data-tsp-color="%2$s"
			data-tsp-voted="%3$s"
			data-tsp-veff="%4$s"
		>
			<div class="ts_poll_answer" v-bind:class="{tsp_sceleton_item: tsp_sceleton}" v-for="row in tsp_answers" v-bind:data-tsp-id="row.id">
				<input 
					type="radio" 
					class="ts_poll_answer_input"
					v-bind:id="`%6$s${row.id}`"
					name="ts_poll_all%1$s"
					v-bind:value="row.id"
				>
				<label dir="auto" class="ts_poll_answer_label %5$s" v-bind:for="`%6$s${row.id}`" %7$s>
					{{ row.Answer_Title }}
				</label>
				<span class="ts_poll_r_block">
					<span class="ts_poll_r_inner">
						<span class="ts_poll_r_progress" v-bind:data-tsp-length="row.tsp_result_percent"></span>
						<label class="ts_poll_r_label" dir="auto" v-if=" tsp_type === `percentlab` || tsp_type === `countlab` || tsp_type === `bothlab` ">
							{{  row.Answer_Title }}
							<span v-if=" tsp_type === `percentlab` && tsp_show === `true` " class="ts_poll_r_info"> {{row.tsp_result_percent}} %% </span>
							<span v-else-if=" tsp_type === `countlab` && tsp_show === `true` " class="ts_poll_r_info"> {{row.Answer_Votes}} </span>
							<span v-else-if=" tsp_type === `bothlab` && tsp_show === `true` " class="ts_poll_r_info"> {{row.Answer_Votes}} ( {{row.tsp_result_percent}} %% ) </span>
							<span v-else  class="ts_poll_r_info"> {{ tsp_result_no }} </span>
						</label>
						<label class="ts_poll_r_label" dir="auto" v-else>
							<span v-if=" tsp_type === `percent` && tsp_show === `true` " class="ts_poll_r_info"> {{row.tsp_result_percent}} %% </span>
							<span v-else-if=" tsp_type === `count` && tsp_show === `true` " class="ts_poll_r_info"> {{row.Answer_Votes}} </span>
							<span v-else-if=" tsp_type === `both` && tsp_show === `true` " class="ts_poll_r_info"> {{row.Answer_Votes}} ( {{row.tsp_result_percent}} %% ) </span>
							<span v-else  class="ts_poll_r_info"> {{ tsp_result_no }} </span>
						</label>
					</span>
				</span>
			</div>     
			<div class="ts_poll_after_line_%1$s"></div>
		</main>
		',
		esc_attr( $total_soft_poll ),
		esc_attr( $tspoll_question_styles["ts_poll_a_ca"] ),
		esc_attr( $tspoll_question_styles["ts_poll_v_ca"] ),
		filter_var( esc_html( $tspoll_question_styles["ts_poll_v_eff"] ), FILTER_VALIDATE_INT ),
		$tspoll_question_styles["ts_poll_vb_show"] != 'true' ? 'ts_poll_e_vote' : '',
		'ts_poll_answer_input_' . esc_attr( $total_soft_poll ) . '-',
		$tspoll_question_styles["ts_poll_vb_show"] != 'true' ? 'v-on:click="vote_function"' : ''
	);
?>
