(function ($) {
  'use strict';
  $(document).ready(function () {
    var tspoll_card_zindex = 10;
    $(document).on("click", "div.tsp_addon_card", function (e) {
      if ($(".tsp_addon_card-actions .tsp_addon_btn").is(e.target)) {
        return;
      }
      e.preventDefault();
      var tspIsShowing = false;
      if ($(this).hasClass("tsp_show")) {
        tspIsShowing = true
      }
      if ($("div.tsp_addon_cards").hasClass("tsp_showing")) {
        $("div.tsp_addon_card.tsp_show").removeClass("tsp_show");
        if (tspIsShowing) {
          $("div.tsp_addon_cards").removeClass("tsp_showing");
        } else {
          $(this).css({ zIndex: tspoll_card_zindex }).addClass("tsp_show");
        }
        tspoll_card_zindex++;
      } else {
        $("div.tsp_addon_cards").addClass("tsp_showing");
        $(this).css({ zIndex: tspoll_card_zindex }).addClass("tsp_show");
        tspoll_card_zindex++;
      }
    });
  });
})(jQuery);