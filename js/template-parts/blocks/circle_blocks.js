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
          $(".circle_blocks__bottom .persents_row").html(content);
          $(".circle_blocks__bottom .persents_row .color_text").css(
            "background-color",
            bgColor
          );
          $(this)
            .parents(".circle_blocks__list")
            .css("margin-bottom", contentHeight + 50);
        },
        function () {
          // This is the mouseout handler; you can add code here if needed.
        }
      );
  });
}
export { circle_blocks };
