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

  var headerHeight = $("#masthead").outerHeight(); // Replace with your actual header selector
  document.documentElement.style.setProperty(
    "--header_header",
    headerHeight + "px"
  );

  $("#toggle").on("click", function () {
    $(this).toggleClass("on");
    $("#side-panel").toggleClass("active");
    $("body").toggleClass("side-panel-overlay");
    return false;
  });

  $(document).click(function (event) {
    let $target = $(event.target);
    if (!$target.closest(".side-panel").length) {
      $("#toggle").removeClass("on");
      $("#side-panel").removeClass("active");
      $("body").removeClass("side-panel-overlay");
    }
  });

  $("#primary-menu-mobile .menu-item-has-children .menu-item__parent").click(
    function () {
      $(this).parent().toggleClass("opened");
      $(this).parent().find(".sub-menu").slideToggle();
    }
  );
  $("#primary-menu-mobile .menu-item__parent").on("click", function () {
    event.preventDefault();
  });
}

export { header };
