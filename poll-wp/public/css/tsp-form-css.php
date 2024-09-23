<?php 
	$ts_poll_generated_css .= sprintf(
		'
		:root{
			--tsp_section_w_%1$s:%2$s;
			--tsp_section_bw_%1$s:%3$s;
			--tsp_section_bc_%1$s:%4$s;
			--tsp_section_br_%1$s:%5$s;
			--tsp_section_box_c_%1$s:%6$s;
		}
		form.ts_poll_form_%1$s[data-tsp-mode="coming"] > div > span.ts_poll_cs_%1$s{
			display:flex !important;
		}
		form.ts_poll_form_%1$s[data-tsp-mode="coming"] > div > *:not(span.ts_poll_cs_%1$s){
			z-index: -1;
			visibility: hidden;
		}
		form.ts_poll_form_%1$s:not([data-tsp-mode="coming"]) > div > span.ts_poll_cs_%1$s{
			z-index: -1;
			visibility: hidden;
			display:none !important;
		}
		form.ts_poll_form_%1$s[data-tsp-mode="end"] > div > footer{
			display:none !important;
		}
		form.ts_poll_form_%1$s[data-tsp-pos="left"]{
			-webkit-justify-content: flex-start;-ms-flex-pack: start;justify-content: flex-start;
		}
		form.ts_poll_form_%1$s[data-tsp-pos="right"]{
			-webkit-justify-content: flex-end;-ms-flex-pack: end;justify-content: flex-end;
		}
		form.ts_poll_form_%1$s[data-tsp-pos="center"]{
			-webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;
		}
		form.ts_poll_form_%1$s *{
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			font-weight:inherit;
		}
		div#ts_poll_section_%1$s{
			width: var(--tsp_section_w_%1$s);
			border-width:  var(--tsp_section_bw_%1$s);
			border-style:solid;
			border-color: var(--tsp_section_bc_%1$s);
			border-radius: var(--tsp_section_br_%1$s);
			display: -ms-flexbox;display: -webkit-flex;display: flex;
			-webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
			-webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
			overflow: hidden;
			position:relative;
		}
		div#ts_poll_section_%1$s[data-tsp-box="none"]{
			-webkit-box-shadow: none;
			-moz-box-shadow: none;
			box-shadow: none;
		}
		div#ts_poll_section_%1$s[data-tsp-box="true"]{
			-webkit-box-shadow: 0px 0px 13px var(--tsp_section_box_c_%1$s);
			-moz-box-shadow: 0px 0px 13px var(--tsp_section_box_c_%1$s);
			box-shadow: 0px 0px 13px var(--tsp_section_box_c_%1$s);
		}
		div#ts_poll_section_%1$s[data-tsp-box="false"]{
			-webkit-box-shadow: 0 25px 13px -18px var(--tsp_section_box_c_%1$s);
			-moz-box-shadow: 0 25px 13px -18px var(--tsp_section_box_c_%1$s);
			box-shadow: 0 25px 13px -18px var(--tsp_section_box_c_%1$s);
		}
		div#ts_poll_section_%1$s[data-tsp-box="sh03"]{
			box-shadow: 0 10px 6px -6px var(--tsp_section_box_c_%1$s);
			-webkit-box-shadow: 0 10px 6px -6px var(--tsp_section_box_c_%1$s);
			-moz-box-shadow: 0 10px 6px -6px var(--tsp_section_box_c_%1$s);
		}
		div#ts_poll_section_%1$s[data-tsp-box="sh04"]{
			box-shadow: 0 1px 4px var(--tsp_section_box_c_%1$s), 0 0 40px var(--tsp_section_box_c_%1$s) inset;
			-webkit-box-shadow: 0 1px 4px var(--tsp_section_box_c_%1$s), 0 0 40px var(--tsp_section_box_c_%1$s) inset;
			-moz-box-shadow: 0 1px 4px var(--tsp_section_box_c_%1$s), 0 0 40px var(--tsp_section_box_c_%1$s) inset;
		}
		div#ts_poll_section_%1$s[data-tsp-box="sh05"]{
			box-shadow: 0 0 10px var(--tsp_section_box_c_%1$s);
			-webkit-box-shadow: 0 0 10px var(--tsp_section_box_c_%1$s);
			-moz-box-shadow: 0 0 10px var(--tsp_section_box_c_%1$s);
		}
		div#ts_poll_section_%1$s[data-tsp-box="sh06"]{
			box-shadow: 4px -4px var(--tsp_section_box_c_%1$s);
			-moz-box-shadow: 4px -4px var(--tsp_section_box_c_%1$s);
			-webkit-box-shadow: 4px -4px var(--tsp_section_box_c_%1$s);
		}
		div#ts_poll_section_%1$s[data-tsp-box="sh07"]{
			box-shadow: 5px 5px 3px var(--tsp_section_box_c_%1$s);
			-moz-box-shadow: 5px 5px 3px var(--tsp_section_box_c_%1$s);
			-webkit-box-shadow: 5px 5px 3px var(--tsp_section_box_c_%1$s);
		}
		div#ts_poll_section_%1$s[data-tsp-box="sh08"]{
			box-shadow: 2px 2px white, 4px 4px var(--tsp_section_box_c_%1$s);
			-moz-box-shadow: 2px 2px white, 4px 4px var(--tsp_section_box_c_%1$s);
			-webkit-box-shadow: 2px 2px white, 4px 4px var(--tsp_section_box_c_%1$s);
		}
		div#ts_poll_section_%1$s[data-tsp-box="sh09"]{
			box-shadow: 8px 8px 18px var(--tsp_section_box_c_%1$s);
			-moz-box-shadow: 8px 8px 18px var(--tsp_section_box_c_%1$s);
			-webkit-box-shadow: 8px 8px 18px var(--tsp_section_box_c_%1$s);
		}
		div#ts_poll_section_%1$s[data-tsp-box="sh10"]{
			box-shadow: 0 8px 6px -6px var(--tsp_section_box_c_%1$s);
			-moz-box-shadow: 0 8px 6px -6px var(--tsp_section_box_c_%1$s);
			-webkit-box-shadow: 0 8px 6px -6px var(--tsp_section_box_c_%1$s);
		}
		div#ts_poll_section_%1$s[data-tsp-box="sh11"]{
			box-shadow: 0 0 18px 7px var(--tsp_section_box_c_%1$s);
			-moz-box-shadow: 0 0 18px 7px var(--tsp_section_box_c_%1$s);
			-webkit-box-shadow: 0 0 18px 7px var(--tsp_section_box_c_%1$s);
		}
		',
		esc_html( $total_soft_poll ),
		array_key_exists( "ts_poll_mw" ,$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_mw"] ), FILTER_VALIDATE_INT ) . "%" : "",
		array_key_exists( "ts_poll_bw" ,$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_bw"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists( "ts_poll_bc" ,$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_bc"] ) )  : "",
		array_key_exists( "ts_poll_br" ,$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_br"] ), FILTER_VALIDATE_INT ) . "px" : "",
		array_key_exists( "ts_poll_boxshc" ,$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_boxshc"] ) )  : ""
	);
?>
