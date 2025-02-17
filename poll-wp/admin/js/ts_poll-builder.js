(function ($) {
    'use strict';
    let tspEditItemId = "",
        tspToastrOptions = { "closeButton": true, "newestOnTop": false, "progressBar": true, "positionClass": "toast-top-right", "preventDuplicates": true, "showDuration": "300", "hideDuration": "1000", "timeOut": "5000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut", };
    $(function () {
        if (typeof tspoll_builder_json !== 'undefined') {
            var tsp_question_id = tspoll_builder_json.tsp_proporties.id,
                tsp_question_params = tspoll_builder_json.tsp_proporties.Question_Param,
                tsp_theme_name = tsp_question_params.TS_Poll_Q_Theme;
            if (tsp_theme_name == "Image Poll" || tsp_theme_name == "Video Poll" || tsp_theme_name == "Image in Question" || tsp_theme_name == "Image Without Button" || tsp_theme_name == "Video Without Button") {
                Vue.component('tsp-image-picker', {
                    template: `
                    <div class="tsp_img_change" v-on:click.prevent.stop="tspOpenMediaLibrary">
                        <img :src="imgSrc">
                        <div class="tsp_img_hover_div">
                          <span>${tspoll_builder_json.tsp_choose_img}</span>
                          <input type="text" :value="imgId" id="tsp_answer_attachment_id" style="display:none;">
                        </div>
                        <div class="tsp_img_loading_div tsp_flex_col"  style="display:none;">
                          <img :src="imgLoad" >
                        </div>
                    </div>
                    `,
                    props: ["imgSrc", "imgId", "imgLoad"],
                    methods: {
                        tspOpenMediaLibrary: function () {
                            var tspSelfParent = this.$parent;
                            var tsp_wp_media_library;
                            if (tsp_wp_media_library) { tsp_wp_media_library.open(); }
                            tsp_wp_media_library = wp.media({
                                frame: 'post',
                                type: 'image',
                                multiple: false,
                                states: [new wp.media.controller.Library({
                                    title: 'Select image',
                                    library: wp.media.query({
                                        type: 'image'
                                    }),
                                    multiple: false,
                                    date: false,
                                    gallery: false,
                                })]
                            });
                            tsp_wp_media_library.state('embed').on('select', function () {
                                var state = tsp_wp_media_library.state('embed'),
                                    type = state.get('type'),
                                    embed = state.props.toJSON();
                                if (type == "image") {
                                    tspSelfParent.tspSetImage("embed", "", embed.url, embed.width, embed.height);
                                } else {
                                    tspSelfParent.tspSetImage("embed", "", tspoll_builder_json.tsp_no_img, "600", "600");
                                    toastr["error"](tspoll_builder_json.image_warning, tspoll_builder_json.error, tspToastrOptions);
                                }
                            });
                            tsp_wp_media_library.state('library').on('select', function () {
                                var selection = tsp_wp_media_library.state('library').get('selection'),
                                    tsp_selection_id = "";
                                selection.each(function (attachment) {
                                    tsp_selection_id = attachment["id"];
                                });
                                if (Number.isInteger(tsp_selection_id)) {
                                    var url = wp.media.attachment(tsp_selection_id).get('url');
                                    var width = wp.media.attachment(tsp_selection_id).get('width');
                                    var height = wp.media.attachment(tsp_selection_id).get('height');
                                    tspSelfParent.tspSetImage("library", tsp_selection_id, url, width, height);
                                }
                            });
                            tsp_wp_media_library.on('open', function () {
                                $("button#menu-item-video-playlist,button#menu-item-playlist,button#menu-item-gallery,button#menu-item-insert").remove();
                                var tsp_selected_attachment = $('input#tsp_answer_attachment_id').val();
                                if (Number.isInteger(+tsp_selected_attachment)) {
                                    $("button#menu-item-library").trigger("click");
                                    var selection = tsp_wp_media_library.state('library').get('selection');
                                    var attachment = wp.media.attachment(+tsp_selected_attachment);
                                    attachment.fetch();
                                    selection.add(attachment ? [attachment] : []);
                                } else {
                                    $("button#menu-item-embed").trigger("click");
                                    $("input#embed-url-field").val(tsp_selected_attachment).trigger("input");
                                }
                            });
                            tsp_wp_media_library.open();
                        },
                        tspImagePickerSet: function (tspVal) {
                            var tspSelfParent = this.$parent;
                            $.ajax({
                                url: tspoll_builder_json.ajaxurl,
                                data: {
                                    action: 'tsp_get_attachment_id',
                                    tsp_nonce: tspoll_builder_json.tsp_nonce,
                                    attachment_url: tspVal
                                },
                                beforeSend: function () {
                                    $("div.tsp_img_loading_div").removeAttr("style");
                                },
                                type: 'POST',
                            }).done(function (response) {
                                if (response.success === true) {
                                    if (response.data.hasOwnProperty('id')) {
                                        tspSelfParent.tspSetImage("library", response.data.id, response.data.image, response.data.width, response.data.height);
                                    } else {
                                        tspSelfParent.tspSetImage("embed", "", response.data.image, response.data.width, response.data.height);
                                    }
                                }
                            }).fail(function () {
                                tspSelfParent.tspSetImage("embed", "", tspoll_builder_json.tsp_no_img, "600", "600");
                            });
                        }
                    },
                });
            }
            if (tsp_theme_name == "Video Poll" || tsp_theme_name == "Video Without Button" || tsp_theme_name == "Video in Question") {
                Vue.component('tsp-video-picker', {
                    template: `
                    <div class="tsp_vd_change"  v-on:click.prevent.stop="tspOpenMediaLibraryVideo">
                      <img src="${tspoll_builder_json.tsp_no_video}" v-if="tspShowNoVideo" >
                      <div class="tsp_vd_hover_div">
                        <span>Choose video</span>
                        <input type="text" :value="videoSrc"  id="tsp_answer_video_attachment_id" style="display:none;">
                      </div>
                      <div class="tsp_vd_loading_div tsp_flex_col"  style="display:none;">
                        <img :src="videoLoad" >
                      </div>
                    </div>
                    `,
                    props: ["videoSrc", "videoLoad"],
                    methods: {
                        tspOpenMediaLibraryVideo: function () {
                            var tspSelfParent = this.$parent;
                            var tspSelf = this;
                            var tsp_wp_media_library;
                            if (tsp_wp_media_library) { tsp_wp_media_library.open(); }
                            tsp_wp_media_library = wp.media({
                                frame: 'post',
                                type: 'video',
                                multiple: false,
                                states: [new wp.media.controller.Library({
                                    title: 'Select video',
                                    library: wp.media.query({
                                        type: 'video'
                                    }),
                                    multiple: false,
                                    date: false,
                                    gallery: false,
                                })]
                            });
                            tsp_wp_media_library.state('embed').on('select', function () {
                                var state = tsp_wp_media_library.state('embed'),
                                    type = state.get('type'),
                                    embed = state.props.toJSON(),
                                    url = embed.url;
                                var regexp = /https?:\/\/www\.youtube\.com\/embed\/([^/]+)/;
                                var youTubeEmbedMatch = regexp.exec(url);
                                if (youTubeEmbedMatch) {
                                    url = 'https://www.youtube.com/watch?v=' + youTubeEmbedMatch[1];
                                }
                                wp.apiRequest({
                                    url: wp.media.view.settings.oEmbedProxyUrl,
                                    data: {
                                        url: url,
                                    },
                                    beforeSend: function () {
                                        $(".tsp_vd_loading_div").removeAttr("style");
                                    },
                                    type: 'GET',
                                    dataType: 'json',
                                    context: this
                                }).done(function (response) {
                                    if (response.hasOwnProperty("thumbnail_url")) {
                                        if (tsp_theme_name != "Video in Question") {
                                            tspSelfParent.tspSetImage("embed", "", response.thumbnail_url, response.thumbnail_width, response.thumbnail_height);
                                            toastr["info"](tspoll_builder_json.thumbnail_info, tspoll_builder_json.info, tspToastrOptions);
                                        }
                                    } else {
                                        if (response.provider_name == "Embed Handler") {
                                            response.html = `<video controls="" name="media"><source src="${url}" ></video>`;
                                        }
                                        if (tsp_theme_name != "Video in Question") {
                                            toastr["warning"](tspoll_builder_json.thumbnail_warning, tspoll_builder_json.warning, tspToastrOptions);
                                        }
                                    }
                                    $('.tsp_vd_change').children("iframe").remove();
                                    $('.tsp_vd_change').children("video").remove();
                                    $('.tsp_vd_change').children("blockquote").remove();
                                    $('.tsp_img_div_edit').removeAttr("style");
                                    $('input#tsp_answer_video_attachment_id').val(url);
                                    tspSelf.tspShowNoVideo = false;
                                    $('.tsp_vd_change').prepend(response.html);
                                    if (tsp_theme_name == "Video in Question") {
                                        tspSelfParent.tsp_question_params.TotalSoftPoll_Q_Vd = url;
                                        $(`header.ts_poll_header_${tsp_question_id}  div.ts_poll_iframe_div_${tsp_question_id}`).html(`${response.html}`);
                                    } else {
                                        var tspAnswerKeyVal = tspSelfParent.tspGetObjKey(tspSelfParent.tsp_answers, tspSelfParent.tspEditItemId);
                                        tspSelfParent.tsp_answers[tspAnswerKeyVal]["Answer_Param"]["TotalSoftPoll_Ans_Vd"] = url;
                                        tspSelfParent.tsp_answers[tspAnswerKeyVal]["embed"] = `${response.html}`;
                                    }
                                    $(".tsp_vd_loading_div").attr("style", "display:none;");
                                }).fail(function () {
                                    $(".tsp_vd_loading_div").attr("style", "display:none;");
                                    toastr["error"](tspoll_builder_json.link_warning, tspoll_builder_json.error, tspToastrOptions)
                                });
                            });
                            tsp_wp_media_library.state('library').on('select', function () {
                                $(".tsp_vd_loading_div").removeAttr("style");
                                var selection = tsp_wp_media_library.state('library').get('selection'),
                                    tsp_selection_id = "";
                                selection.each(function (attachment) {
                                    tsp_selection_id = attachment["id"];
                                });
                                if (Number.isInteger(tsp_selection_id)) {
                                    if (tsp_theme_name != "Video in Question") {
                                        toastr["warning"](tspoll_builder_json.thumbnail_warning, tspoll_builder_json.warning, tspToastrOptions);
                                    }
                                    $('.tsp_vd_change').children("iframe").remove();
                                    $('.tsp_vd_change').children("video").remove();
                                    $('.tsp_vd_change').children("blockquote").remove();
                                    $('.tsp_img_div_edit').removeAttr("style");
                                    var url = wp.media.attachment(tsp_selection_id).get('url');
                                    if (tsp_theme_name == "Video in Question") {
                                        tspSelfParent.tsp_question_params.TotalSoftPoll_Q_Vd = url;
                                        $(`header.ts_poll_header_${tsp_question_id}  div.ts_poll_iframe_div_${tsp_question_id}`).html(`<video controls="" name="media"><source src="${url}"></video>`);
                                    } else {
                                        var tspAnswerKeyVal = tspSelfParent.tspGetObjKey(tspSelfParent.tsp_answers, tspSelfParent.tspEditItemId);
                                        tspSelfParent.tsp_answers[tspAnswerKeyVal]["Answer_Param"]["TotalSoftPoll_Ans_Vd"] = url;
                                        tspSelfParent.tsp_answers[tspAnswerKeyVal]["embed"] = `<video controls="" name="media"><source src="${url}"></video>`;
                                    }
                                    $('input#tsp_answer_video_attachment_id').val(tsp_selection_id);
                                    $('.tsp_vd_change').prepend(`<video controls="" name="media"><source src="${url}"></video>`);
                                    tspSelf.tspShowNoVideo = false;
                                    setTimeout(() => {
                                        $(".tsp_vd_loading_div").attr("style", "display:none;");
                                    }, 500);
                                }
                            });
                            tsp_wp_media_library.on('open', function () {
                                $("button#menu-item-video-playlist,button#menu-item-playlist,button#menu-item-gallery,button#menu-item-insert").remove();
                                var tsp_selected_attachment = $('input#tsp_answer_video_attachment_id').val();
                                if (Number.isInteger(+tsp_selected_attachment)) {
                                    $("button#menu-item-library").trigger("click");
                                    $("input#embed-url-field").val("");
                                    var selection = tsp_wp_media_library.state('library').get('selection');
                                    var attachment = wp.media.attachment(+tsp_selected_attachment);
                                    attachment.fetch();
                                    selection.add(attachment ? [attachment] : []);
                                } else {
                                    $("button#menu-item-embed").trigger("click");
                                    $("input#embed-url-field").val(tsp_selected_attachment).trigger("input");
                                }
                            });
                            tsp_wp_media_library.open();
                        },
                        tspShowVideoInner: function (tspVideoSrc) {
                            var tspSelf = this;
                            var data = {
                                action: 'tsp_check_attachment',
                                tsp_nonce: tspoll_builder_json.tsp_nonce,
                                attachment_url: `${tspVideoSrc}`
                            };
                            $.post(tspoll_builder_json.ajaxurl, data, function (response) {
                                if (response.success === true) {
                                    $('input#tsp_answer_video_attachment_id').val(response.data);
                                    $('.tsp_vd_change').prepend(`<video controls="" name="media"><source src="${tspVideoSrc}"></video>`);
                                    tspSelf.tspShowNoVideo = false;
                                } else {
                                    wp.apiRequest({
                                        url: wp.media.view.settings.oEmbedProxyUrl,
                                        data: {
                                            url: `${tspVideoSrc}`,
                                        },
                                        type: 'GET',
                                        dataType: 'json',
                                        context: this
                                    }).done(function (responseApi) {
                                        if (responseApi.provider_name == "Embed Handler") {
                                            responseApi.html = `<video controls="" name="media"><source src="${tspVideoSrc}" ></video>`;
                                        }
                                        $('.tsp_vd_change').prepend(responseApi.html);
                                        tspSelf.tspShowNoVideo = false;
                                    }).fail(function (responseApi) {
                                        console.error(responseApi);
                                    });
                                }
                            });
                        },
                        tspNoVideoShowChange: function () {
                            this.tspShowNoVideo = true;
                        }
                    },
                    data() {
                        return {
                            tspShowNoVideo: true,
                        }
                    },
                    created: function () {
                        if (tsp_theme_name == "Video in Question") {
                            if (this.videoSrc == "") {
                                this.tspShowNoVideo = true;
                            } else {
                                this.tspShowNoVideo = false;
                                this.tspShowVideoInner(this.videoSrc);
                            }
                        }
                    },
                });
            }
            Vue.component('tsp-spectrum-picker', {
                template: '<input :id="colorId"  />',
                props: ["colorId", "colorValue", "changeVariable"],
                mounted: function () {
                    var self = this;
                    var colorId = this.colorId;
                    var colorValue = this.colorValue;
                    var changeVariable = this.changeVariable;
                    $(this.$el).spectrum({
                        type: "color",
                        color: colorValue,
                        showPalette: false,
                        togglePaletteOnly: true,
                        hideAfterPaletteSelect: true,
                        showInput: true,
                        showInitial: true,
                        showButtons: false,
                        move: function (color) {
                            self.$emit('update-color', color.toRgbString(), colorId, changeVariable);
                        },
                    });
                },
                methods: {
                    tspSpectrumSetValue: function (value) {
                        $(this.$el).spectrum("set", value);
                    },
                },
            });
            new Vue({
                el: "#tsp_builder_section",
                mixins: [window["mixin"]],
                data: {
                    dataTspEditSpecialColor: "#fff",
                    isOpen: true,
                    openClass: 'open',
                    closeClass: 'close',
                    tsp_icons: Object.values(tspoll_builder_json.fonts.tsp_fonts.tsp_fontawesome),
                    tsp_emojies: Object.values(tspoll_builder_json.fonts.tsp_fonts.tsp_emojies),
                    tsp_all_fonts: Object.assign(tspoll_builder_json.fonts.tsp_fonts.tsp_fontawesome, tspoll_builder_json.fonts.tsp_fonts.tsp_emojies),
                    tspEditItemId: '',
                    tspCreation: tspoll_builder_json.tsp_creation != "save" ? true : false,
                    tspGlobalShortcode: tspoll_builder_json.tsp_creation != "save" ? `[TS_Poll id="${tsp_question_id}"]` : "",
                    tspGlobalThemeShortcode: tspoll_builder_json.tsp_creation != "save" ? `<?php echo do_shortcode('[TS_Poll id="${tsp_question_id}"]');?>` : "",
                    tsp_styles: tspoll_builder_json.tsp_proporties.Question_Style,
                    tsp_theme_settings: tspoll_builder_json.tsp_proporties.Question_Settings,
                    tsp_delete_ids: [],
                    tsp_answer_sort: tspoll_builder_json.tsp_proporties.Answers_Sort.split(","),
                    tsp_theme_name: tspoll_builder_json.tsp_proporties.Question_Param.TS_Poll_Q_Theme,
                    tspDataChange: '',
                    tsp_question_params: tspoll_builder_json.tsp_proporties.Question_Param,
                    tsp_answers: "",
                    tsp_total: 1,
                    tsp_sceleton: false,
                    ts_poll_mode: "",
                },
                methods: {
                    tsprChangeShortcode: function (tsprId) {
                        if (!tsprId.classList.contains("tsp-tab--active")) {
                            document.querySelector("div.tsp-tab--active").classList.remove("tsp-tab--active");
                            document.querySelector(".tsp-tab-inner.tsp-tab-inner-active").classList.remove("tsp-tab-inner-active");
                            document.querySelector(`.tsp-tab-inner[data-tspr-id="${tsprId.dataset.tsprId}"]`).classList.add("tsp-tab-inner-active");
                            tsprId.classList.add("tsp-tab--active");
                        }
                    },
                    renderTsPoll: function () {
                        this.tsp_answers = tspoll_builder_json.tsp_proporties.Question_Answers;
                        this.tspDataChange = tsp_question_id;
                        setTimeout(() => {
                            document.getElementById(`ts_poll_section_${tsp_question_id}`).removeAttribute("style");
                        }, 1000);
                    },
                    tspGetObjKey: function (obj, value) {
                        return Object.keys(obj).find(key => obj[key]["id"] === value);
                    },
                    tspGetArrKey: function (obj, value) {
                        return Object.keys(obj).find(key => obj[key] === value);
                    },
                    changeContent: function (tspContentName) {
                        switch (tspContentName) {
                            case "theme":
                                toastr["warning"](tspoll_builder_json.theme_warning, tspoll_builder_json.warning, tspToastrOptions);
                                break;
                            case "info":
                            case "result_shortcode":
                            case "email_popup":
                                document.querySelectorAll('.tsp_sidebar_item.tsp_active').forEach(sidebarElement => {
                                    sidebarElement.classList.remove("tsp_active");
                                });
                                document.querySelector(`.tsp_sidebar_item[data-tsp-item="${tspContentName}"]`).classList.add("tsp_active");
                                document.querySelectorAll('.tsp_content.active').forEach(contentElement => {
                                    contentElement.classList.remove("active");
                                });
                                document.querySelector(`.tsp_content[data-tsp-section="${tspContentName}"]`).classList.add("active");
                                document.querySelectorAll('.tsp_content_subsection.active').forEach(subContentElement => {
                                    subContentElement.classList.remove("active");
                                });
                                break;
                            case "field":
                            case "style":
                            case "setting":
                            case "shortcode":
                                document.querySelectorAll('.tsp_sidebar_item.tsp_active').forEach(sidebarElement => {
                                    sidebarElement.classList.remove("tsp_active");
                                });
                                document.querySelector(`.tsp_sidebar_item[data-tsp-item="${tspContentName}"]`).classList.add("tsp_active");
                                document.querySelectorAll('.tsp_content.active').forEach(contentElement => {
                                    contentElement.classList.remove("active");
                                });
                                document.querySelector('.tsp_content[data-tsp-section="field_style"]').classList.add("active");
                                document.querySelectorAll('.tsp_content_subsection.active').forEach(subContentElement => {
                                    subContentElement.classList.remove("active");
                                });
                                document.querySelector(`.tsp_content_subsection[data-tsp-subsection="${tspContentName}"]`).classList.add("active");
                                break;
                            case "votes_count":
                                if (tspoll_builder_json.tsp_creation != "save") {
                                    document.querySelectorAll('.tsp_sidebar_item.tsp_active').forEach(sidebarElement => {
                                        sidebarElement.classList.remove("tsp_active");
                                    });
                                    document.querySelector(`.tsp_sidebar_item[data-tsp-item="${tspContentName}"]`).classList.add("tsp_active");
                                    document.querySelectorAll('.tsp_content.active').forEach(contentElement => {
                                        contentElement.classList.remove("active");
                                    });
                                    document.querySelector('.tsp_content[data-tsp-section="votes_count"]').classList.add("active");
                                    document.querySelectorAll('.tsp_content_subsection.active').forEach(subContentElement => {
                                        subContentElement.classList.remove("active");
                                    });
                                } else {
                                    toastr["warning"](tspoll_builder_json.results_warning, tspoll_builder_json.warning, tspToastrOptions);
                                }
                                break;
                            default:
                                document.querySelector(`.tsp_content[data-tsp-section="${tspContentName}"]`).classList.add("active");
                                break;
                        }
                    },
                    updateColor: function (value, changeInput, changeVariable) {
                        if (changeVariable === "tsp_answer_color") {
                            document.documentElement.style.setProperty(`--tsp_a_c_${tsp_question_id}-${this.tspEditItemId}`, value);
                            var tspAnswerKeyVal = this.tspGetObjKey(this.tsp_answers, this.tspEditItemId);
                            if (this.tsp_answers[tspAnswerKeyVal]["Answer_Param"].hasOwnProperty(`TotalSoftPoll_Ans_Cl`)) {
                                this.$set(this.tsp_answers[tspAnswerKeyVal]["Answer_Param"], "TotalSoftPoll_Ans_Cl", value);
                            }
                        } else {
                            document.documentElement.style.setProperty(changeVariable, value);
                            if (this.tsp_styles.hasOwnProperty(`${changeInput}`)) {
                                this.tsp_styles[changeInput] = value;
                            } else if (this.tsp_theme_settings.hasOwnProperty(`${changeInput}`)) {
                                this.tsp_theme_settings[changeInput] = value;
                            }
                        }
                    },
                    tspGetKeyByValue: function (object, value) {
                        return Object.keys(object).find(key => object[key] === value);
                    },
                    tspSetImage: function (type, id, url, width, height) {
                        if (type == "library") {
                            document.getElementById("tsp_answer_attachment_id").value = id;
                        } else if (type == "embed") {
                            document.getElementById("tsp_answer_attachment_id").value = url;
                        }
                        if (this.tsp_theme_name == "Image Without Button") {
                            this.$set(this.tsp_answers[this.tspGetObjKey(this.tsp_answers, this.tspEditItemId)], "embed", `<div class="tsp_embed_popup_inner_${this.tspEditItemId} tsp_video_popup_embed"><img src="${url}" ></div>`);
                        }
                        document.documentElement.style.setProperty('--tsp_img_aspect_ratio', `${height}/${width}`);
                        $(".tsp_img_change > img").attr("src", url);
                        document.querySelector("div.tsp_img_loading_div").setAttribute("style", "display:none;");
                        if (this.tsp_theme_name == "Image in Question") {
                            document.querySelector(`header.ts_poll_header_${tsp_question_id} > div.ts_poll_img_div_${tsp_question_id} > img`).setAttribute("src", url);
                            this.tsp_question_params.TotalSoftPoll_Q_Im = url;
                            document.querySelector('.tsp_accordion_item_opened').lastChild.style.height = document.querySelector('.tsp_accordion_item_opened').lastChild.firstChild.scrollHeight + "px";
                        } else {
                            this.$set(this.tsp_answers[this.tspGetObjKey(this.tsp_answers, this.tspEditItemId)]["Answer_Param"], "TotalSoftPoll_Ans_Im", url);
                            this.$set(this.tsp_answers[this.tspGetObjKey(this.tsp_answers, this.tspEditItemId)], "img_src", url);
                        }
                    },
                    copyShortcode: function (event) {
                        var tsp_create_input = document.createElement("input");
                        tsp_create_input.setAttribute("value", event.target.dataset.tspShortcode);
                        document.body.appendChild(tsp_create_input);
                        tsp_create_input.select();
                        document.execCommand("copy");
                        document.body.removeChild(tsp_create_input);
                        setTimeout(() => {
                            if (event.target.dataset.tspCopy == "tsp_global_shortcode") {
                                toastr["success"](tspoll_builder_json.shortcode_note, tspoll_builder_json.success, { "closeButton": true, "newestOnTop": false, "progressBar": true, "positionClass": "toast-top-right", "preventDuplicates": true, "showDuration": "300", "hideDuration": "1000", "timeOut": "3000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut", });
                            } else {
                                toastr["success"](tspoll_builder_json.shortcode_theme_note, tspoll_builder_json.success, { "closeButton": true, "newestOnTop": false, "progressBar": true, "positionClass": "toast-top-right", "preventDuplicates": true, "showDuration": "300", "hideDuration": "1000", "timeOut": "3000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut", });
                            }
                        }, 100);
                    },
                    inputFocus: function () {
                        var tspTitleInput = document.getElementById('tsp_global_title');
                        tspTitleInput.setSelectionRange(tspTitleInput.value.length, tspTitleInput.value.length);
                        tspTitleInput.focus();
                    },
                    changeQuestionTitle: function () {
                        this.changeContent("shortcode");
                        this.inputFocus();
                    },
                    titleOnInput: function (event) {
                        tspoll_builder_json.tsp_proporties.Question_Title = event.target.value;
                        document.querySelectorAll(`#tsp_question_title_e,.ts_poll_header_${tsp_question_id} > .ts_poll_title_${tsp_question_id},.ts_poll_r_header_${tsp_question_id} > .ts_poll_title_${tsp_question_id}`).forEach(element => {
                            element.innerText = event.target.value;
                        });
                    },
                    tspRangeInput: function (event) {
                        var tspRangeInputDataset = event.target.dataset;
                        document.querySelector(`.tsp_range_div_title[data-tsp-field="${event.target.getAttribute("id")}"]`).dataset.tspLength = `${event.target.value}${event.target.dataset.tspParam}`
                        var tsp_range_width = (100 * (event.target.value - event.target.getAttribute("min"))) / (event.target.getAttribute("max") - event.target.getAttribute("min"));
                        event.target.style.background = `linear-gradient(90deg, #8871c3 ${tsp_range_width}%, rgba(204, 204, 204, 0.214) ${tsp_range_width + 0.1}%)`;
                        if (this.tsp_styles.hasOwnProperty(`${event.target.getAttribute("id")}`)) {
                            this.tsp_styles[event.target.getAttribute("id")] = event.target.value;
                        } else if (this.tsp_theme_settings.hasOwnProperty(`${event.target.getAttribute("id")}`)) {
                            this.tsp_theme_settings[event.target.getAttribute("id")] = event.target.value;
                        }
                        document.documentElement.style.setProperty(event.target.dataset.tspChange, `${event.target.value + event.target.dataset.tspParam}`);
                    },
                    tspRangeInputLoad: function () {
                        document.querySelectorAll('.tsp_range_input').forEach(tspRangeInp => {
                            tspRangeInp.style.background = tspRangeInp.dataset.tspStyle;
                        });
                    },
                    tspIconPickerLoad: function () {
                        document.querySelectorAll('.ts-poll-select-icon > i.ts-poll-none').forEach(tspIconPickerNone => {
                            tspIconPickerNone.setAttribute("class", "ts-poll ts-poll-ban");
                        });
                    },
                    tspAddNewAnswer: function () {
                        var tsp_new_answer_id = `new-${Math.floor(Math.random() * 900000) + 100000}`;
                        var tsp_new_props = {
                            id: tsp_new_answer_id,
                            Question_id: tsp_question_id,
                            Answer_Param: { TotalSoftPoll_Ans_Im: tspoll_builder_json.tsp_no_img, TotalSoftPoll_Ans_Vd: '', TotalSoftPoll_Ans_Cl: '#23a24d' },
                            Answer_Title: "New Answer",
                            Answer_Votes: "0",
                            img_src: tspoll_builder_json.tsp_no_img,
                            tsp_result_percent: 0,
                            embed: ""
                        };
                        this.tsp_answers.push(tsp_new_props);
                        this.tsp_answer_sort.push(`${tsp_new_answer_id}`);
                        this.tspAddStyleSheet(tsp_new_answer_id, '#23a24d');
                        toastr["success"](tspoll_builder_json.add_note, tspoll_builder_json.success, tspToastrOptions);
                    },
                    tspOpenIconPicker: function (event) {
                        document.getElementById("ts-poll-aim-modal").style.display = "flex";
                        document.querySelectorAll(".ts-poll-aim-icon-item.ts-poll-aim-icon-item-aesthetic-selected").forEach(element => {
                            element.classList.remove("ts-poll-aim-icon-item-aesthetic-selected");
                        });
                        var tsp_select_item = event.target.tagName.toLowerCase() == "li" ? event.target : event.target.parentElement;
                        let tsp_select_item_for = tsp_select_item.getAttribute("id");
                        var tsp_current = tsp_select_item.firstChild.getAttribute("class");
                        document.getElementById("ts-poll-aim-insert-icon-button").dataset.tspField = tsp_select_item_for;
                        if (tsp_current == "ts-poll ts-poll-ban") {
                            this.tspChangeSidebarActive("all");
                            document.getElementById("ts-poll-aim-modal--icon-preview-inner").scrollTo({ top: 0, behavior: 'smooth' });
                        } else {
                            let tsp_icon_preview_div = document.querySelector(`.ts-poll-aim-icon-item-inner >  i[class='${tsp_current}']`).parentElement.parentElement;
                            tsp_icon_preview_div.classList.add("ts-poll-aim-icon-item-aesthetic-selected");
                            let tsp_icons_preview_wrapper = document.getElementById("ts-poll-aim-modal--icon-preview-inner");
                            this.tspChangeSidebarActive(tsp_icon_preview_div.dataset.libraryId);
                            tsp_icon_preview_div.scrollIntoView({ behavior: "smooth", block: 'center' });
                        }
                    },
                    tspCloseIconPicker: function () {
                        document.getElementById('ts-poll-aim-modal').style.display = "none";
                        document.querySelectorAll(".ts-poll-aim-icon-item.ts-poll-aim-icon-item-aesthetic-selected").forEach(element => {
                            element.classList.remove("ts-poll-aim-icon-item-aesthetic-selected");
                        });
                        document.getElementById('ts-poll-aim-modal--search_input').value = "";
                    },
                    tspClickOuterMain: function (event) {
                        if (event.target.getAttribute("id") === "ts-poll-aim-modal") {
                            this.tspCloseIconPicker();
                        }
                    },
                    tspSetIconClass: function (changeItem, changeAttr, changeValue) {
                        if (changeAttr == "class") {
                            var tsp_elem_classlist = document.querySelector(`${changeItem}`).getAttribute("class");
                            var tsp_elem_arr = tsp_elem_classlist.split(" ");
                            var tsp_removed_elems = [];
                            tsp_elem_arr.forEach(element => {
                                if (element.indexOf('ts-poll') > -1) {
                                    tsp_removed_elems.push(element);
                                }
                            });
                            tsp_elem_arr = tsp_elem_arr.filter(function (val) {
                                return tsp_removed_elems.indexOf(val) == -1;
                            });
                            var tsp_add_classes = changeValue.split(" ");
                            var tsp_result_classes = tsp_elem_arr.concat(tsp_add_classes);
                            tsp_result_classes = tsp_result_classes.join(" ");
                            document.querySelector(`${changeItem}`).setAttribute("class", tsp_result_classes);
                        } else {
                            let tspFontAwesomeValue = this.tspGetKeyByValue(this.tsp_all_fonts, changeValue);
                            document.documentElement.style.setProperty(changeItem, `"\\${tspFontAwesomeValue}"`);
                        }
                        this.tspCloseIconPicker();
                    },
                    tspInsertIcon: function (selectBtn) {
                        var tsp_selected_icon = document.querySelector('.ts-poll-aim-icon-item.ts-poll-aim-icon-item-aesthetic-selected');
                        var tsp_select_item_for = selectBtn.dataset.tspField;
                        var tsp_select_item = document.querySelector(`.ts-poll-select-icon#${tsp_select_item_for}`);
                        var tsp_selected_value = "";
                        var tsp_input_icon_value = document.getElementById(`${tsp_select_item_for}-icon_value`);
                        if (typeof (tsp_selected_icon) != 'undefined' && tsp_selected_icon != null) {
                            if (tsp_selected_icon.dataset.libraryId == "ts-poll-regular") {
                                tsp_selected_value = `ts-poll ts-poll-${tsp_selected_icon.dataset.filter}`;
                            } else {
                                tsp_selected_value = `ts-poll-emoji ts-poll-emoji-${tsp_selected_icon.dataset.filter}`;
                            }
                            tsp_input_icon_value.setAttribute("value", tsp_selected_value);
                            this.tspSetIconClass(tsp_input_icon_value.dataset.tspElem, tsp_input_icon_value.dataset.changeProp, tsp_selected_value);
                            tsp_select_item.firstChild.setAttribute("class", tsp_selected_value);
                            if (this.tsp_styles.hasOwnProperty(`${tsp_select_item_for}`)) {
                                this.tsp_styles[tsp_select_item_for] = tsp_selected_value;
                            }
                        } else {
                            if (tsp_select_item_for == "ts_poll_ch_tbc" || tsp_select_item_for == "ts_poll_ch_tac") {
                                toastr["warning"](tspoll_builder_json.icon_warning, tspoll_builder_json.warning, tspToastrOptions);
                            } else {
                                tsp_select_item.firstChild.setAttribute("class", "ts-poll ts-poll-ban");
                                tsp_selected_value = "ts-poll ts-poll-none";
                                tsp_input_icon_value.setAttribute("value", tsp_selected_value);
                                if (this.tsp_styles.hasOwnProperty(`${tsp_select_item_for}`)) {
                                    this.tsp_styles[tsp_select_item_for] = tsp_selected_value;
                                }
                                this.tspSetIconClass(tsp_input_icon_value.dataset.tspElem, tsp_input_icon_value.dataset.changeProp, tsp_selected_value);
                            }
                        }
                    },
                    tspChangeSidebarActive: function (libraryID) {
                        let tspSidebarElement = document.querySelector(`.ts-poll-aim-modal--sidebar-tab-item[data-library-id="${libraryID}"]`);
                        if (!tspSidebarElement.classList.contains('aesthetic-active')) {
                            document.querySelectorAll(".ts-poll-aim-modal--sidebar-tab-item.aesthetic-active").forEach(element => {
                                element.classList.remove("aesthetic-active");
                            });
                            if (libraryID == "all") {
                                document.querySelectorAll(".ts-poll-aim-icon-item").forEach(element => {
                                    element.removeAttribute("style");
                                });
                            } else {
                                document.querySelectorAll(`.ts-poll-aim-icon-item[data-library-id="${libraryID}"]`).forEach(element => {
                                    element.removeAttribute("style");
                                });
                                document.querySelectorAll(`.ts-poll-aim-icon-item:not([data-library-id="${libraryID}"])`).forEach(element => {
                                    element.style.display = "none";
                                });
                                document.getElementById("ts-poll-aim-modal--icon-preview-inner").animate({
                                    scrollTop: 0
                                }, 50);
                            }
                            tspSidebarElement.classList.add("aesthetic-active");
                            if (document.getElementById("ts-poll-aim-modal--search_input").value !== "") {
                                this.tspSearchIcon(document.getElementById("ts-poll-aim-modal--search_input").value);
                            }
                        }
                    },
                    tspChangeSelectedIcon: function (selectedItem) {
                        if (selectedItem.classList.contains('ts-poll-aim-icon-item-aesthetic-selected')) {
                            selectedItem.classList.remove("ts-poll-aim-icon-item-aesthetic-selected");
                        } else {
                            document.querySelectorAll((".ts-poll-aim-icon-item.ts-poll-aim-icon-item-aesthetic-selected")).forEach(element => {
                                element.classList.remove("ts-poll-aim-icon-item-aesthetic-selected");
                            });
                            selectedItem.classList.add("ts-poll-aim-icon-item-aesthetic-selected");
                        }
                    },
                    tspChangeSetIconEmpty: function (setIconNone) {
                        var tsp_selection_field = setIconNone.parentElement.parentElement.dataset.tspField;
                        document.querySelector(`li#${tsp_selection_field}`).firstChild.setAttribute("class", "ts-poll ts-poll-ban");
                        var tsp_selected_value = "ts-poll ts-poll-none";
                        var tsp_input_icon_value = document.getElementById(`${tsp_selection_field}-icon_value`);
                        tsp_input_icon_value.setAttribute("value", tsp_selected_value);
                        if (this.tsp_styles.hasOwnProperty(`${tsp_selection_field}`)) {
                            this.tsp_styles[tsp_selection_field] = tsp_selected_value;
                        }
                        this.tspSetIconClass(tsp_input_icon_value.dataset.tspElem, tsp_input_icon_value.dataset.changeProp, tsp_selected_value);
                    },
                    tspSearchIcon: function (searchText) {
                        let tspSearchIcon = searchText.toLowerCase();
                        var tsp_active_sidebar_item = document.querySelector(".ts-poll-aim-modal--sidebar-tab-item.aesthetic-active").dataset.libraryId;
                        if (searchText == "") {
                            document.querySelectorAll(`.ts-poll-aim-icon-item[data-library-id="${tsp_active_sidebar_item}"]`).forEach(element => {
                                element.removeAttribute("style");
                            });
                        } else {
                            switch (tsp_active_sidebar_item) {
                                case "ts-poll-emoji-regular":
                                case "ts-poll-regular":
                                    document.querySelectorAll(`.ts-poll-aim-icon-item[data-library-id="${tsp_active_sidebar_item}"]:not([data-filter*="${tspSearchIcon}"])`).forEach(element => {
                                        element.style.display = "none";
                                    });
                                    document.querySelectorAll(`.ts-poll-aim-icon-item[data-library-id="${tsp_active_sidebar_item}"][data-filter*="${tspSearchIcon}"]`).forEach(element => {
                                        element.removeAttribute("style");
                                    });
                                    break;
                                default:
                                    document.querySelectorAll(`.ts-poll-aim-icon-item:not([data-filter*="${tspSearchIcon}"])`).forEach(element => {
                                        element.style.display = "none";
                                    });
                                    document.querySelectorAll(`.ts-poll-aim-icon-item[data-filter*="${tspSearchIcon}"]`).forEach(element => {
                                        element.removeAttribute("style");
                                    });
                                    break;
                            }
                        }
                    },
                    editTspAnswer: function (editElemId) {
                        this.tspEditItemId = editElemId;
                        tspEditItemId = editElemId;
                        this.changeContent("field");
                        var tspAnswerKeyVal = this.tspGetObjKey(this.tsp_answers, this.tspEditItemId);
                        document.getElementById("tsp_answer_title").value = this.tsp_answers[tspAnswerKeyVal]["Answer_Title"];
                        this.$refs.tspAnswerColor.tspSpectrumSetValue(this.tsp_answers[tspAnswerKeyVal]["Answer_Param"]["TotalSoftPoll_Ans_Cl"]);
                        if (this.tsp_theme_name == "Image Poll" || this.tsp_theme_name == "Video Poll" || this.tsp_theme_name == "Image Without Button" || this.tsp_theme_name == "Video Without Button") {
                            if (this.tsp_answers[tspAnswerKeyVal]["Answer_Param"]["TotalSoftPoll_Ans_Im"] == "") {
                                this.tspSetImage("embed", "", tspoll_builder_json.tsp_no_img, "600", "600");
                            } else {
                                this.$refs.tspAnswerImage.tspImagePickerSet(this.tsp_answers[tspAnswerKeyVal]["Answer_Param"]["TotalSoftPoll_Ans_Im"]);
                            }
                            if (this.tsp_theme_name == "Video Poll" || this.tsp_theme_name == "Video Without Button") {
                                if (this.tsp_answers[tspAnswerKeyVal]["Answer_Param"]["TotalSoftPoll_Ans_Vd"] != "") {
                                    this.$refs.tspAnswerVideo.tspShowVideoInner(this.tsp_answers[tspAnswerKeyVal]["Answer_Param"]["TotalSoftPoll_Ans_Vd"]);
                                }
                            }
                        }
                        document.querySelector("main.tsp_content_fields_edit").removeAttribute("style");
                        document.querySelector("main.tsp_content_fields_menu").style.display = "none";
                    },
                    tspBackToAnswers: function () {
                        tspEditItemId = "";
                        this.tspEditItemId = "";
                        document.querySelector("main.tsp_content_fields_edit").style.display = "none";
                        document.querySelector("main.tsp_content_fields_menu").removeAttribute("style");
                        if (typeof (document.getElementById("tsp_answer_video_attachment_id")) != 'undefined' && document.getElementById("tsp_answer_video_attachment_id") != null) {
                            document.getElementById("tsp_answer_video_attachment_id").value = "";
                            document.querySelectorAll('.tsp_content_fields_edit .tsp_vd_change > iframe,.tsp_content_fields_edit .tsp_vd_change > video,.tsp_content_fields_edit .tsp_vd_change > blockquote').forEach(e => e.remove());
                            this.$refs.tspAnswerVideo.tspNoVideoShowChange();
                        }
                    },
                    copyTspAnswer: function (copyElemId) {
                        var tsp_new_answer_id = `new-${Math.floor(Math.random() * 900000) + 100000}`;
                        var tsp_new_props = JSON.parse(JSON.stringify(this.tsp_answers[this.tspGetObjKey(this.tsp_answers, copyElemId)]));
                        tsp_new_props.id = tsp_new_answer_id;
                        tsp_new_props.Answer_Votes = 0;
                        tsp_new_props.tsp_result_percent = 0;
                        this.tsp_answers.push(tsp_new_props);
                        this.tsp_answer_sort.push(`${tsp_new_answer_id}`);
                        this.tspAddStyleSheet(tsp_new_answer_id, tsp_new_props["Answer_Param"]["TotalSoftPoll_Ans_Cl"]);
                        toastr["success"](tspoll_builder_json.copy_note, tspoll_builder_json.success, tspToastrOptions);
                    },
                    deleteTspAnswer: function (deleteElemId) {
                        if (Object.keys(this.tsp_answers).length <= 2) {
                            toastr["error"](tspoll_builder_json.amount_warning, tspoll_builder_json.error, tspToastrOptions);
                            return;
                        }
                        this.tsp_answers.splice(this.tspGetObjKey(this.tsp_answers, deleteElemId), 1);
                        this.tsp_answer_sort.splice(this.tspGetArrKey(this.tsp_answer_sort, deleteElemId), 1)
                        this.tsp_delete_ids.push(deleteElemId);
                        toastr["success"](tspoll_builder_json.delete_note, tspoll_builder_json.success, tspToastrOptions);
                        if (this.tspEditItemId == deleteElemId) {
                            this.tspBackToAnswers();
                        }
                        this.tspDataChange = `${deleteElemId}-${tsp_question_id}`;
                    },
                    tspAnswerTitleInput: function (changeTitle) {
                        if (this.tsp_answers[this.tspGetObjKey(this.tsp_answers, this.tspEditItemId)].hasOwnProperty(`Answer_Title`)) {
                            this.$set(this.tsp_answers[this.tspGetObjKey(this.tsp_answers, this.tspEditItemId)], "Answer_Title", changeTitle);
                        }
                    },
                    tspSwapElement: function (indexA, indexB, sortElem) {
                        if (sortElem === true) {
                            this.tsp_answers.splice(indexB, 0, this.tsp_answers.splice(indexA, 1)[0]);
                        } else {
                            this.tsp_answer_sort.splice(indexB, 0, this.tsp_answer_sort.splice(indexA, 1)[0]);
                        }
                    },
                    tspAddStyleSheet: function (tspNewAnswerId, tspColor) {
                        document.documentElement.style.setProperty(`--tsp_a_c_${tsp_question_id}-${tspNewAnswerId}`, tspColor);
                        var tspStyleSpecial = [];
                        switch (this.tsp_theme_name) {
                            case 'Standart Poll':
                            case 'Standard Poll':
                                if (typeof (document.getElementById("ts_poll_p_shpop")) != 'undefined' && document.getElementById("ts_poll_p_shpop") != null) {
                                    tspStyleSpecial.push(
                                        `
                                        main.ts_poll_r_main_${tsp_question_id}[data-tsp-bool='false'] > .ts_poll_answer_result[data-tsp-id='${tspNewAnswerId}'] > .ts_poll_answer_result_label > .ts_poll_answer_percent_line{
                                            background-color: var(--tsp_a_c_${tsp_question_id}-${tspNewAnswerId});
                                        }
                                        `
                                    );
                                    tspStyleSpecial.push(
                                        `
                                        main.ts_poll_main_${tsp_question_id}[data-tsp-bool='false'] > .ts_poll_answer[data-tsp-id='${tspNewAnswerId}'] > .ts_poll_answer_label {
                                            color: var(--tsp_a_c_${tsp_question_id}-${tspNewAnswerId});
                                        }
                                        `
                                    );
                                }
                                break;
                            case 'Image Poll':
                            case 'Video Poll':
                                tspStyleSpecial.push(
                                    `
                                    main.ts_poll_main_${tsp_question_id}[data-tsp-color='Background'] > .ts_poll_answer[data-tsp-id='${tspNewAnswerId}'] > .ts_poll_before_div{
                                        background: var(--tsp_a_c_${tsp_question_id}-${tspNewAnswerId});
                                    }
                                    `
                                );
                                tspStyleSpecial.push(
                                    `
                                    main.ts_poll_main_${tsp_question_id}[data-tsp-color='Color'] > .ts_poll_answer[data-tsp-id='${tspNewAnswerId}']  .ts_poll_answer_label{
                                        color: var(--tsp_a_c_${tsp_question_id}-${tspNewAnswerId});
                                    }
                                    `
                                );
                                break;
                        }
                        if (tspStyleSpecial.length == 0) {
                            tspStyleSpecial.push(
                                `
                                main.ts_poll_main_${tsp_question_id}[data-tsp-color="Background"] > .ts_poll_answer[data-tsp-id="${tspNewAnswerId}"]{
                                    background-color: var(--tsp_a_c_${tsp_question_id}-${tspNewAnswerId});
                                }
                                `
                            );
                            tspStyleSpecial.push(
                                `
                                main.ts_poll_main_${tsp_question_id}[data-tsp-color="Color"] > .ts_poll_answer[data-tsp-id="${tspNewAnswerId}"]   .ts_poll_answer_label{
                                    color: var(--tsp_a_c_${tsp_question_id}-${tspNewAnswerId});
                                }
                                `
                            );
                            tspStyleSpecial.push(
                                `
                                main.ts_poll_main_${tsp_question_id}[data-tsp-voted="Background"] > .ts_poll_answer[data-tsp-id="${tspNewAnswerId}"]  span.ts_poll_r_progress{
                                    background-color: var(--tsp_a_c_${tsp_question_id}-${tspNewAnswerId});
                                }
                                `
                            );
                            tspStyleSpecial.push(
                                `
                                main.ts_poll_main_${tsp_question_id}[data-tsp-voted="Color"] > .ts_poll_answer[data-tsp-id="${tspNewAnswerId}"]  label.ts_poll_r_label{
                                    color: var(--tsp_a_c_${tsp_question_id}-${tspNewAnswerId});
                                }
                                `
                            );
                        }
                        var tsp_special_stylesheet = document.querySelector(`#ts_poll_special_${tsp_question_id}-css`).sheet;
                        if (tspStyleSpecial.length != 0) {
                            for (let i = 0; i < tspStyleSpecial.length; i++) {
                                tsp_special_stylesheet.insertRule(tspStyleSpecial[i], 0);
                            }
                        }
                    },
                    tspPositionItem: function (tspSelectedPosition) {
                        if (!tspSelectedPosition.classList.contains("tsp_active")) {
                            var tspSelectedParent = tspSelectedPosition.parentElement;
                            for (const child of tspSelectedParent.children) {
                                if (child.dataset.tspPos === tspSelectedPosition.dataset.tspPos) {
                                    child.classList.add("tsp_active");
                                    var tsp_change_style = tspSelectedParent.dataset.tspSelect;
                                    if (this.tsp_styles.hasOwnProperty(`${tsp_change_style}`)) {
                                        this.tsp_styles[tsp_change_style] = child.dataset.tspPos;
                                    }
                                    if (this.tsp_theme_name == "Video Poll" || this.tsp_theme_name == "Image Poll") {
                                        if (tsp_change_style == "ts_poll_a_ihr") {
                                            this.tsp_styles["ts_poll_a_ih"] = child.dataset.tspPos;
                                        }
                                    }
                                    document.querySelector(`${tspSelectedParent.dataset.changeElem}`).setAttribute(`${tspSelectedParent.dataset.changeProp}`, child.dataset.tspPos)
                                } else {
                                    child.classList.remove("tsp_active");
                                }
                            }
                        }
                        return false;
                    },
                    tspCheckboxInput: function (tspClickedElem) {
                        if (this.tsp_styles.hasOwnProperty(`${tspClickedElem.getAttribute("id")}`)) {
                            this.tsp_styles[`${tspClickedElem.getAttribute("id")}`] = `${tspClickedElem.checked}`;
                        } else if (this.tsp_theme_settings.hasOwnProperty(`${tspClickedElem.getAttribute("id")}`)) {
                            this.tsp_theme_settings[`${tspClickedElem.getAttribute("id")}`] = `${tspClickedElem.checked}`;
                        }
                        if (tspClickedElem.getAttribute("id") == "TotalSoft_Poll_Set_01") {
                            this.tsp_show = this.tsp_theme_settings[`${tspClickedElem.getAttribute("id")}`];
                            return;
                        }
                        if (tspClickedElem.getAttribute("id") == "ts_poll_p_shpop" || tspClickedElem.getAttribute("id") == "ts_poll_pop_show") {
                            return;
                        }
                        if (tspClickedElem.checked) {
                            document.querySelectorAll(`${tspClickedElem.dataset.changeElem}`).forEach(e => e.setAttribute(`${tspClickedElem.dataset.changeProp}`, tspClickedElem.parentElement.dataset.tspCheck));
                        } else {
                            document.querySelectorAll(`${tspClickedElem.dataset.changeElem}`).forEach(e => e.setAttribute(`${tspClickedElem.dataset.changeProp}`, tspClickedElem.parentElement.dataset.tspUncheck));
                        }
                    },
                    tspAccordionHeader: function (tspClickedHeader) {
                        if (tspClickedHeader.parentElement.classList.contains('tsp_accordion_item_opened')) {
                            tspClickedHeader.parentElement.lastChild.removeAttribute("style");
                            tspClickedHeader.parentElement.classList.remove("tsp_accordion_item_opened");
                        } else if (typeof (document.querySelector('.tsp_accordion_item_opened')) != 'undefined' && document.querySelector('.tsp_accordion_item_opened') != null) {
                            var tspOpenedContent = document.querySelector('.tsp_accordion_item_opened');
                            tspOpenedContent.lastChild.removeAttribute("style");
                            tspOpenedContent.classList.remove("tsp_accordion_item_opened");
                            tspClickedHeader.parentElement.lastChild.style.height = tspClickedHeader.parentElement.lastChild.scrollHeight + "px";
                            tspClickedHeader.parentElement.classList.add("tsp_accordion_item_opened");
                        } else {
                            tspClickedHeader.parentElement.lastChild.style.height = tspClickedHeader.parentElement.lastChild.scrollHeight + "px";
                            tspClickedHeader.parentElement.classList.add("tsp_accordion_item_opened");
                        }
                    },
                    tspTextInput: function (tspChangedInput) {
                        if (this.tsp_styles.hasOwnProperty(`${tspChangedInput.target.getAttribute("id")}`)) {
                            this.tsp_styles[tspChangedInput.target.getAttribute("id")] = tspChangedInput.target.value;
                        } else if (this.tsp_theme_settings.hasOwnProperty(`${tspChangedInput.target.getAttribute("id")}`)) {
                            this.tsp_theme_settings[tspChangedInput.target.getAttribute("id")] = tspChangedInput.target.value;
                            if (tspChangedInput.target.getAttribute("id") == "TotalSoft_Poll_Set_05") {
                                this.tsp_result_no = this.tsp_theme_settings[tspChangedInput.target.getAttribute("id")];
                            }
                            return;
                        }
                        document.querySelectorAll(`${tspChangedInput.target.dataset.tspElem}`).forEach(e => e.setAttribute(`${tspChangedInput.target.dataset.changeProp}`, tspChangedInput.target.value));
                    },
                    tspSelectOption: function (tspChangedSelected) {
                        var tspChangedSelectOpt = document.getElementById(`${tspChangedSelected}`);
                        if (this.tsp_styles.hasOwnProperty(`${tspChangedSelectOpt.getAttribute("id")}`)) {
                            this.tsp_styles[`${tspChangedSelectOpt.getAttribute("id")}`] = `${tspChangedSelectOpt.value}`;
                        } else if (this.tsp_theme_settings.hasOwnProperty(`${tspChangedSelectOpt.getAttribute("id")}`)) {
                            this.tsp_theme_settings[`${tspChangedSelectOpt.getAttribute("id")}`] = `${tspChangedSelectOpt.value}`;
                        }
                        if (tspChangedSelectOpt.classList.contains('tsp_root_elem')) {
                            document.documentElement.style.setProperty(tspChangedSelectOpt.dataset.changeProp, tspChangedSelectOpt.value);
                        } else {
                            document.querySelectorAll(`${tspChangedSelectOpt.dataset.changeElem}`).forEach(e => e.setAttribute(`${tspChangedSelectOpt.dataset.changeProp}`, tspChangedSelectOpt.value))
                        }
                        if (tspChangedSelected == "ts_poll_a_iht") {
                            if (tspChangedSelectOpt.value == "fixed") {
                                document.querySelector(".tsp_position_select[data-tsp-select='ts_poll_a_ihr']").parentElement.setAttribute("style", "display:none;");
                                document.querySelector(".tsp_range_div_title[data-tsp-field='ts_poll_a_ih").parentElement.removeAttribute("style");
                                document.querySelector(`main.ts_poll_main_${tsp_question_id}`).dataset.tspRatio = "none";
                            } else {
                                document.querySelector(".tsp_range_div_title[data-tsp-field='ts_poll_a_ih']").parentElement.setAttribute("style", "display:none;");
                                document.querySelector(".tsp_position_select[data-tsp-select='ts_poll_a_ihr']").parentElement.removeAttribute("style");
                                if (typeof (document.querySelector(".tsp_position_select[data-tsp-select='ts_poll_a_ihr'] > .tsp_active")) != 'undefined' && document.querySelector(".tsp_position_select[data-tsp-select='ts_poll_a_ihr'] > .tsp_active") != null) {
                                    document.querySelector(`main.ts_poll_main_${tsp_question_id}`).dataset.tspRatio = document.querySelector(".tsp_position_select[data-tsp-select='ts_poll_a_ihr'] > .tsp_active").dataset.tspPos;
                                    this.tsp_styles["ts_poll_a_ih"] = document.querySelector(".tsp_position_select[data-tsp-select='ts_poll_a_ihr'] > .tsp_active").dataset.tspPos;
                                } else {
                                    $(".tsp_position_select[data-tsp-select='ts_poll_a_ihr > .tsp_position_item']").first().trigger("click");
                                }
                            }
                            $('.tsp_accordion_item_opened.answer-image').children(".tsp_accordion_item_content").height(`${$('.tsp_accordion_item_opened.answer-image').children(".tsp_accordion_item_content").children(".tsp_accordion_items").prop("scrollHeight")}px`);
                        }
                        if (tspChangedSelected == "ts_poll_p_sheff") {
                            document.querySelectorAll(`.ts_poll_r_section_${tsp_question_id},#ts_poll_modal_result_section_${tsp_question_id}`).forEach((element) => element.removeAttribute("style"));
                        }
                        if (tspChangedSelected == "ts_poll_v_t" || tspChangedSelected == "ts_poll_p_a_vt") {
                            this.tsp_type = tspChangedSelectOpt.value;
                        }
                    },
                    tspChangeTotalVotes: function () {
                        var tspTotalVotesCount = 0;
                        Object.keys(this.tsp_answers).map((key) => tspTotalVotesCount += Number(this.tsp_answers[key]["Answer_Votes"]));
                        this.tsp_total = tspTotalVotesCount;
                        if (tspTotalVotesCount != 0) {
                            Object.keys(this.tsp_answers).map((key) => this.$set(this.tsp_answers[key], "tsp_result_percent", Math.round(Number((Number(this.tsp_answers[key]["Answer_Votes"]) * 100) / tspTotalVotesCount) * 100) / 100));
                        }
                    },
                    tspfadeIn: function (element, duration = 600) {
                        element.style.display = 'flex';
                        element.style.opacity = 0;
                        var tspLast = +new Date();
                        var tspFrameShow = function () {
                            element.style.opacity = +element.style.opacity + (new Date() - tspLast) / duration;
                            tspLast = +new Date();
                            if (+element.style.opacity < 1) {
                                (window.requestAnimationFrame && requestAnimationFrame(tspFrameShow)) || setTimeout(tspFrameShow, 16);
                            }
                        };
                        tspFrameShow();
                    },
                    tspfadeOut: function (element, duration = 600) {
                        var tspLast = +new Date();
                        var tspFrameHide = function () {
                            element.style.opacity = +element.style.opacity - (new Date() - tspLast) / duration;
                            tspLast = +new Date();
                            if (+element.style.opacity > 0) {
                                (window.requestAnimationFrame && requestAnimationFrame(tspFrameHide)) || setTimeout(tspFrameHide, 16);
                            } else {
                                element.style.display = 'none';
                                document.getElementById(`tsp_popup_attachment_${tsp_question_id}`).innerHTML = "";
                            }
                        };
                        tspFrameHide();
                    },
                    tspShowAttachment: function (tspRowId) {
                        if (this.tsp_theme_name == "Image Without Button" || this.tsp_theme_name == "Image Without Button") {
                            if (!document.getElementById("ts_poll_pop_show").checked) {
                                return;
                            }
                        }
                        var tspAnswerKeyVal = this.tspGetObjKey(this.tsp_answers, tspRowId);
                        document.getElementById(`tsp_popup_attachment_${tsp_question_id}`).innerHTML = this.tsp_answers[tspAnswerKeyVal]["embed"];
                        this.tspfadeIn(document.getElementById(`tsp_popup_question_${tsp_question_id}`), 1500);
                    },
                    tspHideAttachment: function (tspTarget) {
                        var tspCheckHideOr = false;
                        var tspNodeList = document.querySelectorAll(`#tsp_popup_attachment_${tsp_question_id} > .tsp_embed_popup_inner *`);
                        tspNodeList.forEach(e => { if (e === tspTarget) { tspCheckHideOr = true; } });
                        if (!tspTarget.classList.contains("tsp_embed_popup_inner") && tspCheckHideOr === false) {
                            this.tspfadeOut(document.getElementById(`tsp_popup_question_${tsp_question_id}`), 1500);
                        }
                    },
                    tspMainLoadedFunction: function () {
                        document.getElementById("tsp_loader").style.display = "none";
                        if (this.tspCreation) {
                            var tspoll_datatable_info = new DataTable("#tsp_data_results_table");
                        }
                    },
                    tspSavePoll: function () {
                        document.getElementById("tsp_loader").style.display = "flex";
                        var tspVueSelf = this;
                        var tspValuesAnswers = Object.values(tspVueSelf.tsp_answers);
                        var tspSaveAnswers = Object();
                        Object.keys(tspValuesAnswers).map((key) => {
                            if (tspValuesAnswers[key].hasOwnProperty("embed")) {
                                tspValuesAnswers[key]["embed"] = "";
                            }
                            tspSaveAnswers[`${tspValuesAnswers[key]["id"]}`] = tspValuesAnswers[key];
                        });
                        $.ajax({
                            url: tspoll_builder_json.ajaxurl,
                            data: {
                                action: 'tsp_save_question',
                                tsp_nonce: tspoll_builder_json.tsp_nonce,
                                tsp_id: tsp_question_id,
                                tsp_question_title: tspoll_builder_json.tsp_proporties.Question_Title,
                                tsp_answers: tspSaveAnswers,
                                tsp_answers_sort: tspVueSelf.tsp_answer_sort,
                                tsp_question_styles: tspVueSelf.tsp_styles,
                                tsp_question_params: tspVueSelf.tsp_question_params,
                                tsp_question_settings: tspVueSelf.tsp_theme_settings,
                                tsp_deleted_answers: tspVueSelf.tsp_delete_ids
                            },
                            type: 'POST',
                        }).done(function (response) {
                            if (response.success === true) {
                                if (response.data.hasOwnProperty("url")) {
                                    window.location.href = response.data.url;
                                }
                            } else {
                                toastr["error"](tspoll_builder_json.save_warning, tspoll_builder_json.error, tspToastrOptions)
                                setTimeout(() => {
                                    window.location.href = window.location.href;
                                }, 400);
                            }
                        }).fail(function (response) {
                            toastr["error"](tspoll_builder_json.save_warning, tspoll_builder_json.error, tspToastrOptions)
                            setTimeout(() => {
                                window.location.href = window.location.href;
                            }, 400);
                        });
                    }
                },
                mounted: function () {
                    var self = this;
                    var tspOldIndex = "";
                    var tspNewIndex = "";
                    $.contextMenu({
                        selector: `main.ts_poll_main_${tsp_question_id} > div.ts_poll_answer`,
                        callback: function (key, options) {
                            var tsp_clicked_context_menu = $(options.$trigger).attr("data-tsp-id");
                            switch (key) {
                                case "delete":
                                    self.deleteTspAnswer(tsp_clicked_context_menu);
                                    break;
                                case "copy":
                                    self.copyTspAnswer(tsp_clicked_context_menu);
                                    break;
                                case "edit":
                                    self.editTspAnswer(tsp_clicked_context_menu);
                                    break;
                                default:
                                    break;
                            }
                        },
                        items: {
                            "edit": { name: "Edit", icon: "edit" },
                            "copy": { name: "Clone", icon: "copy" },
                            "sep1": "---------",
                            "delete": { name: "Delete", icon: "delete" },
                        }
                    });
                    $('#tsp-list').sortable({
                        cursor: 'move',
                        handle: ".tsp_handle_list",
                        placeholder: "tsp-portlet-placeholder",
                        start: function (event, ui) {
                            tspOldIndex = $(ui.item).index();
                        },
                        update: function (event, ui) {
                            event.stopPropagation();
                            event.preventDefault();
                            tspNewIndex = $(ui.item).index();
                            self.tspSwapElement(tspOldIndex, tspNewIndex, false);
                            self.tspSwapElement(tspOldIndex, tspNewIndex, true);
                        },
                    });
                    window.addEventListener("load", this.tspMainLoadedFunction, false);
                    if (document.readyState == "complete") {
                        this.tspMainLoadedFunction();
                    }
                },
                created: function () {
                    this.renderTsPoll();
                    this.tspRangeInputLoad();
                    this.tspIconPickerLoad();
                    if (this.tsp_theme_name == "Image Poll" || this.tsp_theme_name == "Video Poll") {
                        this.tspSelectOption("ts_poll_a_iht");
                    }
                },
                watch: {
                    tspDataChange: function (val) {
                        if (val) {
                            this.tspChangeTotalVotes();
                        }
                    }
                }
            });
        } else {
            new Vue({
                el: "#tsp_builder_section",
                data: {
                    isOpen: true,
                    openClass: 'open',
                    closeClass: 'close',
                    tsSearch: '',
                    tsFilter: 'all'
                },
                mounted: function () {
                    window.addEventListener("load", this.tspMainLoadedFunction, false);
                    if (document.readyState == "complete") {
                        this.tspMainLoadedFunction();
                    }
                },
                methods: {
                    tspMainLoadedFunction: function () {
                        document.getElementById("tsp_loader").style.display = "none";
                    },
                    changeContent: function (tspContentName) {
                        switch (tspContentName) {
                            case "theme":
                                break;
                            default:
                                toastr["warning"]("Please choose a theme for more experiance.", "Warning", tspToastrOptions);
                                break;
                        }
                    },
                    tsFilterTemplates: function (filter, search) {
                        this.tsSearch = search;
                        this.tsFilter = filter;
                        [].slice.call(document.querySelectorAll(".tsp-template-item"), 0).forEach(tsTemplate => {
                            let inSearch = search === '' || search !== '' && tsTemplate.dataset.search.toLowerCase().includes(search);
                            if (filter === 'all' && inSearch) {
                                tsTemplate.style.display = '';
                            } else {
                                if (tsTemplate.dataset.filter === filter && inSearch) {
                                    tsTemplate.style.display = '';
                                } else {
                                    tsTemplate.style.display = 'none';
                                }
                            }
                        });
                    },
                    tsCategoryTemplates: function (filter) {
                        document.querySelector('.tsp-templates-menu-item.tsp-active').classList.remove("tsp-active");
                        document.querySelector('.tsp-templates-menu-item[data-filter="' + filter + '"]').classList.add("tsp-active");
                        this.tsFilterTemplates(filter, this.tsSearch);
                    },
                    tsSearchTemplates: function (event) {
                        this.tsFilterTemplates(this.tsFilter, event.target.value);
                    },
                    tsImportTemplate: function (templateID) {
                        $.ajax({
                            url: ts_json.ajaxurl,
                            data: {
                                action: 'ts_import_template',
                                ts_load_nonce: ts_json.ts_load_nonce,
                                ts_importer_id: ts_json.ts_importer_id,
                                template_id: templateID
                            },
                            beforeSend: function () {
                                document.getElementById("ts-import-notification").style.display = "";
                            },
                            type: 'POST',
                        }).done(function (tsResponse) {
                            if (tsResponse.success !== true) {
                                document.getElementById("ts-import-notification").style.display = "none";
                                console.error(`TS Poll --- Template import failed. Error message - ${tsResponse.data}`);
                                toastr["error"]("Template import failed.", "Error", tspToastrOptions);
                            } else {
                                window.location = tsResponse.data;
                            }
                        }).fail(function () {
                            document.getElementById("ts-import-notification").style.display = "none";
                            console.error("TS Poll --- Template import failed.");
                            toastr["error"]("Template import failed.", "Error", tspToastrOptions);
                        });
                    },
                    tsChooseTheme: function () {
                        document.querySelector(".tsp-main.tsp-main-templates").classList.add("tsp-left");
                        document.querySelector(".tsp-main.tsp-main-themes").classList.add("tsp-right");
                        document.querySelector("main.tsp-main.tsp-main-templates").classList.remove("tsp-active");
                        document.querySelector("main.tsp-main.tsp-main-themes").classList.add("tsp-active");
                    },
                    tsBackTemplates: function () {
                        document.querySelector("main.tsp-main.tsp-main-themes").classList.remove("tsp-active");
                        document.querySelector("main.tsp-main.tsp-main-templates").classList.add("tsp-active");
                    }
                },
            });
        }
    });
})(jQuery);