import $ from "jquery";

function filter() {
  function filterPosts() {
    const filterBlock = $("#post-filters");
    const filterBtn = filterBlock.find(".post-filters__button");
    const posts = $(".post-item");
    const showMoreBtn = $(".show-more-btn");
    const showMoreCount = showMoreBtn.find(".btn__count");

    filterBtn.on("click", function () {
      const self = $(this);
      const filterTarget = self.data("target");
      const filterTitles = $(".post-filters__titles .filter-title");
//       const filteredPosts = $(".post-item.filter-show-post");
// 
//       if (!filteredPosts.length > 3) {
//         showMoreBtn.addClass("btn-d-none");
//       } else {
//         showMoreBtn.removeClass("btn-d-none");
//       }

      filterBtn.each(function () {
        $(this).removeClass("filter-active");
      });

      filterTitles.each(function () {
        $(this).removeClass("title-active");
      });
//       let count = 0;
//       posts.each(function () {
//         $(this).removeClass("show-post");
// 
//         if (filterTarget === "all") {
//           if (count < 3) {
//             $(this).addClass("show-post");
//           }
//           $(this).addClass("filter-show-post");
// 
//           count++;
//         } else if ($(this).hasClass("category-" + filterTarget)) {
//           if (count < 3) {
//             $(this).addClass("show-post");
//           }
//           $(this).addClass("filter-show-post");
// 
//           count++;
//         } else {
//           $(this).removeClass("filter-show-post");
//           $(this).removeClass("show-post");
//         }
//       });
// 
//       let showPosts = $(".post-item.filter-show-post:not(.show-post)");
// 
//       showMoreCount.html(`(${showPosts.length})`);

      self.addClass("filter-active");

      if (self.hasClass("filter-active")) {
        $(`.title-${filterTarget}`).addClass("title-active");
      }
    });
  }

  filterPosts();
}
export { filter };
