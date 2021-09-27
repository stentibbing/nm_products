(function ($) {
  "use strict";

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

  /*
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
})(jQuery);
