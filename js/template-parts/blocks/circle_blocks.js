import $ from "jquery";

function circle_blocks() {
  $(".circle_blocks").each(function () {
    let circle_first = $(
      ".circle_blocks__inner-main:nth-child(1) .circle_blocks__inner"
    )
      .find(".circle_blocks__persents_row")
      .html();
    let circleContent_first = $(
      ".circle_blocks__inner-main:nth-child(1) .circle_blocks__inner"
    )
      .find(".circle_blocks__content")
      .html();

    $(".circle_blocks__inner-main:nth-child(1) .circle_blocks__inner").addClass(
      "active"
    );
    $(".circle_blocks__bottom .persents_row").html(circle_first);

    // Check if the screen width is smaller than 1368px
    if ($(window).width() < 1368) {
      $(".circle_blocks__center .show").html(circleContent_first);
      $(".circle_blocks__center .show").addClass("active");
    }

    let active_content_height = $(".circle_blocks__center")
      .find(".active.show")
      .outerHeight();
    let active_list_margin = parseInt(
      $(".circle_blocks__center")
        .find(".circle_blocks__list")
        .css("margin-bottom"),
      10
    );

    if (active_list_margin < active_content_height) {
      $(".circle_blocks__center")
        .find(".circle_blocks__list")
        .css("margin-bottom", active_content_height + 50);
      // Check if the screen width is smaller than 1368px
      if ($(window).width() < 1368) {
        $(".circle_blocks__center")
          .find(".circle_blocks__list")
          .css("margin-bottom", active_content_height + 30);
      }
    }

    console.log(active_list_margin);

    $(this)
      .find(".circle_blocks__inner")
      .hover(
        function () {
          let contentHeight = $(this)
            .find(".circle_blocks__content")
            .outerHeight();
          let content = $(this).find(".circle_blocks__persents_row").html();
          let bgColor = $(this).find(".bg_color").css("background-color");
          let circleContent = $(this).find(".circle_blocks__content").html();
          let $circleBlocksList = $(this).parents(".circle_blocks__list");
          let currentMarginBottom = parseInt(
            $circleBlocksList.css("margin-bottom"),
            10
          );

          $(
            ".circle_blocks__inner-main:nth-child(1) .circle_blocks__inner"
          ).removeClass("active");

          $(".circle_blocks__inner").removeClass("active");
          $(this).addClass("active");

          $(".circle_blocks__bottom .persents_row").html(content);
          $(".circle_blocks__bottom .persents_row .color_text").css(
            "background-color",
            bgColor
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
            // Remove the "active" class if it exists
            if ($(".circle_blocks__center .show").hasClass("active")) {
              $(".circle_blocks__center .show").removeClass("active");
            } else {
              $(".circle_blocks__center .show").addClass("active");
            }
            $(".circle_blocks__center .show").addClass("active");
            let contentHeight_new = $(this)
              .parents(".circle_blocks__center")
              .find(".circle_blocks__content.show")
              .outerHeight();
            $(this)
              .parents(".circle_blocks__list")
              .css("margin-bottom", contentHeight_new + 30);
          }
        },
        function () {
          // $(".circle_blocks__inner").removeClass("active");
          // $(this).addClass("active");
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
