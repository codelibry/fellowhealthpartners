import $ from "jquery";

function testimonialBlock() {
  $(".testimonial__readMore").click(function (event) {
    event.preventDefault();
    console.log("click");
    const blockquote = $(this).parent().parent().find(".text__inner");
    blockquote.toggleClass("opened");

    // Change the text of the "Read More" button based on the blockquote's visibility
    if (blockquote.hasClass("opened")) {
      $(this).text("read less");
    } else {
      $(this).text("read more");
    }
  });
}

export { testimonialBlock };
