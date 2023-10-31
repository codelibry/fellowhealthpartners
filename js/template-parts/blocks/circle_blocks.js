import $ from "jquery";

function circle_blocks() {
  $(".circle_blocks").each(function () {
    $(this)
      .find(".circle_blocks__inner")
      .hover(
        function () {
          let contentHeight = $(this)
            .find(".circle_blocks__content")
            .outerHeight();
          var content = $(this).find(".circle_blocks__persents_row").html();
          var bgColor = $(this).find(".bg_color").css("background-color");

          let circleContent = $(this).find(".circle_blocks__content").html();

          $(".circle_blocks__bottom .persents_row").html(content);
          $(".circle_blocks__bottom .persents_row .color_text").css(
            "background-color",
            bgColor
          );
          $(this)
            .parents(".circle_blocks__list")
            .css("margin-bottom", contentHeight + 50);
          // Check if the screen width is smaller than 1368px
          if ($(window).width() < 1368) {
            $(".circle_blocks__center .show").html(circleContent);
            $(".circle_blocks__center .show").addClass("active");
            let contentHeight_new = $(this)
              .parents(".circle_blocks__center")
              .find(".circle_blocks__content.show")
              .outerHeight();
            $(this)
              .parents(".circle_blocks__list")
              .css("margin-bottom", contentHeight_new + 50);
          }
        },
        function () {
          // This is the mouseout handler; you can add code here if needed.
        }
      );
  });
}
export { circle_blocks };
