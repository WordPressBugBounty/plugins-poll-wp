<?php
    $tsp_content_js = $tsp_content_js_block = $tsp_show_result_code = $tsp_hide_result_code = "";
    if ( ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standard Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standart Poll') && array_key_exists("ts_poll_p_shpop", $tspoll_question_styles ) ) {
        $tsp_show_result_code .=	sprintf(
            '
            if (jQuery("input#ts_poll_p_shpop").is(":checked")) {
                jQuery(".ts_poll_result_popup_result_%1$s").css("display","");
                switch (jQuery("select#ts_poll_p_sheff").val()) {
                    case "FTTB":
                        jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                        jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                        jQuery("#ts_poll_modal_result_section_%1$s").css({"transform": "translateY(0px)","-ms-transform": "translateY(0px)","-o-transform": "translateY(0px)","-moz-transform": "translateY(0px)","-webkit-transform": "translateY(0px)","opacity": "1","max-height": "440px"});
                        break;
                    case "FLTR":
                        jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                        jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                        jQuery("#ts_poll_modal_result_section_%1$s").css({"transform": "translateX(0px)","-ms-transform": "translateX(0px)","-o-transform": "translateX(0px)","-moz-transform": "translateX(0px)","-webkit-transform": "translateX(0px)"});
                        break;
                    case "FRTL":
                        jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                        jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                        jQuery("#ts_poll_modal_result_section_%1$s").css({"transform": "translateX(0px)","-ms-transform": "translateX(0px)","-o-transform": "translateX(0px)","-moz-transform": "translateX(0px)","-webkit-transform": "translateX(0px)"});
                        break;
                    case "FCTA":
                        jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                        jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                        jQuery("#ts_poll_modal_result_section_%1$s").animate({"maxWidth": "750px","width": "100%%","height": "100%%",}, 500);
                        jQuery("#ts_poll_modal_result_section_%1$s").css("position", "relative");
                        break;
                    case "FTL":
                        jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                        jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                        jQuery("#ts_poll_modal_result_section_%1$s").css({"transform": "rotateY(0deg)","-ms-transform": "rotateY(0deg)","-o-transform": "rotateY(0deg)","-moz-transform": "rotateY(0deg)","-webkit-transform": "rotateY(0deg)"}); 
                        break;
                    case "FTR":
                        jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                        jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                        jQuery("#ts_poll_modal_result_section_%1$s").css({"transform": "rotateX(0deg)","-ms-transform": "rotateX(0deg)","-o-transform": "rotateX(0deg)","-moz-transform": "rotateX(0deg)","-webkit-transform": "rotateX(0deg)"});
                        break; 
                    case "FBL":
                        jQuery("#ts_poll_modal_result_section_%1$s").css({"transform": "rotate(0deg)","-ms-transform": "rotate(0deg)","-o-transform": "rotate(0deg)","-moz-transform": "rotate(0deg)","-webkit-transform": "rotate(0deg)","opacity": "1"});
                        jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                        jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                        break;
                    case "FBR":
                        jQuery("#ts_poll_modal_result_section_%1$s").css({"transform": "skewX(0deg)","-ms-transform": "skewX(0deg)","-o-transform": "skewX(0deg)","-moz-transform": "skewX(0deg)","-webkit-transform": "skewX(0deg)"});
                        jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                        jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                        break;
                    case "FBTT":
                        jQuery("#ts_poll_modal_result_section_%1$s").css({"transform": "skewY(0deg)","-ms-transform": "skewY(0deg)","-o-transform": "skewY(0deg)","-moz-transform": "skewY(0deg)","-webkit-transform": "skewY(0deg)"});
                        jQuery(".ts_poll_result_popup_section_%1$s").animate({"height": "100%%"}, 300);
                        jQuery(".ts_poll_result_popup_result_%1$s").css("width", "100%%");
                        break; 
                }
            }else {
                switch (jQuery("select#ts_poll_p_sheff").val()) {
                    case "FTTB":
                        jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({"transform": "translateY(0px)","-ms-transform": "translateY(0px)","-o-transform": "translateY(0px)","-moz-transform": "translateY(0px)","-webkit-transform": "translateY(0px)","opacity": "1"});
                        break;
                    case "FLTR":
                        jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({"transform": "translateX(0px)","-ms-transform": "translateX(0px)","-o-transform": "translateX(0px)","-moz-transform": "translateX(0px)","-webkit-transform": "translateX(0px)"});
                        break;
                    case "FRTL":
                        jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({"transform": "translateX(0px)","-ms-transform": "translateX(0px)","-o-transform": "translateX(0px)","-moz-transform": "translateX(0px)","-webkit-transform": "translateX(0px)"});
                        break;
                    case "FCTA":
                        if(jQuery(".tsp_position_select  .tsp_active").attr("data-tsp-pos")=="left") {
                            jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                                "width": "100%%",
                                "left": "0%%",
                                "height": "100%%",
                                "top": "0%%",
                            }, 500);
                        } else if(jQuery(".tsp_position_select  .tsp_active").attr("data-tsp-pos")=="right") {
                            jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                                "width": "100%%",
                                "right": "0%%",
                                "height": "100%%",
                                "top": "0%%",
                            }, 500);
                        } else {
                            jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                                "width": "100%%",
                                "left": parseInt(100 - parseInt("100%%")) / 2 + "%%",
                                "height": "100%%",
                                "top": "0%%",
                            }, 500);
                        }
                        break;
                    case "FTL":
                        jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                            "transform": "rotateY(0deg)",
                            "-ms-transform": "rotateY(0deg)",
                            "-o-transform": "rotateY(0deg)",
                            "-moz-transform": "rotateY(0deg)",
                            "-webkit-transform": "rotateY(0deg)"
                        });
                        break;
                    case "FTR":
                        jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                            "transform": "rotateX(0deg)",
                            "-ms-transform": "rotateX(0deg)",
                            "-o-transform": "rotateX(0deg)",
                            "-moz-transform": "rotateX(0deg)",
                            "-webkit-transform": "rotateX(0deg)"
                        });
                        break; 
                    case "FBL":
                        jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                            "transform": "rotate(0deg)",
                            "-ms-transform": "rotate(0deg)",
                            "-o-transform": "rotate(0deg)",
                            "-moz-transform": "rotate(0deg)",
                            "-webkit-transform": "rotate(0deg)",
                            "z-index": "1"
                        });
                        break;
                    case "FBR":
                        jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                            "transform": "skewX(0deg)",
                            "-ms-transform": "skewX(0deg)",
                            "-o-transform": "skewX(0deg)",
                            "-moz-transform": "skewX(0deg)",
                            "-webkit-transform": "skewX(0deg)"
                        });
                        break;
                    case "FBTT":
                        jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                            "transform": "skewY(0deg)",
                            "-ms-transform": "skewY(0deg)",
                            "-o-transform": "skewY(0deg)",
                            "-moz-transform": "skewY(0deg)",
                            "-webkit-transform": "skewY(0deg)"
                        });
                        break; 
                }
                setTimeout(() => {
                    jQuery(".ts_poll_header_%1$s,.ts_poll_main_%1$s,.ts_poll_footer_%1$s").css({
                        "opacity": "0"
                    });
                }, 500);
                jQuery(".ts_poll_r_main_%1$s >  .ts_poll_answer_result > .ts_poll_answer_result_label > span.ts_poll_answer_percent_line").each(function () {
                    jQuery(this).animate({"width": `${jQuery(this).attr("data-tsp-w")}%%`}, 1500);
                });
            }
            ',
            esc_js( $total_soft_poll )
        );
        $tsp_hide_result_code .= sprintf(
            '
            if(!jQuery("input#ts_poll_p_shpop").is(":checked")) {
                if(jQuery("select#ts_poll_p_sheff").val()=="FTTB") {
                    jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                        "transform": "translateY(-12000px)",
                        "-ms-transform": "translateY(-12000px)",
                        "-o-transform": "translateY(-12000px)",
                        "-moz-transform": "translateY(-12000px)",
                        "-webkit-transform": "translateY(-12000px)",
                        "opacity": "0"
                    });
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FLTR") {
                    jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                        "transform": "translateX(-12000px)",
                        "-ms-transform": "translateX(-12000px)",
                        "-o-transform": "translateX(-12000px)",
                        "-moz-transform": "translateX(-12000px)",
                        "-webkit-transform": "translateX(-12000px)"
                    });
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FRTL") {
                    jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                        "transform": "translateX(12000px)",
                        "-ms-transform": "translateX(12000px)",
                        "-o-transform": "translateX(12000px)",
                        "-moz-transform": "translateX(12000px)",
                        "-webkit-transform": "translateX(12000px)"
                    });
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FCTA") {
                    if(jQuery(".tsp_position_select  .tsp_active").attr("data-tsp-pos")=="left") {
                        jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                            width: "0",
                            height: "0",
                            left: "0%%",
                            top: "50%%"
                        }, 100);
                    }else if(jQuery(".tsp_position_select  .tsp_active").attr("data-tsp-pos")=="right") {
                        jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                            width: "0",
                            height: "0",
                            right: parseInt(50 - parseInt(100 - parseInt(TotalSoft_Poll_1_MW)) / 2) + "%%",
                            top: "50%%"
                        }, 100);
                    } else {
                        jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").animate({
                            width: "0", height: "0", left: "50%%", top: "50%%"
                        }, 100);
                    }
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FTL") {
                    jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                        "transform": "rotateY(-90deg)",
                        "-ms-transform": "rotateY(-90deg)",
                        "-o-transform": "rotateY(-90deg)",
                        "-moz-transform": "rotateY(-90deg)",
                        "-webkit-transform": "rotateY(-90deg)"
                    });
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FTR") {
                    jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                        "transform": "rotateX(-90deg)",
                        "-ms-transform": "rotateX(-90deg)",
                        "-o-transform": "rotateX(-90deg)",
                        "-moz-transform": "rotateX(-90deg)",
                        "-webkit-transform": "rotateX(-90deg)"
                    });
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FBL") {
                    jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                        "transform": "rotate(-180deg)",
                        "-ms-transform": "rotate(-180deg)",
                        "-o-transform": "rotate(-180deg)",
                        "-moz-transform": "rotate(-180deg)",
                        "-webkit-transform": "rotate(-180deg)",
                        "z-index": "-1"
                    });
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FBR") {
                    jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                        "transform": "skewX(90deg)",
                        "-ms-transform": "skewX(90deg)",
                        "-o-transform": "skewX(90deg)",
                        "-moz-transform": "skewX(90deg)",
                        "-webkit-transform": "skewX(90deg)"
                    });
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FBTT") {
                    jQuery("div#ts_poll_section_%1$s .ts_poll_r_section_%1$s").css({
                        "transform": "skewY(90deg)",
                        "-ms-transform": "skewY(90deg)",
                        "-o-transform": "skewY(90deg)",
                        "-moz-transform": "skewY(90deg)",
                        "-webkit-transform": "skewY(90deg)"
                    });
                }
                jQuery(".ts_poll_header_%1$s,.ts_poll_main_%1$s,.ts_poll_footer_%1$s").css({ "opacity": "1" });
            }else {
                if(jQuery("select#ts_poll_p_sheff").val()=="FTTB") {
                    jQuery("#ts_poll_modal_result_section_%1$s").css({
                        "transform": "translateY(-12000px)",
                        "-ms-transform": "translateY(-12000px)",
                        "-o-transform": "translateY(-12000px)",
                        "-moz-transform": "translateY(-12000px)",
                        "-webkit-transform": "translateY(-12000px)",
                        "opacity": "1"
                    });
                    jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
                    setTimeout(function() {
                        jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
                    }, 200)
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FLTR") {
                    jQuery("#ts_poll_modal_result_section_%1$s").css({
                        "transform": "translateX(-12000px)",
                        "-ms-transform": "translateX(-12000px)",
                        "-o-transform": "translateX(-12000px)",
                        "-moz-transform": "translateX(-12000px)",
                        "-webkit-transform": "translateX(-12000px)"
                    });
                    jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
                    setTimeout(function() {
                        jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
                    }, 200)
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FRTL") {
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
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FCTA") {
                    jQuery("#ts_poll_modal_result_section_%1$s").css({
                        width: "0%%", height: "0%%"
                    });
                    jQuery(".ts_poll_result_popup_section_%1$s").animate({height: "0%%"}, 300);
                    setTimeout(function() {
                        jQuery("#ts_poll_modal_result_section_%1$s").css("position", "absolute");
                        jQuery(".ts_poll_result_popup_result_%1$s").css("width", "0%%");
                    }, 200)
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FTL") {
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
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FTR") {
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
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FBL") {
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
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FBR") {
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
                }else if(jQuery("select#ts_poll_p_sheff").val()=="FBTT") {
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
                }
            }
            ',
            esc_js( $total_soft_poll )
        );
    } elseif ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Poll' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Poll' ) {
        $tsp_show_result_code .= sprintf(
            '
            var ts_poll_eff = $(`main.ts_poll_main_%1$s`).attr("data-tsp-effect");
            $(`footer.ts_poll_footer_%1$s div.ts_poll_footer_res`).css({"z-index": "1"}).animate({"opacity": "1"}, 400);
            if(ts_poll_eff=="0") {
                $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).attr("style", "display:flex;");
            }else if(ts_poll_eff=="1") {
                $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).attr("style",
                    "transform :  rotateY(-90deg);-ms-transform: rotateY(-90deg);-o-transform: rotateY(-90deg);-moz-transform: rotateY(-90deg);-webkit-transform: rotateY(-90deg);"
                );
                setTimeout(function() {
                    $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).attr("style",
                        "transform: rotateY(2deg);-ms-transform: rotateY(2deg);-o-transform: rotateY(2deg);-moz-transform: rotateY(2deg);-webkit-transform: rotateY(2deg);"
                    );
                    $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).attr("style",
                        "transform: rotateY(2deg);-ms-transform: rotateY(2deg);-o-transform: rotateY(2deg);-moz-transform: rotateY(2deg);-webkit-transform: rotateY(2deg);"
                    );
                }, 500);
            }else if(ts_poll_eff=="2") {
                $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).attr("style",
                    "transform: rotateX(-90deg);-ms-transform: rotateX(-90deg);-o-transform: rotateX(-90deg);-moz-transform: rotateX(-90deg);-webkit-transform: rotateX(-90deg);"
                );
                setTimeout(function() {
                    $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).attr("style",
                        "transform: rotateX(0deg);-ms-transform: rotateX(0deg);-o-transform: rotateX(0deg);-moz-transform: rotateX(0deg);-webkit-transform: rotateX(2deg);"
                    );
                    $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).attr("style",
                        "transform: rotateX(0deg);-ms-transform: rotateX(0deg);-o-transform: rotateX(0deg);-moz-transform: rotateX(0deg);-webkit-transform: rotateX(2deg);"
                    );
                }, 500);
            }
            ',
            esc_attr( $total_soft_poll )
        );
        $tsp_hide_result_code .= sprintf(
            '
            var ts_poll_eff = $(`main.ts_poll_main_%1$s`).attr("data-tsp-effect");
            $(`footer.ts_poll_footer_%1$s div.ts_poll_footer_res`).animate({ "opacity": "0" }, 500);
            setTimeout(function() {
                $(`footer.ts_poll_footer_%1$s div.ts_poll_footer_res`).css({ "z-index":"-1" });
            }, 500);
            if (ts_poll_eff == "0") {
                $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).attr("style", "display:none;");
            } else if (ts_poll_eff == "1") {
                $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).attr("style",
                    "transform: rotateY(-90deg);-ms-transform: rotateY(-90deg);-o-transform: rotateY(-90deg);-moz-transform: rotateY(-90deg);-webkit-transform: rotateY(-90deg);"
                );
                $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).attr("style",
                    "transform: rotateY(-90deg);-ms-transform: rotateY(-90deg);-o-transform: rotateY(-90deg);-moz-transform: rotateY(-90deg);-webkit-transform: rotateY(-90deg);"
                );
                setTimeout(function() {
                    $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).attr("style",
                        "transform: rotateY(2deg);-ms-transform: rotateY(2deg);-o-transform: rotateY(2deg);-moz-transform: rotateY(2deg);-webkit-transform: rotateY(2deg);"
                    );
                }, 500)
            } else if (ts_poll_eff == "2") {
                $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).attr("style",
                    "transform: rotateX(-90deg);-ms-transform: rotateX(-90deg);-o-transform: rotateX(-90deg);-moz-transform: rotateX(-90deg);-webkit-transform: rotateX(-90deg);"
                );
                $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).attr("style",
                    "transform: rotateX(-90deg);-ms-transform: rotateX(-90deg);-o-transform: rotateX(-90deg);-moz-transform: rotateX(-90deg);-webkit-transform: rotateX(-90deg);"
                );
                setTimeout(function() {
                    $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).attr("style",
                        "transform: rotateX(0deg);-ms-transform: rotateX(0deg);-o-transform: rotateX(0deg);-moz-transform: rotateX(0deg);-webkit-transform: rotateX(2deg);"
                    );
                }, 500);
            }
            ',
            esc_attr( $total_soft_poll )
        );
    } elseif ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standart Without Button' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standard Without Button'
        || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image Without Button' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video Without Button'
        || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Image in Question' || $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Video in Question' || ( $ts_poll_question_params["TS_Poll_Q_Theme"] == 'Standard Poll' && ! array_key_exists("ts_poll_p_shpop", $tspoll_question_styles ) ) 
    ) {
        $tsp_show_result_code .= sprintf(
            '
            $("footer.ts_poll_footer_%1$s div.ts_poll_footer_res").css("z-index", "1").animate({ "opacity": "1" }, 500);
            $("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block").css("z-index", "1").animate({ "opacity": "1" }, 500);
            setTimeout(() => {
                $("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block span.ts_poll_r_progress").each(function () {
                    $(this).animate({ "width": `${$(this).attr("data-tsp-length")}%%` }, 1500);
                });
            }, 500);
            ',
            esc_js( $total_soft_poll )
        );
        $tsp_hide_result_code .= sprintf(
            '
            $("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block span.ts_poll_r_progress").each(function () {
                $(this).animate({ "width": 0 }, 500);
            });
            $("footer.ts_poll_footer_%1$s div.ts_poll_footer_res").animate({ "opacity": "0" }, 500);
            $("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block").animate({ "opacity": "0" }, 500);
            setTimeout(() => {
                $("footer.ts_poll_footer_%1$s div.ts_poll_footer_res").css("z-index", "-1");
                $("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block").css("z-index", "-1");
            }, 500);
            ',
            esc_js( $total_soft_poll )
        );
    }
    $tsp_content_js .= sprintf(
        '
        (function($) {
            "use strict";
            window["mixin"] = {
                data:{
                    tsp_type : "%6$s",
                    tsp_show : "%7$s",
                    tsp_result_no : "%8$s",
                },
                %9$s
                methods:{
                    show_results:function(){
                        %4$s
                    },
                    hide_results : function(){
                        %5$s
                    },
                    vote_function : function(event){
                        toastr["info"]("In edit mode vote function is not working.", "Info", { "closeButton": true, "newestOnTop": false, "progressBar": true, "positionClass": "toast-top-right", "preventDuplicates": true, "showDuration": "300", "hideDuration": "1000", "timeOut": "5000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut", });
                    },
                }
            };
            %3$s
        })(jQuery);
        ',
        esc_attr( $total_soft_poll),
        esc_attr( $ts_poll_base_id),
        $tsp_content_js_block,
        $tsp_show_result_code,
        $tsp_hide_result_code,
        array_key_exists("ts_poll_v_t",$tspoll_question_styles) ? $tspoll_question_styles["ts_poll_v_t"] : $tspoll_question_styles["ts_poll_p_a_vt"],
        array_key_exists("TotalSoft_Poll_Set_01",$t_s_poll_question_settings) ? $t_s_poll_question_settings["TotalSoft_Poll_Set_01"] : "",
        array_key_exists("TotalSoft_Poll_Set_05",$t_s_poll_question_settings) ? $t_s_poll_question_settings["TotalSoft_Poll_Set_05"] : "Thank you!",
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
    wp_add_inline_script( 'tspoll_builder', $tsp_content_js, 'before' );
