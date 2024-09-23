(function ($) {
	'use strict';
	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$(document).on(
		'click',
		'.ts-export-poll,.ts-export-results-item,.ts_poll_nav_link_pro',
		function () {
			toastr["error"](tspoll_admin_json.premium_option, tspoll_admin_json.error, { "closeButton": true, "newestOnTop": false, "progressBar": true, "positionClass": "toast-top-right", "preventDuplicates": true, "showDuration": "30000", "hideDuration": "1000", "timeOut": "5000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut", });
		}
	);
	$(document).on(
		'click',
		'a[data-tsp-action="copy"],a[data-tsp-action="delete"]',
		function () {
			var ts_poll_action = $(this).attr('data-tsp-action');
			if (ts_poll_action == 'copy') {
				document.querySelector(':root').style.setProperty('--ts_poll_action', '#5534a9');
				$('#ts_poll_confirm_content').children('header').children('div').html(`<i class="ts-poll ts-poll-files-o"></i>`);
				$('#ts_poll_confirm_content').find('.ts_poll_submit_btn').val(tspoll_admin_json.copy);
				$('#ts_poll_action_input').val('bulk-copy');
				$('#ts_poll_confirm_content').children('main').html(tspoll_admin_json.copy_action)
			} else {
				document.querySelector(':root').style.setProperty('--ts_poll_action', '#ff0000');
				$('#ts_poll_confirm_content').children('header').children('div').html(`<i class="ts-poll ts-poll-trash"></i>`);
				$('#ts_poll_confirm_content').find('.ts_poll_submit_btn').val(tspoll_admin_json.delete);
				$('#ts_poll_action_input').val('bulk-delete');
				$('#ts_poll_confirm_content').children('main').html(tspoll_admin_json.delete_action)
			}
			$('#ts_poll_actioned_item').val($(this).attr('data-tsp-id'));
			$('#ts_poll_confirm_modal').css('display', '');
		}
	);
	$(document).on(
		'click',
		'#ts_poll_confirm_content',
		function (event) {
			event.stopPropagation();
		}
	);
	$(document).on(
		'click',
		'#ts_poll_confirm_modal',
		function () {
			$('#ts_poll_confirm_content').addClass('ts_poll_shake_anim');
			setTimeout(
				() => {
					$('#ts_poll_confirm_content').removeClass('ts_poll_shake_anim');
				},
				500
			);
		}
	);
	$(document).on(
		'click',
		'.ts_poll_cancel_btn,#ts_poll_close_btn',
		function () {
			$('#ts_poll_confirm_modal').css('display', 'none');
		}
	);
	var tsp_clicked = 0;
	$(document).on(
		'click',
		'.ts_poll_submit_btn',
		function () {
			if (tsp_clicked >= 1) {
				$(this).prop('disabled', true);
			}
			tsp_clicked++;
		}
	);
	$(document).on(
		'click',
		'#ts_poll_form td.column-id>span',
		function (event) {
			event.stopPropagation();
			event.preventDefault();
			$(this).html(`${tspoll_admin_json.copied} ! `);
			var tsp_create_input = document.createElement("input");
			tsp_create_input.setAttribute("value", `[TS_Poll id="${$(this).attr("data-tsp-id")}"]`);
			document.body.appendChild(tsp_create_input);
			tsp_create_input.select();
			document.execCommand("copy");
			document.body.removeChild(tsp_create_input);
			setTimeout(
				() => {
					$(this).html(tspoll_admin_json.copy);
				},
				1000
			);
		}
	);
})(jQuery);
