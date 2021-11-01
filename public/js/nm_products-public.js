(function ($) {
  "use strict";

  /**
   * Funciton to highlight packages belonging to product and vice versa
   */
  $(function () {
    $("ul.nm-products-list li.nm-product").mouseenter(function () {
      let packages = $(this).data("packages").split(" ");

      $("ul.nm-packages-list li").removeClass("highlight");

      packages.forEach(curPackage => {
        $("ul.nm-packages-list li.package-" + curPackage).addClass("highlight");
      });
    });

    $("ul.nm-products-list li.nm-product").mouseleave(function () {
      $("ul.nm-packages-list li").removeClass("highlight");
    });

    $("ul.nm-packages-list li.nm-package span.nm-package-title").mouseenter(
      function () {
        let curPackage = $(this).parent().data("package");
        $("ul.nm-products-list li.nm-product").removeClass("highlight");
        $("ul.nm-products-list li.nm-product.package-" + curPackage).addClass(
          "highlight"
        );
      }
    );

    $("ul.nm-packages-list li.nm-package").mouseleave(function () {
      $("ul.nm-products-list li.nm-product").removeClass("highlight");
    });
  });
})(jQuery);
