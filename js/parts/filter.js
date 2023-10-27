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

      filterBtn.each(function () {
        $(this).removeClass("filter-active");
      });

      filterTitles.each(function () {
        $(this).removeClass("title-active");
      });

      self.addClass("filter-active");

      if (self.hasClass("filter-active")) {
        $(`.title-${filterTarget}`).addClass("title-active");
      }
    });
  }

  filterPosts();
}
export { filter };
