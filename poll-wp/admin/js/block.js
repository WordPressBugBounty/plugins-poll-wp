(function (blocks, editor, element) {
	var createElement = element.createElement
	var BlockControls = wp.blockEditor.BlockControls
	var SelectControl = wp.components.SelectControl
	var Placeholder = wp.components.Placeholder
	var tspoll_list = ts_poll_gutenberg_script_data.tspoll_list
	let el = wp.element.createElement
	let Fragment = wp.element.Fragment
	function createTspFunction(question_id) {
		var tsp_question_id = question_id;
		var tsp_new_question_id = `new-${Math.floor(Math.random() * 900000) + 100000}`;
		window[`tspInterval_for_${tsp_new_question_id}`] = null;
		window[`tspIntervalFunction_${tsp_new_question_id}`] = function () {
			if (typeof Vue === "function" && typeof (document.getElementById(`ts_poll_form_${tsp_question_id}`)) != "undefined" && document.getElementById(`ts_poll_form_${tsp_question_id}`) != null) {
				new Vue({
					el: `#ts_poll_form_${tsp_question_id}`,
					data: {
						tsp_answers: "",
						tsp_total: "",
						tsp_sceleton: false,
						ts_poll_mode: "",
						tsp_type: "",
						tsp_show: "",
						tsp_result_no: "",
						tsp_theme_name: ""
					},
					methods: {
						tspGetImageSrc(rowIndex, rowId) {
							var tspSelf = this;
							if (typeof (document.getElementById(`tspImg${tsp_question_id}-${rowId}`)) != "undefined" && document.getElementById(`tspImg${tsp_question_id}-${rowId}`) != null) {
								document.getElementById(`tspImg${tsp_question_id}-${rowId}`).setAttribute("src", tspSelf['tsp_answers'][rowIndex]['img_src'])
							}
						},
						renderTsPoll: function () {
							var tspSelf = this;
							jQuery.ajax({
								url: ts_poll_gutenberg_script_data.tsp_ajax_url,
								data: {
									action: "tsp_vue_function",
									tsp_id: tsp_question_id,
									tsp_vote_nonce: jQuery(`#tsp_vote_nonce_field_${tsp_question_id}`).val(),
									tsp_change_id: tsp_question_id,
								},
								type: "POST",
							}).done(function (response) {
								if (response.success === true) {
									tspSelf.tsp_type = jQuery(`#tsp_type_${tsp_question_id}`).val();
									tspSelf.tsp_show = jQuery(`#tsp_show_${tsp_question_id}`).val();
									tspSelf.tsp_result_no = jQuery(`#tsp_result_no_${tsp_question_id}`).val();
									tspSelf.tsp_theme_name = jQuery(`#tsp_theme_name_${tsp_question_id}`).val();
									tspSelf.tsp_answers = response.data.answers;
									tspSelf.tsp_total = response.data.total_votes;
									setTimeout(() => {
										document.getElementById(`ts_poll_section_${tsp_question_id}`).removeAttribute("style");
										tspSelf.ts_poll_mode = response.data.mode;
									}, 1000);
								}
							}).fail(function (response) {
								console.error("TS Poll loading failed.");
							});
						},
						show_results: function (tspAll = false) {
							if (tspAll === true) {
								document.getElementById("ts_poll_footer_%1$s").remove();
							} else {
								return;
							}
						},
						hide_results: function () {
							return false;
						},
						vote_function: function (event) {
							return false;
						},
					},
					created: function () {
						this.renderTsPoll();
					},
					watch: {
						ts_poll_mode: function (tspNewMode) {
							if (tspNewMode == "end") {
								this.show_results(true);
							} else if (tspNewMode == "coming") {
								this.tsp_sceleton = true;
							}
						}
					}
				});
				clearInterval(window[`tspInterval_for_${tsp_new_question_id}`]);
			}
		};
		window[`tspReference_for${tsp_new_question_id}`] = (function tspSameCallFunction() {
			window[`tspInterval_for_${tsp_new_question_id}`] = setInterval(window[`tspIntervalFunction_${tsp_new_question_id}`], 1000);
			return tspSameCallFunction;
		}());
	}
	if (ts_poll_gutenberg_script_data.polls_count >= 1) {
		blocks.registerBlockType(
			'tspoll/poll-block',
			{
				title: 'TS Poll',
				icon: 'chart-bar',
				category: 'widgets',
				description: ts_poll_gutenberg_script_data.tspoll_plugin_desc,
				keywords: ['poll', 'question', 'answer', 'video poll', 'image poll', 'wordpress poll'],
				example: {
					attributes: {
						"preview": true,
					},
				},
				edit: props => {
					if (props.attributes.preview) {
						return [
							createElement(
								Fragment,
								{
									key: "ts-poll-preview-control",
									className: "ts-poll-preview-control",
								},
								el(
									'img',
									{
										src: ts_poll_gutenberg_script_data.ts_poll_preview,
										width: '100%',
										height: '100%'
									},
								),
							),
						]
					} else if (props.attributes.tsp_id) {
						return [
							createElement(
								BlockControls,
								{
									key: 'ts-poll-control'
								},
								createElement(
									SelectControl,
									{
										className: 'ts_poll_select_block',
										value: props.attributes.tsp_id,
										options: tspoll_list,
										onChange: function (newValue) {
											if (parseInt(newValue) > 0) {
												createTspFunction(newValue);
												props.setAttributes({ tsp_id: newValue });
												createElement(
													wp.serverSideRender,
													{
														key: 'ts-poll-control',
														block: 'tspoll/poll-block',
														className: 'tspoll_guttenberg_block',
														attributes: props.attributes,
													}
												);
											} else {
												props.setAttributes({ tsp_id: '' });
											}
										}
									}
								),
							),
							createElement(
								wp.serverSideRender,
								{
									key: 'ts-poll-control',
									block: 'tspoll/poll-block',
									className: 'tspoll_guttenberg_block',
									attributes: props.attributes,
								}
							),
						]
					} else {
						return [
							createElement(
								Placeholder,
								{
									key: "tspoll_selector_block",
									className: "tspoll_selector_block",
								},
								el(
									'img',
									{
										width: 100,
										height: 100,
										src: ts_poll_gutenberg_script_data.ts_poll_logo
									},
								),
								el(
									'h3',
									{
										key: "ts_poll_h3",
										className: "ts_poll_h3",
									},
									'TS Poll'
								),
								createElement(
									SelectControl,
									{
										className: 'ts_poll_select_block',
										value: props.attributes.tsp_id,
										options: tspoll_list,
										onChange: function (newValue) {
											if (parseInt(newValue) > 0) {
												createTspFunction(newValue);
												props.setAttributes({ tsp_id: newValue });
												createElement(
													wp.serverSideRender,
													{
														key: 'ts-poll-control',
														block: 'tspoll/poll-block',
														className: 'tspoll_guttenberg_block',
														attributes: props.attributes,
													}
												)
											} else {
												props.setAttributes({ tsp_id: '' });
											}
										}
									}
								),
							),
						]
					}
				},
				save: props => {
					createTspFunction(props.attributes.tsp_id);
					return null;
				}
			}
		)
	} else {
		return null;
	}
}(
	window.wp.blocks,
	window.wp.editor,
	window.wp.element
))
