import $ from "jquery";

function verticalBlockHeight() {
  $(".vertical_block:hover, .vertical_block.active ").each(function () {
    let headerHeight = $(this).find(".vertical_block__header").outerHeight();
    let contentHeight = $(this).find(".vertical_block__content").outerHeight();

    console.log("headerHeight " + headerHeight);
    console.log("contentHeight " + headerHeight);
    $(this).css("min-height", headerHeight + contentHeight);
  });
}

function numberBlock() {
  function handleBlockInteraction() {
    if ($(window).width() <= 1200) {
      // If window width is less than or equal to 1200px
      $(".vertical_block").on("click", function () {
        $(".vertical_block").removeClass("active");
        $(this).toggleClass("active");
      });
    } else {
      // If window width is greater than 1200px
      $(".number_blocks__main")
        .off("click")
        .hover(
          function () {
            $(".vertical_block:first-child").removeClass("active");
          },
          function () {
            $(".vertical_block:first-child").addClass("active");
          }
        );
    }
  }

  $(document).ready(function () {
    handleBlockInteraction(); // Initial setup

    $(window).on("resize", function () {
      handleBlockInteraction(); // Update on window resize
    });
  });
}
export { numberBlock };
