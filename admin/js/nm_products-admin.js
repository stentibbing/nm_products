(function ($) {
  "use strict";
  $(function () {
    $("#nmp-add-nutrition-fact").on("click", function (event) {
      event.preventDefault();
      const nmpNutritionRow = $(".nmp-nutrition-facts-row-prototype").clone();
      nmpNutritionRow
        .removeClass("nmp-nutrition-facts-row-prototype")
        .addClass("nmp-nutrition-facts-row ");
      $(".nmp-nutrition-facts-rows").append(nmpNutritionRow);
      $(".nmp-nutrition-facts-rows").trigger("updated");
    });

    $(".nmp-nutrition-facts-rows").on(
      "click",
      "a.nmp-remove-nutrition-fact",
      function (event) {
        event.preventDefault();
        if (!$(this).hasClass("disabled")) {
          $(this).closest(".nmp-nutrition-facts-row").remove();
        }
        $(".nmp-nutrition-facts-rows").trigger("updated");
      }
    );

    $(".nmp-nutrition-facts-rows").on(
      "click",
      "a.nmp-move-nutrition-fact-up",
      function (event) {
        event.preventDefault();
        if (!$(this).hasClass("disabled")) {
          const nmpParentRow = $(this).closest(".nmp-nutrition-facts-row");
          const nmpPreviousRow = nmpParentRow.prev();
          nmpParentRow.remove();
          nmpPreviousRow.before(nmpParentRow);
          $(".nmp-nutrition-facts-rows").trigger("updated");
        }
      }
    );

    $(".nmp-nutrition-facts-rows").on(
      "click",
      "a.nmp-move-nutrition-fact-down",
      function (event) {
        event.preventDefault();
        if (!$(this).hasClass("disabled")) {
          const nmpParentRow = $(this).closest(".nmp-nutrition-facts-row");
          const nmpNextRow = nmpParentRow.next();
          nmpParentRow.remove();
          nmpNextRow.after(nmpParentRow);
          $(".nmp-nutrition-facts-rows").trigger("updated");
        }
      }
    );

    $(".nmp-nutrition-facts-rows").on("updated", function () {
      $(".nmp-nutrition-facts-row", this).each(function (index) {
        if (index == 0) {
          $(".nmp-move-nutrition-fact-up", this).addClass("disabled");
        } else {
          $(".nmp-move-nutrition-fact-up", this).removeClass("disabled");
        }
        if (index == $(".nmp-nutrition-facts-row").length - 1) {
          $(".nmp-move-nutrition-fact-down", this).addClass("disabled");
        } else {
          $(".nmp-move-nutrition-fact-down", this).removeClass("disabled");
        }
      });
      indexify();
    });

    const indexify = function () {
      let index = 0;
      $(".nmp-nutrition-facts-row").each(function () {
        $(".nmp-nutrition-facts-nutrient", this).attr(
          "name",
          `nmp-nutrition-facts[facts][${index}][nutrient]`
        );
        $(".nmp-nutrition-facts-value", this).attr(
          "name",
          `nmp-nutrition-facts[facts][${index}][value]`
        );
        index++;
      });
    };
  });
})(jQuery);
