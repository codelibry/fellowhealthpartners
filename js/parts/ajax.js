import $ from "jquery";

function show_more() {
  $("#loadmore").click(function () {
    $(this).find("span").text("Loading...");
    var data = {
      action: "loadmore",
      query: posts_vars,
      page: current_page,
    };
    // send Ajax
    $.ajax({
      url: ajaxurl,
      data: data,
      type: "POST",
      success: function (data) {
        if (data) {
          $(".careers__list").append(data);
          current_page++;
          if (current_page == max_pages) $("#loadmore").remove();
        } else {
          $("#loadmore").remove();
        }
      },
    });
  });
}

export { show_more };
