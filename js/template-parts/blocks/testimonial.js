import $ from "jquery";

function testimonialBlock() {
  var spacingHeight = 90;
  var spacingHeightHover = 110;
  $(".blockquote_slider__list blockquote").hover(
    function () {
      var hiddenTextHeight = $(this)
        .find(".testimonials__listItem__hiddenText")
        .height();
      var textHeight = $(this).find(".testimonials__listItem__text").height();

      var itemHeight = $(this).outerHeight();
      if (hiddenTextHeight > textHeight) {
        $(this)
          .find(".testimonials__listItem")
          .animate({ height: hiddenTextHeight + spacingHeightHover }, 400);
        $(this).find(".testimonials__listItem").addClass("hover");
      }
    },

    function () {
      var textHeight = $(this).find(".testimonials__listItem__text").height();
      $(this)
        .find(".testimonials__listItem")
        .animate({ height: textHeight + spacingHeight }, 400);
      $(this).find(".testimonials__listItem").removeClass("hover");
    }
  );
}

export { testimonialBlock };
