<?php 
	$tsp_footer_bgcolor = "";
	if ($ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || 
		$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' || 
		$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image in Question' || 
		$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video in Question') {
			$tsp_footer_bgcolor = array_key_exists("ts_poll_vb_mbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_mbgc"] )) : "";
	} else {
		$tsp_footer_bgcolor = array_key_exists("ts_poll_rb_mbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_mbgc"] )) : "";
	}
	
	$ts_poll_generated_css .= sprintf(
		'
		:root{
			--tsp_footer_bgc_%1$s:%2$s;
		}
		footer.ts_poll_footer_%1$s{
			width: 100%%;
			position:relative;
			padding: 10px;
			background-color: var(--tsp_footer_bgc_%1$s);
		}
		footer.ts_poll_footer_%1$s  button{
			display: -ms-inline-flexbox;
			display: -webkit-inline-flex;
			display: inline-flex;
			-webkit-flex-direction: row;
			-ms-flex-direction: row;
			flex-direction: row;
			-webkit-flex-wrap: wrap;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
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
		footer.ts_poll_footer_%1$s  button[data-tsp-pos="right"]{
			float:right;
		}
		footer.ts_poll_footer_%1$s  button[data-tsp-pos="left"]{
			float:left;
		}
		footer.ts_poll_footer_%1$s  button.ts_poll_back_button[data-tsp-pos="right"]{
			margin-left : auto;
		}
		footer.ts_poll_footer_%1$s  button.ts_poll_back_button[data-tsp-pos="left"]{
			margin-right : auto;
		}
		footer.ts_poll_footer_%1$s  button[data-tsp-pos="full"]{
			width: 98%% !important;
			margin: 5px 1%% !important;
		}
		footer.ts_poll_footer_%1$s button > i {
			display: -ms-inline-flexbox;
			display: -webkit-inline-flex;
			display: inline-flex;
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
		footer.ts_poll_footer_%1$s button:not([data-tsp-text=""]) > i[data-tsp="before"]:before {
			margin-right: 10px;
		}
		footer.ts_poll_footer_%1$s button:not([data-tsp-text=""]) > i[data-tsp="after"]{
			-webkit-flex-direction: row-reverse;
			-ms-flex-direction: row-reverse;
			flex-direction: row-reverse;
		}
		footer.ts_poll_footer_%1$s button:not([data-tsp-text=""]) > i[data-tsp="after"]:before {
			margin-left: 10px;
		}
		footer.ts_poll_footer_%1$s > div.ts_poll_footer_main{
			position: relative;
			width:100%%;
		}
		footer.ts_poll_footer_%1$s > div.ts_poll_footer_main > *:not([data-tsp-pos="full"]){
			margin : 0 5px;
		}
		footer.ts_poll_footer_%1$s > div.ts_poll_footer_res{
			position: absolute;
			left:0;
			right:0;
			bottom:0;
			top:0;
			background-color: var(--tsp_r_footer_bgc_%1$s) !important;
			opacity:0;
			z-index:-1;
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
			padding:7px;
		}
		footer.ts_poll_footer_%1$s .ts_poll_vote_button {
			background: var(--tsp_vote_bgc_%1$s) !important;
			border: var(--tsp_vote_bw_%1$s) solid var(--tsp_vote_bc_%1$s) !important;
			border-radius: var(--tsp_vote_br_%1$s);
			color: var(--tsp_vote_c_%1$s) !important;
			padding: 3px 10px;
			text-transform: none;
			line-height: 1;
			cursor: pointer;
		}
		footer.ts_poll_footer_%1$s .ts_poll_vote_button span {
			font-size: var(--tsp_vote_fs_%1$s) !important;
			font-family: var(--tsp_vote_ff_%1$s) !important;
			color: var(--tsp_vote_c_%1$s) !important;
		}
		footer.ts_poll_footer_%1$s .ts_poll_vote_button span:before {
			content:attr(data-tsp-text);
		}
		footer.ts_poll_footer_%1$s .ts_poll_vote_button:hover {
			background: var(--tsp_vote_h_bgc_%1$s) !important;
			opacity: 1;
		}
		footer.ts_poll_footer_%1$s  .ts_poll_vote_button:hover > .ts_poll_vote_icon:before,
		footer.ts_poll_footer_%1$s  .ts_poll_vote_button:hover > .ts_poll_vote_icon > span{
			color: var(--tsp_vote_h_c_%1$s) !important;
		}
		footer.ts_poll_footer_%1$s  .ts_poll_vote_button > .ts_poll_vote_icon {
			font-size: var(--tsp_vote_icon_fs_%1$s);
		}
		footer.ts_poll_footer_%1$s  .ts_poll_vote_button > .ts_poll_vote_icon:before {
			color: var(--tsp_vote_c_%1$s); 
			font-family: FontAwesome;
		}
		',
		esc_html( $total_soft_poll ),
		esc_html( $tsp_footer_bgcolor )
	);
	if ( $tspoll_question_styles["ts_poll_rb_show"] == 'true' || $ts_poll_edit == 'true' ) {
		$ts_poll_generated_css .= sprintf(
			'
			:root{
				 --tsp_result_bw_%1$s:%2$s;
				 --tsp_result_bc_%1$s:%3$s;
				 --tsp_result_br_%1$s:%4$s;
				 --tsp_result_bgc_%1$s:%5$s;
				 --tsp_result_c_%1$s:%6$s;
				 --tsp_result_h_bgc_%1$s:%7$s;
				 --tsp_result_h_c_%1$s:%8$s;
				 --tsp_result_fs_%1$s:%9$s;
				 --tsp_result_ff_%1$s:%10$s;
				 --tsp_result_icon_fs_%1$s:%11$s;
				 --tsp_back_bgc_%1$s:%12$s;
				 --tsp_back_bc_%1$s:%13$s;
				 --tsp_back_c_%1$s:%14$s;
				 --tsp_back_h_bgc_%1$s:%15$s;
				 --tsp_back_h_c_%1$s:%16$s;
				 --tsp_r_footer_bgc_%1$s:%17$s;
			}
			footer.ts_poll_footer_%1$s  .ts_poll_result_button {
				background: var(--tsp_result_bgc_%1$s) !important;
				border: var(--tsp_result_bw_%1$s) solid var(--tsp_result_bc_%1$s) !important;
				border-radius: var(--tsp_result_br_%1$s) !important;
				color: var(--tsp_result_c_%1$s) !important;
				padding: 3px 10px;
				text-transform: none;
				line-height: 1;
				cursor: pointer;
			}
			footer.ts_poll_footer_%1$s  .ts_poll_result_button  span {
				font-size: var(--tsp_result_fs_%1$s) !important;
				font-family: var(--tsp_result_ff_%1$s) !important;
				color: var(--tsp_result_c_%1$s) !important;
			}
			footer.ts_poll_footer_%1$s  .ts_poll_result_button  span:before {
				content:attr(data-tsp-text);
	
			}
			footer.ts_poll_footer_%1$s  .ts_poll_result_button:hover {
				background: var(--tsp_result_h_bgc_%1$s) !important;
				opacity: 1;
			}
			footer.ts_poll_footer_%1$s  .ts_poll_result_button:hover > .ts_poll_result_icon:before,
			footer.ts_poll_footer_%1$s  .ts_poll_result_button:hover > .ts_poll_result_icon > span{
				color: var(--tsp_result_h_c_%1$s) !important;
			}
			footer.ts_poll_footer_%1$s  .ts_poll_result_button > .ts_poll_result_icon {
				font-size: var(--tsp_result_icon_fs_%1$s) !important;
			}
			footer.ts_poll_footer_%1$s  .ts_poll_result_button > .ts_poll_result_icon:before {
				color: var(--tsp_result_c_%1$s) !important;
				font-family: FontAwesome;
			}
			footer.ts_poll_footer_%1$s  .ts_poll_back_button {
				background: var(--tsp_back_bgc_%1$s) !important;
				border: var(--tsp_result_bw_%1$s) solid var(--tsp_back_bc_%1$s) !important;
				border-radius: var(--tsp_result_br_%1$s) !important;
				color: var(--tsp_back_c_%1$s) !important;
				padding: 3px 10px !important;
				text-transform: none !important;
				line-height: 1 !important;
				cursor: pointer;
			}
			footer.ts_poll_footer_%1$s .ts_poll_back_button span {
				font-size: var(--tsp_result_fs_%1$s) !important;
				font-family: var(--tsp_result_ff_%1$s);
				color: var(--tsp_back_c_%1$s) !important;
			}
			footer.ts_poll_footer_%1$s .ts_poll_back_button span:before {
				content:attr(data-tsp-text);
			}
			footer.ts_poll_footer_%1$s .ts_poll_back_button:hover {
				background: var(--tsp_back_h_bgc_%1$s) !important;
				opacity: 1 !important;
			}
			footer.ts_poll_footer_%1$s .ts_poll_back_button:hover > .ts_poll_back_icon:before,
			footer.ts_poll_footer_%1$s .ts_poll_back_button:hover > .ts_poll_back_icon > span{
				color: var(--tsp_back_h_c_%1$s) !important;
			}
			footer.ts_poll_footer_%1$s .ts_poll_back_button > .ts_poll_back_icon {
				font-size: var(--tsp_result_icon_fs_%1$s) !important;
			}
			footer.ts_poll_footer_%1$s .ts_poll_back_button > .ts_poll_back_icon:before{
				color: var(--tsp_back_c_%1$s) !important;
				font-family: FontAwesome;
			}
		  	',
			esc_html( $total_soft_poll ),
			array_key_exists("ts_poll_rb_bw",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_rb_bw"] ), FILTER_VALIDATE_INT ) . 'px' : "",
			array_key_exists("ts_poll_rb_bc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_bc"] )) : "",
			array_key_exists("ts_poll_rb_br",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_rb_br"] ), FILTER_VALIDATE_INT ) . 'px' : "",
			array_key_exists("ts_poll_rb_bgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_bgc"] )) : "",
			array_key_exists("ts_poll_rb_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_c"] )) : "",
			array_key_exists("ts_poll_rb_hbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_hbgc"] )) : "",
			array_key_exists("ts_poll_rb_hc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_hc"] )) : "",
			array_key_exists("ts_poll_rb_fs",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_rb_fs"] ), FILTER_VALIDATE_INT ) . 'px' : "",
			array_key_exists("ts_poll_rb_ff",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_ff"] )) : "",
			array_key_exists("ts_poll_rb_is",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_rb_is"] ), FILTER_VALIDATE_INT ) . 'px' : "",
			$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bb_bgc"] )) : apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_bb_bgc"] )),
			$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bb_bc"] )) : apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_bb_bc"] )),
			$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bb_c"] )) : apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_bb_c"] )),
			$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bb_hbgc"] )) : apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_bb_hbgc"] )),
			$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bb_hc"] )) : apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_bb_hc"] )),
			$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bb_mbgc"] )) : apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_bb_mbgc"] ))
		);
	}
	if ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image in Question' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video in Question' ||
		 $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standard Poll' 
	) {
		$ts_poll_generated_css .= sprintf(
			'
			:root{
				--tsp_vote_bw_%1$s:%2$s;
				--tsp_vote_br_%1$s:%3$s;
				--tsp_vote_bc_%1$s:%4$s;
				--tsp_vote_fs_%1$s:%5$s;
				--tsp_vote_ff_%1$s:%6$s;
				--tsp_vote_bgc_%1$s:%7$s;
				--tsp_vote_c_%1$s:%8$s;
				--tsp_vote_h_bgc_%1$s:%9$s;
				--tsp_vote_h_c_%1$s:%10$s;
				--tsp_vote_icon_fs_%1$s:%11$s;
			}
			',
			esc_html( $total_soft_poll ),
			array_key_exists("ts_poll_vb_bw",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_vb_bw"] ), FILTER_VALIDATE_INT ) . 'px' : "",
			array_key_exists("ts_poll_vb_br",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_vb_br"] ), FILTER_VALIDATE_INT ) . 'px' : "",
			array_key_exists("ts_poll_vb_bc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_bc"] )) : "",
			array_key_exists("ts_poll_vb_fs",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_vb_fs"] ), FILTER_VALIDATE_INT ) . 'px' : "",
			array_key_exists("ts_poll_vb_ff",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_ff"] )) : "",
			array_key_exists("ts_poll_vb_bgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_bgc"] )) : "",
			array_key_exists("ts_poll_vb_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_c"] )) : "",
			array_key_exists("ts_poll_vb_hbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_hbgc"] )) : "",
			array_key_exists("ts_poll_vb_hc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_hc"] )) : "",
			array_key_exists("ts_poll_vb_is",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_vb_is"] ), FILTER_VALIDATE_INT ) . 'px' : ""
		);
	}
	if ( isset( $tspoll_question_styles["ts_poll_tv_show"] ) ) {
		if ( $tspoll_question_styles["ts_poll_tv_show"] == 'true' || $ts_poll_edit == 'true' ) {
			$ts_poll_generated_css .= sprintf(
				'				
				:root{
					--tsp_total_fs_%1$s:%2$s;
					--tsp_total_c_%1$s:%3$s;
				}
				footer.ts_poll_footer_%1$s .ts_poll_total_v {
					font-size: var(--tsp_total_fs_%1$s) !important;
					color: var(--tsp_total_c_%1$s) !important;
					padding: 3px 10px !important;
					text-transform: none !important;
					line-height: 1 !important;
					cursor: default;
					display: -ms-inline-flexbox;
					display: -webkit-inline-flex;
					display: inline-flex;
					-webkit-flex-wrap: wrap;
					-ms-flex-wrap: wrap;
					flex-wrap: wrap;
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
				footer.ts_poll_footer_%1$s .ts_poll_total_v span:before{
					content:attr(data-tsp-text);
				}
				footer.ts_poll_footer_%1$s .ts_poll_total_v span{
					margin:0 5px;
				}
				footer.ts_poll_footer_%1$s  .ts_poll_total_v[data-tsp-pos="right"]{
					float: right;
				}
				footer.ts_poll_footer_%1$s  .ts_poll_total_v[data-tsp-pos="left"]{
					float: left;
				}
				footer.ts_poll_footer_%1$s  .ts_poll_total_v[data-tsp-pos="full"]{
					width: 98%% !important;
					text-align: center;
				}
				footer.ts_poll_footer_%1$s  .ts_poll_total_v:not([data-tsp-text=""])[data-tsp-align="after"] {
					vertical-align: middle;
					-webkit-flex-direction: row-reverse;
					-ms-flex-direction: row-reverse;
					flex-direction: row-reverse;
				}
				footer.ts_poll_footer_%1$s  .ts_poll_total_v:not([data-tsp-text=""])[data-tsp-align="before"] {
					vertical-align: middle;
					-webkit-flex-direction: row;
					-ms-flex-direction: row;
					flex-direction: row;
				}
				',
				esc_html( $total_soft_poll ),
				array_key_exists("ts_poll_tv_fs",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_tv_fs"] ), FILTER_VALIDATE_INT ) . "px" : "",
				array_key_exists("ts_poll_tv_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_tv_c"] )) : ""
			);
		}
	}
	$tsp_result_button_code = $tsp_vote_button_code = $tsp_total_button_code = $tsp_back_button_code = '';
	if ( $tspoll_question_styles["ts_poll_rb_show"] == 'true' || $ts_poll_edit == 'true' ) {
		$tsp_result_button_code .= sprintf(
			'
			<button class="ts_poll_result_button"
				v-on:click="show_results"
				id="ts_poll_result_button_%1$s"
				style="%2$s"
				name="ts_poll_result_button" type="button"
				data-tsp-shid="%1$s"
				data-tsp-pos="%3$s"
				data-tsp-text="%4$s" 
			>
				<i class="ts_poll_result_icon %5$s" data-tsp="%6$s"><span data-tsp-text="%4$s"></span></i>
			</button>
			',
			esc_attr( $total_soft_poll ),
			$tspoll_question_styles["ts_poll_rb_show"] != 'true' ? esc_attr( 'display:none;' ) : '',
			esc_attr( $tspoll_question_styles["ts_poll_rb_pos"] ),
			esc_attr( html_entity_decode( htmlspecialchars_decode( $tspoll_question_styles["ts_poll_rb_text"] ), ENT_QUOTES ) ),
			esc_attr( $tspoll_question_styles["ts_poll_rb_it"] ),
			esc_attr( $tspoll_question_styles["ts_poll_rb_ia"] )
		);
		$tsp_back_button_code .= sprintf(
			'
			<button data-tsp-shid="%1$s" 
				v-on:click="hide_results"
				style="%2$s"
				data-tsp-pos="%3$s" class="ts_poll_back_button" 
				id="ts_poll_back_button_%1$s" 
				name="ts_poll_back_button_%1$s" type="button" 
				data-tsp-text="%4$s"
			>
				<i class="ts_poll_back_icon %5$s" data-tsp="%6$s">
					<span data-tsp-text="%4$s"></span>
				</i>
			</button>
			',
			esc_attr( $total_soft_poll ),
			$tspoll_question_styles["ts_poll_rb_show"] != 'true' ? esc_attr( 'display:none;' ) : '',
			$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ? esc_attr( $tspoll_question_styles["ts_poll_p_bb_pos"] ) : esc_attr( $tspoll_question_styles["ts_poll_bb_pos"] ),
			$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ? esc_html( html_entity_decode( htmlspecialchars_decode( $tspoll_question_styles["ts_poll_p_bb_text"] ), ENT_QUOTES ) ) : esc_html( html_entity_decode( htmlspecialchars_decode( $tspoll_question_styles["ts_poll_bb_text"] ), ENT_QUOTES ) ),
			$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ? esc_attr( $tspoll_question_styles["ts_poll_p_bb_it"] ) : esc_attr( $tspoll_question_styles["ts_poll_bb_it"] ),
			$ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ? esc_attr( $tspoll_question_styles["ts_poll_p_bb_ia"] ) : esc_attr( $tspoll_question_styles["ts_poll_bb_ia"] )
		);
	}
	if ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image in Question' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video in Question' ) {
		if ( $tspoll_question_styles["ts_poll_vb_show"] == 'true' || $ts_poll_edit == 'true' ) {
			$tsp_vote_button_code .= sprintf(
				'
				<button class="ts_poll_vote_button"
					v-on:click="vote_function"
					id="ts_poll_vote_button"
					style="%2$s"
					name="ts_poll_vote_button" type="button"
					data-tsp-text="%3$s"
					data-tsp-pos="%4$s"
				>
					<i class="ts_poll_vote_icon %5$s" data-tsp="%6$s"><span data-tsp-text="%3$s"></span></i>
				</button>
				',
				esc_html($total_soft_poll ),
				$tspoll_question_styles["ts_poll_vb_show"] != 'true' ? esc_attr( 'display:none;' ) : '',
				esc_html( html_entity_decode( htmlspecialchars_decode( $tspoll_question_styles["ts_poll_vb_text"] ), ENT_QUOTES ) ),
				esc_attr( $tspoll_question_styles["ts_poll_vb_pos"] ),
				esc_attr( $tspoll_question_styles["ts_poll_vb_it"] ),
				esc_attr( $tspoll_question_styles["ts_poll_vb_ia"] )
			);
		}
	}
	if ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standard Poll' ) {
		$tsp_vote_button_code .= sprintf(
			'
			<button class="ts_poll_vote_button"
				v-on:click="vote_function"
				id="ts_poll_vote_button"
				name="ts_poll_vote_button" type="button"
				data-tsp-text="%2$s"
				data-tsp-pos="%3$s"
			>
				<i class="ts_poll_vote_icon %4$s" data-tsp="%5$s"><span data-tsp-text="%2$s"></span></i>
			</button>
			',
			esc_html( $total_soft_poll ),
			esc_html( html_entity_decode( htmlspecialchars_decode( $tspoll_question_styles["ts_poll_vb_text"] ), ENT_QUOTES ) ),
			esc_attr( $tspoll_question_styles["ts_poll_vb_pos"] ),
			esc_attr( $tspoll_question_styles["ts_poll_vb_it"] ),
			esc_attr( $tspoll_question_styles["ts_poll_vb_ia"] )
		);
	}
	if ( isset( $tspoll_question_styles["ts_poll_tv_show"] ) ) {
		if ( $tspoll_question_styles["ts_poll_tv_show"] == 'true' || $ts_poll_edit == 'true' ) {
			if (isset($tspoll_question_styles["ts_poll_tv_pos"]) && $tspoll_question_styles["ts_poll_tv_pos"] === "center") {
				$tspoll_question_styles["ts_poll_tv_pos"] = "full";
			}
			$tsp_total_button_code .= sprintf(
				'
				<span class="ts_poll_total_v %1$s" style="%2$s" data-tsp-pos="%3$s" data-tsp-text="%4$s" data-tsp-align="%5$s">
					<span data-tsp-text="%6$s"> : {{ tsp_total }} </span>
				</span>
				',
				esc_html( $tspoll_question_styles["ts_poll_vt_it"] ),
				$tspoll_question_styles["ts_poll_tv_show"] != 'true' ? esc_attr( 'display:none;' ) : '',
				esc_attr( $tspoll_question_styles["ts_poll_tv_pos"] ),
				esc_html( html_entity_decode( htmlspecialchars_decode( $tspoll_question_styles["ts_poll_tv_text"] ), ENT_QUOTES ) ),
				esc_attr( $tspoll_question_styles["ts_poll_vt_ia"] ),
				esc_html( html_entity_decode( htmlspecialchars_decode( $tspoll_question_styles["ts_poll_tv_text"] ), ENT_QUOTES ) ),
				esc_attr( $total_soft_poll )
			);
		}
	}
	echo sprintf(
		'
		<footer id="%1$s" class="%1$s" v-bind:class="{tsp_sceleton_item: tsp_sceleton}">
			<div class="ts_poll_footer_main">
				%2$s
				%3$s
				%4$s
			</div>
			<div class="ts_poll_footer_res">
				%5$s
			</div>
		</footer>
      	',
		'ts_poll_footer_' . esc_attr( $total_soft_poll ),
		$tsp_result_button_code,
		$tsp_vote_button_code,
		$tsp_total_button_code,
		$tsp_back_button_code,
		esc_attr( $total_soft_poll )
	);
?>
