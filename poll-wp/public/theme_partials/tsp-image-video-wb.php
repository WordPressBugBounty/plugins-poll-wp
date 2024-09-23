<?php
	$ts_poll_generated_css .= sprintf(
		'
		:root{
			--tsp_answer_bw_%1$s:%2$s;
			--tsp_answer_br_%1$s:%3$s;
			--tsp_answer_bc_%1$s:%4$s;
			--tsp_block_bgc_%1$s:%5$s;
			--tsp_progress_bgc_%1$s:%6$s;
			--tsp_progress_c_%1$s:%7$s;
			--tsp_attachment_w_%1$s:%8$s;
			--tsp_overlay_bgc_%1$s:%9$s;
			--tsp_overlay_c_%1$s:%10$s;
			--tsp_overlay_icon_s_%1$s:%11$s;
	
		}
		div#ts_poll_section_%1$s > main.ts_poll_main_%1$s {
			position: relative;
			width:100%% !important;
			display: -ms-flexbox;display: -webkit-flex;display: flex;
			-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
			-webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
			-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;
			-webkit-align-items: center;-ms-flex-align: center;align-items: center;
			background-color: var(--tsp_main_bgc_%1$s);
			padding: 5px 10px;
		}
		main.ts_poll_main_%1$s .tsp_video_popup_embed{
			display:none !important;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer:not(:last-child) {
			margin-bottom: 5px;
		}
		main.ts_poll_main_%1$s:not([data-tsp-color="Background"]) > .ts_poll_answer {
			background-color: var(--tsp_answer_bgc_%1$s);
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer {
			position: relative;
			width: 100%%;
			border-width: var(--tsp_answer_bw_%1$s);
			border-style:solid;
			border-color:var(--tsp_answer_bc_%1$s);
			border-radius: var(--tsp_answer_br_%1$s);
			cursor: pointer;
			overflow: hidden;
			display: -ms-flexbox;
			display: -webkit-flex;
			display: flex;
			-webkit-flex-direction: row;
			-ms-flex-direction: row;
			flex-direction: row;
			-webkit-flex-wrap: nowrap;
			-ms-flex-wrap: nowrap;
			flex-wrap: nowrap;
			-webkit-justify-content: flex-start;
			-ms-flex-pack: start;
			justify-content: flex-start;
			-webkit-align-content: center;
			-ms-flex-line-pack: center;
			align-content: center;
			-webkit-align-items: center;
			-ms-flex-align: center;
			align-items: center;
			line-height: 1.2 !important;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer:hover {
			background-color: var(--tsp_answer_h_bgc_%1$s) !important;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer > .ts_poll_attachment{
			width : var(--tsp_attachment_w_%1$s);
			height:0;
			position:relative;
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="1"] > .ts_poll_answer > .ts_poll_attachment,
		main.ts_poll_main_%1$s[data-tsp-ratio="1"] > .ts_poll_answer > .ts_poll_vote
		{
			padding-top: var(--tsp_attachment_w_%1$s);
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="2"] > .ts_poll_answer > .ts_poll_attachment,
		main.ts_poll_main_%1$s[data-tsp-ratio="2"] > .ts_poll_answer > .ts_poll_vote
		{
			padding-top: calc(calc(9/16) * var(--tsp_attachment_w_%1$s));
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="3"] > .ts_poll_answer > .ts_poll_attachment,
		main.ts_poll_main_%1$s[data-tsp-ratio="3"] > .ts_poll_answer > .ts_poll_vote
		{
			padding-top: calc(calc(16/9) * var(--tsp_attachment_w_%1$s));
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="4"] > .ts_poll_answer > .ts_poll_attachment,
		main.ts_poll_main_%1$s[data-tsp-ratio="4"] > .ts_poll_answer > .ts_poll_vote
		{
			padding-top: calc(calc(4/3) * var(--tsp_attachment_w_%1$s));
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="5"] > .ts_poll_answer > .ts_poll_attachment,
		main.ts_poll_main_%1$s[data-tsp-ratio="5"] > .ts_poll_answer > .ts_poll_vote
		{
			padding-top: calc(calc(3/4) * var(--tsp_attachment_w_%1$s));
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="6"] > .ts_poll_answer > .ts_poll_attachment,
		main.ts_poll_main_%1$s[data-tsp-ratio="6"] > .ts_poll_answer > .ts_poll_vote
		{
			padding-top: calc(calc(2/3) * var(--tsp_attachment_w_%1$s));
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="7"] > .ts_poll_answer > .ts_poll_attachment,
		main.ts_poll_main_%1$s[data-tsp-ratio="7"] > .ts_poll_answer > .ts_poll_vote
		{
			padding-top: calc(calc(3/2) * var(--tsp_attachment_w_%1$s));
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="8"] > .ts_poll_answer > .ts_poll_attachment,
		main.ts_poll_main_%1$s[data-tsp-ratio="8"] > .ts_poll_answer > .ts_poll_vote
		{
			padding-top: calc(calc(5/8) * var(--tsp_attachment_w_%1$s));
		}
		main.ts_poll_main_%1$s[data-tsp-ratio="9"] > .ts_poll_answer > .ts_poll_attachment,
		main.ts_poll_main_%1$s[data-tsp-ratio="9"] > .ts_poll_answer > .ts_poll_vote
		{
			padding-top: calc(calc(8/5) * var(--tsp_attachment_w_%1$s));
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer > .ts_poll_attachment > img{
			height: 100%% !important;
			width: 100%%;
			margin: 0 !important;
			padding: 0 !important;
			float: none !important;
			position:absolute;
			left:0;
			top:0;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_vote{
			width:calc(100%% - var(--tsp_attachment_w_%1$s));
			position:relative;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer > .ts_poll_attachment > .ts_poll_overlay_div {
			position: absolute;
			width: 100%%;
			height: 100%%;
			top: 0;
			left: 0;
			background: var(--tsp_overlay_bgc_%1$s);
			z-index: -1;
			opacity: 0;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer > .ts_poll_attachment:not(.tsp_sceleton_item):hover > .ts_poll_overlay_div {
			z-index: 999;
			opacity: 1;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer > .ts_poll_attachment span.ts_poll_overlay_span {
			display: block;
			width: 100%%;
			text-align: center;
			position: relative;
			top: 50%%;
			-ms-transform: translateY(-50%%);
			-webkit-transform: translateY(-50%%);
			-moz-transform: translateY(-50%%);
			-o-transform: translateY(-50%%);
			transform: translateY(-50%%);
			font-weight: 400 !important;
		}
		main.ts_poll_main_%1$s  > .ts_poll_answer > .ts_poll_attachment i.ts_poll_overlay_icon {
			color: var(--tsp_overlay_c_%1$s);
			font-size: var(--tsp_overlay_icon_s_%1$s);
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
			border-top-right-radius: calc( var(--tsp_answer_br_%1$s) - 2px);
			border-bottom-right-radius: calc( var(--tsp_answer_br_%1$s) - 2px);
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
		main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_vote  > .ts_poll_e_vote{
			position:absolute;
			top:0;
			right:0;
			width: 100%%;
			height: 100%%;
			display: -ms-flexbox;display: -webkit-flex;display: flex;
			-webkit-flex-direction: row;-ms-flex-direction: row;flex-direction: row;
			-webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
			-webkit-justify-content: flex-start;-ms-flex-pack: start;justify-content: flex-start;
			-webkit-align-content: center;-ms-flex-line-pack: center;align-content: center;
			-webkit-align-items: center;-ms-flex-align: center;align-items: center;
			cursor:pointer;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_vote  > .ts_poll_e_vote > .ts_poll_answer_label{
			display: inline-block;
			float: none;
			font-family: var(--tsp_answer_ff_%1$s);
			font-size: var(--tsp_answer_fs_%1$s) !important;
			cursor: pointer;
			margin-bottom: 0px !important;
			position: relative;
			padding-left: 10px;
			font-weight: 400 !important;
		}
		main.ts_poll_main_%1$s:not([data-tsp-color="Color"]) > .ts_poll_answer > .ts_poll_vote  > .ts_poll_e_vote > .ts_poll_answer_label{
			color: var(--tsp_answer_c_%1$s) !important;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer:hover > .ts_poll_vote  > .ts_poll_e_vote > .ts_poll_answer_label{
			color: var(--tsp_answer_h_c_%1$s) !important;
		}
		main.ts_poll_main_%1$s > .ts_poll_answer input {
			display: none !important;
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
		esc_html( $total_soft_poll ),
		array_key_exists("ts_poll_a_bw",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_a_bw"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists("ts_poll_a_br",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_a_br"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists("ts_poll_a_bc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_a_bc"] ) )  : "",
		array_key_exists("ts_poll_v_mbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_v_mbgc"] ) )  : "",
		array_key_exists("ts_poll_v_bgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_v_bgc"] ) )  : "",
		array_key_exists("ts_poll_v_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_v_c"] ) )  : "",
		array_key_exists("ts_poll_i_h",$tspoll_question_styles)  ? filter_var( esc_html( $tspoll_question_styles["ts_poll_i_h"] ), FILTER_VALIDATE_INT ) . "%" : "",
		array_key_exists("ts_poll_i_oc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_i_oc"] ) )  : "",
		array_key_exists("ts_poll_i_ic",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_i_ic"] ) )  : "",
		array_key_exists("ts_poll_i_is",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_i_is"] ), FILTER_VALIDATE_INT ) . "px" : ""
	);
	if ( $tspoll_question_styles["ts_poll_pop_show"] == 'true' || $ts_poll_edit == 'true' ) {
		$ts_poll_generated_css .= sprintf(
			'
			:root{
				--tsp_popup_close_c_%1$s :%2$s;
				--tsp_popup_bw_%1$s :%3$s;
				--tsp_popup_bc_%1$s :%4$s;
			}
			section.tsp_popup_question_%1$s * {
				-moz-box-sizing:border-box;
				-webkit-box-sizing:border-box;
				box-sizing:border-box;
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
			div.tsp_popup_attachment_%1$s {
				position: absolute;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				width:100%%;
				height:100%%;
			}
			div.tsp_popup_attachment_%1$s > .tsp_video_popup_embed video{
				height: 100%% !important;
				width: 100%% !important;
				background-color:#000;
			}
			@media all and (max-width:400px) {
				div.tsp_popup_inner_%1$s {
					max-width: 95%%;
					max-height: 95%%;
				}
			}
			div.tsp_popup_attachment_%1$s > div > *{
				max-width: 100%% !important;
				max-height: 100%% !important;
				border:var(--tsp_popup_bw_%1$s) solid var(--tsp_popup_bc_%1$s);
			}
			div.tsp_popup_attachment_%1$s > div {
				width: 100%%;
				height: 0;
				padding-bottom: 56.25%%;
				position: relative;
			}
			div.tsp_popup_attachment_%1$s > div  > img{
				left: 50%%;
				top: 50%%;
				transform: translate(-50%%, -50%%);
				position: absolute;
				max-height: 100%% !important;
				width: auto !important;
				height: auto !important;
			}
			div.tsp_popup_attachment_%1$s > div  > *:not(img) {
				position: absolute;
				height: 100%% !important;
				width: 100%% !important;
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
			array_key_exists("ts_poll_pop_ic",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_pop_ic"] ) )  : "",
			array_key_exists("ts_poll_pop_bw",$tspoll_question_styles) ? filter_var( $tspoll_question_styles["ts_poll_pop_bw"], FILTER_VALIDATE_INT ) . "px" : "",
			array_key_exists("ts_poll_pop_bc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_pop_bc"] ) )  : ""
		);
	}
	global $wp_embed;
	$tsp_main_ansers = '';
	for ( $i = 0;$i < $ts_poll_answers_count;$i ++ ) {
		$TS_Poll_Question_Answer_Param =  $t_s_poll_answers_values[ $i ]["Answer_Param"];
		if ( array_key_exists( "TotalSoftPoll_Ans_Cl",$TS_Poll_Question_Answer_Param ) ) {
			$ts_poll_colors_array[ $t_s_poll_answers_values[ $i ]["id"] ] = $TS_Poll_Question_Answer_Param["TotalSoftPoll_Ans_Cl"];
		}
	}
	echo sprintf(
		'
		<main 
			class="ts_poll_main_%1$s"  
			id="ts_poll_main_%1$s"
			data-tsp-ratio="%2$s"
			data-tsp-color="%3$s"
			data-tsp-voted="%4$s"
			data-tsp-veff="%5$s"
		>
			<div class="ts_poll_answer " v-for="(row, index) in tsp_answers" v-bind:data-tsp-id="row.id">
				<div class="ts_poll_attachment" v-on:click.prevent.stop="tspShowAttachment(row.id)" v-bind:class="{tsp_sceleton_item: tsp_sceleton}">
					<img :id="`tspImg%1$s-${row.id}`" %9$s  v-bind:alt="row.Answer_Title">
					<div class="ts_poll_overlay_div">
						<span class="ts_poll_overlay_span">
							<i class="%6$s ts_poll_overlay_icon"></i>
						</span>
					</div>
				</div>
				<div class="ts_poll_vote" v-bind:class="{tsp_sceleton_item: tsp_sceleton}">
					<input type="radio" class="ts_poll_answer_input" v-bind:id="`%7$s${row.id}`" name="%8$s" v-bind:value="row.id"> <label class="ts_poll_e_vote" v-on:click="vote_function"  v-bind:for="`%7$s${row.id}`" dir="auto"><span class="ts_poll_answer_label">{{ row.Answer_Title }}</span></label>
					<span class="ts_poll_r_block">
						<span class="ts_poll_r_inner">
							<span class="ts_poll_r_progress" v-bind:data-tsp-length="row.tsp_result_percent"></span>
							<label class="ts_poll_r_label" dir="auto" v-if=" tsp_type === `percentlab` || tsp_type === `countlab` || tsp_type === `bothlab` ">
								{{  row.Answer_Title }}
								<span  v-if=" tsp_type === `percentlab` && tsp_show === `true` " class="ts_poll_r_info"> {{row.tsp_result_percent}} %% </span>
								<span  v-else-if=" tsp_type === `countlab` && tsp_show === `true` " class="ts_poll_r_info"> {{row.Answer_Votes}} </span>
								<span  v-else-if=" tsp_type === `bothlab` && tsp_show === `true` " class="ts_poll_r_info"> {{row.Answer_Votes}} ( {{row.tsp_result_percent}} %% ) </span>
								<span  v-else  class="ts_poll_r_info"> {{ tsp_result_no }} </span>
							</label>
							<label class="ts_poll_r_label" dir="auto" v-else>
								<span  v-if=" tsp_type === `percent` && tsp_show === `true` " class="ts_poll_r_info"> {{row.tsp_result_percent}} %% </span>
								<span  v-else-if=" tsp_type === `count` && tsp_show === `true` " class="ts_poll_r_info"> {{row.Answer_Votes}} </span>
								<span  v-else-if=" tsp_type === `both` && tsp_show === `true` " class="ts_poll_r_info"> {{row.Answer_Votes}} ( {{row.tsp_result_percent}} %% ) </span>
								<span  v-else  class="ts_poll_r_info"> {{ tsp_result_no }} </span>
							</label>
						</span>
					</span>
				</div>
			</div>
			<div class="ts_poll_after_line_%1$s"></div>
		</main>',
		esc_attr( $total_soft_poll ),
		esc_attr( $tspoll_question_styles["ts_poll_i_ra"] ),
		esc_attr( $tspoll_question_styles["ts_poll_a_ca"] ),
		esc_attr( $tspoll_question_styles["ts_poll_v_ca"] ),
		filter_var( esc_html( $tspoll_question_styles["ts_poll_v_eff"] ), FILTER_VALIDATE_INT ),
		esc_html( $tspoll_question_styles["ts_poll_i_it"] ),
		'ts_poll_answer_input_' . esc_attr( $total_soft_poll ) . '-',
		'ts_poll_all' . esc_attr( $total_soft_poll ),
		$ts_poll_edit != 'true' ? 'v-bind:data-tsp="tspGetImageSrc(index,row.id)"' : 'v-bind:src="row.img_src"'
	);
	if ( $tspoll_question_styles["ts_poll_pop_show"] == 'true' || $ts_poll_edit == 'true' ) {
		echo sprintf(
			'
			<section id="tsp_popup_question_%1$s" class="tsp_popup_question_%1$s tsp_flex_col tsp_popup_question_fixed" v-on:click="tspHideAttachment($event.target)" style="display:none;">
				<div class="tsp_popup_inner_%1$s tsp_flex_col">
					<div id="tsp_popup_attachment_%1$s" class="tsp_popup_attachment_%1$s tsp_flex_col">
						<img >
					</div>
				</div>
				<div class="tsp_popup_inner_close_%1$s tsp_flex_col">
					<i class="tsp_popup_close_icon_%1$s  %2$s"></i>
				</div>
			</section>
			',
			esc_attr( $total_soft_poll ),
			esc_attr( $tspoll_question_styles["ts_poll_pop_it"] )
		);
	}
?>
