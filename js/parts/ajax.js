import $ from "jquery";

function show_more() {
  function showMore() {
    const showMoreBtn = $(".show-more-btn");

    showMoreBtn.on("click", function () {
      const hiddenPosts = $(".filter-show-post:not(.show-post)");

      hiddenPosts.each(function (index) {
        if (index < 3) {
          $(this).addClass("show-post");
        }

        showMoreBtn
          .find(".btn__count")
          .html(`(${$(".filter-show-post:not(.show-post)").length})`);

        if (!$(".filter-show-post:not(.show-post)").length) {
          showMoreBtn.addClass("btn-d-none");
        }
      });
    });
  }

  showMore();

  let loadMoreButtons = $(".template-testimonials .load-more");
  loadMoreButtons.each(function () {
    let button = $(this);
    let sliceNumber = 4;
    let hiddenCells = null;

    button.on("click", function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();
      hiddenCells = button
        .parents(".template-testimonials")
        .find(".testimonials-grid__item:hidden");
      hiddenCells.slice(0, sliceNumber).slideDown();

      $("html,body")
        .stop()
        .animate({ scrollTop: $(hiddenCells[0]).offset().top }, 1000);
      if (
        !button
          .parents(".template-testimonials")
          .find(".testimonials-grid__item:hidden").length
      ) {
        button.fadeOut("slow");
      }
    });
  });
}

export { show_more };
