import $ from "jquery";

function numberBlock() {
  $(document).ready(function () {
    
    // When you hover over the element with class "block"
    $(".number_blocks__main").hover(
      function() {
          // Add the "highlight" class
          $('.vertical_block:first-child').removeClass("active");
      },
      function() {
          // When you leave, remove the "highlight" class
          $('.vertical_block:first-child').addClass("active");
      }
  );

  });
}
export { numberBlock };
