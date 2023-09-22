import $ from "jquery";

function header() {
  $(".js-scroll-down").on("click", function (e) {
    var target = $(this).attr("href");
    var offset = 0;
    $("html,body")
      .stop()
      .animate({ scrollTop: $(target).offset().top - offset }, 1000);
    e.preventDefault();
  });

  function movePortalLink() {
    if ($(window).width() < 992) {
      if ($(".mega-toggle-blocks-left .button").length == 0) {
        if ($(".site-header__info .button").length) {
          $(".mega-toggle-blocks-left").append(
            $(".site-header__info .button").clone()
          );
        }
      }
    }
  }

  movePortalLink();

  $(window).on("resize", movePortalLink);
}

export { header };
