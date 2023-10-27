import $ from "jquery";


function verticalBlockHeight() {
  $(".vertical_block:hover, .vertical_block.active ").each(function(){
    let headerHeight = $(this).find('.vertical_block__header').outerHeight();
    let contentHeight = $(this).find('.vertical_block__content').outerHeight();

    console.log('headerHeight ' + headerHeight);
    console.log('contentHeight ' + headerHeight);
    $(this).css('min-height', headerHeight + contentHeight);
  });
}

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

    verticalBlockHeight();

  });

  $(window).on('resize', function() {
    verticalBlockHeight();
  })
}
export { numberBlock };
