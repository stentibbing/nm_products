(function ($) {
  "use strict";

  /**
   * Funciton to highlight packages belonging to product and vice versa
   */
  $(function () {
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
        $(".nm-product-list-package-list", this).toggleClass(
          "package-list-opened"
        );
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
