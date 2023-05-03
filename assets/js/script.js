(function ($) {
  "use strict";

  $('[data-toggle="offcanvas"], .nav-link:not(.dropdown-toggle').on(
    "click",
    function () {
      $(".offcanvas-collapse").toggleClass("open");
    }
  );
})(jQuery);
