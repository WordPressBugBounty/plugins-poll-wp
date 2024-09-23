<?php
    $ts_poll_generated_css .= sprintf(
        '
        :root{
            --tsp_checkbox_size_%1$s:%2$s;
            --tsp_footer_bgc_%1$s:%3$s;
            --tsp_result_bw_%1$s:%4$s;
            --tsp_result_bc_%1$s:%5$s;
            --tsp_result_br_%1$s:%6$s;
            --tsp_result_bgc_%1$s:%7$s;
            --tsp_result_c_%1$s:%8$s;
            --tsp_result_h_bgc_%1$s:%9$s;
            --tsp_result_h_c_%1$s:%10$s;
            --tsp_result_fs_%1$s:%11$s;
            --tsp_result_ff_%1$s:%12$s;
            --tsp_result_icon_fs_%1$s:%13$s;
            --tsp_vote_bw_%1$s:%14$s;
            --tsp_vote_br_%1$s:%15$s;
            --tsp_vote_bc_%1$s:%16$s;
            --tsp_vote_fs_%1$s:%17$s;
            --tsp_vote_ff_%1$s:%18$s;
            --tsp_vote_bgc_%1$s:%19$s;
            --tsp_vote_c_%1$s:%20$s;
            --tsp_vote_h_bgc_%1$s:%21$s;
            --tsp_vote_h_c_%1$s:%22$s;
            --tsp_vote_icon_fs_%1$s:%23$s;
            --tsp_r_header_bgc_%1$s:%24$s;
            --tsp_r_header_c_%1$s:%25$s;
            --tsp_r_header_l_w_%1$s:%26$s;
            --tsp_r_header_l_bh_%1$s:%27$s;
            --tsp_r_header_l_bs_%1$s:%28$s;
            --tsp_r_header_l_bc_%1$s:%29$s;
            --tsp_r_footer_bgc_%1$s:%30$s;
            --tsp_back_bgc_%1$s:%31$s;
            --tsp_back_bc_%1$s:%32$s;
            --tsp_back_c_%1$s:%33$s;
            --tsp_back_h_bgc_%1$s:%34$s;
            --tsp_back_h_c_%1$s:%35$s;
            --tsp_r_main_bgc_%1$s:%36$s;
            --tsp_r_answer_bgc_%1$s:%37$s;
            --tsp_r_answer_vc_%1$s:%38$s;
            --tsp_r_answer_pc_%1$s:%39$s;
            --tsp_r_main_l_w_%1$s:%40$s;
            --tsp_r_main_l_h_%1$s:%41$s;
            --tsp_r_main_l_bc_%1$s:%42$s;
            --tsp_r_main_l_bs_%1$s:%43$s;
            --tsp_r_section_bw_%1$s:%44$s;
            --tsp_r_section_bc_%1$s:%45$s;
        }
        div#ts_poll_section_%1$s > main.ts_poll_main_%1$s {
            display: -ms-flexbox;display: -webkit-flex;display: flex;
            -webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
            -webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
            -webkit-align-content: center;-ms-flex-line-pack: center;align-content: center;
            -webkit-align-items: center;-ms-flex-align: center;align-items: center;
            background-color: var(--tsp_main_bgc_%1$s);
            width:100%% !important;
            padding: 8px 10px 5px 10px;
        }
        main.ts_poll_main_%1$s > .ts_poll_answer {
            width:100%%;
            padding: 0px 5px;
            background-color: var(--tsp_answer_bgc_%1$s);
            line-height: 0.85 !important;
        }
        main.ts_poll_main_%1$s > .ts_poll_answer:not(:last-child) {
            margin-bottom: 4px;
        }
        main.ts_poll_main_%1$s > .ts_poll_answer:hover {
            background-color: var(--tsp_answer_h_bgc_%1$s) !important;
        }
        main.ts_poll_main_%1$s > .ts_poll_answer:hover > .ts_poll_answer_label {
            color: var(--tsp_answer_h_c_%1$s) !important;
        }
        main.ts_poll_main_%1$s > .ts_poll_answer > input{
            display:none !important;
        }
        main.ts_poll_main_%1$s[data-tsp-bool="true"] > .ts_poll_answer > .ts_poll_answer_label {
            color: var(--tsp_answer_c_%1$s) !important;
        }
        main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_answer_label {
            font-size: var(--tsp_answer_fs_%1$s);
            cursor: pointer;
            margin-bottom: 0px;
            font-family: var(--tsp_answer_ff_%1$s);
            display: -ms-flexbox;display: -webkit-flex;display: flex;
            -webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
            -webkit-align-content: center;-ms-flex-line-pack: center;align-content: center;
            -webkit-align-items: center;-ms-flex-align: center;align-items: center;
            -webkit-justify-content: flex-start;-ms-flex-pack: start;justify-content: flex-start;
            line-height:1;
            padding-left:0 !important;
            word-break: break-word;
            text-align:right !important;
        }
        main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_answer_label:before {
            font-size: 18px;
            color: var(--tsp_before_check_c_%1$s) !important;
            content: var(--tsp_before_check_%1$s);
            margin: 0 .25em 0 0;
            padding: 8px;
            font-family: FontAwesome;
            font-size:var(--tsp_checkbox_size_%1$s);
        }
        main.ts_poll_main_%1$s > .ts_poll_answer > input:checked + .ts_poll_answer_label:before {
            color: var(--tsp_after_check_c_%1$s) !important;
            content: var(--tsp_after_check_%1$s); 
            font-family: FontAwesome;
        }
        main.ts_poll_main_%1$s > .ts_poll_answer > input:checked + .ts_poll_answer_label:after {
            font-weight: bold;
        }
        main.ts_poll_main_%1$s > .ts_poll_answer:hover > .ts_poll_answer_label {
            cursor:pointer;
            color: var(--tsp_answer_h_c_%1$s) !important;
        }
        footer.ts_poll_footer_%1$s{
            background-color: var(--tsp_footer_bgc_%1$s) !important;
            width: 100%%;
            position:relative;
        }
        footer.ts_poll_footer_%1$s > *[data-tsp-pos="right"]{
            float: right;
            margin: 10px 10px;
        }
        footer.ts_poll_footer_%1$s > *[data-tsp-pos="left"]{
            margin: 10px 10px;
        }
        footer.ts_poll_footer_%1$s > *[data-tsp-pos="full"]{
            width: 98%% !important;
            margin: 5px 1%% !important;
        }
        footer.ts_poll_footer_%1$s > .ts_poll_result_button {
            background: var(--tsp_result_bgc_%1$s) !important;
            border: var(--tsp_result_bw_%1$s) solid var(--tsp_result_bc_%1$s) !important;
            border-radius: var(--tsp_result_br_%1$s) !important;
            color: var(--tsp_result_c_%1$s) !important;
            padding: 3px 10px;
            text-transform: none;
            line-height: 1;
            cursor: pointer;
        }
        footer.ts_poll_footer_%1$s > .ts_poll_result_button  span {
            font-size: var(--tsp_result_fs_%1$s) !important;
            font-family: var(--tsp_result_ff_%1$s) !important;
            color: var(--tsp_result_c_%1$s) !important;
        }
        footer.ts_poll_footer_%1$s > .ts_poll_result_button  span:before {
            content: attr(data-tsp-text);
        }
        footer.ts_poll_footer_%1$s > .ts_poll_result_button:hover {
            background: var(--tsp_result_h_bgc_%1$s) !important;
            opacity: 1;
        }
        footer.ts_poll_footer_%1$s > .ts_poll_result_button:hover > .ts_poll_result_icon:before,
        footer.ts_poll_footer_%1$s > .ts_poll_result_button:hover > .ts_poll_result_icon > span {
            color: var(--tsp_result_h_c_%1$s) !important;
        }
        footer.ts_poll_footer_%1$s > .ts_poll_result_button > .ts_poll_result_icon {
            font-size: var(--tsp_result_icon_fs_%1$s) !important;
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
        footer.ts_poll_footer_%1$s button:not([data-tsp-text=""]) > i[data-tsp="after"]{
            -webkit-flex-direction: row-reverse;
            -ms-flex-direction: row-reverse;
            flex-direction: row-reverse;
        }
        footer.ts_poll_footer_%1$s button:not([data-tsp-text=""]) > i[data-tsp="before"]:before {
            margin-right: 10px;
        }
        footer.ts_poll_footer_%1$s button:not([data-tsp-text=""]) > i[data-tsp="after"]:before {
            margin-left: 10px;
        }
        footer.ts_poll_footer_%1$s > .ts_poll_result_button > .ts_poll_result_icon:before {
            color: var(--tsp_result_c_%1$s) !important;
            font-family: FontAwesome;
        }
        footer.ts_poll_footer_%1$s > .ts_poll_vote_button {
            background: var(--tsp_vote_bgc_%1$s) !important;
            border: var(--tsp_vote_bw_%1$s) solid var(--tsp_vote_bc_%1$s) !important;
            border-radius: var(--tsp_vote_br_%1$s);
            color: var(--tsp_vote_c_%1$s) !important;
            padding: 3px 10px;
            text-transform: none;
            line-height: 1;
            cursor: pointer;
        }
        footer.ts_poll_footer_%1$s > .ts_poll_vote_button span {
            font-size: var(--tsp_vote_fs_%1$s) !important;
            font-family: var(--tsp_vote_ff_%1$s) !important;
            color: var(--tsp_vote_c_%1$s) !important;
        }
        footer.ts_poll_footer_%1$s > .ts_poll_vote_button span:before{
            content:attr(data-tsp-text);
        }
        footer.ts_poll_footer_%1$s > .ts_poll_vote_button:hover {
            background: var(--tsp_vote_h_bgc_%1$s) !important;
            opacity: 1;
        }
        footer.ts_poll_footer_%1$s > .ts_poll_vote_button:hover > .ts_poll_vote_icon:before,
        footer.ts_poll_footer_%1$s > .ts_poll_vote_button:hover > .ts_poll_vote_icon > span {
            color: var(--tsp_vote_h_c_%1$s) !important;
        }
        footer.ts_poll_footer_%1$s > .ts_poll_vote_button > .ts_poll_vote_icon {
            font-size: var(--tsp_vote_icon_fs_%1$s);
        }
        footer.ts_poll_footer_%1$s > .ts_poll_vote_button > .ts_poll_vote_icon:before {
            color: var(--tsp_vote_c_%1$s); 
            font-family: FontAwesome;
        }
        div#ts_poll_section_%1$s[max-width~="300px"] footer.ts_poll_r_footer_%1$s button {
            width: 98%% !important;
            margin: 5px 1%% !important;
        }
        header.ts_poll_r_header_%1$s{
            width:100%%;
            display: -ms-flexbox;display: -webkit-flex;display: flex;
            -webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
            -webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
            -webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;
            -webkit-align-content: center;-ms-flex-line-pack: center;align-content: center;
            -webkit-align-items: center;-ms-flex-align: center;align-items: center;
            -webkit-justify-content: center;-ms-flex-pack: center;justify-content: center;
            background-color:var(--tsp_r_header_bgc_%1$s); 
            color:var(--tsp_r_header_c_%1$s); 
            padding: 5px 10px 5px;
        }
        header.ts_poll_r_header_%1$s > span.ts_poll_title_%1$s{
            margin-bottom: 7px;
            text-align:var(--tsp_header_ta_%1$s);
            font-size:var(--tsp_header_fs_%1$s);
            font-family:var(--tsp_header_ff_%1$s);
            line-height:1.2;
        }
        header.ts_poll_r_header_%1$s[data-tsp-pos="left"] > span.ts_poll_title_%1$s{
            margin-right: auto;
        }
        header.ts_poll_r_header_%1$s[data-tsp-pos="right"] > span.ts_poll_title_%1$s{
            margin-left: auto;
        }
        header.ts_poll_r_header_%1$s > div.ts_poll_line_%1$s{
            width:var(--tsp_r_header_l_w_%1$s);
            border-top-width:var(--tsp_r_header_l_bh_%1$s);
            border-top-style:var(--tsp_r_header_l_bs_%1$s);
            border-top-color:var(--tsp_r_header_l_bc_%1$s);
        }
        footer.ts_poll_r_footer_%1$s button:focus{
            outline: none !important;
        }
        footer.ts_poll_r_footer_%1$s {
            padding: 0px;
            background-color: var(--tsp_r_footer_bgc_%1$s);
            position: relative;
            width: 100%%;
            height: inherit !important;
            display: -ms-flexbox;display: -webkit-flex;display: flex;
            -webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
            -webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
        }
        footer.ts_poll_r_footer_%1$s[data-tsp-pos="right"]{
            -webkit-align-items: flex-end;-ms-flex-align: end;align-items: flex-end;
        }
        footer.ts_poll_r_footer_%1$s[data-tsp-pos="left"]{
            -webkit-align-items: flex-start;-ms-flex-align: start;align-items: flex-start;
        }
        footer.ts_poll_r_footer_%1$s[data-tsp-pos="full"]{
            -webkit-align-items: center;-ms-flex-align: center;align-items: center;
        }
        footer.ts_poll_r_footer_%1$s[data-tsp-pos="right"] > .ts_poll_back_button{
            margin: 10px 10px;
        }
        footer.ts_poll_r_footer_%1$s[data-tsp-pos="left"] > .ts_poll_back_button{
            margin: 10px 10px;
        }
        footer.ts_poll_r_footer_%1$s[data-tsp-pos="full"] > .ts_poll_back_button{
            width: 98%% !important;
            margin: 5px 1%% !important;
        }
        footer.ts_poll_r_footer_%1$s > .ts_poll_back_button {
            background-color: var(--tsp_back_bgc_%1$s) !important;
            border: var(--tsp_result_bw_%1$s) solid var(--tsp_back_bc_%1$s) !important;
            border-radius: var(--tsp_result_br_%1$s) !important;
            color: var(--tsp_back_c_%1$s) !important;
            padding: 3px 10px !important;
            text-transform: none !important;
            line-height: 1 !important;
            cursor: pointer;
        }
        footer.ts_poll_r_footer_%1$s > .ts_poll_back_button span {
            font-size: var(--tsp_result_fs_%1$s) !important;
            font-family: var(--tsp_result_ff_%1$s);
            color: var(--tsp_back_c_%1$s) !important;
        }
        footer.ts_poll_r_footer_%1$s > .ts_poll_back_button span:before {
            content:attr(data-tsp-text);
        }
        footer.ts_poll_r_footer_%1$s > .ts_poll_back_button:hover {
            background-color: var(--tsp_back_h_bgc_%1$s) !important;
            opacity: 1 !important;
        }
        footer.ts_poll_r_footer_%1$s > .ts_poll_back_button:hover > .ts_poll_back_icon:before,
        footer.ts_poll_r_footer_%1$s > .ts_poll_back_button:hover > .ts_poll_back_icon > span{
            color: var(--tsp_back_h_c_%1$s) !important;
        }
        footer.ts_poll_r_footer_%1$s > .ts_poll_back_button > .ts_poll_back_icon {
            font-size: var(--tsp_result_icon_fs_%1$s) !important;
        }
        footer.ts_poll_r_footer_%1$s button > i {
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
        footer.ts_poll_r_footer_%1$s button:not([data-tsp-text=""]) > i[data-tsp="before"]:before {
            margin-right: 10px;
        }
        footer.ts_poll_r_footer_%1$s button:not([data-tsp-text=""]) > i[data-tsp="after"]{
            -webkit-flex-direction: row-reverse;
            -ms-flex-direction: row-reverse;
            flex-direction: row-reverse;
        }
        footer.ts_poll_r_footer_%1$s button:not([data-tsp-text=""]) > i[data-tsp="after"]:before {
            margin-left: 10px;
        }
        footer.ts_poll_r_footer_%1$s > .ts_poll_back_button > .ts_poll_back_icon:before{
            color: var(--tsp_back_c_%1$s) !important;
            font-family: FontAwesome;
        }
        main.ts_poll_r_main_%1$s{
            box-sizing: border-box;
            display: -ms-flexbox;display: -webkit-flex;display: flex;
            -webkit-flex-direction: column;-ms-flex-direction: column;flex-direction: column;
            -webkit-flex-wrap: nowrap;-ms-flex-wrap: nowrap;flex-wrap: nowrap;
            -webkit-align-content: center;-ms-flex-line-pack: center;align-content: center;
            -webkit-align-items: center;-ms-flex-align: center;align-items: center;
            position: relative;
            background-color: var(--tsp_r_main_bgc_%1$s);
            width:100%%;
            padding: 8px 10px 5px 10px;
            overflow-x: hidden;
            overflow-y: auto;
        }
        main.ts_poll_r_main_%1$s::-webkit-scrollbar {
            width: .3125rem;
            height: .3125rem;
        }
        main.ts_poll_r_main_%1$s::-webkit-scrollbar-thumb {
            border-radius: .5rem;
            box-shadow: inset 0 0 .3125rem rgb(0 0 0 / 30%%);
            background-color: #dcdcde;
            border: .0625rem solid #dcdcde;
        }
        main.ts_poll_r_main_%1$s > .ts_poll_answer_result {
            position: relative;
            display: inline-block;
            width: 100%%;
            padding: 0px ;
            background-color: var(--tsp_r_answer_bgc_%1$s) !important;
            line-height: 0.85 !important;
        }
        main.ts_poll_r_main_%1$s > .ts_poll_answer_result:not(:last-child) {
            margin-bottom: 4px;
        }
        main.ts_poll_r_main_%1$s > .ts_poll_answer_result > .ts_poll_answer_result_label {
            display: inline-block;
            float: none;
            width: 100%%;
            font-size: var(--tsp_answer_fs_%1$s) !important;
            color: var(--tsp_r_answer_vc_%1$s) !important;
            position: relative;
            padding: 8px;
            line-height: 1 !important;
            margin-bottom: 0px !important;
            font-family:var(--tsp_answer_ff_%1$s);
        }
        main.ts_poll_r_main_%1$s[data-tsp-bool="true"] > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
            background-color: var(--tsp_r_answer_pc_%1$s) !important;
        }
        main.ts_poll_r_main_%1$s > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
            position: absolute !important;
            min-width: 3px;
            height: 100%%;
            left: 0;
            top: 0%%;
        }
        main.ts_poll_r_main_%1$s[data-tsp-veff="2"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
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
        main.ts_poll_r_main_%1$s[data-tsp-veff="3"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
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
        main.ts_poll_r_main_%1$s[data-tsp-veff="4"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
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
        main.ts_poll_r_main_%1$s[data-tsp-veff="5"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
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
        main.ts_poll_r_main_%1$s[data-tsp-veff="6"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
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
        main.ts_poll_r_main_%1$s[data-tsp-veff="7"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
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
        main.ts_poll_r_main_%1$s[data-tsp-veff="8"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
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
        main.ts_poll_r_main_%1$s[data-tsp-veff="9"]   > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_percent_line {
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
        main.ts_poll_r_main_%1$s > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_answer_info_line {
            float: right;margin-right: 3px;position: inherit;z-index: 99999999999;
        }
        main.ts_poll_r_main_%1$s > div.ts_poll_after_line_%1$s {
            width: var(--tsp_r_main_l_w_%1$s );
            margin-top: 5px;
            border-top: var(--tsp_r_main_l_h_%1$s ) var(--tsp_r_main_l_bs_%1$s) var(--tsp_r_main_l_bc_%1$s);
        }
        main.ts_poll_r_main_%1$s[data-tsp-after="none"] > div.ts_poll_after_line_%1$s {
            display: none;
        }
        main.ts_poll_r_main_%1$s > .ts_poll_answer_result > .ts_poll_answer_result_label > .ts_poll_r_answer_title{
            margin-left: 3px; 
            position: inherit; 
            z-index: 2; 
            font-size: var(--tsp_answer_fs_%1$s);
            word-break: break-word;
        }
        main.ts_poll_r_main_%1$s > .ts_poll_answer_result:hover > .ts_poll_answer_result_label {
            cursor:pointer;
            color: var(--tsp_answer_h_c_%1$s) !important;
        }
        .ts_poll_result_popup_section_%1$s,.ts_poll_result_popup_result_%1$s {position: fixed;max-width: 5000px !important;left: 0;}
        .ts_poll_result_popup_section_%1$s {width: 100%% !important;height: 0%%;background-color: rgba(0, 0, 0, 0.3);top: 0;z-index: 99999999999;}
        .ts_poll_result_popup_result_%1$s {z-index: 9999999999999;width: 0%%;top: 83px;}
        .ts_poll_r_section_%1$s {
            width: 100%%;
            left: 0%%;
            display:grid;
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s:not([data-tsp-effect="FCTA"]) {
            left: 0;
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s:not([data-tsp-effect="FCTA"])[data-tsp-pos="left"] {
            left: 0;
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s:not([data-tsp-effect="FCTA"])[data-tsp-pos="right"] {
            right: 0;
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FCTA"]{
            left: 50%%;
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FCTA"][data-tsp-pos="left"]{
            left: calc(50%% - calc(calc(100%% - var(--tsp_section_w_%1$s)) / 2));
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FCTA"][data-tsp-pos="right"]{
            right: calc(50%% - calc(calc(100%% - var(--tsp_section_w_%1$s)) / 2));
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FTTB"] {
            opacity: 0;
            -webkit-transform: translateY(-12000px);
            -moz-transform: translateY(-12000px);
            -o-transform: translateY(-12000px);
            -ms-transform: translateY(-12000px);
            transform: translateY(-12000px);
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FLTR"]{
            -webkit-transform: translateX(-12000px);
            -moz-transform: translateX(-12000px);
            -o-transform: translateX(-12000px);
            -ms-transform: translateX(-12000px);
            transform: translateX(-12000px);
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FRTL"] {
            -webkit-transform: translateX(12000px);
            -moz-transform: translateX(12000px);
            -o-transform: translateX(12000px);
            -ms-transform: translateX(12000px);
            transform: translateX(12000px);
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FCTA"] {
            position: absolute;
            width: 0%%;
            height: 0%%;
            top: 50%%;
            overflow: hidden;
            border: 0px;
            border-style: solid;
            border-color: var(--tsp_r_section_bc_%1$s);
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FTL"] {
            -ms-transform: rotateY(-90deg); /* IE 9 */
            -moz-transform: rotateY(-90deg);
            -o-transform: rotateY(-90deg);
            -webkit-transform: rotateY(-90deg); /* Safari */
            transform: rotateY(-90deg); /* Standard syntax */
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FTR"] {
            -ms-transform: rotateX(-90deg); /* IE 9 */
            -moz-transform: rotateX(-90deg);
            -o-transform: rotateX(-90deg);
            -webkit-transform: rotateX(-90deg); /* Safari */
            transform: rotateX(-90deg); /* Standard syntax */
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FBL"] {
            z-index: -1;
            -ms-transform: rotate(-180deg); /* IE 9 */
            -moz-transform: rotate(-180deg);
            -o-transform: rotate(-180deg);
            -webkit-transform: rotate(-180deg); /* Safari */
            transform: rotate(-180deg); /* Standard syntax */
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FBR"] {
            -ms-transform: skewX(90deg); /* IE 9 */
            -moz-transform: skewX(90deg);
            -o-transform: skewX(90deg);
            -webkit-transform: skewX(90deg); /* Safari */
            transform: skewX(90deg); /* Standard syntax */
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FBTT"] {
            -ms-transform: skewY(90deg);
            -moz-transform: skewY(90deg);
            -o-transform: skewY(90deg);
            -webkit-transform: skewY(90deg);
            transform: skewY(90deg);
        }
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FTTB"],div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FLTR"],div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FRTL"],
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FTL"],div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FTR"],
        div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FBL"],div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FBR"],div#ts_poll_section_%1$s > .ts_poll_r_section_%1$s[data-tsp-effect="FBTT"]{
            position: absolute !important;
            width: 100%%;
            height: 100%%;
            top: 0%%;
            overflow: hidden;
            -webkit-transition: all 0.5s ease-in-out 0.5s;
            -moz-transition: all 0.5s ease-in-out 0.5s;
            -o-transition: all 0.5s ease-in-out 0.5s;
            -ms-transition: all 0.5s ease-in-out 0.5s;
            transition: all 0.5s ease-in-out 0.5s;
            -webkit-transition-delay: 0s;
            -moz-transition-delay: 0s;
            -o-transition-delay: 0s;
            -ms-transition-delay: 0s;
            transition-delay: 0s;
        }
        #ts_poll_modal_result_section_%1$s{
            position: relative;
            margin: 4%% auto 0;
            box-sizing: border-box;
            border: var(--tsp_r_section_bw_%1$s) solid var(--tsp_r_section_bc_%1$s);
            border-radius: var(--tsp_section_br_%1$s);
        }
        #ts_poll_modal_result_section_%1$s[data-tsp-effect="FTTB"] {
            -webkit-transform: translateY(-12000px);
            -moz-transform: translateY(-12000px);
            -o-transform: translateY(-12000px);
            -ms-transform: translateY(-12000px);
            transform: translateY(-12000px);
            opacity: 0;
        }
        #ts_poll_modal_result_section_%1$s[data-tsp-effect="FLTR"]{
            -webkit-transform: translateX(-12000px);
            -moz-transform: translateX(-12000px);
            -o-transform: translateX(-12000px);
            -ms-transform: translateX(-12000px);
            transform: translateX(-12000px);
        }
        #ts_poll_modal_result_section_%1$s[data-tsp-effect="FRTL"] {
            -webkit-transform: translateX(12000px);
            -moz-transform: translateX(12000px);
            -o-transform: translateX(12000px);
            -ms-transform: translateX(12000px);
            transform: translateX(12000px);
        }
        #ts_poll_modal_result_section_%1$s[data-tsp-effect="FCTA"] {
            width: 0%%;
            height: 0%%;
            overflow: hidden;
            border: var(--tsp_r_section_bw_%1$s) solid var(--tsp_r_section_bc_%1$s);
            border-radius: var(--tsp_section_br_%1$s);
        }
        #ts_poll_modal_result_section_%1$s[data-tsp-effect="FTL"] {
            -ms-transform: rotateY(-90deg);
            -moz-transform: rotateY(-90deg);
            -o-transform: rotateY(-90deg);
            -webkit-transform: rotateY(-90deg);
            transform: rotateY(-90deg);
        }
        #ts_poll_modal_result_section_%1$s[data-tsp-effect="FTR"] {
            -ms-transform: rotateX(-90deg);
            -moz-transform: rotateX(-90deg);
            -o-transform: rotateX(-90deg);
            -webkit-transform: rotateX(-90deg);
            transform: rotateX(-90deg);
        }
        #ts_poll_modal_result_section_%1$s[data-tsp-effect="FBL"] {
            opacity: 0;
            -ms-transform: rotate(-180deg);
            -moz-transform: rotate(-180deg);
            -o-transform: rotate(-180deg);
            -webkit-transform: rotate(-180deg);
            transform: rotate(-180deg);
        }
        #ts_poll_modal_result_section_%1$s[data-tsp-effect="FBR"] {
            -ms-transform: skewX(90deg);
            -moz-transform: skewX(90deg);
            -o-transform: skewX(90deg);
            -webkit-transform: skewX(90deg);
            transform: skewX(90deg);
        }
        #ts_poll_modal_result_section_%1$s[data-tsp-effect="FBTT"] {
            -ms-transform: skewY(90deg);
            -moz-transform: skewY(90deg);
            -o-transform: skewY(90deg);
            -webkit-transform: skewY(90deg);
            transform: skewY(90deg);
        }
        #ts_poll_modal_result_section_%1$s[data-tsp-effect="FTTB"],#ts_poll_modal_result_section_%1$s[data-tsp-effect="FLTR"],#ts_poll_modal_result_section_%1$s[data-tsp-effect="FRTL"],
        #ts_poll_modal_result_section_%1$s[data-tsp-effect="FTL"],#ts_poll_modal_result_section_%1$s[data-tsp-effect="FTR"],
        #ts_poll_modal_result_section_%1$s[data-tsp-effect="FBL"],#ts_poll_modal_result_section_%1$s[data-tsp-effect="FBR"],#ts_poll_modal_result_section_%1$s[data-tsp-effect="FBTT"]{
            width: 100%%;
            max-width: 750px;
            height: inherit;
            overflow: hidden;
            border: var(--tsp_r_section_bw_%1$s) solid var(--tsp_r_section_bc_%1$s);
            border-radius: var(--tsp_section_br_%1$s);
            -webkit-transition: all 0.5s ease-in-out 0.5s;
            -moz-transition: all 0.5s ease-in-out 0.5s;
            -o-transition: all 0.5s ease-in-out 0.5s;
            -ms-transition: all 0.5s ease-in-out 0.5s;
            transition: all 0.5s ease-in-out 0.5s;
            -webkit-transition-delay: 0s;
            -moz-transition-delay: 0s;
            -o-transition-delay: 0s;
            -ms-transition-delay: 0s;
            transition-delay: 0s;
        } 
        ',
        esc_attr( $total_soft_poll ),
        array_key_exists("ts_poll_ch_s",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_ch_s"] ), FILTER_VALIDATE_INT ) . "px" : "",
        array_key_exists("ts_poll_vb_mbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_mbgc"] ) ) : "",
        array_key_exists("ts_poll_rb_bw",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_rb_bw"] ), FILTER_VALIDATE_INT ) . "px" : "",
        array_key_exists("ts_poll_rb_bc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_bc"] ) ) : "",
        array_key_exists("ts_poll_rb_br",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_rb_br"] ), FILTER_VALIDATE_INT ) . "px" : "",
        array_key_exists("ts_poll_rb_bgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_bgc"] ) ) : "",
        array_key_exists("ts_poll_rb_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_c"] ) ) : "",
        array_key_exists("ts_poll_rb_hbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_hbgc"] ) ) : "",
        array_key_exists("ts_poll_rb_hc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_hc"] ) ) : "",
        array_key_exists("ts_poll_rb_fs",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_rb_fs"] ), FILTER_VALIDATE_INT ) . "px" : "",
        array_key_exists("ts_poll_rb_ff",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_rb_ff"] ) ) : "",
        array_key_exists("ts_poll_rb_is",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_rb_is"] ), FILTER_VALIDATE_INT ) . "px" : "",
        array_key_exists("ts_poll_vb_bw",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_vb_bw"] ), FILTER_VALIDATE_INT ) . "px" : "",
        array_key_exists("ts_poll_vb_br",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_vb_br"] ), FILTER_VALIDATE_INT ) . "px" : "",
        array_key_exists("ts_poll_vb_bc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_bc"] ) ) : "",
        array_key_exists("ts_poll_vb_fs",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_vb_fs"] ), FILTER_VALIDATE_INT ) . "px" : "",
        array_key_exists("ts_poll_vb_ff",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_ff"] ) ) : "",
        array_key_exists("ts_poll_vb_bgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_bgc"] ) ) : "",
        array_key_exists("ts_poll_vb_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_c"] ) ) : "",
        array_key_exists("ts_poll_vb_hbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_hbgc"] ) ) : "",
        array_key_exists("ts_poll_vb_hc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_vb_hc"] ) ) : "",
        array_key_exists("ts_poll_vb_is",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_vb_is"] ), FILTER_VALIDATE_INT ) . "px" : "",
        array_key_exists("ts_poll_p_q_bgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_q_bgc"] ) ) : "",
        array_key_exists("ts_poll_p_q_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_q_c"] ) ) : "",
        array_key_exists("ts_poll_p_laq_w",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_p_laq_w"] ), FILTER_VALIDATE_INT ) . "%" : "",
        array_key_exists("ts_poll_p_laq_h",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_p_laq_h"] ), FILTER_VALIDATE_INT ) . "px" : "",
        array_key_exists("ts_poll_p_laq_s",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_laq_s"] ) ) : "",
        array_key_exists("ts_poll_p_laq_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_laq_c"] ) ) : "",
        array_key_exists("ts_poll_p_bb_mbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bb_mbgc"] ) ) : "",
        array_key_exists("ts_poll_p_bb_bgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bb_bgc"] ) ) : "",
        array_key_exists("ts_poll_p_bb_bc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bb_bc"] ) ) : "",
        array_key_exists("ts_poll_p_bb_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bb_c"] ) ) : "",
        array_key_exists("ts_poll_p_bb_hbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bb_hbgc"] ) ) : "",
        array_key_exists("ts_poll_p_bb_hc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bb_hc"] ) ) : "",
        array_key_exists("ts_poll_p_a_mbgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_a_mbgc"] ) ) : "",
        array_key_exists("ts_poll_p_a_bgc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_a_bgc"] ) ) : "",
        array_key_exists("ts_poll_p_a_vc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_a_vc"] ) ) : "",
        array_key_exists("ts_poll_p_a_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_a_c"] ) ) : "",
        array_key_exists("ts_poll_p_laa_w",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_p_laa_w"] ), FILTER_VALIDATE_INT ) . "%" : "",
        array_key_exists("ts_poll_p_laa_h",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_p_laa_h"] ), FILTER_VALIDATE_INT ) . "px" : "",
        array_key_exists("ts_poll_p_laa_c",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_laa_c"] ) ) : "",
        array_key_exists("ts_poll_p_laa_s",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_laa_s"] ) ) : "",
        array_key_exists("ts_poll_p_bw",$tspoll_question_styles) ? filter_var( esc_html( $tspoll_question_styles["ts_poll_p_bw"] ), FILTER_VALIDATE_INT ) . "px" : "",
        array_key_exists("ts_poll_p_bc",$tspoll_question_styles) ? apply_filters( 'ts_sanitize_string', esc_html( $tspoll_question_styles["ts_poll_p_bc"] ) ) : ""
    );
    $tsp_result_section_inner = '';
    $tsp_main_answers  = sprintf(
        '
        <div class="ts_poll_answer"  v-bind:class="{tsp_sceleton_item: tsp_sceleton}" v-for="row in tsp_answers" v-bind:data-tsp-id="row.id">
            <input 
                type="%2$s" 
                class="ts_poll_answer_input"
                v-bind:id="`%3$s${row.id}`"
                name="ts_poll_all%1$s"
                v-bind:value="row.id"
                style="display:none !important;"
            >
            <label  class="ts_poll_answer_label" v-bind:for="`%3$s${row.id}`">
                <span> {{ row.Answer_Title }} </span>
            </label>
        </div>
        ',
        esc_attr( $total_soft_poll ),
        $tspoll_question_styles["ts_poll_ch_cm"] == 'true' ? 'checkbox' : 'radio',
        'ts_poll_answer_input_' . esc_attr( $total_soft_poll ) . '-'
    );
    $tsp_result_answers = sprintf(
        '
        <div class="ts_poll_answer_result" v-for="row in tsp_answers" v-bind:data-tsp-id="row.id" >
            <label class="ts_poll_answer_result_label">
                <span class="ts_poll_r_answer_title"> {{ row.Answer_Title }} </span>
                <span class="ts_poll_answer_percent_line" v-bind:data-tsp-w="row.tsp_result_percent" style=""></span>
                <span data-tsp-vt="%2$s" class="ts_poll_answer_info_line"  v-if=" tsp_type === `percent` && tsp_show === `true` "> {{row.tsp_result_percent}} %% </span>
                <span data-tsp-vt="%2$s" class="ts_poll_answer_info_line"  v-else-if="tsp_type === `count` && tsp_show === `true` "> {{row.Answer_Votes}} </span>
                <span data-tsp-vt="%2$s" class="ts_poll_answer_info_line"  v-else-if="tsp_type === `both` && tsp_show === `true` "> {{row.Answer_Votes}} ( {{row.tsp_result_percent}} %% ) </span>
                <span data-tsp-vt="%2$s" class="ts_poll_answer_info_line"  v-else > {{ tsp_result_no }} </span>
            </label>
        </div>
        ',
        esc_attr( $total_soft_poll ),
        esc_attr( $tspoll_question_styles["ts_poll_p_a_vt"] )
    );
    for ( $i = 0;$i < $ts_poll_answers_count;$i ++ ) {
        $TS_Poll_Question_Answer_Param = $t_s_poll_answers_values[ $i ]["Answer_Param"];
        $ts_poll_colors_array[ $t_s_poll_answers_values[ $i ]["id"] ] = $TS_Poll_Question_Answer_Param["TotalSoftPoll_Ans_Cl"];
    }
    \ob_start();
	echo sprintf(
		'
        <div class="ts_poll_r_section_%1$s" data-tsp-effect="%2$s"  data-tsp-pos="%3$s" data-tsp-bool="%4$s">
            <header class="ts_poll_r_header_%1$s" data-tsp-pos="%5$s">
                <span class="ts_poll_title_%1$s"> %6$s </span>
                <div class="ts_poll_line_%1$s"></div>
            </header>
            <main class="ts_poll_r_main_%1$s" data-tsp-after="%7$s" data-tsp-bool="%8$s" data-tsp-veff="%9$s">
                %10$s
                <div class="ts_poll_after_line_%1$s"></div>
            </main>
            %11$s
        </div>    
        ',
		esc_attr( $total_soft_poll ),
		esc_attr( $tspoll_question_styles["ts_poll_p_sheff"] ),
		esc_attr( $tspoll_question_styles["ts_poll_pos"] ),
		esc_attr( $tspoll_question_styles["ts_poll_a_ctf"] ),
		esc_attr( $tspoll_question_styles["ts_poll_q_ta"] ),
		esc_html( html_entity_decode( htmlspecialchars_decode( $ts_poll_question_query['Question_Title'] ), ENT_QUOTES ) ),
		$tspoll_question_styles["ts_poll_p_laa_h"] == 0 ? 'none' : '',
		esc_attr( $tspoll_question_styles["ts_poll_a_ctf"] ),
		esc_attr( $tspoll_question_styles["ts_poll_p_a_veff"] ),
		$tsp_result_answers,
		$tspoll_question_styles["ts_poll_rb_show"] == 'true' || $ts_poll_edit == 'true' ?
		sprintf(
			'
            <footer id="ts_poll_r_footer_%1$s" class="ts_poll_r_footer_%1$s" style="%s" data-tsp-pos="%s">
                <button 
                    class="ts_poll_back_button" 
                    v-on:click="hide_results"
                    id="ts_poll_back_button_%1$s" 
                    name="ts_poll_back_button_%1$s" type="button" 
                    data-tsp-text="%4$s"
                >
                    <i class="ts-poll ts_poll_back_icon %5$s" data-tsp="%6$s">
                        <span data-tsp-text="%4$s"></span>
                    </i>
                </button>
            </footer>
            ',
			esc_attr( $total_soft_poll ),
			$tspoll_question_styles["ts_poll_rb_show"] != 'true' ? esc_attr( 'display:none;' ) : '',
			esc_attr( $tspoll_question_styles["ts_poll_p_bb_pos"] ),
			esc_html( html_entity_decode( htmlspecialchars_decode( $tspoll_question_styles["ts_poll_p_bb_text"] ), ENT_QUOTES ) ),
			esc_attr( $tspoll_question_styles["ts_poll_p_bb_it"] ),
			esc_attr( $tspoll_question_styles["ts_poll_p_bb_ia"] )
		)
		: ''
	);
	$tsp_result_section_inner = \ob_get_clean();
	echo sprintf(
		'
        <main class="ts_poll_main_%1$s" data-tsp-bool="%2$s">
            %3$s
            <div class="ts_poll_after_line_%1$s"></div>
        </main>
        %4$s
        %5$s
        ',
		esc_attr( $total_soft_poll ),
		esc_attr( $tspoll_question_styles["ts_poll_a_ctf"] ),
		$tsp_main_answers,
		sprintf(
			'
            <footer id="%1$s" class="%1$s">
                %2$s
                %3$s
            </footer>    
            ',
			'ts_poll_footer_' . esc_attr( $total_soft_poll ),
			$tspoll_question_styles["ts_poll_rb_show"] == 'true' || $ts_poll_edit == 'true' ?
			sprintf(
				'
                <button 
                    class="ts_poll_result_button"
				    v-on:click="show_results"
                    id="ts_poll_result_button_%1$s"
                    style="%2$s"
                    name="ts_poll_result_button" type="button"
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
			) : '',
			sprintf(
				'<button
                    class="ts_poll_vote_button"
                    v-on:click="vote_function"
                    id="ts_poll_vote_button"
                    name="ts_poll_vote_button" type="button"
                    data-tsp-text="%2$s"
                    data-tsp-pos="%3$s"
                >
                    <i class="ts_poll_vote_icon %4$s" data-tsp="%5$s"><span data-tsp-text="%2$s"></span></i>
                </button>
                ',
                esc_attr( $total_soft_poll ),
				esc_html( html_entity_decode( htmlspecialchars_decode( $tspoll_question_styles["ts_poll_vb_text"] ), ENT_QUOTES ) ),
				esc_attr( $tspoll_question_styles["ts_poll_vb_pos"] ),
				esc_attr( $tspoll_question_styles["ts_poll_vb_it"] ),
				esc_attr( $tspoll_question_styles["ts_poll_vb_ia"] )
			)
		),
		$tsp_result_section_inner
	);
?>
