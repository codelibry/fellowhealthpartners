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
          var $circleBlocksList = $(this).parents(".circle_blocks__list");
          var currentMarginBottom = parseInt(
            $circleBlocksList.css("margin-bottom"),
            10
          );
          console.log(currentMarginBottom);
          if (currentMarginBottom < contentHeight) {
            $(this)
              .parents(".circle_blocks__list")
              .css("margin-bottom", contentHeight + 50);
          }

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
    // Find the span within p.text--size--100
    var $textSize100 = $(".text--size--100 span");

    // Get the font-size value from the span
    var fontSize = $textSize100.css("font-size");

    // Apply the font-size to p.text--size--100
    $textSize100.parent().css("font-size", fontSize);
  });
}
export { circle_blocks };
