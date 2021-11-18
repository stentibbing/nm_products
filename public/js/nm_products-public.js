(function ($) {
  "use strict";

  /**
   * Funciton to highlight packages belonging to product and vice versa
   */
  $(function () {
    let hihlightProduct;
    $(".nm-product")
      .on("mouseenter", function () {
        let packages = $(this).data("packages").split(" ");
        packages.forEach((curPackage) => {
          $('.nm-package[data-package*="' + curPackage + '"]').addClass(
            "highlight"
          );
        });
      })
      .on("mouseleave", function () {
        $(".nm-package").removeClass("highlight");
      })
      .on("click", function () {
        $(this)
          .children(".nm-product-list-package-list")
          .toggleClass("package-list-opened");
        $(".nm-product")
          .not(this)
          .children(".nm-product-list-package-list")
          .removeClass("package-list-opened");
      })
      .on("touchstart", function () {
        hihlightProduct = setTimeout(() => {
          $(this).addClass("touch-highlight");
        }, 300);
      });

    $(window).on("touchend click", function () {
      // Clear timeout so touchhighlight would not be added for click event
      clearTimeout(hihlightProduct);
      $(".nm-product").removeClass("touch-highlight");
    });

    $(".nm-package")
      .on("mouseenter", function () {
        let curPackage = $(this).data("package");
        $('.nm-product[data-packages*="' + curPackage + '"]').addClass(
          "highlight"
        );
      })
      .on("mouseleave", function () {
        $(".nm-product").removeClass("highlight");
      });
  });
})(jQuery);
